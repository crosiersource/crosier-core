SET FOREIGN_KEY_CHECKS = 0;

DELETE
FROM cfg_app
WHERE uuid = '175bd6d3-6c29-438a-9520-47fcee653cc5';

INSERT INTO `cfg_app` (`id`, `uuid`, `inserted`, `updated`, `nome`, `obs`, `estabelecimento_id`, `user_inserted_id`,
                       `user_updated_id`)
VALUES (1, '175bd6d3-6c29-438a-9520-47fcee653cc5', '1900-01-01 00:00:00', '1900-01-01 00:00:00', 'crosier-core', '', 1,
        1, 1);

COMMIT;
