<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Welcome</title>
</head>

<body>
    <header>
        <h1>SELAMAT DATANG {{ ucfirst($fname) }} {{ ucfirst($lname) }}!</h1>
    </header>
    <main>
        <h3>Kamu adalah seorang 
            @if ($gender == "male") 
                Lelaki
            @else
                Perempuan
            @endif
        </h3>
        <h3>Kamu adalah seorang warga kebangsaan {{$nationally}}</h3>
        <h3>Bio kamu adalah {{$bio}}</h3>
        <h2>Terima kasih telah bergabung di SanberBook. Social Media kita bersama!</h2>
    </main>
</body>

</html>