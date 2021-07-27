<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alimento_menu extends Model
{
    use HasFactory;
    protected $table='menu_alimentos';

    protected $fillable=['cantidad','menu_id','alimento_id'];
}
