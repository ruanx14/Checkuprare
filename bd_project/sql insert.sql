INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`, `rateDrop`, `wiki`) VALUES ('helm', 'A Frogzard ate my head', 'Greenguard Challenge', '0.02', 'http://aq-3d.wikidot.com/a-frogzard-ate-my-head');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('helm', 'Necrohen hat', 'Skulltower');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`, `rateDrop`, `wiki`) VALUES ('helm', 'UWU Shrade Mask', 'Camp Gonnagetcha', '', 'http://aq-3d.wikidot.com/uwu-shrade-mask');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('helm', 'Vampiric Visage', 'Darkovia Waterway');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('helm', 'Yettun Head', 'Frostvale Dungeons');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('helm', 'Dr Trollestein\'s Head', 'Lab');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`, `wiki`) VALUES ('weapon', 'Soulborne Axe', 'Skulltower', 'http://aq-3d.wikidot.com/soulborne-axe');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`, `wiki`) VALUES ('weapon', 'Midas\' Curse', 'Dreadfool\'s Labyrint', 'http://aq-3d.wikidot.com/midas-curse');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('weapon', 'King\'s Ransom', 'Doomwood');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('weapon', 'Doom Ripper', 'Bone Cliff');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('weapon', 'The Headless Horseman\'s Sword', 'Mogloween');
INSERT INTO `checkuprare`.`item` (`typeItem`, `name`, `locale`) VALUES ('weapon', 'Legion Soulbrand', 'Arena of Souls');



select * from user u join usercheck uc on u.idUser=uc.user_idUser join item i on uc.item_idItem=i.idItem where uc.done='false';

select * from user u join usercheck uc on u.idUser=uc.user_idUser join item i on uc.item_idItem=i.idItem;

select i.name from user u join usercheck uc on u.idUser=uc.user_idUser join item i on uc.item_idItem=i.idItem where uc.done='false' and i.typeItem='helm';
