ALTER TABLE `Products` MODIFY COLUMN `unit_price` INT;
ALTER TABLE `Products` ALTER `unit_price` SET DEFAULT 999999;
ALTER TABLE `Products` MODIFY COLUMN `description` TEXT SET DEFAULT `No description`;
ALTER TABLE `Products` ADD CONSTRAINT check(stock >= 0);
ALTER TABLE `Products` ADD CONSTRAINT check(unit_price > 0);