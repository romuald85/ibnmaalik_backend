<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528181316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create student table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, age INT NOT NULL, phone INT NOT NULL, email VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, support VARCHAR(255) NOT NULL, type_of_session VARCHAR(255) NOT NULL, hours_per_week VARCHAR(255) NOT NULL, prof VARCHAR(255) NOT NULL, find_our_website VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE student');
    }
}
