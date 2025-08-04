<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429202223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE yes
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C5157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C5157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE yes (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C5157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C5157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id)
        SQL);
    }
}
