<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    protected $guard = 'admins';
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'typeuser'=>['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'typeuser'=> $data['typeuser'],
            'estado'=> $data['estado'],
            'password' => Hash::make($data['password']),
        ]);
        return view('/home');
    }

    public function index()
    {
        $usuarios = user::get();

        return view('usuarios.show',compact('usuarios'));
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit',[ 
            'usuario' =>  $usuario
        ]);
    }

    public function update(user $usuarios)
    {   
        $usuarios->update([
            'name' => request('name'),
            'password' => Hash::make(request('password')),
        ]);

        return view('/home');

    }

    public function eliminar($id)
    {   
        $usuaris = User::find($id);
        $usuaris->delete();
        
        $usuarios = user::get();

        return view('usuarios.show',compact('usuarios'));

    }


}
