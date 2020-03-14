
-- --------------------------------------------------------

--
-- 테이블 구조 `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `wp_terms`
--

REPLACE INTO `wp_terms` VALUES
(1, 'Asian Cuisine', 'allgemein', 0),
(2, 'Blogroll', 'blogroll', 0),
(3, 'a ri su', 'arisu', 0),
(4, 'a ri su', 'a-ri-su', 0),
(5, 'Bibimbap', 'bibimbap', 0),
(6, 'koreanische Spezialitäten', 'koreanische-spezialitaten', 0),
(7, 'Bulgogi', 'bulgogi', 0),
(8, 'Kimchi', 'kimchi', 0),
(9, 'Japchae', 'japchae', 0),
(10, 'Rezept', 'rezept', 0),
(11, 'arisu galerie', 'arisu_galerie', 0),
(12, 'Menu Standard', 'menu-standard', 0),
(13, 'Feuerfleisch', 'feuerfleisch', 0),
(14, 'Bulgogi', 'bulgogi', 0);
