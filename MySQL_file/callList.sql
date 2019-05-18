CREATE TABLE `calllist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `call_type` varchar(10) NOT NULL,
  `number` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `call_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `calllist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userlist` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
