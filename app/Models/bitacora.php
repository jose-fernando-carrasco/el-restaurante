<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    use HasFactory;
    protected $table='bitacoras';

    protected $fillable=['usuario','tabla','descripcion','user_id'];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
