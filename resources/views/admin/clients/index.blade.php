@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Basic table -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{$title}}</h5>
                <a class="btn btn-primary" href="{{ url('/clients/create') }}">Crear Nuevo</a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="list-icons">
                                        <a href="{{ url('clients/edit/'. $user->id) }}" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
                                        <form action="{{ url('clients/destroy/' . $user) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="list-icons-item text-danger-600" onclick="confirm('{{ __("¿Estás seguro que deseas eliminar este usuario?") }}') ? this.parentElement.submit() : ''">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->
@endsection
