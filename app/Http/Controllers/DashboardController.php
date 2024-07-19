<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $data = array ('title' => 'Home');
        return view('layouts.private.dashboard', $data);
    }
}
