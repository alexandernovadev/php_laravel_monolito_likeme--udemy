@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card my-3">
                
                <div class="card-header">
                    @if ( $image->user->image)
                        <div class="avatar_mask float-left">
                            <img src="{{ route('user.avatar',['filename'=>  $image->user->image]) }}" 
                            class="img-fluid" alt="User Avatar">
                        </div>
                    @endif
                    <a href="" class="nav-link text-dark">
                        <span class="float-left ml-3">
                            <b>{{ $image->user->name }}</b> |
                            <b class="text-secondary">{{  $image->user->nick }}</b>
                        </span>
                    </a>
                </div>

                <div class="card-body tarjetaimagen">
                    <div class="float-left mb-3">
                        <img src="{{ route('image.user',['filename'=>  $image->image_path]) }}" 
                        class="img-fluid imagenhome" alt="Image User">
                    </div>

                    <div class="mx-4 mt-5">
                        <b class="text-secondary">{{  $image->user->nick }}
                        | {{ \FormatTime::LongTimeFilter($image->created_at) }}</b>
                        <p>{{ $image->description }}</p>    
                    </div>

                    <div class="mx-4 mb-2">
                        {{ count($image->likes) }}

                        {{-- Recorro los likes si el usuario le pertenece el like pinta el corazon rojo --}}
                        @php
                            $user_like = false;
                            foreach ($image->likes as $like)
                            {
                                if($like->user->id == Auth::user()->id)
                                {
                                    $user_like = true;
                                }
                            }
                        @endphp

                        @if (!$user_like)
                        
                            <img src="{{ asset('img/heart-black.png') }}" 
                            width="25" class="img-fluid mr-2 pointer btn-like"
                            alt="" data-id="{{ $image->id}}"> 

                        @else
                            <img src="{{ asset('img/heart-red.png') }}" 
                            width="25" class="img-fluid mr-2 pointer btn-dislike"
                            alt="" data-id="{{ $image->id}}"> 
                        @endif
                        
                        <a href="" class="btn btn-small btn-warning">
                            Comentarios ({{ count($image->comments) }})
                        </a>
                    </div>
                    
                        <div class="mx-4 my-3">
                               @if ( Auth::user() &&  $image->user->id == Auth::user()->id )
                               <div class="border p-3">
                                   {{-- <a href="{{ route('image.delete',['id'=>$image->id]) }}" class="btn btn-sm btn-danger">Borrar</a> --}}
                                   <a href="{{ route('image.edit',['id'=>$image->id]) }}" class="btn btn-sm btn-primary">Actualizar</a>
                                   <a href="{{ route('image.deletepost',['id'=>$image->id]) }}" class="btn btn-sm btn-danger">Borrar</a>
                                </div>
                               @endif
                                

                                <h2>Comentarios ({{ count($image->comments) }})</h2>
                                <hr>
                                @include('includes.alert')
                            <form method="POST" action="{{ route('comment.img') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="idimg" 
                                    value="{{$image->id}}"/>
                                </div>
                                <div class="form-group">
                                    <textarea name="comentario" id="comentario" 
                                    class="form-control @error('comentario') is-invalid @enderror" 
                                    placeholder="Escribe Tu comenterio" rows="2" autofocus required
                                    >
    
                                    </textarea>
                                    @error('comentario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-block btn-primary">
                                    Comentar
                                </button>
                            </form>

                            @foreach ($image->comments as $comment)
                            <div class="mx-4 mt-3">
                                @if ( $comment->user->image)
                                    <div class="avatar_mask float-left mr-3">
                                        <img src="{{ route('user.avatar',['filename'=>  $comment->user->image]) }}" 
                                        class="img-fluid" alt="User Avatar">
                                    </div>
                                @endif
                                <b class="text-secondary">{{  $comment->user->nick }}
                                | {{ \FormatTime::LongTimeFilter($comment->created_at) }}</b>
                                <p>{{ $comment->content }}</p>   
                                      
                               @if ($comment->user->id == \Auth::user()->id)
                                    <a href="{{ route('delete.comment', 
                                    ['id' =>$comment->id,
                                    'id_img' => $image->id]) }}" 
                                        class="btn btn-danger btn-removecomment "
                                        data-toggle="tooltip" data-placement="top" 
                                        title="Eliminar Comentario">

                                       <img src="{{ asset('img/remove.png') }}" alt="Delete comment"
                                       class="img-fluid" width="20">
                                    </a>
                               @endif
                               
                 
                            </div> <hr>
                            @endforeach
                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
