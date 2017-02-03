# customer-benefits-analytics-admin
Admin tool built using Laravel 5.4 and Vue.js 2.0 for managing Customer Benefits Analytics business logic

## Getting Started

### Requirements
* Php 5.6 or greater `$a ** $b` Exponentiation is now supported and needed for segmentation calculation
* MySQL
* Node.js
* Composer - PHP Package Manager
* Webpack - Frontend Module Builder

Once you have cloned the application `cd` to `customer-benefits-analytics-admin` and run the following commands.
```comandline
composer update
```

Install the application dependencies using composer

```
composer install
```

Update autoloader if needed

```
composer dump-autoload
```

Configure your database connection in the `.env` file

## Install SQL Tables and Data
Migrate database tables and seed the database with defaults and users to login

```
php artisan migrate:refresh --seed
```


## Vue.js Frontend
### Requirements
Node.js and Webpack are required for to compile files in `/resources/assets` to  `/public/*` see `webpack.mix.js` for details.

```
sudo npm install --global webpack
```
### Build and Watch
Run the following commands to compile your development files in `/resources/assets`

```
npm install
npm run watch
```

## Launching Application - localhost
Running the at `http://127.0.0.1:8000`

```
php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```

## Unit Tests
Requires PHPUnit to be installed or it can be loaded using composer and used locally

Global Comandline

```
phpunit
```

Local Comandline

```
./vendor/bin/phpunit
```
