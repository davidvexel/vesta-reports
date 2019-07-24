@extends('layouts.admin')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Reportes</span> - Importación</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <a href="#" class="btn btn-labeled btn-labeled-right bg-primary">Button <b><i class="icon-menu7"></i></b></a>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Form layouts -->
        <div class="row">
            <div class="col-md-8">

                <!-- Horizontal form -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Importar Reporte</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('import-report') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Cliente</label>
                                <div class="col-lg-9">
                                    <select name="client" class="form-control" required>
                                        <option value="1">Selecciona el cliente</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                        <option value="5">Option 5</option>
                                        <option value="6">Option 6</option>
                                        <option value="7">Option 7</option>
                                        <option value="8">Option 8</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Reporte CSV</label>
                                <div class="col-lg-9">
                                    <input type="file" name="report" class="form-control" required>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Importar <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /horizotal form -->

            </div>

            <div class="col-md-4">

                <!-- Vertical form -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Instrucciones</h5>
                    </div>

                    <div class="card-body">
                        <p>En esta sección podras importar un nuevo reporte, el formato...</p>
                    </div>
                </div>
                <!-- /vertical form -->

            </div>
        </div>
        <!-- /form layouts -->

    </div>
    <!-- /content area -->
@endsection
