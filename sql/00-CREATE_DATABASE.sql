CREATE DATABASE crosier_dev CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci';
CREATE USER 'crosier_dev'@'localhost' IDENTIFIED BY 'crosier_dev';
GRANT ALL PRIVILEGES ON crosier_dev.* TO 'crosier_dev'@'localhost';
FLUSH PRIVILEGES;
