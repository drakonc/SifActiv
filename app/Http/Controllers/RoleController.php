<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Http\Requests\Role\CrearRoleRequest;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository){
        $this->middleware('auth');
        //$this->middleware('permisos');
        $this->roleRepository = $roleRepository;
    }

    public function ObtenerTodoActivo(){
        $roles = $this->roleRepository->ObtenerTodoActivo();
        $datos = ['roles'=>$roles];
        return view('roles.listar',$datos);
    }

    public function GetCearRole(){
        return view('roles.crear');
    }

    public function PostCearRole(CrearRoleRequest $request){
        $respuesta = $this->roleRepository->CrearRegistro($request);
        if ($respuesta['status'] == 404){
            return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }else if ($respuesta['status'] == 200){
            return redirect('/roles')->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }else{
            return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }
    }

    public function GetEditRole($id) {
        $role = $this->roleRepository->ObtenerUnoActivo($id);
        if(empty($role)){
            return back()->with('message','Usuario no Encontrado')->with('typealert','danger')->withInput();
        }else{
            return view('roles.editar')->with('role',$role);
        }
    }

    public function PostEditRole(Request $request,Role $id){
        $respuesta = $this->roleRepository->ActualizarRegistro($request,$id);
        if ($respuesta['status'] == 404){
            return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }else if ($respuesta['status'] == 200){
            return redirect('/roles')->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }else{
            return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
        }
    }

    public function GetEliminarRole($id) {
        $role = $this->roleRepository->obtenerUnoActivo($id);
        if(!empty($role)) {
            if($role->r_usuarios->count() == 0){
                $respuesta = $this->roleRepository->EliminarRegistro($role);
                if ($respuesta['status'] == 200){
                    return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
                }else{
                    return back()->with('message',$respuesta['message'])->with('typealert',$respuesta['typealert'])->withInput();
                }
            }else{
                return back()->with('message','Error al Eliminar, Existen Usuarios Asociados al Rol')->with('typealert','warning')->withInput();
            }        
        }else {
            return back()->with('message','Error al Eliminar, El Role No Existe')->with('typealert','warning')->withInput();
        }
    }
}
