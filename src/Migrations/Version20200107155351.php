<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200107155351 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, artiste_id INT NOT NULL, nom_album VARCHAR(255) NOT NULL, annee_album VARCHAR(255) NOT NULL, prix_album DOUBLE PRECISION NOT NULL, stock_album INT NOT NULL, INDEX IDX_39986E4321D25844 (artiste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, style_id INT NOT NULL, nom_artiste VARCHAR(255) NOT NULL, INDEX IDX_9C07354FBACD6074 (style_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, tel_client VARCHAR(255) NOT NULL, mail_client VARCHAR(255) NOT NULL, adresse_client VARCHAR(255) NOT NULL, pseudo_client VARCHAR(255) NOT NULL, mdp_client VARCHAR(255) NOT NULL, role_client TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, moyen_paiement_id INT NOT NULL, etat_commande_id INT NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), INDEX IDX_6EEAA67D9C7E259C (moyen_paiement_id), INDEX IDX_6EEAA67DEF9E8683 (etat_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comporter (id INT AUTO_INCREMENT NOT NULL, album_id INT NOT NULL, commande_id INT NOT NULL, qte_commande_album INT NOT NULL, INDEX IDX_4442FCC91137ABCF (album_id), INDEX IDX_4442FCC982EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comporter_album (comporter_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_4E0DC555D8E4E6B6 (comporter_id), INDEX IDX_4E0DC5551137ABCF (album_id), PRIMARY KEY(comporter_id, album_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_commande (id INT AUTO_INCREMENT NOT NULL, libelle_etat_commande VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moyen_paiement (id INT AUTO_INCREMENT NOT NULL, libelle_moyen_paiement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, nom_style VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E4321D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FBACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9C7E259C FOREIGN KEY (moyen_paiement_id) REFERENCES moyen_paiement (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DEF9E8683 FOREIGN KEY (etat_commande_id) REFERENCES etat_commande (id)');
        $this->addSql('ALTER TABLE comporter ADD CONSTRAINT FK_4442FCC91137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE comporter ADD CONSTRAINT FK_4442FCC982EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE comporter_album ADD CONSTRAINT FK_4E0DC555D8E4E6B6 FOREIGN KEY (comporter_id) REFERENCES comporter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comporter_album ADD CONSTRAINT FK_4E0DC5551137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comporter DROP FOREIGN KEY FK_4442FCC91137ABCF');
        $this->addSql('ALTER TABLE comporter_album DROP FOREIGN KEY FK_4E0DC5551137ABCF');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E4321D25844');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE comporter DROP FOREIGN KEY FK_4442FCC982EA2E54');
        $this->addSql('ALTER TABLE comporter_album DROP FOREIGN KEY FK_4E0DC555D8E4E6B6');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DEF9E8683');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9C7E259C');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FBACD6074');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE comporter');
        $this->addSql('DROP TABLE comporter_album');
        $this->addSql('DROP TABLE etat_commande');
        $this->addSql('DROP TABLE moyen_paiement');
        $this->addSql('DROP TABLE style');
    }
}
