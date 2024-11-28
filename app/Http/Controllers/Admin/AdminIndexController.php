<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; // Global Controller sınıfını içe aktar

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    
    public function index()
    {
        return view('pages.pages-admin.pages_index.page-index');
    }
}
