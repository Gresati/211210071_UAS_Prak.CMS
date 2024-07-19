<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $homes = Home::first(); 

        $data = [
            'title' => 'Home',
            'home' => $homes,
        ];
        return view('layouts.public.home', $data);
    }

}
