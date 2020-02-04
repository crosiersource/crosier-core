PASTA=$1

echo "______________________________________________"
echo "______________________________________________"
echo ">>>> $PASTA"
echo ""
echo ""


cd $PASTA


git pull
git status

echo ">>>> OK!"

