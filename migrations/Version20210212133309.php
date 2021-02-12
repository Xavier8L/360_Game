<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212133309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spel (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speler (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, leeftijd VARCHAR(255) NOT NULL, point NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speler_spel (speler_id INT NOT NULL, spel_id INT NOT NULL, INDEX IDX_3F6C33B82C2B5A45 (speler_id), INDEX IDX_3F6C33B8F2ECB4AD (spel_id), PRIMARY KEY(speler_id, spel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speler_spel ADD CONSTRAINT FK_3F6C33B82C2B5A45 FOREIGN KEY (speler_id) REFERENCES speler (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speler_spel ADD CONSTRAINT FK_3F6C33B8F2ECB4AD FOREIGN KEY (spel_id) REFERENCES spel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speler_spel DROP FOREIGN KEY FK_3F6C33B8F2ECB4AD');
        $this->addSql('ALTER TABLE speler_spel DROP FOREIGN KEY FK_3F6C33B82C2B5A45');
        $this->addSql('DROP TABLE spel');
        $this->addSql('DROP TABLE speler');
        $this->addSql('DROP TABLE speler_spel');
    }
}
