<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oferta_alimento extends Model
{
    use HasFactory;
    protected $table='ofertaespecial_alimentos';

    protected $fillable=['fecha_inicio','fecha_final','ofertaespecial_id','alimento_id'];
}
