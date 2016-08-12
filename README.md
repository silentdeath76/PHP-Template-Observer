# PHP-Template-Observer

#### DB Structure:

``` sql

CREATE TABLE `test`. (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `timestamp_registration` INT NOT NULL ,
  PRIMARY KEY (`id`), UNIQUE (`username`)
) ENGINE = InnoDB;
```
