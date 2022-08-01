CREATE TABLE IF NOT EXISTS `Orders`
(
    `id` INT AUTO_INCREMENT NOT NULL,
    `user_id` INT NOT NULL,
    `total_price` INT NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    `money_received` TINYINT NOT NULL,
    `first_name` VARCHAR(30) NOT NULL,
    `last_name` VARCHAR(30) NOT NULL,
    `created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`)
)