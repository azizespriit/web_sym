<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429131701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE rating DROP FOREIGN KEY ga
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D8892622158E0B66 ON rating
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating ADD objectif_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating ADD CONSTRAINT FK_DF252314157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DF252314157D1AD4 ON rating (objectif_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating DROP FOREIGN KEY FK_DF252314157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DF252314157D1AD4 ON Rating
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating DROP objectif_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating ADD CONSTRAINT ga FOREIGN KEY (target_id) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D8892622158E0B66 ON Rating (target_id)
        SQL);
    }
}
