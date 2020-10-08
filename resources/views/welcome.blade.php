@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido al Juego Tres en Raya</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            Ingrese a la aplicación mediante o registrese para su uso.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
