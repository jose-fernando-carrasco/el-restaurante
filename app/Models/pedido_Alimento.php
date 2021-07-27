<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido_Alimento extends Model
{
    use HasFactory;
    protected $table='pedidos_alimentos';

    protected $fillable=['cantidad','pedido_id','alimento_id'];
}
