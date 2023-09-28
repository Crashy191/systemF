<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 'nombre_medicamento', 'precio_medicamento', 'nombre', 'direccion', 'cantidad', 'total',   'paid_status', // Asegúrate de agregar estas columnas
        'paid_id','status'];


        public function medicamentos()
        {
            return $this->belongsToMany(Medicamento::class)
                ->withPivot(['cantidad', 'precio_unitario', 'total']);
        }
}


