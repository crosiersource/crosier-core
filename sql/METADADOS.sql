SET FOREIGN_KEY_CHECKS = 0;



DROP TABLE IF EXISTS `rememberme_token`;
CREATE TABLE `rememberme_token`
(
  `series`   char(88) UNIQUE PRIMARY KEY NOT NULL,
  `value`    varchar(88)                 NOT NULL,
  `lastUsed` datetime                    NOT NULL,
  `class`    varchar(100)                NOT NULL,
  `username` varchar(200)                NOT NULL
) ENGINE = InnoDB;


DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages`
(
  `id`           bigint(20)   NOT NULL AUTO_INCREMENT,
  `body`         longtext     NOT NULL,
  `headers`      longtext     NOT NULL,
  `queue_name`   varchar(255) NOT NULL,
  `created_at`   datetime     NOT NULL,
  `available_at` datetime     NOT NULL,
  `delivered_at` datetime,
  PRIMARY KEY (`id`),
  KEY `messenger_messages_queue_name` (`queue_name`),
  KEY `messenger_messages_available_at` (`available_at`),
  KEY `messenger_messages_delivered_at` (`delivered_at`)
) ENGINE = InnoDB;


DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions`
(
  `sess_id`       VARBINARY(128)   NOT NULL PRIMARY KEY,
  `sess_data`     BLOB             NOT NULL,
  `sess_lifetime` INTEGER UNSIGNED NOT NULL,
  `sess_time`     INTEGER UNSIGNED NOT NULL
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_estabelecimento`;

CREATE TABLE `cfg_estabelecimento`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `codigo`             bigint(20)                NOT NULL,
  `descricao`          varchar(200)              NOT NULL,
  `concreto`           tinyint(1)                NOT NULL,
  `pai_id`             bigint(20), -- não é usado,
  `json_data`          json default null,

  `updated`            datetime,
  `inserted`           datetime,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20),
  `user_updated_id`    bigint(20),

  PRIMARY KEY (`id`),

  UNIQUE KEY `UK_cfg_estabelecimento_codigo` (`codigo`),
  UNIQUE KEY `UK_cfg_estabelecimento_descricao` (`descricao`),

  KEY `K_cfg_estabelecimento_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_estabelecimento_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_estabelecimento_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_estabelecimento_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_estabelecimento_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_estabelecimento_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `sec_group`;

CREATE TABLE `sec_group`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `groupname`          varchar(90)               NOT NULL,

  `estabelecimento_id` bigint(20)                NOT NULL,
  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_sec_group_groupname` (`groupname`),
  KEY `K_sec_group_estabelecimento` (`estabelecimento_id`),
  KEY `K_sec_group_user_inserted` (`user_inserted_id`),
  KEY `K_sec_group_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_sec_group_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_sec_group_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_group_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `sec_role`;

CREATE TABLE `sec_role`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `role`               varchar(90)               NOT NULL,
  `descricao`          varchar(90)               NOT NULL,

  `estabelecimento_id` bigint(20)                NOT NULL,
  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_sec_role_role` (`role`),
  KEY `K_sec_role_estabelecimento` (`estabelecimento_id`),
  KEY `K_sec_role_user_inserted` (`user_inserted_id`),
  KEY `K_sec_role_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_sec_role_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_role_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_role_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE = InnoDB;


DROP TABLE IF EXISTS `sec_group_role`;

CREATE TABLE `sec_group_role`
(
  `group_id` bigint(20) NOT NULL,
  `role_id`  bigint(20) NOT NULL,
  KEY `K_sec_group_role_role` (`role_id`),
  KEY `K_sec_group_role_group` (`group_id`),
  CONSTRAINT `FK_sec_group_role_role` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sec_group_role_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `sec_user`;

CREATE TABLE `sec_user`
(
  `id`                        bigint(20) AUTO_INCREMENT NOT NULL,
  `username`                  varchar(90)               NOT NULL,
  `nome`                      varchar(90)               NOT NULL,
  `email`                     varchar(90)               NOT NULL,
  `fone`                      varchar(50) default null,
  `token_recupsenha`          char(36)    default null,
  `dt_valid_token_recupsenha` datetime    default null,
  `password`                  varchar(255),
  `ativo`                     tinyint(1)                NOT NULL,
  `group_id`                  bigint(20),
  `api_token`                 varchar(255),
  `api_token_expires_at`      datetime,
  `session_id`                varchar(200),

  `estabelecimento_id`        bigint(20)                NOT NULL,
  `inserted`                  datetime                  NOT NULL,
  `updated`                   datetime                  NOT NULL,
  `user_inserted_id`          bigint(20)                NOT NULL,
  `user_updated_id`           bigint(20)                NOT NULL,
  `version`                   int(11),

  PRIMARY KEY (`id`),
  
  UNIQUE KEY `UK_sec_user_username_estabelecimento` (`username`, `estabelecimento_id`) USING BTREE,


  KEY `K_sec_user_estabelecimento` (`estabelecimento_id`),
  KEY `K_sec_user_user_inserted` (`user_inserted_id`),
  KEY `K_sec_user_user_updated` (`user_updated_id`),
  KEY `K_sec_user_group` (`group_id`),
  CONSTRAINT `FK_sec_user_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_sec_user_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_user_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_sec_user_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `sec_user_role`;

CREATE TABLE `sec_user_role`
(
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `updated` date,
  KEY `K_sec_user_role_role` (`role_id`),
  KEY `K_sec_user_role_user` (`user_id`),
  CONSTRAINT `FK_sec_user_role_role` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sec_user_role_user` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_app`;

CREATE TABLE `cfg_app`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid`               char(36)                  NOT NULL,
  `nome`               varchar(300)              NOT NULL,
  `obs`                varchar(5000),

  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg_app_nome` (`nome`),
  UNIQUE KEY `cfg_app_uuid` (`uuid`),
  KEY `K_cfg_app_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_app_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_app_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_app_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_app_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_app_config`;

CREATE TABLE `cfg_app_config`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `chave`              varchar(255)              NOT NULL,
  `valor`              LONGTEXT,
  `is_json`            tinyint(1),
  `app_uuid`           char(36)                  NOT NULL,
  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_app_config_chave_app` (`chave`, `app_uuid`),
  KEY `K_cfg_app_config_app` (`app_uuid`),
  CONSTRAINT `FK_cfg_app_config_app` FOREIGN KEY (`app_uuid`) REFERENCES `cfg_app` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE,

  KEY `K_cfg_app_config_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_app_config_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_app_config_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_app_config_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_app_config_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_app_config_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_entmenu`;

CREATE TABLE `cfg_entmenu`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `uuid`               char(36)                  NOT NULL,
  `app_uuid`           char(36)                  NOT NULL,
  `label`              varchar(255)              NOT NULL,
  `icon`               varchar(50),
  `tipo`               varchar(50)               NOT NULL,
  `pai_uuid`           char(36),
  `ordem`              int(11)                   NOT NULL,
  `css_style`          varchar(2000),
  `url`                varchar(2000),
  `roles`              varchar(2000),

  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,

  UNIQUE KEY `UK_cfg_entmenu_uuid` (`uuid`),

  KEY `K_cfg_entmenu_pai` (`pai_uuid`),
  CONSTRAINT `FK_cfg_entmenu_pai` FOREIGN KEY (`pai_uuid`) REFERENCES `cfg_entmenu` (`uuid`) ON UPDATE CASCADE ON DELETE CASCADE,

  KEY `K_cfg_entmenu_app` (`app_uuid`),
  CONSTRAINT `FK_cfg_entmenu_app` FOREIGN KEY (`app_uuid`) REFERENCES `cfg_app` (`uuid`),

  PRIMARY KEY (`id`),

  KEY `K_cfg_entmenu_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_entmenu_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_entmenu_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_entmenu_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_entmenu_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_entmenu_locator`;

CREATE TABLE `cfg_entmenu_locator`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,

  `menu_uuid`          char(36)                  NOT NULL,
  `url_regexp`         varchar(300)              NOT NULL,
  `quem`               varchar(300)              NOT NULL,
  `nao_contendo`       varchar(3000),

  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,

  KEY `K_cfg_entmenu_locator_menu` (`menu_uuid`),
  CONSTRAINT `FK_cfg_entmenu_locator_menu` FOREIGN KEY (`menu_uuid`) REFERENCES `cfg_entmenu` (`uuid`),

  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_entmenu_locator` (`menu_uuid`, `url_regexp`, `quem`),

  KEY `K_cfg_entmenu_locator_estabelecimento` (`estabelecimento_id`),
  KEY `K_cfg_entmenu_locator_user_inserted` (`user_inserted_id`),
  KEY `K_cfg_entmenu_locator_user_updated` (`user_updated_id`),


  CONSTRAINT `FK_cfg_entmenu_locator_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  CONSTRAINT `FK_cfg_entmenu_locator_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_cfg_entmenu_locator_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_stored_viewinfo`;

CREATE TABLE `cfg_stored_viewinfo`
(
  `id`                 bigint(20)     NOT NULL AUTO_INCREMENT,
  `view_name`          varchar(300)   NOT NULL,
  `view_info`          varchar(15000) NOT NULL,
  `user_id`            bigint(20)     NOT NULL,

  `estabelecimento_id` bigint(20)     NOT NULL,
  `inserted`           datetime       NOT NULL,
  `updated`            datetime       NOT NULL,
  `user_inserted_id`   bigint(20)     NOT NULL,
  `user_updated_id`    bigint(20)     NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cfg_stored_viewinfo` (`user_id`, `view_name`),
  CONSTRAINT `FK_cfg_stored_viewinfo_user` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),

  KEY `K_cfg_stored_viewinfo_estabelecimento` (`estabelecimento_id`),
  CONSTRAINT `K_cfg_stored_viewinfo_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  KEY `K_cfg_stored_viewinfo_user_inserted` (`user_inserted_id`),
  CONSTRAINT `FK_cfg_stored_viewinfo_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  KEY `K_cfg_stored_viewinfo_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_stored_viewinfo_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_pushmessage`;

CREATE TABLE `cfg_pushmessage`
(
  `id`                   bigint(20) AUTO_INCREMENT NOT NULL,
  `mensagem`             varchar(200)              NOT NULL,
  `url`                  varchar(2000),
  `user_destinatario_id` bigint(20),
  `dt_envio`             datetime                  NOT NULL,
  `dt_notif`             datetime,
  `dt_abert`             datetime,
  `dt_validade`          datetime,

  `params`               varchar(5000),

  `inserted`             datetime                  NOT NULL,
  `updated`              datetime                  NOT NULL,
  `estabelecimento_id`   bigint(20)                NOT NULL,
  `user_inserted_id`     bigint(20)                NOT NULL,
  `user_updated_id`      bigint(20)                NOT NULL,

  PRIMARY KEY (`id`),
  KEY `K_cfg_pushmessage_user_destinatario` (`user_destinatario_id`),
  CONSTRAINT `FK_cfg_pushmessage_user_destinatario` FOREIGN KEY (`user_destinatario_id`) REFERENCES `sec_user` (`id`),

  KEY `K_cfg_pushmessage_estabelecimento` (`estabelecimento_id`),
  CONSTRAINT `K_cfg_pushmessage_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
  KEY `K_cfg_pushmessage_user_inserted` (`user_inserted_id`),
  CONSTRAINT `FK_cfg_pushmessage_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  KEY `K_cfg_pushmessage_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_cfg_pushmessage_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)

) ENGINE = InnoDB;



DROP TABLE IF EXISTS `bse_municipio`;
CREATE TABLE `bse_municipio`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `municipio_codigo`   int(11)                   NOT NULL,
  `municipio_nome`     varchar(200),
  `uf_nome`            varchar(200),
  `uf_sigla`           varchar(2),

  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  `version`            int(11),
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_municipio` (`uf_sigla`, `municipio_nome`),
  KEY `K_bse_municipio_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_municipio_user_inserted` (`user_inserted_id`),
  KEY `K_bse_municipio_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_municipio_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_municipio_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_municipio_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `bse_uf`;
CREATE TABLE `bse_uf`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `sigla`              char(2)                   NOT NULL,
  `nome`               varchar(50)               NOT NULL,
  `codigo_IBGE`        int(11)                   NOT NULL,

  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  `version`            int(11),
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
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `bse_diautil`;
CREATE TABLE `bse_diautil`
(
  `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
  `dia`                datetime                  NOT NULL,
  `descricao`          varchar(40),
  `comercial`          tinyint(1)                NOT NULL,
  `financeiro`         tinyint(1)                NOT NULL,
  `municipio_id`       bigint(20),

  `inserted`           datetime                  NOT NULL,
  `updated`            datetime                  NOT NULL,
  `estabelecimento_id` bigint(20)                NOT NULL,
  `user_inserted_id`   bigint(20)                NOT NULL,
  `user_updated_id`    bigint(20)                NOT NULL,
  `version`            int(11),
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_bse_dia_util` (`dia`, `municipio_id`),
  KEY `K_bse_dia_util_estabelecimento` (`estabelecimento_id`),
  KEY `K_bse_dia_util_user_inserted` (`user_inserted_id`),
  KEY `K_bse_dia_util_user_updated` (`user_updated_id`),
  CONSTRAINT `FK_bse_dia_util_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_dia_util_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
  CONSTRAINT `FK_bse_dia_util_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE = InnoDB;


# ALTER TABLE cfg_pushmessage ADD `dt_validade` datetime AFTER dt_abert;

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions`
(
  `version`        varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at`    datetime DEFAULT NULL,
  `execution_time` int      DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3
  COLLATE = utf8mb3_unicode_ci;