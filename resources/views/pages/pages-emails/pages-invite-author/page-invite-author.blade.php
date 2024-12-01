<!DOCTYPE html>
<html>
<head>
    <title>Admin Daveti</title>
</head>
<body>
    <h1>Admin Daveti</h1>
    <p>Merhaba,</p>
    <p>Blog yazarı olarak katılmanız için bir davet aldınız. Kayıt olmak için aşağıdaki bağlantıya tıklayın:</p>
    <a href="{{ route('admin.auth.register', ['token' => $invitation->token]) }}">
        Kayıt Ol
    </a>
    <p>Teşekkürler!</p>
</body>
</html>