@extends('layouts.errors') <!-- Hata layout'unu kullanıyoruz -->

@section('title', '404 - Sayfa Bulunamadı') <!-- Başlık kısmını özelleştiriyoruz -->

@section('content')
<div class="container">
    @include('cards.cards-errors.card-404')
</div>
@endsection