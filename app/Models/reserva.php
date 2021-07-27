<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;
    protected $table='reservas';

    protected $fillable=['fecha','hora','cantidad','cliente_id'];

    public function persona(){
        return $this->hasMany(persona::class);
    }
}
