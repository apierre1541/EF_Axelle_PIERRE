<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260223183130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment_method ADD CONSTRAINT FK_7B61A1F6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D15AA1164F FOREIGN KEY (payment_method_id) REFERENCES payment_method (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction_category ADD CONSTRAINT FK_483E30A92FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction_category ADD CONSTRAINT FK_483E30A912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, DROP email, CHANGE username username VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1FB88E14F');
        $this->addSql('ALTER TABLE payment_method DROP FOREIGN KEY FK_7B61A1F6FB88E14F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D15AA1164F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1FB88E14F');
        $this->addSql('ALTER TABLE transaction_category DROP FOREIGN KEY FK_483E30A92FC0CB0F');
        $this->addSql('ALTER TABLE transaction_category DROP FOREIGN KEY FK_483E30A912469DE2');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, DROP roles, CHANGE username username VARCHAR(255) NOT NULL');
    }
}
