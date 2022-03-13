<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class BaseRepository {

    protected $model;
    protected $request;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function ObtenerTodoActivo() {
        return $this->model->whereEstado(true)->get();
    }

    public function ObtenerUnoActivo(int $id) {
        return $this->model->whereId($id)->whereEstado(true)->get();
    }

    public function CrearRegistro(FormRequest $request) {
        dd($request);
    }

}