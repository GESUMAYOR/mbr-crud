<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

A basic CRUD Application for the MBR Computer Consultants Ltd test.

An application that creates new users, fetch the data of all users, read individual users, and allows for loggin in users to the application.

-   Base URL = http://localhost:8000/api/v1/users - GET
-   All Users URL = http://localhost:8000/api/v1/users/ - GET
-   single user URL = http://localhost:8000/api/v1/users/{id?} - GET/FETCH
-   delete User URL = http://localhost:8000/api/v1/user/delete/{id?} - DELETE
-   update User URL = http://localhost:8000/api/v1/user/update/{id?} - PUT

Authentication Routes:

-   Register URL: http://localhost:8000/api/v1/register - POST
-   Login URL: http://localhost:8000/api/v1/login - POST

-
-   [Powerful dependency injection container](https://laravel.com/docs/container).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
