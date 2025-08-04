<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429131056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE Rating (id INT AUTO_INCREMENT NOT NULL, score INT NOT NULL, target_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D403E86A9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D403E86A9 FOREIGN KEY (id_obj_id) REFERENCES objectif (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE Rating
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D403E86A9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D403E86A9 FOREIGN KEY (id_obj_id) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
    }
}
