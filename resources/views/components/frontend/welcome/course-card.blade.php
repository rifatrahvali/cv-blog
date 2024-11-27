<div class="card text-end  bg-light" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Kurs</h3>
        @if (!empty($courseCard) && $courseCard->count())
            @foreach ($courseCard as $courses)
                <p class="card-text">
                    <b>{{ $courses->course_name ?? 'Kurs Adı Belirtilmemiş' }}</b> <br>
                    {{ $courses->institution ?? 'Kurum Belirtilmemiş' }} <br>
                    <small class="text-muted">
                        {{ is_array($courses->additional_achievements) 
                            ? implode(', ', $courses->additional_achievements) 
                            : ($courses->additional_achievements ?? 'Ek Başarılar Yok') }}
                    </small>
                </p>
            @endforeach
        @else
            <p class="text-muted">Henüz kurs bilgisi eklenmedi.</p>
        @endif
    </div>
</div>