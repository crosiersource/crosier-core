SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `cfg_estabelecimento`;

DROP TABLE IF EXISTS `cfg_config`;
DROP TABLE IF EXISTS `cfg_app`;
DROP TABLE IF EXISTS `cfg_app_config`;
DROP TABLE IF EXISTS `cfg_program`;
DROP TABLE IF EXISTS `cfg_program_config`;
DROP TABLE IF EXISTS `cfg_entmenu`;

DROP TABLE IF EXISTS `sec_group`;
DROP TABLE IF EXISTS `sec_role`;
DROP TABLE IF EXISTS `sec_user`;
DROP TABLE IF EXISTS `sec_group_role`;
DROP TABLE IF EXISTS `sec_user_role`;





CREATE TABLE `cfg_estabelecimento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;





CREATE TABLE `sec_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `sec_role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `sec_group_role` (
  `group_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  KEY `K_sec_group_role_role` (`role_id`),
  KEY `K_sec_group_role_group` (`group_id`),
  CONSTRAINT `FK_sec_group_role_role` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`),
  CONSTRAINT `FK_sec_group_role_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;






CREATE TABLE `sec_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


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
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



CREATE TABLE `cfg_app` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `nome` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `icon` varchar(300) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `entrance_url` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg_app_chave_idx` (`nome`),
  KEY `K_cfg_app_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_app_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_app_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_app_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_app_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `cfg_app_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




CREATE TABLE `cfg_program` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `url` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `app_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_program_descricao_app` (`descricao`, `app_id`),
  KEY `K_cfg_program_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_program_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_program_user_updated` (`user_updated_id`),
  KEY `K_cfg_program_app` (`app_id`),
  CONSTRAINT `FK_cfg_program_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_program_app` FOREIGN KEY (`app_id`) REFERENCES `cfg_app` (`id`),
  CONSTRAINT `FK_cfg_program_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_program_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `cfg_program_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `cfg_entmenu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `app_id` bigint(20) DEFAULT NULL,
  `pai_id` bigint(20) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `css_style` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg_entmenu_idx` (`app_id`,`pai_id`),
  KEY `K_cfg_entmenu_app` (`app_id`),
  KEY `K_cfg_entmenu_pai` (`pai_id`),
  KEY `K_cfg_entmenu_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_entmenu_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_entmenu_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_entmenu_app` FOREIGN KEY (`app_id`) REFERENCES `cfg_app` (`id`),
  CONSTRAINT `FK_cfg_entmenu_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_entmenu_pai` FOREIGN KEY (`pai_id`) REFERENCES `cfg_entmenu` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


















