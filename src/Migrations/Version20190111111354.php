<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190111111354 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tbl_event (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, category_id INT NOT NULL, course_id INT NOT NULL, genre_id INT NOT NULL, event_name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, start DATETIME NOT NULL, end DATETIME DEFAULT NULL, price DOUBLE PRECISION NOT NULL, location_name VARCHAR(64) DEFAULT NULL, street VARCHAR(64) NOT NULL, city VARCHAR(255) DEFAULT NULL, zipode VARCHAR(16) DEFAULT NULL, description VARCHAR(128) DEFAULT NULL, INDEX IDX_95CA40B8A76ED395 (user_id), INDEX IDX_95CA40B812469DE2 (category_id), INDEX IDX_95CA40B8591CC992 (course_id), INDEX IDX_95CA40B84296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbl_event ADD CONSTRAINT FK_95CA40B8A76ED395 FOREIGN KEY (user_id) REFERENCES tbl_user (id)');
        $this->addSql('ALTER TABLE tbl_event ADD CONSTRAINT FK_95CA40B812469DE2 FOREIGN KEY (category_id) REFERENCES tbl_category (id)');
        $this->addSql('ALTER TABLE tbl_event ADD CONSTRAINT FK_95CA40B8591CC992 FOREIGN KEY (course_id) REFERENCES tbl_course (id)');
        $this->addSql('ALTER TABLE tbl_event ADD CONSTRAINT FK_95CA40B84296D31F FOREIGN KEY (genre_id) REFERENCES tbl_genre (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tbl_event');
    }
}
