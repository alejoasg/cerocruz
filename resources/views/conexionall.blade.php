@extends('layouts.app1')

@section('content')
    <div class="content-body">
        <!-- Anchors and buttons start -->
        <section id="anchors-n-buttons">
            <div class="row match-height">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Conexiones de coste Minimas para el Transporte</h4>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @foreach($caminos['cities'] as $list)
                                    <th class="text-xs-center">
                                        {{$list}}<br>
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody name="conexiones">
                            @foreach($caminos['conections'] as $list)
                                <tr>
                                    @foreach($list as $peso)
                                        <td>{{$peso}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="card-header">
                            <h4 class="card-title">Ciudades y sus Ponderaciones</h4>
                            @if ($caminos['mensajes'])
                                <div class="alert">
                                    <tbody name="conexiones">
                                    @foreach($caminos['mensajes'] as $list)
                                        <ul> <li>
                                                {{$list}}
                                            </li>
                                        </ul>
                                    @endforeach
                                    </tbody>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Anchors and buttons end -->
    </div>
@endsection
