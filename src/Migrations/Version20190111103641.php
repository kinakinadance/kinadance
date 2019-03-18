<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190111103641 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_course DROP FOREIGN KEY FK_9B380606159D9B5E');
        $this->addSql('DROP INDEX IDX_9B380606159D9B5E ON tbl_course');
        $this->addSql('ALTER TABLE tbl_course CHANGE level_id_id level_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tbl_course ADD CONSTRAINT FK_9B3806065FB14BA7 FOREIGN KEY (level_id) REFERENCES tbl_level (id)');
        $this->addSql('CREATE INDEX IDX_9B3806065FB14BA7 ON tbl_course (level_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_course DROP FOREIGN KEY FK_9B3806065FB14BA7');
        $this->addSql('DROP INDEX IDX_9B3806065FB14BA7 ON tbl_course');
        $this->addSql('ALTER TABLE tbl_course CHANGE level_id level_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tbl_course ADD CONSTRAINT FK_9B380606159D9B5E FOREIGN KEY (level_id_id) REFERENCES tbl_level (id)');
        $this->addSql('CREATE INDEX IDX_9B380606159D9B5E ON tbl_course (level_id_id)');
    }
}
