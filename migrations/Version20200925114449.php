<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200925114449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hike ADD time VARCHAR(255) DEFAULT NULL, ADD distance DOUBLE PRECISION DEFAULT NULL, ADD positive_climb INT DEFAULT NULL, ADD negative_climb INT DEFAULT NULL, ADD difficulty VARCHAR(255) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(255) DEFAULT NULL, ADD start_lat VARCHAR(255) DEFAULT NULL, ADD start_lng VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hike DROP time, DROP distance, DROP positive_climb, DROP negative_climb, DROP difficulty, DROP city, DROP postal_code, DROP start_lat, DROP start_lng');
    }
}
