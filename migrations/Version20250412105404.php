<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250412105404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE objectif DROP FOREIGN KEY FK_E2F86851E899029B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_E2F86851E899029B ON objectif
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE objectif DROP plan_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE objectif ADD plan_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE objectif ADD CONSTRAINT FK_E2F86851E899029B FOREIGN KEY (plan_id) REFERENCES plan (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E2F86851E899029B ON objectif (plan_id)
        SQL);
    }
}
