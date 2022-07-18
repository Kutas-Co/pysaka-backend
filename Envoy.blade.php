@servers(['dev' => ['esti_it']])

@task('deploy-dev', ['on' => 'dev'])
cd /var/www/sandbox
php artisan down
git pull
composer install -o
php artisan migrate
php artisan optimize:clear
php artisan queue:restart
php artisan up
