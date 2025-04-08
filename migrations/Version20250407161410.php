<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407161410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY comment_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD publish_date DATE NOT NULL, DROP publishDate, CHANGE id id INT NOT NULL, CHANGE content content LONGTEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526C64B64DCC FOREIGN KEY (userId) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX userid ON comment
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526C64B64DCC ON comment (userId)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX articleid ON comment
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526CFEA2A0EE ON comment (articleId)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT comment_ibfk_2 FOREIGN KEY (articleId) REFERENCES article (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement DROP FOREIGN KEY equipement_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement DROP FOREIGN KEY equipement_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE dateAdded date_added DATE NOT NULL, CHANGE partnerId partner_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F39C370B71 FOREIGN KEY (categoryId) REFERENCES category (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX categoryid ON equipement
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B8B4C6F39C370B71 ON equipement (categoryId)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement ADD CONSTRAINT equipement_ibfk_1 FOREIGN KEY (categoryId) REFERENCES category (id) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event ADD start_date DATE NOT NULL, ADD end_date DATE NOT NULL, DROP startDate, DROP endDate, CHANGE id id INT NOT NULL, CHANGE title title VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE location location VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification DROP FOREIGN KEY notification_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification DROP FOREIGN KEY notification_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification ADD on_clicked TINYINT(1) NOT NULL, DROP onClicked, CHANGE id id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX user_id ON notification
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_BF5476CAA76ED395 ON notification (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification ADD CONSTRAINT notification_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE participant DROP FOREIGN KEY participant_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE participant ADD registration_date DATE NOT NULL, DROP registrationDate
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX eventid ON participant
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D79F6B112B2EBB6C ON participant (eventId)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE participant ADD CONSTRAINT participant_ibfk_2 FOREIGN KEY (eventId) REFERENCES event (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE partner ADD organization_name VARCHAR(255) NOT NULL, DROP organizationName
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation CHANGE event_id event_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE status status VARCHAR(20) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX event_id ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CE60640471F7E88B ON reclamation (event_id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX user_id ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CE606404A76ED395 ON reclamation (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_2 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX email ON user
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD join_date DATE NOT NULL, DROP joinDate, CHANGE id id INT NOT NULL, CHANGE firstname firstname VARCHAR(100) NOT NULL, CHANGE lastname lastname VARCHAR(100) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE avatar avatar VARCHAR(255) NOT NULL, CHANGE role role VARCHAR(10) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526C64B64DCC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526C64B64DCC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFEA2A0EE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD publishDate DATE DEFAULT NULL, DROP publish_date, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE content content TEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_9474526c64b64dcc ON comment
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX userId ON comment (userId)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_9474526cfea2a0ee ON comment
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX articleId ON comment (articleId)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526C64B64DCC FOREIGN KEY (userId) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526CFEA2A0EE FOREIGN KEY (articleId) REFERENCES article (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F39C370B71
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F39C370B71
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE date_added dateAdded DATE NOT NULL, CHANGE partner_id partnerId INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement ADD CONSTRAINT equipement_ibfk_1 FOREIGN KEY (categoryId) REFERENCES category (id) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_b8b4c6f39c370b71 ON equipement
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX categoryId ON equipement (categoryId)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F39C370B71 FOREIGN KEY (categoryId) REFERENCES category (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event ADD startDate DATE DEFAULT NULL, ADD endDate DATE DEFAULT NULL, DROP start_date, DROP end_date, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification ADD onClicked TINYINT(1) DEFAULT 0, DROP on_clicked, CHANGE id id INT AUTO_INCREMENT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification ADD CONSTRAINT notification_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_bf5476caa76ed395 ON notification
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX user_id ON notification (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B112B2EBB6C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE participant ADD registrationDate DATE DEFAULT NULL, DROP registration_date
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_d79f6b112b2ebb6c ON participant
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX eventId ON participant (eventId)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE participant ADD CONSTRAINT FK_D79F6B112B2EBB6C FOREIGN KEY (eventId) REFERENCES event (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE partner ADD organizationName VARCHAR(255) DEFAULT NULL, DROP organization_name
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640471F7E88B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation CHANGE event_id event_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE status status VARCHAR(20) DEFAULT 'EN_ATTENTE' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_ce606404a76ed395 ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX user_id ON reclamation (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_ce60640471f7e88b ON reclamation
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX event_id ON reclamation (event_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640471F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD joinDate DATE DEFAULT NULL, DROP join_date, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE firstname firstname VARCHAR(100) DEFAULT NULL, CHANGE lastname lastname VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE role role VARCHAR(10) DEFAULT 'CLIENT' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX email ON user (email)
        SQL);
    }
}
