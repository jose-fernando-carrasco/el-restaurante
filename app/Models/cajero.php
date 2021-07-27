<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cajero extends Model
{
    use HasFactory;
    protected $table='cajeros';

    protected $fillable=['profesion','carnet_identidad','persona_id'];

    public function persona(){
        $this->belongsTo(Persona::class,'persona_id');
    }
}
