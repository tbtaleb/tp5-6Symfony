<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240426100443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_utilisateur (groupe_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_92C1107D7A45358C (groupe_id), INDEX IDX_92C1107DFB88E14F (utilisateur_id), PRIMARY KEY(groupe_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_groupe (utilisateur_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_6514B6AAFB88E14F (utilisateur_id), INDEX IDX_6514B6AA7A45358C (groupe_id), PRIMARY KEY(utilisateur_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_utilisateur ADD CONSTRAINT FK_92C1107D7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_utilisateur ADD CONSTRAINT FK_92C1107DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_groupe ADD CONSTRAINT FK_6514B6AAFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_groupe ADD CONSTRAINT FK_6514B6AA7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_utilisateur DROP FOREIGN KEY FK_92C1107D7A45358C');
        $this->addSql('ALTER TABLE groupe_utilisateur DROP FOREIGN KEY FK_92C1107DFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_groupe DROP FOREIGN KEY FK_6514B6AAFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_groupe DROP FOREIGN KEY FK_6514B6AA7A45358C');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_utilisateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_groupe');
    }
}
