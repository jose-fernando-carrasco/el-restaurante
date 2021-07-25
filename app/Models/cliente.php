<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table='clientes';

    protected $fillable=['carnet_identidad','persona_id'];

    public function persona(){
        $this->belongsTo(Persona::class,'persona_id');
    }
}
