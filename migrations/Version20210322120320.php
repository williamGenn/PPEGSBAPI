<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322120320 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activitecompl (id INT AUTO_INCREMENT NOT NULL, ac_num INT NOT NULL, ac_date DATETIME DEFAULT NULL, ac_lieu VARCHAR(25) DEFAULT NULL, ac_theme VARCHAR(10) DEFAULT NULL, ac_motif VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activitecompl_praticien (activitecompl_id INT NOT NULL, praticien_id INT NOT NULL, INDEX IDX_CB7AA288DD1ECA17 (activitecompl_id), INDEX IDX_CB7AA2882391866B (praticien_id), PRIMARY KEY(activitecompl_id, praticien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composant (id INT AUTO_INCREMENT NOT NULL, cmp_code VARCHAR(4) NOT NULL, cmp_libelle VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constitution (id INT AUTO_INCREMENT NOT NULL, quantité INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constitution_composant (constitution_id INT NOT NULL, composant_id INT NOT NULL, INDEX IDX_9F94306FBDA9478A (constitution_id), INDEX IDX_9F94306F7F3310E7 (composant_id), PRIMARY KEY(constitution_id, composant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dosage (id INT AUTO_INCREMENT NOT NULL, dos_code VARCHAR(10) NOT NULL, dos_quantite VARCHAR(10) DEFAULT NULL, dos_unite VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, fam_code VARCHAR(3) NOT NULL, fam_libelle VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE labo (id INT AUTO_INCREMENT NOT NULL, lab_code VARCHAR(2) NOT NULL, lab_nom VARCHAR(10) DEFAULT NULL, lab_chefvente VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, famille_id INT DEFAULT NULL, constitution_id INT NOT NULL, med_depotlegal VARCHAR(10) NOT NULL, med_nomcommercial VARCHAR(25) DEFAULT NULL, med_composition VARCHAR(255) DEFAULT NULL, med_contreindic VARCHAR(255) DEFAULT NULL, med_prixechantillon DOUBLE PRECISION DEFAULT NULL, INDEX IDX_9A9C723A97A77B84 (famille_id), INDEX IDX_9A9C723ABDA9478A (constitution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament_composant (medicament_id INT NOT NULL, composant_id INT NOT NULL, INDEX IDX_330B56BAAB0D61F7 (medicament_id), INDEX IDX_330B56BA7F3310E7 (composant_id), PRIMARY KEY(medicament_id, composant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament_medicament (medicament_source INT NOT NULL, medicament_target INT NOT NULL, INDEX IDX_534FDD6C2A4B05F7 (medicament_source), INDEX IDX_534FDD6C33AE5578 (medicament_target), PRIMARY KEY(medicament_source, medicament_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament_presentation (medicament_id INT NOT NULL, presentation_id INT NOT NULL, INDEX IDX_31EE65EBAB0D61F7 (medicament_id), INDEX IDX_31EE65EBAB627E8B (presentation_id), PRIMARY KEY(medicament_id, presentation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, rapport_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_AF86866F1DFBCC46 (rapport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_medicament (offre_id INT NOT NULL, medicament_id INT NOT NULL, INDEX IDX_B7C2151F4CC8505A (offre_id), INDEX IDX_B7C2151FAB0D61F7 (medicament_id), PRIMARY KEY(offre_id, medicament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, specialite_id INT DEFAULT NULL, diplome VARCHAR(10) DEFAULT NULL, coeff_prescription DOUBLE PRECISION DEFAULT NULL, INDEX IDX_62EF7CBA2195E0F0 (specialite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE praticien (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, displomes_id INT DEFAULT NULL, pra_num INT NOT NULL, pra_nom VARCHAR(25) DEFAULT NULL, pra_adresse VARCHAR(50) DEFAULT NULL, pra_cp VARCHAR(5) DEFAULT NULL, pra_ville VARCHAR(25) DEFAULT NULL, pra_coefnotoriete DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D9A27D3C54C8C93 (type_id), INDEX IDX_D9A27D3694DBAFA (displomes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, medicaments_id INT DEFAULT NULL, type_individu_id INT DEFAULT NULL, dosage_id INT DEFAULT NULL, posologie VARCHAR(40) DEFAULT NULL, INDEX IDX_1FBFB8D9C403D7FB (medicaments_id), INDEX IDX_1FBFB8D9312B7B9 (type_individu_id), INDEX IDX_1FBFB8D94E8FD016 (dosage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (id INT AUTO_INCREMENT NOT NULL, pre_code VARCHAR(2) NOT NULL, pre_libelle VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapportvisite (id INT AUTO_INCREMENT NOT NULL, visiteur_id INT DEFAULT NULL, praticien_id INT NOT NULL, rap_num INT NOT NULL, rap_date DATETIME DEFAULT NULL, rap_bilan VARCHAR(255) DEFAULT NULL, rap_motif VARCHAR(255) DEFAULT NULL, INDEX IDX_1A9679F97F72333D (visiteur_id), INDEX IDX_1A9679F92391866B (praticien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, secteur_id INT NOT NULL, reg_code VARCHAR(2) NOT NULL, reg_nom VARCHAR(50) DEFAULT NULL, INDEX IDX_F62F1769F7E4405 (secteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur (id INT AUTO_INCREMENT NOT NULL, sec_code VARCHAR(1) NOT NULL, sec_libelle VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, spe_code VARCHAR(5) NOT NULL, spe_libelle VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeindividu (id INT AUTO_INCREMENT NOT NULL, tin_code VARCHAR(5) NOT NULL, tin_libelle VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typepraticien (id INT AUTO_INCREMENT NOT NULL, typ_code VARCHAR(3) NOT NULL, typ_libelle VARCHAR(25) DEFAULT NULL, typ_lieu VARCHAR(35) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteur (id INT AUTO_INCREMENT NOT NULL, secteur_id INT DEFAULT NULL, departement_id INT NOT NULL, vis_matricule VARCHAR(10) NOT NULL, vis_nom VARCHAR(25) DEFAULT NULL, vis_prenom VARCHAR(50) DEFAULT NULL, vis_adresse VARCHAR(50) DEFAULT NULL, vis_cp VARCHAR(5) DEFAULT NULL, vis_dateembauche DATETIME DEFAULT NULL, INDEX IDX_4EA587B89F7E4405 (secteur_id), INDEX IDX_4EA587B8CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteur_activitecompl (visiteur_id INT NOT NULL, activitecompl_id INT NOT NULL, INDEX IDX_77EA5FAA7F72333D (visiteur_id), INDEX IDX_77EA5FAADD1ECA17 (activitecompl_id), PRIMARY KEY(visiteur_id, activitecompl_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activitecompl_praticien ADD CONSTRAINT FK_CB7AA288DD1ECA17 FOREIGN KEY (activitecompl_id) REFERENCES activitecompl (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activitecompl_praticien ADD CONSTRAINT FK_CB7AA2882391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE constitution_composant ADD CONSTRAINT FK_9F94306FBDA9478A FOREIGN KEY (constitution_id) REFERENCES constitution (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE constitution_composant ADD CONSTRAINT FK_9F94306F7F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723A97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723ABDA9478A FOREIGN KEY (constitution_id) REFERENCES constitution (id)');
        $this->addSql('ALTER TABLE medicament_composant ADD CONSTRAINT FK_330B56BAAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament_composant ADD CONSTRAINT FK_330B56BA7F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament_medicament ADD CONSTRAINT FK_534FDD6C2A4B05F7 FOREIGN KEY (medicament_source) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament_medicament ADD CONSTRAINT FK_534FDD6C33AE5578 FOREIGN KEY (medicament_target) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament_presentation ADD CONSTRAINT FK_31EE65EBAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament_presentation ADD CONSTRAINT FK_31EE65EBAB627E8B FOREIGN KEY (presentation_id) REFERENCES presentation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F1DFBCC46 FOREIGN KEY (rapport_id) REFERENCES rapportvisite (id)');
        $this->addSql('ALTER TABLE offre_medicament ADD CONSTRAINT FK_B7C2151F4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_medicament ADD CONSTRAINT FK_B7C2151FAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE praticien ADD CONSTRAINT FK_D9A27D3C54C8C93 FOREIGN KEY (type_id) REFERENCES typepraticien (id)');
        $this->addSql('ALTER TABLE praticien ADD CONSTRAINT FK_D9A27D3694DBAFA FOREIGN KEY (displomes_id) REFERENCES posseder (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9C403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9312B7B9 FOREIGN KEY (type_individu_id) REFERENCES typeindividu (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D94E8FD016 FOREIGN KEY (dosage_id) REFERENCES dosage (id)');
        $this->addSql('ALTER TABLE rapportvisite ADD CONSTRAINT FK_1A9679F97F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('ALTER TABLE rapportvisite ADD CONSTRAINT FK_1A9679F92391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1769F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE visiteur ADD CONSTRAINT FK_4EA587B89F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE visiteur ADD CONSTRAINT FK_4EA587B8CCF9E01E FOREIGN KEY (departement_id) REFERENCES labo (id)');
        $this->addSql('ALTER TABLE visiteur_activitecompl ADD CONSTRAINT FK_77EA5FAA7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visiteur_activitecompl ADD CONSTRAINT FK_77EA5FAADD1ECA17 FOREIGN KEY (activitecompl_id) REFERENCES activitecompl (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activitecompl_praticien DROP FOREIGN KEY FK_CB7AA288DD1ECA17');
        $this->addSql('ALTER TABLE visiteur_activitecompl DROP FOREIGN KEY FK_77EA5FAADD1ECA17');
        $this->addSql('ALTER TABLE constitution_composant DROP FOREIGN KEY FK_9F94306F7F3310E7');
        $this->addSql('ALTER TABLE medicament_composant DROP FOREIGN KEY FK_330B56BA7F3310E7');
        $this->addSql('ALTER TABLE constitution_composant DROP FOREIGN KEY FK_9F94306FBDA9478A');
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723ABDA9478A');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D94E8FD016');
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723A97A77B84');
        $this->addSql('ALTER TABLE visiteur DROP FOREIGN KEY FK_4EA587B8CCF9E01E');
        $this->addSql('ALTER TABLE medicament_composant DROP FOREIGN KEY FK_330B56BAAB0D61F7');
        $this->addSql('ALTER TABLE medicament_medicament DROP FOREIGN KEY FK_534FDD6C2A4B05F7');
        $this->addSql('ALTER TABLE medicament_medicament DROP FOREIGN KEY FK_534FDD6C33AE5578');
        $this->addSql('ALTER TABLE medicament_presentation DROP FOREIGN KEY FK_31EE65EBAB0D61F7');
        $this->addSql('ALTER TABLE offre_medicament DROP FOREIGN KEY FK_B7C2151FAB0D61F7');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9C403D7FB');
        $this->addSql('ALTER TABLE offre_medicament DROP FOREIGN KEY FK_B7C2151F4CC8505A');
        $this->addSql('ALTER TABLE praticien DROP FOREIGN KEY FK_D9A27D3694DBAFA');
        $this->addSql('ALTER TABLE activitecompl_praticien DROP FOREIGN KEY FK_CB7AA2882391866B');
        $this->addSql('ALTER TABLE rapportvisite DROP FOREIGN KEY FK_1A9679F92391866B');
        $this->addSql('ALTER TABLE medicament_presentation DROP FOREIGN KEY FK_31EE65EBAB627E8B');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F1DFBCC46');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1769F7E4405');
        $this->addSql('ALTER TABLE visiteur DROP FOREIGN KEY FK_4EA587B89F7E4405');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA2195E0F0');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9312B7B9');
        $this->addSql('ALTER TABLE praticien DROP FOREIGN KEY FK_D9A27D3C54C8C93');
        $this->addSql('ALTER TABLE rapportvisite DROP FOREIGN KEY FK_1A9679F97F72333D');
        $this->addSql('ALTER TABLE visiteur_activitecompl DROP FOREIGN KEY FK_77EA5FAA7F72333D');
        $this->addSql('DROP TABLE activitecompl');
        $this->addSql('DROP TABLE activitecompl_praticien');
        $this->addSql('DROP TABLE composant');
        $this->addSql('DROP TABLE constitution');
        $this->addSql('DROP TABLE constitution_composant');
        $this->addSql('DROP TABLE dosage');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE labo');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('DROP TABLE medicament_composant');
        $this->addSql('DROP TABLE medicament_medicament');
        $this->addSql('DROP TABLE medicament_presentation');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE offre_medicament');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE praticien');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE rapportvisite');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE secteur');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE typeindividu');
        $this->addSql('DROP TABLE typepraticien');
        $this->addSql('DROP TABLE visiteur');
        $this->addSql('DROP TABLE visiteur_activitecompl');
    }
}
