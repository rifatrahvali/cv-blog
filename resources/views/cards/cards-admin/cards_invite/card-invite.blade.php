<div class="container">
    <h1 class="mb-4">Blog Yazarı Davet Et</h1>
    <form action="{{ route('admin.invite.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-posta Adresi</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Davet Gönder</button>
    </form>
</div>

