@extends('admin.layouts.app')
@push('css')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$template->title}}                
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$template->title}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> Detail {{$template->title}}</h3>                            
                        </div>
                        <div class="box-body">  
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:200px"></th>
                                        <th style="width:20px"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>                                                                                       
                                        <tr>
                                            <td>Nama Bayi</td>
                                            <td>:</td>
                                            <td>{{$data->nama_bayi}}</td>
                                        </tr>                                       
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td>:</td>
                                            <td>{{$data->tempat_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>{{$data->tgl_lahir}}</td>
                                        </tr>                                       
                                        <tr>
                                            <td>Golongan Darah</td>
                                            <td>:</td>
                                            <td>{{$data->golongan_darah}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ibu</td>
                                            <td>:</td>
                                            <td>{{$data->ibu->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Bapak</td>
                                            <td>:</td>
                                            <td>{{$data->bapak->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td>{{$data->agama}}</td>
                                        </tr>
                                    </tbody>
                                </tbody>
                            </table>                            
                        </div>
                        <div class="box-footer">                                
                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                        </div>                        
                    </div>

                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> Data Pendataan Bayi</h3>     
                            <a href="{{route('admin.bayi.createData',[$data->id])}}" class="btn btn-primary pull-right">Tambah Data</a>                       
                        </div>
                        <div class="box-body"> 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>                                        
                                        <th>Tanggal</th>
                                        <th>Berat</th>
                                        <th>Panjang</th>
                                        <th>Lingkar Kepala</th>
                                        <th>Imunisasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendataan as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{date('d-m-Y',strtotime($value->tgl_pendataan))}}</td>
                                            <td>{{$value->berat_badan}}</td>
                                            <td>{{$value->panjang_badan}}</td>
                                            <td>{{$value->lingkar_kepala}}</td>
                                            <td>{{$value->vaksin->nama_vaksin}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">                                
                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                        </div>
                        
                    </div>

                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> Grafik Pemberian Imunisasi Dasar Lengkap</h3> 
                        </div>
                        <div class="box-body"> 
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Umur (Bulan)</th>
                                        <th>0</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12+</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Vaksin</td>
                                        <td colspan="12" class="text-center">Tanggal Pemberian Imunisasi</td>
                                    </tr>                                  

                                    @foreach($vaksinWajib as $key => $value)
                                        <tr>
                                            <td>{{$value->nama_vaksin}}</td>
                                            {!!AppHelper::renderVaksin($value->bulan_0,0,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_1,1,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_2,2,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_3,3,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_4,4,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_5,5,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_6,6,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_7,7,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_8,8,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_9,9,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_10,10,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_11,11,$pendataan,$value,$data)!!}
                                            {!!AppHelper::renderVaksin($value->bulan_12,12,$pendataan,$value,$data)!!}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">                                
                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                        </div>
                        
                    </div>

                    
                </div>
           </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <!-- page script -->
    <script>
    $(function () {
        $('#datatables').DataTable()
        $('#full-datatables').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
@endpush