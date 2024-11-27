<div class="card text-end bg-light" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body bg-light">
        <h3 class="card-title  bg-light ">Eğitim</h3>

        @if (!empty($educationCard) && $educationCard->count())
            @foreach ($educationCard as $ed)
                <p class="card-text  bg-light">
                    {{ $ed->school_name ?? 'Okul Adı Belirtilmemiş' }} <b>{{ $ed->city ?? 'Şehir Bilgisi Yok' }}</b> <br>
                    <small class="text-muted">{{ $ed->end_year ?? 'Mezuniyet Yılı Yok' }}</small> | 
                    {{ $ed->department ?? 'Bölüm Bilgisi Yok' }}
                </p>
            @endforeach
        @else
            <p class="text-muted  bg-light">Henüz eğitim bilgisi eklenmedi.</p>
        @endif

    </div>
</div>