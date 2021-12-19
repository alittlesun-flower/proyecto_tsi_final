<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table = "gastos";
    public $primaryKey = 'id';
    public function servicios(){
        return $this->belongsTo(Servicio::class);
    }
    public function reparaciones(){
        return $this->belongsTo(Reparacion::class);
    }
    public function domicilios(){
        return $this->belongsTo(Domicilio::class);
    }
    public function boletas(){
        return $this->belongsTo(Boletas::class);
    }
    
}
