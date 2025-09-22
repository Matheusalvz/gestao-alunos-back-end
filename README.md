# Projeto PHP

Projeto PHP/Laravel para gerenciamento de alunos.

## Instalação

Clone o repositório e instale as dependências:

```bash
git clone https://github.com/seu-usuario/nome-do-projeto.git
cd nome-do-projeto
composer install
cp .env.example .env ( não se esqueça de configurar o banco de dados )
php artisan key:generate
php artisan migrate
php artisan db:seed ( opcional para criar alunos no banco de dados )
php artisan serve

Observação: Lista de usuários e suas respectivas senhas no arquivo database/seeders/UsersTableSeeder.php