### Contents
```text
PHP
Composer
Docker
MySQl
Jwt
Nginx
Redis
Rate limiting
```

### Installation
```shell
docker compose up -d --build 
docker compose exec app bash
chmod -R 777 /var/www/html/storage/ /var/www/html/bootstrap/
cp .env.example .env
composer install
docker compose exec app php artisan jwt:secret
docker compose exec app php artisan migrate:fresh --seed
```
### env config
- mysql
```text
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```
### Usage
```text
Insomnia_2025-01-29.json
```
