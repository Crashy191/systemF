<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
{
    $carrito = session('carrito', []);
    return response()->json($carrito);
}

public function agregar(Request $request)
{
    $producto = $request->input('producto');
    $cantidad = $request->input('cantidad', 1);

    $carrito = session('carrito', []);
    if (isset($carrito[$producto])) {
        $carrito[$producto]['cantidad'] += $cantidad;
    } else {
        $carrito[$producto] = ['cantidad' => $cantidad];
    }
    session(['carrito' => $carrito]);

    return response()->json(['message' => 'Producto agregado al carrito']);
}

public function eliminar(Request $request)
{
    $producto = $request->input('producto');
    $carrito = session('carrito', []);
    unset($carrito[$producto]);
    session(['carrito' => $carrito]);

    return response()->json(['message' => 'Producto eliminado del carrito']);
}

public function vaciar()
{
    session(['carrito' => []]);
    return response()->json(['message' => 'Carrito vaciado']);
}

}
