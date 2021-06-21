<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloCitas;

class controladorCitas extends Controller
{
    public function index(){            //Creamos un metodo index que soló nos retornará la vista registro.
        $typeusers = modeloCitas::all()->whereBetween('id_tipo', [2, 3]);
        return view('citas', compact('typeusers'));
    }
    public function sessionindex(){            //Creamos un metodo index que soló nos retornará la vista registro.
        $typeusers = modeloCitas::all()->whereBetween('id_tipo', [2, 3]);
        return view('sessions/sessioncitas', compact('typeusers'));
    }

    public function store(Request $request){        // Creacion del metodo Store (llenado de datos) con la variable request para recibir
        $citass=request()->all();                 // todos los datos.
        modeloCitas::create([                                // Despues de hacer la comparacion creamos la asignación de nuestros campos
            
            'nombre'=> $citass['nombre'],
            'fecha'=> $citass['fecha'],
            'hora'=> $citass['hora'],
            'categoria'=> $citass['categoria'],
            'asunto'=> $citass['asunto']
        ]);
        return back();

    }
}
