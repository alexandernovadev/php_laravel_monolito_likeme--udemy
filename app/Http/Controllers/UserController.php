<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index($search = null)
    {
        if(!empty($search))
        {
            $users = User::where('nick', 'like', '%'.$search.'%')
                         ->orWhere('name', 'like', '%'.$search.'%')
                         ->orWhere('surname', 'like', '%'.$search.'%')
                         ->orderBy('id', 'desc')
                         ->paginate(3);
        }
        else
        {
            $users = User::orderBy('id', 'desc')->paginate(3);
        }


        return view('user.index', [
            'users' => $users
        ]);
    }

    public function config()
    {
        return view('user.configuser');
    }

    public function update(Request $request)
    {
    //  var_dump( $request->file('image_path')); die();

        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request,[
            'name' => 'required|String|max:255',
            'surname' => 'required|String|max:255',
            'email' => 'required|String|email|max:255|unique:users,email,'.$id,
            'nick' => 'required|String|max:255|unique:users,nick,'.$id
        ]);

        // Si hay un error para la ejecucion y manda el error al formulario


        // Recojer Datos del Usuario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $nick = $request->input('nick');

        // Actulizar los campos nuevos, Al obejeto Auth del User

        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Subir Imagen, Si llega
        $imagenuser = $request->file('image_path');
        if(is_object($imagenuser))
        {
            $newNameimg = time().$imagenuser->getClientOriginalName();

            // Llamar el Storague
            \Storage::disk('users')->put($newNameimg, \File::get($imagenuser));
            // Put: nombre del archivo, archivo que va a guardar
            $user->image = $newNameimg;
        }

        // Ejecuta la consulta a la base de datos
        $user->update();

        // Ejecutar Consulta a la base de datos
        return redirect()->route('config')
                         ->with(['messague'=> 'Usuario Actualizado']);

    }

    public function getImage($filename)
    {
        $file = \Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('user.profile',[
            'user' => $user
        ]); 
    }
}
