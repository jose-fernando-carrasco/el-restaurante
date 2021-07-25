<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infor extends Model
{
    use HasFactory;


    protected $table='inforestau';
    protected $fillable=['cantidad','ubicacion'];

}
