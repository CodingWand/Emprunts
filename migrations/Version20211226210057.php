<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211226210057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borrowing (id INT AUTO_INCREMENT NOT NULL, lend_by_id INT NOT NULL, borrowed_by_id INT NOT NULL, equipment_id INT NOT NULL, started_on DATETIME NOT NULL, ended_on DATETIME NOT NULL, allowed_days INT NOT NULL, remarks LONGTEXT DEFAULT NULL, to_remove VARCHAR(255) DEFAULT NULL, INDEX IDX_226E58971520FF27 (lend_by_id), INDEX IDX_226E589739759382 (borrowed_by_id), INDEX IDX_226E5897517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E58971520FF27 FOREIGN KEY (lend_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E589739759382 FOREIGN KEY (borrowed_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE borrowing');
    }
}
