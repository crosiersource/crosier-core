echo "dumping routes para json..."
php bin/console fos:js-routing:dump --format=json --target=assets/static/fos_js_routes.json
echo "ok!"

echo "limpando cache de prod..."
php bin/console cache:clear --env=prod
echo "ok!"

echo "warming up cache..."
php bin/console cache:warmup
echo "ok!"

echo "ajustando permissões de var e vendor..."
chmod -Rf 0777 ./var/
chmod -Rf 0777 ./vendor/symfony/cache/
echo "ok!"

echo "yarn encore production..."
yarn encore production
echo "ok!"

