@extends('layouts.app1')

@section('content')
    <div class="content-body">
        <!-- Anchors and buttons start -->
        <section id="anchors-n-buttons">
            <div class="row match-height">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Partidas</h4>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">En la Lista se muestran todos las partidas anteriores.</h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-xs-center">
                                            Nombre Jugador 1<br>
                                        </th>
                                        <th class="text-xs-center">
                                            Nombre Jugador 1<br>
                                        </th>
                                        <th class="text-xs-center">
                                            Ganador <br>
                                        </th>
                                        <th class="text-xs-center">
                                            Fecha <br>
                                        </th>
                                        <th class="text-xs-center">
                                            Terminada <br>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($lists as $list)
                                        <tr>
                                            <td>{{$list['jugador1']}}</td>
                                            <td> {{$list['jugador2']}}</td>
                                            <td> {{$list['ganador']}}</td>
                                            <td> {{$list['date']}}</td>
                                            <td> {{$list['ended']}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anchors and buttons end -->
    </div>
@endsection
