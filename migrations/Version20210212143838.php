<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212143838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speler ADD spel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speler ADD CONSTRAINT FK_2E128484F2ECB4AD FOREIGN KEY (spel_id) REFERENCES spel (id)');
        $this->addSql('CREATE INDEX IDX_2E128484F2ECB4AD ON speler (spel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speler DROP FOREIGN KEY FK_2E128484F2ECB4AD');
        $this->addSql('DROP INDEX IDX_2E128484F2ECB4AD ON speler');
        $this->addSql('ALTER TABLE speler DROP spel_id');
    }
}
