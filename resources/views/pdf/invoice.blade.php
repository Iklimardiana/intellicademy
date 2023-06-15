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

        .logo {
            height: 50px;
        }

        hr {
            border: 3px solid black;
            opacity: 75%;
        }

        .ttd{
            height: 70px;
        }


    </style>
</head>

<body>

    <div>
        <table style="width: 100%;">
            <colgroup>
                <col span="1" style="width: 20%;">
                <col span="1" style="width: 30%;">
                <col span="1" style="width: 30%;">
                <col span="1" style="width: 25%;">
             </colgroup>
             <tbody>
                <tr>
                    <td style="vertical-align: middle; ">
                        <h2>IntelliCademy</h2>
                    </td>
                    <td style="vertical-align: middle; ">
                        <h2>Invoice</h2>
                    </td>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle; text-align: right">
                        <img class="logo ms-3" src="./images/logo.png" alt="logo">
                    </td>
                </tr>
             </tbody>

        </table>
        
        
    </div>
    <hr>
    <div>
        <div>
            <h5><b>Kepada :</b></h5>
            <p class="my-0">{{ $transaction->User->firstName }} {{ $transaction->User->lastName }}</p>
            <p class="my-0">{{ $transaction->User->email }}</p>
        </div>
        <div>
            <h5 class="mb-0 mt-2">Tanggal : </h5>
            <p class="my-0">{{ $date }}, {{ $month }} {{ $year }}</p>
        </div>
        <div>
            <h5 class="mb-0 mt-2">Nomer Invoice</h5>
            <p class="my-0">0{{ $transaction->id }}/0{{ $transaction->User->id }}/{{ $date }}{{ $monthNum }}{{ $year }}</p>
        </div>
    </div>

    <div style="margin-top: 100px; margin-bottom: 100px">
        <table class="desc" style=" margin-left: auto; margin-right: auto; width: 50%;  text-align: center">
            <thead>
                <tr>
                    <th scope="col" style="height: 40px; background-color: rgba(176, 176, 176, 0.668); border: 1px solid rgba(176, 176, 176, 0.668);">Keterangan</th>
                    <th scope="col" style="height: 40px; background-color: rgba(176, 176, 176, 0.668); border: 1px solid rgba(176, 176, 176, 0.668);">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="height: 40px; border: 1px solid rgba(176, 176, 176, 0.668);">Course</th>
                    <td style="height: 40px; border: 1px solid rgba(176, 176, 176, 0.668);">{{ $transaction->Course->name }}</td>
                </tr>
                <tr>
                    <th scope="row" style="height: 40px; border: 1px solid rgba(176, 176, 176, 0.668);">Jumlah Modul</th>
                    <td style="height: 40px; border: 1px solid rgba(176, 176, 176, 0.668);">{{ $transaction->Course->Module->count() }}</td>
                </tr>
                <tr>
                    <th scope="row" style="height: 40px; border: 1px solid rgba(176, 176, 176, 0.668);">Harga</th>
                    <td style="height: 40px; border: 1px solid rgba(176, 176, 176, 0.668);">{{ Str::rupiah($transaction->Course->price) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table style="width: 100%;">
            <tr>
                <td></td>
                <td style="text-align: right">
                    <h5 class="mb-0 mt-2">Hormat Kami</h5>
                </td>
            </tr>
            <tr>
                <td style="text-align: left vertical-align: middle; ">
                    <h5><b>Terimakasih Atas  <br>
                        Pembayaran Course Anda</b></h5>
                </td>
                <td style="text-align: right">
                    <img class="ttd"src="./images/ttd.jpeg" alt="ttd">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right">
                    <p class="my-0">IntelliCademy</p>
                </td>
            </tr>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>