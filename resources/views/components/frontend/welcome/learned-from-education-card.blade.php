<div class="card" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Öğrenim</h3>
        @foreach ($learnedFromEducationCard as $lfeduc)
        <p class="card-text">
            <b>{{$lfeduc->degree}}</b> | {{$lfeduc->main_achievement}}<br>
            <small class="text-muted">
            {{ is_array($lfeduc->secondary_achievements) ? implode(', ', $lfeduc->secondary_achievements) : $lfeduc->secondary_achievements }}
            </small>
        </p>
        @endforeach
    </div>
</div>
