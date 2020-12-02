SET FOREIGN_KEY_CHECKS=0;



DROP TABLE IF EXISTS `bse_municipio`;
CREATE TABLE `bse_municipio` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `municipio_codigo` int(11) NOT NULL,
  `municipio_nome` varchar(200) DEFAULT NULL,
  `uf_nome` varchar(200) DEFAULT NULL,
  `uf_sigla` varchar(2) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_municipio` (`uf_sigla`,`municipio_nome`),
  KEY `K_bse_municipio_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_municipio_user_inserted` (`user_inserted_id`),
  KEY `K_bse_municipio_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_municipio_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_municipio_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_municipio_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



DROP TABLE IF EXISTS `bse_uf`;
CREATE TABLE `bse_uf` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `sigla` char(2)  NOT NULL,
  `nome` varchar(50)  NOT NULL,
  `codigo_IBGE` int(11) NOT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_uf_sigla` (`sigla`),
  UNIQUE KEY `UK_bse_uf_nome` (`nome`),
  UNIQUE KEY `UK_bse_uf_codigo_IBGE` (`codigo_IBGE`),
  KEY `K_bse_uf_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_uf_user_inserted` (`user_inserted_id`),
  KEY `K_bse_uf_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_uf_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_uf_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_uf_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



DROP TABLE IF EXISTS `bse_diautil`;
CREATE TABLE `bse_diautil` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `dia` datetime NOT NULL,
  `descricao` varchar(40) DEFAULT NULL,
  `comercial` tinyint(1) NOT NULL,
  `financeiro` tinyint(1) NOT NULL,
  `municipio_id` bigint(20) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_dia_util` (`dia`, `municipio_id`),
  KEY `K_bse_dia_util_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_dia_util_user_inserted` (`user_inserted_id`),
  KEY `K_bse_dia_util_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_dia_util_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_dia_util_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_dia_util_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




DROP TABLE IF EXISTS `bse_prop`;
CREATE TABLE `bse_prop` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid` char(36) NOT NULL,
  `nome` varchar(100)  NOT NULL,
  `obs` varchar(5000) DEFAULT NULL,
  `valor` JSON  NOT NULL,
  
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,  
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_prop_uuid` (`uuid`) USING BTREE,
  UNIQUE KEY `UK_bse_prop_nome` (`nome`) USING BTREE,
  KEY `K_bse_prop_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_prop_user_inserted` (`user_inserted_id`),
  KEY `K_bse_prop_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_prop_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_bse_prop_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_prop_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;





