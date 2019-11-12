# fps

A system created using Laravel to let faculty upload papers

Steps to Run Project
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Configure .env file
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan serve`

## You can now access your project at localhost:8000 :)

## If for some reason your project stops working do these:
- `composer install`
- `php artisan migrate`