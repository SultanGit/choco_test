# readme

Выполните команду:
```
composer install
```
Укажите подключение к БД в .env:

Выполните команды:
```
php artisan migrate
```
```
php artisan jwt:secret
```
```
php artisan db:seed --class=CategoryTableSeeder
```

Пользователь с правами админа:
```
login: admin
password: 123456
```

Пользователь с правами модера:
```
login: moder
password: 123456
```

Пользователь с правами юзер:
```
login: user
password: 123456
```

Коллекция запросов Postman:
```
https://www.getpostman.com/collections/048a926cafe39587c0d5
```