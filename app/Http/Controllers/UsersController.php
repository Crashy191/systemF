<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(60);
        return view('backend.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|max:30',
            'email' => 'string|required|unique:users',
            'password' => 'string|required',
            'phone' => 'nullable|string', // Campo de teléfono
            'address' => 'nullable|string', // Campo de dirección
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->input('role');
        $data['email_verified_at'] = now();
        $data['remember_token'] = '';
        $data['created_at'] = now();
        $data['updated_at'] = now();


        $data['phone'] = $request->input('phone');
        $data['address'] = $request->input('address');
    
        $status = User::create($data);

        if ($status) {
            request()->session()->flash('success', 'Usuario agregado exitosamente');
        } else {
            request()->session()->flash('error', 'Ocurrió un error al agregar el usuario');
        }

        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('backend.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'string|required|max:30',
            'email' => 'string|required',
            'password' => 'string|required',
            'phone' => 'nullable|string', // Campo de teléfono
            'address' => 'nullable|string', // Campo de dirección
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'customer';
        $data['email_verified_at'] = now();
        $data['remember_token'] = '';
        $data['created_at'] = now();
        $data['updated_at'] = now();

        // Agregar los campos de teléfono y dirección al arreglo de datos
        $data['phone'] = $request->input('phone');
        $data['address'] = $request->input('address');

        $status = $user->fill($data)->save();

        if ($status) {
            request()->session()->flash('success', 'Actualizado exitosamente');
        } else {
            request()->session()->flash('error', 'Ocurrió un error al actualizar');
        }

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','User Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
        return redirect()->route('users.index');
    }
}
