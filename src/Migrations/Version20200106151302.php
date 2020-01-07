<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106151302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande ADD client_id INT NOT NULL, ADD moyen_paiement_id INT NOT NULL, ADD etat_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9C7E259C FOREIGN KEY (moyen_paiement_id) REFERENCES moyen_paiement (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DEF9E8683 FOREIGN KEY (etat_commande_id) REFERENCES etat_commande (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D19EB6921 ON commande (client_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D9C7E259C ON commande (moyen_paiement_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DEF9E8683 ON commande (etat_commande_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9C7E259C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DEF9E8683');
        $this->addSql('DROP INDEX IDX_6EEAA67D19EB6921 ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67D9C7E259C ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67DEF9E8683 ON commande');
        $this->addSql('ALTER TABLE commande DROP client_id, DROP moyen_paiement_id, DROP etat_commande_id');
    }
}
