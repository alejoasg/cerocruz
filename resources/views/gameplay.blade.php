@extends('layouts.app1')

@section('content')
    <div class="content-body">
        <!-- Anchors and buttons start -->
        <section id="anchors-n-buttons">
            <div class="row match-height">
                <div class="col-xs-12">
                    <div  class="col-xs-12">
                        <div class="card-header">
                            <h4 class="card-title">Jugando Tres Con Rayas</h4>
                                 </div>
                        @if(session("mensaje"))
                            <div class="notification is-danger">
                                {{session('mensaje')}}
                            </div>
                        @endif
                        <form class="form" method="POST">
                            {{csrf_field()}}
                            <div  class="table-danger" class="row">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos1"src="" />{{$juego['tablero'][1]}}
                                                </button></td>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos2"src=""  /> {{$juego['tablero'][2]}}
                                                </button></td>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos3"src=""  /> {{$juego['tablero'][3]}}
                                                </button></td>
                                        </tr>
                                        <tr>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos4"src=""  /> {{$juego['tablero'][4]}}
                                                </button></td>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos5"src=""  /> {{$juego['tablero'][5]}}
                                                </button></td>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos6"src=""  /> {{$juego['tablero'][6]}}
                                                </button></td>
                                        </tr>
                                        <tr>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos7"src=""  /> {{$juego['tablero'][7]}}
                                                </button></td>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <img id="pos8"src=""  /> {{$juego['tablero'][8]}}
                                                </button></td>
                                            <td> <button type="submit" class="btn btn-primary" data-turno="{{$juego['nextplay']}}">
                                                    <<img id="pos9"src=""  /> {{$juego['tablero'][9]}}
                                                </button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anchors and buttons end -->
    </div>
@endsection
@section('scripts')
    <script src="/js/gameplay/tablero.js"> </script>
@endsection



