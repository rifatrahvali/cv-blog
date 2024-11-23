<div class="card text-end" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Kurs</h3>
        @foreach ($courseCard as $courses)
            <p class="card-text">
                <b>{{$courses->course_name}}</b> <br>
                {{$courses->institution}} <br>
                <small class="text-muted">
                    {{ is_array($courses->additional_achievements) ? implode(', ', $courses->additional_achievements) : $courses->additional_achievements }}
                </small>
            </p>
        @endforeach
    </div>
</div>