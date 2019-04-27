## Back-End - Passo-a-Passo
Rodar o comando `git clone https://slater_90@bitbucket.org/slater_90/laravel-test.git`

Depois instalar as dependencias `composer install`

Criar o Banco de dados `laravel_test` com o usuário `root` e senha vazia `''`

Rode o comando `php artisan migrate:fresh --force --seed` para criar as tabelas e inserir conteúdo.

Criar o arquivo `.env` com esses dados:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:5BlDlSrTiihJ3DBVppx7JrEPsPe3msXesXKn92+7wuk=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"`
```

Caso o Laravel não tenha um APP_KEY, rode o comando `php artisan key:generate`

Por fim, inicie o Servidor na seguinte rota http://127.0.0.1:8000: `php artisan key:generate`

## Versões

PHP 7.2.7

Laravel Framework 5.8.14
