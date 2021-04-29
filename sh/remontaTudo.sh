echo ">>>>>>>>>> REMONTANDO TODA A ESTRUTURA <<<<<<<<<<"

composer clearcache

cd crosier-core
echo "............................ (crosier-core) git checkout ."
git checkout .
echo "............................ (crosier-core) sudo rm -Rf node_modules"
sudo rm -Rf node_modules
echo "............................ (crosier-core) sudo rm -Rf vendor"
sudo rm -Rf vendor
echo "............................ (crosier-core) sudo rm -Rf var/cache"
sudo rm -Rf var/cache
echo "............................ (crosier-core) sudo rm -Rf var/session"
sudo rm -Rf var/session

echo "............................ (crosier-core) composer install"
composer install
echo "............................ (crosier-core) yarn install"
yarn install
cd ..
echo "............................ (crosier-core) ./atualiza.sh crosier-core prod"
./atualiza.sh crosier-core prod


projetos=(
"crosierapp-radx"
)


for i in "${projetos[@]}"
do
        echo ".................................... Remontando para $i"
        cd $i
        echo ".................................... ($i) git checkout ."
        git checkout .
        echo ".................................... ($i) sudo rm -Rf node_modules"
        sudo rm -Rf node_modules
        echo ".................................... ($i) sudo rm -Rf vendor"
        sudo rm -Rf vendor
        echo ".................................... ($i) sudo rm -Rf var/cache"
        sudo rm -Rf var/cache
        
        echo ".................................... ($i) composer install"
        composer install
        echo ".................................... ($i) yarn install"
        yarn install
        cd ..
        echo ".................................... ($i) ./atualiza.sh $i prod"
        ./atualiza.sh $i prod
done

