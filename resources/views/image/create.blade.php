@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Subir Imagen</div>

                <div class="card-body">
                    <form action="{{ route('saveimg') }}" 
                    method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">
                               Descripcion</label>
                            <div class="col-md-6">
                                <input id="descripcion" name="descripcion" type="text" 
                                class="my-2 form-control" required>
                            </div>

                            <label for="imagen" class="col-md-4 col-form-label text-md-right">
                               Imagen</label>
                            <div class="col-md-6">
                                <input id="imagen" name="imagen" type="file" 
                                class="my-2 form-control" required>
                            </div>

                            <label for="imagen" class="col-md-4 col-form-label text-md-right">
                            </label>
                            <div class="col-md-6">
                                <input type="submit" class="my-2 btn btn-success" 
                                value="Subir Imagen">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
