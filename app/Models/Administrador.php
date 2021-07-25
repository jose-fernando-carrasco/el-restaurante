<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table='administradores';

    protected $fillable=['profesion','persona_id'];

    public function persona(){
        $this->belongsTo(Persona::class,'persona_id');
    }
}
