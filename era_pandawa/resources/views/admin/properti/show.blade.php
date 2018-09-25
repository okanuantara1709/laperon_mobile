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
                                            <td>Nama Properti</td>
                                            <td>:</td>
                                            <td>{{$data->nama_properti}}</td>
                                        </tr>                                       
                                        <tr>
                                            <td>kategori</td>
                                            <td>:</td>
                                            <td>{{$data->kategori->nama_kategori}}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>{{$data->alamat}}</td>
                                        </tr>                                       
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($data->harga)}}</td>
                                        </tr>                                       
                                        <tr>
                                            <td>Map</td>
                                            <td>:</td>
                                            <td><div id='google_map' style='height:400px;'></div></td>
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
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> Foto {{$template->title}}</h3>    
                            <a href="{{route("$template->route".'.createFoto',[$data->id])}}" class="btn btn-primary pull-right">
                                <i class="fa fa-pencil"></i> Tambah Foto {{$template->title}}
                            </a>                        
                        </div>
                        <div class="box-body"> 
                            <div class="row">
                                @foreach($data->foto as $key => $value) 
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <img src="{{asset("image/$value->foto")}}" alt="" width="100%">
                                        </div>
                                        <div class="col-md-12">
                                            <a href="{{route('properti.deleteFoto',[$value->id])}}" onclick="return confirm('Hapus ?');" class="btn btn-danger btn-block">Hapus Foto</a>
                                        </div>
                                    </div> 
                                @endforeach  
                            </div>
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
        var map, marker;
         function initMap(){
            console.log('INIT MAP');
            var myLatLng = {lat: -8.604342, lng: 115.188044};         

            map = new google.maps.Map(document.getElementById('google_map'), {
                zoom: 12,
                center: myLatLng
            });  

            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:true,
                title: 'Lokasi Properti Anda'
            });            
        }
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDX5i1N1RR3DSQTIRu0ZbIyTgorg7Rhg_g&callback=initMap"></script>
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