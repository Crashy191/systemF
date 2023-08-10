<?php

namespace App\Http\Controllers;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class SistemaFactura extends Controller
{
    public function index()
    {
        //$pedidos=Pedido::orderBy('id')->get();
        $medicamentos=Medicamento::orderBy('id')->get();

        return view('backend.facturas.index',compact('medicamentos'));
    }

}
