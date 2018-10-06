<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Properti;
use App\Kategori;
use App\Pemesanan;
use Alert;

class HomeController extends Controller
{
    public function index(){
        $properti = Properti::all();
        $kategori = Kategori::all();
        return view('home.index',compact('properti','kategori'));
    }

    public function show($id){
        $properti = Properti::find($id);
        return view('home.show',compact('properti'));
    }

    public function store(Request $request){
        // dd($request->all());
        Pemesanan::create($request->all());
        Alert::make('success','Anda berhasil mengirim pesan, Marketing kami akan menghubungi anda');
        return back();
    }

    public function contact(){
        return view('home.contact');
    }
}
