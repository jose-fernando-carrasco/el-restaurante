<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    use HasFactory;
    protected $table='pedidos';

    protected $fillable=['fecha','persona_id','cantidad'];
    public function persona(){
        return $this->belongsTo(persona::class);
    }
    public function cuenta()
    {
        return $this->hasOne(cuenta::class);
    }
    public function alimentos(){
        return $this->belongsToMany(alimento::class);
    }
}
