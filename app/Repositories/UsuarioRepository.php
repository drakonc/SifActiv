<?php

namespace App\Repositories;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRepository extends BaseRepository {

    public function __construct(Usuario $usuario) {
        parent::__construct($usuario);
    }

    public function CrearRegistro(FormRequest $request) {
       
    }

    public function ActualizarRegistro(Request $request, Usuario $usuario) {
       
    }

    public function EliminarRegistro(Usuario $usuario) {
        
    }

}