# Contact List

Web Application for instructor to check students attendance.

### Prerequisites

-   [Node.js](https://nodejs.org)
-   [PHP](http://php.net/manual/en/install.php)
-   [Laravel](https://laravel.com/docs/5.7)

### Installing

-   Create a database locally
-   Rename `.env.example` file to `.env`inside your project root and fill the database information.
    (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
-   create file name `.env.testing` and copy data from `.env` file then change DB_CONNECTION=myql to DB_CONNECTION=sqlite and delete/comment database related environment parameters.
-   Open the console and cd your project root directory
-   Run `composer install` or `php composer.phar install`
-   Run `php artisan key:generate`
-   Run `php artisan migrate`
-   Run `php artisan db:seed`
-   Run `npm install` or `yarn`
-   Run `php artisan serve`

##### You can now access your project at localhost:8000

## If for some reason your project stop working do these:

-   `composer install`
-   `php artisan migrate`

## Unit Test

-   Run `php artisan test`

## Built With

-   [Vue.js](https://vuejs.org) - The frontend JavaScript framework
-   [Laravel](https://laravel.com/docs/7.x) - The backend web framework
-   [Bulma](https://bulma.io/) - The styling framework used
-   [SweetAlert2](https://sweetalert2.github.io/) - Library that give "alert" and "prompt" features better-looking versions

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/emmyjarz/roster-laravel-vue-tdd.
