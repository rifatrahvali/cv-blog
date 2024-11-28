<!-- Kategori Listesi -->
<div class="row">
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