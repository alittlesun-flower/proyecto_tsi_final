<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;
    protected $table = "reparaciones";
    public function gastos(){
        return $this->hasMany(Gasto::class);
    }
    public $primaryKey = 'id';
}
