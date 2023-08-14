<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable=[
        'medicamento_id', 'nombre_medicamento', 'precio_medicamento', 'nombre', 'direccion', 'cantidad', 'total'];


        public function medicamentos()
        {
            return $this->belongsToMany(Medicamento::class)
                ->withPivot(['cantidad', 'precio_unitario', 'total']);
        }
}


