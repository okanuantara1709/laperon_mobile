<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Helpers\Render;
use App\User;
use App\OrangTua;

class OrangTuaController extends Controller
{

    private $template = [
        'title' => 'OrangTua',
        'route' => 'orang_tua',
        'menu' => 'orang_tua',        
        'icon' => 'fa fa-user'
    ]; 
    
    private function form(){
        $jenis_kelamin = [
            ['value' => 'Laki-laki','name' => 'Laki-Laki'],
            ['value' => 'Perempuan','name' => 'Perempuan']
        ]; 

        $agama = [
            ['value' => 'Islam','name' => 'Islam'],
            ['value' => 'Hindu','name' => 'Hindu'],
            ['value' => 'Budha','name' => 'Budha'],
            ['value' => 'Kristen Katolik','name' => 'Kristen Katolik'],
            ['value' => 'Kristen Protestan','name' => 'Kristen Protestan'],
            ['value' => 'Kong Hu Cu','name' => 'Kong Hu Cu'],
        ];
        
        $gol_darah = [
            ['value' => 'A','name' => 'A'],
            ['value' => 'B','name' => 'B'],
            ['value' => 'AB','name' => 'AB'],
            ['value' => 'O','name' => 'O'],
        ];

        return $form = [
            ['label' => 'Nama Orang Tua','name' => 'nama'],
            ['label' => 'Alamat','name' => 'alamat'],
            ['label' => 'Pekerjaan','name' => 'pekerjaan'],
            ['label' => 'Tempat Lahir','name' => 'tempat_lahir'],
            ['label' => 'Tanggal Lahir','name' => 'tgl_lahir','type' => 'datepicker'],
            ['label' => 'Pendidikan','name' => 'pendidikan'],
            ['label' => 'Jenis Kelamin','name' => 'jenis_kelamin','type' => 'select','option' => $jenis_kelamin],
            ['label' => 'Golongan Darah','name' => 'golongan_darah','type' =>'select','option'=> $gol_darah],
            ['label' => 'Agama','name' => 'agama','type' =>'select','option'=>$agama],
            ['label' => 'Telepon','name' => 'telepon','type' => 'text'],
        ]; 
    }
    
    public function index()
    {
        $template = (object) $this->template;
        $data = OrangTua::all();
        // resources/views/admin/orang_tua/index.blade.php
        return view('admin.orang_tua.index',compact('template','data'));
    }
    
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.orang_tua.create',compact('template','form'));
    }

   
    public function store(Request $request)
    {        
        $data = $request->all();
        OrangTua::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('orang_tua.index'));
    }

    
    public function show($id)
    {
        $data = OrangTua::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        return view('admin.orang_tua.show',compact('template','data'));
    }

    
    public function edit($id)
    {
        $data = OrangTua::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.orang_tua.edit',compact('template','form','data'));
    }

    
    public function update(Request $request, $id)
    {        
        $data = $request->all();
        OrangTua::find($id)->update($data);
        Alert::make('success','Berhasil ubah data');
        return redirect(route('orang_tua.index'));
    }

    public function print(){
        $data = OrangTua::all();
        $page = view('admin.orang_tua.print')->with(['data' => $data]);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($page);
        $mpdf->Output();
    }
    

   
    public function destroy($id)
    {
        //
    }
}
