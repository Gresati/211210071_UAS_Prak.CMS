<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class AddProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('layouts.private.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('layouts.private.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'ttl' => 'required',
            'soft_skill' => 'required',
            'hard_skill' => 'required',
        ]);

        // Mengunggah gambar
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // Menyimpan data profil dengan nama file gambar
        Profile::create([
            'image' => $imageName,
            'name' => $request->name,
            'ttl' => $request->ttl,
            'soft_skill' => $request->soft_skill,
            'hard_skill' => $request->hard_skill,
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Data profile berhasil ditambahkan.');
    }

    public function edit(Profile $profile)
    {
        return view('layouts.private.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'ttl' => 'required',
            'soft_skill' => 'required',
            'hard_skill' => 'required',
        ]);

        // Jika ada gambar baru yang diunggah, simpan gambar baru
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $profile->update([
                'image' => $imageName,
                'name' => $request->name,
                'ttl' => $request->ttl,
                'soft_skill' => $request->soft_skill,
                'hard_skill' => $request->hard_skill,
            ]);
        } else {
            // Jika tidak ada gambar baru, simpan data tanpa mengubah gambar
            $profile->update([
                'name' => $request->name,
                'ttl' => $request->ttl,
                'soft_skill' => $request->soft_skill,
                'hard_skill' => $request->hard_skill,
            ]);
        }

        return redirect()->route('profile.index')
            ->with('success', 'Data profile berhasil diperbarui.');
    }
    
    public function destroy(Profile $profile)
    {
        // Hapus gambar dari direktori sebelum menghapus data profil
        $image_path = public_path('images').'/'.$profile->image;
        if(file_exists($image_path)) {
            unlink($image_path);
        }
        
        $profile->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Data profile berhasil dihapus.');
    }
}

