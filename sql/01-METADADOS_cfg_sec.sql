SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS `cfg_estabelecimento`;

CREATE TABLE `cfg_estabelecimento` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `codigo` bigint(20) NOT NULL,
  `descricao` varchar(200)  NOT NULL,
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




DROP TABLE IF EXISTS `sec_group`;

CREATE TABLE `sec_group` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `groupname` varchar(90)  NOT NULL,

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



DROP TABLE IF EXISTS `sec_role`;

CREATE TABLE `sec_role` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `role` varchar(90)  NOT NULL,
  `descricao` varchar(90)  NOT NULL,

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


DROP TABLE IF EXISTS `sec_group_role`;

CREATE TABLE `sec_group_role` (
  `group_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  KEY `K_sec_group_role_role` (`role_id`),
  KEY `K_sec_group_role_group` (`group_id`),
  CONSTRAINT `FK_sec_group_role_role` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`),
  CONSTRAINT `FK_sec_group_role_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;





DROP TABLE IF EXISTS `sec_user`;

CREATE TABLE `sec_user` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `username` varchar(90)  NOT NULL,
  `nome` varchar(90)  NOT NULL,
  `email` varchar(90)  NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ativo` bit(1) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `api_token_expires_at` datetime DEFAULT NULL,
  `session_id` varchar(200) DEFAULT NULL,

  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,

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





DROP TABLE IF EXISTS `sec_user_role`;

CREATE TABLE `sec_user_role` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  KEY `K_sec_user_role_role` (`role_id`),
  KEY `K_sec_user_role_user` (`user_id`),
  CONSTRAINT `FK_sec_user_role_role` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_user_role_user` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;






DROP TABLE IF EXISTS `cfg_config`;

CREATE TABLE `cfg_config` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `chave` varchar(300)  NOT NULL,
  `valor` varchar(10000)  NOT NULL,
  `obs` varchar(5000) DEFAULT NULL,
  `global` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,  
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_config_chave_estabelecimento` (`chave`,`estabelecimento_id`) USING BTREE,
  KEY `K_cfg_config_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_config_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_config_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_config_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_config_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_config_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;







DROP TABLE IF EXISTS `cfg_app`;

CREATE TABLE `cfg_app` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `nome` varchar(300)  NOT NULL,
  `obs` varchar(5000) DEFAULT NULL,
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





DROP TABLE IF EXISTS `cfg_app_config`;

CREATE TABLE `cfg_app_config` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `chave` varchar(255)  NOT NULL,
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






DROP TABLE IF EXISTS `cfg_program`;

CREATE TABLE `cfg_program` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `descricao` varchar(255)  NOT NULL,
  `url` varchar(2000) DEFAULT NULL,
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





DROP TABLE IF EXISTS `cfg_program_config`;

CREATE TABLE `cfg_program_config` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `chave` varchar(255)  NOT NULL,
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





DROP TABLE IF EXISTS `cfg_entmenu`;

CREATE TABLE `cfg_entmenu` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `label` varchar(255)  NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(50)  NOT NULL,
  `program_uuid` char(36) DEFAULT NULL,
  `pai_uuid` char(36) DEFAULT NULL,
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
  KEY `K_cfg_entmenu_pai` (`pai_uuid`),
  KEY `K_cfg_entmenu_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_entmenu_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_entmenu_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_entmenu_program` FOREIGN KEY (`program_uuid`) REFERENCES `cfg_program` (`uuid`),
  CONSTRAINT `FK_cfg_entmenu_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_entmenu_pai` FOREIGN KEY (`pai_uuid`) REFERENCES `cfg_entmenu` (`uuid`),
  CONSTRAINT `FK_cfg_entmenu_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;







DROP TABLE IF EXISTS `cfg_stored_viewinfo`;

CREATE TABLE `cfg_stored_viewinfo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `view_name` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `view_info` varchar(15000) NOT NULL,
  `user_id` bigint(20) NOT NULL,

  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_stored_viewinfo` (`user_id`,`view_name`),
  CONSTRAINT `FK_cfg_stored_viewinfo_user` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),

  KEY `K_cfg_stored_viewinfo_estabelecimento` (`estabelecimento_id`),
  CONSTRAINT `K_cfg_stored_viewinfo_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  KEY `K_cfg_stored_viewinfo_user_inserted` (`user_inserted_id`),
  CONSTRAINT `FK_cfg_stored_viewinfo_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  KEY `K_cfg_stored_viewinfo_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_stored_viewinfo_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;







DROP TABLE IF EXISTS `cfg_pushmessage`;

CREATE TABLE `cfg_pushmessage` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `mensagem` varchar(200)  NOT NULL,
  `url` varchar(2000)  DEFAULT NULL,
  `user_destinatario_id` bigint(20) DEFAULT NULL,
  `dt_envio` datetime DEFAULT NULL,
  `dt_notif` datetime DEFAULT NULL,
  `dt_abert` datetime DEFAULT NULL,

  `params` varchar(5000) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  
  PRIMARY KEY (`id`),
  KEY `K_cfg_pushmessage_user_destinatario` (`user_destinatario_id`),
  CONSTRAINT `FK_cfg_pushmessage_user_destinatario` FOREIGN KEY (`user_destinatario_id`) REFERENCES `sec_user` (`id`),

  KEY `K_cfg_pushmessage_estabelecimento` (`estabelecimento_id`),
  CONSTRAINT `K_cfg_pushmessage_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  KEY `K_cfg_pushmessage_user_inserted` (`user_inserted_id`),
  CONSTRAINT `FK_cfg_pushmessage_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  KEY `K_cfg_pushmessage_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_pushmessage_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;







