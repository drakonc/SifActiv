<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'permisos'
    ];

    public function r_usuarios() {
        return $this->hasMany(Usuarios::class, 'id');
    }

}
