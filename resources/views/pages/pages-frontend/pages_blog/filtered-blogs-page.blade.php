@extends('layouts.frontend-all-blogs')
@section('blog-content')
<div class="container">
    @include('layouts.partials.frontend.header') <!-- Header -->
    <div class="line mb-3"></div>
    <div class="row">
        <!-- Sol -->
        <div class="col-md-8">
            <!-- Başlık & Pagination -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="">Kategori: {{ $category->name }}</h2>
                <!-- Pagination -->
                <div>
                    <!-- Pagination & Sayfalama -->
                    @include('components.frontend.blog.pagination')
                </div>
            </div>
            
            @include('components.frontend.blog.all-blogs-card')
        </div>

        <!-- Sağ -->
        <div class="col-md-4">
            <h2 class="mb-4">Kategoriler</h2>
            @include('components.frontend.blog.all-categories-card')
        </div>
    </div>
</div>
@endsection