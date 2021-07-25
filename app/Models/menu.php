<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $table='menu';
    protected $fillable=['nombre','fecha'];
    public function producto(){
        return $this->belongsToMany(producto::class);
    }
}
