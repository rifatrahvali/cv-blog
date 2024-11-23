@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4"
        style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-center">Site Ayarları</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        <form action="{{ route('site-settings.storeOrUpdate') }}" method="POST">
            @csrf

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <!-- Header Başlık -->
                        <tr>
                            <td class="text-end align-middle" style="vertical-align: top;">
                                <strong>Header Başlık:</strong>
                            </td>
                            <td>
                                <input type="text" id="header_title" name="header_title"
                                    value="{{ old('header_title', $settings->header_title ?? '') }}"
                                    class="form-control" required>
                            </td>
                        </tr>

                        <!-- Header Alt Başlık -->
                        <tr>
                            <td class="text-end align-middle" style="vertical-align: top;">
                                <strong>Header Alt Başlık:</strong>
                            </td>
                            <td>
                                <input type="text" id="header_subtitle" name="header_subtitle"
                                    value="{{ old('header_subtitle', $settings->header_subtitle ?? '') }}"
                                    class="form-control" required>
                            </td>
                        </tr>

                        <!-- Footer Yazısı -->
                        <tr>
                            <td class="text-end align-middle" style="vertical-align: top;">
                                <strong>Footer Yazısı:</strong>
                            </td>
                            <td>
                                <input type="text" id="footer_text" name="footer_text"
                                    value="{{ old('footer_text', $settings->footer_text ?? '') }}" class="form-control"
                                    required>
                            </td>
                        </tr>

                        <!-- Footer Yılı -->
                        <tr>
                            <td class="text-end align-middle" style="vertical-align: top;">
                                <strong>Footer Yılı:</strong>
                            </td>
                            <td>
                                <input type="number" id="footer_year" name="footer_year"
                                    value="{{ old('footer_year', $settings->footer_year ?? date('Y')) }}"
                                    class="form-control" min="1900" max="{{ date('Y') }}" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">Kaydet</button>
            </div>
        </form>
    </div>
</div>
@endsection