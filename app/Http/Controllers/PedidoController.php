<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Medicamento;
use Illuminate\Http\Request;
class PedidoController extends Controller
{

    public function index()
    {
        $pedidos=Pedido::orderBy('id')->get();


        return view('backend.pedidos.index', compact('pedidos'));
    }

    // Rest of the controller methods...

public function create()
{
    $medicamentos = Medicamento::all();
    return view('backend.pedidos.create', compact('medicamentos'));
}
public function store(Request $request)
{
    // Validar los datos enviados por el formulario
    $request->validate([
        'medicamento_id' => 'required|exists:medicamentos,id',
        'cantidad' => 'required|integer|min:1',
        // Agrega aquí más reglas de validación si es necesario
    ]);

    // Calcular el precio unitario del medicamento
    $medicamento = Medicamento::findOrFail($request->medicamento_id);
    $precioUnitario = $medicamento->precio;

    // Calcular el total del pedido
    $total = $precioUnitario * $request->cantidad;

    // Crear el pedido en la base de datos
    Pedido::create([
        'medicamento_id' => $request->medicamento_id,
        'cantidad' => $request->cantidad,
        'precio_unitario' => $precioUnitario,
        'total' => $total,
        'fecha_venta' => now(),
        'nombre_medicamento'=> $request->nombre_medicamento,
    ]);

    return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente.');
}
public function edit($id)
{
    $pedidos = Pedido::findOrFail($id);
    $medicamentos = Medicamento::all();
    return view('backend.pedidos.edit', compact('pedidos', 'medicamentos'));
}
public function update(Request $request, $id)
{
    // Validar los datos enviados por el formulario
    $request->validate([
        'medicamento_id' => 'required|exists:medicamentos,id',
        'cantidad' => 'required|integer|min:1',
        // Agrega aquí más reglas de validación si es necesario
    ]);

    // Calcular el precio unitario del medicamento
    $medicamento = Medicamento::findOrFail($request->medicamento_id);
    $precioUnitario = $medicamento->precio;

    // Calcular el total del pedido
    $total = $precioUnitario * $request->cantidad;

    // Actualizar el pedido en la base de datos
    $pedido = Pedido::findOrFail($id);
    $pedido->update([
        'medicamento_id' => $request->medicamento_id,
        'cantidad' => $request->cantidad,
        'precio_unitario' => $precioUnitario,
        'total' => $total,
        'fecha_venta' => now(),
    ]);

    return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
}
public function destroy($id)
{
    $pedido = Pedido::findOrFail($id);
    $pedido->delete();

    return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente.');
}


}
