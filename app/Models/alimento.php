<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alimento extends Model
{
    use HasFactory;
    protected $table='alimentos';

    protected $fillable=['nombre','precio','cantidad','imagen','descripcion'];
    public function pedidos(){
        return $this->belongsToMany(pedido::class);
    }
    public function menus(){
        return $this->belongsToMany(menu::class);
    }
    public function ofertaespecials(){
        return $this->belongsToMany(ofertaespecial::class);
    }
}
