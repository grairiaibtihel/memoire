-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 31 mai 2025 à 23:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(114, 'Robe kabile', '4200', 'photo_2025-02-02_23-59-23.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(20, 'Salsabil', '0656064299', 'salsabilgrairia1@gmail.com', 'BaridiMob', '12', 'AIn echir', 'alger', 'Tamanrasset', 'Algérie', 1899, 'Set déco romantique (1), Crème Naturelle aux Fleurs Blanches (1), Sérum Anti-Âge Naturel à la Rose (1), Baume à Lèvres au Miel et Calendula (1)', '3200'),
(21, 'ibtihel', '0656064299', 'ibtihelgrairia1@gmail.com', 'Carte bancaire', '12', 'sidi salem', 'alger', 'Tamanrasset', 'Algérie', 1899, 'Set déco romantique (1), Crème Naturelle aux Fleurs Blanches (1), Sérum Anti-Âge Naturel à la Rose (1), Baume à Lèvres au Miel et Calendula (1), Crème Hydratante Naturelle à l\'Huile de Coco (1), Savon Apaisant à la Lavande (1), Crème Apaisante à l\'Aloe Ve', '20300'),
(22, 'ibtihel', '0656064299', 'ibtihelgrairia1@gmail.com', 'Carte bancaire', '12', 'sidi salem', 'alger', 'Béchar', 'Algérie', 1899, 'Robe kabile (1)', '4200');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `accepted` tinyint(1) DEFAULT 0,
  `description` text DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `accepted`, `description`, `user_email`) VALUES
(63, 'chouchous', '600', 'photo_2025-05-17_19-59-22.jpg', 1, 'ensemble de chouchous en satin violetts et blanches', 'ibtihelgrairia1@gmail.com'),
(64, 'Miroir', '600', 'photo_2025-05-17_19-59-31.jpg', 1, 'miroir diy perles élégant', 'ibtihelgrairia1@gmail.com'),
(65, 'Crochet', '300', 'photo_2025-05-17_19-59-35.jpg', 1, 'Embrasse de rideau en perles', 'ibtihelgrairia1@gmail.com'),
(66, 'Cintre', '600', 'photo_2025-05-17_19-59-34.jpg', 1, 'Cintre en perles', 'ibtihelgrairia1@gmail.com'),
(67, 'Decoratif', '1200', 'photo_2025-05-17_19-59-37.jpg', 1, 'porte-pinceaux maquillage en forme de visage', 'ibtihelgrairia1@gmail.com'),
(68, 'Bracelet ', '600', 'photo_2025-05-17_19-59-23.jpg', 1, 'bracelet de perles', 'ibtihelgrairia1@gmail.com'),
(69, 'serr-tete', '600', 'photo_2025-05-17_19-59-45.jpg', 1, 'beige rosé satiné perlé(les deux)', 'ibtihelgrairia1@gmail.com'),
(70, 'Bougie décorative', '500', 'photo_2025-05-17_19-59-41.jpg', 1, 'Bougie blanche nacrée décorée de coquillages et d’une queue de sirène.', 'salsabil@gmail.com'),
(71, 'Set déco romantique', '1500', 'photo_2025-05-17_19-59-38.jpg', 1, ' Ensemble 4 pièces - vase, bougeoir, plateau, boîte - décoré cœurs rouges', 'salsabil@gmail.com'),
(72, 'Sac à Main en Perles Élégant', '1200', 'photo_2025-05-17_20-00-00.jpg', 1, 'Un petit sac à main entièrement confectionné en perles blanches nacrées avec une bandoulière longue, design classique et raffiné pour les occasions spéciales', 'salsabil@gmail.com'),
(73, 'Parure de Perles Noires Royale', '1500', 'photo_2025-05-17_19-59-56.jpg', 1, 'Un ensemble de bijoux luxueux en perles noires avec des détails dorés, comprenant un collier, des boucles d\'oreilles et un bracelet au design oriental sophistiqué', 'salsabil@gmail.com'),
(74, 'Cordon de Téléphone Perlé', '400', 'photo_2025-05-29_21-42-17.jpg', 1, 'Un accessoire pratique pour téléphone portable fabriqué en perles blanches de différentes tailles, alliant élégance et fonctionnalité au quotidien', 'salsabil@gmail.com'),
(76, ' Bougie parfumée aux fleurs séchées', '900', 'photo_2025-05-29_22-14-01.jpg', 1, ' Bougie décorative avec fleurs naturelles et perles colorées.', 'salsabil@gmail.com'),
(77, 'Set déco maison - Miroir, bougeoir, vase', '1500', 'photo_2025-05-29_22-12-09.jpg', 1, 'Ensemble décoratif blanc crème style scandinave moderne.', 'salsabil@gmail.com'),
(78, 'Moules en silicone - Formes variées', '1300', 'photo_2025-05-29_22-12-05.jpg', 1, 'Moules silicone pour bougies et savons. Faciles à utiliser', 'salsabil@gmail.com'),
(79, 'Porte-clés ', '200', 'photo_2025-05-29_23-01-35.jpg', 1, 'Porte-clés noeud en crochet', 'salsabil@gmail.com'),
(80, 'Porte-clés', '300', 'photo_2025-05-29_23-01-36.jpg', 1, 'Porte-clés papillons et fleur au crochet', 'salsabil@gmail.com'),
(82, 'Crème Naturelle aux Fleurs Blanches', '1200', 'photo_2025-05-30_10-30-37.jpg', 1, 'Crème hydratante luxueuse à base d\'extraits naturels avec des fleurs de jasmin rafraîchissantes', 'rimes@gmail.com'),
(83, 'Crème Hydratante Naturelle à l\'Huile de Coco', '1300', 'photo_2025-05-30_10-30-38.jpg', 1, 'Crème riche en huile de coco naturelle pour une hydratation profonde et une douceur exceptionnelle', 'rimes@gmail.com'),
(84, 'Sérum Anti-Âge Naturel à la Rose', '900', 'photo_2025-05-30_10-30-39.jpg', 1, 'Sérum concentré aux extraits de rose naturelle pour régénérer et illuminer la peau', 'rimes@gmail.com'),
(85, ' Baume à Lèvres au Miel et Calendula', '1200', 'photo_2025-05-30_10-30-40.jpg', 1, 'Baume naturel nourrissant au miel brut et fleur de calendula pour des lèvres douces', 'rimes@gmail.com'),
(86, ' Savon Naturel au Miel et Avoine', '1000', 'photo_2025-05-30_10-30-42.jpg', 1, ' Savon artisanal au miel brut et avoine pour un nettoyage doux et gommage naturel', 'rimes@gmail.com'),
(87, 'Savon Nourrissant à l\'Amande et Huile d\'Argan', '1200', 'photo_2025-05-30_10-30-44.jpg', 1, ' Savon de luxe à l\\\'huile d\\\'amande et huile d\\\'argan pour hydratation et nutrition profonde', 'rimes@gmail.com'),
(88, 'Savon Naturel à l\'Huile d\'Olive', '1100', 'photo_2025-05-30_10-30-45.jpg', 1, ' Savon traditionnel à l\\\'huile d\\\'olive vierge extra pour peaux sensibles', 'rimes@gmail.com'),
(89, ' Savon Apaisant à la Lavande', '1000', 'photo_2025-05-30_10-30-47.jpg', 1, 'Savon parfumé naturel aux fleurs de lavande pour relaxation et sérénité', 'rimes@gmail.com'),
(90, ' Masque Visage Naturel Nourrissant', '1400', 'photo_2025-05-30_10-30-48.jpg', 1, 'Masque crémeux riche en extraits botaniques pour nourrir et régénérer la peau', 'rimes@gmail.com'),
(91, ' Crème Apaisante à l\'Aloe Vera', '1200', 'photo_2025-05-30_10-30-49.jpg', 1, 'Crème naturelle à l\\\'aloe vera et beurre de cacao pour hydratation et apaisement instantané', 'rimes@gmail.com'),
(92, 'Tailleur beige classique', '2500', 'photo_2025-05-30_12-01-58.jpg', 1, 'Ensemble professionnel en tweed beige avec chemise blanche et boutons dorés.', 'imen@gmail.com'),
(93, ' Pull blanc ajouré', '1800', 'photo_2025-05-30_12-02-00.jpg', 1, 'Tricot blanc à motifs circulaires, style moderne et léger.', 'imen@gmail.com'),
(94, ' Pull crème à roses', '2800', 'photo_2025-05-30_12-02-01.jpg', 1, ' Pull doux orné de petites roses roses, style romantique.', 'imen@gmail.com'),
(95, ' Cardigan bleu fleuri', '2800', 'photo_2025-05-30_12-02-02.jpg', 1, 'Cardigan bleu clair avec roses blanches, style coréen kawaii.', 'imen@gmail.com'),
(96, 'Chemise noire à dentelle', '2000', 'photo_2025-05-30_12-02-04.jpg', 1, 'Chemise noire avec col en dentelle blanche et manches bouffantes.', 'imen@gmail.com'),
(97, 'Blouse avec gilet tweed', '2200', 'photo_2025-05-30_12-02-03.jpg', 1, 'Chemise blanche et gilet beige à franges, look bureau chic.', 'imen@gmail.com'),
(98, ' Jupe longue marron', '2500', 'photo_2025-05-30_12-02-05.jpg', 1, ' Jupe évasée taille haute avec ceinture, élégance automnale.', 'imen@gmail.com'),
(99, ' Ensemble bleu et blanc', '2500', 'photo_2025-05-30_12-02-06.jpg', 1, ' Blouse bleue à liens et jupe blanche à volants, style bohème.', 'imen@gmail.com'),
(100, 'Set cuisine rose', '2000', 'photo_2025-05-30_12-02-07.jpg', 1, ' Accessoires de cuisine rayés rose et blanc, style vintage.', 'imen@gmail.com'),
(101, ' Paniers osier violets', '1600', 'photo_2025-05-30_12-13-24.jpg', 1, 'Paniers artisanaux en osier avec tissu violet à carreaux.', 'imen@gmail.com'),
(102, 'Cape noire brodée', '3800', 'photo_2025-05-30_13-32-53.jpg', 1, 'Élégante cape avec broderies dorées', 'saida@gmail.com'),
(103, ' Robe kafton blanc ', '3000', 'photo_2025-05-30_13-32-54.jpg', 1, 'Broderies dorées, manches évasées taille 36', 'saida@gmail.com'),
(104, 'Robe bordeaux brodée', '2600', 'photo_2025-05-30_13-32-56.jpg', 1, 'Pompons dorés, style traditionnel taille 36', 'saida@gmail.com'),
(105, 'Ghlila violet ', '5000', 'photo_2025-05-30_13-32-57.jpg', 1, 'Ensemble luxueux brodé taille 40', 'saida@gmail.com'),
(106, 'Robe beige boutonnée', '2900', 'photo_2025-05-30_13-32-58.jpg', 1, 'Détails nacrés, coupe moderne taille 38', 'saida@gmail.com'),
(107, 'Robe bleu-grise', '3200', 'photo_2025-05-30_13-32-59.jpg', 1, 'Manches bouffantes, ceinture(taille 38)', 'saida@gmail.com'),
(108, 'Robe kabile', '4200', 'photo_2025-02-02_23-59-23.jpg', 1, 'robe large beij clair taille 40', 'saida@gmail.com'),
(109, 'karakou', '4000', 'photo_2025-02-02_23-55-51.jpg', 1, 'bordou avec kristal taille 38', 'saida@gmail.com'),
(110, 'Cubes Pastel Eid Mubarak', '1200', 'photo_2025-05-30_14-39-29.jpg', 1, '9 cubes de pâtisserie pastel (rose, vert, blanc) ornés de chocolat doré et fleurs. Parfaits pour l\\\'Aïd.', 'ibti@gmail.com'),
(111, 'Cœurs Chocolat Rose Luxe', '500', 'photo_2025-05-30_14-39-31.jpg', 1, 'Cœurs roses à paillettes dorées en écrins élégants avec rubans. Idéal Saint-Valentin.\\r\\n', 'ibti@gmail.com'),
(112, 'Assortiment Chocolats Fins', '1500', 'photo_2025-05-30_14-39-32.jpg', 1, '4 chocolats variés - cœurs géométriques, aux noix, chocolat blanc aux amandes.', 'ibti@gmail.com'),
(113, 'Mini-Mousse Red Velvet', '2000', 'photo_2025-05-30_14-39-33.jpg', 1, ' Petits gâteaux mousse red velvet, ronds et cœurs, décorés à la feuille d\\\'or', 'ibti@gmail.com'),
(114, 'Gobelets Chocolat Interactifs', '700', 'photo_2025-05-30_14-39-34.jpg', 1, 'Gobelets transparents de chocolats colorés avec bâtonnets mélangeurs et rubans rouges.', 'ibti@gmail.com'),
(115, 'Cupcakes Crème Rose', '1000', 'photo_2025-05-30_14-39-35.jpg', 1, ' 6 cupcakes + gâteau rond, crème rose en forme de roses, cœur doré.', 'ibti@gmail.com'),
(116, 'Tour Macarons Prestige', '1200', 'photo_2025-05-30_14-39-36.jpg', 1, ' Macarons chocolat-vanille en tour élégante, coffret transparent avec ruban romantique.', 'ibti@gmail.com'),
(117, 'Tour Macarons Saint-Valentin', '1300', 'photo_2025-05-30_14-39-37.jpg', 1, ' Tour macarons roses avec roses naturelles et topper \\\"Happy Valentine\\\'s Day\\\".', 'ibti@gmail.com'),
(118, 'Gâteau Mariage Classique', '3500', 'photo_2025-05-30_14-39-38.jpg', 1, 'Gâteau blanc avec perles comestibles, roses rouges et topper anneaux de mariage', 'ibti@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `rating`, `comment`, `created_at`) VALUES
(9, 'ibtihel', 5, 'Votre site est magnifique, bravo !', '2025-05-31 09:19:48'),
(10, 'salsabil', 4, 'Franchement, j’adore votre site web !', '2025-05-31 09:20:16');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(24, 'grairia', 'ibtihel', 'ibtihelgrairia1@gmail.com', '$2y$10$pm66G.3XnmnJGNEwKrT7x.9Eo2cTdLLIA.6w7hiKaXtXH/bDhmKYq'),
(25, 'ghaouar', 'salsabil', 'salsabil@gmail.com', '$2y$10$Hp1BIJqIYAqsxJ9Y7bSqTucTnPxbsrsmdmpMH221hNJaf5gne8RHq'),
(26, 'grairia', 'rimes', 'rimes@gmail.com', '$2y$10$PnQC.ajVGhPv4GsB1/sH9OWXmYrbBNU3KZERvzAaDGk2D1lPoDe42'),
(27, 'ghaouar', 'imen', 'imen@gmail.com', '$2y$10$2K8Sv6mhV7/B/ShUadnnR.ImL0dM259EfkEPkdapSOGU.crHAZTlq'),
(28, 'berghouti', 'saida', 'saida@gmail.com', '$2y$10$YwyUVFxrlau1zhgJuzdJQu9mHZZn/eLfeDpZhSTd6.FK0IY81ND5S'),
(29, 'ibti', 'ibti', 'ibti@gmail.com', '$2y$10$yRLOgEahcdQiveNe4GIFnOCmeCYyasynhOZNyCNuibUutuiojxJn2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
