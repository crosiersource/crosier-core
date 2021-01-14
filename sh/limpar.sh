sudo rm -f ./crosier-core/var/log/*.log
sudo rm -Rf ./crosier-core/var/cache/*
sudo rm -Rf ./crosier-core/var/session/
sudo chmod -Rf 0777 ./crosier-core/var/

app=crosierapp-radx
sudo rm -f ./$app/var/log/*.log
sudo rm -Rf ./$app/var/cache/*
sudo chmod -Rf 0777 ./$app/var/

# app=crosierapp-outro1
# sudo rm -f  ./$app/var/log/*.log
# sudo rm -Rf ./$app/var/cache/*
# sudo chmod -Rf 0777 ./$app/var/

# app=crosierapp-outro2
# sudo rm -f  ./$app/var/log/*.log
# sudo rm -Rf ./$app/var/cache/*
# sudo chmod -Rf 0777 ./$app/var/
