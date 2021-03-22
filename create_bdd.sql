SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE activitecompl (
  id int(11) NOT NULL,
  ac_num int(11) NOT NULL,
  ac_date datetime DEFAULT NULL,
  ac_lieu varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ac_theme varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ac_motif varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE activitecompl_praticien (
  activitecompl_id int(11) NOT NULL,
  praticien_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE composant (
  id int(11) NOT NULL,
  cmp_code varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  cmp_libelle varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE constitution (
  id int(11) NOT NULL,
  quantit int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO constitution (id, quantit) VALUES
(1, 0);

CREATE TABLE constitution_composant (
  constitution_id int(11) NOT NULL,
  composant_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE doctrine_migration_versions (
  version varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  executed_at datetime DEFAULT NULL,
  execution_time int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO doctrine_migration_versions (`version`, executed_at, execution_time) VALUES
('DoctrineMigrations\\Version20210322120320', '2021-03-22 13:32:12', 2721),
('DoctrineMigrations\\Version20210322141256', '2021-03-22 14:13:05', 74),
('DoctrineMigrations\\Version20210322143326', '2021-03-22 14:33:34', 59);

CREATE TABLE dosage (
  id int(11) NOT NULL,
  dos_code varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  dos_quantite varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  dos_unite varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE famille (
  id int(11) NOT NULL,
  fam_code varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  fam_libelle varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO famille (id, fam_code, fam_libelle) VALUES
(1, 'AA', 'Antalgiques en association'),
(2, 'AAA', 'Antalgiques antipyrétiques en association'),
(3, 'AAC', 'Antidépresseur d\'action centrale'),
(4, 'AAH', 'Antivertigineux antihistaminique H1'),
(5, 'ABA', 'Antibiotique antituberculeux'),
(6, 'ABC', 'Antibiotique antiacnéique local'),
(7, 'ABP', 'Antibiotique de la famille des béta-lactamines (pénicilline A)'),
(8, 'AFC', 'Antibiotique de la famille des cyclines'),
(9, 'AFM', 'Antibiotique de la famille des macrolides'),
(10, 'AH', 'Antihistaminique H1 local'),
(11, 'AIM', 'Antidépresseur imipraminique (tricyclique)'),
(12, 'AIN', 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'),
(13, 'ALO', 'Antibiotique local (ORL)'),
(14, 'ANS', 'Antidépresseur IMAO non sélectif'),
(15, 'AO', 'Antibiotique ophtalmique'),
(16, 'AP', 'Antipsychotique normothymique'),
(17, 'AUM', 'Antibiotique urinaire minute'),
(18, 'CRT', 'Corticoïde, antibiotique et antifongique à  usage local'),
(19, 'HYP', 'Hypnotique antihistaminique'),
(20, 'PSA', 'Psychostimulant, antiasthénique');

CREATE TABLE labo (
  id int(11) NOT NULL,
  lab_code varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  lab_nom varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  lab_chefvente varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE medicament (
  id int(11) NOT NULL,
  famille_id int(11) DEFAULT NULL,
  constitution_id int(11) NOT NULL,
  med_depotlegal varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  med_nomcommercial varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  med_composition varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  med_contreindic varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  med_prixechantillon double DEFAULT NULL,
  med_effets varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO medicament (id, famille_id, constitution_id, med_depotlegal, med_nomcommercial, med_composition, med_contreindic, med_prixechantillon, med_effets) VALUES
(57, 18, 1, '3MYC7', 'TRIMYCINE', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', NULL, 'Ce médicament est un corticoïde à  activité forte ou très forte associé à  un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.'),
(58, 7, 1, 'ADIMOL9', 'ADIMOL', 'Amoxicilline + Acide clavulanique', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines ou aux céphalosporines.', NULL, 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.'),
(59, 7, 1, 'AMOPIL7', 'AMOPIL', 'Amoxicilline', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL, 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.'),
(60, 7, 1, 'AMOX45', 'AMOXAR', 'Amoxicilline', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', NULL, 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.'),
(61, 7, 1, 'AMOXIG12', 'AMOXI Gé', 'Amoxicilline', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL, 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.'),
(62, 13, 1, 'APATOUX22', 'APATOUX Vitamine C', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', NULL, 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.'),
(63, 6, 1, 'BACTIG10', 'BACTIGEL', 'Erythromycine', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', NULL, 'Ce médicament est utilisé en application locale pour traiter l\'acné et les infections cutanées bactériennes associées.'),
(64, 9, 1, 'BACTIV13', 'BACTIVIL', 'Erythromycine', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL, 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.'),
(65, 2, 1, 'BITALV', 'BIVALIC', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', NULL, 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.'),
(66, 2, 1, 'CARTION6', 'CARTION', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d\'ulcère gastroduodénal, maladies graves du foie.', NULL, 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.'),
(67, 9, 1, 'CLAZER6', 'CLAZER', 'Clarithromycine', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL, 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l\'ulcère gastro-duodénal, en association avec d\'autres médicaments.'),
(68, 11, 1, 'DEPRIL9', 'DEPRAMIL', 'Clomipramine', 'Ce médicament est contre-indiqué en cas de glaucome ou d\'adénome de la prostate, d\'infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d\'allergie aux antidépresseurs imipraminiques.', NULL, 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l\'enfant.'),
(69, 3, 1, 'DIMIRTAM6', 'DIMIRTAM', 'Mirtazapine', 'La prise de ce produit est contre-indiquée en cas de d\'allergie à  l\'un des constituants.', NULL, 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.'),
(70, 2, 1, 'DOLRIL7', 'DOLORIL', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est contre-indiqué en cas d\'allergie au paracétamol ou aux salicylates.', NULL, 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.'),
(71, 19, 1, 'DORNOM8', 'NORMADOR', 'Doxylamine', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l\'enfant de moins de 15 ans.', NULL, 'Ce médicament est utilisé pour traiter l\'insomnie chez l\'adulte.'),
(72, 4, 1, 'EQUILARX6', 'EQUILAR', 'Méclozine', 'Ce médicament ne doit pas être utilisé en cas d\'allergie au produit, en cas de glaucome ou de rétention urinaire.', NULL, 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.'),
(73, 20, 1, 'EVILR7', 'EVEILLOR', 'Adrafinil', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL, 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.'),
(74, 10, 1, 'INSXT5', 'INSECTIL', 'Diphénydramine', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', NULL, 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.'),
(75, 9, 1, 'JOVAI8', 'JOVENIL', 'Josamycine', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL, 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.'),
(76, 8, 1, 'LIDOXY23', 'LIDOXYTRACINE', 'Oxytétracycline +Lidocaïne', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants. Il ne doit pas être associé aux rétinoïdes.', NULL, 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.'),
(77, 16, 1, 'LITHOR12', 'LITHORINE', 'Lithium', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d\'insuffisance rénale, ou si vous avez un régime sans sel.', NULL, 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.'),
(78, 1, 1, 'PARMOL16', 'PARMOCODEINE', 'Codéine + Paracétamol', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, chez l\'enfant de moins de 15 Kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', NULL, 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.'),
(79, 20, 1, 'PHYSOI8', 'PHYSICOR', 'Sulbutiamine', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL, 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique, souvent dans un contexte de dépression.'),
(80, 5, 1, 'PIRIZ8', 'PIRIZAN', 'Pyrazinamide', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'insuffisance rénale ou hépatique, d\'hyperuricémie ou de porphyrie.', NULL, 'Ce médicament est utilisé, en association à  d\'autres antibiotiques, pour traiter la tuberculose.'),
(81, 15, 1, 'POMDI20', 'POMADINE', 'Bacitracine', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques appliqués localement.', NULL, 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l\'oeil.'),
(82, 12, 1, 'TROXT21', 'TROXADET', 'Paroxétine', 'Ce médicament est contre-indiqué en cas d\'allergie au produit.', NULL, 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.'),
(83, 13, 1, 'TXISOL22', 'TOUXISOL Vitamine C', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants et chez l\'enfant de moins de 6 ans.', NULL, 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.'),
(84, 17, 1, 'URIEG6', 'URIREGUL', 'Fosfomycine trométamol', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à  l\'un des constituants et d\'insuffisance rénale.', NULL, 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.');

CREATE TABLE medicament_composant (
  medicament_id int(11) NOT NULL,
  composant_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE medicament_medicament (
  medicament_source int(11) NOT NULL,
  medicament_target int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE medicament_presentation (
  medicament_id int(11) NOT NULL,
  presentation_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE offre (
  id int(11) NOT NULL,
  rapport_id int(11) NOT NULL,
  quantite int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO offre (id, rapport_id, quantite) VALUES
(3, 2, 3),
(4, 2, 12);

CREATE TABLE offre_medicament (
  offre_id int(11) NOT NULL,
  medicament_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO offre_medicament (offre_id, medicament_id) VALUES
(3, 57),
(4, 60);

CREATE TABLE posseder (
  id int(11) NOT NULL,
  specialite_id int(11) DEFAULT NULL,
  diplome varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  coeff_prescription double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE praticien (
  id int(11) NOT NULL,
  type_id int(11) NOT NULL,
  displomes_id int(11) DEFAULT NULL,
  pra_num int(11) NOT NULL,
  pra_nom varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  pra_adresse varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  pra_cp varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  pra_ville varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  pra_coefnotoriete double DEFAULT NULL,
  pra_prenom varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO praticien (id, type_id, displomes_id, pra_num, pra_nom, pra_adresse, pra_cp, pra_ville, pra_coefnotoriete, pra_prenom) VALUES
(1, 1, NULL, 1, 'Notini', '114 r Authie', '85000', 'LA ROCHE SUR YON', 290.03, 'Alain'),
(2, 2, NULL, 2, 'Gosselin', '13 r Devon', '41000', 'BLOIS', 307.49, 'Albert'),
(3, 5, NULL, 3, 'Delahaye', '36 av 6 Juin', '25000', 'BESANCON', 185.79, 'André'),
(4, 3, NULL, 4, 'Leroux', '47 av Robert Schuman', '60000', 'BEAUVAIS', 172.04, 'André'),
(5, 4, NULL, 5, 'Desmoulins', '31 r St Jean', '30000', 'NIMES', 94.75, 'Anne'),
(6, 1, NULL, 6, 'Mouel', '27 r Auvergne', '80000', 'AMIENS', 45.2, 'Anne'),
(7, 2, NULL, 7, 'Desgranges-Lentz', '1 r Albert de Mun', '29000', 'MORLAIX', 20.07, 'Antoine'),
(8, 5, NULL, 8, 'Marcouiller', '31 r St Jean', '68000', 'MULHOUSE', 396.52, 'Arnaud'),
(9, 3, NULL, 9, 'Dupuy', '9 r Demolombe', '34000', 'MONTPELLIER', 395.66, 'Benoit'),
(10, 4, NULL, 10, 'Lerat', '31 r St Jean', '59000', 'LILLE', 257.79, 'Bernard'),
(11, 1, NULL, 11, 'Marçais-Lefebvre', '86Bis r Basse', '67000', 'STRASBOURG', 450.96, 'Bertrand'),
(12, 2, NULL, 12, 'Boscher', '94 r Falaise', '10000', 'TROYES', 356.14, 'Bruno'),
(13, 5, NULL, 13, 'Morel', '21 r Chateaubriand', '75000', 'PARIS', 379.57, 'Catherine'),
(14, 3, NULL, 14, 'Guivarch', '4 av Gén Laperrine', '45000', 'ORLEANS', 114.56, 'Chantal'),
(15, 4, NULL, 15, 'Bessin-Grosdoit', '92 r Falaise', '6000', 'NICE', 222.06, 'Christo3e'),
(16, 1, NULL, 16, 'Rossa', '14 av Thiès', '6000', 'NICE', 529.78, 'Claire'),
(17, 2, NULL, 17, 'Cauchy', '5 av Ste Thérèse', '11000', 'NARBONNE', 458.82, 'Denis'),
(18, 5, NULL, 18, 'Gaffé', '9 av 1ère Armée Française', '35000', 'RENNES', 213.4, 'Dominique'),
(19, 3, NULL, 19, 'Guenon', '98 bd Mar Lyautey', '44000', 'NANTES', 175.89, 'Dominique'),
(20, 4, NULL, 20, 'Prévot', '29 r Lucien Nelle', '87000', 'LIMOGES', 151.36, 'Dominique'),
(21, 1, NULL, 21, 'Houchard', '9 r Demolombe', '49100', 'ANGERS', 436.96, 'Eliane'),
(22, 2, NULL, 22, 'Desmons', '51 r Bernières', '29000', 'QUIMPER', 281.17, 'Elisabeth'),
(23, 5, NULL, 23, 'Flament', '11 r Pasteur', '35000', 'RENNES', 315.6, 'Elisabeth'),
(24, 3, NULL, 24, 'Goussard', '9 r Demolombe', '41000', 'BLOIS', 40.72, 'Emmanuel'),
(25, 4, NULL, 25, 'Desprez', '9 r Vaucelles', '33000', 'BORDEAUX', 406.85, 'Eric'),
(26, 1, NULL, 26, 'Coste', '29 r Lucien Nelle', '19000', 'TULLE', 441.87, 'Evelyne'),
(27, 2, NULL, 27, 'Lefebvre', '2 pl Wurzburg', '55000', 'VERDUN', 573.63, 'Frédéric'),
(28, 5, NULL, 28, 'Lemée', '29 av 6 Juin', '56000', 'VANNES', 326.4, 'Frédéric'),
(29, 3, NULL, 29, 'Martin', 'Bât A 90 r Bayeux', '70000', 'VESOUL', 506.06, 'Frédéric'),
(30, 4, NULL, 30, 'Marie', '172 r Ca4nière', '70000', 'VESOUL', 313.31, 'Frédérique'),
(31, 1, NULL, 31, 'Rosenstech', '27 r Auvergne', '75000', 'PARIS', 366.82, 'Geneviève'),
(32, 2, NULL, 32, '4ntavice', '8 r Gaillon', '86000', '4ITIERS', 265.58, 'Ghislaine'),
(33, 5, NULL, 33, 'Leveneur-Mosquet', '47 av Robert Schuman', '64000', 'PAU', 184.97, 'Guillaume'),
(34, 3, NULL, 34, 'Blanchais', '30 r Authie', '8000', 'SEDAN', 502.48, 'Guy'),
(35, 4, NULL, 35, 'Leveneur', '7 pl St Gilles', '62000', 'ARRAS', 7.39, 'Hugues'),
(36, 1, NULL, 36, 'Mosquet', '22 r Jules Verne', '76000', 'ROUEN', 77.1, 'Isabelle'),
(37, 2, NULL, 37, 'Giraudon', '1 r Albert de Mun', '38100', 'VIENNE', 92.62, 'Jean-Christo3e'),
(38, 5, NULL, 38, 'Marie', '26 r Hérouville', '69000', 'LYON', 120.1, 'Jean-Claude'),
(39, 3, NULL, 39, 'Maury', '5 r Pierre Girard', '71000', 'CHALON SUR SAONE', 13.73, 'Jean-François'),
(40, 4, NULL, 40, 'Dennel', '7 pl St Gilles', '28000', 'CHARTRES', 550.69, 'Jean-Louis'),
(41, 1, NULL, 41, 'Ain', '4 résid Olympia', '2000', 'LAON', 5.59, 'Jean-Pierre'),
(42, 2, NULL, 42, 'Chemery', '51 pl Ancienne Boucherie', '14000', 'CAEN', 396.58, 'Jean-Pierre'),
(43, 5, NULL, 43, 'Comoz', '35 r Auguste Lechesne', '18000', 'BOURGES', 340.35, 'Jean-Pierre'),
(44, 3, NULL, 44, 'Desfaudais', '7 pl St Gilles', '29000', 'BREST', 71.76, 'Jean-Pierre'),
(45, 4, NULL, 45, '3an', '9 r Clos Caillet', '79000', 'NIORT', 451.61, 'JérÃ´me'),
(46, 1, NULL, 46, 'Riou', '43 bd Gén Vanier', '77000', 'MARNE LA VALLEE', 193.25, 'Line'),
(47, 2, NULL, 47, 'Chubilleau', '46 r Eglise', '17000', 'SAINTES', 202.07, 'Louis'),
(48, 5, NULL, 48, 'Lebrun', '178 r Auge', '54000', 'NANCY', 410.41, 'Lucette'),
(49, 3, NULL, 49, 'Goessens', '6 av 6 Juin', '39000', 'DOLE', 548.57, 'Marc'),
(50, 4, NULL, 50, 'Laforge', '5 résid Prairie', '50000', 'SAINT LO', 265.05, 'Marc'),
(51, 1, NULL, 51, 'Millereau', '36 av 6 Juin', '72000', 'LA FERTE BERNARD', 430.42, 'Marc'),
(52, 2, NULL, 52, 'Dauverne', '69 av Charlemagne', '21000', 'DIJON', 281.05, 'Marie-Christine'),
(53, 5, NULL, 53, 'Vittorio', '3 pl Champlain', '94000', 'BOISSY SAINT LEGER', 356.23, 'Myriam'),
(54, 3, NULL, 54, 'Lapasset', '31 av 6 Juin', '52000', 'CHAUMONT', 107, 'Nhieu'),
(55, 4, NULL, 55, 'Plantet-Besnier', '10 av 1ère Armée Française', '86000', 'CHATELLEREAULT', 369.94, 'Nicole'),
(56, 1, NULL, 56, 'Chubilleau', '3 r Hastings', '15000', 'AURRILLAC', 290.75, 'Pascal'),
(57, 2, NULL, 57, 'Robert', '31 r St Jean', '93000', 'BOBIGNY', 162.41, 'Pascal'),
(58, 5, NULL, 58, 'Jean', '114 r Authie', '49100', 'SAUMUR', 375.52, 'Pascale'),
(59, 3, NULL, 59, 'Chanteloube', '14 av Thiès', '13000', 'MARSEILLE', 478.01, 'Patrice'),
(60, 4, NULL, 60, 'Lecuirot', 'résid St Pères 55 r Pigacière', '54000', 'NANCY', 239.66, 'Patrice'),
(61, 1, NULL, 61, 'Gandon', '47 av Robert Schuman', '37000', 'TOURS', 599.06, 'Patrick'),
(62, 2, NULL, 62, 'Mirouf', '22 r Puits Picard', '74000', 'ANNECY', 458.42, 'Patrick'),
(63, 5, NULL, 63, 'Boireaux', '14 av Thiès', '10000', 'CHALON EN CHAMPAGNE', 454.48, '3ilippe'),
(64, 3, NULL, 64, 'Cendrier', '7 pl St Gilles', '12000', 'RODEZ', 164.16, '3ilippe'),
(65, 4, NULL, 65, 'Duhamel', '114 r Authie', '34000', 'MONTPELLIER', 98.62, '3ilippe'),
(66, 1, NULL, 66, 'Grigy', '15 r Mélingue', '44000', 'CLISSON', 285.1, '3ilippe'),
(67, 2, NULL, 67, 'Linard', '1 r Albert de Mun', '81000', 'ALBI', 486.3, '3ilippe'),
(68, 5, NULL, 68, 'Lozier', '8 r Gaillon', '31000', 'TOULOUSE', 48.4, '3ilippe'),
(69, 3, NULL, 69, 'Dechâtre', '63 av Thiès', '23000', 'MONTLUCON', 253.75, 'Pierre'),
(70, 4, NULL, 70, 'Goessens', '22 r Jean Romain', '40000', 'MONT DE MARSAN', 426.19, 'Pierre'),
(71, 1, NULL, 71, 'Leménager', '39 av 6 Juin', '57000', 'METZ', 118.7, 'Pierre'),
(72, 2, NULL, 72, 'Née', '39 av 6 Juin', '82000', 'MONTAUBAN', 72.54, 'Pierre'),
(73, 5, NULL, 73, 'Guyot', '43 bd Gén Vanier', '48000', 'MENDE', 352.31, 'Pierre-Laurent'),
(74, 3, NULL, 74, 'Chauchard', '9 r Vaucelles', '13000', 'MARSEILLE', 552.19, 'Roger'),
(75, 4, NULL, 75, 'Mabire', '11 r Boutiques', '67000', 'STRASBOURG', 422.39, 'Roland'),
(76, 1, NULL, 76, 'Leroy', '45 r Boutiques', '61000', 'ALENCON', 570.67, 'Soazig'),
(77, 2, NULL, 77, 'Guyot', '26 r Hérouville', '46000', 'FIGEAC', 28.85, 'Sté3ane'),
(78, 5, NULL, 78, 'Del4sen', '39 av 6 Juin', '27000', 'DREUX', 292.01, 'Sylvain'),
(79, 3, NULL, 79, 'Rault', '15 bd Richemond', '2000', 'SOISSON', 526.6, 'Sylvie'),
(80, 4, NULL, 80, 'Renouf', '98 bd Mar Lyautey', '88000', 'EPINAL', 425.24, 'Sylvie'),
(81, 1, NULL, 81, 'Alliet-Grach', '14 av Thiès', '7000', 'PRIVAS', 451.31, 'Thierry'),
(82, 2, NULL, 82, 'Bayard', '92 r Falaise', '42000', 'SAINT ETIENNE', 271.71, 'Thierry'),
(83, 5, NULL, 83, 'Gauchet', '7 r Desmoueux', '38100', 'GRENOBLE', 406.1, 'Thierry'),
(84, 3, NULL, 84, 'Bobichon', '219 r Ca4nière', '9000', 'FOIX', 218.36, 'Tristan'),
(85, 4, NULL, 85, 'Duchemin-Laniel', '130 r St Jean', '33000', 'LIBOURNE', 265.61, 'Véronique'),
(86, 1, NULL, 86, 'Laurent', '34 r Demolombe', '53000', 'MAYENNE', 496.1, 'Younès');

CREATE TABLE prescription (
  id int(11) NOT NULL,
  medicaments_id int(11) DEFAULT NULL,
  type_individu_id int(11) DEFAULT NULL,
  dosage_id int(11) DEFAULT NULL,
  posologie varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE presentation (
  id int(11) NOT NULL,
  pre_code varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  pre_libelle varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE rapportvisite (
  id int(11) NOT NULL,
  visiteur_id int(11) DEFAULT NULL,
  praticien_id int(11) NOT NULL,
  rap_num int(11) NOT NULL,
  rap_date datetime DEFAULT NULL,
  rap_bilan varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  rap_motif varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO rapportvisite (id, visiteur_id, praticien_id, rap_num, rap_date, rap_bilan, rap_motif) VALUES
(1, 1, 23, 3, '2002-04-18 00:00:00', 'Médecin curieux, à recontacer en décembre pour réunion', 'Actualisation annuelle'),
(2, 2, 4, 4, '2003-05-21 00:00:00', 'Changement de direction, redéfinition de la politique médicamenteuse, recours au générique', 'Baisse activité'),
(3, 1, 41, 7, '2003-03-23 00:00:00', 'RAS\r\nChangement de tel : 05 89 89 89 89', 'Rapport Annuel');

CREATE TABLE region (
  id int(11) NOT NULL,
  secteur_id int(11) NOT NULL,
  reg_code varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  reg_nom varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO region (id, secteur_id, reg_code, reg_nom) VALUES
(1, 1, 'AL', 'Alsace Lorraine'),
(2, 5, 'AQ', 'Aquitaine'),
(3, 4, 'AU', 'Auvergne'),
(4, 3, 'BG', 'Bretagne'),
(5, 3, 'BN', 'Basse Normandie'),
(6, 1, 'BO', 'Bourgogne'),
(7, 2, 'CA', 'Champagne Ardennes'),
(8, 4, 'CE', 'Centre'),
(9, 1, 'FC', 'Franche Comté'),
(10, 2, 'HN', 'Haute Normandie'),
(11, 4, 'IF', 'Ile de France'),
(12, 5, 'LG', 'Languedoc'),
(13, 4, 'LI', 'Limousin'),
(14, 5, 'MP', 'Midi Pyrénée'),
(15, 2, 'NP', 'Nord Pas de Calais'),
(16, 5, 'PA', 'Provence Alpes Cote d\'Azur'),
(17, 3, 'PC', 'Poitou Charente'),
(18, 2, 'PI', 'Picardie'),
(19, 3, 'PL', 'Pays de Loire'),
(20, 1, 'RA', 'Rhone Alpes'),
(21, 5, 'RO', 'Roussilon'),
(22, 3, 'VD', 'Vendée');

CREATE TABLE secteur (
  id int(11) NOT NULL,
  sec_code varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  sec_libelle varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO secteur (id, sec_code, sec_libelle) VALUES
(1, 'E', 'Est'),
(2, 'N', 'Nord'),
(3, 'O', 'Ouest'),
(4, 'P', 'Paris centre'),
(5, 'S', 'Sud');

CREATE TABLE specialite (
  id int(11) NOT NULL,
  spe_code varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  spe_libelle varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO specialite (id, spe_code, spe_libelle) VALUES
(1, 'ACP', 'anatomie et cytologie pathologiques'),
(2, 'AMV', 'angéiologie, médecine vasculaire'),
(3, 'ARC', 'anesthésiologie et réanimation chirurgicale'),
(4, 'BM', 'biologie médicale'),
(5, 'CAC', 'cardiologie et affections cardio-vasculaires'),
(6, 'CCT', 'chirurgie cardio-vasculaire et thoracique'),
(7, 'CG', 'chirurgie générale'),
(8, 'CMF', 'chirurgie maxillo-faciale'),
(9, 'COM', 'cancérologie, oncologie médicale'),
(10, 'COT', 'chirurgie orthopédique et traumatologie'),
(11, 'CPR', 'chirurgie plastique reconstructrice et esthétique'),
(12, 'CU', 'chirurgie urologique'),
(13, 'CV', 'chirurgie vasculaire'),
(14, 'DN', 'diabétologie-nutrition, nutrition'),
(15, 'DV', 'dermatologie et vénéréologie'),
(16, 'EM', 'endocrinologie et métabolismes'),
(17, 'ETD', 'évaluation et traitement de la douleur'),
(18, 'GEH', 'gastro-entérologie et hépatologie (appareil digestif)'),
(19, 'GMO', 'gynécologie médicale, obstétrique'),
(20, 'GO', 'gynécologie-obstétrique'),
(21, 'HEM', 'maladies du sang (hématologie)'),
(22, 'MBS', 'médecine et biologie du sport'),
(23, 'MDT', 'médecine du travail'),
(24, 'MMO', 'médecine manuelle - ostéopathie'),
(25, 'MN', 'médecine nucléaire'),
(26, 'MPR', 'médecine physique et de réadaptation'),
(27, 'MTR', 'médecine tropicale, pathologie infectieuse et tropicale'),
(28, 'NEP', 'néphrologie'),
(29, 'NRC', 'neurochirurgie'),
(30, 'NRL', 'neurologie'),
(31, 'ODM', 'orthopédie dento maxillo-faciale'),
(32, 'OPH', 'ophtalmologie'),
(33, 'ORL', 'oto-rhino-laryngologie'),
(34, 'PEA', 'psychiatrie de l\'enfant et de l\'adolescent'),
(35, 'PME', 'pédiatrie maladies des enfants'),
(36, 'PNM', 'pneumologie'),
(37, 'PSC', 'psychiatrie'),
(38, 'RAD', 'radiologie (radiodiagnostic et imagerie médicale)'),
(39, 'RDT', 'radiothérapie (oncologie option radiothérapie)'),
(40, 'RGM', 'reproduction et gynécologie médicale'),
(41, 'RHU', 'rhumatologie'),
(42, 'STO', 'stomatologie'),
(43, 'SXL', 'sexologie'),
(44, 'TXA', 'toxicomanie et alcoologie');

CREATE TABLE typeindividu (
  id int(11) NOT NULL,
  tin_code varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  tin_libelle varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE typepraticien (
  id int(11) NOT NULL,
  typ_code varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  typ_libelle varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  typ_lieu varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO typepraticien (id, typ_code, typ_libelle, typ_lieu) VALUES
(1, 'MH', 'Médecin Hospitalier', 'Hopital ou clinique'),
(2, 'MV', 'Médecine de Ville', 'Cabinet'),
(3, 'PH', 'Pharmacien Hospitalier', 'Hopital ou clinique'),
(4, 'PO', 'Pharmacien Officine', 'Pharmacie'),
(5, 'PS', 'Personnel de santé', 'Centre paramédical');

CREATE TABLE visiteur (
  id int(11) NOT NULL,
  secteur_id int(11) DEFAULT NULL,
  departement_id int(11) DEFAULT NULL,
  vis_matricule varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  vis_nom varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  vis_prenom varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  vis_adresse varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  vis_cp varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  vis_dateembauche datetime DEFAULT NULL,
  vis_ville varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO visiteur (id, secteur_id, departement_id, vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_dateembauche, vis_ville) VALUES
(1, NULL, NULL, 'a131', 'Villechalane', 'Louis', '8 cours Lafontaine', '29000', '1992-12-11 00:00:00', 'BREST'),
(2, NULL, NULL, 'a17', 'Andre', 'David', '1 r 11on de Chissée', '38100', '1991-08-26 00:00:00', 'GRENOBLE'),
(3, NULL, NULL, 'a55', 'Bedos', 'Christian', '1 r Bénédictins', '65000', '1987-07-17 00:00:00', 'TARBES'),
(4, NULL, NULL, 'a93', 'Tusseau', 'Louis', '22 r Renou', '86000', '1999-01-02 00:00:00', 'POITIERS'),
(5, NULL, NULL, 'b13', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', '1996-03-11 00:00:00', 'STRASBOURG'),
(6, NULL, NULL, 'b16', 'Bioret', 'Luc', '1 r Linne', '35000', '1997-03-21 00:00:00', 'RENNES'),
(7, NULL, NULL, 'b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', '1999-01-31 00:00:00', 'LA ROCHE SUR YON'),
(8, NULL, NULL, 'b25', 'Bunisset', 'Denise', '1 r Lionne', '49100', '1994-07-03 00:00:00', 'ANGERS'),
(9, NULL, NULL, 'b28', 'Cacheux', 'Bernard', '114 r Authie', '34000', '2000-08-02 00:00:00', 'MONTPELLIER'),
(10, NULL, NULL, 'b34', 'Cadic', 'Eric', '123 r Caponière', '41000', '1993-12-06 00:00:00', 'BLOIS'),
(11, NULL, NULL, 'b4', 'Charoze', 'Catherine', '100 pl Géants', '33000', '1997-09-25 00:00:00', 'BORDEAUX'),
(12, NULL, NULL, 'b50', 'Clepkens', 'Christophe', '12 r Fédérico Garcia Lorca', '13000', '1998-01-18 00:00:00', 'MARSEILLE'),
(13, NULL, NULL, 'b59', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', '1995-10-21 00:00:00', 'GAP'),
(14, NULL, NULL, 'c14', 'Daburon', 'François', '13 r Champs Elysées', '6000', '1989-02-01 00:00:00', 'NICE'),
(15, NULL, NULL, 'c3', 'De', 'Philippe', '13 r Charles Peguy', '10000', '1992-05-05 00:00:00', 'TROYES'),
(16, NULL, NULL, 'c54', 'Debelle', 'Michel', '181 r Caponière', '88000', '1991-04-09 00:00:00', 'EPINAL'),
(17, NULL, NULL, 'd13', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', '1991-12-05 00:00:00', 'NANTES'),
(18, NULL, NULL, 'd51', 'Debroise', 'Michel', '2 av 6 Juin', '70000', '1997-11-18 00:00:00', 'VESOUL'),
(19, NULL, NULL, 'e22', 'Desmarquest', 'Nathalie', '14 r Fédérico Garcia Lorca', '54000', '1989-03-24 00:00:00', 'NANCY'),
(20, NULL, NULL, 'e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', '1993-05-17 00:00:00', 'VERDUN'),
(21, NULL, NULL, 'e39', 'Dudouit', 'Frédéric', '18 quai Xavier Jouvin', '75000', '1988-04-26 00:00:00', 'PARIS'),
(22, NULL, NULL, 'e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', '1996-02-19 00:00:00', 'FOIX'),
(23, NULL, NULL, 'e5', 'Enault-Pascreau', 'Céline', '25B r Stalingrad', '40000', '1990-11-27 00:00:00', 'MONT DE MARSAN'),
(24, NULL, NULL, 'e52', 'Eynde', 'Valérie', '3 r Henri Moissan', '76000', '1991-10-31 00:00:00', 'ROUEN'),
(25, NULL, NULL, 'f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', '1993-06-08 00:00:00', 'ANNECY'),
(26, NULL, NULL, 'f39', 'Frémont', 'Fernande', '4 r Jean Giono', '69000', '1997-02-15 00:00:00', 'LYON'),
(27, NULL, NULL, 'f4', 'Gest', 'Alain', '30 r Authie', '46000', '1994-05-03 00:00:00', 'FIGEAC'),
(28, NULL, NULL, 'g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', '1996-01-18 00:00:00', 'PARIS'),
(29, NULL, NULL, 'g30', 'Girard', 'Yvon', '31 av 6 Juin', '80000', '1999-03-27 00:00:00', 'AMIENS'),
(30, NULL, NULL, 'g53', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', '1985-10-02 00:00:00', 'VANNES'),
(31, NULL, NULL, 'g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', '1996-01-13 00:00:00', 'LIMOGES'),
(32, NULL, NULL, 'h13', 'Guindon', 'François', '44 r Picotière', '19000', '1993-05-08 00:00:00', 'TULLE'),
(33, NULL, NULL, 'h30', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', '1998-04-26 00:00:00', 'CRETEIL'),
(34, NULL, NULL, 'h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', '1993-08-26 00:00:00', 'AURRILLAC'),
(35, NULL, NULL, 'h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaurès', '8000', '1992-11-01 00:00:00', 'SEDAN'),
(36, NULL, NULL, 'j45', 'Labouré-Morel', 'Saout', '38 cours Berriat', '52000', '1998-02-25 00:00:00', 'CHAUMONT'),
(37, NULL, NULL, 'j50', 'Landré', 'Philippe', '4 av Gén Laperrine', '59000', '1992-12-16 00:00:00', 'LILLE'),
(38, NULL, NULL, 'j8', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', '1998-06-18 00:00:00', 'BAGNOLET'),
(39, NULL, NULL, 'k4', 'Lanne', 'Bernard', '4 r Bayeux', '30000', '1996-11-21 00:00:00', 'NIMES'),
(40, NULL, NULL, 'k53', 'Le', 'Noël', '4 av Beauvert', '68000', '1983-03-23 00:00:00', 'MULHOUSE'),
(41, NULL, NULL, 'l14', 'Le', 'Jean', '39 r Raspail', '53000', '1995-02-02 00:00:00', 'LAVAL'),
(42, NULL, NULL, 'l23', 'Leclercq', 'Servane', '11 r Quinconce', '18000', '1995-06-05 00:00:00', 'BOURGES'),
(43, NULL, NULL, 'l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', '1997-01-24 00:00:00', 'LA FERTE BERNARD'),
(44, NULL, NULL, 'l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', '1996-02-27 00:00:00', 'BESANCON'),
(45, NULL, NULL, 'm35', 'Lejard', 'Agnès', '4 r Anthoard', '82000', '1987-10-06 00:00:00', 'MONTAUBAN'),
(46, NULL, NULL, 'm45', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', '1990-10-13 00:00:00', 'METZ'),
(47, NULL, NULL, 'n42', 'Letessier', 'Stéphane', '5 chem Capuche', '27000', '1996-03-06 00:00:00', 'EVREUX'),
(48, NULL, NULL, 'n58', 'Loirat', 'Didier', 'Les Pêchers cité Bourg la Croix', '45000', '1992-08-30 00:00:00', 'ORLEANS'),
(49, NULL, NULL, 'n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', '1994-12-19 00:00:00', 'LAON'),
(50, NULL, NULL, 'o26', 'Mancini', 'Anne', '5 r D\'Agier', '48000', '1995-01-05 00:00:00', 'MENDE'),
(51, NULL, NULL, 'p32', 'Marcouiller', 'Gérard', '7 pl St Gilles', '91000', '1992-12-24 00:00:00', 'ISSY LES MOULINEAUX'),
(52, NULL, NULL, 'p40', 'Michel', 'Jean-Claude', '5 r Gabriel Péri', '61000', '1992-12-14 00:00:00', 'FLERS'),
(53, NULL, NULL, 'p41', 'Montecot', 'Françoise', '6 r Paul Valéry', '17000', '1998-07-27 00:00:00', 'SAINTES'),
(54, NULL, NULL, 'p42', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', '1994-12-12 00:00:00', 'BEAUVAIS'),
(55, NULL, NULL, 'p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', '1977-10-03 00:00:00', 'TOURS'),
(56, NULL, NULL, 'p6', 'Pascreau', 'Charles', '57 bd Mar Foch', '64000', '1997-03-30 00:00:00', 'PAU'),
(57, NULL, NULL, 'p7', 'Pernot', 'Claude-Noël', '6 r Alexandre 1 de Yougoslavie', '11000', '1990-03-01 00:00:00', 'NARBONNE'),
(58, NULL, NULL, 'p8', 'Perrier', 'Maître', '6 r Aubert Dubayet', '71000', '1991-06-23 00:00:00', 'CHALON SUR SAONE'),
(59, NULL, NULL, 'q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', '1997-09-06 00:00:00', 'SAINT LO'),
(60, NULL, NULL, 'r24', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', '1984-07-29 00:00:00', 'CAEN'),
(61, NULL, NULL, 'r58', 'Quiquandon', 'Joël', '7 r Ernest Renan', '29000', '1990-06-30 00:00:00', 'QUIMPER'),
(62, NULL, NULL, 's10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', '1995-11-14 00:00:00', 'DOLE'),
(63, NULL, NULL, 's21', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', '1992-09-25 00:00:00', 'MONTLUCON'),
(64, NULL, NULL, 't43', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', '1995-03-09 00:00:00', 'DIJON'),
(65, NULL, NULL, 't47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', '1997-08-29 00:00:00', 'ARRAS'),
(66, NULL, NULL, 't55', 'Tréhet', 'Alain', '7D chem Barral', '12000', '1994-11-29 00:00:00', 'RODEZ'),
(67, NULL, NULL, 't60', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', '1991-03-29 00:00:00', 'CHARTRES'),
(68, NULL, NULL, 'zzz', 'swiss', 'bourdin', NULL, NULL, '2003-06-18 00:00:00', NULL);

CREATE TABLE visiteur_activitecompl (
  visiteur_id int(11) NOT NULL,
  activitecompl_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE activitecompl
  ADD PRIMARY KEY (id);

ALTER TABLE activitecompl_praticien
  ADD PRIMARY KEY (activitecompl_id,praticien_id),
  ADD KEY IDX_CB7AA288DD1ECA17 (activitecompl_id),
  ADD KEY IDX_CB7AA2882391866B (praticien_id);

ALTER TABLE composant
  ADD PRIMARY KEY (id);

ALTER TABLE constitution
  ADD PRIMARY KEY (id);

ALTER TABLE constitution_composant
  ADD PRIMARY KEY (constitution_id,composant_id),
  ADD KEY IDX_9F94306FBDA9478A (constitution_id),
  ADD KEY IDX_9F94306F7F3310E7 (composant_id);

ALTER TABLE doctrine_migration_versions
  ADD PRIMARY KEY (version);

ALTER TABLE dosage
  ADD PRIMARY KEY (id);

ALTER TABLE famille
  ADD PRIMARY KEY (id);

ALTER TABLE labo
  ADD PRIMARY KEY (id);

ALTER TABLE medicament
  ADD PRIMARY KEY (id),
  ADD KEY IDX_9A9C723A97A77B84 (famille_id),
  ADD KEY IDX_9A9C723ABDA9478A (constitution_id);

ALTER TABLE medicament_composant
  ADD PRIMARY KEY (medicament_id,composant_id),
  ADD KEY IDX_330B56BAAB0D61F7 (medicament_id),
  ADD KEY IDX_330B56BA7F3310E7 (composant_id);

ALTER TABLE medicament_medicament
  ADD PRIMARY KEY (medicament_source,medicament_target),
  ADD KEY IDX_534FDD6C2A4B05F7 (medicament_source),
  ADD KEY IDX_534FDD6C33AE5578 (medicament_target);

ALTER TABLE medicament_presentation
  ADD PRIMARY KEY (medicament_id,presentation_id),
  ADD KEY IDX_31EE65EBAB0D61F7 (medicament_id),
  ADD KEY IDX_31EE65EBAB627E8B (presentation_id);

ALTER TABLE offre
  ADD PRIMARY KEY (id),
  ADD KEY IDX_AF86866F1DFBCC46 (rapport_id);

ALTER TABLE offre_medicament
  ADD PRIMARY KEY (offre_id,medicament_id),
  ADD KEY IDX_B7C2151F4CC8505A (offre_id),
  ADD KEY IDX_B7C2151FAB0D61F7 (medicament_id);

ALTER TABLE posseder
  ADD PRIMARY KEY (id),
  ADD KEY IDX_62EF7CBA2195E0F0 (specialite_id);

ALTER TABLE praticien
  ADD PRIMARY KEY (id),
  ADD KEY IDX_D9A27D3C54C8C93 (type_id),
  ADD KEY IDX_D9A27D3694DBAFA (displomes_id);

ALTER TABLE prescription
  ADD PRIMARY KEY (id),
  ADD KEY IDX_1FBFB8D9C403D7FB (medicaments_id),
  ADD KEY IDX_1FBFB8D9312B7B9 (type_individu_id),
  ADD KEY IDX_1FBFB8D94E8FD016 (dosage_id);

ALTER TABLE presentation
  ADD PRIMARY KEY (id);

ALTER TABLE rapportvisite
  ADD PRIMARY KEY (id),
  ADD KEY IDX_1A9679F97F72333D (visiteur_id),
  ADD KEY IDX_1A9679F92391866B (praticien_id);

ALTER TABLE region
  ADD PRIMARY KEY (id),
  ADD KEY IDX_F62F1769F7E4405 (secteur_id);

ALTER TABLE secteur
  ADD PRIMARY KEY (id);

ALTER TABLE specialite
  ADD PRIMARY KEY (id);

ALTER TABLE typeindividu
  ADD PRIMARY KEY (id);

ALTER TABLE typepraticien
  ADD PRIMARY KEY (id);

ALTER TABLE visiteur
  ADD PRIMARY KEY (id),
  ADD KEY IDX_4EA587B89F7E4405 (secteur_id),
  ADD KEY IDX_4EA587B8CCF9E01E (departement_id);

ALTER TABLE visiteur_activitecompl
  ADD PRIMARY KEY (visiteur_id,activitecompl_id),
  ADD KEY IDX_77EA5FAA7F72333D (visiteur_id),
  ADD KEY IDX_77EA5FAADD1ECA17 (activitecompl_id);


ALTER TABLE activitecompl
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE composant
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE constitution
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE dosage
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE famille
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE labo
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE medicament
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

ALTER TABLE offre
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE posseder
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE praticien
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

ALTER TABLE prescription
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE presentation
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE rapportvisite
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE region
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE secteur
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE specialite
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

ALTER TABLE typeindividu
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE typepraticien
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE visiteur
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;


ALTER TABLE activitecompl_praticien
  ADD CONSTRAINT FK_CB7AA2882391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_CB7AA288DD1ECA17 FOREIGN KEY (activitecompl_id) REFERENCES activitecompl (id) ON DELETE CASCADE;

ALTER TABLE constitution_composant
  ADD CONSTRAINT FK_9F94306F7F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_9F94306FBDA9478A FOREIGN KEY (constitution_id) REFERENCES constitution (id) ON DELETE CASCADE;

ALTER TABLE medicament
  ADD CONSTRAINT FK_9A9C723A97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id),
  ADD CONSTRAINT FK_9A9C723ABDA9478A FOREIGN KEY (constitution_id) REFERENCES constitution (id);

ALTER TABLE medicament_composant
  ADD CONSTRAINT FK_330B56BA7F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_330B56BAAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE;

ALTER TABLE medicament_medicament
  ADD CONSTRAINT FK_534FDD6C2A4B05F7 FOREIGN KEY (medicament_source) REFERENCES medicament (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_534FDD6C33AE5578 FOREIGN KEY (medicament_target) REFERENCES medicament (id) ON DELETE CASCADE;

ALTER TABLE medicament_presentation
  ADD CONSTRAINT FK_31EE65EBAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_31EE65EBAB627E8B FOREIGN KEY (presentation_id) REFERENCES presentation (id) ON DELETE CASCADE;

ALTER TABLE offre
  ADD CONSTRAINT FK_AF86866F1DFBCC46 FOREIGN KEY (rapport_id) REFERENCES rapportvisite (id);

ALTER TABLE offre_medicament
  ADD CONSTRAINT FK_B7C2151F4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_B7C2151FAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE;

ALTER TABLE posseder
  ADD CONSTRAINT FK_62EF7CBA2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id);

ALTER TABLE praticien
  ADD CONSTRAINT FK_D9A27D3694DBAFA FOREIGN KEY (displomes_id) REFERENCES posseder (id),
  ADD CONSTRAINT FK_D9A27D3C54C8C93 FOREIGN KEY (type_id) REFERENCES typepraticien (id);

ALTER TABLE prescription
  ADD CONSTRAINT FK_1FBFB8D9312B7B9 FOREIGN KEY (type_individu_id) REFERENCES typeindividu (id),
  ADD CONSTRAINT FK_1FBFB8D94E8FD016 FOREIGN KEY (dosage_id) REFERENCES dosage (id),
  ADD CONSTRAINT FK_1FBFB8D9C403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicament (id);

ALTER TABLE rapportvisite
  ADD CONSTRAINT FK_1A9679F92391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id),
  ADD CONSTRAINT FK_1A9679F97F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id);

ALTER TABLE region
  ADD CONSTRAINT FK_F62F1769F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id);

ALTER TABLE visiteur
  ADD CONSTRAINT FK_4EA587B89F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id),
  ADD CONSTRAINT FK_4EA587B8CCF9E01E FOREIGN KEY (departement_id) REFERENCES labo (id);

ALTER TABLE visiteur_activitecompl
  ADD CONSTRAINT FK_77EA5FAA7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id) ON DELETE CASCADE,
  ADD CONSTRAINT FK_77EA5FAADD1ECA17 FOREIGN KEY (activitecompl_id) REFERENCES activitecompl (id) ON DELETE CASCADE;
COMMIT;
