<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            padding: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }

        /* .navbar{
            background-color: white;
        } */

        .rightNavbar {
            left: auto !important;
            right: 0px;
        }

        .logo {
            height: 50px;
        }

        hr {
            border: 3px solid black;
            opacity: 75%;
        }

        .rightInvoice {
            float: right;
        }
        .ttd{
            height: 70px;
        }
    </style>
</head>

<body>
    <nav class="navbar mt-3">
        <div class="container-fluid">
            <h2>Invoice</h2>
            <div class="rightNavbar">
                <h2>IntelliCademy <img class="logo ms-3" src="./images/logo.png" alt="logo"></h2>
            </div>
        </div>
    </nav>
    <hr>
    <nav class="navbar mt-3 mx-3">
        <div class="container-fluid">
            <div>
                <h5><b>Kepada :</b></h5>
                <p class="my-0">{{ $transaction->User->firstName }} {{ $transaction->User->lastName }}</p>
                <p class="my-0">{{ $transaction->User->email }}</p>
            </div>
            <div class="rightNavbar">
                <h5 class="mb-0">Tanggal : </h5>
                <p class="my-0">{{ $date }}, {{ $month }} {{ $year }}</p>
                <h5 class="mb-0 mt-2">Nomer Invoice</h5>
                <p class="my-0">0{{ $transaction->id }}/0{{ $transaction->User->id }}/{{ $date }}{{ $monthNum }}{{ $year }}</p>
            </div>
        </div>
    </nav>
    <div class="justify-content-center d-flex mt-5">
        <div class="w-50 text-center ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Course</th>
                        <td>{{ $transaction->Course->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumla Modul</th>
                        <td>{{ $transaction->Course->Module->count() }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Harga</th>
                        <td>{{ Str::rupiah($transaction->Course->price) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <nav class="navbar mt-3 mx-3">
        <div class="container-fluid">
            <div>
                <h5><b>Terimakasih Atas  <br>
                    Pembayaran Course Anda</b></h5>
            </div>
            <div class="rightNavbar">
                <h5 class="mb-0 mt-2">Hormat Kami</h5>
                <img class="ttd"src="./images/ttd.jpeg" alt="ttd">
                <p class="my-0">IntelliCademy</p>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
