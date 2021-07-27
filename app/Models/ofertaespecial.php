<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertaespecial extends Model
{
    use HasFactory;
    protected $table='ofertaespecial';

    protected $fillable=['nombre','admin_id'];
    public function alimentos(){
        return $this->belongsToMany(alimento::class);
    }
    public function administrador(){
        $this->belongsTo(administrador::class);
    }
}
