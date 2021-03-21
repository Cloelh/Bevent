-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2021 at 08:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MyForum`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `def` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `categorie`, `def`) VALUES
(1, 'javascript', 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives et à ce titre est une partie essentielle des applications web. Avec les technologies HTML et CSS, JavaScript est parfois considéré comme l\'une des technologies cœur du World Wide Web. (Source : Wikipedia)'),
(2, 'angular', '\r\nDéveloppé par Google, Angular est un Framework open source écrit en JavaScript qui permet la création d’applications Web et plus particulièrement de ce qu’on appelle des  « Single Page Applications » : des applications web accessibles via une page web unique qui permet de fluidifier l’expérience utilisateur et d’éviter les chargements de pages à chaque nouvelle action. (Source : Wikiperdia)'),
(3, 'vue.js', 'Vue.js, est un framework JavaScript open-source utilisé pour construire des interfaces utilisateur et des applications web monopages. Vue a été créé par Evan You et est maintenu par lui et le reste des membres actifs de l\'équipe principale travaillant sur le projet et son écosystème. (Source : Wikipedia)'),
(4, 'react', 'React est une bibliothèque JavaScript libre développée par Facebook depuis 2013. Le but principal de cette bibliothèque est de faciliter la création d\'application web monopage, via la création de composants dépendant d\'un état et générant une page HTML à chaque changement d\'état. (Source : Wikiperdia)');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_user`, `commentaire`, `id_sujet`) VALUES
(45, 5, 'You cannot mix synchronous and asynchronous code since that goes against the point of why async exists. It exists so you can perform actions in the background while the sync code keeps running. An example of this would be fetching information from a server - you don\'t want to keep the user waiting until EACH and EVERY fetch is done, so you do it in the background and update the page when it is complete. –', 9),
(47, 9, 'ngbCalender loads inner style in your page when page loads in browser. If you inspect and in Element tab search for .customer-day class and append border-radius : 50% ... See image below , and for Range background there will be class .range change it according to your desire color and background shape.', 13),
(48, 8, 'This is driving me crazy, spent 4hours today on trying to fix it, with no success. Even thought about switching to Chart.js, but apparently there is no real support for Vue.js 3 either.', 15),
(50, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent condimentum lectus leo, nec feugiat nisi malesuada vitae. Praesent a ex non massa placerat molestie ut nec dolor. Vivamus et magna porttitor augue fermentum egestas sit amet at felis. Vestibulum dapibus et dolor quis ullamcorper. Praesent auctor justo ornare, tempus purus ut, interdum felis. Quisque scelerisque ligula felis. Phasellus sed lectus arcu. Suspendisse cursus eu tellus sed sagittis. Quisque in ultrices quam.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `vu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_user`, `message`, `vu`) VALUES
(17, 5, 'Vous devriez ajouter une catégorie TypeScript !! ', 0),
(18, 6, 'on devrait pouvoir ajouter du code dans nos questions, ce serait possible ? ', 1),
(19, 10, 'J\'adore ce forum !! \r\nj\'aimerai pouvoir mettre des photo dans mes posts, pour certaines questions ce serait pratique :) ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `id_message`, `reponse`) VALUES
(18, 18, 'oui, ce serait possible, nous allons y reflechir dans une prochaine MAJ, merci user1 pour ta proposition :) ');

-- --------------------------------------------------------

--
-- Table structure for table `sujet`
--

CREATE TABLE `sujet` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `resolue` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sujet`
--

INSERT INTO `sujet` (`id`, `titre`, `contenu`, `id_user`, `id_cat`, `resolue`) VALUES
(8, 'How To Opt Out of Default Base64 Encoding of Images In React?', 'So as I have already stated in this question that I asked earlier this evening (which yet awaits an answer with a green check mark), react (or maybe just CRA) has this feature that encodes images to base 64 and uses that encoded text instead of the path of the image.\r\n\r\nI need to disable this feature partially or entirely because of how base 64 images affect the performance when you overuse them. Is there any way to opt out of it??', 5, 4, 1),
(9, 'Why is “async” placed on a function declaration instead of on a function call?', 'Obviously, the way of a function call (synchronous or asynchronous) should be related to the function call, not the function declaration. For example, if a function does an HTTP request, only the caller side can decide what it wants (wait for a return from the function or go to the next instruction).', 6, 1, 0),
(10, 'Java script functionality of a calculator my current JS wont print errors or output the solution', 'JAVASCRIPT errors not printing nor is solution buttons work fine and will show in the box not sure if its my catch statement is wrong for printing the solution and 0 clue what is wrong with my errors.', 7, 1, 1),
(12, 'TypeError: Failed to execute \'readAsArrayBuffer\' on \'FileReader\': parameter 1 is not of type \'Blob\'', 'I am getting an error everytime I submit my post without an image, submission of the image is optional because I run an if condition before appending the imagePath. working on a MEAN stack up to which I am new in.', 8, 2, 0),
(13, 'ng datepicker css customization and change the selected date from sqaure to circle', 'i want to custom the calendar from this[enter image description here][1] to this[enter image description here][2]\r\n\r\nCan anyone please help me out. as i am not able to understand how to change selected day cell from sqaure to circle and select the range in same way. [1]: https://i.stack.imgur.com/JRprR.png [2]: https://i.stack.imgur.com/mnQ9P.png', 5, 2, 0),
(14, 'How many instances of a module end up in the final bundle if it\'s referenced by several modules?', 'I\'m wondering what\'s the best strategy between\r\n\r\na shared module that contains all the reusable code\r\nindividual reusable codes that are referenced when needed\r\nI suppose that the case against putting all the reusable codes in a shared module is that it will be huge and will slow down the loading of the application because not every module need all the code in the share module.\r\n\r\nBoth GalleryModule and ProfileModule import CardModule. They are both lazy loaded as well.', 9, 2, 1),
(15, 'Vue 3 how to correctly update data in Highcharts?', 'I have a small webapp with Vue.js 3 that shows a Highcharts Chart and some statistics, with global buttons for time-filters (All, Year, Month, Week).\r\nThe data of my Highchart chart needs to change, whenever one of the global buttons was pressed.\r\nI used this vue3 wrapper for Highcharts: Wrappers Github\r\n\r\nDisplaying the initial data (all) works like a charm, but when it comes to updating the data, it is really slow. That makes me think that I am doing something wrong with updating the data.\r\n\r\nI uploaded a video of my problem on YT: https://youtu.be/GEjHqoAElgI\r\n\r\nTried giving my component with the Chart the data as property, and have a watcher on that data, to update the Chart whenever the data changes. This works, but updating the chart takes forever (3-5 seconds). What is the recommended way of doing something like that?\r\n\r\nThis is my component:', 9, 3, 1),
(16, 'Error Running React Native App From Terminal (iOS)', 'I am following the tutorial on the official React Native website.\r\n\r\nUsing the following to build my project:\r\n\r\nreact-native run-ios\r\nI get the error:\r\n\r\nFound Xcode project TestProject.xcodeproj\r\nxcrun: error: unable to find utility \"instruments\", not a developer   \r\ntool or in PATH\r\n\r\nCommand failed: xcrun instruments -s\r\nxcrun: error: unable to find utility \"instruments\", not a developer \r\ntool or in PATH\r\nAlthough, when I run the app from the .xcodeproj, everything works fine.\r\n\r\nAny suggestions?', 10, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `idUserProfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail`, `mdp`, `role`, `idUserProfil`) VALUES
(4, 'admin', 'admin@admin.fr', '00d70c561892a94980befd12a400e26aeb4b8599', 'admin', 7),
(5, 'cloelh', 'cloelh@outlook.fr', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 10),
(6, 'user1', 'user1@gmail.com', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 6),
(7, 'user2', 'user2@gmail.com', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 9),
(8, 'user3', 'user3@gmail.com', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 1),
(9, 'user4', 'user4@gmail.com', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 9),
(10, 'user5', 'user5@gmail.com', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 13);

-- --------------------------------------------------------

--
-- Table structure for table `userProfil`
--

CREATE TABLE `userProfil` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userProfil`
--

INSERT INTO `userProfil` (`id`, `name`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userProfil`
--
ALTER TABLE `userProfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userProfil`
--
ALTER TABLE `userProfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
