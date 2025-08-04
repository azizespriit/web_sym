<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250501145936 extends AbstractMigration
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
            ALTER TABLE rating DROP FOREIGN KEY FK_DF252314157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating ADD CONSTRAINT FK_DF252314157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C5157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C5157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id) ON DELETE CASCADE
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
            CREATE TABLE yes (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C5157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C5157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D403E86A9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D403E86A9 FOREIGN KEY (id_obj_id) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating DROP FOREIGN KEY FK_DF252314157D1AD4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE Rating ADD CONSTRAINT FK_DF252314157D1AD4 FOREIGN KEY (objectif_id) REFERENCES objectif (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
    }
}
