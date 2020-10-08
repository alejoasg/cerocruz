@if (auth()->check())
    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-static menu-dark menu-accordion menu-shadow">
        <!-- main menu header-->
        <div class="main-menu-header">
            <input type="text" placeholder="Buscar" class="menu-search form-control round"/>
        </div>
        <!-- / main menu header Se utiliza la plantilla de roobust por eso tanto codigo spaguetis
        en html,aunque esta muy bien organizado y responde a determinados css que son imprecindibles
        el codigo se puede reducir aun mas-->
        <!-- main menu content Aqui se ponen las funcionalidad agrupadas por conceptos de gestion o de funcion como tal-->
        <div class="main-menu-content">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class=" nav-item"><a href="index.html"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Tres Con Rayas</span></a>
                    <ul class="menu-content">
                        <li @if(request()->is('storeplay')) class="active" @endif><a href="{{ url('/jugadores') }}" data-i18n="nav.dash.main" class="menu-item">Jugadores</a>
                        </li>
                        <li @if(request()->is('savegames')) class="active" @endif><a href="{{ url('/partidas') }}" data-i18n="nav.dash.main" class="menu-item">Partidas</a>
                        </li>
                        <li @if(request()->is('tablero')) class="active" @endif><a href="{{ url('/juego') }}" data-i18n="nav.dash.main" class="menu-item">A Jugar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /main menu content-->
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
    </div>
    <!-- / main menu-->
@endif


