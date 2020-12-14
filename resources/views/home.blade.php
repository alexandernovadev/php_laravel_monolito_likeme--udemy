@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.alert')

            @foreach ($images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
            
            {{-- PAGINACION --}}
            {{-- La paginacion de Laravel muy easy --}}

            <div class="clearfix"></div>
            <div class="container w3-center">
                {{ $images->links()}} 
            </div>
        </div>
    </div>
</div>
@endsection
