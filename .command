php artisan migrate:fresh --force

php artisan db:seed --class=PermissionTableSeeder --force && php artisan db:seed --class=RoleHasPermissionsTableSeeder --force

//============General Command ============================

npm run watch    // install configured css

// For api controller
php artisan make:controller Api/AuthController

php artisan make:middleware Middleware

// Create directive
php artisan make:provider BladeServiceProvider

php artisan make:model name -mcr

php artisan make:resource NameResource

php artisan make:Controller ApiAuthController

php artisan make:request storeMessageRequest

php artisan make:mail SmtpTestEmail

php artisan migrate:refresh --path=/database/migrations/fileName.php

php artisan make:seeder NameSeeder

php artisan db:seed --class=UsersTableSeeder --force

php artisan db:seed

sudo php artisan cache:clear && php artisan config:clear

// Set the host IP
php artisan serve --host=192.168.43.101 --port=8001

//
php artisan make:migration description_of_upadte --table=table_name

// in any error
composer dump-autoload

php artisan auth:clear-resets

Other useful where clauses: whereIn, whereNotIn, whereNull, whereNotNull, whereDate, whereMonth, whereDay, whereYear, whereTime, whereColumn , whereExists, whereRaw.

/////////////////////////////////////////

php artisan storage:link

/////////////////////////////////////////

site key: 6LcII3kpAAAAAFM9SPP5V3e80UxKZOwQ5-yYttA9

secret key: 6LcII3kpAAAAAHPG4XGi7BhLxGiQFFwpYcsEHp_G
