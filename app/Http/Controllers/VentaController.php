<?php

namespace App\Http\Controllers;
use App\Models\Facturacion;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
 public function index()
    {
        $ventas=Venta::orderBy('id')->get();


        return view('backend.ventas.index', compact('ventas'));
    }

}
