<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;
    protected $table = "domicilios";
    public function gastos(){
        return $this->hasMany(Gasto::class);
    }
    public function boletas(){
        return $this->hasMany(Boleta::class);
    }
    public $primaryKey = 'id';
}
