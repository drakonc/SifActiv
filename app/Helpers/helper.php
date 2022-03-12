<?php

class Helper {

    public static function Buscar_Valor($json, $key){
        if($json == null):
            return null;
        else:
            $json = $json;
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
                    'getHome' => 'Puede Ver la Pantalla de Inicio.',
                ]
            ],
        ];
    
        return $p;
    }

}