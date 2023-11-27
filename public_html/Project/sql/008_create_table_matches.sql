CREATE TABLE IF NOT EXISTS  `Matches`
(
    `id`        int auto_increment not null,
    `api_id`    CHAR(16) UNIQUE DEFAULT NULL,
    `championship_id` int,
    `team1_id`  int,
    `score1`    int,
    `team2_id`  int,
    `score2`    int,
    `date`      datetime,
    `stadium`   VARCHAR(255),
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    Foreign Key (`team1_id`) REFERENCES Teams(`id`) ON DELETE CASCADE,
    Foreign Key (`team2_id`) REFERENCES Teams(`id`) ON DELETE CASCADE,
    Foreign Key (`championship_id`) REFERENCES Championships(`id`)
)