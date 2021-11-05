# To Run The App

## for first time running [WINDOWS]
- **1. [cp .env.template .env]**
- **2. [cp backend/.env.example backend/.env]**
- **3. [docker-compose up --build -d]**
- **4. [winpty docker-compose exec app composer install]**
- **5. [winpty docker-compose exec app php artisan key:generate]**
- **6. [winpty docker-compose exec app php artisan config:cache]**
- **7. [winpty docker-compose exec app chown www-data storage/ -R]**
- **8. [winpty docker-compose exec app php artisan migrate]**
- **9. [winpty docker-compose exec app php artisan storage:link]**

## for first time running [LINUX/MAC]
- **make init**

## for running the Nth time [WINDOWS]
- **docker-compose up -d**

## for running the Nth time [LINUX/MAC]
- **make up**

## for stopping [WINDOWS]
- **docker-compose down / docker-compose stop**

## for stopping [LINUX/MAC]
- **make down / make stop**

# PS
## if the migrations has a correspoding seeder [WINDOWS]
- **winpty docker-compose exec app php artisan db:seed**

## for db image error on docker when running under linux / mac environment
- *change [infra/mysql/Dockerfile] to the one below*
```
FROM --platform=linux/x86_64 mysql:8.0.22

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf

```

## to access the app
```
web - http://localhost
phpmyadmin - http://localhost:8888
```