<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicamento;
use Illuminate\Support\Str;
class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos=Medicamento::orderBy('id')->get();
        return view('backend.medicamento.index',compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.medicamento.create');
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
        $medicamentos = Medicamento::findOrFail($id);
        return view('backend.medicamento.edit', compact('medicamentos'));

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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
