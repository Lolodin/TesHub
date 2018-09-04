<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180903224036 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer ADD questions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25BCB134CE FOREIGN KEY (questions_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A25BCB134CE ON answer (questions_id)');
        $this->addSql('ALTER TABLE question ADD tests_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EF5D80971 FOREIGN KEY (tests_id) REFERENCES tests (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EF5D80971 ON question (tests_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25BCB134CE');
        $this->addSql('DROP INDEX IDX_DADD4A25BCB134CE ON answer');
        $this->addSql('ALTER TABLE answer DROP questions_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EF5D80971');
        $this->addSql('DROP INDEX IDX_B6F7494EF5D80971 ON question');
        $this->addSql('ALTER TABLE question DROP tests_id');
    }
}
