@extends('layouts.errors')

@section('title', '403 - Yetkisiz Erişim')

@section('content')
<div class="container">
    @include('cards.cards-errors.card-403')
</div>

@endsection