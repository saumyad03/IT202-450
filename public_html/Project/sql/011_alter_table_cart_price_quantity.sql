ALTER TABLE `Cart` MODIFY COLUMN `unit_price` INT;
ALTER Table `Cart` MODIFY COLUMN `desired_quantity` INT;
ALTER TABLE `Cart` ADD CONSTRAINT check(unit_price > 0);
ALTER TABLE `Products` ALTER `stock` SET DEFAULT 0;