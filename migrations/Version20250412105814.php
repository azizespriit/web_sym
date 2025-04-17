<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250412105814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE plan ADD id_obj_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D403E86A9 FOREIGN KEY (id_obj_id) REFERENCES objectif (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DD5A5B7D403E86A9 ON plan (id_obj_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D403E86A9
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DD5A5B7D403E86A9 ON plan
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan DROP id_obj_id
        SQL);
    }
}
