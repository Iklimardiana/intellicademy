<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @page { margin: 0px; }
        body { margin: 0px; color: white}
        
        .title {
            font-size: 2.5rem;
            background-color: #0f484d;
        }

        .name {
            font-size: 4rem
        }

        .kelas {
            font-size: 2.5rem
        }

        .for {
            font-size: 1rem;
            background-color: #0f484d;
            font-weight: bold;
        }

        body {
            /* background-color: lightgray; */
            background-image: url('./images/certificate-layout.jpg');
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
        }

        .ttd {
            width:150px; 
            height: 75px;
            overflow: hidden;
            text-align: center; 
            object-fit:cover; 
            margin: auto
        }
    </style>
</head>
<body>
    <div class="text-center cover">

        <div style="margin-top: 11rem">
            <h1 class="title py-1 px-2 d-inline-block">Sertifikat Kompetensi Kelulusan</h1>
            <h4>{{ $transaction->id }}/23/I-CADEMY/{{ strtoupper(substr($month, 0, 3)) }}/{{ $year }}</h4>
        </div>

        <div style="margin-top:3rem">
            <p class="m-0 for d-inline-block py-1 px-2">Diberikan Kepada</p>
            <h2 class="name">{{ ucfirst(strtolower($user->firstName)) }} {{ ucfirst(strtolower($user->lastName)) }}</h2>

        </div>

        
        <p class="m-0 mt-3">Atas Kelulusannya Pada Kelas</p>
        <h3 class="kelas">{{ $course->name }}</h3>

        <div style="margin-top: 5rem">
            <p class="m-0 mb-2">{{ $date }} {{ $month }}, {{ $year }}</p>
                <img class="ttd mb-2" src="./images/ttd.png" alt="ttd">
            <p>Joko Widodo</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
</html>