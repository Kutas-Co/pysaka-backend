@servers(['prod' => ['wg_prod']])

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
