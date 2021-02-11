# Facilitador para atualizar todos os projetos em uma pasta (git pull)

./atualizaGit.sh crosierlib-base
cd crosierlib-base
composer -v install
cd ..

./atualizaGit.sh crosierlib-radx
cd crosierlib-radx
composer -v install
cd ..

./atualizaGit.sh crosier-core
# ./atualizaGit.sh crosierapp-outroapp
# ./atualizaGit.sh crosierapp-outroapp2
./atualizaGit.sh crosierapp-radx

