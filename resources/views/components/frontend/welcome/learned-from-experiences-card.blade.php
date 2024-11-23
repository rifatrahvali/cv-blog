<div class="col-md-12 mb-3">
    <div class="card" style="border-radius: 0; border: 2px solid black;">
        <div class="card-body">
            <h3 class="card-title">Öğrenim</h3>
            <p class="card-text">
                <b>Kurumsal IT Yapısı</b>
            </p>
            @foreach ($learnedFromExperiencesCard as $lfec)
                <p class="card-text">
                    <b>{{ $lfec->section ?? '' }}</b> | {{ $lfec->sentence ?? '' }} <br>
                    <small class="text-muted">
                        {{ is_array($lfec->work_tags) ? implode(', ', $lfec->work_tags) : $lfec->work_tags }}
                    </small>
                </p>
            @endforeach
        </div>
    </div>
</div>