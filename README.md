## About Laravel

Este projeto consiste em desenvolvimento de api Utlizando PHP, Laravel, Mysql, Nginx, Docker e Docker Compose. Ele foi 
desenvolvido por conta de um teste técnico da FebraFar. 

## Instruções de Instalação

Para rodar este projeto é necessário ter o Docker e Docker Compose devidamente instalado no host. Na raíz do projeto 
basta rodar o comando **docker-compose up -d --build** que o projeto vai subir em containers e após todo o processo de build o mesmo estará disponível no endereço: **http://localhost**. 

Para instalar a base da aplicação, na raiz da aplicação basta rodar o comando **php artisan migrate** que as tables serão criadas. Para criar um usuário de teste basta rodar uma seeder específica com o comando: **php artisan db:seed \\Database\\Seeders\\UserSeeder** . Com este comando será criado o usuário : 


 ´´´ 
{
    "email": "test@email.com",
    "password": "123456"      
}
 ´´´


### Observações: 

Na raíz do projeto há um arquivo **docker-compose.yml**. O projeto foi separado em três serviços: 

 - db_febrafar - Este é o serviço que está rodando nosso banco de dados Mysql, seu contianer é **db_test_febrafar**
 - app_febrafar - Este é o serviço que contém a aplicação , seu container é **app_febrafar** roda php 8.1 fpm
 - nginx_febrafar - Este é o serviço que contém a nginx que faz proxy reverso com o serviço app_febrafar , seu container é **app_febrafar** roda php 8.1 fpm

 
## Endpionts da API

Segue a lista de alguns endpoints da API: 

 - POST - api/login
 - POST - api/schedules
 - GET|POST - api/schedules/list
 - PUT|PATCH - api/schedules/{schedule}
 - DELETE - api/schedules/{schedule}


Também será disponibilizado uma collection no formato postman para validação dos Endpoints e para detalhamento maior a respeito dos payloads e retornos. 


