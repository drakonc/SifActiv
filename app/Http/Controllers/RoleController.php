<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\Role\CrearRoleRequest;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function ObtenerTodoActivo(){
        $roles = $this->roleRepository->ObtenerTodoActivo();
        $datos = ["roles"=>$roles];
        return view("roles.listar",$datos);
    }

    public function GetCearRole(){
        return view("roles.crear");
    }

    public function PostCearRole(CrearRoleRequest $request){
        $respuesta = $this->roleRepository->CrearRegistro($request);
        if ($respuesta["status"] == 404){
            return back()->with('message',$respuesta["message"])->with('typealert',$respuesta["typealert"])->withInput();
        }else if ($respuesta["status"] == 200){

        }
    }
}
