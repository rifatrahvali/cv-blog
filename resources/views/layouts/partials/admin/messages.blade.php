<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
            <strong>Mesaj: </strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<div class="container mt-3">
    @if ($errors->any())
        <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>Mesaj: </strong> {{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
