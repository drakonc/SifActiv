<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Role;
use Str;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permisos');
    }

    public function getHome() {
        $users = Usuario::count();
        $roles = Role::count();
        $data = ['users'=>$users, 'roles'=>$roles];
        return view('dashboards.home',$data);
    }
}
