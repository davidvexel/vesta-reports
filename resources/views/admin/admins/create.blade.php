@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente">
                    </div>
                    <div class="form-group">
                        <label>Correo:</label>
                        <input type="emaik" name="email" class="form-control" placeholder="Correo electronico">
                    </div>
                    <div class="form-group">
                        <label>Teléfono:</label>
                        <input type="phone" name="phone" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label>Compañia:</label>
                        <input type="text" name="company" class="form-control" placeholder="Nombre de la compañia">
                    </div>
                    <div class="form-group">
                        <label>RFC:</label>
                        <input type="text" name="rfc" class="form-control" placeholder="RFC del cliente">
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" name="password" class="form-control" placeholder="Ingresar la contraseña">
                    </div>
                    <div class="form-group">
                        <label>Repetir contraseña:</label>
                        <input type="password" name="c_password" class="form-control" placeholder="Ingresa la contraseña nuevamente">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
