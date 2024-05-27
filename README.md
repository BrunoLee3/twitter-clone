# Twitter Clone

Twitter clone totalmente desenvolvido em Laravel, usando recursos de 
autenticação, CRUD, validation, Routing, MVC.

## Ambiente de desenvolvimento
- PHP 8.1
- Laravel 10
- Composer 
- MySQL

## Como implementar 
### requisitos
- PHP 8.1 ou superior
- Composer
- MySQL
 
### Instalação local 
1. Clone o repositório
2. acesse o diretório do projeto 
3. execute no terminal:
```
composer install
cp .env.example .env
```
4. Crie o banco de dados twitter-clone
5. edite o arquivo .env e mude as configurações de banco de dados de acordo:
    - DB_CONNECTION = mysql
    - DB_DATABASE = twitter-clone
    - DB_PASSWORD = *sua senha* (se não houver deixe vazio)
6. Por fim, execute:
```
php artisan key:generate
php artisan migrate
php artisan serve
```
### Instalação Docker
*trabalho em progresso*