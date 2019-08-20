@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">{{$error}}</div>
            @endforeach
        @endif

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{ __('Crear nuevo cliente') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('users/create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="client">
                    <div class="form-group">
                        <label>{{ __('Nombre') }}:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Correo') }}:</label>
                        <input type="emaik" name="email" class="form-control" placeholder="Correo electronico">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Teléfono') }}:</label>
                        <input type="phone" name="phone" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Compañia') }}:</label>
                        <input type="text" name="company" class="form-control" placeholder="Nombre de la compañia">
                    </div>
                    <div class="form-group">
                        <label>{{ __('RFC') }}:</label>
                        <input type="text" name="rfc" class="form-control" placeholder="RFC del cliente">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Contraseña') }}:</label>
                        <input type="password" name="password" class="form-control" placeholder="Ingresar la contraseña">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Repetir contraseña') }}:</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ingresa la contraseña nuevamente">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }} <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
