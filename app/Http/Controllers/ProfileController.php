<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $profiles = Profile::all(); 

        $data = [
            'title' => 'Profiles',
            'profiles' => $profiles,
        ];
        return view('layouts.public.profile', $data);
    }
}
