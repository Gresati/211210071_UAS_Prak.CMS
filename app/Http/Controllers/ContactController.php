<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contact = Contact::first();

        $data = [
            'title' => 'contact',
            'contact' => $contact,
        ];
        return view('layouts.public.contact', $data);
    }
}
