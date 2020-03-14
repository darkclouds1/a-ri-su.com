
-- --------------------------------------------------------

--
-- 테이블 구조 `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `wp_term_taxonomy`
--

REPLACE INTO `wp_term_taxonomy` VALUES
(1, 1, 'category', '', 0, 8),
(2, 2, 'link_category', '', 0, 7),
(3, 3, 'category', '', 0, 8),
(4, 4, 'post_tag', '', 0, 1),
(5, 5, 'category', '', 0, 3),
(6, 6, 'category', '', 0, 6),
(7, 7, 'category', '', 0, 3),
(8, 8, 'category', '', 0, 3),
(9, 9, 'category', '', 0, 2),
(10, 10, 'category', '', 0, 1),
(11, 11, 'category', 'arisu - koreanisch essen in münchen', 0, 6),
(12, 12, 'nav_menu', '', 0, 8),
(13, 14, 'post_tag', '', 0, 1),
(14, 13, 'post_tag', '', 0, 1);
