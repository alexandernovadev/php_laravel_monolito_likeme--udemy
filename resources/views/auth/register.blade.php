@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">
                               Nick</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control 
                                @error('nick') is-invalid @enderror" name="nick" 
                                value="{{ old('nick') }}" required autocomplete="nick" autofocus>

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
                                value="{{ old('name') }}" required autocomplete="name" >

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
                                value="{{ old('surname') }}" required autocomplete="surname" >

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
                                 value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                    Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control 
                                @error('password') is-invalid @enderror" name="password" 
                                required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" 
                            class="col-md-4 col-form-label text-md-right">
                            Confirma Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" 
                                class="form-control" name="password_confirmation" 
                                required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5" style="text-align: center">
            <div class="stage">
                <div class="box bounce-4">
                    <img src="{{ asset('img/insta.png') }}" 
                    width="100%" class="img-fluid mr-2 pointer "
                    alt="" > 
                </div>
            </div>
         
            <p class="title__nav" style="font-size: 2rem">Like ME</p>
        </div>
    </div>
</div>
@endsection
