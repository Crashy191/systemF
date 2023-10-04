<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Venta;
use App\Models\Medicamento;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function admin(){
        $ventas = Venta::select('fecha_venta', 'total', 'created_at')
        ->orderBy('fecha_venta', 'asc')
        ->get();
        $labels = $ventas->pluck('fecha_venta');
        $data = $ventas->pluck('total');
        $medicamentosBajosStock = Medicamento::where('cantidad', '<', 5)->get();

        $totalUsers = User::count();
        $totalMedicaments = Medicamento::count();
        $totalOrdersR = Pedido::count();
        $completedOrders = Pedido::where('status', 'Finalizado')->count();
        $salesPercentage = $completedOrders == 0 ? 0 : round(($completedOrders / $totalOrdersR) * 100);

        $totalOrders = Pedido::where('status', 'En Proceso')->count();
        return view('backend.index',[
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalMedicaments' => $totalMedicaments,
            'salesPercentage' => $salesPercentage,
            'medicamentosBajosStock' => $medicamentosBajosStock,
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function obtenerDatosVentas()
{
    $ventas = Venta::select('fecha_venta', 'total', 'created_at')
    ->orderBy('fecha_venta', 'asc')
    ->get();
    $labels = $ventas->pluck('fecha_venta');
    $data = $ventas->pluck('total');
    return response()->json([
        'labels' => $labels,
        'data' => $data
    ]);
}

public function obtenerDatosPedidos()
{
  // Obtener la cantidad de pedidos finalizados
  $cantidadFinalizados = Pedido::where('status', 'Finalizado')->count();

  // Obtener la cantidad de pedidos en proceso
  $cantidadEnProceso = Pedido::where('status', 'En Proceso')->count();

  // Obtener la cantidad de pedidos pendientes
  $cantidadPendientes = Pedido::where('status', 'Pendiente')->count();

  return response()->json([
      'cantidadFinalizados' => $cantidadFinalizados,
      'cantidadEnProceso' => $cantidadEnProceso,
      'cantidadPendientes' => $cantidadPendientes,
  ]);
}
}
