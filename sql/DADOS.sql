SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE cfg_estabelecimento;
TRUNCATE TABLE sec_user;
TRUNCATE TABLE sec_group;
TRUNCATE TABLE sec_role;
TRUNCATE TABLE sec_group_role;
TRUNCATE TABLE sec_user_role;


INSERT INTO cfg_estabelecimento(id, codigo, descricao, concreto, pai_id, updated, inserted,
                                user_inserted_id, user_updated_id, estabelecimento_id)
VALUES (1, 1, 'ADMIN', true, null, now(), now(), 1, 1, 1);


-- Senha padrão: admin@123
INSERT INTO sec_user(id, username, nome, email, password, ativo, group_id, estabelecimento_id,
                     updated, inserted, user_inserted_id, user_updated_id)
VALUES (1, 'admin', 'Admin', 'admin@email.com',
        '$argon2id$v=19$m=65536,t=4,p=1$3mj2TxDtNWJsp0EkjC0bDQ$0L8SC83i3cmjGfYxet7DkmzA+/wsWUp09Yg9l7qNcBk',
        true, 1, 1, now(), now(), 1, 1);

INSERT INTO sec_user(id, username, nome, email, password, ativo, group_id, estabelecimento_id,
                     updated, inserted, user_inserted_id, user_updated_id, api_token, api_token_expires_at)
VALUES (2, 'uploader', 'UPLOADER', 'upload@crosier.com.br', '', false, 1, 1, now(), now(), 1, 1, '999999', '2900-12-31');



INSERT INTO sec_group(id, groupname, estabelecimento_id, updated, inserted, user_inserted_id,
                      user_updated_id)
VALUES (1, 'ADMIN', 1, now(), now(), 1, 1);

INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id,
                     user_updated_id)
VALUES (1, 'ROLE_ADMIN', '', 1, now(), now(), 1, 1);
INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id,
                     user_updated_id)
VALUES (2, 'ROLE_ALLOWED_TO_SWITCH', '', 1, now(), now(), 1, 1);
INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id,
                     user_updated_id)
VALUES (3, 'ROLE_UPLOAD', '', 1, now(), now(), 1, 1);
INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id,
                     user_updated_id)
VALUES (4, 'ROLE_ENTITY_CHANGES', 'Pode visualizar os registros de alterações das entidades.', 1, now(), now(), 1, 1);
INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id,
                     user_updated_id)
VALUES (null, 'ROLE_NENHUMA', 'Role sem efeito (serve apenas para poder deixar um usuário com apenas 1 role).', 1, now(), now(), 1, 1);

INSERT INTO sec_group_role(group_id, role_id)
VALUES (1, 1);

INSERT INTO sec_user_role(user_id, role_id)
VALUES (1, 1);

INSERT INTO sec_user_role(user_id, role_id)
VALUES (2, 3);



DELETE
FROM cfg_app
WHERE uuid = '175bd6d3-6c29-438a-9520-47fcee653cc5';

INSERT INTO `cfg_app` (`id`, `uuid`, `inserted`, `updated`, `nome`, `obs`, `estabelecimento_id`,
                       `user_inserted_id`,
                       `user_updated_id`)
VALUES (1, '175bd6d3-6c29-438a-9520-47fcee653cc5', '1900-01-01 00:00:00', '1900-01-01 00:00:00',
        'crosier-core', 'Núcleo do Crosier', 1,
        1, 1);


DELETE
FROM cfg_app_config
WHERE chave = 'URL_devlocal' AND app_uuid = '175bd6d3-6c29-438a-9520-47fcee653cc5';

