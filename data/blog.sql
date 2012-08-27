-- 
-- Structure for table `post`
-- 

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(200) NOT NULL DEFAULT 'NULL',
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- 
-- Data for table `post`
-- 

INSERT INTO `post` (`id`, `title`, `content`, `tags`, `status`, `user_id`, `updated`, `created`) VALUES
  ('1', 'My first Test', 'Test Content.', 'test, first test', '0', '1', '2012-08-27 19:13:35', '2012-08-27 19:13:35');

