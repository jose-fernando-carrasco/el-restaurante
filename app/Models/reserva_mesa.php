<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva_mesa extends Model
{
    use HasFactory;
    protected $table='reservas_mesas';

    protected $fillable=['estado','reserva_id','mesa_id'];
}
