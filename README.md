Instruções 
========================

As tecnologias usadas para o Teste foram Angular para o Front e PHP para o Backend

as validações são feitas primeiro no Angular e enviadas para uma API que fara os inserts dos leads no banco 
 e o envio para o Endpoint

* Após baixar o repositório rodar o composer 

composer.phar install 

* Após informar os campos de config do Mysql rodar o comando para criar a Base

$ php bin\console doctrine:database:create

* com a base criada agora basta criar o Schema 

$ php bin\console doctrine:schema:update --force

agora basta acessar a Pasta /web

ex: localhost/join-asbr/web

Arquivos importante  
========================

# Lógica Angular
web/assets/js/app.js 

# mascaras Jquery
web/assets/js/main.js 

#controller Api
src/ApiLandingPageBundle/Controller/ApiController.php

#Template Twig
src/LandingPageBundle/Resources/views/Default/index.html.twig