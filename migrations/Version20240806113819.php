<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240806113819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, traveler_id_id INT NOT NULL, trip_id_id INT NOT NULL, payment_id INT DEFAULT NULL, booking_date DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_7A853C35776B35B0 (traveler_id_id), INDEX IDX_7A853C35A50F1E14 (trip_id_id), INDEX IDX_7A853C354C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, amount DOUBLE PRECISION NOT NULL, payment_date DATETIME NOT NULL, payment_method VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traveler (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, travel_history VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trips (id INT AUTO_INCREMENT NOT NULL, depart_location VARCHAR(255) NOT NULL, arrival_location VARCHAR(255) NOT NULL, depart_time TIME NOT NULL, arrival_time TIME NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35776B35B0 FOREIGN KEY (traveler_id_id) REFERENCES traveler (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35A50F1E14 FOREIGN KEY (trip_id_id) REFERENCES trips (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C354C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35776B35B0');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35A50F1E14');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C354C3A3BB');
        $this->addSql('DROP TABLE bookings');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE traveler');
        $this->addSql('DROP TABLE trips');
    }
}
