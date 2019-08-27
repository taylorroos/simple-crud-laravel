<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Como rodar o projeto

- `$ npm i`
- `$ composer install`
- Crie o arquivo `.env` a partir do `.env.example` que está no projeto.
- Defina as variáveis de ambiente no arquivo `.env` criado, para conectar-se ao banco.
- Importar o dump que esta no projeto `dump.sql` (Logo criarei um migrations/seeder e não será mais necessário);
- `$ php artisan key:generate`

- Para iniciar o servidor `$ php artisan serve` e para compilar o js e css `$ npm run watch`
