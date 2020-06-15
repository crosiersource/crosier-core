SET FOREIGN_KEY_CHECKS=0;


-- Categorização para os tipos de 'pessoa' (CLIENTE, FORNECEDOR, etc)
DROP TABLE IF EXISTS `bse_categ_pessoa`;
CREATE TABLE `bse_categ_pessoa` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `descricao` VARCHAR(100)  NOT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `K_bse_categ_pessoa_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_categ_pessoa_user_inserted` (`user_inserted_id`),
  KEY `K_bse_categ_pessoa_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_categ_pessoa_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_bse_categ_pessoa_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_categ_pessoa_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



-- Tabela mais genérica sobre relacionamentos pessoais
DROP TABLE IF EXISTS `bse_pessoa`;
CREATE TABLE `bse_pessoa` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,

  `nome` VARCHAR(255) NOT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `tipo` ENUM('Pessoa Física', 'Pessoa Jurídica'),
  `obs` varchar(3000) DEFAULT NULL,
  -- PJ
  `nome_fantasia` VARCHAR(255) DEFAULT NULL,
  `ie` varchar(20) DEFAULT NULL,
  -- PF
  `rg` varchar(20) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_pessoa_id` (`id`),
  KEY `K_bse_pessoa_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_pessoa_user_inserted` (`user_inserted_id`),
  KEY `K_bse_pessoa_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_pessoa_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_bse_pessoa_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_pessoa_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;






-- Categorização para os tipos de 'pessoa' (CLIENTE, FORNECEDOR, etc)
DROP TABLE IF EXISTS `bse_pessoa_categ_pessoa`;
CREATE TABLE `bse_pessoa_categ_pessoa` (
  `pessoa_id` bigint(20) NOT NULL,
  `categ_id` bigint(20) NOT NULL,

  PRIMARY KEY (`pessoa_id`, `categ_id`),
  CONSTRAINT `FK_bse_pessoa_categ_pessoa_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `bse_pessoa` (`id`),
  CONSTRAINT `FK_bse_pessoa_categ_pessoa_categ` FOREIGN KEY (`categ_id`) REFERENCES `bse_categ_pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;




-- Endereços de Relacionamento Comercial
DROP TABLE IF EXISTS `bse_pessoa_endereco`;
CREATE TABLE `bse_pessoa_endereco` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `pessoa_id` bigint(20) NOT NULL,

  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `bairro` varchar(120) DEFAULT NULL,
  `cidade` varchar(120) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `tipo_endereco` varchar(100) DEFAULT NULL,
  `obs` varchar(3000) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `K_bse_pessoa_endereco_pessoa` (`pessoa_id`),
  KEY `K_bse_pessoa_endereco_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_pessoa_endereco_user_inserted` (`user_inserted_id`),
  KEY `K_bse_pessoa_endereco_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_pessoa_endereco_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `bse_pessoa` (`id`),
  CONSTRAINT `FK_bse_pessoa_endereco_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_bse_pessoa_endereco_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_pessoa_endereco_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


-- Contatos de Relacionamentos Comerciais
DROP TABLE IF EXISTS `bse_pessoa_contato`;
CREATE TABLE `bse_pessoa_contato` (
  `id` bigint(20) AUTO_INCREMENT NOT NULL,
  `pessoa_id` bigint(20) NOT NULL,

  `tipo` varchar(50) DEFAULT NULL,
  `valor` varchar(100) DEFAULT NULL,
  `obs` varchar(3000) DEFAULT NULL,

  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `K_bse_pessoa_contato_pessoa` (`pessoa_id`),
  KEY `K_bse_pessoa_contato_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_pessoa_contato_user_inserted` (`user_inserted_id`),
  KEY `K_bse_pessoa_contato_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_pessoa_contato_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `bse_pessoa` (`id`),
  CONSTRAINT `FK_bse_pessoa_contato_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_bse_pessoa_contato_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_pessoa_contato_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;





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





