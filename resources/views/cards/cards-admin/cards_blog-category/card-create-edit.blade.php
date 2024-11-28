<div class="container">
        <h2 class="text-center mb-4">Admin Blog Kategori {{ isset($category) ? 'Güncelle' : 'Ekle' }}</h2>
        <form method="POST" action="{{ isset($category) ? route('admin.blog-category.update', $category->id) : route('admin.blog-category.store') }}" enctype="multipart/form-data">
            @csrf
            @if (isset($category))
                @method('POST')
            @endif

            <!-- üst kategorisi olacaksa Kategori Seçimi -->
            <div class="mb-3">
                <label for="categories" class="form-label">Üst Kategori</label>
                <select class="form-select" id="categories" name="parent_id">
                    <option value="" selected>Üst Kategori Seçin</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ isset($category) && $category->parent_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kategori Başlığı -->
            <div class="mb-3">
                <label for="category-name" class="form-label">Kategori Adı</label>
                <input type="text" class="form-control" id="category-name" name="name" placeholder="Kategori Adını Girin" value="{{ old('name', isset($category) ? $category->name : '') }}">
            </div>

            <!-- Görünürlük Durumu -->
            <div class="mb-3">
                <label for="is_visible" class="form-label">Görünürlük Durumu</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" 
                        {{ isset($category) && $category->is_visible ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_visible">
                        Görünür
                    </label>
                </div>
            </div>

            <!-- Kategori İçeriği -->
            <div class="mb-3">
                <label for="category-description" class="form-label">Kategori Tanımlaması</label>
                <input type="text" class="form-control" id="category-description" name="description" placeholder="Kategori Tanımlaması Girin" value="{{ old('description', isset($category) ? $category->description : '') }}">
            </div>

            <!-- Etiketler -->
            <div class="mb-3">
                <label for="category-tags" class="form-label">Etiketler</label>
                <input type="text" class="form-control" id="category-tags" name="tags" placeholder="Etiketleri virgül ile ayırarak girin" value="{{ old('tags', isset($category) ? $category->tags : '') }}">
            </div>

            <!-- Görsel Ekle -->
            <div class="mb-3">
                <label for="article-images" class="form-label">Görsel Ekle</label>
                <input type="file" class="form-control" id="article-images" name="image">
                <small class="form-text text-muted">Bir görsel yükleyebilirsiniz.</small>
                @if (isset($category) && $category->image)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Kategori Görseli" class="img-thumbnail" width="150">
                    </div>
                @endif
            </div>

            <!-- Slider Görseller (Sadece güncelleme ve görsel mevcutsa gösterilir) -->
            @if (isset($category) && $category->image)
                <div class="mb-3 w-100">
                    <h3 class="text-center mb-3">Slider Görseller</h3>
                    <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $category->image) }}" class="d-block w-100" alt="Kategori Görseli">
                            </div>
                            <!-- Ek görseller için -->
                            <div class="carousel-item">
                                <img src="https://fastly.picsum.photos/id/231/300/100.jpg?hmac=knNfvYlMulW63fqgSthK42uGIHSLLaRcMCeoy_Wd_Sc" class="d-block w-100" alt="Örnek Görsel">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Önceki</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Sonraki</span>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Ekle Butonu -->
            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-secondary">{{ isset($category) ? 'Güncelle' : 'Ekle' }}</button>
            </div>
        </form>
    </div>