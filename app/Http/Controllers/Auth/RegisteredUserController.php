<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\App;
use App\Models\modeloTipousers;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $typeusers = modeloTipousers::all()->whereBetween('id_tipo', [2, 3]);   
        return view('auth.register', compact('typeusers'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if($request->hasFile('foto')){              // Creamos una comparación para hacer una validación para nuestra foto.
            $file=$request->file('foto');
            $nombre_imagen = time().$file->getClientOriginalName();  // Le asignamos la fecha de subida de nuestro archivo.
            $file->move(public_path().'/perfiles/',$nombre_imagen);  // Usamos el metodo move para darle un espacio de guardado de a nuestra imagen.
        }
        $user = User::create([
            'matricula' =>$request->matricula,
            'nombre' => $request->nombre,
            'a_pat' => $request->a_pat,
            'a_mat' => $request->a_mat,
            'telefono' =>$request->telefono,
            'direccion' =>$request->direccion,
            'id_tipo' =>$request->id_tipo,
            'cod_postal' =>$request->cod_postal,
            'fecha_nacimiento' =>$request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto'=> $nombre_imagen
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
