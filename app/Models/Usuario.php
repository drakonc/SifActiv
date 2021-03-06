<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombres',
        'apellidos',
        'usuario',
        'email',
        'password',
        'rol_id',
        'estado'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function r_role() {
        return $this->belongsTo(Role::class,'rol_id');
    }

    public function getEstatusAttribute(){
        if($this->estado === 1)
            return 'Activo';
        return 'Inactivo';
    }

    public function getNombreCompletoAttribute(){
        return $this->nombres .' '. $this->apellidos;
    }
}
