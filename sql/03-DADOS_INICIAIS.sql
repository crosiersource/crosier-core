SET FOREIGN_KEY_CHECKS=0;

TRUNCATE TABLE cfg_estabelecimento;
TRUNCATE TABLE sec_user;
TRUNCATE TABLE sec_group;
TRUNCATE TABLE sec_role;
TRUNCATE TABLE sec_group_role;
TRUNCATE TABLE sec_user_role;
TRUNCATE TABLE cfg_app;
TRUNCATE TABLE cfg_program;
TRUNCATE TABLE cfg_entmenu;


INSERT INTO cfg_estabelecimento(id,codigo,descricao,concreto,pai_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,1,'ADMIN',true,null,now(),now(),1,1);

INSERT INTO sec_user(id,username,nome,email,password,ativo,group_id,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,'admin','Admin','','$2y$13$NO92WWcpohWwurgTAtG5e.TBRjo2Jp/p3mSfnvNvsFCmtkD4lwqy.',true,1,1,now(),now(),1,1);



INSERT INTO sec_group(id,groupname,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,'ADMIN',1,now(),now(),1,1);
INSERT INTO sec_role(id,role,descricao,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id)  VALUES( 1,'ROLE_ADMIN','',1,now(),now(),1,1);
INSERT INTO sec_group_role(group_id,role_id) VALUES(1,1);
INSERT INTO sec_user_role(user_id,role_id) VALUES(1,1);




INSERT INTO `cfg_app` (`id`,`uuid`, `inserted`, `updated`, `nome`, `obs`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `default_entmenu_uuid`) 
VALUES (1,'175bd6d3-6c29-438a-9520-47fcee653cc5','1900-01-01 00:00:00','1900-01-01 00:00:00','CrosierCore','',1,1,1,'71d1456b-3a9f-4589-8f71-42bbf6c91a3e');


INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('CROSIERCORE - DASHBOARD','/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'4f4df268-09ef-4e9c-bbc9-82eaf85de43f');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('PARÂMETROS [LIST]','/cfg/config/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'93d6c377-6070-46fc-81fc-cdd1c67ccfab');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('PARÂMETROS [FORM]','/cfg/config/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'d54092da-1cf1-4a67-8597-2d9a571221aa');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('USUÁRIOS [LIST]','/sec/user/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'022bd4b2-4917-4524-be23-02c7c50596f4');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('USUÁRIOS [FORM]','/sec/user/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'71911dec-a2ba-4f97-8f84-b51d25e3f0f2');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('GRUPOS DE USUÁRIOS [LIST]','/sec/group/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'d2c56fc3-a9b5-43bb-a0b6-bd49badf3843');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('GRUPOS DE USUÁRIOS [FORM]','/sec/group/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'82647540-35c4-4240-a8e9-cdc5f2aed355');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('PROGRAMAS [LIST]','/cfg/program/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'4d8765f4-e0f5-4cab-9f00-1c65a8c9ecb7');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('PROGRAMAS [FORM]','/cfg/program/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'e0c434a5-824e-40e0-8229-4b736c92dca8');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
VALUES ('APPS [LIST]','/cfg/app/list/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'06104b18-3e32-4ff3-b822-2c65f79317a1');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`)
VALUES ('APPS [FORM]','/cfg/app/form/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'0220c525-4de2-432f-8881-54db07b9e650');

INSERT INTO `cfg_program` (`descricao`, `url`, `app_uuid`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`, `entmenu_uuid`, `uuid`) 
VALUES ('MENUS PRINCIPAIS','/cfg/entMenu/listPais/','175bd6d3-6c29-438a-9520-47fcee653cc5',now(),now(),1,1,1,NULL,'d7ae5e2c-961b-4aa2-a7fe-a7db860b75f9');






INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('71d1456b-3a9f-4589-8f71-42bbf6c91a3e','CrosierCore Menu',       '','PAI',NULL,NULL,1,'',now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('e290e24f-a050-4bba-8ee8-877d55242267','Configurações',          'fas fa-cogs','DROPDOWN',NULL,1,1,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('849ef7e7-6dcb-4db6-b7e2-43b695ac6e90','Parâmetros do Sistema',  'fas fa-columns','ENT','93d6c377-6070-46fc-81fc-cdd1c67ccfab',2,2,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('55b8894c-06b1-4d5e-8480-ad2a0150bfa6','Usuários',               'fas fa-users','ENT','022bd4b2-4917-4524-be23-02c7c50596f4',2,4,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('0fbcfb61-3224-4b72-a3e6-86785b21d379','Grupos de Usuários',     'fas fa-people-carry','ENT','d2c56fc3-a9b5-43bb-a0b6-bd49badf3843',2,5,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('73292344-d2ca-4101-b838-1551eb8eccad','Menus',                  'fas fa-bars','ENT','d7ae5e2c-961b-4aa2-a7fe-a7db860b75f9',2,3,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('264286e6-844d-421a-919a-37aef5ad8644','Geral',                 'far fa-dot-circle','DROPDOWN',NULL,1,0,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('bc1a31da-5d1e-4879-848d-3d983d1a1202','Pessoas',               'far fa-user-circle','ENT',NULL,18,0,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('60b3a262-deb3-4f19-ad51-36cc7d3cf468','Informações Cadastrais','far fa-id-card','ENT',NULL,18,0,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('886797b4-2124-43eb-b780-e271f7dc5c3b','Categorias',            'far fa-id-badge','ENT',NULL,18,0,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`) 
VALUES ('b87ebd2d-1af3-4aa9-b5e1-9d68ede111cc','Programas',             'fas fa-microchip','ENT','175bd6d3-6c29-438a-9520-47fcee653cc5',2,5,NULL,now(),now(),1,1,1);

INSERT INTO `cfg_entmenu` (`uuid`, `label`, `icon`, `tipo`, `program_uuid`, `pai_id`, `ordem`, `css_style`, `inserted`, `updated`, `estabelecimento_id`, `user_inserted_id`, `user_updated_id`)
VALUES ('ceda07f6-a9fe-4bf8-a2cc-7bda0533d771','Aplicativos',             'fas fa-object-group','ENT','06104b18-3e32-4ff3-b822-2c65f79317a1',2,6,NULL,now(),now(),1,1,1);





