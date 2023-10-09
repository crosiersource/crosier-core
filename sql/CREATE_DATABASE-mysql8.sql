CREATE DATABASE crosier_dev CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci';
CREATE USER 'crosier_dev'@'%' IDENTIFIED BY 'crosier_dev';
-- ALTER USER 'crosier_dev'@'localhost' IDENTIFIED BY 'crosier_dev';
GRANT ALL PRIVILEGES ON crosier_dev.* TO 'crosier_dev'@'%';
FLUSH PRIVILEGES;


CREATE DATABASE crosier_logs_dev CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci';
CREATE USER 'crosier_logs_dev'@'%' IDENTIFIED BY 'crosier_logs_dev';
-- ALTER USER 'crosier_dev'@'localhost' IDENTIFIED BY 'crosier_dev';
GRANT ALL PRIVILEGES ON crosier_logs_dev.* TO 'crosier_logs_dev'@'%';
FLUSH PRIVILEGES;


-- dbname=crosier_dev
-- mysql_config_editor set --login-path=$dbname --host=localhost --user=$dbname --password

-- sudo touch /usr/local/bin/$dbname
-- sudo echo "mysql --login-path=$dbname $dbname" | sudo tee /usr/local/bin/$dbname
-- sudo chmod a+x /usr/local/bin/$dbname

-- Atenção: rodar o FUNCTIONS.sql utilizando o root


