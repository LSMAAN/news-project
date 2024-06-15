## About News Project

A simple laravel project project to show the news from the database.

## Technology

Framework : Laravel, 
Database : MySQL

## Installation

- Clone the repo
- run cd news-project
- run composer install
- run cp .env.example .env
- create new database in mysql
- add new db in the .env file
- run php artisan key:generate
- run php artisan migrate
- run php artisan db:seed --class=NewsItemSeeder
- run php artisan serve
- Open web browser and go to 'http://127.0.0.1:8000/news' 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
