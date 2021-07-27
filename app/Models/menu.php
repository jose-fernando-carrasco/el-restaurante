<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $table='menu';

    protected $fillable=['fecha','nombre','admin_id'];
    public function alimentos(){
        return $this->belongsToMany(alimento::class);
    }
    public function administrador(){
      return  $this->belongsTo(administrador::class);
    }
}
