<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;
    protected $table='historial';

    protected $fillable=['user','fecha','descripcion','pedido_id'];
    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }
}
