<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

       public function index()
       {
        $categories = Category::all();
        return view('backend.category.index', compact("categories"));
       }
       public function create(){
         return view('backend.category.create');


       }
       public function store(Request  $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',


            'summary' => 'nullable|string',

            'status' => 'required|in:active,inactive',
        ]);

        $status = Category::create($data);

        if ($status) {
            request()->session()->flash('success', 'Categoria agregada exitosamente');
        } else {
            request()->session()->flash('error', 'No se pudo agregar la categoria');
        }

        return redirect()->route('categories.index');

       }


       public function edit(string $id)
       {

        $category=Category::findOrFail($id);

           return view('backend.category.edit')->with('category',$category);

       }


        public function update(Request $request, Category $category)
        {
            $data = $request->validate([
                'title' => 'required|string|max:255',
              'summary' => 'nullable|string',

                'status' => 'required|in:active,inactive',
            ]);


            $category->update($data);

            return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente.');
        }

       /**
        * Remove the specified resource from storage.
        */
       public function destroy(string $id)
       {
           $categories = Category::findOrFail($id);
           $categories->delete();

           return redirect()->route('categories.index')->with('success', 'Categoria eliminada exitosamente.');

       }
   }