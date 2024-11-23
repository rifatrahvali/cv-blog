@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Site Ayarları</h1>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('site-settings.storeOrUpdate') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="header_title" class="form-label"><strong>Header Başlık</strong></label>
            <input type="text" id="header_title" name="header_title" class="form-control" 
                   value="{{ old('header_title', $settings->header_title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="header_subtitle" class="form-label"><strong>Header Alt Başlık</strong></label>
            <input type="text" id="header_subtitle" name="header_subtitle" class="form-control" 
                   value="{{ old('header_subtitle', $settings->header_subtitle ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="footer_text" class="form-label"><strong>Footer Yazısı</strong></label>
            <input type="text" id="footer_text" name="footer_text" class="form-control" 
                   value="{{ old('footer_text', $settings->footer_text ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="footer_year" class="form-label"><strong>Footer Yılı</strong></label>
            <input type="number" id="footer_year" name="footer_year" class="form-control" 
                   value="{{ old('footer_year', $settings->footer_year ?? date('Y')) }}" 
                   min="1900" max="{{ date('Y') }}" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Kaydet</button>
    </form>
</div>
@endsection