@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al Juego de Tres en Raya</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   Hola,puedes seleccionar los jugadores en el menu de la izquierda y seguir las indicaciones.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
