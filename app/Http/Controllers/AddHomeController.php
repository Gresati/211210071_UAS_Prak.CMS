<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddHomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('layouts.private.home.index', compact('homes'));
    }

    public function create()
    {
        return view('layouts.private.home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $heroPath = $request->file('hero')->store('images', 'public');
        $foto1Path = $request->file('foto1')->store('images', 'public');
        $foto2Path = $request->file('foto2')->store('images', 'public');
        $foto3Path = $request->file('foto3')->store('images', 'public');

        Home::create([
            'hero' => $heroPath,
            'deskripsi' => $request->deskripsi,
            'foto1' => $foto1Path,
            'foto2' => $foto2Path,
            'foto3' => $foto3Path,
        ]);

        return redirect()->route('home.index')
            ->with('success', 'Data Home berhasil ditambahkan.');
    }


    public function edit(Home $home)
    {
        return view('layouts.private.home.edit', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'hero' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'foto1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('hero')) {
            $heroPath = $request->file('hero')->store('images', 'public');
            $home->hero = $heroPath;
        }
        if ($request->hasFile('foto1')) {
            $foto1Path = $request->file('foto1')->store('images', 'public');
            $home->foto1 = $foto1Path;
        }
        if ($request->hasFile('foto2')) {
            $foto2Path = $request->file('foto2')->store('images', 'public');
            $home->foto2 = $foto2Path;
        }
        if ($request->hasFile('foto3')) {
            $foto3Path = $request->file('foto3')->store('images', 'public');
            $home->foto3 = $foto3Path;
        }

        $home->deskripsi = $request->deskripsi;
        $home->save();

        return redirect()->route('home.index')
            ->with('success', 'Data Home berhasil diperbarui.');
    }


    public function destroy(Home $home)
    {
        Storage::disk('public')->delete([$home->hero, $home->foto1, $home->foto2, $home->foto3]);
        $home->delete();

        return redirect()->route('home.index')
            ->with('success', 'Data Home berhasil dihapus.');
    }
}
