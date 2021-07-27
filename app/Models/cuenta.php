<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuenta extends Model
{
    use HasFactory;
    protected $table='cuentas';

    protected $fillable=['fecha','descripcion','total','pedido_id'];

    public function factura()
    {
        return $this->hasOne(factura::class);
    }
    public function pedido(){
        return $this->belongsTo(pedido::class);
    }
    public function Historiales(){
        return $this->hasMany(historial::class);
    }
}
