<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'permisos',
        'estado'
    ];

    public function r_usuarios() {
        return $this->hasMany(Usuario::class, 'id');
    }

    public function getEstatusAttribute(){
        if($this->estado === 1)
            return 'Activo';
        return 'Inactivo';
    }

}
