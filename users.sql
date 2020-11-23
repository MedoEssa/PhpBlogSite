-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 23 nov. 2020 à 12:26
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `news_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_bio` text NOT NULL,
  `user_image` text NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_role`, `user_bio`, `user_image`, `user_date`) VALUES
(8, 'Camillia', 'Camillia', 'Rayis', 'camillia-ras@yahoo.com', '$2y$10$J80Ngf//kJRWXsAQiSXzhuwiNKvehdxvEUYHFo1tnKAaKeGypEE/.', 'admin', 'My Name Is Camillia am from America i have 22 years my work is web desinger', 'about-opt-min-160x160-150x150.png', '0000-00-00'),
(9, 'william', 'william', 'smith', 'william-smith@hotmail.com', '$2y$10$YQEmeXFcve8cMf4mwV6jkOb0ilpWLmdFFpJ8v8n5RJEs9NWD3JGBy', 'admin', 'My Name Is William am from Canada i have 25 years my work is seo', 'adult-background-casual-941693.jpg', '0000-00-00'),
(10, 'sarah', 'sarah', 'holly', 'sarah-2019@gmail.com', '', 'admin', 'My Name Is Sarah am from Australia i have 19 years my work is digetal marketing', 'admania-auimg.jpg', '2019-08-10'),
(11, 'john', 'john', 'doe', 'john-doe@gmail.com', '$2y$10$CznKTK8DvnOhZRAydbIap.34Ufwysxm/KiEFYOh6j3kMZlU9YyIh.', 'admin', 'My Name Is John am from France i have 20 years my work is hacker', 'photo-39-3-640x480.jpg', '0000-00-00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
