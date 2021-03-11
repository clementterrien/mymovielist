<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311214326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_list DROP INDEX UNIQ_B7AED915A76ED395, ADD INDEX IDX_B7AED915A76ED395 (user_id)');
        $this->addSql('ALTER TABLE movie_list CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD bonjour VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_list DROP INDEX IDX_B7AED915A76ED395, ADD UNIQUE INDEX UNIQ_B7AED915A76ED395 (user_id)');
        $this->addSql('ALTER TABLE movie_list CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP bonjour');
    }
}
