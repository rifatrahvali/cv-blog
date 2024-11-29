<header class="border-bottom lh-1 py-3">
    <div class="container">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary text-body-emphasis" href="{{ route('cv.index') }}">Siteye Git</a>
                <a class="link-secondary text-body-emphasis" href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
                    "In omnibus requiem quaesivi." <br>
                    — "Her şeyde huzuru aradım."
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <form method="POST" action="{{ route('admin.auth.logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-secondary text-body-emphasis btn-admin" type='submit'>Çıkış Yap</button>
                </form>
            </div>
        </div>
    </div>
</header>