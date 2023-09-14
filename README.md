# The comuni Project

## Requirements

-   [Laravel 9.x](https://laravel.com/docs/9.x/installation)
-   [Docker = 20.10.21](https://docs.docker.com/install)
-   [Docker-compose = 1.29.0](https://docs.docker.com/compose/install)
-   [PHP >= 8.0](https://www.php.net/downloads.php)
-   [PostgreSQL >= 13](https://www.postgresql.org/docs/)
-   [Nginx >= nginx/1.15.7](https://www.nginx.com/resources/wiki/start/topic/tutorials/install/)

## Setup

-   Copy file `.env.example` to `.env`,
-   Modify `.env` config file (optional). If you modify the `mysql` configurations in `.env` file, remember to modify the configurations in `docker-compose.yml` file too.

-   Install or run Docker for the Development Environment

```BASH
# Start
docker-compose up -d

# Stop
docker-compose stop
```

Set these environment variables (see .env file).

```BASH
DB_CONNECTION=pgsql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

QUEUE_DRIVER=redis
REDIS_HOST=redis

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

#==============
# Initial config for Docker
#==============
DOCKER_NGINX_PORT=80
DOCKER_PHP_VERSION=8.0
DOCKER_DB_VERSION=8.0
DOCKER_DB_PORT=3306
DOCKER_DB_ROOT_PASSWORD=

#==============
# Laravel Passport
#==============
CLIENT_ID=
CLIENT_SECRET=
```

### Installation

-   Go into the `workspace` container

```BASH
docker compose exec app bash
```

-   Install package PHP

```BASH
composer install
```

-   Generate a new Application Key

```
php artisan key:generate
```

-   Run migration

```BASH
# Run migration
php artisan migrate:refresh --seed
```

-   Generate new Internal Password Grant OAuth2 clients.

```bash
php artisan passport:install
```

-   Site will publish on 127.0.0.1:{`ports`} (`ports` config in docker-compose.yml > services > nginx > ports). Add domain to host file so we can access site by domain:{`ports`} (edit host in file ./ect/hosts)

```
127.0.0.1 hitachi.local
```

-   Asset project with domain

```
hitachi.local:2025 or localhost:2025 or 127.0.0.1:2025
```

-   If you want run project on your local instead of Docker, just skip all step about docker and create virtual host. And modify `.env` config of `DB_HOST`, `DB_HOST_TEST` to `127.0.0.1`

Run the development PHP Built-in server.

> After running docker, Application run in port 80. Visit http://localhost;

## Queue

Run queue command.

```
php artisan queue:listen
```

## Run Schedule

-   Config crontab publishing the draft posts:

```
crontab -e
```

```
* * * * * cd /path-to-project && php artisan public:post >> /dev/null 2>&1
* * * * * cd /path-to-project && php artisan penalty:account >> /dev/null 2>&1
```

## [Unit test](https://viblo.asia/p/gioi-thieu-ve-unit-testing-trong-laravel-LzD5dredZjY)

-   Make unit test:

```
php artisan make:test UserTest --unit
```

-   Make feature test:

```
php artisan make:test AuthenTest
```

-   Run all test

```
./vendor/bin/phpunit
```

-   Run each class test

```
./vendor/bin/phpunit --filter UserTest
```

-   Note

```
1. Prefix prefix name is "test"
2. Sample: testLogin, testLogout, ....
3. If need to use Model then replace use PHPUnit\Framework\TestCase; to use Tests\TestCase;
```
