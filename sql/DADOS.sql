SET FOREIGN_KEY_CHECKS = 0;

START TRANSACTION;

TRUNCATE TABLE cfg_estabelecimento;
TRUNCATE TABLE sec_user;
TRUNCATE TABLE sec_group;
TRUNCATE TABLE sec_role;
TRUNCATE TABLE sec_group_role;
TRUNCATE TABLE sec_user_role;


INSERT INTO cfg_estabelecimento(id, codigo, descricao, concreto, pai_id, updated, inserted, user_inserted_id, user_updated_id, estabelecimento_id)
VALUES (1, 1, 'ADMIN', true, null, now(), now(), 1, 1, 1);


-- Senha padrão: admin@123
INSERT INTO sec_user(id, username, nome, email, password, ativo, group_id, estabelecimento_id, updated, inserted, user_inserted_id, user_updated_id)
VALUES (1, 'admin', 'Admin', '', '$argon2id$v=19$m=65536,t=4,p=1$3mj2TxDtNWJsp0EkjC0bDQ$0L8SC83i3cmjGfYxet7DkmzA+/wsWUp09Yg9l7qNcBk', true, 1, 1, now(), now(), 1, 1);



INSERT INTO sec_group(id, groupname, estabelecimento_id, updated, inserted, user_inserted_id, user_updated_id)
VALUES (1, 'ADMIN', 1, now(), now(), 1, 1);
INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id, user_updated_id)
VALUES (1, 'ROLE_ADMIN', '', 1, now(), now(), 1, 1);
INSERT INTO sec_role(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id, user_updated_id)
VALUES (2, 'ROLE_ALLOWED_TO_SWITCH', '', 1, now(), now(), 1, 1);
INSERT INTO sec_group_role(group_id, role_id)
VALUES (1, 1);
INSERT INTO sec_user_role(user_id, role_id)
VALUES (1, 1);




DELETE
FROM cfg_app
WHERE uuid = '175bd6d3-6c29-438a-9520-47fcee653cc5';

INSERT INTO `cfg_app` (`id`, `uuid`, `inserted`, `updated`, `nome`, `obs`, `estabelecimento_id`, `user_inserted_id`,
                       `user_updated_id`)
VALUES (1, '175bd6d3-6c29-438a-9520-47fcee653cc5', '1900-01-01 00:00:00', '1900-01-01 00:00:00', 'crosier-core', 'Núcleo do Crosier', 1,
        1, 1);


--
--
--
-- CrosierCore - MainMenu
DELETE
FROM cfg_entmenu
WHERE uuid = '71d1456b-3a9f-4589-8f71-42bbf6c91a3e';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('71d1456b-3a9f-4589-8f71-42bbf6c91a3e', 'crosier-core (Menu Raíz)', 'fas fa-dollar-sign', 'PAI',
        '175bd6d3-6c29-438a-9520-47fcee653cc5', NULL, 1, '', now(), now(),
        1, 1, 1, '', '');


-- CrosierCore - Dashboard
DELETE
FROM cfg_entmenu
WHERE uuid = '5b5ed5ea-b429-462b-9cb7-148a22c4b553';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('5b5ed5ea-b429-462b-9cb7-148a22c4b553', 'Dashboard', 'fas fa-columns', 'ENT',
        '175bd6d3-6c29-438a-9520-47fcee653cc5', '71d1456b-3a9f-4589-8f71-42bbf6c91a3e', 1, NULL, now(), now(), 1, 1, 1,
        '/', 'ROLE_ADMIN');


-- (Submenu) Configurações

DELETE
FROM cfg_entmenu
WHERE uuid = 'e290e24f-a050-4bba-8ee8-877d55242267';

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('e290e24f-a050-4bba-8ee8-877d55242267', 'Configurações', 'fas fa-cogs', 'DROPDOWN',
        '175bd6d3-6c29-438a-9520-47fcee653cc5',
        '71d1456b-3a9f-4589-8f71-42bbf6c91a3e', 999, NULL, now(), now(), 1, 1, 1, '', '');

-- Listas de Mensagens
DELETE
FROM cfg_entmenu
WHERE uuid = '55b8894c-06b1-4d5e-8480-ad2a0150bfa6';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('2ee7abac-5e5e-11ec-a0f4-2b076214d3ab', 'Listas de Mensagens', 'fas fa-volume-up', 'ENT',
        '175bd6d3-6c29-438a-9520-47fcee653cc5', 'e290e24f-a050-4bba-8ee8-877d55242267', 0, NULL, now(), now(), 1, 1, 1,
        '/v/config/pushMessages/assinatura', '');


-- Usuários
DELETE
FROM cfg_entmenu
WHERE uuid = '55b8894c-06b1-4d5e-8480-ad2a0150bfa6';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('55b8894c-06b1-4d5e-8480-ad2a0150bfa6', 'Usuários', 'fas fa-users', 'ENT',
        '175bd6d3-6c29-438a-9520-47fcee653cc5', 'e290e24f-a050-4bba-8ee8-877d55242267', 4, NULL, now(), now(), 1, 1, 1,
        '/sec/user/list/', 'ROLE_ADMIN');

-- Grupos de Usuários
DELETE
FROM cfg_entmenu
WHERE uuid = '0fbcfb61-3224-4b72-a3e6-86785b21d379';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('0fbcfb61-3224-4b72-a3e6-86785b21d379', 'Grupos de Usuários', 'fas fa-people-carry', 'ENT',
        '175bd6d3-6c29-438a-9520-47fcee653cc5', 'e290e24f-a050-4bba-8ee8-877d55242267', 5, NULL, now(), now(), 1, 1, 1,
        '/sec/group/list/', 'ROLE_ADMIN');

-- Apps
DELETE
FROM cfg_entmenu
WHERE uuid = 'ceda07f6-a9fe-4bf8-a2cc-7bda0533d771';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('ceda07f6-a9fe-4bf8-a2cc-7bda0533d771', 'Apps', 'fas fa-object-group', 'ENT',
        '175bd6d3-6c29-438a-9520-47fcee653cc5', 'e290e24f-a050-4bba-8ee8-877d55242267', 6, NULL, now(), now(), 1, 1, 1,
        '/cfg/app/list/', 'ROLE_ADMIN');

-- Menus
DELETE
FROM cfg_entmenu
WHERE uuid = '73292344-d2ca-4101-b838-1551eb8eccad';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `app_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`,
                           `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `url`, `roles`)
VALUES ('73292344-d2ca-4101-b838-1551eb8eccad', 'Menus', 'fas fa-bars', 'ENT', '175bd6d3-6c29-438a-9520-47fcee653cc5',
        'e290e24f-a050-4bba-8ee8-877d55242267', 3, NULL, now(), now(), 1, 1, 1, '/cfg/entMenu/listPais/', 'ROLE_ADMIN');



--
--
--
--
--
--
--
-- cfg_entmenu_locator
--
INSERT INTO cfg_entmenu_locator(menu_uuid, url_regexp, quem, inserted, updated, estabelecimento_id, user_inserted_id,
                                user_updated_id)
VALUES ('71d1456b-3a9f-4589-8f71-42bbf6c91a3e', '^https://core\.', '*', now(), now(), 1, 1, 1);


COMMIT;
