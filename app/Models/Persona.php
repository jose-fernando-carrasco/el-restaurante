<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';

    protected $fillable=['nombre','apellido','correo','fecha_nacimiento','direccion'];

    public function user()
    {
        return $this->hasOne(User::class, 'persona_id');
    }

    public function cliente()
    {
        return $this->hasOne(cliente::class,'persona_id');
    }

    public function cajero()
    {
        return$this->hasOne(cajero::class,'persona_id');
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class,'persona_id');
    }
}
