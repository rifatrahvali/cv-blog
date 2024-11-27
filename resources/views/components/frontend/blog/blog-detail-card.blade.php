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
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded"
                            alt="{{ $blog->title }}">
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>