<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DB sınıfını içe aktar

class SupportFormListController extends Controller
{
    public function index()
    {
        // supports_db veritabanından supports tablosundaki verileri çek
        $supportRequests = DB::connection('support')->table('supports')->get();

        // Verileri admin paneline gönder
        return view('pages.pages-admin.pages_support.page-support', compact('supportRequests'));
    }
    public function show($id)
    {
        // supports_db bağlantısından destek talebi bilgilerini al
        $supportRequest = DB::connection('support')
            ->table('supports')
            ->where('id', $id)
            ->first();

        // Eğer destek talebi bulunamazsa, 404 hata sayfasını göster
        if (!$supportRequest) {
            abort(404); // Laravel'in varsayılan 404 hata sayfasını gösterir
        }

        return view('pages.pages-admin.pages_support.page-support-detail', compact('supportRequest'));
    }
}
