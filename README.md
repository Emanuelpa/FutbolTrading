# Execution of the FutbolTrading Project

By: Emanuel Patiño, Marcela Londoño & Tomás Pineda

First you should import the database named futboltrading.sql

## 1. Configure the .env file, Run the following command:

cp .env.example .env

## 2. Generate the application key

run php artisan key:generate

## 3. Dependencies Installation

Run the following command in the root of the project to install the dependencies:

composer install

## 4. .env File Configuration

Open the `.env` file and update the following values for the MySQL database connection:

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=your_database_name
- DB_USERNAME=your_user
- DB_PASSWORD=your_password

Make sure to replace your_database_name, your_user, and your_password with the correct values.

## 5. Migrations

To set up the database, run the migrations:

php artisan migrate


## 6. Run the server

To start the development server, use the following command:

php artisan serve

This will run the project on `http://127.0.0.1:8000/`.


## 7. Main Routes

- http://127.0.0.1:8000/home

(Auth)
- http://127.0.0.1:8000/cards
- http://127.0.0.1:8000/tradeItem
- http://127.0.0.1:8000/cart
- http://127.0.0.1:8000/wishlist


## About Laravel

Laravel is a web application framework with an expressive and elegant syntax. We believe that development should be an enjoyable and creative experience to be truly rewarding.
Laravel simplifies development by making common tasks used in many web projects easier, such as:

- Clear and expressive syntax

- Eloquent ORM

- Intuitive routing system

- Database migrations

- Built-in authentication

- Blade templating system
