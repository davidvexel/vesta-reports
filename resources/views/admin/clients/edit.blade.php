@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">{{$error}}</div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">{{ __('Editar cliente') }} - {{ $client->name }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('clients/update/'. $client->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('Nombre') }}:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente"
                                       value="{{ old('name', $client->name) }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Correo') }}:</label>
                                <input type="emaik" name="email" class="form-control" placeholder="Correo electronico"
                                       value="{{ old('email', $client->email) }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Teléfono') }}:</label>
                                <input type="phone" name="phone" class="form-control" placeholder="Teléfono"
                                       value="{{ old('phone', $client->phone) }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Compañia') }}:</label>
                                <input type="text" name="company" class="form-control"
                                       placeholder="Nombre de la compañia"
                                       value="{{ old('company', $client->company) }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('RFC') }}:</label>
                                <input type="text" name="rfc" class="form-control" placeholder="RFC del cliente"
                                       value="{{ old('rfc', $client->rfc) }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Contraseña') }}:</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="Ingresar la contraseña">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }} <i
                                            class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Campos Visibles') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/clients/' . $client->id .'/options') }}" method="POST">
                            @csrf
                            @foreach($options as $option)
                                <div class="form-check">
                                    <input type="checkbox" id="{{ $option->id }}" name="{{ $option->id }}"
                                           class="form-check-input"
                                           @if( array_key_exists($option->key, $clientOptions ) )
                                               checked
                                           @endif
                                    >
                                    <label for="{{ $option->id }}" class="form-check-label">{{ $option->key }}</label>
                                </div>
                            @endforeach
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /content area -->
@endsection
