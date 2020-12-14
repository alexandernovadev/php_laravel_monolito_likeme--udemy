<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();
        $likes = Like::where('user_id', $user->id)
        ->orderBy('id', 'desc')->paginate(3);

        return view('like.likes',[
            'likes' => $likes
        ]);
    }

    public function like($image_id)
    {
        $user = \Auth::user();
        
        $isset_like = Like::where('user_id', $user->id)
                        ->where('image_id', $image_id)
                        ->count();

        $coontador = Like::where('image_id', $image_id)
                        ->count();

        // var_dump($isset_like); die();
        if($isset_like == 0)
        {

            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id= (int)$image_id;
            
            $like->save();
            return response()->json([
                'like' => $like,
                'contador' => $coontador+1
            ]);
        }
        else
        {
            return response()->json([
                'messague' => 'Ya Existe Like'
            ]);
        }
         //var_dump($like);

    }

    public function dislike($image_id)
    {
        $user = \Auth::user();
        
        $like = Like::where('user_id', $user->id)
                        ->where('image_id', $image_id)
                        ->first();

        $coontador = Like::where('image_id', $image_id)
        ->count();

        // var_dump($isset_like); die();
        if($like)
        {

            $like->delete();
            
            return response()->json([
                'like' => $like,
                'contador' => $coontador-1,
                'messague' => 'Like Eliminados'
            ]);
        }
        else
        {
            return response()->json([
                'messague' => 'El Like NO EXISTE'
            ]);
        }   
    }
}
