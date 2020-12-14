@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.alert')

            <div class="card">
                <div class="card-header">Configuracion de Cuenta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateuser') }}"
                    enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">
                               Nick</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control 
                                @error('nick') is-invalid @enderror" name="nick" 
                                value="{{ Auth::user()->nick }}" required autocomplete="nick" 
                                autofocus>

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                               Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control 
                                @error('name') is-invalid @enderror" name="name" 
                                value="{{ Auth::user()->name }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">
                               Apellidos</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control 
                                @error('surname') is-invalid @enderror" name="surname" 
                                value="{{ Auth::user()->surname }}" required autocomplete="surname" >

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control
                                 @error('email') is-invalid @enderror" name="email" 
                                 value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="container">
                            <img src="" class="img-fluid" alt="">
                        </div> --}}
                       
                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">
                                Imagen</label>

                            <div class="col-md-6">

                                @if(Auth::user()->image)
                                <img src="{{ route('user.avatar',['filename'=>Auth::user()->image])}}" 
                                    width="200" alt="Imagen Avatar user" class="img-thumbnail my-2">
                                @endif
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Sube Avatar</label>
                                    <input type="file"  id="customFile" class="custom-file-input
                                    @error('image_path') is-invalid @enderror" name="image_path" 
                                    value="{{ Auth::user()->image }}" required autocomplete="image_path">
   
                                   @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                </div>
                            </div>
                        </div>
                 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
