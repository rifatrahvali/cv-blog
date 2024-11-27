@extends('layouts.frontend')

@section('content')
<div class="container">
    @include('layouts.partials.frontend.header') <!-- Header buradan geliyor -->
    <div class="line mb-3"></div>
    <div class="container">
        <div class="row">
            <!-- Blog Detay -->
            <div class="col-md-8">
                <div class="card mb-4" style="border: 2px solid black; border-radius: 0;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $blog->title }}</h1>
                        <p class="text-muted">
                            Yayınlanma Tarihi: {{ $blog->created_at->format('Y-m-d') }}
                        </p>
                        <p class="text-muted">
                            Kategori: 
                            <a href="{{ route('blogs.byCategory', $blog->category->slug ?? '#') }}" class="text-decoration-none">
                                {{ $blog->category->name ?? 'Kategori Yok' }}
                            </a>
                        </p>
                        <p class="card-text">{!! $blog->content !!}</p> <!-- CKEditor ile içerik -->

                        @if ($blog->image)
                            <div class="mt-4">
                                <h4>Makale Görselleri</h4>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" alt="{{ $blog->title }}">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
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