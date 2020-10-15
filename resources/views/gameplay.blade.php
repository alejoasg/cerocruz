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
                        @if ($mensaje)
                            <div class="alert">
                                <ul> <li>
                                 {{$mensaje}}
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <form class="form" method="POST">
                            {{csrf_field()}}
                            <div  class="table-danger" class="row">
                                <table class="table table-bordered" id="tablero">
                                    <tbody>
                                        <tr>
                                            <td>
{{--                                                <input type="hidden" name="juego" value="{{$juego['tablero']}}">--}}
                                                <input type="submit"  name=1 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                       value="{{$juego['tablero'][1]}}">
                                            </td>
                                            <td>
                                                <input type="submit" name=2 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                       value="{{$juego['tablero'][2]}}">
                                                </td>
                                            <td> <input type="submit" name=3 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                         value="{{$juego['tablero'][3]}}">
                                                </td>
                                        </tr>
                                        <tr>
                                            <td> <input type="submit" name=4  class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                         value="{{$juego['tablero'][4]}}">
                                                </td>
                                            <td> <input type="submit" name=5 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                         value="{{$juego['tablero'][5]}}">
                                                  </td>
                                            <td> <input type="submit" name=6 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                         value="{{$juego['tablero'][6]}}">
                                                </td>
                                        </tr>
                                        <tr>
                                            <td> <input type="submit" name=7 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                         value="{{$juego['tablero'][7]}}">
                                                  </td>
                                            <td> <input type="submit" name=8 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                        value="{{$juego['tablero'][8]}}">
                                                </td>
                                            <td> <input type="submit" name=9 class="btn btn-primary" data-turno="{{$juego['nextplay']}}"
                                                value="{{$juego['tablero'][9]}}">
                                                </td>
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



