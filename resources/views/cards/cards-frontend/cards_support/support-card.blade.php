<div class="container">
    <h1 class="text-center">Web Sayfası Tasarımı Teklif Formu</h1>
    <p class="text-center">
        Bu teklif formu, sizin ve işletmenizin ihtiyaçlarını en doğru şekilde analiz etmemize yardımcı olur. Verdiğiniz
        bilgiler, işin kapsamını netleştirecek ve özel proje gereksinimlerinizi belirleyerek size zaman ve bütçe
        tasarrufu sağlayacaktır.
    </p>

    <form action="{{ route('support.store') }}" method="POST" class="support-form">
        @csrf
        <!-- Proje Detayları -->
        <h2 class="mt-5">Proje Detayları</h2>
        <div class="mb-3">
            <label for="first_name" class="form-label">Adınız</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Soyadınız</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefon</label>
            <input type="tel" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="budget" class="form-label">Tahmini Bütçe</label>
            <input type="text" id="budget" name="budget" class="form-control" required>
        </div>
        <!-- Web Sayfası Türü -->
        <div class="mb-3">
            <label for="website_type" class="form-label">Web Sayfası Türü:</label>
            <select id="website_type" name="website_type" class="form-select" required>
                <option value="Kurumsal">Kurumsal</option>
                <option value="Kişisel">Kişisel</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="project_description" class="form-label">Projenizi Kısaca Tanıtınız</label>
            <textarea id="project_description" name="project_description" rows="4" class="form-control"
                required></textarea>
        </div>
        <div class="mb-3">
            <label for="has_logo" class="form-label">Hazırda Logonuz Var mı?</label>
            <select id="has_logo" name="has_logo" class="form-select">
                <option value="yes">Evet</option>
                <option value="no">Hayır</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Web Sayfanızın Ne Zaman Hazır Olması Gerekiyor?</label>
            <input type="text" id="deadline" name="deadline" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="page_count" class="form-label">Web Sayfanız Kaç Bölüm & Sayfadan Oluşacaktır?</label>
            <input type="text" id="page_count" name="page_count" class="form-control" required>
        </div>

        <!-- Geçerli Web Sayfanız -->
        <h2 class="mt-5">Geçerli Web Sayfanız</h2>
        <div class="mb-3">
            <label for="has_hosting" class="form-label">Web Sitenizin Hostingi Var mı? Hosting Paketi Özelliği?</label>
            <input type="text" id="has_hosting" name="has_hosting" class="form-control">
        </div>
        <div class="mb-3">
            <label for="use_existing_content" class="form-label">Web Sitenizin Mevcut İçeriği Kullanılacak mı?</label>
            <input type="text" id="use_existing_content" name="use_existing_content" class="form-control">
        </div>

        <!-- Hedef Kitle ve Tercihler -->
        <h2 class="mt-5">Hedef Kitle ve Tercihler</h2>
        <div class="mb-3">
            <label for="target_audience" class="form-label">Hedef Kitleniz</label>
            <input type="text" id="target_audience" name="target_audience" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="color_preferences" class="form-label">Renk Tercihleriniz</label>
            <input type="text" id="color_preferences" name="color_preferences" class="form-control">
        </div>
        <div class="mb-3">
            <label for="competitor_websites" class="form-label">Rakiplerinizin Web Sayfalarını Listeleyiniz</label>
            <textarea id="competitor_websites" name="competitor_websites" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="liked_websites" class="form-label">Beğendiğiniz Web Sayfaları Var mı? Neden? (Başlıklar,
                Menüler, Renkler, Yazı Tipleri, Fotoğraflar vb.)</label>
            <textarea id="liked_websites" name="liked_websites" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="additional_comments" class="form-label">Ek Yorum</label>
            <textarea id="additional_comments" name="additional_comments" rows="4" class="form-control"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-secondary btn-lg">Formu Gönder</button>
        </div>
    </form>
</div>

