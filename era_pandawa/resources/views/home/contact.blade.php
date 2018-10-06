@extends('home.layouts.app')
@push('css')
     <link rel="stylesheet" href="{{asset("css/flexslider.css")}}">
@endpush
@section('content')

    
    <section>
        <div class="col-md-12" style="margin-top:100px">
            {!!Alert::showAlert()!!}
            <div class="container" style="min-height:500px">
                <div class="col-md-6">
                    <img src="{{asset('image/bg-header.jpg')}}" alt="gambar villa" width="100%">
                </div>
                <div class="col-md-6">
                    <h1 style="margin-top:0px;">Contact Era Pandawa</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ullam sint consequatur deserunt obcaecati mollitia perspiciatis laborum, itaque earum quas aut possimus id impedit tempore laboriosam officia? Impedit, ea ad.</p>
                    <table class="table">
                        <thead>
                            <tr style="display:none">
                                <th></th>
                                <th style="width:20px;"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>Jalan Jala Jalan Jalan Jalan Jalan</td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td>Jalan Jala Jalan Jalan Jalan Jalan</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>Jalan Jala Jalan Jalan Jalan Jalan</td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')  

@endpush