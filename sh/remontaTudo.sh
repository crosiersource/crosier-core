cd crosierapp-radx
sudo rm -Rf node_modules
sudo rm -Rf vendor
sudo rm -Rf var/*
composer install
yarn install
yarn build
cd ..

cd crosier-core
sudo rm -Rf node_modules
sudo rm -Rf vendor
sudo rm -Rf var/*
composer install
yarn install
yarn build
cd ..

cd crosierlib-base
sudo rm -Rf vendor
composer install
cd ..

cd crosierlib-radx
sudo rm -Rf vendor
composer install
cd ..
