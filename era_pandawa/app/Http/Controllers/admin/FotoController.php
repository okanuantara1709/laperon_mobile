<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Helpers\Render;
use App\User;
use App\Vaksin;

class VaksinController extends Controller
{

    private $template = [
        'title' => 'Vaksin',
        'route' => 'vaksin',
        'menu' => 'vaksin',        
        'icon' => 'fa fa-user'
    ]; 
    
    private function form(){
                
        $kategori = [
            ['value' => 'Wajib','name' => 'Wajib'],
            ['value' => 'Tambahan','name' => 'Tambahan'],
            ['value' => 'Lain','name' => 'Lain'],
        ];

        $jadwal = [
            ['value' => '1','name' => 'Jadwal tepat pemberian imunisasi dasar lengkap'],
            ['value' => '2','name' => 'Waktu masih diperbolehkan untuk pemberian imunisasi dasar lengkap'],
            ['value' => '3','name' => 'Waktu yang tidak diperbolehkan untuk pemberian imunisasi dasar lengkap'],
            ['value' => '4','name' => 'Waktu pemberian imunisasi bagi anak diatas 1 th yang belum lengkap'],
        ];

        return $form = [
            ['label' => 'Nama Vaksin','name' => 'nama_vaksin'],
            ['label' => 'Kategori','name' => 'kategori','type' =>'select','option' => $kategori],
            ['label' => 'Bulan 0','name' => 'bulan_0','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 1','name' => 'bulan_1','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 2','name' => 'bulan_2','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 3','name' => 'bulan_3','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 4','name' => 'bulan_4','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 5','name' => 'bulan_5','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 6','name' => 'bulan_6','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 7','name' => 'bulan_7','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 8','name' => 'bulan_8','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 9','name' => 'bulan_9','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 10','name' => 'bulan_10','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 11','name' => 'bulan_11','type' => 'select','option' => $jadwal],
            ['label' => 'Bulan 12','name' => 'bulan_12','type' => 'select','option' => $jadwal],
        ]; 
    }
    
    public function index()
    {
        $template = (object) $this->template;
        $data = Vaksin::all();
        // resources/views/admin/vaksin/index.blade.php
        return view('admin.vaksin.index',compact('template','data'));
    }
    
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.vaksin.create',compact('template','form'));
    }

   
    public function store(Request $request)
    {        
        $data = $request->all();
        Vaksin::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('vaksin.index'));
    }

    
    public function show($id)
    {
        $data = Vaksin::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        return view('admin.vaksin.show',compact('template','data'));
    }

    
    public function edit($id)
    {
        $data = Vaksin::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.vaksin.edit',compact('template','form','data'));
    }

    
    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        Vaksin::find($id)->update($data);
        Alert::make('success','Berhasil ubah data');
        return redirect(route('vaksin.index'));
    }

   
    public function destroy($id)
    {
        //
    }
}
