<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Reseller</title>
    <style>

        header{
            /* margin: auto; */
            text-align: center;
            border-bottom: 2px solid black;
            /* width: 85%; */
        }

        header p {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 0px;
        }

        header span {
            display: block;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .body {   
            /* margin: auto; */
            text-align: center;
            /* width: 75%; */
        }

        .body p {
            margin-top: 20px;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .body span {
            display: block;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .body table {
            width: 100%;
            border: 1px solid grey;
        }

        .body table th {
            border-right: 1px solid grey;
            padding: 10px 0px;
        }

        .body table td {
            text-align: center;
            border-right: 1px solid grey;
            border-top: 1px solid grey;
            padding: 10px 0px;
        }

        /* footer{
            width: 75%;
            margin: auto;
        } */

        footer table {
            /* width: 75%; */
            margin-top: 20px;
            float: right;
        }

        footer td {
            align-items: center;
            text-align: center;
        }

        footer p {
            align-items: center;
            text-align: center;
        }
    </style>

</head>

<body onload="javascript:window.print()" style="margin: 0 auto; width: 1000px;">
    <div class="" style="margin-left: 20px;"></div>
    <img src="{{ asset('fileGambar/logo.png') }}" style="width: 16%; float:left; position:absolute; z-index: 999;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td><div class="" align="center"><font size="7">Tahu Bakso Sambal Kecap Jani</font></div></td>
        </tr>
        <tr>
            <td><div class="" align="center"><font size="5">Jl. Ki Ageng Tapa, Gg. Nusa Indah. Kec. Tengah Tani, Kab. Cirebon</font></div></td>
        </tr><br><br>
    </table>

    <hr>

    <div class="body">
        <p>Data Reseller</p>
        <span>2023 - 2024</span>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>No Reseller</th>
                <th>Nama Reseller</th>
                <th>No Handphone</th>
                <th>Alamat</th>
            </tr>
            @foreach ($data as $dt)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $dt->no_reseller }}</td>
                    <td>{{ $dt->nm_reseller }}</td>
                    <td>{{ $dt->no_hp }}</td>
                    <td>{{ $dt->alamat }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <p>&nbsp;</p>

    <table align="right" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <center>Cirebon, {{ date("d F Y") }}</center>
            </td>
        </tr>
        <tr>
            <td>
                <center>Admin</center>
                <p>&nbsp;</p>
                <center>ttd. Sekar</center>
            </td>
        </tr>
    </table>

</body>
</html>
