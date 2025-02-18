<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317192817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create user table with first name, last name, and email';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE "user"');
    }
}
