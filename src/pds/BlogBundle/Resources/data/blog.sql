-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vygenerováno: Sob 15. bře 2014, 15:22
-- Verze serveru: 5.6.14
-- Verze PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=9 ;

--
-- Vypisuji data pro tabulku `article`
--

INSERT INTO `article` (`id`, `title`, `text`, `date`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque arcu odio, consectetur quis mollis id, accumsan sed ante. Cras vitae lectus faucibus, luctus nunc sit amet, facilisis ligula. Maecenas tincidunt neque eget libero sollicitudin venenatis. Donec aliquam tellus odio, ut volutpat urna egestas ac. Donec sit amet suscipit quam, vitae adipiscing sapien. Nullam mattis leo turpis, quis volutpat velit consectetur ac. Ut posuere, leo et euismod porttitor, urna nisi mollis nibh, eu porta felis felis sed urna. Aenean interdum ligula id iaculis euismod.', '2012-12-04 10:35:45'),
(2, 'Ut et malesuada eros', 'Ut et malesuada eros. Aliquam et augue quis ipsum pretium molestie. Vestibulum porttitor commodo dui sit amet gravida. Mauris arcu lorem, laoreet ac sagittis sed, ornare eu mi. Maecenas turpis nisl, pulvinar quis magna non, pulvinar ullamcorper magna. Maecenas mattis risus non bibendum consectetur. Proin suscipit lacinia est ut ullamcorper. Ut molestie tristique scelerisque. Ut ac lorem nunc. Suspendisse vestibulum non sapien eget dictum. Pellentesque auctor, urna vitae rhoncus convallis, urna nisi tempor augue, vitae rhoncus tortor ligula fringilla nisi. Vestibulum est turpis, convallis vel hendrerit ac, pellentesque eu est. Phasellus congue porttitor aliquet. Fusce varius, est et commodo feugiat, metus sapien mollis arcu, mollis pharetra tellus purus non nisl. Donec pretium, nibh quis commodo ultrices, magna est molestie enim, in vulputate tortor tortor eget elit. Aenean in blandit nulla.', '2012-12-23 12:41:10'),
(3, 'Vivamus tempor ante non lorem sodales', 'Aliquam scelerisque nunc lacus, eget faucibus mi molestie a. Ut eget sem eget lorem tempus suscipit eget eu lacus. Nam non interdum eros. Donec ac mattis est. Quisque ut molestie dui. Proin turpis ipsum, posuere vitae nibh suscipit, viverra auctor metus. Nunc ultrices arcu nunc, sit amet condimentum neque tempus in. Sed fringilla, eros nec placerat aliquam, est tortor luctus quam, sed elementum massa sem vel arcu. Ut orci nisl, pharetra vitae tortor vel, viverra congue est. Nullam a odio eu nulla rutrum laoreet sodales ut diam. Fusce auctor elit quis leo tincidunt, ac luctus dolor eleifend. Praesent porttitor velit eu nisl adipiscing adipiscing. Vivamus tempor ante non lorem sodales, sit amet rhoncus libero tempus. Fusce hendrerit lobortis nisi nec ultricies. In elit odio, sollicitudin quis sagittis sed, hendrerit ac felis.', '2013-01-16 20:09:03'),
(4, 'Fusce et arcu sed quam feugiat luctus', 'Vestibulum id iaculis sem, sed ultrices nibh. Fusce et arcu sed quam feugiat luctus. Suspendisse eu vehicula elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam venenatis dictum viverra. Aliquam a molestie ipsum. Donec accumsan volutpat lacus, at dapibus augue dignissim a. Curabitur blandit egestas egestas.', '2013-02-04 14:49:07'),
(5, 'Suspendisse potenti', 'Cras dapibus ligula at gravida blandit. Donec et semper leo. Maecenas consectetur lorem lorem, a mollis augue viverra eu. Duis eu eros eleifend, pulvinar dui imperdiet, convallis odio. Sed porttitor, magna et fermentum mattis, urna nulla facilisis leo, ac blandit est arcu a leo. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque vitae fermentum massa, ac sodales urna. Duis posuere elit non tempus egestas. Mauris cursus eros ligula, nec molestie tellus tristique eu. Donec lobortis cursus ornare. Nullam facilisis massa et augue imperdiet placerat iaculis id nisl.', '2013-03-24 01:16:00'),
(6, 'Phasellus sit amet tellus odio', 'Aliquam nec semper eros, id mattis tellus. Aliquam mattis luctus leo eu commodo. Integer pulvinar magna sit amet erat blandit elementum. Phasellus sit amet tellus odio. Donec orci neque, vestibulum vitae facilisis eu, vestibulum vulputate arcu. Proin nec vulputate purus, id aliquet augue. Nulla condimentum eget ligula et vehicula. Donec rutrum rutrum nibh, nec venenatis arcu rutrum a. Fusce congue ligula purus, eget dapibus massa rhoncus sit amet. Aenean et odio tellus.', '2013-06-12 11:28:43'),
(7, 'Pellentesque ac egestas nulla, eget bibendum ipsum', 'Maecenas tortor tortor, luctus eget sapien ac, gravida euismod orci. Aenean cursus convallis metus, at dignissim mauris feugiat vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce fermentum diam et tellus facilisis gravida. In hac habitasse platea dictumst. Mauris fringilla varius nibh eu auctor. Phasellus in eros vulputate, aliquam tellus at, auctor quam. Pellentesque ac egestas nulla, eget bibendum ipsum. Mauris quis felis quam. Ut convallis vitae elit vel fermentum. Nulla facilisi.', '2013-09-22 21:41:33'),
(8, 'Nam pulvinar in magna a bibendum', 'Sed in enim nisi. Donec ut nisi sed nunc pellentesque porttitor eu ac est. Vestibulum ut sem nec sem vulputate pharetra eu eu velit. Fusce aliquet suscipit dolor sed condimentum. Vestibulum vitae vehicula enim. Sed eget adipiscing metus, quis faucibus tellus. Duis condimentum enim nec ante pharetra blandit. Nam pulvinar in magna a bibendum.', '2013-10-25 17:00:37');

-- --------------------------------------------------------

--
-- Struktura tabulky `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(2500) COLLATE utf8_czech_ci NOT NULL,
  `nickname` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `date` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `comment`
--

INSERT INTO `comment` (`id`, `text`, `nickname`, `date`, `article_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula lorem, porttitor a dignissim eu, mollis ut orci. Pellentesque hendrerit nulla at elit auctor, sed imperdiet elit commodo.', 'Seeker', '2013-11-11 10:12:31', 8),
(2, 'Praesent sed gravida nisl, vitae pretium velit. Donec sed augue purus. Phasellus condimentum tempor nisl, at auctor metus semper non. Cras non elit eu lectus molestie dignissim non ut nulla. Quisque aliquam justo a imperdiet imperdiet.', 'Nikolaos Dimopoulos', '2013-11-13 14:18:39', 8),
(3, 'Fusce interdum tincidunt blandit. Nunc interdum ornare viverra.', 'Sgoettschkes', '2013-11-13 21:06:04', 8);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
