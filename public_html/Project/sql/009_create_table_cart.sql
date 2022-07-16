CREATE TABLE IF NOT EXISTS  `Cart`
(
    `id`         INT AUTO_INCREMENT NOT NULL,
    `product_id`    INT NOT NULL,
    `user_id`  INT NOT NULL,
    `desired_quantity` SMALLINT NOT NULL DEFAULT 1, 
    `unit_price` FLOAT(6, 2) UNSIGNED NOT NULL,
    `created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    UNIQUE KEY (`product_id`, `user_id`)
)