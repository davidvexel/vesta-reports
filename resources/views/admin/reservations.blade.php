@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        <div class="card">
            <div class="card-body">
                <form action="#" method="GET">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                </span>
                                <input name="dateFilter" type="text" class="form-control daterange-basic" value="{{ $defaultRange }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url()->current() }}" class="btn btn-info btn-block">Quitar Filtros</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Basic table -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{ __('Resumen de Reservaciones') }}</h5>
            </div>
            @if( count( $rows ) > 0 )
                <div class="table-responsive table-scrollable" style="max-height: 37rem">
                    <table class="table">
                        <thead>
                        <tr class="bg-blue">
                            @foreach($available_options as $option)
                                <th>{{$option['key']}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $i => $row)
                            <tr class="{{ ($i % 2 == 0) ? 'table-info': '' }}">
                                @foreach($available_options as $option)
                                    @if( isset($row[$option['key']] ))
                                        <td>{!! $row[$option['key']] !!}</td>
                                    @else
                                        <td></td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="card-body">
                    <h3>No hay resultados</h3>
                </div>
            @endif
        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->
@endsection
