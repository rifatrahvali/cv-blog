@extends('layouts.frontend-support')

@section('frontend-support-content')
<div class="container">
    @include('layouts.partials.frontend.header') <!-- Header -->
    <div class="line mb-3"></div>
    @include('cards.cards-frontend.cards_support.support-card')
</div>
@endsection