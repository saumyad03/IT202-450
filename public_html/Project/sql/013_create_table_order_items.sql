CREATE TABLE IF NOT EXISTS  `OrderItems`
(
    `id`         INT AUTO_INCREMENT NOT NULL,
    `order_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `quantity` INT NOT NULL,
    `unit_price` INT NOT NULL,
    `created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`order_id`) REFERENCES Orders(`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`),
    UNIQUE KEY (`order_id`, `product_id`)
)