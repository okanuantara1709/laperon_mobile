<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>Document</title>
    <style>
        .col12 {
            width: 100%;
            float: left;
        }

        .col8 {
            width: 66.6%;
            float: left;
        }

        .col2 {
            width: 16.66%;
            float: left;
        }

        .col4 {
            width: 33.33%;
            float: left;
        }

        .col3 {
            width: 25%;
            float: left;
        }

        .align-center {
            text-align: center;
        }

        h3 {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        h5 {
            margin-top: 0px;
        }

        .hr {
            width: 100%;
            float: left;
            border: 2px solid black;
            margin-top: 5px;
        }

        .judul-surat {
            text-align: center;
            text-decoration: underline;
            margin-top: 25px;
        }

        .nomor-surat {
            text-align: center;
            margin-top: 10px;
        }

        li {
            list-style-type: none;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        td {
            border: 1px solid gray;
        }
    </style>
</head>

<body>
    <div class="col12">
        <div class="col2" style="">
            <img src="{{config('constant.logo')}}" alt="" width="80px">
        </div>
        <div class="col8 align-center">
            <h3>MANAJEMEN BAYI</h3>
            <h3>NAMA DESA</h3>
            <h5>ALAMAT</h5>
        </div>
        <div class="hr"></div>
    </div>

    <div class="col12">
        <h3 class="judul-surat">LAPORAN ORANG TUA</h3>
        <br>
    </div>

    <div class="col12">
       <table class="table" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bayi</th>                                        
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->nama_bayi}}</td>                                            
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>