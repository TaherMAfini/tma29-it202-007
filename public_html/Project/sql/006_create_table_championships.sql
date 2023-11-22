CREATE TABLE IF NOT EXISTS  `Championships`
(
    `id`        int auto_increment not null,
    `api_id`    CHAR(16) UNIQUE DEFAULT NULL,
    `name`      VARCHAR(255),
    `created`   timestamp default current_timestamp,
    `modified`  timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`)
)