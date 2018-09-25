<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $template = [
        'title' => 'Dasboard',
        'route' => 'dashboard',
        'menu' => 'dashboard',        
        'icon' => 'fa fa-home'
    ]; 

    public function index(){
        $template = (object) $this->template;
        return view('admin.dashboard.index',compact('template'));
    }
}
