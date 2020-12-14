@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                @if(Auth::user()->image)
                <div class="row">
                    <div class="col-4 pl-5">
                        <div class="avatar_mask_profile m-3 ">
                            <img src="{{ route('user.avatar',['filename'=>Auth::user()->image])}}" 
                             alt="Imagen Avatar user" class="img-fuid">
                        </div>
                    </div>
                    <div class="col-6 pt-3 w3-red">
                        <span class="w3-xxlarge">{{ $user->name .' '. $user->surname   }} </span><br>
                        <span class="w3-xlarge w3-text-grey">{{'@'. $user->nick }} </span><br>
                        <span class="w3-large"> {{'Se unio hace: '.  \FormatTime::LongTimeFilter($user->created_at) }} </span>
  
                    </div>
                </div>
              
                @endif
            </div>
            <hr>
            @foreach ($user->images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
        </div>
    </div>
</div>
@endsection
