<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## PHP Developer Challenge
### By: Jimmy Buriticá

For this challenge, I used the following software:

- PHP v8.0.9
- Laravel v9.5.1
- MariaDB v10.4.20
- Bootstrap v5.1.3
- FontAwesome v6.1.1
- DataTables v1.11.5
- SweetAlert2 v11.4.7

## How to Setup

1. Clone GitHub repo for this project locally
2. Install Composer Dependencies
```
composer install
```

3. Install NPM Dependencies
```
npm install
```

4. Create .env file
Make a copy of the .env.example file and create a .env
```
cp .env.example .env
```

5. Generate an app encryption key
```
php artisan key:generate
```

6. Create an empty database for the application
7. In the .env file, add database information to allow Laravel to connect to the database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

8. Migrate the database
Once your credentials are in the .env file, now you can migrate your database.
```
php artisan migrate
```

9. Seed the database (Optional)
Fills your database with starter data.
```
php artisan db:seed
```
