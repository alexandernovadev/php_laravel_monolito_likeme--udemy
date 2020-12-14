@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Gente</h1> 
            <form class="row" method="GET" action="{{ route('user.index') }}" id="buscador">
            <div class="col form-group">
                <input type="text" class="form-control" id="search" 
                placeholder="Buscar gente...">
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
            </form>
            <hr>
            @foreach ($users as $user)
            <div class="row">
                <div class="col-4 pl-5">
                    <div class="avatar_mask_profile m-3 ">
                        <img src="{{ route('user.avatar',['filename'=>$user->image])}}" 
                         alt="Imagen Avatar user" class="img-fuid">
                    </div>
                </div>
                <div class="col-6 pt-3 w3-red">
                    <span class="w3-xxlarge">{{ $user->name .' '. $user->surname   }} </span><br>
                    <span class="w3-xlarge w3-text-grey">{{'@'. $user->nick }} </span><br>
                    <span class="w3-large"> {{'Se unio hace: '.  \FormatTime::LongTimeFilter($user->created_at) }} </span><br>
                    <a href="{{route('profile',['id'=>$user->id])}}" class="btn btn-success">Ver Perfil</a><br>
                </div>
            </div>
            @endforeach
            
            {{-- PAGINACION --}}
            {{-- La paginacion de Laravel muy easy --}}

            <div class="clearfix"></div>
            <div class="container w3-center">
                {{ $users->links()}} 
            </div>
        </div>
    </div>
</div>
@endsection
