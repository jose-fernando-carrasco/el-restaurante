<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oferta_menu extends Model
{
    use HasFactory;
    protected $table='ofertaespecial_alimentos';

    protected $fillable=['fecha_inicio','fecha_final','alimento_id','ofertaespecial_id'];
}
