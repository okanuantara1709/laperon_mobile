@extends('home.layouts.app')
@push('css')
     <link rel="stylesheet" href="{{asset("css/flexslider.css")}}">
@endpush
@section('content')

    
    <section>
        <div class="col-md-12" style="margin-top:100px">
            {!!Alert::showAlert()!!}
            <div class="container">
                <div class="row">
                    <div class="col-md-8 flexslider">   
                        <ul class="slides">
                            @foreach($properti->foto as $key => $value)
                                <li>
                                    <img src="{{asset("image/$value->foto")}}" alt="gambar villa" width="100%">
                                </li> 
                            @endforeach                           
                        </ul>                     
                    </div>

                    <div class="col-md-4">
                        <h2>{{$properti->nama_properti}}</h2>
                        <h4>Kategori :{{$properti->kategori->nama_kategori}}</h4>
                        <h4>Rp. {{number_format($properti->harga)}}</h4>
                        <p>
                            {!!$properti->deskripsi!!}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-md-12 map">
                        <div id="google_map" style="height:300px">Load Map</div>
                    </div>
                    
                </div>
                <div class="row">
                    <br>
                    <div class="col-md-12 form-wrapper">
                        <h1>Hubungi Marketing Kami</h1>
                        <form action="{{route('home.store')}}" method="post" class="form">
                            @csrf
                            <div class="row"> 
                                <input type="hidden" name="properti_id" value="{{$properti->id}}">                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telpon</label>
                                        <input type="text" name="telepon" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Pesan</label>
                                        <textarea  name="pesan" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-danger">Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')  
<script src="{{asset("js/jquery.flexslider.js")}}"></script>
    <script>
        var lat = @php echo $properti->lat @endphp

        var lng = @php echo $properti->lng @endphp

        var map, marker;
         function initMap(){
            console.log('INIT MAP');
            var myLatLng = {lat: lat, lng: lng};         

            map = new google.maps.Map(document.getElementById('google_map'), {
                zoom: 15,
                center: myLatLng
            });  

            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:true,
                title: 'Lokasi Properti Anda'
            });

            google.maps.event.addListener(map,'click', function(event){
                marker.setPosition(event.latLng);
                console.log(event);
                $('.lat').val(event.latLng.lat);
                $('.lng').val(event.latLng.lng);                
            });
        }

       
        $('.flexslider').flexslider({
            animation: "slide"
        });
        
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?key={{config('erapandawa.API_GOOGLE_MAP')}}&callback=initMap"></script>
@endpush