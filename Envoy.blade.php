@servers(['prod' => ['pysaka_prod']])

@task('deploy-dev', ['on' => 'prod'])
cd /var/www/dev-laravel
php artisan down
git pull
composer install
php artisan migrate
php artisan optimize:clear
php artisan queue:restart
php artisan up
@endtask

@task('deploy-prod', ['on' => 'prod'])
cd /var/www/laravel
php artisan down
git pull
composer install --no-dev -o --prefer-dist
php artisan migrate --force
php artisan optimize:clear
php artisan queue:restart
php artisan websockets:restart
php artisan up
@endtask
