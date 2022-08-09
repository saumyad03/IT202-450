CREATE TABLE IF NOT EXISTS  `Ratings`
(
    `id`         INT AUTO_INCREMENT NOT NULL,
    `product_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `rating` INT,
    `comment` TEXT,
    `created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    UNIQUE KEY (`product_id`, `user_id`),
    check (rating >= 1 and rating <= 5)
)