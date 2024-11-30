<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Web Tasarım Talebi</title>
</head>
<body>
    <h1>Yeni Bir Web Tasarım Talebi Alındı</h1>
    <p><strong>Adı Soyadı:</strong> {{ $webDesignRequest->first_name }} {{ $webDesignRequest->last_name }}</p>
    <p><strong>Email:</strong> {{ $webDesignRequest->email }}</p>
    <p><strong>Telefon:</strong> {{ $webDesignRequest->phone }}</p>
    <p><strong>Bütçe:</strong> {{ $webDesignRequest->budget }}</p>
    <p><strong>Proje Açıklaması:</strong> {{ $webDesignRequest->project_description }}</p>
    <p><strong>Logosu Var mı?:</strong> {{ $webDesignRequest->has_logo }}</p>
    <p><strong>Deadline:</strong> {{ $webDesignRequest->deadline }}</p>
    <p><strong>Sayfa Sayısı:</strong> {{ $webDesignRequest->page_count }}</p>
    <p><strong>Hedef Kitle:</strong> {{ $webDesignRequest->target_audience }}</p>
    <p><strong>Renk Tercihleri:</strong> {{ $webDesignRequest->color_preferences }}</p>
    <p><strong>Rakipler:</strong> {{ $webDesignRequest->competitor_websites }}</p>
    <p><strong>Beğenilen Siteler:</strong> {{ $webDesignRequest->liked_websites }}</p>
    <p><strong>Ek Yorum:</strong> {{ $webDesignRequest->additional_comments }}</p>
</body>
</html>