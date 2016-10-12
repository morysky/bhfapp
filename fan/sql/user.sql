DROP table `user_info`;

CREATE TABLE IF NOT EXISTS `user_info` (
    `user_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key',
    `user_name` VARCHAR(100) NOT NULL COMMENT 'user_name',
    `passwd` VARCHAR(200) NOT NULL COMMENT 'passwd',
    `gender` TINYINT(4) UNSIGNED NOT NULL DEFAULT 0,
    `celephone` VARCHAR(20) NOT NULL COMMENT 'celephone',
    `create_time` INT(10) UNSIGNED NOT NULL COMMENT 'time',
    `op_time` INT(10) UNSIGNED NOT NULL COMMENT 'time',
    `ext_info` VARCHAR(1000) NOT NULL DEFAULT '' COMMENT 'extra info',
    PRIMARY KEY `user_id` (`user_id`),
    UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT 'user_info';
