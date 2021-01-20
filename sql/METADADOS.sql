SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `cfg_estabelecimento`;

CREATE TABLE `cfg_estabelecimento`
(
    `id`               bigint(20) AUTO_INCREMENT NOT NULL,
    `codigo`           bigint(20)                NOT NULL,
    `descricao`        varchar(200)              NOT NULL,
    `concreto`         tinyint(1)                NOT NULL,
    `pai_id`           bigint(20) DEFAULT NULL,

    `updated`          datetime   DEFAULT NULL,
    `inserted`         datetime   DEFAULT NULL,
    `user_inserted_id` bigint(20) DEFAULT NULL,
    `user_updated_id`  bigint(20) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UK_cfg_estabelecimento_codigo` (`codigo`),
    KEY `K_cfg_estabelecimento_pai` (`pai_id`),
    CONSTRAINT `FK_cfg_estabelecimento_pai` FOREIGN KEY (`pai_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



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
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



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
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;


DROP TABLE IF EXISTS `sec_group_role`;

CREATE TABLE `sec_group_role`
(
    `group_id` bigint(20) NOT NULL,
    `role_id`  bigint(20) NOT NULL,
    KEY `K_sec_group_role_role` (`role_id`),
    KEY `K_sec_group_role_group` (`group_id`),
    CONSTRAINT `FK_sec_group_role_role` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`),
    CONSTRAINT `FK_sec_group_role_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `sec_user`;

CREATE TABLE `sec_user`
(
    `id`                   bigint(20) AUTO_INCREMENT NOT NULL,
    `username`             varchar(90)               NOT NULL,
    `nome`                 varchar(90)               NOT NULL,
    `email`                varchar(90)               NOT NULL,
    `password`             varchar(255) DEFAULT NULL,
    `senha`                varchar(255) DEFAULT NULL,
    `ativo`                tinyint(1)                NOT NULL,
    `group_id`             bigint(20)   DEFAULT NULL,
    `api_token`            varchar(255) DEFAULT NULL,
    `api_token_expires_at` datetime     DEFAULT NULL,
    `session_id`           varchar(200) DEFAULT NULL,

    `estabelecimento_id`   bigint(20)                NOT NULL,
    `inserted`             datetime                  NOT NULL,
    `updated`              datetime                  NOT NULL,
    `user_inserted_id`     bigint(20)                NOT NULL,
    `user_updated_id`      bigint(20)                NOT NULL,
    `version`              int(11)      DEFAULT NULL,

    PRIMARY KEY (`id`),
    UNIQUE KEY `UK_sec_user_username_estabelecimento` (`username`, `estabelecimento_id`) USING BTREE,
    KEY `K_sec_user_estabelecimento` (`estabelecimento_id`),
    KEY `K_sec_user_user_inserted` (`user_inserted_id`),
    KEY `K_sec_user_user_updated` (`user_updated_id`),
    KEY `K_sec_user_group` (`group_id`),
    CONSTRAINT `FK_sec_user_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    CONSTRAINT `FK_sec_user_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_sec_user_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_sec_user_group` FOREIGN KEY (`group_id`) REFERENCES `sec_group` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `sec_user_role`;

CREATE TABLE `sec_user_role`
(
    `user_id` bigint(20) NOT NULL,
    `role_id` bigint(20) NOT NULL,
    `updated` date DEFAULT NULL,
    KEY `K_sec_user_role_role` (`role_id`),
    KEY `K_sec_user_role_user` (`user_id`),
    CONSTRAINT `FK_sec_user_role_role` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_sec_user_role_user` FOREIGN KEY (`role_id`) REFERENCES `sec_role` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cfg_app`;

CREATE TABLE `cfg_app`
(
    `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
    `uuid`               char(36)                  NOT NULL,
    `nome`               varchar(300)              NOT NULL,
    `obs`                varchar(5000) DEFAULT NULL,

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
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cfg_app_config`;

CREATE TABLE `cfg_app_config`
(
    `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
    `chave`              varchar(255)              NOT NULL,
    `valor`              LONGBLOB,
    `is_json`            tinyint(1),
    `app_uuid`           char(36)                  NOT NULL,
    `inserted`           datetime                  NOT NULL,
    `updated`            datetime                  NOT NULL,
    `estabelecimento_id` bigint(20)                NOT NULL,
    `user_inserted_id`   bigint(20)                NOT NULL,
    `user_updated_id`    bigint(20)                NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UK_cfg_app_config_chave_app` (`chave`, `app_uuid`),
    KEY `K_cfg_app_config_estabelecimento` (`estabelecimento_id`),
    KEY `K_cfg_app_config_user_inserted` (`user_inserted_id`),
    KEY `K_cfg_app_config_user_updated` (`user_updated_id`),
    KEY `K_cfg_app_config_app` (`app_uuid`),
    CONSTRAINT `FK_cfg_app_config_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    CONSTRAINT `FK_cfg_app_config_app` FOREIGN KEY (`app_uuid`) REFERENCES `cfg_app` (`uuid`),
    CONSTRAINT `FK_cfg_app_config_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_cfg_app_config_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cfg_entmenu`;

CREATE TABLE `cfg_entmenu`
(
    `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
    `uuid`               char(36)                  NOT NULL,
    `app_uuid`           char(36)                  NOT NULL,
    `label`              varchar(255)              NOT NULL,
    `icon`               varchar(50)   DEFAULT NULL,
    `tipo`               varchar(50)               NOT NULL,
    `pai_uuid`           char(36)      DEFAULT NULL,
    `ordem`              int(11)                   NOT NULL,
    `css_style`          varchar(2000) DEFAULT NULL,
    `url`                varchar(2000) DEFAULT NULL,
    `roles`              varchar(2000) DEFAULT NULL,

    `inserted`           datetime                  NOT NULL,
    `updated`            datetime                  NOT NULL,
    `estabelecimento_id` bigint(20)                NOT NULL,
    `user_inserted_id`   bigint(20)                NOT NULL,
    `user_updated_id`    bigint(20)                NOT NULL,

    UNIQUE KEY `UK_cfg_entmenu_uuid` (`uuid`),

    KEY `K_cfg_entmenu_pai` (`pai_uuid`),
    CONSTRAINT `FK_cfg_entmenu_pai` FOREIGN KEY (`pai_uuid`) REFERENCES `cfg_entmenu` (`uuid`),

    KEY `K_cfg_entmenu_app` (`app_uuid`),
    CONSTRAINT `FK_cfg_entmenu_app` FOREIGN KEY (`app_uuid`) REFERENCES `cfg_app` (`uuid`),

    PRIMARY KEY (`id`),

    KEY `K_cfg_entmenu_estabelecimento` (`estabelecimento_id`),
    KEY `K_cfg_entmenu_user_inserted` (`user_inserted_id`),
    KEY `K_cfg_entmenu_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_cfg_entmenu_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    CONSTRAINT `FK_cfg_entmenu_user_inserted` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_cfg_entmenu_user_updated` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



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
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cfg_stored_viewinfo`;

CREATE TABLE `cfg_stored_viewinfo`
(
    `id`                 bigint(20)                           NOT NULL AUTO_INCREMENT,
    `view_name`          varchar(300) COLLATE utf8_swedish_ci NOT NULL,
    `view_info`          varchar(15000)                       NOT NULL,
    `user_id`            bigint(20)                           NOT NULL,

    `estabelecimento_id` bigint(20)                           NOT NULL,
    `inserted`           datetime                             NOT NULL,
    `updated`            datetime                             NOT NULL,
    `user_inserted_id`   bigint(20)                           NOT NULL,
    `user_updated_id`    bigint(20)                           NOT NULL,

    PRIMARY KEY (`id`),
    UNIQUE KEY `UK_cfg_stored_viewinfo` (`user_id`, `view_name`),
    CONSTRAINT `FK_cfg_stored_viewinfo_user` FOREIGN KEY (`user_id`) REFERENCES `sec_user` (`id`),

    KEY `K_cfg_stored_viewinfo_estabelecimento` (`estabelecimento_id`),
    CONSTRAINT `K_cfg_stored_viewinfo_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    KEY `K_cfg_stored_viewinfo_user_inserted` (`user_inserted_id`),
    CONSTRAINT `FK_cfg_stored_viewinfo_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    KEY `K_cfg_stored_viewinfo_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_cfg_stored_viewinfo_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cfg_pushmessage`;

CREATE TABLE `cfg_pushmessage`
(
    `id`                   bigint(20) AUTO_INCREMENT NOT NULL,
    `mensagem`             varchar(200)              NOT NULL,
    `url`                  varchar(2000) DEFAULT NULL,
    `user_destinatario_id` bigint(20)    DEFAULT NULL,
    `dt_envio`             datetime      DEFAULT NULL,
    `dt_notif`             datetime      DEFAULT NULL,
    `dt_abert`             datetime      DEFAULT NULL,

    `params`               varchar(5000) DEFAULT NULL,

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

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cfg_entity_change`;

CREATE TABLE `cfg_entity_change`
(
    `id`               bigint(20) AUTO_INCREMENT NOT NULL,
    `entity_class`     varchar(200)              NOT NULL,
    `entity_id`        bigint(20)                NOT NULL,
    `changing_user_id` bigint(20)                NOT NULL,
    `changed_at`       datetime                  NOT NULL,
    `changes`          TEXT                      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `K_cfg_entity_change_entity_class` (`entity_class`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



CREATE TABLE `cfg_syslog`
(
    `id`           bigint(20)                            NOT NULL AUTO_INCREMENT,
    `tipo`         varchar(50) COLLATE utf8_swedish_ci   NOT NULL,
    `app`          varchar(50) COLLATE utf8_swedish_ci   NOT NULL,
    `component`    varchar(255) COLLATE utf8_swedish_ci  NOT NULL,
    `act`          varchar(3000) COLLATE utf8_swedish_ci NOT NULL,
    `username`     varchar(90) COLLATE utf8_swedish_ci   NOT NULL,
    `moment`       datetime                              NOT NULL,
    `obs`          longblob,
    `delete_after` datetime DEFAULT NULL,
    `json_data`    json     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 124576
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `bse_municipio`;
CREATE TABLE `bse_municipio`
(
    `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
    `municipio_codigo`   int(11)                   NOT NULL,
    `municipio_nome`     varchar(200) DEFAULT NULL,
    `uf_nome`            varchar(200) DEFAULT NULL,
    `uf_sigla`           varchar(2)   DEFAULT NULL,

    `inserted`           datetime                  NOT NULL,
    `updated`            datetime                  NOT NULL,
    `estabelecimento_id` bigint(20)                NOT NULL,
    `user_inserted_id`   bigint(20)                NOT NULL,
    `user_updated_id`    bigint(20)                NOT NULL,
    `version`            int(11)      DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UK_bse_municipio` (`uf_sigla`, `municipio_nome`),
    KEY `K_bse_municipio_estabelecimento` (`estabelecimento_id`),
    KEY `K_bse_municipio_user_inserted` (`user_inserted_id`),
    KEY `K_bse_municipio_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_bse_municipio_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_bse_municipio_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_bse_municipio_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



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
    `version`            int(11) DEFAULT NULL,
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
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `bse_diautil`;
CREATE TABLE `bse_diautil`
(
    `id`                 bigint(20) AUTO_INCREMENT NOT NULL,
    `dia`                datetime                  NOT NULL,
    `descricao`          varchar(40) DEFAULT NULL,
    `comercial`          tinyint(1)                NOT NULL,
    `financeiro`         tinyint(1)                NOT NULL,
    `municipio_id`       bigint(20)  DEFAULT NULL,

    `inserted`           datetime                  NOT NULL,
    `updated`            datetime                  NOT NULL,
    `estabelecimento_id` bigint(20)                NOT NULL,
    `user_inserted_id`   bigint(20)                NOT NULL,
    `user_updated_id`    bigint(20)                NOT NULL,
    `version`            int(11)     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UK_bse_dia_util` (`dia`, `municipio_id`),
    KEY `K_bse_dia_util_estabelecimento` (`estabelecimento_id`),
    KEY `K_bse_dia_util_user_inserted` (`user_inserted_id`),
    KEY `K_bse_dia_util_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_bse_dia_util_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_bse_dia_util_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_bse_dia_util_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;


-- Função que verifica se um valor dentro de um campo JSON é nulo ou vazio (MySQL 5.7)
DROP FUNCTION IF EXISTS JSON_IS_NULL_OR_EMPTY;

DELIMITER $$

CREATE FUNCTION JSON_IS_NULL_OR_EMPTY(json_data JSON,
                                      field VARCHAR(255))
    RETURNS bit(1)
    DETERMINISTIC
BEGIN

    IF (JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field))) IS NULL) THEN
        return true;
    ELSEIF ((JSON_EXTRACT(json_data, CONCAT('$.', field))) = CAST('null' AS JSON)) THEN
        return true;
    ELSEIF trim(JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field)))) = '' THEN
        return true;
    ELSE
        return false;

    END IF;
END$$

DELIMITER ;


-- Função que verifica se um valor dentro de um campo JSON é nulo ou vazio (MySQL 5.7)
DROP FUNCTION IF EXISTS JSON_IS_NULL_OR_EMPTY_OR_ZERO;

DELIMITER $$

CREATE FUNCTION JSON_IS_NULL_OR_EMPTY_OR_ZERO(json_data JSON,
                                              field VARCHAR(255))
    RETURNS bit(1)
    DETERMINISTIC
BEGIN

    IF (JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field))) IS NULL) THEN
        return true;
    ELSEIF ((JSON_EXTRACT(json_data, CONCAT('$.', field))) = CAST('null' AS JSON)) THEN
        return true;
    ELSEIF trim(JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field)))) = '' THEN
        return true;
    ELSEIF CAST(trim(JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$.', field)))) AS SIGNED) = 0 THEN
        return true;
    ELSE
        return false;

    END IF;
END$$

DELIMITER ;
