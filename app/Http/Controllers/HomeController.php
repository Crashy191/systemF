<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\Pedido;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Support\Facades\Hash; // Asegúrate de importar la clase Hash
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['inicio', 'register','registerSubmit']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return redirect()->route($request->user()->role);

         }
    public function home(){
        $medicamentos=Medicamento::orderBy('id')->get();

        return view('frontend.index')->with('medicamentos',$medicamentos);

}
public function inicio(){
    $medicamentos=Medicamento::orderBy('id')->get();

    return view('frontend.index')->with('medicamentos',$medicamentos);

}
public function profile(){
    $userEmail = Auth()->user()->email;
    $pedidos = Pedido::where('email', $userEmail)->orderBy('created_at', 'desc')->get();

    return view('frontend.profile')->with('pedidos', $pedidos);

}
public function about(){

    return view('frontend.about');

}
public function contact(){

    return view('frontend.contact');

}
public function login(){
    return view('frontend.pages.login');
}
public function loginSubmit(Request $request){
    $data= $request->all();
    if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
        Session::put('user',$data['email']);
        request()->session()->flash('success','Successfully login');
        return redirect()->route('home');
    }
    else{
        request()->session()->flash('error','Invalid email and password pleas try again!');
        return redirect()->back();
    }
}

public function logout(){
    Session::forget('user');
    Auth::logout();
    request()->session()->flash('success','Logout successfully');
    return redirect()->route('inicio');
}

public function register(){
    return view('auth.register');
}
// HomeController.php

public function registerSubmit(Request $request)
{
    // Validar los datos del formulario de registro
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users|max:255',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Crear el nuevo usuario
    $user = $this->create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    // Autenticar al usuario después de registrarse
    Auth::login($user);

    // Redireccionar a la página de inicio o perfil del usuario
    return redirect()->route('inicio')->with('success', 'Registro exitoso. Bienvenido/a.');
}

// Resto de métodos en el controlador...

public function create(array $data){
    return User::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password']),
        'status'=>'active'
        ]);
}
// Reset password
public function showResetForm(){
    return view('auth.passwords.old-reset');
}


}
