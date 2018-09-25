<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Helpers\Render;
use App\User;
use App\Kategori;

class KategoriController extends Controller
{

    private $template = [
        'title' => 'Kategori',
        'route' => 'kategori',
        'menu' => 'kategori',        
        'icon' => 'fa fa-tags'
    ]; 
    
    private function form(){
        

        return $form = [
            ['label' => 'Nama kategori','name' => 'nama_kategori'],            
        ]; 
    }
    
    public function index()
    {
        $template = (object) $this->template;
        $data = Kategori::all();
        // resources/views/admin/kategori/index.blade.php
        return view('admin.kategori.index',compact('template','data'));
    }
    
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.kategori.create',compact('template','form'));
    }

   
    public function store(Request $request)
    {        
        $data = $request->all();
        Kategori::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('kategori.index'));
    }

    
    public function show($id)
    {
        $data = Kategori::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        return view('admin.kategori.show',compact('template','data'));
    }

    
    public function edit($id)
    {
        $data = Kategori::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.kategori.edit',compact('template','form','data'));
    }

    
    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        Kategori::find($id)->update($data);
        Alert::make('success','Berhasil ubah data');
        return redirect(route('kategori.index'));
    }

   
    public function destroy($id)
    {
        //
    }
}
