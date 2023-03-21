# Laravel + Vue + Docker App

## Features

-   Docker
    -   php:8.2-fpm-alpine
    -   nginx:1.23.2-alpine
    -   mysql:8.0
-   Laravel 10
    -   Socialite integration + Email Login, register
-   Vue.js
-   Tailwindcss

## Installation with docker

#### Docker

1. Install Docker
2. Copy .env.example file to .env and custom environment variables in .env file
3. Open Terminal and go to code directory
4. Build and run containers

```bash
docker-compose up --build -d
```

## Usage

#### App

-   Application http://localhost:8080 (by default)
-   In development mode, you may need run `npm run dev` for realtime front-end build

#### Database

-   MySQL Database information config in `.env` file.

#### Directory structure

```
. (Laravel code)
│
├── docker
│   ├── app
│   │   ├── config
│   │   │   └── ...
│   │   ├── Dockerfile
│   │   └── entrypoint.sh
│   │
│   └── nginx
│       └── ...
│
└── docker-compose.yml

```

## Test

#### PHPUnit

```bash
# run PHPUnit all test cases
vendor/bin/phpunit
# or Feature test only
vendor/bin/phpunit --testsuite Feature
```

## Check code convention

#### PHP CodeSniffer

```bash
# Check PHP code for compliance with PSR2 standard by default
vendor/bin/phpcs -n --standard=phpcs.xml
# fix code
vendor/bin/phpcbf
```

#### PHPMD: problems and issues

```bash
# phpmd {folder} {report type} {config file}
vendor/bin/phpmd app,config,routes text phpmd.xml
```

#### Prettier

```bash
# Check format
npm run check-format
# Fix code format
npm run format
```

#### ESlint

```bash
npm run lint
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

@kasuta96 - kasuta96@gmail.com
