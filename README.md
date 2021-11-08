# Project Setup
### versions
```
- PHP:  7.4.22 
- Nginx: 1.18.0
- Mysql: 8.0.22
```

#### for first time running [WINDOWS]
```
1. cp .env.template .env
2. cp backend/.env.example backend/.env
3. docker-compose up --build -d
4. winpty docker-compose exec app composer install
5. winpty docker-compose exec app php artisan key:generate
6. winpty docker-compose exec app php artisan config:cache
7. winpty docker-compose exec app php artisan storage:link
8. winpty docker-compose exec app chown www-data storage/ -R
9. winpty docker-compose exec app php artisan migrate
```

#### for first time running [LINUX/MAC]
```
make init
```

#### for running the Nth time [WINDOWS]
```
docker-compose up -d
```

#### for running the Nth time [LINUX/MAC]
```
make up
```

#### for stopping [WINDOWS]
```
docker-compose stop
```
#### for removing container [WINDOWS]
```
docker-compose down
```

#### for stopping [LINUX/MAC]
```
make stop
```

#### for removing containers [LINUX/MAC]
```
make down
```

### FYI
#### if the migrations has a correspoding seeder [WINDOWS]
```
winpty docker-compose exec app php artisan db:seed
```
#### if the migrations has a correspoding seeder [LINUX/MAC]
```
docker-compose exec app php artisan db:seed
```

#### when using windows, copy the line of code below and change the infra/mysql/Dockerfile
```
FROM mysql:8.0.22

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf
```

#### to access the app
```
web - http://localhost
phpmyadmin - http://localhost:8888
```