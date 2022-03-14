<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioController extends Controller
{
    
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository){
        $this->usuarioRepository = $usuarioRepository;
    }

    public function ObtenerTodoActivo(){
        $usuarios = $this->usuarioRepository->ObtenerTodoActivo();
        $datos = ['usuarios'=>$usuarios];
        return view('usuarios.listar',$datos);
    }
}
