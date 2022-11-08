<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221030161821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE performances ADD exercice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE performances ADD CONSTRAINT FK_8133AB2B89D40298 FOREIGN KEY (exercice_id) REFERENCES exercices (id)');
        $this->addSql('CREATE INDEX IDX_8133AB2B89D40298 ON performances (exercice_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE performances DROP FOREIGN KEY FK_8133AB2B89D40298');
        $this->addSql('DROP INDEX IDX_8133AB2B89D40298 ON performances');
        $this->addSql('ALTER TABLE performances DROP exercice_id');
    }
}
