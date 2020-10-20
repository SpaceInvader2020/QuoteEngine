<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201019095314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_code_rating (postcode_area VARCHAR(4) NOT NULL, rating_factor NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(postcode_area)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE postcode_rating');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE postcode_rating (postcode_area VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, rating_factor NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(postcode_area)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE post_code_rating');
    }
}
