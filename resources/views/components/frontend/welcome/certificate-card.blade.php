<div class="card  bg-light" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Sertifikalar</h3>
        @if (!empty($certificateCard) && $certificateCard->count())
            @foreach ($certificateCard as $certificate)
                <p class="card-text">
                    <b>{{ $certificate->certificate_name ?? '' }}</b> | {{ $certificate->field ?? '' }}<br>
                    <small class="text-muted">{{ $certificate->institution ?? '' }}</small>
                </p>
            @endforeach
        @else
            <p class="text-muted"></p>
        @endif
    </div>
</div>