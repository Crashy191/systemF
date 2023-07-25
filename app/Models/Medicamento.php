<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre','detalles','slug','fecha_vencimiento','lote','registro_invima','imagen','precio','status','cantidad'];
}
