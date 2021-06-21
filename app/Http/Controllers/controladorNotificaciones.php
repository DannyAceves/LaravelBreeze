<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloNotificaciones;
use App\Models\modeloCategoriasNotificaciones;

class controladorNotificaciones extends Controller
{
    public function store(Request $request){            // Creacion del metodo Store (llenado de datos) con la variable request para recibir. quiza para añadir notificaciones
        $registro=request()->all();                 // todos los datos.
        //tbh copy paste
        if($request->hasFile('foto')){              // Creamos una comparación para hacer una validación para nuestra foto.
            
            $file=$request->file('foto');
            $nombre_imagen = time().$file->getClientOriginalName();  // Le asignamos la fecha de subida de nuestro archivo.
            $file->move(public_path().'/perfiles/',$nombre_imagen);  // Usamos el metodo move para darle un espacio de guardado de a nuestra imagen.
        }

    }

    public function notificaciones_generales(){                                         // metodo para llamar las notificaciones en general
        //generales
        $notificaciones = modeloNotificaciones::all();                                  // todos los datos de notificaciones.
        $catnotificaciones = modeloCategoriasNotificaciones::all();                     // todos los datos de categorias de notificaciones.
        //alumnos
        $consultaextraA = modeloNotificaciones::all()->whereBetween('id_categoria',[6,10]);
        $anotificaciones = modeloNotificaciones::all()->whereBetween('id_categoria',[0,4])->union($consultaextraA);                                  // todos los datos de notificaciones.
        $acatnotificaciones = modeloCategoriasNotificaciones::all();
        //profesores        
        $pnotificaciones = modeloNotificaciones::all()->whereBetween('id_categoria',[4,10]);                                  // todos los datos de notificaciones.
        $pcatnotificaciones = modeloCategoriasNotificaciones::all();
        return view('notificaciones', compact('notificaciones','catnotificaciones','anotificaciones','acatnotificaciones','pnotificaciones','pcatnotificaciones'));   // regresamos los datos a la vista de notificaciones.
    }

    public function sessionnotificaciones(){                                         // metodo para llamar las notificaciones en general
        //generales
        $notificaciones = modeloNotificaciones::all();                                  // todos los datos de notificaciones.
        $catnotificaciones = modeloCategoriasNotificaciones::all();                     // todos los datos de categorias de notificaciones.
        //alumnos
        $consultaextraA = modeloNotificaciones::all()->whereBetween('id_categoria',[6,10]);
        $anotificaciones = modeloNotificaciones::all()->whereBetween('id_categoria',[0,4])->union($consultaextraA);                                  // todos los datos de notificaciones.
        $acatnotificaciones = modeloCategoriasNotificaciones::all();
        //profesores        
        $pnotificaciones = modeloNotificaciones::all()->whereBetween('id_categoria',[4,10]);                                  // todos los datos de notificaciones.
        $pcatnotificaciones = modeloCategoriasNotificaciones::all();
        return view('sessions/sessionnotificaciones', compact('notificaciones','catnotificaciones','anotificaciones','acatnotificaciones','pnotificaciones','pcatnotificaciones'));   // regresamos los datos a la vista de notificaciones.
    }

    public function solo_categorias(){
        $catnotificaciones = modeloCategoriasNotificaciones::all();//->whereBetween('id_categoria',[0,4]);                     // todos los datos de categorias de notificaciones.
        return view('welcome',compact('catnotificaciones'));
    }
}
