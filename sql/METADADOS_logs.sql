SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `cfg_entity_change`;
CREATE TABLE `cfg_entity_change`
(
  `id`                     bigint(20)   NOT NULL AUTO_INCREMENT,
  `entity_class`           varchar(200) NOT NULL,
  `entity_id`              bigint(20)   NOT NULL,
  `changing_user_id`       bigint(20)   NOT NULL,
  `changing_user_username` varchar(255) DEFAULT NULL,
  `changing_user_nome`     varchar(255) DEFAULT NULL,
  `changed_at`             datetime     NOT NULL,
  `changes`                longtext     NOT NULL,
  `obs`                    varchar(500) NULL,
  `uuid_sess`              char(36),
  PRIMARY KEY (`id`),
  KEY `cfg_entity_change_entity` (`entity_class`, `entity_id`),
  KEY `cfg_entity_change_changed_at` (`changed_at`),
  KEY `K_cfg_entity_change_entity_class` (`entity_class`)
) ENGINE = InnoDB;



DROP TABLE IF EXISTS `cfg_syslog`;

CREATE TABLE `cfg_syslog`
(
  `id`           bigint(20)    NOT NULL AUTO_INCREMENT,
  `uuid_sess`    char(36),
  `tipo`         varchar(50)   NOT NULL,
  `app`          varchar(50)   NOT NULL,
  `component`    varchar(255)  NOT NULL,
  `act`          varchar(3000) NOT NULL,
  `username`     varchar(90)   NOT NULL,
  `moment`       datetime      NOT NULL,
  `obs`          longtext,
  `delete_after` datetime,
  `json_data`    json,

  KEY cfg_syslog_tipo (`tipo`),
  KEY cfg_syslog_uuid_sess (`uuid_sess`),
  KEY cfg_syslog_app (`app`),
  KEY cfg_syslog_component (`component`),
  KEY cfg_syslog_username (`username`),
  KEY cfg_syslog_moment (`moment`),

  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB;

