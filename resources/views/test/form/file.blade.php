@extends('layout.layout_admin.layout')

@section('titulo_admin', 'Tienda')


@section('links_admin')

@endsection

@section('scripts_head_admin')

@endsection

@section('styles_admin')

@endsection

@section('contenido_admin')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Subir imagenes</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('test.subir_imagen') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" id="" accept="image/*">
                                @error('file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Subir imagen</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('scripts_admin')

@endsection {{-- /section - scripts_admin --}}
