SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `articles` (
                            `id` int(11) NOT NULL,
                            `created_at` date NOT NULL,
                            `title` varchar(250) NOT NULL,
                            `content` text NOT NULL,
                            `author_id` int(11) NOT NULL,
                            `article_image_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `authors` (
                           `id` int(11) NOT NULL,
                           `name` varchar(250) NOT NULL,
                           `description` text NOT NULL,
                           `author_image_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `comments` (
                            `id` int(11) NOT NULL,
                            `author` varchar(250) NOT NULL,
                            `content` text NOT NULL,
                            `created_at` datetime NOT NULL,
                            `article_id` int(11) NOT NULL,
                            `ip_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `reviews` (
                           `id` int(11) NOT NULL,
                           `article_id` int(11) NOT NULL,
                           `like` tinyint(1) NOT NULL,
                           `dislike` tinyint(1) NOT NULL,
                           `created_at` datetime NOT NULL,
                           `ip_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `articles`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author_id` (`author_id`);

ALTER TABLE `authors`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id_comment` (`article_id`);

ALTER TABLE `reviews`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`);


ALTER TABLE `articles`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `authors`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `comments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reviews`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `articles`
    ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

ALTER TABLE `comments`
    ADD CONSTRAINT `fk_article_id_comment` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

ALTER TABLE `reviews`
    ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);
COMMIT;