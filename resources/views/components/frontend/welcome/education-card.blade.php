<div class="card text-end" style="border-radius: 0; border: 2px solid black;">
    <div class="card-body">
        <h3 class="card-title">Eğitim</h3>
        @foreach ($educationCard as $ed)
            <p class="card-text">
                {{$ed->school_name}} <b>{{$ed->city}}</b> <br>
                <small class="text-muted">{{$ed->end_year}}</small> | {{$ed->department}}
            </p>
        @endforeach
    </div>
</div>