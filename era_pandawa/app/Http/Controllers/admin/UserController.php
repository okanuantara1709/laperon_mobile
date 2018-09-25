<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Alert;
use App\Helpers\Render;
use App\User;

class UserController extends Controller
{

    private $template = [
        'title' => 'User',
        'route' => 'user',
        'menu' => 'user',        
        'icon' => 'fa fa-users'
    ]; 
    
    private function form(){
        $jenis_kelamin = [
            ['value' => 'Laki-laki','name' => 'Laki-Laki'],
            ['value' => 'Perempuan','name' => 'Perempuan']
        ]; 
        
        $status = [
            ['value' => 1,'name' => 'Aktif'],
            ['value' => 0,'name' => 'Tidak Aktif']
        ];

        $role = [
            ['value' => 'Admin','name' => 'Admin'],
            ['value' => 'Operator','name' => 'Operator']
        ];
        
        return $form = [
            ['label' => 'Nama User','name' => 'nama'],
            ['label' => 'Telepon','name' => 'telepon'],
            ['label' => 'Jenis Kelamin','name' => 'jenis_kelamin','type' => 'select','option' => $jenis_kelamin],
            ['label' => 'Status','name' => 'status','type' => 'select','option' => $status],
            ['label' => 'Role','name' => 'role','type' => 'select','option' => $role],
            ['label' => 'Email','name' => 'email','type' => 'email'],
            ['label' => 'Password','name' => 'password','type' => 'password'],
        ]; 
    }
    
    public function index()
    {
        $template = (object) $this->template;
        $data = User::all();
        // resources/views/admin/user/index.blade.php
        return view('admin.user.index',compact('template','data'));
    }
    
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.user.create',compact('template','form'));
    }

   
    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|unique:user',
            'password' => 'required|confirmed|min:6'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['status'] = 1;
        User::create($data);

        Alert::make('success','Berhasil simpan data');
        return redirect(route('user.index'));
    }

    
    public function show($id)
    {
        $data = User::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        return view('admin.user.show',compact('template','data'));
    }

    
    public function edit($id)
    {
        $data = User::find($id);
        // dd($data->nama);
        $template = (object) $this->template;
        $form = $this->form();
        return view('admin.user.edit',compact('template','form','data'));
    }

    
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'email' => "required|unique:user,email,$id",
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = $request->all();
        if($request->password == ''){
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($request->password);
        }

        User::find($id)->update($data);
        Alert::make('success','Berhasil ubah data');
        return redirect(route('user.index'));
    }

   
    public function destroy($id)
    {
        //
    }
}
