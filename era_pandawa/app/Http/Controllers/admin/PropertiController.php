<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Helpers\Render;
use App\Helpers\AppHelper;
use App\Properti;
use App\Kategori;
use App\Foto;
use Auth;


class PropertiController extends Controller
{

    private $template = [
        'title' => 'Properti',
        'route' => 'properti',
        'menu' => 'properti',        
        'icon' => 'fa fa-bank'
    ]; 
    
    private function form(){     
        $kategori = Kategori::select('id as value','nama_kategori as name')->get();
        return $form = [
            ['label' => 'Nama properti','name' => 'nama_properti'],            
            ['label' => 'Kategori','name' => 'kategori_id','type' => 'select','option' => $kategori],
            ['label' => 'user_id','type' => 'hidden','name' => 'user_id','value' => Auth::guard('admin')->user()->id], 
            ['label' => 'Deskripsi','name' => 'deskripsi', 'type' => 'ckeditor'], 
            ['label' => 'Alamat','name' => 'alamat', 'type' => 'textarea'],
            ['label' => 'Harga','name' => 'harga'],  
            ['label' => 'Lokasi','type' => 'map'],       
        ]; 
    }
    
    public function index()
    {
        $template = (object) $this->template;
        $data = Properti::all();
        
        // resources/views/admin/properti/index.blade.php
        return view('admin.properti.index',compact('template','data'));
    }
    
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.properti.create',compact('template','form'));
    }

   
    public function store(Request $request)
    {        
        $data = $request->all();
        Properti::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('properti.index'));
    }

    
    public function show($id)
    {
        $data = Properti::find($id);                      
        // dd($pendataan);
        $template = (object) $this->template;
        return view('admin.properti.show',compact('template','data'));
    }

    
    public function edit($id)
    {
        $data = Properti::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.properti.edit',compact('template','form','data'));
    }

    
    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        Properti::find($id)->update($data);
        Alert::make('success','Berhasil ubah data');
        return redirect(route('properti.index'));
    }

   
    public function destroy($id)
    {
        //
    }

    private $templateForm = [
        'title' => 'Foto',
        'route' => 'properti',
        'menu' => 'properti',        
        'icon' => 'fa fa-user'
    ];

    private function formFoto($id){       

        return $form = [
            ['label' => 'properti_id','name' => 'properti_id','type' => 'hidden','value' => $id],
            ['label' => 'Foto','name' => 'foto','type' => 'file'],           
        ]; 
    }

    public function createFoto($id){
        $template = (object) $this->templateForm;
        $form = $this->formFoto($id);
        return view('admin.properti.createFoto',compact('template','form'));
    }

    public function storeFoto(Request $request)
    {        
        // dd($request->all());
        $file = $request->file('foto');

        $foto = new Foto;        
        $foto->properti_id = $request->properti_id;
        $foto->foto = $file->getClientOriginalName();
        $request->file('foto')->move("image/", $foto->foto);
        $foto->save();
        Alert::make('success','Sukses tambah foto');
        return redirect(route('properti.show',[$request->properti_id]));
    }

    public function deleteFoto($id)
    {
        $delete = Foto::find($id)->delete();
        Alert::make('success','Sukses hapus gambar');
        return back();
    }
}
