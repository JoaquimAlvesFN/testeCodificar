## Documentação Simples para executar o projeto.

1. Executar o dump que se encontra dentro da pasta utils, esse dump se refere a tabela de verbas que tem bastante dados, banco de dados utilizado: MySQL.

2. Copiar o .env.example e configurar de acordo com o banco de dados configurado.

2.1 Rodar o comando: php artisan key:generate, esse comando vai criar uma chave criptografada no arquivo .env

3. Rodar o comando: php artisan db:seed , esse comando vai popular o restante do banco de dados.
4. Rodar o comando php artisan serve , pra acessar os seguintes endpoints abaixo.

5. Top 5 Deputados: http://localhost:8000/api/verbas -> Method: GET
6. Ranking das Redes Sociais: http://localhost:8000/api/redes -> Method: GET
