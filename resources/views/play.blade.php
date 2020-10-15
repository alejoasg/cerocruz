@extends('layouts.app1')

@section('content')
    <div class="content-body">
        <!-- Anchors and buttons start -->
        <section id="anchors-n-buttons">
            <div class="row match-height">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jugadores</h4>
                        </div>
                        @if(session("mensaje"))
                            <div class="notification is-danger">
                                {{session('mensaje')}}
                            </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title"> Rellene el nombre de los jugadores </h4>
                        </div>
                        <form class="form" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">Nombre Jugador con X</label>
                                            <input  id="eventInput1" class="form-control" placeholder="primer jugador" name="jugador_1" value="{{old('jugador_1')}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="apellido">Nombre Jugador con O</label>
                                            <input  id="eventInput2" class="form-control" placeholder="segundo jugador" name="jugador_2"  value="{{old('jugador_2')}}" required>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label for="simbolo">Simbolo Jugador 1</label>--}}
{{--                                           <select name="simbolo" class="form-control">--}}
{{--                                               <option value="O">0</option>--}}
{{--                                               <option value="X">X</option>--}}
{{--                                           </select>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Comenzar Juego
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anchors and buttons end -->
    </div>
@endsection
