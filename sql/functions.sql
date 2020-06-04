-- Função que verifica se um valor dentro de um campo JSON é nulo ou vazio (MySQL 5.7)
DROP FUNCTION IF EXISTS JSON_IS_NULL_OR_EMPTY;

DELIMITER $$

CREATE FUNCTION JSON_IS_NULL_OR_EMPTY(json_data JSON,
                                      field VARCHAR(255))
    RETURNS bit(1)
    DETERMINISTIC
BEGIN

    IF (JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field))) IS NULL) THEN
        return true;
    ELSEIF ((JSON_EXTRACT(json_data, CONCAT('$.', field))) = CAST('null' AS JSON)) THEN
        return true;
    ELSEIF trim(JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field)))) = '' THEN
        return true;
    ELSE
        return false;

    END IF;
END$$

DELIMITER ;
