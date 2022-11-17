-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 17 nov. 2022 à 10:47
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `UnrealAirlines`
--

-- --------------------------------------------------------

--
-- Structure de la table `Destinations`
--

CREATE TABLE `Destinations` (
  `id_destination` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `nbplaces` int(11) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Destinations`
--

INSERT INTO `Destinations` (`id_destination`, `nom`, `nbplaces`, `image`, `description`) VALUES
(1, 'Bikini Bottom', 10, '../img/bikinibot2.jpg', 'Plongez dans l’océan Pacifique et découvrez Bikini Bottom, qui est une ville habitée par des créatures marines, ici, votre guide sera Bob L\'Eponge, dynamique, positif et enthousiaste, Bob sera le guide parfait pour vous faire visiter Bikini Bottom. Vous serez hébergés dans son ananas qui lui fait office de maison vous serez très bien accueillis chez lui (Attention à ne pas déranger le voisin!). Nous vous conseillons d’ailleurs un restaurant nommé « Le Crabe Croustillant », on y vend les meilleurs burgers de l’océan, les fameux « Pâtés de crabe ».'),
(2, 'Cell Games Arena', 10, '../img/cell2.jpg', 'Testez vos limites en participant au Cell Gama. Le Cell Game est un tournoi organisé par l\'Humain Artificiel Cell. Vous pourrez y affronter Cell en compagnie de Son Goku ou bien le dernier gagnant, Son Gohan. Et tous cela sous l’œil de Vegeta, Trunks ou Piccolo. Toutes les règles vous y seront expliquées mais sachez que nous ne seront pas responsables de ce qui vous arrivera là-bas. Aucun guide ne vous y attendra. Bonne chance à vous !'),
(3, 'Konoha', 30, '../img/konoha2.jpg', 'Visitez Konoha, Konoha est l’un des plus puissants des 5 grands villages ninjas, Vous y serez accueillis pas un certain Naruto, le chef du Village, aussi appelé Hokage. Vous découvrirez l’histoire de la ville de sa Création à sa destruction en passant par ses guerres, ses clans et ses légendes. Il vous est conseillé de visiter la résidence du Hokage d’où vous aurez une belle vue pour voir le Monument aux Hokage,  qui est la montagne où est sculpté le visage de tous les Hokage. Naruto vous racontera quelques anecdotes là-dessus.'),
(4, 'Croisière Merry', 35, '../img/merry2.png', 'Montez à bord du Vogue Merry, là où tout l’équipage de Monkey D.Luffy vous attend. Vous y serez hébergés et nourris durant cette croisière où tous ne passera pas forcément comme prévu. Entre bombardement, bataille et visite, vous vous familiarisez rapidement avec cet équipage assez particulier. Avec un peu de chance, vous découvrirez peut-être le fameux One Piece.'),
(5, 'Attaque des Titans', 50, '../img/snk2.jpg', 'Amateurs de sensations fortes ? Ce lieu est fait pour vous ! Tentez de survivre dans ce monde horrifique rempli de titans affamés qui n’auront qu’une seule envie : vous dévorer. Méfiez-vous de votre entourage et ne faites confiance qu’a vous-même dans ce monde de brutes. Tâchez de découvrir les mystères de ce monde, l’origine des titans et résoudre les conflits qui s’y trouvent afin de pouvoir vous en sortir vivants.'),
(10, 'Illumis', 35, '../img/pokemon2.jpg', ' Découvrez Illumis, la ville emblématique de la région de Kalos, en compagnie du champion d\'arène locale : Lem. Vous pourrez arpentez les rues d\'Illumis, y découvrir son réseau de Taxi, et de métro, faire une halte au fameux café Lysandre, visiter le laboratoire du professeur Platane qui y étudie la Méga-Evolution où vous pourrez rencontrer des Pokémon rares, sans oublier l\'emblématique tour Prismatique au centre d\'Illumis, qui abrite également l\'Arène de type Electrique de la ville !'),
(14, 'Kame House', 5, '../img/kamehouse.png', ' Une envie de bronzer ? Vous êtes au bon endroit. La Kame House est une petite maison située sur une toute petite ile. La maison Kamé House couvre la quasi-totalité de l\'île, faisant donc d\'elle une île maison, avec un petit jardin situé au bord de la mer. La maison est habitée par un vieil homme ex-maitre des arts martiaux. Ainsi, ici vous aurez l\'occasion de vous détendre tout en vous entrainant au combat.'),
(15, 'Poudlard', 40, '../img/poudlard.jpg', ' Fan de sorcellerie ?  Poudlard est un large château de sept étages supportés par la magie, avec de nombreuses tours ainsi que de très profonds donjons. Extérieurement, le château ressemble à ceux mentionnés dans les contes de fée.N\'hésitez plus, réservez dès maintenant votre voyage direction Poudlard pour apprendre à maitriser les sorts de vos rêves.');

-- --------------------------------------------------------

--
-- Structure de la table `Reservations`
--

CREATE TABLE `Reservations` (
  `id_reservation` int(11) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `birth_date` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id_users`, `nom`, `prenom`, `birth_date`, `email`, `tel`, `mdp`, `is_admin`, `username`) VALUES
(28, 'CHAMI', 'Idir', '17/08/2003', 'idirchm@gmail.com', '0651202569', 'idiradmin77', 1, 'idirkbyl'),
(32, 'test', 'test', '11/11/1111', 'test@test.test', '0123456789', 'test', 0, 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Destinations`
--
ALTER TABLE `Destinations`
  ADD PRIMARY KEY (`id_destination`);

--
-- Index pour la table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_destination` (`id_destination`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Destinations`
--
ALTER TABLE `Destinations`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_destination`) REFERENCES `Destinations` (`id_destination`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `Users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
