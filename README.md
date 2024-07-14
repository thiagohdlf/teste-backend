Requisitos para funcionar a API:
- PHP8.3.
- Composer.
- MySQL8.0.
- Git.

links para download:

- PHP: https://windows.php.net/downloads/releases/php-8.3.9-nts-Win32-vs16-x64.zip
- Composer: https://getcomposer.org/Composer-Setup.exe
- MySQL: https://dev.mysql.com/get/Downloads/MySQLInstaller/mysql-installer-web-community-8.0.38.0.msi
- Git: https://github.com/git-for-windows/git/releases/download/v2.45.2.windows.1/Git-2.45.2-64-bit.exe

Passo a passo:

- Instale o Git.
- Instale o Mysql8.0(no final da instalação defina a senha, a mesma vai ser usada no arquivo .env).
- Instale o PHP8.3(para instalar descompact a pasta do php, renomeie para php, adicione no path do windows em variáveis de ambiente e reinicie o computador).
- Instale o Composer.

Clone o repositório:

git clone: https://github.com/thiagohdlf/desafio-backend.git

Crie o arquivo .env:

cp .env.exemple .env

Atualize as variáveis de ambiente do arquivo .env:

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=nice
- DB_USERNAME=root
- DB_PASSWORD=root

Instale as dependencias do projeto:

composer install

Gere a key do projeto laravel:

php artisan key:generate

Rode as migrações:

php artisan migrate

Rode o servidor web do laravel:

php artisan serve

acesse a página inicial de teste:

http://localhost:8000
