# readme

Выполните команду:
```
composer install
```
Укажите подключение к БД в .env:
```
php artisan migrate
```
Выполните команды:
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
login: amoder
password: 123456
```

Пользователь с правами юзер:
```
login: user
password: 123456
```