<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    
    public function index()
    {
        return view('pages.pages-admin.pages_index.page-index');
    }
}
