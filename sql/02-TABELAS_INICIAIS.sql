SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `cfg_estabelecimento`;

DROP TABLE IF EXISTS `sec_group`;
DROP TABLE IF EXISTS `sec_role`;
DROP TABLE IF EXISTS `sec_group_role`;
DROP TABLE IF EXISTS `sec_user`;
DROP TABLE IF EXISTS `sec_user_role`;


DROP TABLE IF EXISTS `cfg_config`;
DROP TABLE IF EXISTS `cfg_app`;
DROP TABLE IF EXISTS `cfg_app_config`;
DROP TABLE IF EXISTS `cfg_program`;
DROP TABLE IF EXISTS `cfg_program_config`;
DROP TABLE IF EXISTS `cfg_entmenu`;


DROP TABLE IF EXISTS `ger_pessoa`;
DROP TABLE IF EXISTS `ger_infocad_categ`;
DROP TABLE IF EXISTS `ger_infocad`;
DROP TABLE IF EXISTS `ger_municipio`;
DROP TABLE IF EXISTS `ger_uf`;
DROP TABLE IF EXISTS `ger_dia_util`;






CREATE TABLE `cfg_estabelecimento` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `codigo` bigint(20) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `concreto` bit(1) NOT NULL,
  `pai_id` bigint(20) DEFAULT NULL,

  `updated` datetime DEFAULT NULL,
  `inserted` datetime DEFAULT NULL,
  `user_inserted_id` bigint(20) DEFAULT NULL,
  `user_updated_id` bigint(20) DEFAULT NULL,  
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_estabelecimento_codigo` (`codigo`),
  KEY `K_cfg_estabelecimento_pai` (`pai_id`),
  CONSTRAINT `FK_cfg_estabelecimento_pai` FOREIGN KEY (`pai_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;





CREATE TABLE `sec_group` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `groupname` varchar(90) COLLATE utf8_swedish_ci NOT NULL,

  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_sec_group_groupname` (`groupname`),
  KEY `K_sec_group_estabelecimento` (`estabelecimento_id`),
  KEY `K_sec_group_user_inserted` (`user_inserted_id`),
  KEY `K_sec_group_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_sec_group_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_sec_group_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_group_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `sec_role` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `role` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `descricao` varchar(90) COLLATE utf8_swedish_ci NOT NULL,

  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_sec_role_role` (`role`),
  KEY `K_sec_role_estabelecimento` (`estabelecimento_id`),
  KEY `K_sec_role_user_inserted` (`user_inserted_id`),
  KEY `K_sec_role_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_sec_role_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_role_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_role_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `sec_group_role` (
  `group_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  KEY `K_sec_group_role_role` (`role_id`),
  KEY `K_sec_group_role_group` (`group_id`),
  CONSTRAINT `FK_sec_group_role_role` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`),
  CONSTRAINT `FK_sec_group_role_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;






CREATE TABLE `sec_user` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `username` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `nome` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ativo` bit(1) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `api_token_expires_at` datetime DEFAULT NULL,

  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_sec_user_username_estabelecimento` (`username`,`estabelecimento_id`) USING BTREE,
  KEY `K_sec_user_estabelecimento` (`estabelecimento_id`),
  KEY `K_sec_user_user_inserted` (`user_inserted_id`),
  KEY `K_sec_user_user_updated` (`user_updated_id`),
  KEY `K_sec_user_group` (`group_id`),
  CONSTRAINT `FK_sec_user_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_sec_user_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_user_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_user_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `sec_user_role` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  KEY `K_sec_user_role_role` (`role_id`),
  KEY `K_sec_user_role_user` (`user_id`),
  CONSTRAINT `FK_sec_user_role_role` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_user_role_user` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



CREATE TABLE `cfg_config` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `chave` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `valor` varchar(10000) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `global` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,  
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_config_chave_estabelecimento` (`chave`,`estabelecimento_id`) USING BTREE,
  KEY `K_cfg_config_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_config_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_config_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_config_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_config_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_config_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `cfg_app` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `nome` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `default_entmenu_uuid` char(36) NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg_app_nome` (`nome`),
  UNIQUE KEY `cfg_app_uuid` (`uuid`),
  KEY `K_cfg_app_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_app_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_app_user_updated` (`user_updated_id`),
  KEY `K_cfg_app_entmenu` (`default_entmenu_uuid`),
  CONSTRAINT `FK_cfg_app_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_app_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_entmenu` FOREIGN KEY (`default_entmenu_uuid`) REFERENCES `cfg_entmenu` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `cfg_app_config` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `chave` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `valor` LONGBLOB,
  `app_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_app_config_chave_app` (`chave`, `app_id`),
  KEY `K_cfg_app_config_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_app_config_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_app_config_user_updated` (`user_updated_id`),
  KEY `K_cfg_app_config_app` (`app_id`),
  CONSTRAINT `FK_cfg_app_config_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_app_config_app` FOREIGN KEY (`app_id`) REFERENCES `cfg_app` (`id`),
  CONSTRAINT `FK_cfg_app_config_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_config_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `cfg_program` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `url` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `app_uuid` char(36) NOT NULL,
  `entmenu_uuid` char(36) NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_program_descricao_app` (`descricao`, `app_uuid`),
  UNIQUE KEY `UK_cfg_program_id` (`uuid`),
  KEY `K_cfg_program_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_program_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_program_user_updated` (`user_updated_id`),
  KEY `K_cfg_program_app` (`app_uuid`),
  KEY `K_cfg_program_entmenu` (`entmenu_uuid`),
  CONSTRAINT `FK_cfg_program_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_program_app` FOREIGN KEY (`app_uuid`) REFERENCES `cfg_app` (`uuid`),
  CONSTRAINT `FK_cfg_program_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_program_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_program_entmenu` FOREIGN KEY (`entmenu_uuid`) REFERENCES `cfg_entmenu` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `cfg_program_config` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `chave` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `valor` LONGBLOB,
  `program_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_program_config` (`chave`,`program_id`),
  KEY `K_cfg_program_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_program_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_program_user_updated` (`user_updated_id`),
  KEY `K_cfg_program_config_program` (`program_id`),
  CONSTRAINT `FK_cfg_program_config_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_program_config_program` FOREIGN KEY (`program_id`) REFERENCES `cfg_program` (`id`),
  CONSTRAINT `FK_cfg_program_config_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_program_config_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `cfg_entmenu` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `label` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `program_uuid` char(36) DEFAULT NULL,
  `pai_id` bigint(20) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `css_style` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_entmenu_uuid` (`uuid`),
  KEY `K_cfg_entmenu_program` (`program_uuid`),
  KEY `K_cfg_entmenu_pai` (`pai_id`),
  KEY `K_cfg_entmenu_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_entmenu_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_entmenu_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_entmenu_program` FOREIGN KEY (`program_uuid`) REFERENCES `cfg_program` (`uuid`),
  CONSTRAINT `FK_cfg_entmenu_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_entmenu_pai` FOREIGN KEY (`pai_id`) REFERENCES `cfg_entmenu` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;










-- Tabela mais genérica sobre relacionamentos pessoais
CREATE TABLE `ger_pessoa` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `nome` VARCHAR(255) COLLATE utf8_swedish_ci NOT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_ger_pessoa_id` (`id`),
  KEY `K_ger_pessoa_estabelecimento` (`estabelecimento_id`),
  KEY `K_ger_pessoa_user_inserted` (`user_inserted_id`),
  KEY `K_ger_pessoa_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_ger_pessoa_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_ger_pessoa_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_pessoa_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



-- Categorização para os tipos de 'infocad' (CLIENTE, FORNECEDOR, etc)
CREATE TABLE `ger_infocad_categ` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `descricao` VARCHAR(255) COLLATE utf8_swedish_ci NOT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `K_ger_infocad_categ_estabelecimento` (`estabelecimento_id`),
  KEY `K_ger_infocad_categ_user_inserted` (`user_inserted_id`),
  KEY `K_ger_infocad_categ_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_ger_infocad_categ_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_ger_infocad_categ_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_infocad_categ_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




-- Informações cadastrais
CREATE TABLE `ger_infocad` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `pessoa_id` bigint(20) NOT NULL,
  `infocad_categ_id` bigint(20) NOT NULL,    
  `tipo` ENUM('Pessoa Física', 'Pessoa Jurídica'),
  `nome_fantasia` VARCHAR(255) COLLATE utf8_swedish_ci NOT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `rg_ie` varchar(20) DEFAULT NULL,

  `enderecos` json DEFAULT NULL,
  `municipio_id` bigint(20) DEFAULT NULL,
  `cep` char(8) NOT NULL,  
  `fones` json DEFAULT NULL,
  `observacao` varchar(3000) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_ger_infocad_pessoa_id` (`pessoa_id`),
  KEY `K_ger_infocad_categ` (`infocad_categ_id`),
  KEY `K_ger_infocad_estabelecimento` (`estabelecimento_id`),
  KEY `K_ger_infocad_user_inserted` (`user_inserted_id`),
  KEY `K_ger_infocad_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_ger_infocad_categ` FOREIGN KEY (`infocad_categ_id`) REFERENCES `ger_infocad` (`id`),
  CONSTRAINT `FK_ger_infocad_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `ger_pessoa` (`id`),
  CONSTRAINT `FK_ger_infocad_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_ger_infocad_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_infocad_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;






CREATE TABLE `ger_municipio` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `municipio_codigo` int(11) NOT NULL,
  `municipio_nome` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `uf_nome` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `uf_sigla` varchar(2) COLLATE utf8_swedish_ci DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_ger_municipio` (`uf_sigla`,`municipio_nome`),
  KEY `K_ger_municipio_estabelecimento` (`estabelecimento_id`),
  KEY `K_ger_municipio_user_inserted` (`user_inserted_id`),
  KEY `K_ger_municipio_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_ger_municipio_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_municipio_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_municipio_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `ger_uf` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `sigla` char(2) COLLATE utf8_swedish_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `codigo_IBGE` int(11) NOT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_ger_uf_sigla` (`sigla`),
  UNIQUE KEY `UK_ger_uf_nome` (`nome`),
  UNIQUE KEY `UK_ger_uf_codigo_IBGE` (`codigo_IBGE`),
  KEY `K_ger_uf_estabelecimento` (`estabelecimento_id`),
  KEY `K_ger_uf_user_inserted` (`user_inserted_id`),
  KEY `K_ger_uf_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_ger_uf_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_uf_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_uf_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `ger_dia_util` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `dia` datetime NOT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci DEFAULT NULL,
  `comercial` bit(1) NOT NULL,
  `financeiro` bit(1) NOT NULL,
  `municipio_id` bigint(20) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_ger_dia_util` (`dia`, `municipio_id`),
  KEY `K_ger_dia_util_estabelecimento` (`estabelecimento_id`),
  KEY `K_ger_dia_util_user_inserted` (`user_inserted_id`),
  KEY `K_ger_dia_util_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_ger_dia_util_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_dia_util_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_ger_dia_util_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;





