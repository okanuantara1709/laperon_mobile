@extends('home.layouts.app')
@push('css')
   
@endpush
@section('content')
    <section>
        <div class="col-sm-12 header">
            <div class="row">
                <img src="{{asset('image/bg-header.jpg')}}" alt="gambar villa" width="100%">
                <div class="layout">
                    <div class="layout-wrapper">
                        <div class="img-box">
                            <img src="{{asset('image/logo.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <h1 class="text-center">Era Pandawa</h1>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi consectetur inventore ad! Libero vero qui architecto aspernatur reprehenderit, repellendus quo, autem veritatis non dignissimos optio esse dolorum illum, commodi accusamus?
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <h1 class="text-center">Produk</h1>
                    <ul style="padding-left:0px;">
                        <li data-filter="all" class="filtr-button active filtr btn btn-default">Semua</li>
                        @foreach($kategori as $key => $value)
                            <li data-filter="{{$value->id}}" class="filtr-button filtr  btn btn-default">{{$value->nama_kategori}}</li>
                        @endforeach
                    </ul>
                    <div class="row filtr-container">
                        @foreach($properti as $key => $value)
                            <div class="col-sm-12 col-md-4 produk filtr-item" data-category="{{$value->kategori_id}}">
                                <div class="produk-img">
                                    <img src="{{asset("image")."/".$value->fotoDepan->foto}}" alt="" width="100%">
                                </div>                                
                                <div class="produk-text">                                    
                                    <div class="row ">
                                        <div class="col-sm-12 " >
                                            <a href="{{route('home.show',[$value->id])}}" class="produk-title">{{$value->nama_properti}}</a>
                                        </div>
                                        <div class="col-sm-12 produk-price">
                                            Rp. {{number_format($value->harga)}}
                                        </div>
                                        <div class="col-sm-12 produk-desc">
                                            Kategori :{{$value->kategori->nama_kategori}}
                                        </div>
                                        <div class="col-sm-12 text-right">
                                            <a href="{{route('home.show',[$value->id])}}" class="btn btn-danger">Lihat Produk</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js') 
    
    <script>
        var filterizd = $('.filtr-container').filterizr({
           //options object
        });

        $(".filtr-button").click(function(){
            $(".filtr-button").removeClass('active');
            $(this).addClass('active');
        })
    </script>
@endpush