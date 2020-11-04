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
                            <h4 class="card-title">Selecci&oacuten de Ciudades</h4>
                            @if (isset($mensaje))
                                <div class="alert">
                                    <ul> <li>
                                            {{$mensaje}}
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <h4 class="card-title">Ciudades y sus Ponderaciones</h4>
                            @if (isset($mensajes))
                                <div class="alert">
                                    <tbody name="conexiones">
                                    @foreach($mensajes as $list)
                                        <ul> <li>
                                                {{$list}}
                                            </li>
                                        </ul>

                                    @endforeach
                                    </tbody>
                                </div>
                            @endif
                        </div>
                        <form class="form" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="cars">Selecciona Ciudad Origen</label>
                                            <select name="origen" id="citiesOrigen">
                                                <option value="0">Logroño</option>
                                                <option value="1">Zaragoza</option>
                                                <option value="2">Teruel</option>
                                                <option value="3">Madrid</option>
                                                <option value="4">Lleida</option>
                                                <option value="5">Alicante</option>
                                                <option value="6">Castellón</option>
                                                <option value="7">Segovia</option>
                                                <option value="8">Ciudad Real</option>
                                            </select>

                                        <div class="form-group">
                                            <label for="cars">Selecciona Ciudad Destino</label>
                                            <select name="destino" id="citiesDestino">
                                                <option value="0">Logroño</option>
                                                <option value="1">Zaragoza</option>
                                                <option value="2">Teruel</option>
                                                <option value="3">Madrid</option>
                                                <option value="4">Lleida</option>
                                                <option value="5">Alicante</option>
                                                <option value="6">Castellón</option>
                                                <option value="7">Segovia</option>
                                                <option value="8">Ciudad Real</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Buscar Camino Minimo
                                </button>
                            </div>
                                <div class="form-actions center">
                                    <button type="submit" id="buscarTodos" class="btn btn-primary">
                                        <i class="icon-check2"></i> Buscar Todos los costes por un Origen
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
@section('scripts')
    <script src="/js/conexion/conexion.js"> </script>
@endsection