<form method="POST" action="{{ isset($blogArticle) ? route('admin.blog-article.update', $blogArticle->id) : route('admin.blog-article.store') }}" enctype="multipart/form-data">
        @csrf
        @if (isset($blogArticle))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" name="category_id">
                <option value="" selected>Kategori Seçin</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($blogArticle) && $blogArticle->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $blogArticle->title ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
            <textarea id="editor" class="form-control" name="content">{{ old('content', $blogArticle->content ?? '') }}</textarea>
        </div>
        <!-- Görünürlük Durumu -->
        <div class="mb-3">
            <label for="is_visible" class="form-label">Görünürlük Durumu</label>
            <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="is_visible" 
                    name="is_visible" 
                    value="1"
                    {{ old('is_visible', isset($blogArticle) && $blogArticle->is_visible ? 'checked' : '') }}
                >
                <label class="form-check-label" for="is_visible">Görünür</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Etiketler</label>
            <input type="text" class="form-control" name="tags" value="{{ old('tags', $blogArticle->tags ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Görsel</label>
            <input type="file" class="form-control" name="image">
            @if(isset($blogArticle) && $blogArticle->image)
                <img src="{{ asset('storage/' . $blogArticle->image) }}" class="mt-3" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($blogArticle) ? 'Güncelle' : 'Ekle' }}</button>
    </form>