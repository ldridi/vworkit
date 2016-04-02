-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 22 Septembre 2015 à 22:23
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `vworkit`
--

-- --------------------------------------------------------

--
-- Structure de la table `Budget`
--

CREATE TABLE IF NOT EXISTS `Budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_budget` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Budget`
--

INSERT INTO `Budget` (`id`, `nom_budget`) VALUES
(1, 'qd'),
(2, 'qsd');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `description_categorie` longtext COLLATE utf8_unicode_ci NOT NULL,
  `role_categories` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom_categories` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_categories` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3AF346683DA5256D` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `image_id`, `description_categorie`, `role_categories`, `nom_categories`, `date_ajout_categories`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Développement Web', 'Développement Web', '2015-09-05'),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Mobile', 'Mobile', '2015-09-05'),
(3, 9, 'd', 'seo', 'seo', '2015-09-06');

-- --------------------------------------------------------

--
-- Structure de la table `Certificat`
--

CREATE TABLE IF NOT EXISTS `Certificat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nom_certificat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_certificat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_certificat` date NOT NULL,
  `description_certificat` longtext COLLATE utf8_unicode_ci NOT NULL,
  `link_certificat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_68198CA7A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Certificat`
--

INSERT INTO `Certificat` (`id`, `user_id`, `nom_certificat`, `site_certificat`, `date_certificat`, `description_certificat`, `link_certificat`) VALUES
(1, 1, 'qsd', 'qsd', '2010-01-01', 'qsd', 'qsd');

-- --------------------------------------------------------

--
-- Structure de la table `Classement`
--

CREATE TABLE IF NOT EXISTS `Classement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_classement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pourcentage_classement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_classement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Classement`
--

INSERT INTO `Classement` (`id`, `nom_classement`, `pourcentage_classement`, `image_classement`) VALUES
(1, '1 etoile', '20', '1.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `CommentaireTache`
--

CREATE TABLE IF NOT EXISTS `CommentaireTache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tache_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `texte_commentaire_tache` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_commentaire_tache` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F1A4C045D2235D39` (`tache_id`),
  KEY `IDX_F1A4C045A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `nom_competence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94D4687FBCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id`, `categorie_id`, `nom_competence`) VALUES
(1, 1, 'php'),
(2, 1, 'Symfony2'),
(3, 1, 'Html'),
(4, 1, 'jQuery'),
(5, 1, 'JavaScript');

-- --------------------------------------------------------

--
-- Structure de la table `Degree`
--

CREATE TABLE IF NOT EXISTS `Degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Degree`
--

INSERT INTO `Degree` (`id`, `nom_degree`) VALUES
(1, '10');

-- --------------------------------------------------------

--
-- Structure de la table `Demo`
--

CREATE TABLE IF NOT EXISTS `Demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_demo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Devise`
--

CREATE TABLE IF NOT EXISTS `Devise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_devise` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Devise`
--

INSERT INTO `Devise` (`id`, `nom_devise`) VALUES
(1, 'qsd'),
(2, 'qsd');

-- --------------------------------------------------------

--
-- Structure de la table `Duree`
--

CREATE TABLE IF NOT EXISTS `Duree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_duree` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Education`
--

CREATE TABLE IF NOT EXISTS `Education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titre_education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institut_education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_education` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_fin_education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_59FBDC71A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Education`
--

INSERT INTO `Education` (`id`, `user_id`, `titre_education`, `institut_education`, `description_education`, `date_fin_education`) VALUES
(1, 1, 'qsd', 'qsd', 'qsd', 'qsd'),
(2, 1, 'QSD', 'QSD', 'QD', 'QSD'),
(3, 1, 'qsd', 'qsd', 'qsd', 'qsd'),
(4, 3, 'h', 'h', 'h', 'h');

-- --------------------------------------------------------

--
-- Structure de la table `Emploi`
--

CREATE TABLE IF NOT EXISTS `Emploi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nom_emploi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_emploi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `duree_emploi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `societe_emploi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_emploi` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_730CB5CCA76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Emploi`
--

INSERT INTO `Emploi` (`id`, `user_id`, `nom_emploi`, `description_emploi`, `duree_emploi`, `societe_emploi`, `date_ajout_emploi`) VALUES
(1, 1, 'd', 'd', 'd', 'd', '2015-09-06'),
(2, 1, 'qdq', 'qsd', 'qsd', 'qsd', '2015-09-09'),
(3, 3, 'g', 'g', 'g', 'g', '2015-09-14'),
(4, 3, 's', 's', 's', 's', '2015-09-22');

-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE IF NOT EXISTS `Etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Etat`
--

INSERT INTO `Etat` (`id`, `nom_etat`) VALUES
(1, 'qsd'),
(2, 'qsd');

-- --------------------------------------------------------

--
-- Structure de la table `Favoris`
--

CREATE TABLE IF NOT EXISTS `Favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateajoutfavoris` datetime NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_468EFDAE78CED90B` (`from_id`),
  KEY `IDX_468EFDAE30354A65` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `Favoris`
--

INSERT INTO `Favoris` (`id`, `dateajoutfavoris`, `from_id`, `to_id`) VALUES
(6, '2015-09-07 20:34:16', 3, 7),
(7, '2015-09-09 00:10:17', 1, 3),
(8, '2015-09-09 02:28:34', 3, 1),
(9, '2015-09-22 16:32:30', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Feedback`
--

CREATE TABLE IF NOT EXISTS `Feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte_feedback` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_feedback` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Historique`
--

CREATE TABLE IF NOT EXISTS `Historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `date_ajout_historique` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A2E2D63CA76ED395` (`user_id`),
  KEY `IDX_A2E2D63CC18272` (`projet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Contenu de la table `Historique`
--

INSERT INTO `Historique` (`id`, `user_id`, `projet_id`, `date_ajout_historique`) VALUES
(24, 1, 2, '2015-09-07'),
(26, 1, 2, '2015-09-07'),
(27, 1, 2, '2015-09-07'),
(28, 3, 2, '2015-09-22'),
(29, 3, 2, '2015-09-22'),
(30, 3, 2, '2015-09-22'),
(31, 1, 2, '2015-09-22'),
(32, 3, 2, '2015-09-22'),
(33, 3, 4, '2015-09-22'),
(34, 1, 4, '2015-09-22'),
(35, 3, 2, '2015-09-22'),
(36, 3, 3, '2015-09-22');

-- --------------------------------------------------------

--
-- Structure de la table `LabelTache`
--

CREATE TABLE IF NOT EXISTS `LabelTache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `LabelTache`
--

INSERT INTO `LabelTache` (`id`, `nom_label`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Structure de la table `Langue`
--

CREATE TABLE IF NOT EXISTS `Langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `nom_langue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94FB70B8A76ED395` (`user_id`),
  KEY `IDX_94FB70B8B3E9C81` (`niveau_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Litige`
--

CREATE TABLE IF NOT EXISTS `Litige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `description_litige` longtext COLLATE utf8_unicode_ci,
  `date_ajout_litige` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E945D15BEE1E550F` (`raison_id`),
  KEY `IDX_E945D15B78CED90B` (`from_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Media`
--

CREATE TABLE IF NOT EXISTS `Media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `Media`
--

INSERT INTO `Media` (`id`, `url`, `alt`) VALUES
(1, 'jpeg', 'developpement.jpeg'),
(2, 'jpeg', 'mobile.jpeg'),
(4, 'jpeg', '12002843_1631134670502501_7475028285333420360_n.jpg'),
(5, 'jpeg', 'lotfi.jpg'),
(6, 'jpeg', '10371500_1674735429429696_5578112367511686107_n.jpg'),
(7, 'jpeg', '1.jpg'),
(8, 'jpeg', 'drinks.jpg'),
(9, 'jpeg', 'seo.jpeg'),
(10, 'jpeg', 'image_header-big.jpg'),
(11, 'jpeg', '11990390_899681920087063_2561610968165762110_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `date_ajout_message` datetime NOT NULL,
  `texte_message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active_message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_790009E378CED90B` (`from_id`),
  KEY `IDX_790009E330354A65` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `Niveau`
--

CREATE TABLE IF NOT EXISTS `Niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_niveau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Niveau`
--

INSERT INTO `Niveau` (`id`, `nom_niveau`) VALUES
(1, '10');

-- --------------------------------------------------------

--
-- Structure de la table `Offre`
--

CREATE TABLE IF NOT EXISTS `Offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_ajout_offre` date DEFAULT NULL,
  `description_offre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `duree_offre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `budget_offre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6E47A96BC18272` (`projet_id`),
  KEY `IDX_6E47A96BA76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Offre`
--

INSERT INTO `Offre` (`id`, `projet_id`, `user_id`, `date_ajout_offre`, `description_offre`, `duree_offre`, `budget_offre`) VALUES
(1, 2, 3, '2015-09-22', 'fsfs', 'sdfsf', 'sfsdf'),
(2, 4, 3, '2015-09-22', 'qdqsdq', 'qsdqd', 'qsdqsd');

-- --------------------------------------------------------

--
-- Structure de la table `Plaisir`
--

CREATE TABLE IF NOT EXISTS `Plaisir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `nom_plaisir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7F70096BA76ED395` (`user_id`),
  KEY `IDX_7F70096BB3E9C81` (`niveau_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Portfolio`
--

CREATE TABLE IF NOT EXISTS `Portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `titre_portfolio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description_portfolio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_portfolio` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2B1C92C13DA5256D` (`image_id`),
  KEY `IDX_2B1C92C1A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `Portfolio`
--

INSERT INTO `Portfolio` (`id`, `user_id`, `image_id`, `titre_portfolio`, `description_portfolio`, `date_ajout_portfolio`) VALUES
(1, 1, 4, 'Site ecommerced', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de', '2015-09-05'),
(2, 1, 7, 'Charte graphique', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de', '2015-09-06'),
(3, 1, 8, 'Charte graphiques', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de', '2015-09-06'),
(4, 1, 10, 'qsd', 'qsd', '2015-09-08'),
(5, 3, 11, 'ss', 'ss', '2015-09-22');

-- --------------------------------------------------------

--
-- Structure de la table `Progression`
--

CREATE TABLE IF NOT EXISTS `Progression` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_progression` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Progression`
--

INSERT INTO `Progression` (`id`, `nom_progression`) VALUES
(1, 'annule');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `devise_id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `date_ajout_projet` date DEFAULT NULL,
  `titre_projet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `objectif_projet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_projet` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_50159CA9A76ED395` (`user_id`),
  KEY `IDX_50159CA9D5E86FF` (`etat_id`),
  KEY `IDX_50159CA9F4445056` (`devise_id`),
  KEY `IDX_50159CA936ABA6B8` (`budget_id`),
  KEY `IDX_50159CA9BCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `user_id`, `etat_id`, `devise_id`, `budget_id`, `categorie_id`, `date_ajout_projet`, `titre_projet`, `objectif_projet`, `description_projet`) VALUES
(2, 1, 1, 1, 1, 1, '2015-09-07', 'Site web', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles,', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles,'),
(3, 1, 1, 1, 1, 1, '2015-09-22', 'Développement site web', 'Lorsque vous faites affaire avec un indépendant à travers le site Vworkit, le site reste un médiateur entre vous et l''indépendant qui met en œuvre le projet et seulement lorsque le projet se termine avec la mise en œuvre complète de la quantité de conversion est indépendant du compte qui a réalisé le projet.', 'Lorsque vous faites affaire avec un indépendant à travers le site Vworkit, le site reste un médiateur entre vous et l''indépendant qui met en œuvre le projet et seulement lorsque le projet se termine avec la mise en œuvre complète de la quantité de conversion est indépendant du compte qui a réalisé le projet.'),
(4, 1, 1, 1, 1, 1, '2015-09-22', 'projet de lotfidev', 'orsque vous faites affaire avec un indépendant à travers le site Vworkit, le site reste un médiateur entre vous et l''indépendant qui met en œuvre le projet et seulement lorsque le projet se termine avec la mise en œuvre complète de la quanti', 'orsque vous faites affaire avec un indépendant à travers le site Vworkit, le site reste un médiateur entre vous et l''indépendant qui met en œuvre le projet et seulement lorsque le projet se termine avec la mise en œuvre complète de la quanti');

-- --------------------------------------------------------

--
-- Structure de la table `projet_competence`
--

CREATE TABLE IF NOT EXISTS `projet_competence` (
  `projet_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`projet_id`,`competence_id`),
  KEY `IDX_15498055C18272` (`projet_id`),
  KEY `IDX_1549805515761DAB` (`competence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `projet_competence`
--

INSERT INTO `projet_competence` (`projet_id`, `competence_id`) VALUES
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Raison`
--

CREATE TABLE IF NOT EXISTS `Raison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_raison` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Recommandation`
--

CREATE TABLE IF NOT EXISTS `Recommandation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `date_ajout_recommandation` datetime NOT NULL,
  `description_recommandation` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A1C52F0A76ED395` (`user_id`),
  KEY `IDX_A1C52F030354A65` (`to_id`),
  KEY `IDX_A1C52F07616678F` (`rank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Recommandation`
--

INSERT INTO `Recommandation` (`id`, `user_id`, `to_id`, `rank_id`, `date_ajout_recommandation`, `description_recommandation`) VALUES
(1, 3, 1, 1, '2015-09-22 15:20:18', 'qsdqsd');

-- --------------------------------------------------------

--
-- Structure de la table `Reponse`
--

CREATE TABLE IF NOT EXISTS `Reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `texte_reponse` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_reponse` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_900BE75BA76ED395` (`user_id`),
  KEY `IDX_900BE75B537A1329` (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `Reunion`
--

CREATE TABLE IF NOT EXISTS `Reunion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `porteur_id` int(11) NOT NULL,
  `prestataire_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  `nom_reunion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_reunion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94BD9D1E5176442D` (`porteur_id`),
  KEY `IDX_94BD9D1EBE3DB2B7` (`prestataire_id`),
  KEY `IDX_94BD9D1E4CC8505A` (`offre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Reunion`
--

INSERT INTO `Reunion` (`id`, `porteur_id`, `prestataire_id`, `offre_id`, `nom_reunion`, `date_ajout_reunion`) VALUES
(1, 1, 3, 1, 'Site web', '2015-09-22 18:37:58');

-- --------------------------------------------------------

--
-- Structure de la table `Support`
--

CREATE TABLE IF NOT EXISTS `Support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_support` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texte_support` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_support` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Tache`
--

CREATE TABLE IF NOT EXISTS `Tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) NOT NULL,
  `progression_id` int(11) NOT NULL,
  `reunion_id` int(11) NOT NULL,
  `nom_tache` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description_tache` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout_tache` datetime NOT NULL,
  `fin_ajout_tache` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_52460F7133B92F39` (`label_id`),
  KEY `IDX_52460F71AF229C18` (`progression_id`),
  KEY `IDX_52460F714E9B7368` (`reunion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devise_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `date_ajout_user` date NOT NULL,
  `navigateur_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notif_news_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notif_email_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_user` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `devise_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_user` longtext COLLATE utf8_unicode_ci,
  `ville_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `societe_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_sec_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleplus_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre_user` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_1483A5E93DA5256D` (`image_id`),
  KEY `IDX_1483A5E9F4445056` (`devise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `devise_id`, `image_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `date_ajout_user`, `navigateur_user`, `notif_news_user`, `notif_email_user`, `budget_user`, `code_user`, `nom_user`, `prenom_user`, `adresse_user`, `sexe_user`, `devise_user`, `description_user`, `ville_user`, `etat_user`, `societe_user`, `tel_user`, `tel_sec_user`, `facebook_user`, `twitter_user`, `youtube_user`, `googleplus_user`, `site_user`, `github_user`, `linkedin_user`, `titre_user`) VALUES
(1, NULL, 6, 'lotfidev', 'lotfidev', 'lotfi.dev@gmail.com', 'lotfi.dev@gmail.com', 1, '9r7iciwinakog0ooco0sgckwwso04cs', 'SRKyE3OaEocxaYa1uP0L8VnxF9RNteQ7MfLRmWyfcB6t1zEi35wKt+dnWm2T+RKmCDfjWSj3ZbKI+vg7SFoPsg==', '2015-09-22 21:16:44', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2015-09-05', 'Google Chrome', NULL, NULL, NULL, NULL, 'lotfi', 'dridi', '21 rue hedi cheker', NULL, NULL, 'Un jeune Tunisien passionné par le développement web et les nouvelles technologies.Jeune Blogueur qui aime aider les autres à atteindre leurs objectifs dans ce domaine par des formations en ligne.', 'Manouba', 'TN', NULL, NULL, NULL, 'https://www.facebook.com/dridi.web', NULL, NULL, NULL, NULL, NULL, NULL, 'Développeur Symfony2'),
(3, NULL, 5, 'vworkit', 'vworkit', 'vworkit@gmail.com', 'vworkit@gmail.com', 1, 'qp1obx5qe3kkg48kc0g84k08ww4c8c0', '4sWMMcOYZGXeG8HZxl/lzDVNiIkuifiFvrAHoOVtvTnYyAgWMuuEQr5ehMK6WfqGBPSF6cd5xRN1uGEAqdeQqA==', '2015-09-22 20:37:24', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-09-05', 'Google Chrome', NULL, NULL, NULL, '1142', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Développeur Symfony2'),
(6, NULL, 4, 'Walid', 'walid', 'vworkits@gmail.com', 'vworkits@gmail.com', 1, 'qp1obx5qe3kkg48kc0g84k08ww4c8c0', '4sWMMcOYZGXeG8HZxl/lzDVNiIkuifiFvrAHoOVtvTnYyAgWMuuEQr5ehMK6WfqGBPSF6cd5xRN1uGEAqdeQqA==', '2015-09-09 00:54:23', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-09-05', 'Google Chrome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Développeur Zend'),
(7, NULL, NULL, 'Hayfa', 'latifa', 'l@gmail.com', 'l@gmail.com', 1, 'iioq6ak5o2ogk04o0wwgkw08skkogso', 'vsHr2gbgMCrfBfB/yN6kecPVs14Qvf9X/+DefSKWDv3nV2b7ZKdEzGje6U4xTH9plAKjnjQseCFZc9oDBKcCmw==', '2015-09-05 22:39:24', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-09-05', 'Google Chrome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Infographiste');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_competence`
--

CREATE TABLE IF NOT EXISTS `utilisateur_competence` (
  `utilisateur_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur_id`,`competence_id`),
  KEY `IDX_A66CAA69FB88E14F` (`utilisateur_id`),
  KEY `IDX_A66CAA6915761DAB` (`competence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur_competence`
--

INSERT INTO `utilisateur_competence` (`utilisateur_id`, `competence_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `Visite`
--

CREATE TABLE IF NOT EXISTS `Visite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datevisite` datetime NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B730898D78CED90B` (`from_id`),
  KEY `IDX_B730898D30354A65` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Contenu de la table `Visite`
--

INSERT INTO `Visite` (`id`, `datevisite`, `from_id`, `to_id`) VALUES
(10, '2015-09-07 20:12:24', 1, 6),
(15, '2015-09-07 21:00:37', 3, 1),
(16, '2015-09-07 21:01:00', 1, 3),
(18, '2015-09-07 21:02:00', 1, 3),
(23, '2015-09-08 06:35:26', 1, 6),
(24, '2015-09-08 06:35:37', 1, 3),
(25, '2015-09-08 23:42:13', 1, 6),
(26, '2015-09-09 02:06:53', 1, 1),
(28, '2015-09-09 02:23:22', 1, 3),
(29, '2015-09-09 02:25:29', 1, 1),
(30, '2015-09-09 02:27:01', 3, 1),
(31, '2015-09-14 17:06:14', 3, 7),
(32, '2015-09-15 00:47:05', 3, 1),
(33, '2015-09-15 00:55:35', 3, 1),
(34, '2015-09-15 00:56:30', 3, 1),
(35, '2015-09-15 00:56:44', 3, 1),
(36, '2015-09-19 13:44:11', 1, 3),
(37, '2015-09-19 13:44:38', 3, 1),
(38, '2015-09-22 15:17:22', 3, 1),
(39, '2015-09-22 15:18:12', 3, 1),
(40, '2015-09-22 15:20:13', 3, 1),
(41, '2015-09-22 15:33:01', 3, 1),
(42, '2015-09-22 15:42:53', 3, 1),
(43, '2015-09-22 16:02:39', 1, 3),
(44, '2015-09-22 16:07:45', 1, 3),
(45, '2015-09-22 18:31:48', 1, 3),
(46, '2015-09-22 18:33:17', 1, 3),
(47, '2015-09-22 18:36:40', 1, 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF346683DA5256D` FOREIGN KEY (`image_id`) REFERENCES `Media` (`id`);

--
-- Contraintes pour la table `Certificat`
--
ALTER TABLE `Certificat`
  ADD CONSTRAINT `FK_68198CA7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `CommentaireTache`
--
ALTER TABLE `CommentaireTache`
  ADD CONSTRAINT `FK_F1A4C045A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F1A4C045D2235D39` FOREIGN KEY (`tache_id`) REFERENCES `Tache` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `FK_94D4687FBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Education`
--
ALTER TABLE `Education`
  ADD CONSTRAINT `FK_59FBDC71A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Emploi`
--
ALTER TABLE `Emploi`
  ADD CONSTRAINT `FK_730CB5CCA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Favoris`
--
ALTER TABLE `Favoris`
  ADD CONSTRAINT `FK_468EFDAE30354A65` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_468EFDAE78CED90B` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `Historique`
--
ALTER TABLE `Historique`
  ADD CONSTRAINT `FK_A2E2D63CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A2E2D63CC18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Langue`
--
ALTER TABLE `Langue`
  ADD CONSTRAINT `FK_94FB70B8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_94FB70B8B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `Niveau` (`id`);

--
-- Contraintes pour la table `Litige`
--
ALTER TABLE `Litige`
  ADD CONSTRAINT `FK_E945D15B78CED90B` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_E945D15BEE1E550F` FOREIGN KEY (`raison_id`) REFERENCES `Raison` (`id`);

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `FK_790009E330354A65` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_790009E378CED90B` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Offre`
--
ALTER TABLE `Offre`
  ADD CONSTRAINT `FK_6E47A96BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6E47A96BC18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Plaisir`
--
ALTER TABLE `Plaisir`
  ADD CONSTRAINT `FK_7F70096BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7F70096BB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `Niveau` (`id`);

--
-- Contraintes pour la table `Portfolio`
--
ALTER TABLE `Portfolio`
  ADD CONSTRAINT `FK_2B1C92C13DA5256D` FOREIGN KEY (`image_id`) REFERENCES `Media` (`id`),
  ADD CONSTRAINT `FK_2B1C92C1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_50159CA936ABA6B8` FOREIGN KEY (`budget_id`) REFERENCES `Budget` (`id`),
  ADD CONSTRAINT `FK_50159CA9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_50159CA9BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_50159CA9D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `Etat` (`id`),
  ADD CONSTRAINT `FK_50159CA9F4445056` FOREIGN KEY (`devise_id`) REFERENCES `Devise` (`id`);

--
-- Contraintes pour la table `projet_competence`
--
ALTER TABLE `projet_competence`
  ADD CONSTRAINT `FK_1549805515761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_15498055C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Recommandation`
--
ALTER TABLE `Recommandation`
  ADD CONSTRAINT `FK_A1C52F030354A65` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A1C52F07616678F` FOREIGN KEY (`rank_id`) REFERENCES `Classement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A1C52F0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Reponse`
--
ALTER TABLE `Reponse`
  ADD CONSTRAINT `FK_900BE75B537A1329` FOREIGN KEY (`message_id`) REFERENCES `Message` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_900BE75BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Reunion`
--
ALTER TABLE `Reunion`
  ADD CONSTRAINT `FK_94BD9D1E4CC8505A` FOREIGN KEY (`offre_id`) REFERENCES `Offre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_94BD9D1E5176442D` FOREIGN KEY (`porteur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_94BD9D1EBE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD CONSTRAINT `FK_52460F7133B92F39` FOREIGN KEY (`label_id`) REFERENCES `LabelTache` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_52460F714E9B7368` FOREIGN KEY (`reunion_id`) REFERENCES `Reunion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_52460F71AF229C18` FOREIGN KEY (`progression_id`) REFERENCES `Progression` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E93DA5256D` FOREIGN KEY (`image_id`) REFERENCES `Media` (`id`),
  ADD CONSTRAINT `FK_1483A5E9F4445056` FOREIGN KEY (`devise_id`) REFERENCES `Devise` (`id`);

--
-- Contraintes pour la table `utilisateur_competence`
--
ALTER TABLE `utilisateur_competence`
  ADD CONSTRAINT `FK_A66CAA6915761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A66CAA69FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Visite`
--
ALTER TABLE `Visite`
  ADD CONSTRAINT `FK_B730898D30354A65` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B730898D78CED90B` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
