<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVPageController extends Controller
{
    // Listeleme işlemleri 
    public function index() {
        return view('frontend.welcome');
    }
    
}
