@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></div>

                <div class="panel-body">
                    <center>
                    <div>
                    <a class="btn btn-default" href="{{ route('levadas_table') }}">Levadas <i class="fa fa-sun-o" aria-hidden="true"></i></a>
                    <a class="btn btn-default" href="{{ route('excursões_table') }}">Excursões <i class="fa fa-suitcase" aria-hidden="true"></i></a>
                    <a class="btn btn-default" href="{{ route('reserva_table') }}">Reservas <i class="fa fa-bookmark" aria-hidden="true"></i></a>
                    <a class="btn btn-default" href="{{ route('transfer_table') }}">Transfers <i class="fa fa-bookmark" aria-hidden="true"></i></a>
                    <a class="btn btn-default" href="{{ route('sobre_table') }}">Sobre <i class="fa fa-info" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
