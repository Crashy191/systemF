<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\Venta;
use Illuminate\Support\Str;
class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();

        $medicamentos=Medicamento::orderBy('id')->get();
        return view('backend.medicamento.index',compact('medicamentos'),compact('categories'));
           }
    public function filter(Request $request)
{ $categories=Category::all();
    $query = Medicamento::query();



    if ($request->has('categoria')) {
        $query->where('cat_id', $request->categoria); // Asumiendo que el campo en la tabla es 'categoria_id'
    }


    $medicamentos = $query->get();

    return view('backend.medicamento.index', compact('medicamentos'), compact('categories'));
}

    public function list()
    {
        try {
            $medicamentos = Medicamento::all();
            return response()->json($medicamentos);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los medicamentos'], 500);
        }
    }

    public function confirmarCompra(Request $request) {
        try {
            $medicamentosCompra = $request->input('medicamentos');
            $totalCompra = $request->input('total');
            $productosResumidos = [];
            foreach ($medicamentosCompra as $medicamento) {
                $producto = Medicamento::find($medicamento['id']);
                if ($producto) {
                    // Restar la cantidad comprada del inventario del medicamento
                    $producto->cantidad -= $medicamento['cantidad'];
                    $producto->save();

                    // Agregar el nombre y cantidad al array de productos resumidos
                   /* $productosResumidos[] = [
                        'nombre' => $producto->nombre,
                        'cantidad' => $medicamento['cantidad']
                    ];*/
                    $productosResumidos[] = "{$producto->nombre} - Cantidad: {$medicamento['cantidad']}";
                }
            }
            $data['productos'] = implode(', ', $productosResumidos);
           // $data['productos'] = json_encode($productosResumidos);
            $data['total'] = $totalCompra;
            $data['fecha_venta'] = now();

            $venta = Venta::create($data);
            if ($venta) {
                request()->session()->flash('success', 'Venta Realizada con Éxito');
            } else {
                request()->session()->flash('error', 'Ha ocurrido un error mientras intentaba realizar la Venta');
            }
            return response()->json(['message' => 'Compra registrada con éxito'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al registrar la compra'], 500);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();

        return view('backend.medicamento.create')->with('categories',$categories);
    }


        public function store(Request $request)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'detalles' => 'required|string',
                'fecha_vencimiento' => 'required|date',
                'status' => 'required|in:active,inactive',
                'registro_invima' => 'required|string|max:255',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'precio' => 'required|numeric',
                'cantidad' => 'required|integer|min:0',
                'lote' => 'required|string',
                'cat_id'=>'required|exists:categories,id',

            ]);

            $data = $request->all();

            // Procesar y almacenar la imagen
            if ($request->hasFile('imagen')) {
                $image = $request->file('imagen');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $data['imagen'] = $imageName;
            }

            $slug = Str::slug($request->nombre);
            $count = Medicamento::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug;

            $medicamento = Medicamento::create($data);

            if ($medicamento) {
                request()->session()->flash('success', 'Medicamento successfully added');
            } else {
                request()->session()->flash('error', 'Error occurred while adding medicamento');
            }

            return redirect()->route('medicamento.index');
        }


        /*
        $request->validate([
            'nombre' => 'required|string|max:255',
            'detalles' => 'required|string',
            'fecha_vencimiento' => 'required|date',
            'status' => 'required|in:active,inactive', // Validar que el campo "status" sea active o inactive
            'registro_invima' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de ajustar las reglas de validación para la imagen según tus necesidades
            'precio' => 'required|numeric',
            'lote' => 'required|string|max:255',
            // Agrega más reglas de validación según tus necesidades
        ]);

        // Guardar la imagen en el sistema de archivos
        $imagenNombre = time() . '.' . $request->imagen->getClientOriginalExtension();
        $request->imagen->move(public_path('imagenes'), $imagenNombre);

        // Crear el nuevo medicamento en la base de datos
        $medicamentos = new Medicamento([
            'nombre' => $request->nombre,
            'detalles' => $request->detalles,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'status' => $request->status,
            'registro_invima' => $request->registro_invima,
            'imagen' => $imagenNombre,
            'precio' => $request->precio,
            'lote' => $request->lote,
            // Agrega más campos según tus necesidades
        ]);
        $medicamentos->save();

        // Redirigir a la página de detalles del medicamento recién creado
        return redirect()->route('medicamentos.show', $medicamento->id)
            ->with('success', 'Medicamento creado exitosamente.');
            */




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $medicamentos = Medicamento::findOrFail($id);

        return view('backend.medicamento.edit', [
            'medicamentos' => $medicamentos,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $medicamentos = Medicamento::findOrFail($id);

        $this->validate($request,[
            'nombre' => 'required|string|max:255',
            'detalles' => 'required|string',
            'fecha_vencimiento' => 'required|date',
            'status' => 'required|in:active,inactive',
            'registro_invima' => 'required|string|max:255',
            'cat_id'=>'required|exists:categories,id',

            'precio' => 'required|numeric',
            'cantidad' => 'required|integer|min:0',
            'lote' => 'required|string',
        ]);

        $data=$request->all();
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['imagen'] = $imageName;
        }
        $status=$medicamentos->fill($data)->save();
        if($status){
            request()->session()->flash('success','Banner successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating banner');
        }

        // Si se ha subido una nueva imagen, actualizarla


        $medicamentos->save();

        return redirect()->route('medicamento.index')->with('success', 'Medicamento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicamentos = Medicamento::findOrFail($id);
        $medicamentos->delete();

        return redirect()->route('medicamento.index')->with('success', 'Medicamento eliminado exitosamente.');

    }
}
