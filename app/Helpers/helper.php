<?php

namespace App\Helpers;
class Helper {

    public static function Buscar_Valor($json, $key){
        if($json == null):
            return null;
        else:
            $json = $json;
            //dd($json,$key);
            $json = json_decode($json,true);
            if(array_key_exists($key,$json)):
                return $json[$key];
            else:
                return null;
            endif;
        endif;
    }

    public static function formatLatinDate(){
        return now()->format('d-m-Y');
    }

    public static function Permisos(){
        $p = [
            'dashboard' => [
                'icon' => '<i class="fas fa-home"></i>',
                'title' => 'Modulo de Inicio',
                'key' => [
                    'VerDashboard' => 'Puede Ver la Pantalla de Inicio',
                ]
            ],
            'roles' => [
                'icon' => '<i class="fas fa-home"></i>',
                'title' => 'Modulo de Roles',
                'key' => [
                    'rolesListar' => 'Puede Listar Los Roles',
                    'rolesCrear' => 'Puede Crear Nuevos Roles',
                    'rolesEditar' => 'Puede Editar los Roles',
                    'rolesEliminar' => 'Puede Eliminar los Roles'
                ]
            ],
            'Usuarios' => [
                'icon' => '<i class="fas fa-home"></i>',
                'title' => 'Modulo de Usuarios',
                'key' => [
                    'usuariosListar' => 'Puede Listar Los Usuarios del Sistema',
                    'usuariosCrear' => 'Puede Crear Nuevos Usuarios',
                ]
            ]
        ];
    
        return $p;
    }

    public static function Estado(){
        return ['0' => 'Inactivo','1' => 'Activo'];
    }

}