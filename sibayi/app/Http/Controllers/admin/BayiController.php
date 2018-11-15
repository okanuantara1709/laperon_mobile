<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Helpers\Render;
use App\Helpers\AppHelper;
use App\OrangTua;
use App\Bayi;
use App\Pendataan;
use App\Vaksin;
use Auth;


class BayiController extends Controller
{

    private $template = [
        'title' => 'Bayi',
        'route' => 'bayi',
        'menu' => 'bayi',        
        'icon' => 'fa fa-user'
    ]; 
    
    private function form(){
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

        $ibu = OrangTua::select('id as value','nama as name')->where('jenis_kelamin','Perempuan')->get();
        $bapak = OrangTua::select('id as value','nama as name')->where('jenis_kelamin','Laki-laki')->get();

        return $form = [
            ['label' => 'Nama bayi','name' => 'nama_bayi'],            
            ['label' => 'Tempat Lahir','name' => 'tempat_lahir'],
            ['label' => 'Tanggal Lahir','name' => 'tgl_lahir','type' => 'datepicker'],            
            ['label' => 'Golongan Darah','name' => 'golongan_darah','type' =>'select','option'=> $gol_darah],
            ['label' => 'Agama','name' => 'agama','type' =>'select','option'=>$agama],
            ['label' => 'Ibu','name' => 'ibu_id','type' =>'select','option'=>$ibu],
            ['label' => 'Bapak','name' => 'bapak_id','type' =>'select','option'=>$bapak],
        ]; 
    }
    
    public function index()
    {
        $template = (object) $this->template;
        $data = Bayi::all();
        
        // resources/views/admin/bayi/index.blade.php
        return view('admin.bayi.index',compact('template','data'));
    }
    
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.bayi.create',compact('template','form'));
    }

   
    public function store(Request $request)
    {        
        $data = $request->all();
        Bayi::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('bayi.index'));
    }

    
    public function show($id)
    {
        $data = Bayi::find($id);
        $pendataan = Pendataan::where('bayi_id',$id)->get();
        $vaksinWajib = Vaksin::where('kategori','Wajib')->get();
        // dd($pendataan);
        $template = (object) $this->template;
        return view('admin.bayi.show',compact('template','data','pendataan','vaksinWajib'));
    }

    
    public function edit($id)
    {
        $data = Bayi::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.bayi.edit',compact('template','form','data'));
    }

    
    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        Bayi::find($id)->update($data);
        Alert::make('success','Berhasil ubah data');
        return redirect(route('bayi.index'));
    }

   
    public function destroy($id)
    {
        //
    }

    private $templateForm = [
        'title' => 'Data',
        'route' => 'bayi',
        'menu' => 'bayi',        
        'icon' => 'fa fa-user'
    ];

    private function formData($id){        
        $agama = [
            ['value' => 'Islam','name' => 'Islam'],
            ['value' => 'Hindu','name' => 'Hindu'],
        ];  
        
        $vaksin = Vaksin::all();
        $imunisasi = [];
        foreach ($vaksin as $key => $value) {
            $array = ['value' => $value->id,'name' => $value->nama_vaksin];
            $imunisasi[] = $array;
        }

        $user_id = Auth::guard('admin')->user()->id;

        return $form = [
            ['label' => 'bayi_id','name' => 'bayi_id','type' => 'hidden','value' => $id],
            ['label' => 'user_id','name' => 'user_id','type' => 'hidden','value' => $user_id],
            ['label' => 'Berat Badan (kg)','name' => 'berat_badan'],            
            ['label' => 'Panjang Badan (cm)','name' => 'panjang_badan'],
            ['label' => 'Lingkar Kepala (cm)','name' => 'lingkar_kepala'], 
            ['label' => 'Tanggal Pendataan','name' => 'tgl_pendataan','type' => 'datepicker'],              
            ['label' => 'Imunisasi','name' => 'vaksin_id','type' => 'select','option' => $imunisasi],
        ]; 
    }

    public function createData($id){
        $template = (object) $this->templateForm;
        $form = $this->formData($id);
        return view('admin.bayi.createData',compact('template','form'));
    }

    public function storeData(Request $request)
    {        
        $data = $request->all();
        Pendataan::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('bayi.show',[$request->bayi_id]));
    }

    public function print(){
        $data = Bayi::all();
        $page = view('admin.bayi.print')->with(['data' => $data]);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($page);
        $mpdf->Output();
    }
}
