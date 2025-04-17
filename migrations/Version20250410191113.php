<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410191113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE plan DROP FOREIGN KEY ga
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE jour
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE plan
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE objectif CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE niveau niveau INT DEFAULT NULL, CHANGE semaine semaine INT DEFAULT NULL, CHANGE lien lien VARCHAR(255) DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, id_plan INT NOT NULL, Jour VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE plan (id_plan INT AUTO_INCREMENT NOT NULL, id_obj INT NOT NULL, jour VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nutration_protein VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, course_kilometrage DOUBLE PRECISION NOT NULL, muscle VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX ga (id_obj), PRIMARY KEY(id_plan)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan ADD CONSTRAINT ga FOREIGN KEY (id_obj) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE objectif CHANGE nom nom VARCHAR(20) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(200) NOT NULL, CHANGE niveau niveau INT NOT NULL, CHANGE semaine semaine INT NOT NULL, CHANGE lien lien VARCHAR(255) NOT NULL
        SQL);
    }
}
