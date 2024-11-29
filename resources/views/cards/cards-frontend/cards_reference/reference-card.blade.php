<!-- @extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Tasarım & Yazılım Referanslarım</h1>
    <p class="text-center mb-5">
        Çalıştığım firma bünyesinde ve Freelance olarak yaptığım yazılım ve tasarım işlerini inceleyebilirsiniz.
    </p>
    <div class="row g-4">
        @foreach ($references as $reference)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm" style="width: 100%;">
                <img src="{{ $reference->image }}" class="card-img-top" alt="{{ $reference->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $reference->title }}</h5>
                    <p class="card-text">
                        {!! $reference->description !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">{{ $reference->category }}</span>
                        <span class="badge bg-secondary">{{ $reference->type }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection -->