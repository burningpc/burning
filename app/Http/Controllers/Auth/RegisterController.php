<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Cliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
            'lastname' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:9', 'unique:users'],
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
            'lastname' => $data['lastname'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'typeuser'=> $data['typeuser'],
            'estado'=> $data['estado'],
            'password' => Hash::make($data['password']),
        ]);
        if ($data['typeuser'] === 'Cliente') { //Registra en tabla cliente a clientes 
            $newcliente= new cliente;
            $newcliente->name = $data['name'];
            $newcliente->lastname1 = $data['lastname'];
            $newcliente->lastname2 = 'Campo vacio';
            $newcliente->city = 'Campo vacio';
            $newcliente->commune = 'Campo vacio';
            $newcliente->addres  = 'Campo vacio';
            $newcliente->number = 0;
            $newcliente->email = $data['email'];
            $newcliente->dni = $data['dni'];
            $newcliente->typeuser = "Cliente";
        $newcliente->save();
        }
        
        return view('/home');     

        
    }

    public function index()
    {
        $usuarios = user::get();

        return view('usuarios.show',compact('usuarios'));
    }

    public function edit(User $usuario)
    {   
        if (auth::user()->typeuser == "Administrador"){
            return view('usuarios.edit',[ 
                'usuario' =>  $usuario
            ]);
        }
        else{
            return view('usuarios.editsc',[ 
                'usuario' =>  $usuario
            ]);
        }
        
    }

    public function update(user $usuarios)
    {   
        if (auth::user()->typeuser == "Administrador"){
            $usuarios->update([
                'name' => request('name'),
                'lastname' => request('lastname'),
                'email' => request('email'),
                'dni' => request('dni'),
                'password' => Hash::make(request('password')),
            ]);
    
            return view('/home');
        }
        else{
            $usuarios->update([
                'name' => request('name'),
                'lastname' => request('lastname'),
                'email' => request('email'),
                'dni' => request('dni'),
            ]);
    
            return view('/home');
    }


    }    

    public function update2(User $usuarios)
    {
        $usuarios->update([
            'name' => request('name'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'dni' => request('dni'),
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
    public function eliminarc($id)
    {   
        
        $usuaris = User::find($id);
        $usuaris->delete();
        
        $usuarios = user::get();

        return view('/home');

    }


}
