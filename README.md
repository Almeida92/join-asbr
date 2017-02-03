Instruções 
========================

As técnologias usadas para o Teste foram Angular para o Front e PHP para o Backend

as validações são feitas primeiro no Angular e enviadas para um API que fara o insert no banco 
dos leads e o envio para o Endpoint

* Após baixar o repositório rodar o composer 

composer.phar install 

Após informar os campos de config do Mysql rodar o comando para criar a Base

$ php bin\console doctrine:database:create

com a base criada agora basta criar o Schema 

$ php bin\console doctrine:schema:update --force 
