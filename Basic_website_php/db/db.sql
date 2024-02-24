CREATE DATABASE IF NOT EXISTS users_db; 
GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'db_user'@'%';

use users_db;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES (1, 'hieu', '1234');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (2, 'admin', '1');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (3, 'quang', 'quang123');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (4, 'thinh', 'yugioh');


DROP TABLE IF EXISTS `blogs`;
CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    'user_id' INT,
    'title' VARCHAR(255) NOT NULL,
    'content' TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

