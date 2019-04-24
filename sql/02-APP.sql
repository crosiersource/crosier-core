START TRANSACTION;

SET FOREIGN_KEY_CHECKS=0;

DELETE FROM cfg_app WHERE uuid = '175bd6d3-6c29-438a-9520-47fcee653cc5';

INSERT INTO `cfg_app` (`id`,`uuid`, `inserted`, `updated`, `nome`, `obs`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `default_entmenu_uuid`) 
VALUES (1,'175bd6d3-6c29-438a-9520-47fcee653cc5','1900-01-01 00:00:00','1900-01-01 00:00:00','CrosierCore','',1,1,1,'71d1456b-3a9f-4589-8f71-42bbf6c91a3e');


-- CrosierCore - MainMenu
DELETE FROM cfg_entmenu WHERE uuid = '71d1456b-3a9f-4589-8f71-42bbf6c91a3e';
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('71d1456b-3a9f-4589-8f71-42bbf6c91a3e','CrosierCore Menu',       '','PAI',NULL,NULL,1,'',now(),now(),1,1,1);


-- CrosierCore - Dashboard
DELETE FROM cfg_entmenu WHERE uuid = '5b5ed5ea-b429-462b-9cb7-148a22c4b553';
DELETE FROM cfg_program WHERE uuid = '4f4df268-09ef-4e9c-bbc9-82eaf85de43f';

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('5b5ed5ea-b429-462b-9cb7-148a22c4b553','Dashboard',  'fas fa-columns','ENT','4f4df268-09ef-4e9c-bbc9-82eaf85de43f','71d1456b-3a9f-4589-8f71-42bbf6c91a3e',1,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('CROSIERCORE - DASHBOARD','/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'4f4df268-09ef-4e9c-bbc9-82eaf85de43f');




-- (Submenu) Configurações

DELETE FROM cfg_entmenu WHERE uuid = 'e290e24f-a050-4bba-8ee8-877d55242267';

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('e290e24f-a050-4bba-8ee8-877d55242267','Configurações',          'fas fa-cogs','DROPDOWN',NULL,'71d1456b-3a9f-4589-8f71-42bbf6c91a3e',999,NULL,now(),now(),1,1,1);


    -- Parâmetros
    DELETE FROM cfg_entmenu WHERE uuid = '849ef7e7-6dcb-4db6-b7e2-43b695ac6e90';
    DELETE FROM cfg_program WHERE uuid = '93d6c377-6070-46fc-81fc-cdd1c67ccfab';
    DELETE FROM cfg_program WHERE uuid = 'd54092da-1cf1-4a67-8597-2d9a571221aa';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('849ef7e7-6dcb-4db6-b7e2-43b695ac6e90','Parâmetros do Sistema',  'fas fa-columns','ENT','93d6c377-6070-46fc-81fc-cdd1c67ccfab','e290e24f-a050-4bba-8ee8-877d55242267',2,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('PARÂMETROS [LIST]','/cfg/config/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'93d6c377-6070-46fc-81fc-cdd1c67ccfab');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('PARÂMETROS [FORM]','/cfg/config/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'d54092da-1cf1-4a67-8597-2d9a571221aa');


    -- Usuários
    DELETE FROM cfg_entmenu WHERE uuid = '55b8894c-06b1-4d5e-8480-ad2a0150bfa6';
    DELETE FROM cfg_program WHERE uuid = '022bd4b2-4917-4524-be23-02c7c50596f4';
    DELETE FROM cfg_program WHERE uuid = '71911dec-a2ba-4f97-8f84-b51d25e3f0f2';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('55b8894c-06b1-4d5e-8480-ad2a0150bfa6','Usuários',               'fas fa-users','ENT','022bd4b2-4917-4524-be23-02c7c50596f4','e290e24f-a050-4bba-8ee8-877d55242267',4,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('USUÁRIOS [LIST]','/sec/user/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'022bd4b2-4917-4524-be23-02c7c50596f4');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('USUÁRIOS [FORM]','/sec/user/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'71911dec-a2ba-4f97-8f84-b51d25e3f0f2');



    -- Grupos de Usuários
    DELETE FROM cfg_entmenu WHERE uuid = '0fbcfb61-3224-4b72-a3e6-86785b21d379';
    DELETE FROM cfg_program WHERE uuid = 'd2c56fc3-a9b5-43bb-a0b6-bd49badf3843';
    DELETE FROM cfg_program WHERE uuid = '82647540-35c4-4240-a8e9-cdc5f2aed355';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('0fbcfb61-3224-4b72-a3e6-86785b21d379','Grupos de Usuários',     'fas fa-people-carry','ENT','d2c56fc3-a9b5-43bb-a0b6-bd49badf3843','e290e24f-a050-4bba-8ee8-877d55242267',5,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('GRUPOS DE USUÁRIOS [LIST]','/sec/group/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'d2c56fc3-a9b5-43bb-a0b6-bd49badf3843');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('GRUPOS DE USUÁRIOS [FORM]','/sec/group/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'82647540-35c4-4240-a8e9-cdc5f2aed355');


    -- Programas
    DELETE FROM cfg_entmenu WHERE uuid = 'b87ebd2d-1af3-4aa9-b5e1-9d68ede111cc';
    DELETE FROM cfg_program WHERE uuid = '4d8765f4-e0f5-4cab-9f00-1c65a8c9ecb7';
    DELETE FROM cfg_program WHERE uuid = 'e0c434a5-824e-40e0-8229-4b736c92dca8';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('b87ebd2d-1af3-4aa9-b5e1-9d68ede111cc','Programas',             'fas fa-microchip','ENT','4d8765f4-e0f5-4cab-9f00-1c65a8c9ecb7','e290e24f-a050-4bba-8ee8-877d55242267',5,NULL,now(),now(),1,1,1);
    
    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('PROGRAMAS [LIST]','/cfg/program/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'4d8765f4-e0f5-4cab-9f00-1c65a8c9ecb7');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('PROGRAMAS [FORM]','/cfg/program/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'e0c434a5-824e-40e0-8229-4b736c92dca8');


    -- Apps
    DELETE FROM cfg_entmenu WHERE uuid = 'ceda07f6-a9fe-4bf8-a2cc-7bda0533d771';
    DELETE FROM cfg_program WHERE uuid = '06104b18-3e32-4ff3-b822-2c65f79317a1';
    DELETE FROM cfg_program WHERE uuid = '0220c525-4de2-432f-8881-54db07b9e650';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`)
    VALUES ('ceda07f6-a9fe-4bf8-a2cc-7bda0533d771','Aplicativos',             'fas fa-object-group','ENT','06104b18-3e32-4ff3-b822-2c65f79317a1','e290e24f-a050-4bba-8ee8-877d55242267',6,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('APPS [LIST]','/cfg/app/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'06104b18-3e32-4ff3-b822-2c65f79317a1');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('APPS [FORM]','/cfg/app/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'0220c525-4de2-432f-8881-54db07b9e650');


    -- Menus
    DELETE FROM cfg_entmenu WHERE uuid = '73292344-d2ca-4101-b838-1551eb8eccad';
    DELETE FROM cfg_program WHERE uuid = 'd7ae5e2c-961b-4aa2-a7fe-a7db860b75f9';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('73292344-d2ca-4101-b838-1551eb8eccad','Menus',                  'fas fa-bars','ENT','d7ae5e2c-961b-4aa2-a7fe-a7db860b75f9','e290e24f-a050-4bba-8ee8-877d55242267',3,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
    VALUES ('MENUS PRINCIPAIS','/cfg/entMenu/listPais/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'d7ae5e2c-961b-4aa2-a7fe-a7db860b75f9');





-- (Submenu) Geral

DELETE FROM cfg_entmenu WHERE uuid = '264286e6-844d-421a-919a-37aef5ad8644';
    
INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('264286e6-844d-421a-919a-37aef5ad8644','Geral',                 'far fa-dot-circle','DROPDOWN',NULL,'71d1456b-3a9f-4589-8f71-42bbf6c91a3e',2,NULL,now(),now(),1,1,1);


    -- Pessoas
    DELETE FROM cfg_entmenu WHERE uuid = 'bc1a31da-5d1e-4879-848d-3d983d1a1202';
    DELETE FROM cfg_program WHERE uuid = 'e11957ce-6ce4-42e1-890b-2053f7d0d5e5';
    DELETE FROM cfg_program WHERE uuid = '8f3e70d3-e374-401f-8881-c9cb845ef14e';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('bc1a31da-5d1e-4879-848d-3d983d1a1202','Pessoas',               'far fa-user-circle','ENT','e11957ce-6ce4-42e1-890b-2053f7d0d5e5','264286e6-844d-421a-919a-37aef5ad8644',1,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('PESSOAS [LIST]','/bse/pessoa/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'e11957ce-6ce4-42e1-890b-2053f7d0d5e5');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('PESSOAS [FORM]','/bse/pessoa/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'8f3e70d3-e374-401f-8881-c9cb845ef14e');



    -- Categorias
    DELETE FROM cfg_entmenu WHERE uuid = '886797b4-2124-43eb-b780-e271f7dc5c3b';
    DELETE FROM cfg_program WHERE uuid = '34554ccb-4f6b-4b05-8040-7b08b87d1bfb';
    DELETE FROM cfg_program WHERE uuid = 'fc5f28f4-09e8-48d3-976b-359f5d0a5fa8';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
    VALUES ('886797b4-2124-43eb-b780-e271f7dc5c3b','Categorias',            'far fa-id-badge','ENT','34554ccb-4f6b-4b05-8040-7b08b87d1bfb','264286e6-844d-421a-919a-37aef5ad8644',3,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('CATEGORIAS [LIST]','/bse/categoria/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'34554ccb-4f6b-4b05-8040-7b08b87d1bfb');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('CATEGORIAS [FORM]','/bse/categoria/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'fc5f28f4-09e8-48d3-976b-359f5d0a5fa8');


    -- Propriedades
    DELETE FROM cfg_entmenu WHERE uuid = 'dfa4c109-1b23-415a-9110-66912bda2f61';
    DELETE FROM cfg_program WHERE uuid = '250797fa-dece-4fa4-ba89-ef37c7281e58';
    DELETE FROM cfg_program WHERE uuid = '3e37647f-2592-434b-9863-c3a963d154f2';

    INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_uuid`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`)
    VALUES ('dfa4c109-1b23-415a-9110-66912bda2f61','Propriedades',            'fas fa-project-diagram','ENT','250797fa-dece-4fa4-ba89-ef37c7281e58','264286e6-844d-421a-919a-37aef5ad8644',3,NULL,now(),now(),1,1,1);

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('PROPRIEDADES [LIST]','/bse/prop/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'250797fa-dece-4fa4-ba89-ef37c7281e58');

    INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
    VALUES ('PROPRIEDADES [FORM]','/bse/prop/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'3e37647f-2592-434b-9863-c3a963d154f2');



COMMIT;
