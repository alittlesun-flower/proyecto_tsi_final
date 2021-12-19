<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;
    
    protected $table = "boletas";
    //boleta
    public function gastos(){
        return $this->hasMany(Gasto::class);
    }
    public function domicilios(){
        return $this->belongsTo(Domicilio::class);
    }
    public $primaryKey = 'id';
}
