<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Contact'];
        return view('layouts.public.contact', $data);
    }

    public function store(Request $request)
{
    if (empty($request->name) || empty($request->email) || empty($request->subject) || empty($request->new_message)) {
        return redirect()->route('contact')->with('error', 'Tidak boleh ada inputan kosong. Semua wajib diisi!');
    }
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'new_message' => 'required',
    ]);

    try {
        DB::beginTransaction();

        $email = new Email();
        $email->name = $request->name;
        $email->email = $request->email;
        $email->subject = $request->subject;
        $email->new_message = $request->new_message;
        $email->save();

        $this->sendEmail($request->all());

        DB::commit();
       return redirect()->route('contact')->with('success', 'Terima kasih atas pesan Anda.');
   } catch (\Exception $e) {
       DB::rollBack();
       return redirect()->route('contact')->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
   }
}


    private function sendEmail($data)
    {
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])
                    ->subject('Email dari Form contact');
        });
    }
}
