<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('livewire.frontend.home.login');
    }

    public function showCreateForm()
    {
        return view('livewire.frontend.home.register');
    }

    public function store(Request $request)
    {

        // Guardar los datos en la base de datos y redireccionar a la vista
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
            'cpassword' => 'required|min:8|max:20|same:password',
        ]);

        $user = new User;
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if ($validateData) {
            $user->save();
            Session()->flash('user_added', '¡Usuario creado correctamente!');
            return redirect()->back();
        } else {
            Session()->flash('user_error', '¡Error al crear el usuario!');
            return redirect()->back();
        }
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
        ]);

        if ($validateData) {
            $user = User::where('email', $request->input('email'))->first();
            if ($user) {
                if (password_verify($request->input('password'), $user->password)) {
                    //$request->session()->put('user_name', $user->name);
                    $request->session()->put('user_role', $user->role);
                    Session()->flash('user_login', '¡Inicio de sesión exitoso!');
                    return redirect()->route('home');
                } else {
                    Session()->flash('password_error', '¡Error, contraseña incorrecta!');
                    return redirect()->back();
                }
            } else {
                Session()->flash('email_error', '¡Error, el email no existe!');
                return redirect()->back();
            }
        } else {
            Session()->flash('error_validate', '¡Error, datos incompletos!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        Session()->flash('close_session', '¡Sesión cerrada exitosamente!');
        return redirect()->route('home');
    }
}
