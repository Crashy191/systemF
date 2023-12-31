<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Medicamento;
use App\Models\Banner;

use Illuminate\Http\Request;
use MercadoPago\Preference; // Importa la clase MercadoPago\Preference


class PedidoController extends Controller
{

    public function index()
    {
        $pedidos = Pedido::orderBy('id')->get();


        return view('backend.pedidos.index', compact('pedidos'));
    }

    // Rest of the controller methods...
    public function confirmarPedido(Request $request)
    {
        $carrito = json_decode($request->input('carrito'), true);
    
        $totalPedido = 0;
        foreach ($carrito as $producto) {
            $totalProducto = $producto['cantidad'] * $producto['precio'];
            $totalPedido += $totalProducto;
        }
    
        foreach ($carrito as $item) {
            $medicamento = Medicamento::find($item['id']);
    
            if ($medicamento) {
                // Resta la cantidad del carrito del stock del medicamento
                $medicamento->cantidad -= $item['cantidad'];
                $medicamento->save();
            }
        }
        $productosResumidos = [];
        $id_productos = "";
        foreach ($carrito as $medicamento) {
            $producto = Medicamento::find($medicamento['id']);
            if ($producto) {
        
             
                $productosResumidos[] = "{$producto->nombre} - Cantidad: {$medicamento['cantidad']}";
                $id_productos = $id_productos . $producto->id . ",";
            
            }
        }



        $data = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('tetlefono'),
            'direccion' => $request->input('direccion'),
            'informacion' => $request->input('informacion_adicional'),
            'total' => $totalPedido,
            'productos' =>  implode(', ', $productosResumidos), // Esto debería asignar un valor al campo 'productos'
            'status' => 'Pendiente',
            'products_id' => $id_productos
        ];
    
        $pedido = new Pedido(); // Crear una nueva instancia de Pedido
        $pedido->nombre = $data['nombre'];
        $pedido->email = $data['email'];
        $pedido->telefono = $data['telefono'];
        $pedido->direccion = $data['direccion'];
        $pedido->informacion = $data['informacion'];
        $pedido->total = $data['total'];
        $pedido->productos = $data['productos'];
        $pedido->status = $data['status'];
        $pedido->products_id = $data['products_id'];
        $pedido->save(); // Guardar el pedido en la base de datos
    
        if ($pedido) {
     
            return view('frontend.checkout', [
                'carrito' => $carrito,  
                'totalPedido' => $totalPedido,
                'pedidoId' => $pedido->id,
            ]);
        } else {
            request()->session()->flash('error', 'Ha ocurrido un error mientras intentaba realizar la Venta');
        }
    
        return response()->json(['mensaje' => 'Pedido confirmado con éxito']);
    }
    
    public function repetir_compra(Request $request){
        // var_dump($request->route('id'));
        $pedido = Pedido::findOrFail($request->route('id'));
        // String
        $array_ids_strings = explode(',', $pedido->products_id);
        $array_ids_strings = array_filter($array_ids_strings); 

          

        // Numerico
        $array_ids_numeric = array_map('intval', $array_ids_strings);
        // print_r($array_ids);  
        $products_list = [];
        foreach ($array_ids_numeric as $id) {
            $medicamento = Medicamento::find($id);
            if ($medicamento->cantidad != 0) {
                $products_list[] = $medicamento->id;
            }
        }
        $banners = Banner::orderBy('id')->get();
        $medicamentos = Medicamento::where('status', 'active')->orderBy('id', 'desc')->get();
        $json_products_list = json_encode($products_list);

        return view('frontend.index')->with('products_list', $json_products_list) 
        ->with('medicamentos',$medicamentos)->with('banners', $banners);

    }

    public function update_paid_status(Request $request){


        $pedido_id = $request->route('pedido_id'); 

        echo "pedido_id: " . $pedido_id;
    
        var_dump($request->all());
        echo ("Estado: ".$request['status']. " - ID: ".$request['payment_id']);
    
        // Añade un mensaje de depuración para verificar el pedido_id antes de buscarlo
        echo "Buscando pedido con ID: " . $pedido_id;
        $status = $request['status']; // Quita las comillas dobles si están presentes
        $payment_id = $request['payment_id'];

        if ($status == 'approved' || $status == 'failure' ) {
            try {
                $pedido = Pedido::findOrFail($pedido_id);
                $pedido->update([
                    'paid_status' => $status,
                    'paid_id' => $payment_id,
                    'status' => 'En Proceso',
                ]);
                $texto = $status == 'approved' ? 'Aprobado, en proceso de envio' : 'Ha fallado el pago';
                if($status == 'approved'){
                    return redirect()->route('profile')->with('success', 'Estado de pago:' . ' ' . $texto);
                }else{
                    return redirect()->route('profile')->with('success', 'Estado de pago:'.' '.$texto);
                }
              
            } catch (\Exception $e) {
                print("Error  " . $e->getMessage());
            }
        } else {
            return redirect()->route('profile')->with('error', 'No se pudo procesar.');

        }


   
    }


    public function create()
    {
        $medicamentos = Medicamento::all();
        return view('frontend.pages.create', compact('medicamentos'));
    }
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'cantidad' => 'required|numeric|min:1',
            // Agrega más reglas de validación según tus necesidades
        ]);

        // Crear un nuevo pedido utilizando los datos del formulario
        $pedido = new Pedido();
        $pedido->nombre = $request->input('nombre');
        $pedido->direccion = $request->input('direccion');
        $pedido->cantidad = $request->input('cantidad');
        // Asigna los valores del medicamento desde los campos ocultos
        $pedido->medicamento_id = $request->input('medicamento_id');
        $pedido->nombre_medicamento = $request->input('nombre_medicamento');
        $pedido->precio_medicamento = $request->input('precio_medicamento');

        // Calcular y asignar el total del pedido
        $pedido->total = $pedido->cantidad * $pedido->precio_medicamento;

        // Guardar el pedido en la base de datos
        $pedido->save();
        /**
    // Redireccionar a la página de confirmación
    return redirect()->route('pedido.confirmacion', [
        'nombre_medicamento' => $pedido->nombre_medicamento,
        'cantidad' => $pedido->cantidad,
        'precio_medicamento' => $pedido->precio_medicamento,
        'total' => $pedido->total,
    ]);
         */
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

    public function update_status(Request $request)
    
    {        
        try{
        

            
         
            $pedido_id = $request->route('id'); 
           
    
           $pedido = Pedido::findOrFail($pedido_id);
             $pedido->update([
                  'status' => $request->nuevoEstado,
             ]);
        }catch(error){

        }
        
      return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
