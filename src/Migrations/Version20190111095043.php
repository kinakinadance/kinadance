<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190111095043 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tbl_category (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(16) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbl_course ADD level_id_id INT DEFAULT NULL, DROP y');
        $this->addSql('ALTER TABLE tbl_course ADD CONSTRAINT FK_9B380606159D9B5E FOREIGN KEY (level_id_id) REFERENCES tbl_level (id)');
        $this->addSql('CREATE INDEX IDX_9B380606159D9B5E ON tbl_course (level_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tbl_category');
        $this->addSql('ALTER TABLE tbl_course DROP FOREIGN KEY FK_9B380606159D9B5E');
        $this->addSql('DROP INDEX IDX_9B380606159D9B5E ON tbl_course');
        $this->addSql('ALTER TABLE tbl_course ADD y VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP level_id_id');
    }
}
