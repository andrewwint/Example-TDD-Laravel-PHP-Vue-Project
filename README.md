# customer-benefits-analytics-admin
Admin tool built using Laravel 5.4 and Vue.js 2.0 for managing Customer Benefits Analytics business logic

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
Node.js and Webpack

```
sudo npm install --global webpack
```
### Build and Watch
Webpack is required for to compile files in `/resources/assets` to  `/public/*` see `webpack.mix.js` for details.

```
npm install
npm run watch
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
