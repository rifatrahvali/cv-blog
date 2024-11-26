<!-- resources/views/blogs/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog ve Kategori Listesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 0;
        }

        .category-card {
            border: 2px solid black;
            margin-bottom: 15px;
            padding: 10px;
            transition: box-shadow 0.2s ease-in-out;
        }

        .category-card:hover {
            box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        }

        .blog-card:hover {
            box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="py-5">
    <div class="container">
        <div class="row">
            <!-- Blog Listesi -->
            <div class="col-md-8">
                <h2 class="mb-4">Bloglar</h2>
                <div class="row g-4">
                    @foreach ($blogs as $blog)
                    <div class="col-md-6">
                        <div class="card blog-card" style="border: 2px solid black;">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://via.placeholder.com/300x150' }}"
                                class="card-img-top" alt="Blog Görseli">
                            <div class="card-body">
                                <h4 class="card-title">{{ $blog->title }}</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">Yayın: {{ $blog->created_at->format('Y-m-d') }}</p>
                                    <p class="text-muted">{{ $blog->category->name ?? 'Kategori Yok' }}</p>
                                </div>
                                <p class="card-text">{{ Str::limit(strip_tags(html_entity_decode($blog->content)), 150,'...') }}</p>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-secondary">Devamını Oku</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Kategori Listesi -->
            <div class="col-md-4">
                <h2 class="mb-4">Kategoriler</h2>
                @foreach ($categories as $category)
                <div class="category-card">
                    <h5 class="m-0">
                        <a href="{{ route('blogs.category', $category->slug) }}" class="text-decoration-none text-dark">{{ $category->name }}</a>
                    </h5>
                    <small class="text-muted">{{ $category->articles_count }} Blog</small>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>