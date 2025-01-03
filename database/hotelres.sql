-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 déc. 2024 à 17:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotelres`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddReservation` (IN `client_id` INT, IN `room_id` INT, IN `arrival_date` DATE, IN `departure_date` DATE)   BEGIN
    INSERT INTO reservations (id_client, id_chambre, date_arrivee, date_depart, status)
    VALUES (client_id, room_id, arrival_date, departure_date, 'confirmé');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CancelReservation` (IN `reservation_id` INT)   BEGIN
    DECLARE room_id INT;
    UPDATE reservations
    SET status = 'annulé'
    WHERE id_reservation = reservation_id;
    SELECT id_chambre  INTO room_id FROM reservations WHERE id_reservation  = reservation_id;
    UPDATE Chambres
    SET disponibilite = TRUE
    WHERE id_chambre = room_id;
END$$

--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `CalculateReservationAmount` (`room_id` INT, `start_date` DATE, `end_date` DATE) RETURNS FLOAT  BEGIN
    DECLARE price_per_night FLOAT;
    DECLARE number_of_nights INT;
    DECLARE total_amount FLOAT;

    SELECT prix INTO price_per_night FROM Chambres WHERE id_chambre = room_id;
    
    SET number_of_nights = DATEDIFF(end_date, start_date);
    SET total_amount = price_per_night * number_of_nights;

    RETURN total_amount;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `CheckRoomAvailability` (`room_id` INT, `start_date` DATE, `end_date` DATE) RETURNS TINYINT(1)  BEGIN
    DECLARE booking_count INT;
    DECLARE available BOOLEAN;
    SELECT disponibilite INTO available
    FROM Chambres
    WHERE id_chambre = room_id;

    IF available = FALSE THEN
        RETURN FALSE;
    END IF;

    SELECT COUNT(*) INTO booking_count
    FROM reservations
    WHERE id_chambre = room_id
      AND ((date_arrivee BETWEEN start_date AND end_date) OR (date_depart BETWEEN start_date AND end_date));
    
    IF booking_count > 0 THEN
        RETURN FALSE;
    ELSE
        RETURN TRUE;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `id_chambre` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL DEFAULT 1,
  `nombre_lits` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`id_chambre`, `id_hotel`, `prix`, `disponibilite`, `nombre_lits`, `id_type`) VALUES
(25, 1, 2.00, 1, 2, 1),
(26, 1, 6.00, 1, 6, 1),
(27, 4, 44.00, 1, 44, 2),
(28, 2, 4.00, 0, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `email`, `adresse`, `telephone`, `password`, `role`) VALUES
(20, 'said bzioui', 's@b', 'rabat', '12345', '1122', 'Admin'),
(21, 'SAID BZIOUI', 'ss@bb', 'dsds', '123123', '$2y$10$ykklGbU.2/g0jHrRmZ7Xd.4.qvh7Evuxf.d32vmLm2atcKdY1StNy', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id_facture` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `montant_total` decimal(10,2) NOT NULL,
  `date_facture` date NOT NULL,
  `statut_paiement` enum('payée','en attente','annulée') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id_facture`, `id_reservation`, `montant_total`, `date_facture`, `statut_paiement`) VALUES
(11, 37, 4.00, '2024-12-27', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

CREATE TABLE `hotels` (
  `id_hotel` int(11) NOT NULL,
  `nom_hotel` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `site_web` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id_hotel`, `nom_hotel`, `adresse`, `description`, `email`, `telephone`, `site_web`, `ville`) VALUES
(1, 'Hotel Atlas', '123 Rue Exemple, Marrakech', 'Un hôtel confortable et économique.', 'contact@hotelatlas.com', '0612345678', 'www.hotelatlas.com', 'Marrakech'),
(2, 'Hotel Soleil', '456 Avenue Centrale, Casablanca', 'Hôtel luxueux avec une piscine et des suites spacieuses.', 'contact@hotelsoleil.com', '0654321987', 'www.hotelsoleil.com', 'Casablanca'),
(3, 'Hotel Oasis', '789 Boulevard Mer, Agadir', 'Un hôtel familial près de la plage.', 'contact@hoteloasis.com', '0678912345', 'www.hoteloasis.com', 'Agadir'),
(4, 'Hotel Royal', '321 Rue Royale, Rabat', 'Un hôtel royal avec spa et vue panoramique.', 'contact@hotelroyal.com', '0623456789', 'www.hotelroyal.com', 'Rabat');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id_paiement` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `montant_paye` decimal(10,2) NOT NULL,
  `date_paiement` date NOT NULL,
  `moyen_paiement` enum('carte bancaire','espèces','virement') NOT NULL,
  `statut_paiement` enum('confirmé','en attente','échoué') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `paiements`
--
DELIMITER $$
CREATE TRIGGER `after_paiement_insert` AFTER INSERT ON `paiements` FOR EACH ROW BEGIN
    UPDATE factures
    SET statut_paiement = 'payée'
    WHERE id_facture = NEW.id_facture AND statut_paiement != 'payée';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `date_arrivee` datetime NOT NULL,
  `date_depart` datetime NOT NULL,
  `status` enum('en attente','confirmée','annulée') NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_client`, `id_chambre`, `date_arrivee`, `date_depart`, `status`) VALUES
(37, 21, 28, '2024-11-17 02:02:00', '2024-11-11 00:00:00', 'en attente');

--
-- Déclencheurs `reservations`
--
DELIMITER $$
CREATE TRIGGER `after_insert_reservation` AFTER INSERT ON `reservations` FOR EACH ROW BEGIN
    -- إدخال فاتورة جديدة مرتبطة بالحجز الذي تم إنشاؤه
    INSERT INTO factures (id_reservation, montant_total, date_facture, statut_paiement)
    VALUES (NEW.id_reservation, 
            (SELECT prix 
             FROM chambres 
             WHERE chambres.id_chambre = NEW.id_chambre), 
            CURDATE(), 
            'en attente');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_availability_before_insert` BEFORE INSERT ON `reservations` FOR EACH ROW BEGIN
    DECLARE room_available BOOLEAN;
    SELECT disponibilite INTO room_available
    FROM Chambres
    WHERE id_chambre = NEW.id_chambre;

    IF room_available = FALSE THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La chambre n''est pas disponible pour ces dates.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `restore_room_availability_after_delete` AFTER DELETE ON `reservations` FOR EACH ROW BEGIN
    UPDATE Chambres
    SET disponibilite = TRUE
    WHERE id_chambre = OLD.id_chambre;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_room_availability_after_insert` AFTER INSERT ON `reservations` FOR EACH ROW BEGIN
    UPDATE Chambres
    SET disponibilite = FALSE
    WHERE id_chambre = NEW.id_chambre;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_Rev` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL CHECK (`rating` between 1 and 5),
  `commentaire` text DEFAULT NULL,
  `date_Rev` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `types_chambres`
--

CREATE TABLE `types_chambres` (
  `id_type` int(11) NOT NULL,
  `type_chambre` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types_chambres`
--

INSERT INTO `types_chambres` (`id_type`, `type_chambre`, `description`) VALUES
(1, 'Simple', 'Chambre avec un lit simple.'),
(2, 'Double', 'Chambre avec un lit double.'),
(3, 'Suite', 'Chambre spacieuse avec plusieurs équipements de luxe.'),
(4, 'Triple', 'Chambre avec trois lits simples, idéale للعائلات.'),
(5, 'Deluxe', 'Chambre haut de gamme avec vue panoramique.'),
(6, 'Studio', 'Studio équipé avec une petite cuisine.'),
(7, 'King Suite', 'Suite avec un lit King-size et équipements premium.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id_hotel`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_facture` (`id_facture`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `reservations_ibfk_1` (`id_client`),
  ADD KEY `reservations_ibfk_2` (`id_chambre`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_Rev`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Index pour la table `types_chambres`
--
ALTER TABLE `types_chambres`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `type_chambre` (`type_chambre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambres`
--
ALTER TABLE `chambres`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_Rev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types_chambres`
--
ALTER TABLE `types_chambres`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotels` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chambres_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `types_chambres` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id_reservation`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`id_facture`) REFERENCES `factures` (`id_facture`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `chambres` (`id_chambre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotels` (`id_hotel`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
