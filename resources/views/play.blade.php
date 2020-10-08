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
                        <div class="card-header">
                            <h4 class="card-title">En la Lista se muestran todos los jugadores y el simbolo correspondiente.</h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        Nombres
                                    </a>

                                    <ul class="list-group">
                                        @foreach($lists as $list)
                                            <a  class="list-group-item list-group-item-action">
                                                <span class="tag tag-primary tag-pill float-xs-right">{{$list['simbolo']}}</span>
                                                {{$list['name']}}
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anchors and buttons end -->
    </div>
@endsection
