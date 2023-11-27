1. Para a criacao do projeto: 
    composer create-project laravel/laravel nome-projeto
2. Para configuracao do BD no arquivo .env mudou-se o nome do banco: 
    DB_DATABASE=sistema-login
    DB_USERNAME=root
    DB_PASSWORD=root    
3. Para rodar o programa:
    php artisan serve
4. Para rodar o servidor mySQL usou-se o XAMPP, nele startou-se o mySQL;
5. Instalou-se alguns recursos de autentitacao do laravel:
    composer require laravel/breeze:1.9.4
    php artisan breeze:install
    npm run install
    npm run dev
    php artisan serve
** se nao tiver as migrates ainda:
    php artisan migrate
***

Para configuracao do Docker
1. Criou-se os arquivos ou copiou:    
    Dockerfile
    docker-compose.yml
2. Na raiz criou-se uma pasta docker-compose e dentro dela as pastas:
    mysql
    nginx
3. muda-se no arquivo .env da raiz para os dados do novo sistema:
    DB_CONNECTION=mysql
    DB_HOST=db           **aqui é o ip do container
    DB_PORT=3307         **muda-se a porta se preciso pra não conflitar 
    DB_DATABASE=sistema-login
    DB_USERNAME=sistema
    DB_PASSWORD=pass1234
4. no arquivo docker-compose.yml segue os seguintes passos:
    web:
        -container_name: sistema-login-web  **muda-se o nome deixando o -web
        -seleciona-se o nome que se quer mudar e aperta control+F e na janela de pesquisa aperta-se na seta da direita onde aparecera o local de colocar o novo nome e aperta no botao ac p/substituir todos locais que aparecem esse nome.
        -network: deve ser verificado se esta o novo nome
    nginx:
        -muda-se o valor das portas para nao conflitar
    db:
        -muda-se o valor das portas para nao conflitar
    phpmyadmin:
        container_name: phpmyadmin   **mudar o nome do container
        mudar as portas p/ nao conflitar
5. Para criar os conteiners:
    docker compose build
6. Para atualizar o que já se tem buildado:
    docker compose up
7. Para criacao das tabelas no banco do docker:
    docker compose exec web php artisan migrate
8. Para interromper o docker no terminal usa-se o:
    control+c
9. sempre abrir o docker pra ele ligar o servidor.
10. Para abrir a pagina web do sistema no docker-desktop no container nginx clica-se na porta;
11. para abrir a pagina do mySQL no container mysql clica no link;
