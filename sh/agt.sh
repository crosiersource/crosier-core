# Facilitador para atualizar todos os projetos em uma pasta (git pull)

./atualizaGit.sh crosierlib-base

./atualizaGit.sh crosier-core
# ./atualizaGit.sh crosierapp-outroapp
# ./atualizaGit.sh crosierapp-outroapp2
./atualizaGit.sh crosierapp-radx
./atualizaGit.sh crosierlib-radx

cd crosierlib-base
composer -v install
cd ../crosierlib-radx
composer -v install
cd ..
