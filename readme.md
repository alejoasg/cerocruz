Aplicacion que simula el juego Tres con rayas,no esta terminado,me lie con el desarrollo del framework,basicamente me falto el algoritmo de solucion el cual consiste en guardar las posiciones que va marcando cada jugador sea X o 0 y luego comparar con las opciones de gane que son 8,ejemplo si el jugador con las X ha marcado las posiciones 
1,3,5,7 cuando se compara estas posiciones con las opciones de gana hay un match con una de los ganes el 3,5,7 que es una diagonal en el medio de la matriz,basicamente consiste en buscar en cada jugada esos match pero solo a partir de la 2da jugada ya que se necesitan 3 para ganar y eso agiliza el algoritmo.Ya siento no haber podido terminanr a tiempo y ni siquiera incluir TDD para el algoritmo.
Se utilizo php 7.1.33
WampServer Version 3.2.3 64bit
Para probar el sistema se necesita wamp como server con MySql como gestor de base de datos,
BD nombre cero-cruz.
user root
password [en blanco]
igual les mando la BD para que no tengan que correr ningun comando en especifico
para probar el sistema php artisan serve para levantar el servidor de desarrollo local.

AL sistema se le ha añadido un módulo que simula la solución para una empresa de transporte para reducir costes,se emplea el algoritmo de camino mínimo para encontrar el camino de menos coste entre ciudades,en esta versión solo se muestra con un grafo,en otras versiones se puede incluir otra pestaña para modificar el grafo de ejemplo.
Para ejecutar el sistema las instrucciones estan justo arriba.


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
