<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
class reserva extends Model
{
    use HasFactory;

    protected $table='reservas';

    protected $fillable=['fecha','hora','cantidad'];
}
