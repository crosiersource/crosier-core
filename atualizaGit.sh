PASTA=$1

echo "______________________________________________"
echo "______________________________________________"
echo ">>>> $PASTA"
echo ""
echo ""


cd $PASTA


git pull
git checkout assets/static/fos_js_routes.json
git checkout src/Entity/uppercaseFields.json
git status

echo ">>>> OK!"

