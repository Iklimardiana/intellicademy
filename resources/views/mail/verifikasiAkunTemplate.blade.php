<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Verifikasi Akun</title>
</head>
<body>
    <p>
        Halo <b>{{ $details['username'] }}</b>
    </p> 
    <p>
        Berikut adalah data anda:
    </p>

    <table>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{ $details['firstName'] }} {{ $details['lastName'] }}</td>
        </tr>
        
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>{{ $details['username'] }}</td>
        </tr>

        <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{ $details['website'] }}</td>
        </tr>

        <tr>
            <td>Role</td>
            <td>:</td>
            <td>{{ $details['role'] }}</td>
        </tr>

        <tr>
            <td>Tanggal Register</td>
            <td>:</td>
            <td>{{ $details['datetime'] }}</td>
        </tr>
    </table>

    <center>
        <h3>Silahkan klik tombol dibawah ini untuk melakukan verifikasi</h3>

        <a href="{{ $details['url'] }}">Verifikasi</a>
        <p>{{ $details['url'] }}</p>
    </center>
    <p>
        Terima kasih telah melakukan registrasi
    </p>
</body>
</html>