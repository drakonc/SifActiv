<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleRepository extends BaseRepository {

    public function __construct(Role $role) {
        parent::__construct($role);
    }

    public function CrearRegistro(FormRequest $request) {
        $datos['nombre'] = $request->nombre;
        $datos['permisos'] = json_encode($request->except(['_token','nombre']));
        $role = new Role();
        if(empty($request->except(['_token','nombre']))){
            $respuesta['status'] = 404;
            $respuesta['message'] = "Seleccione al menos un permiso";
            $respuesta['typealert'] = "warning";
            return $respuesta;
        }else{
            $role->nombre = $datos['nombre'];
            $role->permisos = $datos['permisos'];
            if($role->save()){
                $respuesta['status'] = 200;
                $respuesta['message'] = "Role Guardado Exitosamente";
                $respuesta['typealert'] = "succses";
                return $respuesta;
            }else{
                $respuesta['status'] = 500;
                $respuesta['message'] = "Error al Guardar el Role";
                $respuesta['typealert'] = "danger";
                return $respuesta;
            }
        }
    }

}