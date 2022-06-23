## EXAMEN EVALUACIÓN FINAL RECUPERACIÓN (2021/22) 17-JUN-2022
La empresa de supermercados Alaplaya, S.L. nos solicita el desarrollo de una aplicación web para sus "cajas amigas", las cajas no requieren de personal y que el mismo consumidor puede usar para hacer sus compras sin ayuda. La aplicación debe funcionar de la siguiente forma:

1. El cliente llega a la caja amiga y pulsa el botón de "Empezar compra".
2. A continuación, va pasando los productos por el escáner, mientras en la pantalla va apareciendo el listado de los productos que se han pasado, así como el subtotal en la parte inferior. Nosotros lo simularemos tecleando los códigos de barras y pulsando el botón "Añadir producto a la compra".
3. Al lado de cada producto hay un botón rojo que permite eliminar ese producto de la lista, en caso de error.
4. Hay un botón "Anular compra" que, al pulsarlo, anulará la compra y volverá de nuevo a la pantalla de inicio.
5. También hay otro botón "Finalizar compra" que, al pulsarlo, nos llevará a la pantalla de pago, donde se mostrará el importe total a pagar, se le pedirá al usuario que introduzca los 16 dígitos de su tarjeta y se dará por finalizada la compra. El número de la tarjeta se guardará junto con los datos del ticket.
6. Al finalizar la compra, se mostrará un botón "Volver al inicio" que, al pulsarlo, llevará al usuario de nuevo a la pantalla de inicio.

Se pide:

1. (1,5 puntos) Crear la base de datos mediante migraciones con, al menos, las siguientes tablas (que contendrán, al menos, las siguientes columnas):

    - *productos (**id**, codigo, denominacion, precio)*
        La columna `codigo` contiene el código de barras del producto.
        La columna `precio` será el precio unitario del producto si es un producto prefabricado, o el precio base por metro cuadrado si es un producto fabricado.

    - *tickets (**id**, tarjeta, created_at)*
        La columna `created_at` contiene la fecha y hora de creación de cada ticket.
        La columna `tarjeta` contiene el número de la tarjeta (16 dígitos) con la que se ha pagado la compra.

    - *lineas (**id**, **ticket_id**, **producto_id**)*

2. (1,5 puntos) Crear los modelos correspondientes y todas las relaciones adecuadas entre ellos.
3. (2 puntos) Implementar los apartados 1 y 2.
4. (1,5 puntos) Implementar los apartados 3 y 4.
5. (2,5 puntos) Implementar los apartados 5 y 6.
6. (1 punto) Validar el número de la tarjeta de crédito introducida en el apartado `5-b`. *Indicación*: usar el algoritmo de Luhn.

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
