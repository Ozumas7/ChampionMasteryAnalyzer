
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;


-- ---------------------------------------------------------------------
-- ids
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ids`;

CREATE TABLE `ids`
(
    `id` INTEGER NOT NULL,
    `processed` TINYINT(1),
    `region` VARCHAR(5),
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- champions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `champions`;

CREATE TABLE `champions`
(
    `id` VARCHAR(255) NOT NULL,
    `championid` INTEGER(100),
    `winratio` INTEGER(100),
    `totalSessionsPlayed` INTEGER(100),
    `totalSessionsWon` INTEGER(100),
    `totalSessionsLost` INTEGER(100),
    `totalChampionKills` INTEGER(100),
    `totalAssists` INTEGER(100),
    `totalDeathsPerSession` INTEGER(100),
    `totalGoldEarned` INTEGER(100),
    `totalDamageDealt` INTEGER(100),
    `totalDamageTaken` INTEGER(100),
    `points` INTEGER(100),
    `summonerid` INTEGER(100),
    `update_at` DATETIME,
    `region` VARCHAR(5),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- champion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `champion`;

CREATE TABLE `champion`
(
    `id` INTEGER(10) NOT NULL,
    `winratio` INTEGER(100),
    `totalSessionsPlayed` INTEGER(100),
    `totalSessionsWon` INTEGER(100),
    `totalSessionsLost` INTEGER(100),
    `totalChampionKills` INTEGER(100),
    `totalAssists` INTEGER(100),
    `totalDeathsPerSession` INTEGER(100),
    `totalGoldEarned` INTEGER(100),
    `totalDamageDealt` INTEGER(100),
    `totalDamageTaken` INTEGER(100),
    `points` INTEGER(100),
    `update_at` DATETIME,
    `entries` INTEGER(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
