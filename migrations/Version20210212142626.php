<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212142626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spel ADD speler_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spel ADD CONSTRAINT FK_50B10AAF2C2B5A45 FOREIGN KEY (speler_id) REFERENCES speler (id)');
        $this->addSql('CREATE INDEX IDX_50B10AAF2C2B5A45 ON spel (speler_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spel DROP FOREIGN KEY FK_50B10AAF2C2B5A45');
        $this->addSql('DROP INDEX IDX_50B10AAF2C2B5A45 ON spel');
        $this->addSql('ALTER TABLE spel DROP speler_id');
    }
}
