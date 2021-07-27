<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table='facturas';

    protected $fillable=['nombre_cliente','fecha','monto','nit'];



    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }
}
