<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Usuario\CrearUsuarioRequest;

class UsuarioController extends Controller
{
    
    private $usuarioRepository;
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository, UsuarioRepository $usuarioRepository){
        $this->roleRepository = $roleRepository;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function ObtenerTodoActivo(){
        $usuarios = $this->usuarioRepository->ObtenerTodoActivo();
        $datos = ['usuarios'=>$usuarios];
        return view('usuarios.listar',$datos);
    }

    public function GetCearUsuarios(){
        $select['valor'] = 'nombre';
        $select['clave'] = 'id';
        $roles = $this->roleRepository->ObtenerTodoActivoPluck($select); 
        return view('usuarios.crear')->with('roles',$roles);
    }

    public function PostCearUsuarios(CrearUsuarioRequest $request){
        $respuesta = $this->usuarioRepository->CrearRegistro($request);
        if ($respuesta['status'] == 200){
            return redirect('/usuarios')->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }else{
            return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }
    }

}
