<div class="card text-end" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Eğitim</h3>

        @if (!empty($educationCard) && $educationCard->count())
            @foreach ($educationCard as $ed)
                <p class="card-text">
                    {{ $ed->school_name ?? 'Okul Adı Belirtilmemiş' }} <b>{{ $ed->city ?? 'Şehir Bilgisi Yok' }}</b> <br>
                    <small class="text-muted">{{ $ed->end_year ?? 'Mezuniyet Yılı Yok' }}</small> | 
                    {{ $ed->department ?? 'Bölüm Bilgisi Yok' }}
                </p>
            @endforeach
        @else
            <p class="text-muted">Henüz eğitim bilgisi eklenmedi.</p>
        @endif

    </div>
</div>