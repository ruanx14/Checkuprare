/*em web n usa
CREATE SCHEMA IF NOT EXISTS `Checkuprare` DEFAULT CHARACTER SET utf8 ;

USE `Checkuprare` ;
*/

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `tipouser` VARCHAR(200),
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `item` (
  `idItem` INT NOT NULL AUTO_INCREMENT,
  `typeItem` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `locale` VARCHAR(45) NULL,
  `rateDrop` VARCHAR(45) NULL,
  PRIMARY KEY (`idItem`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `randomDay` (
  `idRandomDay` INT NOT NULL AUTO_INCREMENT,
  `day` VARCHAR(45) NOT NULL,
  `itemRandom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRandomDay`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `userCheck` (
  `idUserCheck` INT NOT NULL AUTO_INCREMENT,
  `user_idUser` INT NOT NULL,
  `item_idItem` INT NOT NULL,
  `done` VARCHAR(45) NULL,
  PRIMARY KEY (`idUserCheck`),
FOREIGN KEY user_idUser(user_idUser) references user(idUser),
FOREIGN KEY item_idItem(item_idItem) references item(idItem)
)ENGINE = InnoDB;



