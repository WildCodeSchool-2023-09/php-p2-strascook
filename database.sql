CREATE TABLE
    IF NOT EXISTS `menus` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `nom` VARCHAR(200) NULL DEFAULT NULL,
        `description` VARCHAR(500) NULL DEFAULT NULL,
        `prix` INT NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE
    IF NOT EXISTS `produits` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `nom` VARCHAR(100) NULL DEFAULT NULL,
        `type` VARCHAR(255) NULL DEFAULT NULL,
        `sous_type` VARCHAR(255) NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 82 DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE
    IF NOT EXISTS `produits_menus` (
        `produits_id` INT NOT NULL,
        `menus_id` INT NOT NULL,
        PRIMARY KEY (`produits_id`, `menus_id`),
        INDEX `fk_produits_has_menus_menus1_idx` (`menus_id` ASC) VISIBLE,
        INDEX `fk_produits_has_menus_produits1_idx` (`produits_id` ASC) VISIBLE,
        CONSTRAINT `fk_produits_has_menus_menus1` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`),
        CONSTRAINT `fk_produits_has_menus_produits1` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE
    IF NOT EXISTS `user` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `nom` VARCHAR(50) NULL DEFAULT NULL,
        `prenom` VARCHAR(50) NULL DEFAULT NULL,
        `tel` VARCHAR(15) NULL DEFAULT NULL,
        `adresse` VARCHAR(200) NULL DEFAULT NULL,
        `email` VARCHAR(100) NULL DEFAULT NULL,
        `identifiant` VARCHAR(25) NULL DEFAULT NULL,
        `mot_de_passe` VARCHAR(20) NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE
    IF NOT EXISTS `reservation` (
        `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `menus_id` INT NOT NULL,
        `client_id` INT NOT NULL,
        `date` DATE NOT NULL,
        INDEX `fk_menus_has_client_client1_idx` (`client_id` ASC) VISIBLE,
        INDEX `fk_menus_has_client_menus_idx` (`menus_id` ASC) VISIBLE,
        CONSTRAINT `fk_menus_has_client_client1` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`),
        CONSTRAINT `fk_menus_has_client_menus` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

INSERT INTO
    `produits` (`nom`, `type`, `sous_type`)
VALUES (
        'Hamburger simple boeuf',
        'Plat',
        'Burger'
    ), (
        'Hamburger double boeuf',
        'Plat',
        'Burger'
    ), (
        'Hamburger simple poulet',
        'Plat',
        'Burger'
    ), (
        'Hamburger double poulet',
        'Plat',
        'Burger'
    ), (
        'Tortilla pommes de terre oignons',
        'Plat',
        'Tortilla'
    ), (
        'Hamburger simple poisson',
        'Plat',
        'Burger'
    ), (
        'Wrap poulet chèvre',
        'Plat',
        'Wrap'
    ), ('Wrap saumon', 'Plat', 'Wrap'), (
        'Beignets de poulet',
        'Plat',
        'Beignet'
    ), (
        'Kebab \"l\'original\"',
        'Plat',
        'Sandwich'
    ), ('Tacos', 'Plat', 'Tacos'), (
        'Tortilla pomme de terre nature',
        'Plat',
        'Tortilla'
    ), (
        'Tortilla pommes de terre chorizo',
        'Plat',
        'Tortilla'
    ), (
        'Frites bistrot',
        'Accompagnement',
        'Pommes de terre'
    ), (
        'Potatoes',
        'Accompagnement',
        'Pommes de terre'
    ), (
        'Glace maison vanille',
        'Dessert',
        'Glace'
    ), (
        'Chocolat liégeois revisité',
        'Dessert',
        'Glace'
    ), ('Nems poulet', 'Plat', 'Nems'), (
        'Rouleau de printemps du Chef',
        'Plat',
        'Nems'
    ), (
        'salade de fruits des îles du Chef',
        'Dessert',
        'Fruits'
    ), (
        'Canard laqué',
        'Plat',
        'Plat asiatique'
    ), (
        'Perles de citron',
        'Accompagnement',
        'Moléculaire'
    ), (
        'Sphère d\'oeuf',
        'Plat',
        'Moléculaire'
    ), (
        'Champignons embriochés',
        'Accompagnement',
        'Légumes'
    ), (
        'Mousse au carambar',
        'Dessert',
        'Moléculaire'
    ), (
        'Saint-Jaques poëlées au lard et sauce à la violette ',
        'Plat',
        'Fruits de mer'
    ), (
        'Tarte tatin de magret de canard et ses grenailles',
        'Plat',
        'Tartes'
    ), (
        'Kougelhopf',
        'Dessert',
        'Pâtisserie'
    ), (
        'Flammenkuche traditionnelle',
        'Plat',
        'Pizza'
    ), (
        'Choucroute de la mer',
        'Plat',
        'Choucroute'
    ), (
        'Käsekuchen',
        'Dessert',
        'Pâtisserie'
    ), (
        'Baeckeoffe',
        'Plat',
        'Plat cocotte'
    );

INSERT INTO
    `menus` (`nom`, `description`, `prix`)
VALUES (
        'Menu Soirée Fastfood',
        'Du fast-food de grande qualité, pour une soirée foot en famille et entre amis',
        15
    ), (
        'Menu Soirée Asiatique',
        'Succombez aux saveurs de l\'Asie le temps d\'une soirée',
        15
    ), (
        'Menu Soirée Moléculaire',
        'Immersion dans les expérimentations scientifiques au service de l\'explosion des saveurs',
        40
    ), (
        'Menu soirée Végan',
        'Envie d\'allier cuisine saine, respectueuse et de qualité, c\'est par ici!',
        20
    ), (
        'Menu Soirée Gastronomique',
        'Parfait mariage entre les saveurs et le raffinement',
        40
    ), (
        'Menu Soirée Strasbourgeoise',
        'Votre Chef Yavuz vous fera découvrir la cuisine de son terroir, revisitée avec amour pour sa ville',
        20
    );

UPDATE menus SET id=1 WHERE `id`=7;

UPDATE menus SET id=2 WHERE `id`=8;

UPDATE menus SET id=3 WHERE `id`=9;

UPDATE menus SET id=4 WHERE `id`=10;

UPDATE menus SET id=5 WHERE `id`=11;

UPDATE menus SET id=6 WHERE `id`=12;

ALTER TABLE user ADD isAdmin BOOLEAN;

ALTER TABLE menus ADD photo VARCHAR(255);

INSERT INTO
    `user` (
        `nom`,
        `prenom`,
        `tel`,
        `adresse`,
        `email`,
        `identifiant`,
        `mot_de_passe`,
        `isAdmin`
    )
VALUES (
        'KUTUK',
        'Yavuz',
        '062356355',
        '15 rue du Paradis',
        'yayatuktuk@yaoups.fr',
        'yaya67000',
        'Jaimefaireamanger67',
        1
    );

INSERT INTO
    user(
        nom,
        prenom,
        tel,
        adresse,
        email,
        identifiant,
        mot_de_passe,
        isAdmin
    )
VALUES (
        'Ravanel',
        'Vincent',
        '0667676767',
        '16 rue du Paradis Strasbourg',
        'vinzel @gmal.com',
        'vinz67',
        'vinz67',
        0
    );

ALTER TABLE reservation ADD remarques VARCHAR(500);

ALTER TABLE reservation ADD nombrepersonnes INT NOT NULL;

CREATE TABLE
    contact (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nomcontact VARCHAR(50),
        prenomcontact VARCHAR(50),
        emailcontact VARCHAR(100),
        telcontact VARCHAR(15),
        messagecontact VARCHAR(500)
    );

UPDATE user SET email='vinzel@gmal.com' WHERE id=3;

ALTER TABLE user MODIFY adresse TEXT;

UPDATE menus
SET
    photo = '1700597535_menufastfood1.jpg'
WHERE `id` = 1;

UPDATE menus
SET
    photo = '1700597892_menuasiatique1.jpg'
WHERE `id` = 2;

UPDATE menus
SET
    photo = '1700597908_menumoleculaire1.jpg'
WHERE `id` = 3;

UPDATE menus
SET
    photo = '1700597930_menuvegan1.jpg'
WHERE `id` = 4;

UPDATE menus
SET
    photo = '1700597953_menugastronomique1.png'
WHERE `id` = 5;

UPDATE menus
SET
    photo = '1700597974_menustrasbourgeois1.jpg'
WHERE `id` = 6;

UPDATE user SET isAdmin=1 WHERE `id`=1;