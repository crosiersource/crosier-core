-- mensagens utilizadas nas SPs
DROP TABLE IF EXISTS `_msgs`;
CREATE TABLE `_msgs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `msg` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `modulo` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

DROP TABLE IF EXISTS `bon_dia_util`;
CREATE TABLE `bon_dia_util` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `comercial` bit(1) NOT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci DEFAULT NULL,
  `dia` datetime NOT NULL,
  `financeiro` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK4ro6fcx2elte87no71mg1dskd` (`dia`),
  KEY `FKpogr3omikk79s9delgw2je0us` (`estabelecimento_id`),
  KEY `FKf9aufar05gqvtmucvbujnqu9q` (`user_inserted_id`),
  KEY `FKic5nh15vjf9q89mgh172y5ndn` (`user_updated_id`),
  CONSTRAINT `FKf9aufar05gqvtmucvbujnqu9q` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKic5nh15vjf9q89mgh172y5ndn` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpogr3omikk79s9delgw2je0us` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


CREATE TABLE `bon_endereco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `bairro` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cep` varchar(9) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cidade` varchar(80) COLLATE utf8_swedish_ci DEFAULT NULL,
  `complemento` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_swedish_ci DEFAULT NULL,
  `logradouro` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `tipoEndereco` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK7tqs1unuqgx2wlypp64x1x4rk` (`estabelecimento_id`),
  KEY `FKcxqbx7hhr5heh49qxo2tqcg0i` (`user_inserted_id`),
  KEY `FK4bmbvl0hktdnk61e4gd4fpjsa` (`user_updated_id`),
  CONSTRAINT `FK4bmbvl0hktdnk61e4gd4fpjsa` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK7tqs1unuqgx2wlypp64x1x4rk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKcxqbx7hhr5heh49qxo2tqcg0i` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17527 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `bon_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bon_pessoa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `documento` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `nome` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `nome_fantasia` varchar(300) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tipo_pessoa` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKdnsary3l32nw79kawen0qax68` (`estabelecimento_id`),
  KEY `FK4bhgfpryc4txulbs8uw7cnhx` (`user_inserted_id`),
  KEY `FK5gv8apbp2b9go9w9u4rjqmi38` (`user_updated_id`),
  CONSTRAINT `FK4bhgfpryc4txulbs8uw7cnhx` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK5gv8apbp2b9go9w9u4rjqmi38` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKdnsary3l32nw79kawen0qax68` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140221 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `bs_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_municipio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `municipio_codigo` int(11) NOT NULL,
  `municipio_nome` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `uf_nome` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `uf_sigla` varchar(2) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKcv9v0ud5n3s1p5nj60puvei5v` (`uf_sigla`,`municipio_nome`),
  KEY `FKe5mwii5pjiftoxq3kfl7tsl60` (`estabelecimento_id`),
  KEY `FK1fnw957g1r9havkack1pd1mfh` (`user_inserted_id`),
  KEY `FK4obac2jad536torcqo2l6uo3p` (`user_updated_id`),
  CONSTRAINT `FK1fnw957g1r9havkack1pd1mfh` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4obac2jad536torcqo2l6uo3p` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKe5mwii5pjiftoxq3kfl7tsl60` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5571 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `bs_uf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bs_uf` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sigla` char(2) COLLATE utf8_swedish_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `codigoIBGE` int(11) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_app` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `route` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `modulo_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg_app_chave_idx` (`descricao`),
  KEY `K_cfg_app_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_app_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_app_user_updated` (`user_updated_id`),
  KEY `K_cfg_app_modulo` (`modulo_id`),
  CONSTRAINT `FK_cfg_app_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_app_modulo` FOREIGN KEY (`modulo_id`) REFERENCES `cfg_modulo` (`id`),
  CONSTRAINT `FK_cfg_app_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_app_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_app_role` (
  `app_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  PRIMARY KEY (`app_id`,`role_id`),
  KEY `K_cfg_app` (`app_id`),
  KEY `K_sec_role` (`role_id`),
  CONSTRAINT `FK_cfg_app` FOREIGN KEY (`app_id`) REFERENCES `cfg_app` (`id`),
  CONSTRAINT `FK_sec_role` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `chave` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `valor` varchar(10000) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `global` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg_config_chave_idx` (`chave`,`estabelecimento_id`) USING BTREE,
  KEY `FKhoto0db4nxpndt4626mqu7hn6` (`estabelecimento_id`),
  KEY `FKodlbvtj3bf9u5a2eotyqu389l` (`user_inserted_id`),
  KEY `FKmgg823mvf28y9j0bkcungu7y8` (`user_updated_id`),
  CONSTRAINT `FKhoto0db4nxpndt4626mqu7hn6` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKmgg823mvf28y9j0bkcungu7y8` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKodlbvtj3bf9u5a2eotyqu389l` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_datatable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_datatable` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `datatable_name` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `filters_data` longblob NOT NULL,
  `orderby_type` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `orderby_field` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `qtde_registros` int(11) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK3d24fop9e6dl0uw5nm147dmpm` (`user_id`,`datatable_name`),
  KEY `FK5tftgy40ousnwtix01dqkx530` (`estabelecimento_id`),
  KEY `FK4cx2xnf88dh0q4o5c28k7cjnj` (`user_inserted_id`),
  KEY `FKfab6k2gdddgf0bjr6nnu5i4th` (`user_updated_id`),
  CONSTRAINT `FK4cx2xnf88dh0q4o5c28k7cjnj` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK5tftgy40ousnwtix01dqkx530` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKfab6k2gdddgf0bjr6nnu5i4th` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKfdx69fobkjd2qmixy8cx15f6v` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=435 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_entmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_estabelecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_estabelecimento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` bigint(20) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `version` int(11) DEFAULT NULL,
  `concreto` bit(1) NOT NULL,
  `pai_id` bigint(20) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `inserted` datetime DEFAULT NULL,
  `user_inserted_id` bigint(20) DEFAULT NULL,
  `user_updated_id` bigint(20) DEFAULT NULL,
  `estabelecimento_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK1lwyp27f2exopwvrxb27lxi8s` (`codigo`),
  KEY `FKc11vu43495ohqqulfv61j2m7h` (`pai_id`),
  CONSTRAINT `FKc11vu43495ohqqulfv61j2m7h` FOREIGN KEY (`pai_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_mainmenuitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_mainmenuitem` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `programa_id` bigint(20) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `css_style` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `K_cfg_mainmenu_app` (`programa_id`),
  KEY `K_cfg_mainmenu_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_mainmenu_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_mainmenu_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_mainmenu_app` FOREIGN KEY (`programa_id`) REFERENCES `cfg_app` (`id`),
  CONSTRAINT `FK_cfg_mainmenu_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_mainmenu_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_mainmenu_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_modulo` (
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
  UNIQUE KEY `cfg_modulo_chave_idx` (`nome`),
  KEY `K_cfg_modulo_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_modulo_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_modulo_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_modulo_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_modulo_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_modulo_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cfg_stored_viewinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cfg_stored_viewinfo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `viewInfo` longblob NOT NULL,
  `view_name` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKdlkoicudop8mxcuxlt6rdl94k` (`user_id`,`view_name`),
  KEY `FKnx9p0vc3mo3xnbxuauogf6kh7` (`estabelecimento_id`),
  KEY `FK99c0m5mo7w8s5chrrrrs3i4po` (`user_inserted_id`),
  KEY `FK6itfv4xub5mka235m23v8bgl4` (`user_updated_id`),
  CONSTRAINT `FK6itfv4xub5mka235m23v8bgl4` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK946a1pa6cjol49rlikg4hp4yb` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK99c0m5mo7w8s5chrrrrs3i4po` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKnx9p0vc3mo3xnbxuauogf6kh7` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_canal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_canal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK1g9qm45e5c1sgo66pidar0p01` (`descricao`),
  KEY `FK9kc9dq98oy79uvrbhc18pv8n9` (`estabelecimento_id`),
  KEY `FKf2uhsspfomjdoi0v99i1lsidd` (`user_inserted_id`),
  KEY `FKoyvx229g4tjvskhlg9y2s8fxy` (`user_updated_id`),
  CONSTRAINT `FK9kc9dq98oy79uvrbhc18pv8n9` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKf2uhsspfomjdoi0v99i1lsidd` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKoyvx229g4tjvskhlg9y2s8fxy` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_cliente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `contato` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `dt_emissao_rg` datetime DEFAULT NULL,
  `dt_nascimento` datetime DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estado_civil` varchar(13) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estado_rg` varchar(2) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone1` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone2` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone3` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone4` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `inscricao_estadual` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `inscricao_municipal` varchar(40) COLLATE utf8_swedish_ci DEFAULT NULL,
  `naturalidade` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `orgao_emissor_rg` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `rg` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `sexo` varchar(9) COLLATE utf8_swedish_ci DEFAULT NULL,
  `website` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `pessoa_id` bigint(20) NOT NULL,
  `aceita_whatsapp` bit(1) DEFAULT NULL,
  `tem_whatsapp` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_cliente_codigo` (`codigo`),
  KEY `FKno137iekio8gylfa1kcvs5u4h` (`estabelecimento_id`),
  KEY `FKjgkkaqsv3tfg3a6etp1hh26wq` (`user_inserted_id`),
  KEY `FKpi7233a84e4848ur8xa26m6il` (`user_updated_id`),
  KEY `FKeuept4ad1t5pgxhmoc60fylmv` (`pessoa_id`),
  CONSTRAINT `FKeuept4ad1t5pgxhmoc60fylmv` FOREIGN KEY (`pessoa_id`) REFERENCES `bon_pessoa` (`id`),
  CONSTRAINT `FKjgkkaqsv3tfg3a6etp1hh26wq` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKno137iekio8gylfa1kcvs5u4h` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKpi7233a84e4848ur8xa26m6il` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27083 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_cliente_canais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_cliente_canais` (
  `cliente_id` bigint(20) NOT NULL,
  `canal_id` bigint(20) NOT NULL,
  KEY `FKhxodh2e1wa4bo7dsu6jxbxuo3` (`canal_id`),
  KEY `FK1bv68x6xeyny6ujncqc4np5ol` (`cliente_id`),
  CONSTRAINT `FK1bv68x6xeyny6ujncqc4np5ol` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FKhxodh2e1wa4bo7dsu6jxbxuo3` FOREIGN KEY (`canal_id`) REFERENCES `crm_canal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_cliente_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_cliente_enderecos` (
  `crm_cliente_id` bigint(20) NOT NULL,
  `bon_endereco_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  KEY `FK936vbx96c3shh6fi6l49rxr1l` (`crm_cliente_id`),
  KEY `UK_s7vk7icb3e4ojnx1ra29uwj3e` (`bon_endereco_id`) USING BTREE,
  CONSTRAINT `FK936vbx96c3shh6fi6l49rxr1l` FOREIGN KEY (`crm_cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FKfc1p90wtl8cg2a2sl7398fdbj` FOREIGN KEY (`bon_endereco_id`) REFERENCES `bon_endereco` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_promo_campanha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_promo_campanha` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(300) COLLATE utf8_swedish_ci NOT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `dt_inicio` datetime DEFAULT NULL,
  `msg_cupom` varchar(3000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKbshrigkatwbo1w87ffloj09x6` (`estabelecimento_id`),
  KEY `FKrie4ve0hx15fl7gipj9rs6n1o` (`user_inserted_id`),
  KEY `FKa08d0d7c5mbfnfxtwc0w6c6hw` (`user_updated_id`),
  CONSTRAINT `FKa08d0d7c5mbfnfxtwc0w6c6hw` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKbshrigkatwbo1w87ffloj09x6` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKrie4ve0hx15fl7gipj9rs6n1o` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_promo_cupom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_promo_cupom` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `dt_cancelamento` datetime DEFAULT NULL,
  `dt_utilizacao` datetime DEFAULT NULL,
  `dt_vinculacao` datetime DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  `lote_cupom_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK61dk5mf5ym58rtx7gl0jkwt0d` (`lote_cupom_id`,`ordem`),
  UNIQUE KEY `UK_8san0hc8922nu6v4g7m6675i6` (`codigo`),
  UNIQUE KEY `UK8san0hc8922nu6v4g7m6675i6` (`codigo`),
  KEY `FK52sgtt31gfcatkrph328vpb0o` (`estabelecimento_id`),
  KEY `FKqtf8qcqk9jxqeuhtghson2wvo` (`user_inserted_id`),
  KEY `FKatswjxu07es3hy6nnyaok17b4` (`user_updated_id`),
  KEY `FKqe00mdash28ku0igae1mvwcqc` (`cliente_id`),
  CONSTRAINT `FK52gw9qvgnpt7kmxkovuh7rjo1` FOREIGN KEY (`lote_cupom_id`) REFERENCES `crm_promo_lote_cupom` (`id`),
  CONSTRAINT `FK52sgtt31gfcatkrph328vpb0o` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKatswjxu07es3hy6nnyaok17b4` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKqe00mdash28ku0igae1mvwcqc` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FKqtf8qcqk9jxqeuhtghson2wvo` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2153 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crm_promo_lote_cupom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_promo_lote_cupom` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `dt_emissao` datetime DEFAULT NULL,
  `emitido_por` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `num_lote` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `campanha_promo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_qafa5bxah8dmqv6w8mllljagb` (`num_lote`),
  UNIQUE KEY `UKqafa5bxah8dmqv6w8mllljagb` (`num_lote`),
  KEY `FK888udynqujx47tmo0iphkbvtr` (`estabelecimento_id`),
  KEY `FK7lygv4hi6xjhcfqp3t4xa2qf1` (`user_inserted_id`),
  KEY `FKaw9tv4rld4sao2s7syq7p9uwl` (`user_updated_id`),
  KEY `FKbhxxrxbje9tkryfoityq3oeg8` (`campanha_promo_id`),
  CONSTRAINT `FK7lygv4hi6xjhcfqp3t4xa2qf1` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK888udynqujx47tmo0iphkbvtr` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKaw9tv4rld4sao2s7syq7p9uwl` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKbhxxrxbje9tkryfoityq3oeg8` FOREIGN KEY (`campanha_promo_id`) REFERENCES `crm_promo_campanha` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crtn_artigo_cortina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crtn_artigo_cortina` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `tipo_artigo_cortina` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  `tecido_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK7qde6qnjcp2cd09aa5lm0otyf` (`produto_id`),
  KEY `FKdplspp9oi8rrrbx0m094mj9dj` (`estabelecimento_id`),
  KEY `FKisq016xj69nou52h2ybteh9rm` (`user_inserted_id`),
  KEY `FKmnvjy2e8vpkpvq4avltm70ps0` (`user_updated_id`),
  KEY `FK5pexg6spx07n725m0guc65kjd` (`tecido_id`),
  CONSTRAINT `FK5pexg6spx07n725m0guc65kjd` FOREIGN KEY (`tecido_id`) REFERENCES `crtn_tecido` (`id`),
  CONSTRAINT `FKdplspp9oi8rrrbx0m094mj9dj` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKisq016xj69nou52h2ybteh9rm` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKmnvjy2e8vpkpvq4avltm70ps0` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKt21ul97qa59ukihmldf0226fo` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crtn_cortina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crtn_cortina` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `altura` decimal(19,2) NOT NULL,
  `altura_janela` decimal(19,2) DEFAULT NULL,
  `com_instalacao` bit(1) NOT NULL,
  `completa` bit(1) NOT NULL,
  `largura` decimal(19,2) NOT NULL,
  `largura_janela` decimal(19,2) DEFAULT NULL,
  `qtde_camadas` int(11) NOT NULL,
  `varao_trilho` varchar(1) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `orcamento_item_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKao4d3q73djnn7x4ucae64ae5u` (`orcamento_item_id`),
  KEY `FKfvukii2vi3rm0ry6fu0349dqb` (`estabelecimento_id`),
  KEY `FKnfre87vf1x215472gm5dg1mro` (`user_inserted_id`),
  KEY `FK90ry6xua4i90bbrvgabqke3fw` (`user_updated_id`),
  CONSTRAINT `FK90ry6xua4i90bbrvgabqke3fw` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKf3wfalreg3hxm1v7oph3x100e` FOREIGN KEY (`orcamento_item_id`) REFERENCES `orc_orcamento_item` (`id`),
  CONSTRAINT `FKfvukii2vi3rm0ry6fu0349dqb` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKnfre87vf1x215472gm5dg1mro` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=497 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crtn_cortina_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crtn_cortina_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `altura_barra` decimal(19,2) DEFAULT NULL,
  `camada` int(11) NOT NULL,
  `tecido_fator` decimal(15,3) DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `orientacao_tecido` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `preco_prazo` decimal(19,2) NOT NULL,
  `preco_promo` decimal(19,2) DEFAULT NULL,
  `preco_vista` decimal(19,2) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `tecido_tipo_fixacao` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tipoPrega` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `artigoCortina_id` bigint(20) NOT NULL,
  `cortina_id` bigint(20) NOT NULL,
  `drapeado_lances` int(11) NOT NULL,
  `drapeado` bit(1) NOT NULL,
  `drapeado_altura1` decimal(19,2) DEFAULT NULL,
  `drapeado_altura2` decimal(19,2) DEFAULT NULL,
  `drapeado_largura` decimal(19,2) DEFAULT NULL,
  `bando` bit(1) NOT NULL,
  `qtde_nao_alterar` bit(1) NOT NULL,
  `tecido_fator_real` decimal(19,2) DEFAULT NULL,
  `tecido_qtde_larguras` int(11) DEFAULT NULL,
  `tecido_varao_trilho` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKa966vhbthrksm45y9dess5xbv` (`estabelecimento_id`),
  KEY `FKtr52vyouxrjbnqi9ssw87ge1i` (`user_inserted_id`),
  KEY `FK2nxrabh63b17epeml6pgw1byl` (`user_updated_id`),
  KEY `FKm4qyjyc6ebbhth3ok36smd54b` (`artigoCortina_id`),
  KEY `cortina_id` (`cortina_id`),
  CONSTRAINT `FK2nxrabh63b17epeml6pgw1byl` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKa966vhbthrksm45y9dess5xbv` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKd4l92qgp9ql1d9rf5duve92e0` FOREIGN KEY (`cortina_id`) REFERENCES `crtn_cortina` (`id`),
  CONSTRAINT `FKm4qyjyc6ebbhth3ok36smd54b` FOREIGN KEY (`artigoCortina_id`) REFERENCES `crtn_artigo_cortina` (`id`),
  CONSTRAINT `FKtr52vyouxrjbnqi9ssw87ge1i` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4055 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crtn_cortina_lado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crtn_cortina_lado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `largura_lado` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `cortina_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKpbk5nv33alx2hehw2h7dlm24d` (`estabelecimento_id`),
  KEY `FK1ev57j29p7q5wfhmsisal9wb1` (`user_inserted_id`),
  KEY `FK8m7e2blgmbwh0c3488mue4to0` (`user_updated_id`),
  KEY `FK53lwg50sh6j9606h2qglavwv4` (`cortina_id`),
  CONSTRAINT `FK1ev57j29p7q5wfhmsisal9wb1` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK53lwg50sh6j9606h2qglavwv4` FOREIGN KEY (`cortina_id`) REFERENCES `crtn_cortina` (`id`),
  CONSTRAINT `FK8m7e2blgmbwh0c3488mue4to0` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpbk5nv33alx2hehw2h7dlm24d` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1077 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `crtn_tecido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crtn_tecido` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `altura_barra_padrao` decimal(19,2) NOT NULL,
  `altura_max_horizontal` decimal(19,2) NOT NULL,
  `fator_padrao` int(11) DEFAULT NULL,
  `largura` decimal(19,2) NOT NULL,
  `orientacao_padrao` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK6p9ira4aqbl7jd0oljkehy0yb` (`estabelecimento_id`),
  KEY `FKmbvgahk2jh5di4c0ix8mr747k` (`user_inserted_id`),
  KEY `FKen0bvpcpeh1vpyd0d2xu8xel3` (`user_updated_id`),
  CONSTRAINT `FK6p9ira4aqbl7jd0oljkehy0yb` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKen0bvpcpeh1vpyd0d2xu8xel3` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKmbvgahk2jh5di4c0ix8mr747k` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_depreciacao_preco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_depreciacao_preco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `porcentagem` double NOT NULL,
  `prazo_fim` int(11) NOT NULL,
  `prazo_ini` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKdfq6yegwm77b1nbhvn4jvrkbl` (`prazo_ini`),
  UNIQUE KEY `UKqnxjul5tc3sk55mwug4dq869r` (`prazo_fim`),
  KEY `FKkx0rwgku4tc3nbxeauqvb4vf2` (`estabelecimento_id`),
  KEY `FK1qb44ouwcdy459986v6kh0ac8` (`user_inserted_id`),
  KEY `FKcubthekl52w9qh2lwrrkc6y7s` (`user_updated_id`),
  CONSTRAINT `FK1qb44ouwcdy459986v6kh0ac8` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKcubthekl52w9qh2lwrrkc6y7s` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKkx0rwgku4tc3nbxeauqvb4vf2` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_depto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_depto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKcuo06f8l4bgfuio6ww38s7g9a` (`nome`),
  UNIQUE KEY `UK3pgrflh5puh8faadjne8tqj87` (`codigo`),
  KEY `FKdyetrm40mtyk30j23mkksq7cl` (`estabelecimento_id`),
  KEY `FKkyu5vdh8p4x4wxo37vusjqtlt` (`user_inserted_id`),
  KEY `FKko1b4p02bmhd4xq547xw9appk` (`user_updated_id`),
  CONSTRAINT `FKdyetrm40mtyk30j23mkksq7cl` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKko1b4p02bmhd4xq547xw9appk` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKkyu5vdh8p4x4wxo37vusjqtlt` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_entrada_mercadoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_entrada_mercadoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `dt_lote` date NOT NULL,
  `lote` bigint(20) NOT NULL,
  `pedido_parcial` bit(1) NOT NULL,
  `prazo_medio` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `fornecedor_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  `pedido_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_5giheir7ule6ge0uk99e4uy2g` (`produto_id`),
  UNIQUE KEY `UKh4v3hdu0gpspwuykpekgyfwoq` (`lote`),
  KEY `FKoo8eehy7kjf4wj5h4nq8sqkv2` (`estabelecimento_id`),
  KEY `FKg5oruatbrh5vbb1qugx7w49rm` (`user_inserted_id`),
  KEY `FK8d200mxjrw80jdxqkj4sna1dj` (`user_updated_id`),
  KEY `FK7se2bmlfd8vyeispkrtbsab3r` (`fornecedor_id`),
  KEY `FKkc0g9s77l5rrbl5b6nop1jjwt` (`pedido_id`),
  CONSTRAINT `FK7se2bmlfd8vyeispkrtbsab3r` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FK8d200mxjrw80jdxqkj4sna1dj` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKg5oruatbrh5vbb1qugx7w49rm` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKhvxgdc5tdb1dx3ule71ud14mc` FOREIGN KEY (`produto_id`) REFERENCES `fis_nf` (`id`),
  CONSTRAINT `FKkc0g9s77l5rrbl5b6nop1jjwt` FOREIGN KEY (`pedido_id`) REFERENCES `est_pedido_compra` (`id`),
  CONSTRAINT `FKoo8eehy7kjf4wj5h4nq8sqkv2` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_entrada_mercadoria_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_entrada_mercadoria_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `entrada_mercadoria_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK1pll78s9419auu2cl8w3n2gwb` (`entrada_mercadoria_id`,`produto_id`),
  KEY `FKbm2ouxrpflqyq9sn0r6vbx1q1` (`estabelecimento_id`),
  KEY `FK9j075ynr7s0rm4ou0pitc7hwo` (`user_inserted_id`),
  KEY `FK61ii4ip3eeq4u1qfvh5pud6vo` (`user_updated_id`),
  KEY `FK6bo6r74qc4f96acb4e4box3ed` (`produto_id`),
  CONSTRAINT `FK61ii4ip3eeq4u1qfvh5pud6vo` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK6bo6r74qc4f96acb4e4box3ed` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`),
  CONSTRAINT `FK9j075ynr7s0rm4ou0pitc7hwo` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKbm2ouxrpflqyq9sn0r6vbx1q1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKns633gard2qwvhvhcuf587p17` FOREIGN KEY (`entrada_mercadoria_id`) REFERENCES `est_entrada_mercadoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_fornecedor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `codigo` int(11) NOT NULL,
  `contato` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone1` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone2` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone3` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone4` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `inscricao_estadual` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `inscricao_municipal` varchar(40) COLLATE utf8_swedish_ci DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `representante` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `representante_contato` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `pessoa_id` bigint(20) NOT NULL,
  `dt_emissao_rg` datetime DEFAULT NULL,
  `dt_nascimento` datetime DEFAULT NULL,
  `estado_civil` varchar(13) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estado_rg` varchar(2) COLLATE utf8_swedish_ci DEFAULT NULL,
  `naturalidade` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `orgao_emissor_rg` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `rg` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `sexo` varchar(9) COLLATE utf8_swedish_ci DEFAULT NULL,
  `website` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fornecedor_tipo_id` bigint(20) NOT NULL,
  `codigo_ekt` int(11) DEFAULT NULL,
  `codigo_ekt_desde` date DEFAULT NULL,
  `codigo_ekt_ate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_codigo` (`codigo`),
  KEY `FK5qqt3qxrjr30xm34gxwt0hc63` (`estabelecimento_id`),
  KEY `FKmbqk437mrt6an84c2uoe03dop` (`user_inserted_id`),
  KEY `FK1dvv2bqqvky4g3ogtw0ti31w1` (`user_updated_id`),
  KEY `FK5sktwf8sosbrc40vre8x11h69` (`pessoa_id`),
  KEY `FK4kjac102rhv90nln5l5kxpokf` (`fornecedor_tipo_id`),
  CONSTRAINT `FK1dvv2bqqvky4g3ogtw0ti31w1` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4kjac102rhv90nln5l5kxpokf` FOREIGN KEY (`fornecedor_tipo_id`) REFERENCES `est_fornecedor_tipo` (`id`),
  CONSTRAINT `FK5qqt3qxrjr30xm34gxwt0hc63` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK5sktwf8sosbrc40vre8x11h69` FOREIGN KEY (`pessoa_id`) REFERENCES `bon_pessoa` (`id`),
  CONSTRAINT `FKmbqk437mrt6an84c2uoe03dop` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1566 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_fornecedor_codektmesano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_fornecedor_codektmesano` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` bigint(20) NOT NULL,
  `mesano` char(6) COLLATE utf8_swedish_ci NOT NULL,
  `codigo_ekt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_fornecedor_codektmesano_idx1` (`mesano`,`codigo_ekt`),
  KEY `fornecedor_id` (`fornecedor_id`),
  CONSTRAINT `est_fornecedor_codektmesano_fk1` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26817 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_fornecedor_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_fornecedor_enderecos` (
  `est_fornecedor_id` bigint(20) NOT NULL,
  `bon_endereco_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  UNIQUE KEY `UK_digq7t6mw8qa6g0myi2nanrdy` (`bon_endereco_id`) USING BTREE,
  KEY `FKsu0vx24h65pbpkx8h66qw9pde` (`est_fornecedor_id`),
  CONSTRAINT `FK8ohp2lg8w1pmxjgt0v3xgfnjw` FOREIGN KEY (`bon_endereco_id`) REFERENCES `bon_endereco` (`id`),
  CONSTRAINT `FKsu0vx24h65pbpkx8h66qw9pde` FOREIGN KEY (`est_fornecedor_id`) REFERENCES `est_fornecedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_fornecedor_oc_manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_fornecedor_oc_manufacturer` (
  `est_fornecedor_id` bigint(20) NOT NULL,
  `oc_manufacturer_id` int(11) NOT NULL,
  PRIMARY KEY (`est_fornecedor_id`,`oc_manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_fornecedor_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_fornecedor_tipo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKkhgk70u4wrmsv7odtk5m7uxtk` (`descricao`),
  KEY `FKexoch241qpp9pmjut421h9b5b` (`estabelecimento_id`),
  KEY `FK2jsgc1lyxew0wb2l0tfw85jn3` (`user_inserted_id`),
  KEY `FKdgrr2v7pruo69985gj4fooayo` (`user_updated_id`),
  CONSTRAINT `FK2jsgc1lyxew0wb2l0tfw85jn3` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKdgrr2v7pruo69985gj4fooayo` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKexoch241qpp9pmjut421h9b5b` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_fornsubdepto_venda_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_fornsubdepto_venda_results` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `mesano` datetime NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `fornecedor_id` bigint(20) NOT NULL,
  `subdepto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKafla6ix5q064hf58lsdyd40kw` (`fornecedor_id`,`subdepto_id`,`mesano`),
  KEY `FKsxperk0v4wb2fmhi9yx6eqyaq` (`estabelecimento_id`),
  KEY `FKify7a9l55s96lc6bn6ixdgsgx` (`user_inserted_id`),
  KEY `FKgnevd1noh1h6xo5na30d2q4rw` (`user_updated_id`),
  KEY `FK3oxgb0tyo8gesytygm5csv8wn` (`subdepto_id`),
  CONSTRAINT `FK3oxgb0tyo8gesytygm5csv8wn` FOREIGN KEY (`subdepto_id`) REFERENCES `est_subdepto` (`id`),
  CONSTRAINT `FKaqyyb65nity3ddtl88vlp2hdf` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FKgnevd1noh1h6xo5na30d2q4rw` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKify7a9l55s96lc6bn6ixdgsgx` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKsxperk0v4wb2fmhi9yx6eqyaq` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_giro_estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_giro_estoque` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` bigint(20) NOT NULL,
  `subdepto_id` bigint(20) NOT NULL,
  `grade_tamanho_id` bigint(20) NOT NULL,
  `tempo_estoque` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `mesano` char(6) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fornecedor_id` (`fornecedor_id`),
  KEY `subdepto_id` (`subdepto_id`),
  KEY `grade_tamanho_id` (`grade_tamanho_id`),
  CONSTRAINT `est_giro_estoque_fornecedor_id` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `est_giro_estoque_grade_tamanho_id` FOREIGN KEY (`grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`),
  CONSTRAINT `est_giro_estoque_subdepto_id` FOREIGN KEY (`subdepto_id`) REFERENCES `est_subdepto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_grade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `unidade_produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK5qaq95ncfbnmeufmvhnhxahx5` (`codigo`),
  KEY `FKg1ubc3qyucy2vj9c81h14aum6` (`estabelecimento_id`),
  KEY `FKhmtqf0yoiu1sv0a4wwo030j1f` (`user_inserted_id`),
  KEY `FK1cj4j8qwv1l3p5gp7rbd496o9` (`user_updated_id`),
  KEY `FKdjfrceodu019klw0g330sgtwf` (`unidade_produto_id`),
  CONSTRAINT `FK1cj4j8qwv1l3p5gp7rbd496o9` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKdjfrceodu019klw0g330sgtwf` FOREIGN KEY (`unidade_produto_id`) REFERENCES `est_unidade_produto` (`id`),
  CONSTRAINT `FKg1ubc3qyucy2vj9c81h14aum6` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKhmtqf0yoiu1sv0a4wwo030j1f` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_grade_oc_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_grade_oc_option` (
  `est_grade_id` bigint(20) NOT NULL,
  `oc_option_id` int(11) NOT NULL,
  PRIMARY KEY (`est_grade_id`,`oc_option_id`),
  CONSTRAINT `fk_est_grade_oc_option_1` FOREIGN KEY (`est_grade_id`) REFERENCES `est_grade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_grade_tamanho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_grade_tamanho` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `tamanho` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `grade_id` bigint(20) NOT NULL,
  `posicao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK8e1cawvnw7wpepot6qer4evg0` (`tamanho`,`grade_id`),
  KEY `FK2l4lnkwnl66euk6hiiv57uc0b` (`estabelecimento_id`),
  KEY `FK3mgetbyk1t3mgy3lrpl7x3aa8` (`user_inserted_id`),
  KEY `FKj9oqofhtwd3mwlkjy33koxbu8` (`user_updated_id`),
  KEY `FKj4ho6cmfkmokhe1qmgj1y26py` (`grade_id`),
  CONSTRAINT `FK2l4lnkwnl66euk6hiiv57uc0b` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK3mgetbyk1t3mgy3lrpl7x3aa8` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKj4ho6cmfkmokhe1qmgj1y26py` FOREIGN KEY (`grade_id`) REFERENCES `est_grade` (`id`),
  CONSTRAINT `FKj9oqofhtwd3mwlkjy33koxbu8` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_grade_tamanho_oc_option_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_grade_tamanho_oc_option_value` (
  `est_grade_tamanho_id` bigint(20) NOT NULL,
  `oc_option_value_id` int(11) NOT NULL,
  PRIMARY KEY (`est_grade_tamanho_id`,`oc_option_value_id`),
  CONSTRAINT `fk_est_grade_tamanho_oc_option_value_1` FOREIGN KEY (`est_grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_historico_previsao_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_historico_previsao_compra` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `saldo_atual` decimal(19,2) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ano1_mes1` decimal(19,2) DEFAULT NULL,
  `ano1_mes10` decimal(19,2) DEFAULT NULL,
  `ano1_mes11` decimal(19,2) DEFAULT NULL,
  `ano1_mes12` decimal(19,2) DEFAULT NULL,
  `ano1_mes2` decimal(19,2) DEFAULT NULL,
  `ano1_mes3` decimal(19,2) DEFAULT NULL,
  `ano1_mes4` decimal(19,2) DEFAULT NULL,
  `ano1_mes5` decimal(19,2) DEFAULT NULL,
  `ano1_mes6` decimal(19,2) DEFAULT NULL,
  `ano1_mes7` decimal(19,2) DEFAULT NULL,
  `ano1_mes8` decimal(19,2) DEFAULT NULL,
  `ano1_mes9` decimal(19,2) DEFAULT NULL,
  `ano2_mes1` decimal(19,2) DEFAULT NULL,
  `ano2_mes10` decimal(19,2) DEFAULT NULL,
  `ano2_mes11` decimal(19,2) DEFAULT NULL,
  `ano2_mes12` decimal(19,2) DEFAULT NULL,
  `ano2_mes2` decimal(19,2) DEFAULT NULL,
  `ano2_mes3` decimal(19,2) DEFAULT NULL,
  `ano2_mes4` decimal(19,2) DEFAULT NULL,
  `ano2_mes5` decimal(19,2) DEFAULT NULL,
  `ano2_mes6` decimal(19,2) DEFAULT NULL,
  `ano2_mes7` decimal(19,2) DEFAULT NULL,
  `ano2_mes8` decimal(19,2) DEFAULT NULL,
  `ano2_mes9` decimal(19,2) DEFAULT NULL,
  `ano3_mes1` decimal(19,2) DEFAULT NULL,
  `ano3_mes10` decimal(19,2) DEFAULT NULL,
  `ano3_mes11` decimal(19,2) DEFAULT NULL,
  `ano3_mes12` decimal(19,2) DEFAULT NULL,
  `ano3_mes2` decimal(19,2) DEFAULT NULL,
  `ano3_mes3` decimal(19,2) DEFAULT NULL,
  `ano3_mes4` decimal(19,2) DEFAULT NULL,
  `ano3_mes5` decimal(19,2) DEFAULT NULL,
  `ano3_mes6` decimal(19,2) DEFAULT NULL,
  `ano3_mes7` decimal(19,2) DEFAULT NULL,
  `ano3_mes8` decimal(19,2) DEFAULT NULL,
  `ano3_mes9` decimal(19,2) DEFAULT NULL,
  `ano4_mes1` decimal(19,2) DEFAULT NULL,
  `ano4_mes10` decimal(19,2) DEFAULT NULL,
  `ano4_mes11` decimal(19,2) DEFAULT NULL,
  `ano4_mes12` decimal(19,2) DEFAULT NULL,
  `ano4_mes2` decimal(19,2) DEFAULT NULL,
  `ano4_mes3` decimal(19,2) DEFAULT NULL,
  `ano4_mes4` decimal(19,2) DEFAULT NULL,
  `ano4_mes5` decimal(19,2) DEFAULT NULL,
  `ano4_mes6` decimal(19,2) DEFAULT NULL,
  `ano4_mes7` decimal(19,2) DEFAULT NULL,
  `ano4_mes8` decimal(19,2) DEFAULT NULL,
  `ano4_mes9` decimal(19,2) DEFAULT NULL,
  `ano5_mes1` decimal(19,2) DEFAULT NULL,
  `ano5_mes10` decimal(19,2) DEFAULT NULL,
  `ano5_mes11` decimal(19,2) DEFAULT NULL,
  `ano5_mes12` decimal(19,2) DEFAULT NULL,
  `ano5_mes2` decimal(19,2) DEFAULT NULL,
  `ano5_mes3` decimal(19,2) DEFAULT NULL,
  `ano5_mes4` decimal(19,2) DEFAULT NULL,
  `ano5_mes5` decimal(19,2) DEFAULT NULL,
  `ano5_mes6` decimal(19,2) DEFAULT NULL,
  `ano5_mes7` decimal(19,2) DEFAULT NULL,
  `ano5_mes8` decimal(19,2) DEFAULT NULL,
  `ano5_mes9` decimal(19,2) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `fornecedor_id` bigint(20) NOT NULL,
  `subdepto_id` bigint(20) NOT NULL,
  `qtde_em_pedidos` decimal(19,2) DEFAULT NULL,
  `media_mes1` decimal(19,2) DEFAULT NULL,
  `media_mes10` decimal(19,2) DEFAULT NULL,
  `media_mes11` decimal(19,2) DEFAULT NULL,
  `media_mes12` decimal(19,2) DEFAULT NULL,
  `media_mes2` decimal(19,2) DEFAULT NULL,
  `media_mes3` decimal(19,2) DEFAULT NULL,
  `media_mes4` decimal(19,2) DEFAULT NULL,
  `media_mes5` decimal(19,2) DEFAULT NULL,
  `media_mes6` decimal(19,2) DEFAULT NULL,
  `media_mes7` decimal(19,2) DEFAULT NULL,
  `media_mes8` decimal(19,2) DEFAULT NULL,
  `media_mes9` decimal(19,2) DEFAULT NULL,
  `saldo_mes1` decimal(19,2) DEFAULT NULL,
  `saldo_mes10` decimal(19,2) DEFAULT NULL,
  `saldo_mes11` decimal(19,2) DEFAULT NULL,
  `saldo_mes12` decimal(19,2) DEFAULT NULL,
  `saldo_mes2` decimal(19,2) DEFAULT NULL,
  `saldo_mes3` decimal(19,2) DEFAULT NULL,
  `saldo_mes4` decimal(19,2) DEFAULT NULL,
  `saldo_mes5` decimal(19,2) DEFAULT NULL,
  `saldo_mes6` decimal(19,2) DEFAULT NULL,
  `saldo_mes7` decimal(19,2) DEFAULT NULL,
  `saldo_mes8` decimal(19,2) DEFAULT NULL,
  `saldo_mes9` decimal(19,2) DEFAULT NULL,
  `vendas_restantes_mes` decimal(19,2) DEFAULT NULL,
  `primeiro_mesano` datetime DEFAULT NULL,
  `primeiro_mes` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKjqtb57yyvpkmfbdbvvykcy49j` (`fornecedor_id`,`subdepto_id`),
  KEY `FKbcbu0uvdkkw9pq4nc6c37h0wl` (`estabelecimento_id`),
  KEY `FKb3agd9onkcb8lhx0xd40hfa5i` (`user_inserted_id`),
  KEY `FK1npn7nk0kflmulx0nchjef7l3` (`user_updated_id`),
  KEY `FKek7h3ifdgc9xvoynw3h3doxru` (`subdepto_id`),
  CONSTRAINT `FK1npn7nk0kflmulx0nchjef7l3` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKb3agd9onkcb8lhx0xd40hfa5i` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKbcbu0uvdkkw9pq4nc6c37h0wl` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKek7h3ifdgc9xvoynw3h3doxru` FOREIGN KEY (`subdepto_id`) REFERENCES `est_subdepto` (`id`),
  CONSTRAINT `FKp781q7ulp7eqm684f9q7b4fqw` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_historico_previsao_compra_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_historico_previsao_compra_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ano` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `mes1` decimal(19,2) DEFAULT NULL,
  `mes10` decimal(19,2) DEFAULT NULL,
  `mes11` decimal(19,2) DEFAULT NULL,
  `mes12` decimal(19,2) DEFAULT NULL,
  `mes2` decimal(19,2) DEFAULT NULL,
  `mes3` decimal(19,2) DEFAULT NULL,
  `mes4` decimal(19,2) DEFAULT NULL,
  `mes5` decimal(19,2) DEFAULT NULL,
  `mes6` decimal(19,2) DEFAULT NULL,
  `mes7` decimal(19,2) DEFAULT NULL,
  `mes8` decimal(19,2) DEFAULT NULL,
  `mes9` decimal(19,2) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `hpc_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK2p9h7m07xbqkfmf30wa1eecvp` (`hpc_id`,`ano`),
  KEY `FK3il8yj8q0hbcl2e8r9stlexol` (`estabelecimento_id`),
  KEY `FKqao3ccwxh0k6ydtdaw6x9jw5u` (`user_inserted_id`),
  KEY `FK8xe52k470am9jgmpu2uafxqb2` (`user_updated_id`),
  CONSTRAINT `FK3il8yj8q0hbcl2e8r9stlexol` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK6aym23s4e5sk1v3lgxl17jpqt` FOREIGN KEY (`hpc_id`) REFERENCES `est_historico_previsao_compra` (`id`),
  CONSTRAINT `FK8xe52k470am9jgmpu2uafxqb2` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKqao3ccwxh0k6ydtdaw6x9jw5u` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_marcacao_mercadoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_marcacao_mercadoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `dt_lote` date NOT NULL,
  `pedido_parcial` bit(1) NOT NULL,
  `prazo_medio` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `fornecedor_id` bigint(20) NOT NULL,
  `movimentacao_id` bigint(20) NOT NULL,
  `pedido_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKltf8hhx9kof5asmj8nyscutgs` (`movimentacao_id`),
  KEY `FK9g4cohqqd98x1y618ws3dbudc` (`estabelecimento_id`),
  KEY `FKi58s5e232178el7rffre0ss92` (`user_inserted_id`),
  KEY `FKiulful1232vjos6jor8b7tser` (`user_updated_id`),
  KEY `FK6i8xbo5l92o2muj7cuhgvx5u8` (`fornecedor_id`),
  KEY `FKqc2o60hoy7p8kifvtd3cwadst` (`pedido_id`),
  CONSTRAINT `FK6i8xbo5l92o2muj7cuhgvx5u8` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FK9g4cohqqd98x1y618ws3dbudc` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKi58s5e232178el7rffre0ss92` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKiulful1232vjos6jor8b7tser` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpib22rjkpfkl9fhhm9wvy3nfi` FOREIGN KEY (`movimentacao_id`) REFERENCES `est_movimentacao` (`id`),
  CONSTRAINT `FKqc2o60hoy7p8kifvtd3cwadst` FOREIGN KEY (`pedido_id`) REFERENCES `est_pedido_compra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_movimentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_movimentacao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `dt_lote` date NOT NULL,
  `lote` bigint(20) NOT NULL,
  `pedido_parcial` bit(1) NOT NULL,
  `prazo_medio` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `nota_fiscal_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK2aaau3ywd6lsux2oe4pns93sd` (`lote`),
  KEY `FKr34kaugsc10m7pps5x4qg0yx0` (`estabelecimento_id`),
  KEY `FK16apd2cxyt8q0i62c1rqu9gsr` (`user_inserted_id`),
  KEY `FK5lq0togm39q6le2ai9blp35xi` (`user_updated_id`),
  KEY `FK6fsgyu48auocgadw1q0tgy4hy` (`nota_fiscal_id`),
  CONSTRAINT `FK16apd2cxyt8q0i62c1rqu9gsr` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK5lq0togm39q6le2ai9blp35xi` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK6fsgyu48auocgadw1q0tgy4hy` FOREIGN KEY (`nota_fiscal_id`) REFERENCES `fis_nf` (`id`),
  CONSTRAINT `FKr34kaugsc10m7pps5x4qg0yx0` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_movimentacao_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_movimentacao_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `movimentacao_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKn69n8sca0khvek5oqfci3o9j2` (`movimentacao_id`,`produto_id`),
  KEY `FKkps4r9pj3crh5b0147bcvqv5l` (`estabelecimento_id`),
  KEY `FKt2pmomkhnd7evurhksho6mrm` (`user_inserted_id`),
  KEY `FKfgfbolip4eo80rvv0lbbowhht` (`user_updated_id`),
  KEY `FKno0q37ty66xrgt66ewp5iawet` (`produto_id`),
  CONSTRAINT `FK3wymfl30ur2agw6fivd70oank` FOREIGN KEY (`movimentacao_id`) REFERENCES `est_movimentacao` (`id`),
  CONSTRAINT `FKfgfbolip4eo80rvv0lbbowhht` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKkps4r9pj3crh5b0147bcvqv5l` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKno0q37ty66xrgt66ewp5iawet` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`),
  CONSTRAINT `FKt2pmomkhnd7evurhksho6mrm` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_pedido_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_pedido_compra` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` bigint(20) NOT NULL,
  `dt_emissao` date DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `fornecedor_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKgj1yn3shscfjs7k98wnenpugm` (`codigo`),
  KEY `FKs9g3287im74dcrs82vj4loaag` (`estabelecimento_id`),
  KEY `FK1qk9mqywm8e1isbsk4yao8evx` (`user_inserted_id`),
  KEY `FKb48f4kdahig1im2whoujp3ixx` (`user_updated_id`),
  KEY `FK1qp0kc01hjyedoft2s32yw2r6` (`fornecedor_id`),
  CONSTRAINT `FK1qk9mqywm8e1isbsk4yao8evx` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK1qp0kc01hjyedoft2s32yw2r6` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FKb48f4kdahig1im2whoujp3ixx` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKs9g3287im74dcrs82vj4loaag` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_pedido_compra_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_pedido_compra_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `pedido_compra_id` bigint(20) NOT NULL,
  `subdepto_id` bigint(20) NOT NULL,
  `produto` bigint(20) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK3bsw0fioky1he37451jxx1lqn` (`estabelecimento_id`),
  KEY `FK8p5m0l9ksagj2jk1pfn3qa5nt` (`user_inserted_id`),
  KEY `FKoqu07qma1kym9cxklhmx2ue9y` (`user_updated_id`),
  KEY `FKtdyop7jq6l4snbku4ot5n11j1` (`pedido_compra_id`),
  KEY `FKqnja8lpkn9updakwdhax5kbxm` (`subdepto_id`),
  KEY `FKpycukn3itsl3r4rj3jqt7ylud` (`produto`),
  CONSTRAINT `FK3bsw0fioky1he37451jxx1lqn` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK8p5m0l9ksagj2jk1pfn3qa5nt` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKoqu07qma1kym9cxklhmx2ue9y` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpycukn3itsl3r4rj3jqt7ylud` FOREIGN KEY (`produto`) REFERENCES `est_produto` (`id`),
  CONSTRAINT `FKqnja8lpkn9updakwdhax5kbxm` FOREIGN KEY (`subdepto_id`) REFERENCES `est_subdepto` (`id`),
  CONSTRAINT `FKtdyop7jq6l4snbku4ot5n11j1` FOREIGN KEY (`pedido_compra_id`) REFERENCES `est_pedido_compra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `cst` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `dt_ult_venda` date DEFAULT NULL,
  `fracionado` bit(1) NOT NULL,
  `grade_err` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `icms` int(11) NOT NULL,
  `ncm` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `reduzido` bigint(20) NOT NULL,
  `reduzido_ekt` int(11) DEFAULT NULL,
  `reduzido_ekt_ate` date DEFAULT NULL,
  `reduzido_ekt_desde` date DEFAULT NULL,
  `referencia` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `subdepto_err` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tipo_tributacao` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `unidade_produto_err` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `depto_imp_id` bigint(20) DEFAULT NULL,
  `fornecedor_id` bigint(20) NOT NULL,
  `grade_id` bigint(20) NOT NULL,
  `subdepto_id` bigint(20) NOT NULL,
  `unidade_produto_id` bigint(20) NOT NULL,
  `artigo_cortina_id` bigint(20) DEFAULT NULL,
  `atual` bit(1) DEFAULT NULL,
  `na_loja_virtual` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKiemfjd6yv57uxrf1u9304vibw` (`reduzido`),
  KEY `IDXdn2tkq37nfrrn2qmgm8308424` (`descricao`),
  KEY `IDXq5ehx1q40pmvnbi3ojwlrdfmf` (`reduzido_ekt`),
  KEY `FKr9y03osmyxqdgyj30ovpejqbq` (`estabelecimento_id`),
  KEY `FKsvpej904tfd01uuoy227tvp5h` (`user_inserted_id`),
  KEY `FK12c3ddrk250026dp8x5ruhhsf` (`user_updated_id`),
  KEY `FKb1oxkyi0xc5dgsudl478e1is3` (`depto_imp_id`),
  KEY `FK3l0if39n92ntxaacw41g37x9f` (`fornecedor_id`),
  KEY `FKecu0jlci9c2xvguh8s660gi8f` (`grade_id`),
  KEY `FKhtq4unt9uw8vnen8qkj0k791j` (`subdepto_id`),
  KEY `FKm6mf8liyhd2e29677k65s31t9` (`unidade_produto_id`),
  CONSTRAINT `FK12c3ddrk250026dp8x5ruhhsf` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK3l0if39n92ntxaacw41g37x9f` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FKb1oxkyi0xc5dgsudl478e1is3` FOREIGN KEY (`depto_imp_id`) REFERENCES `est_depto` (`id`),
  CONSTRAINT `FKecu0jlci9c2xvguh8s660gi8f` FOREIGN KEY (`grade_id`) REFERENCES `est_grade` (`id`),
  CONSTRAINT `FKhtq4unt9uw8vnen8qkj0k791j` FOREIGN KEY (`subdepto_id`) REFERENCES `est_subdepto` (`id`),
  CONSTRAINT `FKm6mf8liyhd2e29677k65s31t9` FOREIGN KEY (`unidade_produto_id`) REFERENCES `est_unidade_produto` (`id`),
  CONSTRAINT `FKr9y03osmyxqdgyj30ovpejqbq` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKsvpej904tfd01uuoy227tvp5h` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26838 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto_oc_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto_oc_product` (
  `est_produto_id` bigint(20) NOT NULL,
  `oc_product_id` int(11) NOT NULL,
  PRIMARY KEY (`est_produto_id`,`oc_product_id`),
  UNIQUE KEY `UK_est_produto` (`est_produto_id`),
  UNIQUE KEY `UK_oc_product` (`oc_product_id`),
  CONSTRAINT `fk_est_produto_oc_product_1` FOREIGN KEY (`est_produto_id`) REFERENCES `est_produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto_preco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto_preco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `coeficiente` decimal(19,2) NOT NULL,
  `custo_operacional` decimal(19,2) NOT NULL,
  `dt_custo` date NOT NULL,
  `dt_preco_venda` date NOT NULL,
  `margem` decimal(19,2) NOT NULL,
  `prazo` int(11) NOT NULL,
  `preco_custo` decimal(19,2) NOT NULL,
  `preco_prazo` decimal(19,2) NOT NULL,
  `preco_promo` decimal(19,2) DEFAULT NULL,
  `preco_vista` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  `custo_financeiro` decimal(19,2) NOT NULL,
  `mesano` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_precos` (`dt_custo`,`dt_preco_venda`,`preco_custo`,`preco_prazo`,`preco_promo`,`preco_vista`,`produto_id`),
  KEY `FKhk2028nw5hu39ki8ad3i88469` (`estabelecimento_id`),
  KEY `FKlwcjvrfnob18vaf7dw38vk318` (`user_inserted_id`),
  KEY `FKak9hajb1mhxiyn5xevifwnhyt` (`user_updated_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `FKak9hajb1mhxiyn5xevifwnhyt` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKbuftw8q7g360d5bb9bor4cc9r` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKhk2028nw5hu39ki8ad3i88469` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKlwcjvrfnob18vaf7dw38vk318` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47393 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto_reduzidoektmesano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto_reduzidoektmesano` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `produto_id` bigint(20) NOT NULL,
  `mesano` char(6) COLLATE utf8_swedish_ci NOT NULL,
  `reduzido_ekt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `est_produto_reduzidoektmesano_idx1` (`mesano`,`reduzido_ekt`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `est_produto_reduzidoektmesano_fk1` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5138868 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto_saldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto_saldo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `grade_tamanho_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  `selec` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKrka6dyw2x4x1cwrud4785dx15` (`produto_id`,`grade_tamanho_id`),
  KEY `FK5h9kqgl8dxk1vwdrt5c8e2qfk` (`estabelecimento_id`),
  KEY `FK53x2nx9l2l7tsjgg7rip33nwk` (`user_inserted_id`),
  KEY `FKjypf69dn7jol51b0076b8hptf` (`user_updated_id`),
  KEY `FK5tno2as87sjiyn2o44wu4khvc` (`grade_tamanho_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `FK53x2nx9l2l7tsjgg7rip33nwk` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK5h9kqgl8dxk1vwdrt5c8e2qfk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK5tno2as87sjiyn2o44wu4khvc` FOREIGN KEY (`grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`),
  CONSTRAINT `FKjypf69dn7jol51b0076b8hptf` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKk521kd6omskl5rjw1bx96avrf` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75340 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto_saldo_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto_saldo_historico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `mesano` date NOT NULL,
  `saldo_mes` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKht113605b46uvq051idpiaa33` (`produto_id`,`mesano`),
  KEY `FK3i2g0a9evxy762fua4w37dm7t` (`estabelecimento_id`),
  KEY `FK3ihapcd4gi8evm4ie7h8cgg3d` (`user_inserted_id`),
  KEY `FK47973ctjo82v30mk79lmdg28a` (`user_updated_id`),
  KEY `dx_mesano` (`mesano`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `FK3i2g0a9evxy762fua4w37dm7t` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK3ihapcd4gi8evm4ie7h8cgg3d` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK47973ctjo82v30mk79lmdg28a` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpdfc90l2frk9805fwenqx5ut` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8148412 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_produto_venda_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_produto_venda_results` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `mesano` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKgqyp6yjjhun4skuu8tnum9eb5` (`produto_id`,`mesano`),
  UNIQUE KEY `unq_mesano_produto_id` (`mesano`,`produto_id`),
  KEY `FKslvlyspkjhodfbyv2phh2el2w` (`estabelecimento_id`),
  KEY `FKmr1pho33ok08ccleid4tvi3ku` (`user_inserted_id`),
  KEY `FK5g0wnhr1ygpw92u8r9yf2354w` (`user_updated_id`),
  KEY `est_produto_venda_results_idx1` (`mesano`),
  CONSTRAINT `FK5g0wnhr1ygpw92u8r9yf2354w` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKbnc6u3gyjwul46imhahdg82mj` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`),
  CONSTRAINT `FKmr1pho33ok08ccleid4tvi3ku` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKslvlyspkjhodfbyv2phh2el2w` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_subdepto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_subdepto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `margem` double NOT NULL,
  `nome` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `depto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKacw108swu7mdjqtoo3b37snyp` (`codigo`),
  KEY `FKf57cbwsqcx31k2ksxbfghfd0m` (`estabelecimento_id`),
  KEY `FK1vigvpx1vlxcil15clcsq1cd7` (`user_inserted_id`),
  KEY `FKdstp4jq4lt4v20ycxj5ue2uol` (`user_updated_id`),
  KEY `FK4ww526pym0rhq64ggrbbb3q12` (`depto_id`),
  CONSTRAINT `FK1vigvpx1vlxcil15clcsq1cd7` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4ww526pym0rhq64ggrbbb3q12` FOREIGN KEY (`depto_id`) REFERENCES `est_depto` (`id`),
  CONSTRAINT `FKdstp4jq4lt4v20ycxj5ue2uol` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKf57cbwsqcx31k2ksxbfghfd0m` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_subdepto_oc_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_subdepto_oc_category` (
  `est_subdepto_id` bigint(20) NOT NULL,
  `oc_category_id` int(11) NOT NULL,
  PRIMARY KEY (`est_subdepto_id`,`oc_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `est_unidade_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_unidade_produto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `fator` int(11) NOT NULL,
  `label` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `casas_decimais` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK29tobej4sjmll8cceivtu0qwc` (`label`),
  KEY `FK69sffhi5ipd8osb4dvmx4syuq` (`estabelecimento_id`),
  KEY `FKd30ay0gvpbdldeh9ayo0isxcl` (`user_inserted_id`),
  KEY `FKylrehhovu5481nal9yfmmsmd` (`user_updated_id`),
  CONSTRAINT `FK69sffhi5ipd8osb4dvmx4syuq` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKd30ay0gvpbdldeh9ayo0isxcl` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKylrehhovu5481nal9yfmmsmd` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_banco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo_banco` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `utilizado` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK1pspld30ur27w3c38nexhishx` (`codigo_banco`),
  KEY `FKkkrwh5fhuv4272qcxqumnncwd` (`estabelecimento_id`),
  KEY `FKbbsirfmv9waarff8xlq5lm807` (`user_inserted_id`),
  KEY `FKkldfkiflvgncx1vv322k5nh4v` (`user_updated_id`),
  CONSTRAINT `FKbbsirfmv9waarff8xlq5lm807` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKkkrwh5fhuv4272qcxqumnncwd` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKkldfkiflvgncx1vv322k5nh4v` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_bandeira_cartao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_bandeira_cartao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `modo_id` bigint(20) NOT NULL,
  `labels` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKt9mmhw3jom0q6sjayo9wopc9v` (`descricao`),
  KEY `FKe3fhkwkiwrjwt98nx42qtm4c4` (`estabelecimento_id`),
  KEY `FKi7nq89iwuqe4xjvmpb660mahq` (`user_inserted_id`),
  KEY `FK611i1xpy50mhvd41eymostvn2` (`user_updated_id`),
  KEY `FK1ouulov4x20x56ou7d1demtob` (`modo_id`),
  CONSTRAINT `FK1ouulov4x20x56ou7d1demtob` FOREIGN KEY (`modo_id`) REFERENCES `fin_modo` (`id`),
  CONSTRAINT `FK611i1xpy50mhvd41eymostvn2` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKe3fhkwkiwrjwt98nx42qtm4c4` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKi7nq89iwuqe4xjvmpb660mahq` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_cadeia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_cadeia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `fechada` bit(1) NOT NULL,
  `vinculante` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `unqc` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKoabr37abblan6h6c5t7ig75bv` (`estabelecimento_id`),
  KEY `FK599vd8qgeycbkmr31lxiiihjm` (`user_inserted_id`),
  KEY `FKhlppymppnmtc12uq2y0eji0ku` (`user_updated_id`),
  CONSTRAINT `FK599vd8qgeycbkmr31lxiiihjm` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKhlppymppnmtc12uq2y0eji0ku` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKoabr37abblan6h6c5t7ig75bv` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35681 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_carteira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_carteira` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `abertas` bit(1) NOT NULL,
  `agencia` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `caixa` bit(1) NOT NULL,
  `cheque` bit(1) NOT NULL,
  `codigo` int(11) NOT NULL,
  `concreta` bit(1) NOT NULL,
  `conta` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `dt_consolidado` date NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `banco_id` bigint(20) DEFAULT NULL,
  `limite` decimal(15,2) DEFAULT NULL,
  `operadora_cartao_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKf0spk87ehjgdkbaura56ex23n` (`descricao`),
  UNIQUE KEY `operadora_cartao_id_UNIQUE` (`operadora_cartao_id`),
  KEY `FK6u6vxc6mm0e8gd6jhb04arumd` (`estabelecimento_id`),
  KEY `FK14ds4ryp1pfx74htd7e76dtbi` (`user_inserted_id`),
  KEY `FKj0wfd28864yvci8o3r0uardb5` (`user_updated_id`),
  KEY `FKgt13lqnfeimebmgva4hx7ij1n` (`banco_id`),
  CONSTRAINT `FK14ds4ryp1pfx74htd7e76dtbi` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK6u6vxc6mm0e8gd6jhb04arumd` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKgt13lqnfeimebmgva4hx7ij1n` FOREIGN KEY (`banco_id`) REFERENCES `fin_banco` (`id`),
  CONSTRAINT `FKj0wfd28864yvci8o3r0uardb5` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `fk_fin_carteira_operadora_cartao` FOREIGN KEY (`operadora_cartao_id`) REFERENCES `fin_operadora_cartao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_categoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `centro_custo_dif` bit(1) NOT NULL,
  `codigo` bigint(20) NOT NULL,
  `codigo_super` bigint(20) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `descricao_padrao_moviment` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `totalizavel` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `pai_id` bigint(20) DEFAULT NULL,
  `descricao_alternativa` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `roles_acess` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `codigo_ord` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKthrslwgjk6echvds4h623e1tn` (`descricao`),
  UNIQUE KEY `UKdrq6tf65m3n02pxo9le7wayug` (`codigo`),
  KEY `FKm2j901a9c47mk3k5fcj9oylg6` (`estabelecimento_id`),
  KEY `FK603c1e5huj7ab54s2bbvueeye` (`user_inserted_id`),
  KEY `FKaxt48gx5827b359s5l33cfdxs` (`user_updated_id`),
  KEY `FKtgb55or02q9jshp4hxork5582` (`pai_id`),
  CONSTRAINT `FK603c1e5huj7ab54s2bbvueeye` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKaxt48gx5827b359s5l33cfdxs` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKm2j901a9c47mk3k5fcj9oylg6` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKtgb55or02q9jshp4hxork5582` FOREIGN KEY (`pai_id`) REFERENCES `fin_categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_centrocusto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_centrocusto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKap0lpjppo4ph4e0ha9d61hxmt` (`descricao`),
  KEY `FK8cf82fvb68br678bxnnwcuqev` (`estabelecimento_id`),
  KEY `FK8vf4l00o708jv1b6n3ccjjaqt` (`user_inserted_id`),
  KEY `FKkws6ik7966vv926d45yqntb8w` (`user_updated_id`),
  CONSTRAINT `FK8cf82fvb68br678bxnnwcuqev` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK8vf4l00o708jv1b6n3ccjjaqt` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKkws6ik7966vv926d45yqntb8w` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_grupo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ativo` bit(1) NOT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `dia_inicio` int(11) NOT NULL,
  `dia_vencto` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `carteira_pagante_id` bigint(20) NOT NULL,
  `categoria_padrao_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKpurrydilepcxciwxnnmi17h2t` (`descricao`),
  KEY `FKmnx6qg18uiqhb7u7p83ywlxr9` (`estabelecimento_id`),
  KEY `FK3d5wia4f6jjqv1bpcg6krmask` (`user_inserted_id`),
  KEY `FKqfe79us4y28mh39t5evsyv76x` (`user_updated_id`),
  KEY `FK77u9mhoxo0afougcsne1n1dxj` (`carteira_pagante_id`),
  KEY `FK2h70kgi4ssxvehoe8ny1we51y` (`categoria_padrao_id`),
  CONSTRAINT `FK2h70kgi4ssxvehoe8ny1we51y` FOREIGN KEY (`categoria_padrao_id`) REFERENCES `fin_categoria` (`id`),
  CONSTRAINT `FK3d5wia4f6jjqv1bpcg6krmask` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK77u9mhoxo0afougcsne1n1dxj` FOREIGN KEY (`carteira_pagante_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FKmnx6qg18uiqhb7u7p83ywlxr9` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKqfe79us4y28mh39t5evsyv76x` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_grupo_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_grupo_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `dt_vencto` date NOT NULL,
  `fechado` bit(1) NOT NULL,
  `valor_informado` double DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `anterior_id` bigint(20) DEFAULT NULL,
  `carteira_pagante_id` bigint(20) NOT NULL,
  `grupo_pai_id` bigint(20) NOT NULL,
  `proximo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKkyqpq4airl0e24wnrstlevjvm` (`descricao`),
  KEY `FKkac8t5lw7vbqhgkraoc62b9y3` (`estabelecimento_id`),
  KEY `FK18yh9vhc7j6vrbu3i7wnspha5` (`user_inserted_id`),
  KEY `FKtd62q1hfrfdinmkhhjqr78rts` (`user_updated_id`),
  KEY `FKriysmyoea93xhjg8539o26jhl` (`anterior_id`),
  KEY `FK9m37xtpl58lqo1lck2505rfam` (`carteira_pagante_id`),
  KEY `FK3v4l9h451d6yuuvo2l6psbjtb` (`grupo_pai_id`),
  KEY `FK3ld5s2lie1iy44hc6n694ahp2` (`proximo_id`),
  CONSTRAINT `FK18yh9vhc7j6vrbu3i7wnspha5` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK3ld5s2lie1iy44hc6n694ahp2` FOREIGN KEY (`proximo_id`) REFERENCES `fin_grupo_item` (`id`),
  CONSTRAINT `FK3v4l9h451d6yuuvo2l6psbjtb` FOREIGN KEY (`grupo_pai_id`) REFERENCES `fin_grupo` (`id`),
  CONSTRAINT `FK9m37xtpl58lqo1lck2505rfam` FOREIGN KEY (`carteira_pagante_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FKkac8t5lw7vbqhgkraoc62b9y3` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKriysmyoea93xhjg8539o26jhl` FOREIGN KEY (`anterior_id`) REFERENCES `fin_grupo_item` (`id`),
  CONSTRAINT `FKtd62q1hfrfdinmkhhjqr78rts` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=676 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_import_extrato_cabec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_import_extrato_cabec` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `tipo_extrato` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `campo_sistema` varchar(100) CHARACTER SET utf8 NOT NULL,
  `campos_cabecalho` varchar(200) CHARACTER SET utf8 NOT NULL,
  `formato` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `K_fin_import_extrato_cabec_estabelecimento_id` (`estabelecimento_id`),
  KEY `K_fin_import_extrato_cabec_user_inserted_id` (`user_inserted_id`),
  KEY `K_fin_import_extrato_cabec_user_updated_id` (`user_updated_id`),
  CONSTRAINT `FK_fin_import_extrato_cabec_estabelecimento_id` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_fin_import_extrato_cabec_user_inserted_id` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_fin_import_extrato_cabec_user_updated_id` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_modo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_modo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `com_banco_origem` bit(1) NOT NULL,
  `moviment_agrup` bit(1) NOT NULL,
  `transf_caixa` bit(1) NOT NULL,
  `transf_propria` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `modo_cartao` bit(1) NOT NULL,
  `modo_cheque` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKjrj42d95njw3ixa3gwld1fvir` (`descricao`),
  KEY `FKp92hsras1pkyxlg6xdsdfmh0o` (`estabelecimento_id`),
  KEY `FKonlhan21xnognfqfh2xa526nw` (`user_inserted_id`),
  KEY `FKs55wgybftjk4emciumumxbkyp` (`user_updated_id`),
  CONSTRAINT `FKonlhan21xnognfqfh2xa526nw` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKp92hsras1pkyxlg6xdsdfmh0o` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKs55wgybftjk4emciumumxbkyp` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_movimentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_movimentacao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `acrescimos` decimal(15,2) DEFAULT NULL,
  `cadeia_ordem` int(11) DEFAULT NULL,
  `cheque_agencia` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `alinea` int(11) DEFAULT NULL,
  `cheque_conta` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cheque_num_cheque` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `codigo_pedido` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `descontos` decimal(15,2) DEFAULT NULL,
  `descricao` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `documento_fiscal` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `documento_num` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `dt_moviment` date NOT NULL,
  `dt_pagto` date DEFAULT NULL,
  `dt_util` date NOT NULL,
  `dt_vencto` date NOT NULL,
  `dt_vencto_efetiva` date NOT NULL,
  `id_sistema_antigo` int(11) DEFAULT NULL,
  `num_parcela` int(11) DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `plano_pagto_cartao` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `recorr_dia` int(11) DEFAULT NULL,
  `recorr_frequencia` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `recorrente` bit(1) NOT NULL,
  `recorr_tipo_repet` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `recorr_variacao` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_lancto` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `valor_total` decimal(15,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `bandeira_cartao_id` bigint(20) DEFAULT NULL,
  `cadeia_id` bigint(20) DEFAULT NULL,
  `carteira_id` bigint(20) NOT NULL,
  `carteira_destino_id` bigint(20) DEFAULT NULL,
  `categoria_id` bigint(20) NOT NULL,
  `centrocusto_id` bigint(20) NOT NULL,
  `cheque_banco_id` bigint(20) DEFAULT NULL,
  `documento_banco_id` bigint(20) DEFAULT NULL,
  `grupo_item_id` bigint(20) DEFAULT NULL,
  `modo_id` bigint(20) NOT NULL,
  `operadora_cartao_id` bigint(20) DEFAULT NULL,
  `parcelamento_id` bigint(20) DEFAULT NULL,
  `pessoa` json DEFAULT NULL,
  `qtde_parcelas` int(11) DEFAULT NULL,
  `parcelamento` tinyblob,
  `unq_controle` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKe3uwd2vksy8gkylr3y2qsm4lq` (`estabelecimento_id`),
  KEY `FKjdtwnnjupqlfgb2tehg52pwxf` (`user_inserted_id`),
  KEY `FK3ggpaj4smudo52eogjxfgcihl` (`user_updated_id`),
  KEY `FK3ya3gw2d7vdwndvpoquvre7w6` (`bandeira_cartao_id`),
  KEY `FK4lbc93nlh017e5ay2o2nxuhgf` (`cadeia_id`),
  KEY `FKlvw5fn5ak7p0gi0r0lkqww4tj` (`carteira_id`),
  KEY `FK1r9ammupviaugq5m36xrxscj9` (`carteira_destino_id`),
  KEY `FKde8mulb6bxbbfn0bo1fsbmx66` (`categoria_id`),
  KEY `FKym6w6t9n3c95akso03ssgkx0` (`centrocusto_id`),
  KEY `FKggtxklh1hsq4598lmvxgw0rto` (`cheque_banco_id`),
  KEY `FKcmt4vy2y6ecxp0ou2ppuvnlo3` (`documento_banco_id`),
  KEY `FK3h2j2e9bqv4nfme0jqwr1j3ed` (`grupo_item_id`),
  KEY `FKexql3n1n23duyd4uxu9s4dvja` (`modo_id`),
  KEY `FKfluvkc6abkq0nqldfv46g35k3` (`operadora_cartao_id`),
  KEY `FKdv7der19tagtwcy3i6hv2jcr8` (`parcelamento_id`),
  CONSTRAINT `FK1r9ammupviaugq5m36xrxscj9` FOREIGN KEY (`carteira_destino_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FK3ggpaj4smudo52eogjxfgcihl` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK3h2j2e9bqv4nfme0jqwr1j3ed` FOREIGN KEY (`grupo_item_id`) REFERENCES `fin_grupo_item` (`id`),
  CONSTRAINT `FK3ya3gw2d7vdwndvpoquvre7w6` FOREIGN KEY (`bandeira_cartao_id`) REFERENCES `fin_bandeira_cartao` (`id`),
  CONSTRAINT `FK4lbc93nlh017e5ay2o2nxuhgf` FOREIGN KEY (`cadeia_id`) REFERENCES `fin_cadeia` (`id`),
  CONSTRAINT `FKcmt4vy2y6ecxp0ou2ppuvnlo3` FOREIGN KEY (`documento_banco_id`) REFERENCES `fin_banco` (`id`),
  CONSTRAINT `FKde8mulb6bxbbfn0bo1fsbmx66` FOREIGN KEY (`categoria_id`) REFERENCES `fin_categoria` (`id`),
  CONSTRAINT `FKdv7der19tagtwcy3i6hv2jcr8` FOREIGN KEY (`parcelamento_id`) REFERENCES `fin_parcelamento` (`id`),
  CONSTRAINT `FKe3uwd2vksy8gkylr3y2qsm4lq` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKexql3n1n23duyd4uxu9s4dvja` FOREIGN KEY (`modo_id`) REFERENCES `fin_modo` (`id`),
  CONSTRAINT `FKfluvkc6abkq0nqldfv46g35k3` FOREIGN KEY (`operadora_cartao_id`) REFERENCES `fin_operadora_cartao` (`id`),
  CONSTRAINT `FKggtxklh1hsq4598lmvxgw0rto` FOREIGN KEY (`cheque_banco_id`) REFERENCES `fin_banco` (`id`),
  CONSTRAINT `FKjdtwnnjupqlfgb2tehg52pwxf` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKlvw5fn5ak7p0gi0r0lkqww4tj` FOREIGN KEY (`carteira_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FKym6w6t9n3c95akso03ssgkx0` FOREIGN KEY (`centrocusto_id`) REFERENCES `fin_centrocusto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153983 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_ncm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_ncm` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_operadora_cartao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_operadora_cartao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `carteira_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK6pv72mvpkmj5fy6lvpn3602g5` (`descricao`),
  KEY `FK3wgkcx87jdnhxy4nomnjvyque` (`estabelecimento_id`),
  KEY `FKlmrexl6n1nu9plv915epgrpj2` (`user_inserted_id`),
  KEY `FKm6k5lasf5yjia0tdsktb0a3lb` (`user_updated_id`),
  KEY `FKj64jl5sryq9sp0rflhd0fnm2v` (`carteira_id`),
  CONSTRAINT `FK3wgkcx87jdnhxy4nomnjvyque` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKj64jl5sryq9sp0rflhd0fnm2v` FOREIGN KEY (`carteira_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FKlmrexl6n1nu9plv915epgrpj2` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKm6k5lasf5yjia0tdsktb0a3lb` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_parcelamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_parcelamento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `valor_total` decimal(15,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKpat71y2jbng55yurg0nvm87xe` (`estabelecimento_id`),
  KEY `FKou7t7y84qdgykiut0r4l5dkd6` (`user_inserted_id`),
  KEY `FK4302rih6q94r4iwttrfn41uje` (`user_updated_id`),
  CONSTRAINT `FK4302rih6q94r4iwttrfn41uje` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKou7t7y84qdgykiut0r4l5dkd6` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpat71y2jbng55yurg0nvm87xe` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2040 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_progr_financ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_progr_financ` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKprogrfinancdescricao` (`descricao`),
  KEY `FKprogrfinancestabelecimento` (`estabelecimento_id`),
  KEY `FKprogrfinancuserinserted` (`user_inserted_id`),
  KEY `FKprogrfinancuserupdated` (`user_updated_id`),
  CONSTRAINT `FKprogrfinancestabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKprogrfinancuserinserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKprogrfinancuserupdated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_progr_financ_mesano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_progr_financ_mesano` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `progr_financ_id` bigint(20) NOT NULL,
  `mesano` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKprogrfinancmesano` (`progr_financ_id`,`mesano`),
  KEY `FKprogrfinancmesanoestabelecimento` (`estabelecimento_id`),
  KEY `FKprogrfinancmesanouserinserted` (`user_inserted_id`),
  KEY `FKprogrfinancmesanouserupdated` (`user_updated_id`),
  KEY `FKprogrfinancmesanoprogrfinanc` (`progr_financ_id`),
  CONSTRAINT `FKprogrfinancmesanoestabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKprogrfinancmesanoprogrfinanc` FOREIGN KEY (`progr_financ_id`) REFERENCES `fin_progr_financ` (`id`),
  CONSTRAINT `FKprogrfinancmesanouserinserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKprogrfinancmesanouserupdated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_progr_financ_mesano_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_progr_financ_mesano_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `progr_financ_mesano_id` bigint(20) NOT NULL,
  `categoria_id` bigint(20) NOT NULL,
  `previsto` decimal(15,2) DEFAULT NULL,
  `lancado` decimal(15,2) DEFAULT NULL,
  `realizado` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKprogrfinancmesano` (`progr_financ_mesano_id`,`categoria_id`),
  KEY `FKprogrfinancmesanoitemestabelecimento` (`estabelecimento_id`),
  KEY `FKprogrfinancmesanoitemuserinserted` (`user_inserted_id`),
  KEY `FKprogrfinancmesanoitemuserupdated` (`user_updated_id`),
  KEY `FKprogrfinancmesanoitemprogrfinancmesano` (`progr_financ_mesano_id`),
  KEY `FKprogrfinancmesanoitemcategoria` (`categoria_id`),
  CONSTRAINT `FKprogrfinancmesanoitemcategoria` FOREIGN KEY (`categoria_id`) REFERENCES `fin_categoria` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemestabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemprogrfinancmesano` FOREIGN KEY (`progr_financ_mesano_id`) REFERENCES `fin_progr_financ_mesano` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemuserinserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemuserupdated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_progr_financ_mesano_item_mov`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_progr_financ_mesano_item_mov` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estabelecimento_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `progr_financ_mesano_item_id` bigint(20) NOT NULL,
  `movimentacao_id` bigint(20) NOT NULL,
  `selecionar` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKprogrfinancmesanoitemmov` (`progr_financ_mesano_item_id`,`movimentacao_id`),
  KEY `FKprogrfinancmesanoitemmovestabelecimento` (`estabelecimento_id`),
  KEY `FKprogrfinancmesanoitemmovuserinserted` (`user_inserted_id`),
  KEY `FKprogrfinancmesanoitemmovuserupdated` (`user_updated_id`),
  KEY `FKprogrfinancmesanoitemmovprogrfinancmesanoitem` (`progr_financ_mesano_item_id`),
  KEY `FKprogrfinancmesanoitemmovmovimentacao` (`movimentacao_id`),
  CONSTRAINT `FKprogrfinancmesanoitemmovestabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemmovmovimentacao` FOREIGN KEY (`movimentacao_id`) REFERENCES `fin_movimentacao` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemmovprogrfinancmesanoitem` FOREIGN KEY (`progr_financ_mesano_item_id`) REFERENCES `fin_progr_financ_mesano_item` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemmovuserinserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKprogrfinancmesanoitemmovuserupdated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_reg_conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_reg_conf` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `dt_registro` date NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `valor` decimal(19,2) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `carteira_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKicq7me3ynxhnsr5vxrdhqx2ju` (`descricao`,`carteira_id`,`dt_registro`),
  KEY `FKp0dg3jfdecmfm8w313are8tq1` (`estabelecimento_id`),
  KEY `FKmkg0odteokxx7mlsrqqvg698o` (`user_inserted_id`),
  KEY `FK59v0pbfj4grlw2guaqgvu1dg6` (`user_updated_id`),
  KEY `FK9895nmcgfje6xmfo6krupeqfa` (`carteira_id`),
  CONSTRAINT `FK59v0pbfj4grlw2guaqgvu1dg6` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK9895nmcgfje6xmfo6krupeqfa` FOREIGN KEY (`carteira_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FKmkg0odteokxx7mlsrqqvg698o` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKp0dg3jfdecmfm8w313are8tq1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1973 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_regra_import_linha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_regra_import_linha` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `cheque_agencia` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `alinea` int(11) DEFAULT NULL,
  `cheque_conta` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cheque_num_cheque` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `padrao_descricao` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `regra_regex_java` varchar(500) COLLATE utf8_swedish_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_lancto` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `carteira_id` bigint(20) DEFAULT NULL,
  `carteira_destino_id` bigint(20) DEFAULT NULL,
  `categoria_id` bigint(20) NOT NULL,
  `centrocusto_id` bigint(20) NOT NULL,
  `cheque_banco_id` bigint(20) DEFAULT NULL,
  `modo_id` bigint(20) NOT NULL,
  `sinal_valor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK2ky2hi2256yg5kqm3vsfe99x5` (`estabelecimento_id`),
  KEY `FK7wyn4ut0xbun2796ovjfgj7xg` (`user_inserted_id`),
  KEY `FK9fjj5kxyi34cy0fx595juvf18` (`user_updated_id`),
  KEY `FK2omyjcs8tn33bcpfdxvxshwrh` (`carteira_id`),
  KEY `FKthpj1hhvpnl384eicx5c8s6ys` (`carteira_destino_id`),
  KEY `FK9e9e7jt60vwr9q70o2ydt892e` (`categoria_id`),
  KEY `FK8ibr75yi5tas5l0tx07wwamc6` (`centrocusto_id`),
  KEY `FKq8r23msi0jac7mt39je20w3cj` (`cheque_banco_id`),
  KEY `FKn7wukr1woxu8ophori3ww7att` (`modo_id`),
  CONSTRAINT `FK2ky2hi2256yg5kqm3vsfe99x5` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK2omyjcs8tn33bcpfdxvxshwrh` FOREIGN KEY (`carteira_id`) REFERENCES `fin_carteira` (`id`),
  CONSTRAINT `FK7wyn4ut0xbun2796ovjfgj7xg` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK8ibr75yi5tas5l0tx07wwamc6` FOREIGN KEY (`centrocusto_id`) REFERENCES `fin_centrocusto` (`id`),
  CONSTRAINT `FK9e9e7jt60vwr9q70o2ydt892e` FOREIGN KEY (`categoria_id`) REFERENCES `fin_categoria` (`id`),
  CONSTRAINT `FK9fjj5kxyi34cy0fx595juvf18` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKn7wukr1woxu8ophori3ww7att` FOREIGN KEY (`modo_id`) REFERENCES `fin_modo` (`id`),
  CONSTRAINT `FKq8r23msi0jac7mt39je20w3cj` FOREIGN KEY (`cheque_banco_id`) REFERENCES `fin_banco` (`id`),
  CONSTRAINT `FKthpj1hhvpnl384eicx5c8s6ys` FOREIGN KEY (`carteira_destino_id`) REFERENCES `fin_carteira` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_result_tsno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_result_tsno` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `posicao` int(11) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK5xwesl35xdo90vp6cpla8rhou` (`descricao`),
  KEY `FK20s09f9w3gqdpeggeq5d3lkmb` (`estabelecimento_id`),
  KEY `FKetcye01lviynnwq0648rkkr6m` (`user_inserted_id`),
  KEY `FKekvjdkncpk3i0lace3cl28yyu` (`user_updated_id`),
  CONSTRAINT `FK20s09f9w3gqdpeggeq5d3lkmb` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKekvjdkncpk3i0lace3cl28yyu` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKetcye01lviynnwq0648rkkr6m` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fin_result_tsno_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_result_tsno_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `mesano` datetime NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `total_vendido` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `result_tsno_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK7iqlga0vb1vipukkfqi23ypfa` (`result_tsno_id`,`mesano`),
  KEY `FKtenxyxo5ixd2myprqoc7x9i3b` (`estabelecimento_id`),
  KEY `FKgfp5a6pv1qo6s41v0hm1ejyun` (`user_inserted_id`),
  KEY `FK9my8slpo0taqam3tbl8e6rnx5` (`user_updated_id`),
  CONSTRAINT `FK9my8slpo0taqam3tbl8e6rnx5` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKcwe6gjtcpm6jjx6dl9o1retvs` FOREIGN KEY (`result_tsno_id`) REFERENCES `fin_result_tsno` (`id`),
  CONSTRAINT `FKgfp5a6pv1qo6s41v0hm1ejyun` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKtenxyxo5ixd2myprqoc7x9i3b` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_msg_retorno_rf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_msg_retorno_rf` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `mensagem` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `versao` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKnedpv79q8tjup97p8de39py6o` (`codigo`,`versao`),
  KEY `FK4ilu61jn34r88ey9vk0l4ev0d` (`estabelecimento_id`),
  KEY `FKe0puhqp4mf0a6v66vrmjd17wj` (`user_inserted_id`),
  KEY `FK29w73lrsrxop28fwau1b3qsbl` (`user_updated_id`),
  CONSTRAINT `FK29w73lrsrxop28fwau1b3qsbl` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4ilu61jn34r88ey9vk0l4ev0d` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKe0puhqp4mf0a6v66vrmjd17wj` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=460 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_ncm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_ncm` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKhqkc3bwuvv66cajp6rolqgtlp` (`estabelecimento_id`),
  KEY `FK1he8kd6rpk9xcv0in3x0ghgrh` (`user_inserted_id`),
  KEY `FKfmw36s9jqr6d2jccqtemwe65k` (`user_updated_id`),
  CONSTRAINT `FK1he8kd6rpk9xcv0in3x0ghgrh` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK3agr1rcgg72rpinauoo2081fa` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKfmw36s9jqr6d2jccqtemwe65k` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKhqkc3bwuvv66cajp6rolqgtlp` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKjqyyad50n42ie02lyroya6fus` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKmn591dkn7iud17fpaiqs8k1gs` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10562 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_nf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_nf` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `dt_emissao` datetime DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `valor_total` decimal(19,2) DEFAULT NULL,
  `xml_nota` longtext COLLATE utf8_swedish_ci,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `pessoa_emitente_id` bigint(20) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `entrada_saida` bit(1) NOT NULL COMMENT 'false para SAIDA',
  `serie` int(11) NOT NULL,
  `pessoa_destinatario_id` bigint(20) DEFAULT NULL,
  `ambiente` varchar(4) COLLATE utf8_swedish_ci DEFAULT NULL,
  `spartacus_id_nota` int(11) DEFAULT NULL,
  `spartacus_mensretorno` longtext COLLATE utf8_swedish_ci,
  `spartacus_status` int(11) DEFAULT NULL,
  `spartacus_status_receita` int(11) DEFAULT NULL,
  `info_compl` varchar(3000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `spartacus_mensretorno_receita` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `pessoa_cadastro` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `total_descontos` decimal(19,2) DEFAULT '0.00',
  `subtotal` decimal(19,2) DEFAULT NULL,
  `transp_especie_volumes` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `transp_marca_volumes` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `transp_modalidade_frete` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `transp_numeracao_volumes` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `transp_peso_bruto` decimal(19,2) DEFAULT NULL,
  `transp_peso_liquido` decimal(19,2) DEFAULT NULL,
  `transp_qtde_volumes` decimal(19,2) DEFAULT NULL,
  `transp_fornecedor_id` bigint(20) DEFAULT NULL,
  `indicador_forma_pagto` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `natureza_operacao` varchar(60) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'VENDA',
  `a03id_nf_referenciada` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `finalidade_nf` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `dt_spartacus_status` datetime DEFAULT NULL,
  `transp_valor_total_frete` decimal(19,2) DEFAULT NULL,
  `dt_saient` datetime DEFAULT NULL,
  `uuid` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cnf` char(8) COLLATE utf8_swedish_ci DEFAULT NULL,
  `chave_acesso` char(44) COLLATE utf8_swedish_ci DEFAULT NULL,
  `protocolo_autoriz` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `motivo_cancelamento` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `carta_correcao` varchar(1000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `carta_correcao_seq` int(11) DEFAULT NULL,
  `rand_faturam` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKhr7ypsqycca4wbpsbdoroji09` (`numero`,`serie`,`tipo`,`pessoa_emitente_id`,`ambiente`),
  KEY `FKf1eskkp294afprr8d645b7e7o` (`estabelecimento_id`),
  KEY `FK2gg3vyv95ee9yxedj1edeoxjr` (`user_inserted_id`),
  KEY `FK80mnmwds2jx9i290e782xyhjw` (`user_updated_id`),
  KEY `FKpuu6c71721rcv22rory57ubjc` (`pessoa_emitente_id`),
  KEY `FKi9em6i1gu3rowq88u5ka8wx24` (`pessoa_destinatario_id`),
  KEY `FKfv6qbke4kdbj1yjk9i2i2m6dv` (`transp_fornecedor_id`),
  CONSTRAINT `FK2gg3vyv95ee9yxedj1edeoxjr` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4o56oyvwm0y8w70sadqj6fajq` FOREIGN KEY (`pessoa_emitente_id`) REFERENCES `bon_pessoa` (`id`),
  CONSTRAINT `FK80mnmwds2jx9i290e782xyhjw` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKf1eskkp294afprr8d645b7e7o` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKfv6qbke4kdbj1yjk9i2i2m6dv` FOREIGN KEY (`transp_fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FKi9em6i1gu3rowq88u5ka8wx24` FOREIGN KEY (`pessoa_destinatario_id`) REFERENCES `bon_pessoa` (`id`),
  CONSTRAINT `FKpuu6c71721rcv22rory57ubjc` FOREIGN KEY (`pessoa_emitente_id`) REFERENCES `bon_pessoa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12417 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_nf_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_nf_historico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fis_nf_id` bigint(20) NOT NULL,
  `codigo_status` int(11) NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `obs` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `dt_historico` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fis_nf_id` (`fis_nf_id`),
  CONSTRAINT `fis_nf_historico_fk1` FOREIGN KEY (`fis_nf_id`) REFERENCES `fis_nf` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4119 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_nf_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_nf_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `cfop` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `codigo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `descricao` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `icms` decimal(19,2) NOT NULL,
  `ncm` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `unidade` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `valor_total` decimal(19,2) NOT NULL,
  `valor_unit` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `nota_fiscal_id` bigint(20) NOT NULL,
  `valor_desconto` decimal(19,2) DEFAULT NULL,
  `sub_total` decimal(19,2) NOT NULL,
  `icms_valor` decimal(19,2) DEFAULT NULL,
  `icms_valor_bc` decimal(19,2) DEFAULT NULL,
  `ncm_existente` bit(1) DEFAULT NULL,
  `fis_nf_itemcol` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  `csosn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKlb4hrlvoufimhjtpsitrrmo1f` (`nota_fiscal_id`,`ordem`),
  KEY `FKbq0ga71t512nuv144n9d1rnrq` (`estabelecimento_id`),
  KEY `FKpr9pidiausdk1dhw3c4kww7io` (`user_inserted_id`),
  KEY `FKn2uk3pjrfqutg27fanbatwhu5` (`user_updated_id`),
  KEY `nota_fiscal_id` (`nota_fiscal_id`),
  CONSTRAINT `FKbq0ga71t512nuv144n9d1rnrq` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKn2uk3pjrfqutg27fanbatwhu5` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpr9pidiausdk1dhw3c4kww7io` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKrx15q1q5e8tytyjx2ibbmbet4` FOREIGN KEY (`nota_fiscal_id`) REFERENCES `fis_nf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38084 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_nf_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_nf_venda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `venda_id` bigint(20) NOT NULL,
  `nota_fiscal_id` bigint(20) NOT NULL,
  `inserted` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_inserted_id` bigint(20) DEFAULT '1',
  `user_updated_id` bigint(20) DEFAULT '1',
  `estabelecimento_id` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `nota_fiscal_id` (`nota_fiscal_id`),
  KEY `user_inserted_id` (`user_inserted_id`),
  KEY `user_updated_id` (`user_updated_id`),
  KEY `estabelecimento_id` (`estabelecimento_id`),
  KEY `venda_id` (`venda_id`) USING BTREE,
  CONSTRAINT `FKkfa4weh1n4ljjowg42oaayf8b` FOREIGN KEY (`nota_fiscal_id`) REFERENCES `fis_nf` (`id`),
  CONSTRAINT `fis_nf_venda_fk1` FOREIGN KEY (`venda_id`) REFERENCES `ven_venda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fis_nf_venda_fk2` FOREIGN KEY (`nota_fiscal_id`) REFERENCES `fis_nf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fis_nf_venda_fk3` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `fis_nf_venda_fk4` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `fis_nf_venda_fk5` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11411 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `fis_nf_venda_bkp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fis_nf_venda_bkp` (
  `nota_fiscal_id` bigint(20) NOT NULL,
  `venda_id` bigint(20) NOT NULL,
  `pv` int(11) NOT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`nota_fiscal_id`,`venda_id`,`pv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ids` (
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `orc_orcamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orc_orcamento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `cabecalho` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  `dt_preenchimento` datetime DEFAULT NULL,
  `dt_validade` datetime DEFAULT NULL,
  `exibir_totais` bit(1) NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `preenchido_por` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_orcamento` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK85bn6h6tqgdnkwt1r2j4vcssc` (`estabelecimento_id`),
  KEY `FK90nq204tu9hv3y2chw2qdgxxx` (`user_inserted_id`),
  KEY `FK3bwpt5qcfoeykrof1boaa3xrg` (`user_updated_id`),
  KEY `FK32awu9sucayh4qces0qmjc1qd` (`cliente_id`),
  CONSTRAINT `FK32awu9sucayh4qces0qmjc1qd` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FK3bwpt5qcfoeykrof1boaa3xrg` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK85bn6h6tqgdnkwt1r2j4vcssc` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK90nq204tu9hv3y2chw2qdgxxx` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=536 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `orc_orcamento_arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orc_orcamento_arquivo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nome_arquivo` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `orcamento_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK4kktw0vwk74lp5srtyy0aiqex` (`orcamento_id`,`nome_arquivo`),
  KEY `FK2p31n02120b8ab80b3jpytaj5` (`estabelecimento_id`),
  KEY `FK48yhyxlde3t9l118t98o2tjlq` (`user_inserted_id`),
  KEY `FK5jlsjcl89r8r7p2q3k5pdsrpf` (`user_updated_id`),
  CONSTRAINT `FK2p31n02120b8ab80b3jpytaj5` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK48yhyxlde3t9l118t98o2tjlq` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK5jlsjcl89r8r7p2q3k5pdsrpf` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKburuxtuqx0i4m6hxpas236fkx` FOREIGN KEY (`orcamento_id`) REFERENCES `orc_orcamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `orc_orcamento_grupo_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orc_orcamento_grupo_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `titulo` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `orcamento_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKakm0qtg81mskhf28co4l709ob` (`ordem`,`orcamento_id`),
  KEY `FKc5baoxbvbrgulvx7tp8gnq95j` (`estabelecimento_id`),
  KEY `FK6ot3a843qqta7j1lb5t4x2o5q` (`user_inserted_id`),
  KEY `FKnmm4wnpb9wyne972d5n9ueikk` (`user_updated_id`),
  KEY `FK81wwexd87w6rpjlqsvtln143v` (`orcamento_id`),
  CONSTRAINT `FK6ot3a843qqta7j1lb5t4x2o5q` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK81wwexd87w6rpjlqsvtln143v` FOREIGN KEY (`orcamento_id`) REFERENCES `orc_orcamento` (`id`),
  CONSTRAINT `FKc5baoxbvbrgulvx7tp8gnq95j` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKnmm4wnpb9wyne972d5n9ueikk` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=549 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `orc_orcamento_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orc_orcamento_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(3000) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `qtde` double NOT NULL,
  `valor_unit` double NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `orcamento_grupo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKd5ukh59ccycelxoqmk8ixkmg` (`ordem`,`orcamento_grupo_id`),
  KEY `FK73ww74jl1nw9m58uegussi09t` (`estabelecimento_id`),
  KEY `FK1w126dqhmld78bpek9qjlkl4d` (`user_inserted_id`),
  KEY `FKc8qrwlk95eboq9yu34uavyjn5` (`user_updated_id`),
  KEY `FKnygunjog0px93ek95d5y0tbh8` (`orcamento_grupo_id`),
  CONSTRAINT `FK1w126dqhmld78bpek9qjlkl4d` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK73ww74jl1nw9m58uegussi09t` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKc8qrwlk95eboq9yu34uavyjn5` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKnygunjog0px93ek95d5y0tbh8` FOREIGN KEY (`orcamento_grupo_id`) REFERENCES `orc_orcamento_grupo_item` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1492 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `persistent_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persistent_logins` (
  `username` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `series` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `last_used` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`series`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_catalogo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK3lpacqy6ihidl1g3tov38xogl` (`descricao`),
  KEY `FK6ju2dubnsunu2s67u2srwv0u7` (`estabelecimento_id`),
  KEY `FKaaxb6s95sr7er5in9kmwwtqh9` (`user_inserted_id`),
  KEY `FKh7y1d79r29fcr3vhnecdvdnqx` (`user_updated_id`),
  CONSTRAINT `FK6ju2dubnsunu2s67u2srwv0u7` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKaaxb6s95sr7er5in9kmwwtqh9` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKh7y1d79r29fcr3vhnecdvdnqx` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_catalogo_fotoitemartigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_catalogo_fotoitemartigo` (
  `foto_id` bigint(20) NOT NULL,
  `item_artigo_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  KEY `FKq5gisnddixh2j3ugd00d4oc72` (`foto_id`),
  KEY `FK98mxvooa2qa3caweqtkkhif30` (`item_artigo_id`),
  CONSTRAINT `FK98mxvooa2qa3caweqtkkhif30` FOREIGN KEY (`item_artigo_id`) REFERENCES `prod_catalogo_item_artigo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKq5gisnddixh2j3ugd00d4oc72` FOREIGN KEY (`foto_id`) REFERENCES `prod_catalogo_item_foto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_catalogo_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_catalogo_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `catalogo_id` bigint(20) NOT NULL,
  `instituicao_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKc35rpv23uslcqqsa0tbtv3i3e` (`catalogo_id`,`instituicao_id`),
  UNIQUE KEY `UK9yadcsie7dpng77r9hlbxb9np` (`catalogo_id`,`ordem`),
  KEY `FKtkw8cohqpr55a9de4ut45l7hm` (`estabelecimento_id`),
  KEY `FKmj6efkcevf4kxtnxxfwhc6y75` (`user_inserted_id`),
  KEY `FKonbmlckfy8d6gxwjnwid1f5do` (`user_updated_id`),
  KEY `FKgrasa5dnxkwwuusmj36s8bbaj` (`instituicao_id`),
  CONSTRAINT `FK2l45fokukpftya3yt8ll1q2bp` FOREIGN KEY (`catalogo_id`) REFERENCES `prod_catalogo` (`id`),
  CONSTRAINT `FKgrasa5dnxkwwuusmj36s8bbaj` FOREIGN KEY (`instituicao_id`) REFERENCES `prod_instituicao` (`id`),
  CONSTRAINT `FKmj6efkcevf4kxtnxxfwhc6y75` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKonbmlckfy8d6gxwjnwid1f5do` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKtkw8cohqpr55a9de4ut45l7hm` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_catalogo_item_artigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_catalogo_item_artigo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `catalogo_item_id` bigint(20) NOT NULL,
  `tipo_artigo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKnvp1pyyvk19jswfg23dijdykq` (`catalogo_item_id`,`tipo_artigo_id`),
  KEY `FKlsnqgcqd5me8juku1ji8d8rjx` (`estabelecimento_id`),
  KEY `FKj9tuyhh3xvn50w0t4gx0qutwc` (`user_inserted_id`),
  KEY `FK9pgwf70lsv0sat76qktfr6mo4` (`user_updated_id`),
  KEY `FKmxaenkj8hx69tqracnk839msd` (`tipo_artigo_id`),
  KEY `catalogo_item_id` (`catalogo_item_id`),
  CONSTRAINT `FK9pgwf70lsv0sat76qktfr6mo4` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKajawhrpjo1cgneg81jii2jlbt` FOREIGN KEY (`catalogo_item_id`) REFERENCES `prod_catalogo_item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FKj9tuyhh3xvn50w0t4gx0qutwc` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKlsnqgcqd5me8juku1ji8d8rjx` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKmxaenkj8hx69tqracnk839msd` FOREIGN KEY (`tipo_artigo_id`) REFERENCES `prod_tipo_artigo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=881 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_catalogo_item_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_catalogo_item_foto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `nome_arquivo` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `catalogo_item_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKg58xgqshw6cqo3y41vhcxoywp` (`catalogo_item_id`,`nome_arquivo`),
  KEY `FKpqy9xr9m2fletvjnhe3tgiys1` (`estabelecimento_id`),
  KEY `FKolx18qe5d7d3ifp4rywx6emc2` (`user_inserted_id`),
  KEY `FKfrwph98nr95rpnne1fo23nccy` (`user_updated_id`),
  KEY `catalogo_item_id` (`catalogo_item_id`),
  CONSTRAINT `FKfrwph98nr95rpnne1fo23nccy` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKho0d3pto94k5cjhoxlq6o2iwe` FOREIGN KEY (`catalogo_item_id`) REFERENCES `prod_catalogo_item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FKolx18qe5d7d3ifp4rywx6emc2` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpqy9xr9m2fletvjnhe3tgiys1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_confeccao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_confeccao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `bloqueada` bit(1) NOT NULL,
  `custo_operacional_padrao` double NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `margem_padrao` double NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `prazo_padrao` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `instituicao_id` bigint(20) NOT NULL,
  `tipo_artigo_id` bigint(20) NOT NULL,
  `custo_financeiro_padrao` decimal(19,2) NOT NULL,
  `modo_calculo` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `grade_id` bigint(20) NOT NULL,
  `oculta` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKtlp0ko3yttm7blx0bvfaf4g5g` (`instituicao_id`,`tipo_artigo_id`,`descricao`),
  KEY `FKmfm8spxi8yvmq453ehid5yfvw` (`estabelecimento_id`),
  KEY `FKltmhwqswiow1npcldgqdvrgin` (`user_inserted_id`),
  KEY `FKs8e73pkc7835tfmweay0q21hw` (`user_updated_id`),
  KEY `FKj18c62t7xot4khcmffs4dp44s` (`tipo_artigo_id`),
  KEY `FKk0eaokbbsuoty0iowrp12jkaf` (`grade_id`),
  CONSTRAINT `FKj18c62t7xot4khcmffs4dp44s` FOREIGN KEY (`tipo_artigo_id`) REFERENCES `prod_tipo_artigo` (`id`),
  CONSTRAINT `FKjjyepgg0uvowtdd3j79hr7uvw` FOREIGN KEY (`instituicao_id`) REFERENCES `prod_instituicao` (`id`),
  CONSTRAINT `FKk0eaokbbsuoty0iowrp12jkaf` FOREIGN KEY (`grade_id`) REFERENCES `est_grade` (`id`),
  CONSTRAINT `FKltmhwqswiow1npcldgqdvrgin` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKmfm8spxi8yvmq453ehid5yfvw` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKs8e73pkc7835tfmweay0q21hw` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3532 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_confeccao_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_confeccao_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `confeccao_id` bigint(20) NOT NULL,
  `insumo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK1f99kd3yoaguisn6e4ods3aly` (`confeccao_id`,`insumo_id`),
  KEY `FK3kfcg0f8uaasce60iuiaxgyjv` (`estabelecimento_id`),
  KEY `FKsa62n8h4na4hdpf6p78r2gr31` (`user_inserted_id`),
  KEY `FKsjrcstqd3xteeamuk4oj6umxg` (`user_updated_id`),
  KEY `FKg5hphro7bd64uvqbyi5cxf3vk` (`insumo_id`),
  CONSTRAINT `FK3kfcg0f8uaasce60iuiaxgyjv` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKdmfsdtxh4ukawhqndbj2lxoom` FOREIGN KEY (`confeccao_id`) REFERENCES `prod_confeccao` (`id`),
  CONSTRAINT `FKg5hphro7bd64uvqbyi5cxf3vk` FOREIGN KEY (`insumo_id`) REFERENCES `prod_insumo` (`id`),
  CONSTRAINT `FKsa62n8h4na4hdpf6p78r2gr31` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKsjrcstqd3xteeamuk4oj6umxg` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38459 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_confeccao_item_qtde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_confeccao_item_qtde` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `qtde` decimal(15,3) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `confeccao_item_id` bigint(20) NOT NULL,
  `grade_tamanho_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKmfnvvkwjr6reflbpx9uwjh1mx` (`confeccao_item_id`,`grade_tamanho_id`),
  KEY `FKswypi4o170rjk3jni5r0i7h9a` (`estabelecimento_id`),
  KEY `FKcgi8egtmbpjn5vtk2jbl0h3aj` (`user_inserted_id`),
  KEY `FKixymiruy3etjhr50nvncitmgu` (`user_updated_id`),
  KEY `FKjo2dvms3e0s3drqhurg9ll0xy` (`grade_tamanho_id`),
  CONSTRAINT `FK1nv7a4pu6e3kaawd2jvbnhay6` FOREIGN KEY (`confeccao_item_id`) REFERENCES `prod_confeccao_item` (`id`),
  CONSTRAINT `FKcgi8egtmbpjn5vtk2jbl0h3aj` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKixymiruy3etjhr50nvncitmgu` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKjo2dvms3e0s3drqhurg9ll0xy` FOREIGN KEY (`grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`),
  CONSTRAINT `FKswypi4o170rjk3jni5r0i7h9a` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=349229 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_confeccao_preco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_confeccao_preco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `coeficiente` double NOT NULL,
  `custo_operacional` double NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `dt_custo` date NOT NULL,
  `margem` double NOT NULL,
  `prazo` int(11) NOT NULL,
  `preco_custo` double NOT NULL,
  `preco_prazo` double NOT NULL,
  `preco_vista` double NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `confeccao_id` bigint(20) NOT NULL,
  `custo_financeiro` decimal(19,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK1wh2w9tkkgomn6d7t0ycnt768` (`confeccao_id`,`descricao`),
  KEY `FKhgdg20nl21atic87vlhykbad1` (`estabelecimento_id`),
  KEY `FK2xnxlqoe49udcuj5mp3wxc3rp` (`user_inserted_id`),
  KEY `FKlipu8x07b84q52d1hoeckcyv2` (`user_updated_id`),
  CONSTRAINT `FK2xnxlqoe49udcuj5mp3wxc3rp` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4a8hh1jg00j91ebdivwaui8cv` FOREIGN KEY (`confeccao_id`) REFERENCES `prod_confeccao` (`id`),
  CONSTRAINT `FKhgdg20nl21atic87vlhykbad1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKlipu8x07b84q52d1hoeckcyv2` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33769 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_instituicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_instituicao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  `fornecedor_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKnabqyx9dkg5v2oheli2e4oxva` (`nome`),
  UNIQUE KEY `unq_codigo` (`codigo`),
  UNIQUE KEY `UK_52lelnpynrvsy9mrf9xk0culr` (`cliente_id`),
  UNIQUE KEY `UK_s32i3gu24oanl8onx0uwrg3bl` (`fornecedor_id`),
  UNIQUE KEY `UK52lelnpynrvsy9mrf9xk0culr` (`cliente_id`),
  UNIQUE KEY `UKs32i3gu24oanl8onx0uwrg3bl` (`fornecedor_id`),
  KEY `FKscykmc4deahj20cwmbli57ndc` (`estabelecimento_id`),
  KEY `FK93f8t7nd7sxegu79hdo11plgf` (`user_inserted_id`),
  KEY `FKchvhw5mt74ooriyvnfgrjmi4m` (`user_updated_id`),
  CONSTRAINT `FK93f8t7nd7sxegu79hdo11plgf` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKa6559imh65itohx4lt0emk2fg` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FKchvhw5mt74ooriyvnfgrjmi4m` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKe0nd3yiseqfonxbvjitjr34t2` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`),
  CONSTRAINT `FKscykmc4deahj20cwmbli57ndc` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1141 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_insumo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_insumo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `tipo_insumo_id` bigint(20) NOT NULL,
  `unidade_produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_codigo_insumo` (`codigo`),
  UNIQUE KEY `unq_insumo_descricao` (`descricao`),
  UNIQUE KEY `UKsau9wvrxhivspnqwgoyjaf890` (`descricao`),
  KEY `FKgte0uu9m9fpx35s3hmoi0l0yd` (`estabelecimento_id`),
  KEY `FKte7c7fy2yms6nr4dnskixmfem` (`user_inserted_id`),
  KEY `FKjisp9x7viggyjb3elcyeywgqm` (`user_updated_id`),
  KEY `FKfsux9x2o1pq1biuxwc3kgm9gg` (`tipo_insumo_id`),
  KEY `FKctmpjpapljd78845aobckmi` (`unidade_produto_id`),
  CONSTRAINT `FKctmpjpapljd78845aobckmi` FOREIGN KEY (`unidade_produto_id`) REFERENCES `est_unidade_produto` (`id`),
  CONSTRAINT `FKfsux9x2o1pq1biuxwc3kgm9gg` FOREIGN KEY (`tipo_insumo_id`) REFERENCES `prod_tipo_insumo` (`id`),
  CONSTRAINT `FKgte0uu9m9fpx35s3hmoi0l0yd` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKjisp9x7viggyjb3elcyeywgqm` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKte7c7fy2yms6nr4dnskixmfem` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1258 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_insumo_preco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_insumo_preco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `coeficiente` double NOT NULL,
  `custo_operacional` double NOT NULL,
  `dt_custo` date NOT NULL,
  `margem` double NOT NULL,
  `prazo` int(11) NOT NULL,
  `preco_custo` double NOT NULL,
  `preco_prazo` double NOT NULL,
  `preco_vista` double NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `fornecedor_id` bigint(20) DEFAULT NULL,
  `insumo_id` bigint(20) NOT NULL,
  `custo_financeiro` decimal(19,2) NOT NULL,
  `atual` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKbk9ydh7gdjn67ubw83gy3hjuh` (`insumo_id`,`dt_custo`,`fornecedor_id`),
  KEY `FK4dv5kwc01vwlk05ebdses4er6` (`estabelecimento_id`),
  KEY `FK30ilflwbbub68aptpeoeqi0oo` (`user_inserted_id`),
  KEY `FKe7j2c2vycdjt59yyo6nlywijo` (`user_updated_id`),
  KEY `FKrfmkxtr8tudntacq5etaivwhi` (`fornecedor_id`),
  CONSTRAINT `FK30ilflwbbub68aptpeoeqi0oo` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4dv5kwc01vwlk05ebdses4er6` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKd4lv32pujtcjntnbmsp25747j` FOREIGN KEY (`insumo_id`) REFERENCES `prod_insumo` (`id`),
  CONSTRAINT `FKe7j2c2vycdjt59yyo6nlywijo` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKrfmkxtr8tudntacq5etaivwhi` FOREIGN KEY (`fornecedor_id`) REFERENCES `est_fornecedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1217 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_lote_confeccao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_lote_confeccao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `dt_lote` date DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKh9i3unlse4wfe5l0q8a7xkh7d` (`codigo`),
  KEY `FKa2626dfdiwkmangv5s57qp2au` (`estabelecimento_id`),
  KEY `FKqrn5wo2bqbrucvdhdo8xq3s1i` (`user_inserted_id`),
  KEY `FKhd9ngepwiqvtxhonqyibonms3` (`user_updated_id`),
  CONSTRAINT `FKa2626dfdiwkmangv5s57qp2au` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKhd9ngepwiqvtxhonqyibonms3` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKqrn5wo2bqbrucvdhdo8xq3s1i` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_lote_confeccao_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_lote_confeccao_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `confeccao_id` bigint(20) NOT NULL,
  `lote_confeccao_id` bigint(20) NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKjs65urvpv1rwvoiv0v8ngjqte` (`estabelecimento_id`),
  KEY `FK84jqpqgqrxf1qkoph99aw25xg` (`user_inserted_id`),
  KEY `FK1i94vxo0hfuxc76i1dfwj2ntu` (`user_updated_id`),
  KEY `FKkrq4upo95elf8e8mgj1mg8mh7` (`confeccao_id`),
  KEY `lote_confeccao_id` (`lote_confeccao_id`),
  CONSTRAINT `FK1i94vxo0hfuxc76i1dfwj2ntu` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK84jqpqgqrxf1qkoph99aw25xg` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKh8m6o3vxsph0pn2ip714iiowv` FOREIGN KEY (`lote_confeccao_id`) REFERENCES `prod_lote_confeccao` (`id`),
  CONSTRAINT `FKjs65urvpv1rwvoiv0v8ngjqte` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKkrq4upo95elf8e8mgj1mg8mh7` FOREIGN KEY (`confeccao_id`) REFERENCES `prod_confeccao` (`id`),
  CONSTRAINT `prod_lote_confeccao_item_fk1` FOREIGN KEY (`lote_confeccao_id`) REFERENCES `prod_lote_confeccao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3304 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_lote_confeccao_item_qtde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_lote_confeccao_item_qtde` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `qtde` int(11) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `grade_tamanho_id` bigint(20) NOT NULL,
  `lote_confeccao_item_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK2qewrcgh1b35ewxiqu4g8mxh3` (`lote_confeccao_item_id`,`grade_tamanho_id`),
  KEY `FKrqvhjpg440uuiqwy3bkx6s4uc` (`estabelecimento_id`),
  KEY `FKasy6otygn3dj5bl7dinvigm22` (`user_inserted_id`),
  KEY `FKdc8m001ma9d9hx1ewmlulojgq` (`user_updated_id`),
  KEY `FKs8mqcaclf2c7qdjk323ceqvr4` (`grade_tamanho_id`),
  CONSTRAINT `FKasy6otygn3dj5bl7dinvigm22` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKdc8m001ma9d9hx1ewmlulojgq` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKj8x0xvh5ancwuytup679gyiig` FOREIGN KEY (`lote_confeccao_item_id`) REFERENCES `prod_lote_confeccao_item` (`id`),
  CONSTRAINT `FKrqvhjpg440uuiqwy3bkx6s4uc` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKs8mqcaclf2c7qdjk323ceqvr4` FOREIGN KEY (`grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15272 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_tipo_artigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_tipo_artigo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `modo_calculo` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `subdepto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKc5rav0ekc90fimwyf67w9uwft` (`descricao`),
  UNIQUE KEY `UK2xb2fct0nv595dahn2kytnxnn` (`codigo`),
  KEY `FKn384sa658o37rl0ls4x9rquky` (`estabelecimento_id`),
  KEY `FK5yorhp21h27uyam00rrbd86yg` (`user_inserted_id`),
  KEY `FK88ssh7qu2qe0mmyb9xr555aa6` (`user_updated_id`),
  KEY `FKfndx2btr7gv8acscaj8t516s0` (`subdepto_id`),
  CONSTRAINT `FK5yorhp21h27uyam00rrbd86yg` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK88ssh7qu2qe0mmyb9xr555aa6` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKfndx2btr7gv8acscaj8t516s0` FOREIGN KEY (`subdepto_id`) REFERENCES `est_subdepto` (`id`),
  CONSTRAINT `FKn384sa658o37rl0ls4x9rquky` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prod_tipo_insumo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_tipo_insumo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `unidade_produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK2ag9el4ayt66skvm3i532hra8` (`descricao`),
  UNIQUE KEY `UKmle8a1r6vmu4x6yfxrov08jh4` (`codigo`),
  KEY `FKixbfoo9jeclfj6c2vxfvwabys` (`estabelecimento_id`),
  KEY `FKf7a1wqshhw3jg0kicwrlhtffv` (`user_inserted_id`),
  KEY `FKd32d8wspcxvccroe1yxfip1y5` (`user_updated_id`),
  KEY `FKf52ki5qoov9gyarak3du2n2re` (`unidade_produto_id`),
  CONSTRAINT `FKd32d8wspcxvccroe1yxfip1y5` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKf52ki5qoov9gyarak3du2n2re` FOREIGN KEY (`unidade_produto_id`) REFERENCES `est_unidade_produto` (`id`),
  CONSTRAINT `FKf7a1wqshhw3jg0kicwrlhtffv` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKixbfoo9jeclfj6c2vxfvwabys` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_avaliacao_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_avaliacao_venda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKb5o5cuqykfcfxignqre8pmn04` (`descricao`),
  KEY `FKpqgjdn4pgh1l8g5nfyyal0bhk` (`estabelecimento_id`),
  KEY `FKojcchyncauyt0kwdrmarq9lp9` (`user_inserted_id`),
  KEY `FKei1fdheu6ixloy06cta8gf5eh` (`user_updated_id`),
  CONSTRAINT `FKei1fdheu6ixloy06cta8gf5eh` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKojcchyncauyt0kwdrmarq9lp9` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpqgjdn4pgh1l8g5nfyyal0bhk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_avaliacao_venda_questao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_avaliacao_venda_questao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `questao` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_resposta` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `avaliacao_venda_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKatx6soyv36mti08qu8ypuiuci` (`avaliacao_venda_id`,`ordem`),
  UNIQUE KEY `UKg1mhnokcamvhdpkatr9qsxjw2` (`avaliacao_venda_id`,`questao`),
  KEY `FKk1wdggtgma3wa02vqb7p6nm1a` (`estabelecimento_id`),
  KEY `FKokk2ck2pajrtyxflqix301qd4` (`user_inserted_id`),
  KEY `FKknlr6jxutoiqvofpjyst7ukxy` (`user_updated_id`),
  CONSTRAINT `FKjixstwhncclbocep9om4tehwg` FOREIGN KEY (`avaliacao_venda_id`) REFERENCES `rh_avaliacao_venda` (`id`),
  CONSTRAINT `FKk1wdggtgma3wa02vqb7p6nm1a` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKknlr6jxutoiqvofpjyst7ukxy` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKokk2ck2pajrtyxflqix301qd4` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_avaliacao_venda_resp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_avaliacao_venda_resp` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `dt_avaliacao` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `avaliacao_venda_id` bigint(20) NOT NULL,
  `venda_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKah8plcwf9f1oahpir2wrh0jqq` (`estabelecimento_id`),
  KEY `FK9rqueo2pb1t2g4vml2f30tc2l` (`user_inserted_id`),
  KEY `FK9xl97vdjcneonbde8hbb1lmse` (`user_updated_id`),
  KEY `FKlcflr832kqj9nsl3lbftqu5ku` (`avaliacao_venda_id`),
  CONSTRAINT `FK9rqueo2pb1t2g4vml2f30tc2l` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK9xl97vdjcneonbde8hbb1lmse` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKah8plcwf9f1oahpir2wrh0jqq` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKlcflr832kqj9nsl3lbftqu5ku` FOREIGN KEY (`avaliacao_venda_id`) REFERENCES `rh_avaliacao_venda` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_avaliacao_venda_resp_questao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_avaliacao_venda_resp_questao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `resposta` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `avaliacao_venda_questao_id` bigint(20) NOT NULL,
  `avaliacao_venda_resp_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKhbwonx8dms1jlvkweqol70ejx` (`avaliacao_venda_resp_id`,`avaliacao_venda_questao_id`),
  KEY `FK9qxac0mhgmw8y6d7sggj7pclv` (`estabelecimento_id`),
  KEY `FKko14ko1xp9uy1gumpw0ddab7v` (`user_inserted_id`),
  KEY `FKbywe107x8ne13gt6vwptu8noo` (`user_updated_id`),
  KEY `FK5ir761fjjth0f5c6geb5oscyj` (`avaliacao_venda_questao_id`),
  CONSTRAINT `FK5ir761fjjth0f5c6geb5oscyj` FOREIGN KEY (`avaliacao_venda_questao_id`) REFERENCES `rh_avaliacao_venda_questao` (`id`),
  CONSTRAINT `FK8u2hcm90ujpee41sxon1i0yxs` FOREIGN KEY (`avaliacao_venda_resp_id`) REFERENCES `rh_avaliacao_venda_resp` (`id`),
  CONSTRAINT `FK9qxac0mhgmw8y6d7sggj7pclv` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKbywe107x8ne13gt6vwptu8noo` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKko14ko1xp9uy1gumpw0ddab7v` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1435 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_cargo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `comissaoPorVendas` bit(1) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK6enp9ww9pjny9smmgbcif8w5n` (`descricao`),
  KEY `FKt326sa4nnduwhp081mh7ehwwe` (`estabelecimento_id`),
  KEY `FK5blxpp3cd4leqwhwkjp7vyvoe` (`user_inserted_id`),
  KEY `FKeph74its6pyj2te1y6hpiqo5f` (`user_updated_id`),
  CONSTRAINT `FK5blxpp3cd4leqwhwkjp7vyvoe` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKeph74its6pyj2te1y6hpiqo5f` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKt326sa4nnduwhp081mh7ehwwe` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_funcionario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `clt` bit(1) NOT NULL,
  `codigo` int(11) NOT NULL,
  `dt_nascimento` datetime DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `estado_civil` varchar(13) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone1` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone2` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone3` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `fone4` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `naturalidade` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `nome_ekt` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `rg` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `senha` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `vendedor_comissionado` bit(1) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `pessoa_id` bigint(20) NOT NULL,
  `dt_emissao_rg` datetime DEFAULT NULL,
  `estado_rg` varchar(2) COLLATE utf8_swedish_ci DEFAULT NULL,
  `orgao_emissor_rg` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  `sexo` varchar(9) COLLATE utf8_swedish_ci DEFAULT NULL,
  `endereco_id` bigint(20) DEFAULT NULL,
  `dt_admissao` datetime DEFAULT NULL,
  `dt_demissao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_funcionario` (`codigo`,`dt_admissao`),
  KEY `FKgeoj2tde0dta8q90oa1g7ytkv` (`estabelecimento_id`),
  KEY `FK83xstw486o16beendobcopg31` (`user_inserted_id`),
  KEY `FKmf5l1fju71rgyoloyiml19qpv` (`user_updated_id`),
  KEY `FKcksmukx7mmgicay2pdbjp3hwj` (`pessoa_id`),
  KEY `FKmmayy0m5qouiicdlss5t9w6i9` (`endereco_id`),
  CONSTRAINT `FK83xstw486o16beendobcopg31` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKcksmukx7mmgicay2pdbjp3hwj` FOREIGN KEY (`pessoa_id`) REFERENCES `bon_pessoa` (`id`),
  CONSTRAINT `FKgeoj2tde0dta8q90oa1g7ytkv` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKmf5l1fju71rgyoloyiml19qpv` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKmmayy0m5qouiicdlss5t9w6i9` FOREIGN KEY (`endereco_id`) REFERENCES `bon_endereco` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_funcionario_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_funcionario_cargo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `atual` bit(1) NOT NULL,
  `comissao` decimal(19,2) NOT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `dt_inicio` datetime NOT NULL,
  `salario` decimal(19,2) NOT NULL,
  `salario_piso` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `cargo_id` bigint(20) NOT NULL,
  `funcionario_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKlijskf8o1glcdd23na9ak4m2f` (`funcionario_id`,`dt_inicio`),
  KEY `FKe1lvenf8ak9wr7hkg27tbs3pp` (`estabelecimento_id`),
  KEY `FKcbvj8gp8yvee55gtcsm5c012i` (`user_inserted_id`),
  KEY `FKko2hpi3rn6hovkg12x13aybic` (`user_updated_id`),
  KEY `FKq2dxxo7tjthb7s9hmpna08l9j` (`cargo_id`),
  CONSTRAINT `FKcbvj8gp8yvee55gtcsm5c012i` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKe1lvenf8ak9wr7hkg27tbs3pp` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKko2hpi3rn6hovkg12x13aybic` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpvyhdka6dinfbv19sc56uwtyo` FOREIGN KEY (`funcionario_id`) REFERENCES `rh_funcionario` (`id`),
  CONSTRAINT `FKq2dxxo7tjthb7s9hmpna08l9j` FOREIGN KEY (`cargo_id`) REFERENCES `rh_cargo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `rh_funcionario_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rh_funcionario_enderecos` (
  `rh_funcionario_id` bigint(20) NOT NULL,
  `bon_endereco_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  UNIQUE KEY `UK_7xbkx9xg3g80smeryb9t73cxm` (`bon_endereco_id`),
  KEY `FKh3mw7i1cl56gblp5s1vvewtdy` (`rh_funcionario_id`),
  CONSTRAINT `FK8yo1jgixigsish8exd4et8syf` FOREIGN KEY (`bon_endereco_id`) REFERENCES `bon_endereco` (`id`),
  CONSTRAINT `FKh3mw7i1cl56gblp5s1vvewtdy` FOREIGN KEY (`rh_funcionario_id`) REFERENCES `rh_funcionario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sec_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `groupname` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK9fr1lrbpsxlyb9rl3syf74nbh` (`groupname`),
  KEY `FKh503ubl5jh82brgr5b60k1sk9` (`estabelecimento_id`),
  KEY `FKovu458abiv1cf5wym3djre40n` (`user_inserted_id`),
  KEY `FKi2fsmkm38lp21wvnxqaqkeavi` (`user_updated_id`),
  CONSTRAINT `FKh503ubl5jh82brgr5b60k1sk9` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKi2fsmkm38lp21wvnxqaqkeavi` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKovu458abiv1cf5wym3djre40n` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sec_group_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_group_role` (
  `group_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  KEY `FKa6e07395sgoe891a5dniyrpg3` (`role_id`),
  KEY `FKglvvcn8pqd1qbedhgupmgl3s2` (`group_id`),
  CONSTRAINT `FKa6e07395sgoe891a5dniyrpg3` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`),
  CONSTRAINT `FKglvvcn8pqd1qbedhgupmgl3s2` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sec_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `role` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK2n3qbrc5tu07q0xyi94caepcp` (`role`),
  KEY `FKpunrs1h5wlkebn5pxlqamxlyw` (`estabelecimento_id`),
  KEY `FKi2brdlce0ggj7aog4xn6gptq1` (`user_inserted_id`),
  KEY `FKelrwbvmjqkfey84nrn9vnm3qe` (`user_updated_id`),
  CONSTRAINT `FKelrwbvmjqkfey84nrn9vnm3qe` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKi2brdlce0ggj7aog4xn6gptq1` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKpunrs1h5wlkebn5pxlqamxlyw` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sec_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `ativo` bit(1) NOT NULL,
  `email` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `nome` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `senha` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(90) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `api_token_expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK5ctbdrlf3eismye20vsdtk8w8` (`username`,`estabelecimento_id`) USING BTREE,
  KEY `FK220fu1ge4dpwuc5i4s43h5a5j` (`estabelecimento_id`),
  KEY `FK4rioll4k3wwpqw34tlg311yfc` (`user_inserted_id`),
  KEY `FKasdpuv9jq6o44vihexwwngide` (`user_updated_id`),
  KEY `FKjebdusj3li8ahjhf83nf32tmh` (`group_id`),
  CONSTRAINT `FK220fu1ge4dpwuc5i4s43h5a5j` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK4rioll4k3wwpqw34tlg311yfc` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKasdpuv9jq6o44vihexwwngide` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKjebdusj3li8ahjhf83nf32tmh` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sec_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_user_role` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `updated` date DEFAULT NULL,
  KEY `FKfowkd8vw5qarh8b8y9noaf4et` (`role_id`),
  KEY `FK835bbyiy6majrolcov7bp0yo0` (`user_id`),
  CONSTRAINT `FK835bbyiy6majrolcov7bp0yo0` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKfowkd8vw5qarh8b8y9noaf4et` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `teste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campo1` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_encomenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_encomenda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `desconto_especial` decimal(19,2) NOT NULL,
  `dt_encomenda` datetime NOT NULL,
  `historicoDesconto` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `sub_total` decimal(19,2) NOT NULL,
  `valor_pago` decimal(19,2) NOT NULL,
  `valor_total` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  `vendedor_id` bigint(20) NOT NULL,
  `deletado` bit(1) DEFAULT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK35mxhgl9sd8bhg6a0va19syxi` (`numero`),
  KEY `FKc90ien1nfeqgjbeejper0mn22` (`estabelecimento_id`),
  KEY `FKledhohxytsjlus7p0a1p9uf5` (`user_inserted_id`),
  KEY `FKijajp7s71rgikbnfryex637vy` (`user_updated_id`),
  KEY `FKfwux4onjb3fcg9u5npjs1r3v5` (`cliente_id`),
  KEY `FKhl6iyvf2msv7rapsaii8wef34` (`vendedor_id`),
  CONSTRAINT `FKc90ien1nfeqgjbeejper0mn22` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKfwux4onjb3fcg9u5npjs1r3v5` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FKhl6iyvf2msv7rapsaii8wef34` FOREIGN KEY (`vendedor_id`) REFERENCES `rh_funcionario` (`id`),
  CONSTRAINT `FKijajp7s71rgikbnfryex637vy` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKledhohxytsjlus7p0a1p9uf5` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_encomenda_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_encomenda_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `alteracao_preco` bit(1) NOT NULL,
  `integrado_ao_estoque` bit(1) NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `preco_encomenda` decimal(19,2) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `status` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `encomenda_id` bigint(20) NOT NULL,
  `grade_tamanho_id` bigint(20) NOT NULL,
  `produto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKqxwrsixeyqysopg4s1ttvhgwr` (`estabelecimento_id`),
  KEY `FKbkufam8tn443c0lwja0ikcbqx` (`user_inserted_id`),
  KEY `FKr4atodvist11qiy1u8yjvs16s` (`user_updated_id`),
  KEY `FKqs03e6t0sp9rb3llk9g76vsbn` (`encomenda_id`),
  KEY `FKqbhfjcbcct5sct4lnkm5f0084` (`grade_tamanho_id`),
  KEY `FK5lsan1fb2grlxacbeei314pih` (`produto_id`),
  CONSTRAINT `FK5lsan1fb2grlxacbeei314pih` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`),
  CONSTRAINT `FKbkufam8tn443c0lwja0ikcbqx` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKqbhfjcbcct5sct4lnkm5f0084` FOREIGN KEY (`grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`),
  CONSTRAINT `FKqs03e6t0sp9rb3llk9g76vsbn` FOREIGN KEY (`encomenda_id`) REFERENCES `ven_encomenda` (`id`),
  CONSTRAINT `FKqxwrsixeyqysopg4s1ttvhgwr` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKr4atodvist11qiy1u8yjvs16s` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_mes_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_mes_venda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `inflacao` decimal(19,2) DEFAULT NULL,
  `mes_ano` datetime NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `meta_esperada` decimal(19,2) DEFAULT NULL,
  `meta_minima` decimal(19,2) DEFAULT NULL,
  `qtde_dias_uteis_comerciais` int(11) DEFAULT NULL,
  `qtde_vendedores` int(11) DEFAULT NULL,
  `total_vendido_historico` decimal(19,2) DEFAULT NULL,
  `total_vendido_global` decimal(19,2) DEFAULT NULL,
  `total_vendido_vendedores` decimal(19,2) DEFAULT NULL,
  `qtde_vendas` int(11) DEFAULT NULL,
  `media_diaria` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_historico` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_meta_esperada` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_meta_minima` decimal(19,2) DEFAULT NULL,
  `meta_esperada_vendedor` decimal(19,2) DEFAULT NULL,
  `meta_minima_vendedor` decimal(19,2) DEFAULT NULL,
  `qtde_dias_uteis_ate_hoje` int(11) DEFAULT NULL,
  `qtde_dias_uteis_restantes` int(11) DEFAULT NULL,
  `valor_venda_medio` decimal(19,2) DEFAULT NULL,
  `eh_mes_atual` bit(1) DEFAULT NULL,
  `meta_esperada_vendedores` decimal(19,2) DEFAULT NULL,
  `meta_minima_vendedores` decimal(19,2) DEFAULT NULL,
  `total_vendido_historico_vendedores` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_historico_externos` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_historico_vendedores` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_meta_esperada_externos` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_meta_esperada_vendedores` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_meta_minima_externos` decimal(19,2) DEFAULT NULL,
  `media_diaria_atingir_meta_minima_vendedores` decimal(19,2) DEFAULT NULL,
  `meta_esperada_externos` decimal(19,2) DEFAULT NULL,
  `meta_minima_externa` decimal(19,2) DEFAULT NULL,
  `total_vendido_historico_externos` decimal(19,2) DEFAULT NULL,
  `total_vendido_externos` decimal(19,2) DEFAULT NULL,
  `total_vendido_historico_vendedores_ate_ontem` decimal(19,2) DEFAULT NULL,
  `total_vendido_vendedores_ate_ontem` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKbn5o1f2qqte27yp0jk3pb5emg` (`mes_ano`),
  KEY `FKeqat9dpphvcad44ohgf273xfb` (`estabelecimento_id`),
  KEY `FKnvxm28i2gfvatnrj91u42u1l8` (`user_inserted_id`),
  KEY `FK8lnraf26w3d55f0xvelukvj5y` (`user_updated_id`),
  CONSTRAINT `FK8lnraf26w3d55f0xvelukvj5y` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKeqat9dpphvcad44ohgf273xfb` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKnvxm28i2gfvatnrj91u42u1l8` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_mes_venda_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_mes_venda_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `qtde_vendas` int(11) NOT NULL,
  `total_vendido` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `mes_venda_id` bigint(20) NOT NULL,
  `vendedor_id` bigint(20) NOT NULL,
  `considera_mes` bit(1) NOT NULL,
  `posicao` int(11) DEFAULT NULL,
  `media_posicoes_6meses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKsqei3xusq6sf5rdkm3yuht31y` (`mes_venda_id`,`vendedor_id`),
  KEY `FKcxbe81xpjrg8ss925c4dy2sh3` (`estabelecimento_id`),
  KEY `FKekrbhc3k6buxhlxji53kfx7fs` (`user_inserted_id`),
  KEY `FK8lfx1h1h7kkyvkho14afy65tm` (`user_updated_id`),
  KEY `FK2fqhkmm2d8nlpfkfge0iefvo1` (`vendedor_id`),
  CONSTRAINT `FK2fqhkmm2d8nlpfkfge0iefvo1` FOREIGN KEY (`vendedor_id`) REFERENCES `rh_funcionario` (`id`),
  CONSTRAINT `FK8lfx1h1h7kkyvkho14afy65tm` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKcxbe81xpjrg8ss925c4dy2sh3` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKekrbhc3k6buxhlxji53kfx7fs` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKrakmnt4j34xohh2wkw0xbf5qg` FOREIGN KEY (`mes_venda_id`) REFERENCES `ven_mes_venda` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138265 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_plano_pagto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_plano_pagto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKjcdhsipga49hldp97c5tmacr9` (`estabelecimento_id`),
  KEY `FKsylord89009b0mnv5srkeg5l3` (`user_inserted_id`),
  KEY `FKsyounqs470wq7066tu62maas9` (`user_updated_id`),
  CONSTRAINT `FKjcdhsipga49hldp97c5tmacr9` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKsylord89009b0mnv5srkeg5l3` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKsyounqs470wq7066tu62maas9` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_tipo_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_tipo_venda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKl3h26w7675a5yvgd94q70oj2j` (`descricao`),
  KEY `FKjjlkbah8gn0jc9y65jxkovex4` (`estabelecimento_id`),
  KEY `FK9gr4llbc1rqqhcykglkulnd3l` (`user_inserted_id`),
  KEY `FKd7c55bsvlf0in1jnf14tu6i6g` (`user_updated_id`),
  CONSTRAINT `FK9gr4llbc1rqqhcykglkulnd3l` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKd7c55bsvlf0in1jnf14tu6i6g` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKjjlkbah8gn0jc9y65jxkovex4` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_venda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `desconto_especial` decimal(19,2) NOT NULL,
  `desconto_plano` decimal(19,2) NOT NULL,
  `dt_venda` datetime NOT NULL,
  `historicoDesconto` varchar(2000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `mesano` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `pv` int(11) DEFAULT NULL,
  `sub_total` decimal(19,2) NOT NULL,
  `valor_total` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `plano_pagto_id` bigint(20) NOT NULL,
  `vendedor_id` bigint(20) NOT NULL,
  `deletado` bit(1) DEFAULT NULL,
  `tipo_venda_id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `obs` varchar(3000) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK8gcoc26qm23vp0yb18v856ih3` (`pv`,`mesano`),
  KEY `FKtgctv2586isnj8xhi05crofmd` (`estabelecimento_id`),
  KEY `FKibdyu2lmh8wgb2x9feurmmvv` (`user_inserted_id`),
  KEY `FKkwrkbmkmx4b8so01sn8dk070q` (`user_updated_id`),
  KEY `FKdq9buixvk6q3s1e1wuok0lffj` (`plano_pagto_id`),
  KEY `FKbpjohll0xgato7q7987awgyje` (`vendedor_id`),
  KEY `FKceh7ph8twc2h9htdcx46pkg7a` (`tipo_venda_id`),
  KEY `FKmrhaupyb6ut6w1uvaykjpdcnl` (`cliente_id`),
  KEY `idx_mesano` (`mesano`),
  CONSTRAINT `FKbpjohll0xgato7q7987awgyje` FOREIGN KEY (`vendedor_id`) REFERENCES `rh_funcionario` (`id`),
  CONSTRAINT `FKceh7ph8twc2h9htdcx46pkg7a` FOREIGN KEY (`tipo_venda_id`) REFERENCES `ven_tipo_venda` (`id`),
  CONSTRAINT `FKdq9buixvk6q3s1e1wuok0lffj` FOREIGN KEY (`plano_pagto_id`) REFERENCES `ven_plano_pagto` (`id`),
  CONSTRAINT `FKibdyu2lmh8wgb2x9feurmmvv` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKkwrkbmkmx4b8so01sn8dk070q` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKmrhaupyb6ut6w1uvaykjpdcnl` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),
  CONSTRAINT `FKtgctv2586isnj8xhi05crofmd` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244868 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_venda_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_venda_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `version` int(11) DEFAULT '0',
  `alteracao_preco` bit(1) NOT NULL,
  `obs` varchar(5000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `preco_venda` decimal(19,2) NOT NULL,
  `qtde` decimal(19,2) NOT NULL,
  `estabelecimento_id` bigint(20) NOT NULL,
  `user_inserted_id` bigint(20) NOT NULL,
  `user_updated_id` bigint(20) NOT NULL,
  `grade_tamanho_id` bigint(20) NOT NULL,
  `venda_id` bigint(20) NOT NULL,
  `nc_descricao` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `produto_id` bigint(20) DEFAULT NULL,
  `nc_reduzido` bigint(20) DEFAULT NULL,
  `nc_grade_tamanho` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ncm` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `ncm_existente` bit(1) DEFAULT NULL,
  `dt_custo` datetime DEFAULT NULL,
  `preco_custo` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKkgahhunuauqlc2vk0a9fgumtf` (`estabelecimento_id`),
  KEY `FKpbwc0qvdjrkrell3op2283von` (`user_inserted_id`),
  KEY `FK12h3woujga6rcrvm27yq6mdlr` (`user_updated_id`),
  KEY `FKif7eqr4xhsju31p98kgg922kc` (`grade_tamanho_id`),
  KEY `FK4hgcs5je14k5tco03qlcox5ka` (`produto_id`),
  KEY `FKq6rs80vbr234o0106bjwp4b71` (`venda_id`),
  CONSTRAINT `FK12h3woujga6rcrvm27yq6mdlr` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK4hgcs5je14k5tco03qlcox5ka` FOREIGN KEY (`produto_id`) REFERENCES `est_produto` (`id`),
  CONSTRAINT `FKif7eqr4xhsju31p98kgg922kc` FOREIGN KEY (`grade_tamanho_id`) REFERENCES `est_grade_tamanho` (`id`),
  CONSTRAINT `FKkgahhunuauqlc2vk0a9fgumtf` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FKpbwc0qvdjrkrell3op2283von` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FKq6rs80vbr234o0106bjwp4b71` FOREIGN KEY (`venda_id`) REFERENCES `ven_venda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28677876 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ven_venda_pvs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_venda_pvs` (
  `mesano` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `pv` int(11) NOT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`mesano`),
  UNIQUE KEY `mesano` (`mesano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vw_bon_pessoa_enderecos`;
/*!50001 DROP VIEW IF EXISTS `vw_bon_pessoa_enderecos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_bon_pessoa_enderecos` AS SELECT 
 1 AS `id`,
 1 AS `inserted`,
 1 AS `updated`,
 1 AS `version`,
 1 AS `bairro`,
 1 AS `cep`,
 1 AS `cidade`,
 1 AS `complemento`,
 1 AS `estado`,
 1 AS `logradouro`,
 1 AS `numero`,
 1 AS `tipoEndereco`,
 1 AS `estabelecimento_id`,
 1 AS `user_inserted_id`,
 1 AS `user_updated_id`,
 1 AS `fornecedor_id`,
 1 AS `fornecedor_pessoa_id`,
 1 AS `cliente_id`,
 1 AS `cliente_pessoa_id`,
 1 AS `funcionario_id`,
 1 AS `funcionario_pessoa_id`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_crm_cliente`;
/*!50001 DROP VIEW IF EXISTS `vw_crm_cliente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_crm_cliente` AS SELECT 
 1 AS `id`,
 1 AS `codigo`,
 1 AS `documento`,
 1 AS `nome`,
 1 AS `nome_fantasia`,
 1 AS `logradouro`,
 1 AS `numero`,
 1 AS `bairro`,
 1 AS `cidade`,
 1 AS `estado`,
 1 AS `cep`,
 1 AS `fone1`,
 1 AS `fone2`,
 1 AS `fone3`,
 1 AS `fone4`,
 1 AS `pessoa_id`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_est_fornecedor`;
/*!50001 DROP VIEW IF EXISTS `vw_est_fornecedor`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_est_fornecedor` AS SELECT 
 1 AS `id`,
 1 AS `codigo`,
 1 AS `tipo`,
 1 AS `pessoa_id`,
 1 AS `documento`,
 1 AS `razao_social`,
 1 AS `nome_fantasia`,
 1 AS `codigo_ekt`,
 1 AS `desde`,
 1 AS `ate`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_est_produto`;
/*!50001 DROP VIEW IF EXISTS `vw_est_produto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_est_produto` AS SELECT 
 1 AS `id`,
 1 AS `descricao`,
 1 AS `dt_ult_venda`,
 1 AS `reduzido`,
 1 AS `reduzido_ekt`,
 1 AS `reduzido_ekt_desde`,
 1 AS `reduzido_ekt_ate`,
 1 AS `preco_custo`,
 1 AS `preco_prazo`,
 1 AS `preco_vista`,
 1 AS `preco_promo`,
 1 AS `dt_custo`,
 1 AS `fornecedor_id`,
 1 AS `fornecedor_codigo`,
 1 AS `fornecedor`,
 1 AS `depto_id`,
 1 AS `depto_codigo`,
 1 AS `depto`,
 1 AS `subdepto_id`,
 1 AS `subdepto_codigo`,
 1 AS `subdepto`,
 1 AS `qtde`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_fin_ddpcg`;
/*!50001 DROP VIEW IF EXISTS `vw_fin_ddpcg`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_fin_ddpcg` AS SELECT 
 1 AS `id`,
 1 AS `descricao`,
 1 AS `descricao_m`,
 1 AS `dt_vencto`,
 1 AS `status`,
 1 AS `valor_total`,
 1 AS `cart_descricao`,
 1 AS `categ_descricao`,
 1 AS `banco`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_fin_movimentacao`;
/*!50001 DROP VIEW IF EXISTS `vw_fin_movimentacao`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_fin_movimentacao` AS SELECT 
 1 AS `id`,
 1 AS `descricao`,
 1 AS `descricao_m`,
 1 AS `dt_moviment`,
 1 AS `dt_util`,
 1 AS `dt_vencto`,
 1 AS `dt_vencto_efetiva`,
 1 AS `dt_pagto`,
 1 AS `mes_ano`,
 1 AS `status`,
 1 AS `valor`,
 1 AS `valor_total`,
 1 AS `modo_id`,
 1 AS `modo_descricao`,
 1 AS `cart_id`,
 1 AS `cart_codigo`,
 1 AS `cart_descricao`,
 1 AS `categ_id`,
 1 AS `categ_codigo`,
 1 AS `categ_descricao`,
 1 AS `cart_cartoes`,
 1 AS `obs`,
 1 AS `parcelamento_id`,
 1 AS `doc_banco`,
 1 AS `nome_fantasia`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_rh_funcionario`;
/*!50001 DROP VIEW IF EXISTS `vw_rh_funcionario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_rh_funcionario` AS SELECT 
 1 AS `id`,
 1 AS `codigo`,
 1 AS `pessoa_id`,
 1 AS `nome`,
 1 AS `documento`,
 1 AS `nome_ekt`,
 1 AS `clt`,
 1 AS `vendedor_comissionado`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_ven_venda`;
/*!50001 DROP VIEW IF EXISTS `vw_ven_venda`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_ven_venda` AS SELECT 
 1 AS `id`,
 1 AS `dt_venda`,
 1 AS `pv`,
 1 AS `plano_pagto_codigo`,
 1 AS `plano_pagto_descricao`,
 1 AS `mesano`,
 1 AS `status`,
 1 AS `sub_total`,
 1 AS `desconto_especial`,
 1 AS `desconto_plano`,
 1 AS `valor_total`,
 1 AS `codigo`,
 1 AS `nome_ekt`,
 1 AS `deletado`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_vendedores`;
/*!50001 DROP VIEW IF EXISTS `vw_vendedores`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_vendedores` AS SELECT 
 1 AS `pessoa_id`,
 1 AS `funcionario_id`,
 1 AS `codigo`,
 1 AS `nome_ekt`,
 1 AS `nome`,
 1 AS `updated`*/;
SET character_set_client = @saved_cs_client;
/*!50001 DROP VIEW IF EXISTS `vw_bon_pessoa_enderecos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_bon_pessoa_enderecos` AS select `e`.`id` AS `id`,`e`.`inserted` AS `inserted`,`e`.`updated` AS `updated`,`e`.`version` AS `version`,`e`.`bairro` AS `bairro`,`e`.`cep` AS `cep`,`e`.`cidade` AS `cidade`,`e`.`complemento` AS `complemento`,`e`.`estado` AS `estado`,`e`.`logradouro` AS `logradouro`,`e`.`numero` AS `numero`,`e`.`tipoEndereco` AS `tipoEndereco`,`e`.`estabelecimento_id` AS `estabelecimento_id`,`e`.`user_inserted_id` AS `user_inserted_id`,`e`.`user_updated_id` AS `user_updated_id`,`f`.`id` AS `fornecedor_id`,`f`.`pessoa_id` AS `fornecedor_pessoa_id`,`c`.`id` AS `cliente_id`,`c`.`pessoa_id` AS `cliente_pessoa_id`,`fu`.`id` AS `funcionario_id`,`fu`.`pessoa_id` AS `funcionario_pessoa_id` from (((`bon_endereco` `e` left join (`est_fornecedor_enderecos` `fe` join `est_fornecedor` `f` on((`fe`.`est_fornecedor_id` = `f`.`id`))) on((`fe`.`bon_endereco_id` = `e`.`id`))) left join (`crm_cliente_enderecos` `ce` join `crm_cliente` `c` on((`ce`.`crm_cliente_id` = `c`.`id`))) on((`ce`.`bon_endereco_id` = `e`.`id`))) left join (`rh_funcionario_enderecos` `fue` join `rh_funcionario` `fu` on((`fue`.`rh_funcionario_id` = `fu`.`id`))) on((`fue`.`bon_endereco_id` = `e`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_crm_cliente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_crm_cliente` AS select `c`.`id` AS `id`,`c`.`codigo` AS `codigo`,`p`.`documento` AS `documento`,`p`.`nome` AS `nome`,`p`.`nome_fantasia` AS `nome_fantasia`,`e`.`logradouro` AS `logradouro`,`e`.`numero` AS `numero`,`e`.`bairro` AS `bairro`,`e`.`cidade` AS `cidade`,`e`.`estado` AS `estado`,`e`.`cep` AS `cep`,`c`.`fone1` AS `fone1`,`c`.`fone2` AS `fone2`,`c`.`fone3` AS `fone3`,`c`.`fone4` AS `fone4`,`c`.`pessoa_id` AS `pessoa_id` from (((`crm_cliente` `c` join `bon_pessoa` `p` on((`c`.`pessoa_id` = `p`.`id`))) left join `crm_cliente_enderecos` `ce` on((`ce`.`crm_cliente_id` = `c`.`id`))) left join `bon_endereco` `e` on((`e`.`id` = `ce`.`bon_endereco_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_est_fornecedor`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_est_fornecedor` AS select `f`.`id` AS `id`,`f`.`codigo` AS `codigo`,`t`.`descricao` AS `tipo`,`p`.`id` AS `pessoa_id`,`p`.`documento` AS `documento`,`p`.`nome` AS `razao_social`,`p`.`nome_fantasia` AS `nome_fantasia`,`f`.`codigo_ekt` AS `codigo_ekt`,`f`.`codigo_ekt_desde` AS `desde`,`f`.`codigo_ekt_ate` AS `ate` from ((`est_fornecedor` `f` join `est_fornecedor_tipo` `t` on((`f`.`fornecedor_tipo_id` = `t`.`id`))) join `bon_pessoa` `p` on((`f`.`pessoa_id` = `p`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_est_produto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_est_produto` AS select `p`.`id` AS `id`,`p`.`descricao` AS `descricao`,`p`.`dt_ult_venda` AS `dt_ult_venda`,`p`.`reduzido` AS `reduzido`,`p`.`reduzido_ekt` AS `reduzido_ekt`,`p`.`reduzido_ekt_desde` AS `reduzido_ekt_desde`,`p`.`reduzido_ekt_ate` AS `reduzido_ekt_ate`,`preco`.`preco_custo` AS `preco_custo`,`preco`.`preco_prazo` AS `preco_prazo`,`preco`.`preco_vista` AS `preco_vista`,`preco`.`preco_promo` AS `preco_promo`,`preco`.`dt_custo` AS `dt_custo`,`p`.`fornecedor_id` AS `fornecedor_id`,`f`.`codigo` AS `fornecedor_codigo`,`f`.`nome_fantasia` AS `fornecedor`,`d`.`id` AS `depto_id`,`d`.`codigo` AS `depto_codigo`,`d`.`nome` AS `depto`,`p`.`subdepto_id` AS `subdepto_id`,`sd`.`codigo` AS `subdepto_codigo`,`sd`.`nome` AS `subdepto`,sum(`saldo`.`qtde`) AS `qtde` from (((((`est_produto` `p` left join `est_produto_preco` `preco` on((`p`.`id` = `preco`.`produto_id`))) left join `vw_est_fornecedor` `f` on((`p`.`fornecedor_id` = `f`.`id`))) left join `est_subdepto` `sd` on((`p`.`subdepto_id` = `sd`.`id`))) left join `est_depto` `d` on((`sd`.`depto_id` = `d`.`id`))) left join `est_produto_saldo` `saldo` on((`saldo`.`produto_id` = `p`.`id`))) where (`preco`.`id` = (select `_`.`id` from `est_produto_preco` `_` where (`_`.`produto_id` = `p`.`id`) order by `_`.`dt_custo` desc limit 1)) group by `p`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_fin_ddpcg`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_fin_ddpcg` AS select `m`.`id` AS `id`,`m`.`descricao` AS `descricao`,convert(concat(`m`.`descricao`,convert(if((`m`.`num_parcela` is not null),concat(' (',if((`m`.`num_parcela` is not null),`m`.`num_parcela`,0),'/',if((`m`.`qtde_parcelas` is not null),`m`.`qtde_parcelas`,0),')'),'') using utf8)) using utf8) AS `descricao_m`,`m`.`dt_vencto` AS `dt_vencto`,`m`.`status` AS `status`,abs(`m`.`valor_total`) AS `valor_total`,`cart`.`descricao` AS `cart_descricao`,`categ`.`descricao` AS `categ_descricao`,`banco`.`nome` AS `banco` from (((`fin_movimentacao` `m` join `fin_carteira` `cart`) join `fin_categoria` `categ`) join `fin_banco` `banco`) where ((`m`.`carteira_id` = `cart`.`id`) and (`m`.`categoria_id` = `categ`.`id`) and (`m`.`documento_banco_id` = `banco`.`id`) and (`m`.`obs` like '%DDPCG%')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_fin_movimentacao`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_rh_funcionario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_rh_funcionario` AS select `rh_funcionario`.`id` AS `id`,`rh_funcionario`.`codigo` AS `codigo`,`rh_funcionario`.`pessoa_id` AS `pessoa_id`,`bon_pessoa`.`nome` AS `nome`,`bon_pessoa`.`documento` AS `documento`,`rh_funcionario`.`nome_ekt` AS `nome_ekt`,`rh_funcionario`.`clt` AS `clt`,`rh_funcionario`.`vendedor_comissionado` AS `vendedor_comissionado` from (`rh_funcionario` join `bon_pessoa` on((`rh_funcionario`.`pessoa_id` = `bon_pessoa`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_ven_venda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_ven_venda` AS select `v`.`id` AS `id`,`v`.`dt_venda` AS `dt_venda`,`v`.`pv` AS `pv`,`pp`.`codigo` AS `plano_pagto_codigo`,`pp`.`descricao` AS `plano_pagto_descricao`,`v`.`mesano` AS `mesano`,`v`.`status` AS `status`,`v`.`sub_total` AS `sub_total`,`v`.`desconto_especial` AS `desconto_especial`,`v`.`desconto_plano` AS `desconto_plano`,`v`.`valor_total` AS `valor_total`,`f`.`codigo` AS `codigo`,`f`.`nome_ekt` AS `nome_ekt`,if(`v`.`deletado`,'S','N') AS `deletado` from ((`ven_venda` `v` join `vw_rh_funcionario` `f`) join `ven_plano_pagto` `pp`) where ((`v`.`vendedor_id` = `f`.`id`) and (`v`.`plano_pagto_id` = `pp`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_vendedores`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `vw_vendedores` AS select `p`.`id` AS `pessoa_id`,`f`.`id` AS `funcionario_id`,`f`.`codigo` AS `codigo`,`f`.`nome_ekt` AS `nome_ekt`,`p`.`nome` AS `nome`,`f`.`updated` AS `updated` from ((`rh_funcionario` `f` left join `rh_funcionario_cargo` `cargo` on(((`f`.`id` = `cargo`.`funcionario_id`) and isnull(`cargo`.`dt_fim`)))) join `bon_pessoa` `p` on((`f`.`pessoa_id` = `p`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

