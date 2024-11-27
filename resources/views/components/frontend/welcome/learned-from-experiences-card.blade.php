<div class="col-md-12 bg-light mb-3">
    <div class="card bg-light" style="border-radius: 0; border: 2px solid black;">
        <div class="card-body">
            <h3 class="card-title">Öğrenim</h3>
            <p class="card-text">
                <b>Kurumsal IT Yapısı</b>
            </p>

            @if (!empty($learnedFromExperiencesCard) && $learnedFromExperiencesCard->count())
                @foreach ($learnedFromExperiencesCard as $lfec)
                    <p class="card-text">
                        <b>{{ $lfec->section ?? 'Bölüm Bilgisi Belirtilmemiş' }}</b> | 
                        {{ $lfec->sentence ?? 'Cümle Bilgisi Yok' }} <br>
                        <small class="text-muted">
                            {{ is_array($lfec->work_tags) 
                                ? implode(', ', $lfec->work_tags) 
                                : ($lfec->work_tags ?? 'Etiket Bilgisi Yok') }}
                        </small>
                    </p>
                @endforeach
            @else
                <p class="text-muted">Henüz öğrenim bilgisi eklenmedi.</p>
            @endif
        </div>
    </div>
</div>