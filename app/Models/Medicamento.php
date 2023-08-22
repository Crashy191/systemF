<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre','detalles','slug','fecha_vencimiento','lote','registro_invima','cat_id','imagen','precio','status','cantidad'];
        public function pedidos()
        {
            return $this->belongsToMany(Pedido::class)
                ->withPivot(['cantidad', 'precio_unitario', 'total']);
        }
        public function cat_info(){
            return $this->hasOne('App\Models\Category','id','cat_id');
        }

        public function medicamentos(){
            return $this->hasMany('App\Models\Medicamento','cat_id','id')->where('status','active');
        }
}
