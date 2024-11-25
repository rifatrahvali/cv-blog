<div class="card text-end" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Deneyim</h3>
        
        @if (!empty($experienceCard))
            <p class="card-text">
                <b>{{ $experienceCard->company_name ?? 'Şirket Adı Belirtilmemiş' }}</b> <br>
                {{ $experienceCard->start_date ?? 'Başlangıç Tarihi Yok' }} : 
                {{ $experienceCard->end_date ?? 'Bitiş Tarihi Yok' }} <br>
                <small class="text-muted">
                    {{ $experienceCard->title ?? 'Unvan Belirtilmemiş' }}
                </small>
            </p>
        @else
            <p class="text-muted">Henüz deneyim bilgisi eklenmedi.</p>
        @endif

    </div>
</div>