@if($profileCard->profile_image)
    <img src="{{ asset('storage/' . $profileCard->profile_image) }}" alt="Profil Resmi" class="card-img-top profile-pic">
@else
    <span class="text-muted">Yok</span>
@endif
<div class="card-body">
    <h4 class="card-title"><b>{{ $profileCard->name ?? '' }}</b></h4>
    <p class="card-text">{{ $profileCard->title ?? '' }}</p>
</div>
<ul class="list-group list-group-flush d-flex">
    <li class="list-group-item social-icons ">
        <a href="#">
            {{ $profileCard->username ?? '' }}
        </a>
        <a href="{{ $profileCard->github_link ?? '' }}">
            <i class="bi bi-github"></i>
        </a>
        <a href="{{ $profileCard->instagram_link ?? '' }}">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="{{ $profileCard->x_link ?? '' }}">
            <i class="bi bi-twitter-x"></i>
        </a>
        <a href="{{ $profileCard->linkedin_link ?? '' }}">
            <i class="bi bi-linkedin"></i>
        </a>
        <a href="{{ $profileCard->youtube_link ?? '' }}">
            <i class="bi bi-youtube"></i>
        </a>
    </li>
</ul>
<div class="card-body">
    <div class="social-icons">
        <a href="mailto:{{$profileCard->email}}" class="card-link">
        {{$profileCard->email}} <i class="bi bi-envelope"></i>
        </a>
    </div>
</div>