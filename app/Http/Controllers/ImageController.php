<?php

namespace App\Http\Controllers;

use App\Image;
use App\Comment;
use App\Like;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }   

    public function editview($id)
    {
        $image = Image::find($id);

        return view('image.edit',[
            'image' => $image
        ]);
    }   

    public function saveImg(Request $request)
    {
        $imagen = new Image();
        $id = \Auth::user()->id;
        $imagen_user = $request->file('imagen');
        $descripcion = $request->input('descripcion');

        $validate = $this->validate($request,[
            'descripcion'=> 'String|max:255|required',
            'imagen'=> 'required|image'
        ]);

        // Subir Imagen Al servidor
        if(is_object($imagen_user))
        {
            $newNameimg = time().$imagen_user->getClientOriginalName();
            
            \Storage::disk('images')->put($newNameimg, \File::get($imagen_user ));
        }

        $imagen->description = $descripcion;
        $imagen->user_id = $id;
        $imagen->image_path = $newNameimg;

        $imagen->save();

        return redirect()->route('home')
                    ->with(['messague'=> 'Imagen Subida Correctamente']);
    }

    public function getImage($filename)
    {
        $img =\Storage::disk('images')->get($filename);
        return new Response($img, 200);
    }

    public function detail($id)
    {
        $image = Image::find($id);

        return view('image.detail')
        ->with(['image'=> $image]);
    }

    public function editpost(Request $request, $id)
    {
        $image = Image::find($id);
        $imagen_user = $request->file('imagen');
        $descripcion = $request->input('descripcion');

        $validate = $this->validate($request,[
            'descripcion'=> 'String|max:255|required',
            'imagen'=> 'image'
        ]);

        // Subir Imagen Al servidor
        if($imagen_user != null && is_object($imagen_user))
        {
            // TODO boorar Imagen old
            $newNameimg = time().$imagen_user->getClientOriginalName();
            
            \Storage::disk('images')->put($newNameimg, \File::get($imagen_user ));
            \Storage::disk('images')->delete($image->image_path);

            // Upate datos
         
            $image->image_path = $newNameimg;
        }
    
        $image->description = $descripcion;
        $image->save();

        return redirect()->route('home')
        ->with(['messague'=> 'Imagen Editada Correctamente']);
    
    }

    public function deletepost($id)
    {
        $user = \Auth::user();
        $image = Image::find($id);

        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();


        if($user && $image->user_id == $user->id )
        {
            if($comments && count($comments)>= 1)
            {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }
            if($likes && count($likes)>= 1)
            {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            \Storage::disk('images')->delete($image->image_path);
            $image->delete();
        
        }
        
        return redirect()->route('home')
        ->with(['messague'=> 'Imagen Eliminada']);
    }
}
