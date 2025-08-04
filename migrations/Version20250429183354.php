<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429183354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, objectif_id INT NOT NULL, nom VARCHAR(20) NOT NULL, INDEX IDX_DA17D9C5157D1AD4 (objectif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE yes (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C5157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating DROP FOREIGN KEY FK_DF252314157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating ADD CONSTRAINT FK_DF252314157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C5157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE jour
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE yes
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating DROP FOREIGN KEY FK_DF252314157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating ADD CONSTRAINT FK_DF252314157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
    }
}
