<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <a href="{{ route('profile-card.index') }}">Profil Kartı</a> <br>
    <a href="{{ route('about-card.index') }}">Hakkımda Kartı</a> <br>
    <a href="{{ route('experience-card.index') }}">Şirket Deneyimi Kartı</a> <br>
    <a href="{{ route('learned-from-experiences-card.index') }}">Şirket içi iş Deneyimi Kartı</a> <br>
    <a href="{{ route('education-card.index') }}">Eğitim Kartı</a> <br>
    <a href="{{ route('learned-from-education-card.index') }}">Eğitim'den öğrenimlerin Kartı</a> <br>
    <a href="{{ route('course-card.index') }}">Kursların Kartı</a> <br>
    <a href="{{ route('certificate-card.index') }}">Sertifika Kartı</a> <br>
</body>
</html>