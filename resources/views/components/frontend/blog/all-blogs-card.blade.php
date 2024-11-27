<div class="row g-4">
    @foreach ($blogs as $blog)
        <div class="col-md-6">
            <div class="card blog-card" style="border: 2px solid black;">
                <div class="card-body">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Yayın: {{ $blog->created_at->format('Y-m-d') }}</p>
                        <p class="text-muted">{{ $blog->category->name ?? 'Kategori Yok' }}</p>
                    </div>
                    <p class="card-text">
                        {{ Str::limit(strip_tags(html_entity_decode($blog->content)), 150, '...') }}
                    </p>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-secondary">Devamını
                        Oku</a>
                </div>
            </div>
        </div>
    @endforeach
</div>