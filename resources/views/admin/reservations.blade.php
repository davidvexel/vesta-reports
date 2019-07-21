@extends('layouts.admin')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Basic table -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Reservaciones</h5>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        @foreach($available_options as $option)
                            <th>{{$option['key']}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
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
        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->
@endsection
