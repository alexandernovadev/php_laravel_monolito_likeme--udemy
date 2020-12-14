<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear(Request $request)
    {
        $id = \Auth::user()->id;
        $id_img = $request->input('idimg');
        $comentario_user = $request->input('comentario');

        $validate = $this->validate($request,[
            'comentario'=> 'string|required',
            'idimg'=> 'int|required'
        ]);

        $comentario = new Comment();
        $comentario->user_id = $id;
        $comentario->image_id = $id_img;
        $comentario->content = $comentario_user;
        
        $comentario->save();

        return redirect()->route('image.detail',['id'=>$id_img])
                ->with(['messague'=>'Comentario Agregado']);
    }
    
    public function delete($id, $id_img)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->route('image.detail',['id'=>$id_img])
                    ->with(['messague'=> 'Comentario Eliminado']);
    }
}
