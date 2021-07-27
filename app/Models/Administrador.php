<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    use HasFactory;
    protected $table='administradores';

    protected $fillable=['profesion','persona_id'];

    public function persona(){
        $this->belongsTo(Persona::class,'persona_id');
    }
    public function ofertasespeciales(){
        return $this->hasMany(ofertaespecial::class);
    }
    public function menus(){
        return $this->hasMany(menu::class);
    }
}
