Steps how to run project

PHP version ^8.1

Make .env file and add your database credentials
```sh
cp .env.example .env
```

Do composer install
```sh
composer install
```

Run migrations
```sh
php artisan migrate
```

Run DB seed
```sh
php artisan db:seed
```

Run project
```sh
php artisan serve
```
Our api route will be
```
http://127.0.0.1:8000/api
```

We have 2 api routes for edit and delete documents
```
PUT
/api/documents/edit/{id}?content=

DELETE
/api/documents/delete/{id}
```
