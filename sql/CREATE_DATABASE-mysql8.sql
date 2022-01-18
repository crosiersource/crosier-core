CREATE DATABASE crosier_precobaixo_dev CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci';
CREATE USER 'crosier_precobaixo_dev'@'localhost' IDENTIFIED BY 'crosier_precobaixo_dev';
-- ALTER USER 'crosier_dev'@'localhost' IDENTIFIED BY 'crosier_dev';
GRANT ALL PRIVILEGES ON crosier_precobaixo_dev.* TO 'crosier_precobaixo_dev'@'localhost';
FLUSH PRIVILEGES;
