@extends('layouts.frontend')

@section('content')
<div class="container">
    @include('layouts.partials.frontend.header') <!-- Header buradan geliyor -->
    <div class="line mb-3"></div>
    <div class="container py-5">
    <div class="row">
        <!-- Blog Listesi -->
        <div class="col-md-8">
            <h2 class="mb-4">Kategori: {{ $category->name }}</h2>
            <div class="row g-4">
                @forelse ($blogs as $blog)
                    <div class="col-md-6">
                        <div class="card blog-card" style="border: 2px solid black;">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://via.placeholder.com/300x150' }}" 
                                 class="card-img-top" alt="{{ $blog->title }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $blog->title }}</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">Yayın: {{ $blog->created_at->format('Y-m-d') }}</p>
                                    <p class="text-muted">{{ $category->name }}</p>
                                </div>
                                <p class="card-text">{{ Str::limit(strip_tags(html_entity_decode($blog->content)), 150) }}</p>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-secondary">Devamını Oku</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Bu kategoride henüz bir blog yok.</p>
                @endforelse
            </div>
        </div>

        <!-- Kategori Listesi -->
        <div class="col-md-4">
            <h2 class="mb-4">Kategoriler</h2>
            @foreach ($categories as $cat)
                <div class="category-card">
                    <h5 class="m-0">
                        <a href="{{ route('blogs.byCategory', $cat->slug) }}" class="text-decoration-none text-dark">
                            {{ $cat->name }}
                        </a>
                    </h5>
                    <small class="text-muted">{{ $cat->articles_count }} Blog</small>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>

@endsection