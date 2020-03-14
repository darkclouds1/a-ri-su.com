
-- --------------------------------------------------------

--
-- 테이블 구조 `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `wp_usermeta`
--

REPLACE INTO `wp_usermeta` VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'rich_editing', 'true'),
(3, 1, 'comment_shortcuts', 'false'),
(4, 1, 'admin_color', 'fresh'),
(5, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(8, 1, 'wp_usersettings', 'imgsize=full&hidetb=1&editor=tinymce&m5=o&urlbutton=none&m3=o&m1=o&m0=o&m9=o&m4=o'),
(7, 1, 'wp_user_level', '10'),
(9, 1, 'wp_usersettingstime', '1403013600'),
(10, 1, 'wp_autosave_draft_ids', 'a:15:{i:-1270838494;i:5;i:-1270838598;i:8;i:-1270839172;i:13;i:-1270841040;i:27;i:-1270841995;i:35;i:-1270842325;i:40;i:-1270845740;i:56;i:-1271585829;i:137;i:-1271845294;i:269;i:-1271846024;i:277;i:-1272273255;i:314;i:-1320269161;i:510;i:-1320329122;i:533;i:-1320330824;i:550;i:-1320340293;i:609;}'),
(11, 2, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(12, 2, 'wp_user_level', '10'),
(13, 3, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(14, 3, 'wp_user_level', '10'),
(15, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:\"projektsdiv\";}'),
(16, 1, 'metaboxhidden_page', 'a:1:{i:0;s:7:\"slugdiv\";}'),
(17, 1, 'wp_user-settings', 'imgsize=full&hidetb=1&editor=tinymce&m5=o&urlbutton=none&m3=o&m1=o&m0=o&m9=o&m4=o&libraryContent=browse&ed_size=360&align=center'),
(18, 1, 'wp_user-settings-time', '1520860332'),
(19, 1, 'wp_dashboard_quick_press_last_post_id', '1062'),
(20, 1, 'dismissed_wp_pointers', 'wp390_widgets,wp350_media,wp360_revisions'),
(21, 1, 'closedpostboxes_dashboard', 'a:2:{i:0;s:21:\"dashboard_quick_press\";i:1;s:17:\"dashboard_primary\";}'),
(22, 1, 'metaboxhidden_dashboard', 'a:0:{}'),
(23, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}'),
(24, 1, 'metaboxhidden_nav-menus', 'a:8:{i:0;s:8:\"add-post\";i:1;s:8:\"add-menu\";i:2;s:10:\"add-events\";i:3;s:11:\"add-gallery\";i:4;s:8:\"add-team\";i:5;s:10:\"add-slider\";i:6;s:12:\"add-post_tag\";i:7;s:17:\"add-menu_category\";}'),
(25, 1, 'nav_menu_recently_edited', '12'),
(39, 1, 'session_tokens', 'a:1:{s:64:\"82b4925f4cdc7fb35ff8fa8e8fcd1fa2595f1da7b4dd645338bd974c0404a45a\";i:1585208674;}'),
(32, 1, 'closedpostboxes_gallery', 'a:0:{}'),
(33, 1, 'metaboxhidden_gallery', 'a:1:{i:0;s:7:\"slugdiv\";}'),
(40, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:12:\"222.108.91.0\";}');
