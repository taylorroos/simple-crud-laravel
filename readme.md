## Como rodar o projeto

- `$ npm i`
- `$ composer install`
- Crie o arquivo `.env` a partir do `.env.example` que está no projeto.
- Defina as variáveis de ambiente no arquivo `.env` criado, para conectar-se ao banco.
- Importar o dump que esta no projeto `dump.sql` (Logo criarei um migrations/seeder e não será mais necessário);
- `$ php artisan key:generate`

- Para iniciar o servidor `$ php artisan serve` e para compilar o js e css `$ npm run watch`
