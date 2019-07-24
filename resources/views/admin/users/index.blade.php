@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Basic table -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{$title}}</h5>
                <a class="btn btn-primary" href="/users/create">Crear Nuevo</a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
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
