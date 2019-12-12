PASTA=$1
WEBPACK_ENV=$2

echo "______________________________________________"
echo "______________________________________________"
echo ">>>> $PASTA"
echo ""
echo ""


cd $PASTA


git checkout assets/static/fos_js_routes.json
git checkout src/Entity/uppercaseFields.json
git pull

composer -v install
yarn -v install

echo ">>>>>>>>>>>>>>>>>>>>>>> dumping routes para json..."
php bin/console fos:js-routing:dump --format=json --target=assets/static/fos_js_routes.json

echo ">>>>>>>>>>>>>>>>>>>>>>> limpando cache..."
php bin/console cache:clear

echo ">>>>>>>>>>>>>>>>>>>>>>> esquentando cache..."
php bin/console cache:warmup

echo ">>>>>>>>>>>>>>>>>>>>>>> Corrigindo permissões da /var e /vendor/symfony/cache..."
chmod -Rf 0777 ./var
chmod -Rf 0777 ./vendor/symfony/cache

echo ">>>>>>>>>>>>>>>>>>>>>>> uppercaseFieldsJsonBuilder..."
php bin/console crosier:uppercaseFieldsJsonBuilder


if [ "$WEBPACK_ENV" != "" ]
then
  echo ">>>>>>>>>>>>>>>>>>>>>>> Com webpack ($WEBPACK_ENV)..."
  if [ "$WEBPACK_ENV" == "dev" ]
  then
     yarn encore dev --watch --watch-poll 
  else
     yarn encore prod
  fi
else
  echo ">>>>>>>>>>>>>>>>>>>>>>> Sem webpack ..."
fi


echo ">>>> OK!"
echo ""
echo ""
