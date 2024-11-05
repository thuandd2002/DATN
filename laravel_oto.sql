/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3306
 Source Schema         : laravel_oto

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 11/01/2023 15:16:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_social
-- ----------------------------
DROP TABLE IF EXISTS `account_social`;
CREATE TABLE `account_social` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `provider_user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `account_social_provider_user_id_index` (`provider_user_id`) USING BTREE,
  KEY `account_social_provider_index` (`provider`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of account_social
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` tinyint DEFAULT '0',
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint DEFAULT '1',
  `hard_salary` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admins_email_unique` (`email`) USING BTREE,
  KEY `admins_active_index` (`active`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
BEGIN;
INSERT INTO `admins` VALUES (1, 'Admin', 'doantotnghiep@gmail.com', '0377523200', 'Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phư', 20, NULL, '$2y$10$diDOgZLBCVc0h562OXkQ/uvLl2o0nYz4TRcSn0uKuNMbXD8Jj8/j.', 1, 7000000, '6Dnl8e8jTVZZG1pdCoYpYS5Id29xRcztZvtgUX0PkpbbyONcvXktQaW7NbWo', NULL, '2022-12-12 10:44:49');
INSERT INTO `admins` VALUES (49, 'Vũ Minh Hoàng', 'hoangvmph13792@fpt.edu.vn', '0372482834', '118B Lê Quang Đạo', 20, NULL, '$2y$10$oyvtBG9B/tnPu3fg4m1C7uImqEONs7MeqDS9lNQhLo4NhBbDjVn/a', 1, 20000000, '3KmgzMOHhW7h8QxviQjwFL8ZtskDBmloV5gw0SgnjxmAGULaVF9d6gjazs1z', '2022-12-24 10:55:25', '2022-12-24 10:55:25');
INSERT INTO `admins` VALUES (50, 'Nguyễn Văn Sơn', 'sonnnph13838@fpt.edu.vn', '0377523200', 'Hà Nội', 20, NULL, '$2y$10$fW0qgpojha6Cqr89JgsOoOecZh3MA0ECe8qDLALLItgiEwbikHKXC', 1, 20000000, 'shUHNVJGVxLzNymf5RLf4LO25QbLPT6dQW6egFJVievpRDHfa1IlXKV072EO', '2022-12-24 10:56:28', '2022-12-24 10:56:28');
INSERT INTO `admins` VALUES (51, 'Đinh Đức Thuận', 'thuanddph13844@fpt.edu.vn', '0327292046', 'Hà Nội', 20, NULL, '$2y$10$RAY2iKnDZi32YlsxB.kD5O7f9EVv1DSqnZbTbU7qhMQd.d1/822LG', 1, 20000000, 'pnTI89KEra7v2UeWj7VQ8lc2yqIaVfUe2SEsX9EpuxJYMjbXzRrIZKGAiPcl', '2022-12-24 11:00:03', '2022-12-24 11:00:03');
INSERT INTO `admins` VALUES (52, 'Đỗ Thành Tuấn', 'tuandtph13846@fpt.edu.vn', '0702022234', 'Hà Nội', 20, NULL, '$2y$10$DLtNkEg6wgreMXXgJJuEXOAK3zmyqJT/uZUftnja4jSTlSA2bClGy', 1, 20000000, 'cbeUaDe2LeyV9x5ZVdWtkCIZeWm0bZZKmPXwajG9s1GgQgGIROdir93diHNA', '2022-12-24 11:02:00', '2022-12-24 11:02:00');
INSERT INTO `admins` VALUES (53, 'Kiều Anh Đức', 'duckaph09551@fpt.edu.vn', '0964864347', 'Hà Nội', 22, NULL, '$2y$10$FgwnIuF1oSZXNzCYVwUqbeRc5WpqnLvcaHw/RDpj6KJO0QOjsEYYK', 1, 30000000, 'UgRxuDM5ZMTKc0HQgJGMrZnqwO3ZrUPxnHnNSdm9bSe9awkO9Q5BP6yCvTVZ', '2022-12-24 11:03:51', '2022-12-24 11:03:51');
COMMIT;

-- ----------------------------
-- Table structure for article_keywords
-- ----------------------------
DROP TABLE IF EXISTS `article_keywords`;
CREATE TABLE `article_keywords` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ak_article_id` int NOT NULL,
  `ak_keyword_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `article_keywords_ak_article_id_ak_keyword_id_unique` (`ak_article_id`,`ak_keyword_id`) USING BTREE,
  KEY `article_keywords_ak_article_id_index` (`ak_article_id`) USING BTREE,
  KEY `article_keywords_ak_keyword_id_index` (`ak_keyword_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of article_keywords
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `a_title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_menu_id` int DEFAULT '0',
  `a_description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `a_admin_id` int DEFAULT '0',
  `a_auth_id` int DEFAULT '0',
  `a_view` int DEFAULT '0',
  `a_active` tinyint DEFAULT '1',
  `a_hot` tinyint DEFAULT '0',
  `a_point_rating` int DEFAULT '0',
  `a_total_ratings` int DEFAULT '0',
  `a_title_seo` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_keyword_seo` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_description_seo` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `articles_a_menu_id_index` (`a_menu_id`) USING BTREE,
  KEY `articles_a_admin_id_index` (`a_admin_id`) USING BTREE,
  KEY `articles_a_auth_id_index` (`a_auth_id`) USING BTREE,
  KEY `articles_a_active_index` (`a_active`) USING BTREE,
  KEY `articles_a_hot_index` (`a_hot`) USING BTREE,
  KEY `articles_a_point_rating_index` (`a_point_rating`) USING BTREE,
  KEY `articles_a_total_ratings_index` (`a_total_ratings`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of articles
-- ----------------------------
BEGIN;
INSERT INTO `articles` VALUES (7, 'Advertisement Lịch sử và nguồn gốc ô tô Honda của nước nào?', 'advertisement-lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao', 23, 'Advertisement Lịch sử và nguồn gốc ô tô Honda của nước nào?', '2022-12-19__1ewqwe.jpg', '<h2>Honda của nước n&agrave;o v&agrave; thương hiệu đ&atilde; trải qua bao nhi&ecirc;u cột mốc lịch sử từ ng&agrave;y mới th&agrave;nh lập đến nay c&oacute; thể l&agrave; c&acirc;u hỏi đ&atilde; từng xuất hiện trong t&acirc;m tr&iacute; của người h&acirc;m mộ. Theo đ&oacute;, bảng thống k&ecirc; tổng quan sau c&oacute; thể phần n&agrave;o giải đ&aacute;p được c&aacute;c thắc mắc của c&aacute;c tay l&aacute;i đam m&ecirc; xe Honda.</h2>\r\n\r\n<p><img alt=\"Lịch sử và nguồn gốc ô tô Honda của nước nào ?\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-13c1.jpg\" title=\"Lịch sử và nguồn gốc ô tô Honda của nước nào?\" /></p>\r\n\r\n<p><em>Lịch sử v&agrave; nguồn gốc &ocirc; t&ocirc; Honda của nước n&agrave;o?</em></p>\r\n\r\n<h2><strong>1937</strong></h2>\r\n\r\n<p><img alt=\"Lịch sử và nguồn gốc ô tô Honda Nhật bắt đầu từ 1937.\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-3199.jpg\" title=\"Lịch sử và nguồn gốc ô tô Honda Nhật bắt đầu từ 1937\" /></p>\r\n\r\n<p>Lịch sử v&agrave; nguồn gốc &ocirc; t&ocirc; Honda Nhật bắt đầu từ 1937.</p>\r\n\r\n<p>H&atilde;ng xe Honda của Nhật được th&agrave;nh lập bởi Soichiro Honda v&agrave;o năm 1937. Soichiro Honda l&agrave; một người rất đam m&ecirc; &ocirc; t&ocirc;. &Ocirc;ng l&agrave;m việc như một thợ cơ kh&iacute; tại garage Art Show KY v&agrave; tham gia v&agrave;o c&aacute;c cuộc đua với sự t&agrave;i trợ từ người bạn Cathodes. Honda th&agrave;nh lập Tokai CK để chế tạo v&ograve;ng piston. Sau những thất bại ban đầu, Tokai CK đ&atilde; gi&agrave;nh được hợp đồng cung cấp v&ograve;ng piston cho Toyota nhưng mất hợp đồng do chất lượng sản phẩm k&eacute;m. Honda đ&atilde; theo học tại một trường kỹ thuật nhưng kh&ocirc;ng tốt nghiệp do đến thăm c&aacute;c nh&agrave; m&aacute;y tr&ecirc;n khắp Nhật Bản để hiểu r&otilde; hơn về quy tr&igrave;nh kiểm so&aacute;t chất lượng của Toyota.</p>\r\n\r\n<h2><strong>1941</strong></h2>\r\n\r\n<p><img alt=\"Thương hiệu ô tô Honda vào 1941 tập trung vào sản xuất mô-tơ rồi xe đạp cơ giới.\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-f8c4.jpg\" title=\"Thương hiệu ô tô Honda vào 1941 tập trung vào sản xuất mô-tơ rồi xe đạp cơ giới\" /></p>\r\n\r\n<p><em>Thương hiệu &ocirc; t&ocirc; Honda v&agrave;o 1941 tập trung v&agrave;o sản xuất m&ocirc;-tơ rồi xe đạp cơ giới.</em></p>\r\n\r\n<p>Đến năm 1941, Honda đ&atilde; c&oacute; thể sản xuất h&agrave;ng loạt v&ograve;ng piston được Toyota chấp nhận bằng c&aacute;ch sử dụng quy tr&igrave;nh tự động. Tokai nằm dưới sự kiểm so&aacute;t của Bộ Thương mại v&agrave; C&ocirc;ng nghiệp khi bắt đầu Thế chiến thứ hai. Soichiro Honda đ&atilde; bị gi&aacute;ng chức từ chủ tịch th&agrave;nh gi&aacute;m đốc điều h&agrave;nh cấp cao sau khi Toyota chiếm 40% cổ phần của c&ocirc;ng ty.</p>\r\n\r\n<p>Do chiến tranh t&agrave;n ph&aacute; nh&agrave; m&aacute;y, Soichiro Honda đ&atilde; phải b&aacute;n hết phần c&ograve;n lại của c&ocirc;ng ty cho Toyota với gi&aacute; 450.000 y&ecirc;n (98 triệu đồng) v&agrave; sử dụng số tiền thu được để th&agrave;nh lập Viện nghi&ecirc;n cứu kỹ thuật Honda với một đội ngũ ban đầu chỉ 12 người. Họ chế tạo v&agrave; b&aacute;n ra xe đạp cơ giới với nguồn cung cấp l&agrave; 500 động cơ Tohatsu 50cc 2 th&igrave; hoặc m&aacute;y ph&aacute;t điện hướng t&acirc;m. Khi hết động cơ, Honda bắt đầu chế tạo bản sao động cơ Tohatsu của ri&ecirc;ng m&igrave;nh.</p>\r\n\r\n<h2><strong>1949</strong></h2>\r\n\r\n<p><img alt=\"Thương hiệu ô tô Honda Motor chập chững ra đời.\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-0845.jpg\" title=\"Thương hiệu ô tô Honda Motor chập chững ra đời\" /></p>\r\n\r\n<p><em>Thương hiệu &ocirc; t&ocirc; Honda Motor chập chững ra đời.</em></p>\r\n\r\n<p>Năm 1949, Viện nghi&ecirc;n cứu kỹ thuật của Honda đ&atilde; c&oacute; đủ tiền để trở th&agrave;nh Honda Motor. Gần như c&ugrave;ng l&uacute;c đ&oacute;, Honda thu&ecirc; kỹ sư Kihachiro Kawashima v&agrave; Takeo Fujisawa để hỗ trợ mặt kinh doanh v&agrave; tiếp thị. Sự hợp t&aacute;c chặt chẽ n&agrave;y đ&atilde; gi&uacute;p c&ocirc;ng ty ph&aacute;t triển mạnh. Mẫu xe m&aacute;y ho&agrave;n chỉnh đầu ti&ecirc;n c&oacute; cả khung v&agrave; động cơ do Honda sản xuất l&agrave; 1949 D type.</p>\r\n\r\n<h2><strong>1964</strong></h2>\r\n\r\n<p><img alt=\"Thương hiệu ô tô Honda tiến đến thị trường 4 bánh.\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-bafc.jpg\" title=\"Thương hiệu ô tô Honda tiến đến thị trường 4 bánh\" /></p>\r\n\r\n<p><em>Thương hiệu &ocirc; t&ocirc; Honda tiến đến thị trường 4 b&aacute;nh.</em></p>\r\n\r\n<p>Honda Motor ph&aacute;t triển trong một thời gian ngắn để trở th&agrave;nh nh&agrave; sản xuất xe m&aacute;y lớn nhất thế giới v&agrave;o năm 1964. Mẫu xe &ocirc; t&ocirc; phi&ecirc;n bản sản xuất đầu ti&ecirc;n của Honda l&agrave; b&aacute;n tải mini chạy bằng động cơ xăng cỡ nhỏ 356 cc. Trong những năm 70, Honda tiếp tục ph&aacute;t triển c&aacute;c d&ograve;ng xe mới v&agrave; mở rộng tầm nh&igrave;n. Honda đ&atilde; xuất khẩu được Civic sang Mỹ. Mẫu xe tiết kiệm nhi&ecirc;n liệu n&agrave;y đ&uacute;ng l&agrave; những g&igrave; kh&aacute;ch h&agrave;ng Mỹ cần khi diễn ra cuộc khủng hoảng năng lượng v&agrave; gi&aacute; xăng tăng vọt.</p>\r\n\r\n<h2><strong>1979 - 1984</strong></h2>\r\n\r\n<p><img alt=\"Thương hiệu ô tô Honda đa dạng hóa dòng sản phẩm.\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-887b.jpg\" title=\"Thương hiệu ô tô Honda đa dạng hóa dòng sản phẩm\" /></p>\r\n\r\n<p>QUẢNG C&Aacute;O<iframe height=\"600\" id=\"iframe-camp-rectanglemiddetail\" src=\"https://oto.com.vn/campaign-bn-iframe?pageID=21&amp;localtionID=33&amp;makeID=28&amp;modelId=&amp;width=360&amp;height=600&amp;bannerTemplate=RectangleMidDetail&amp;bannerTemplateType=0&amp;classProperty=&amp;platform=0&amp;isLargestContentPaint=0&amp;classProperty=&amp;initVideo=1&amp;\" width=\"360\"></iframe></p>\r\n\r\n<p><em>Thương hiệu &ocirc; t&ocirc; Honda đa dạng h&oacute;a d&ograve;ng sản phẩm.</em></p>\r\n\r\n<p>Một giai đoạn mới trong lịch sử của Honda đ&atilde; mở ra khi trở th&agrave;nh nh&agrave; sản xuất &ocirc; t&ocirc; Nhật Bản đầu ti&ecirc;n mở cơ sở sản xuất tại Mỹ v&agrave;o năm 1979. Năm 1984, Honda CRX HF l&agrave; mẫu xe đầu ti&ecirc;n tr&ecirc;n thế giới đạt được đ&aacute;nh gi&aacute; tiết kiệm nhi&ecirc;n liệu 4,7 l&iacute;t/100km từ EPA. Honda đ&atilde; l&agrave;m việc để mở rộng d&ograve;ng sản phẩm của m&igrave;nh v&agrave; xuất khẩu xe sang nhiều nước tr&ecirc;n thế giới. Honda đ&atilde; giới thiệu thương hiệu Acura trong nỗ lực gi&agrave;nh chỗ đứng tr&ecirc;n thị trường xe hạng sang. Sau khi người s&aacute;ng lập Soichiro Honda qua đời trong những năm đầu 90, gi&aacute;m đốc điều h&agrave;nh mới Kawamoto đ&atilde; h&agrave;nh động nhanh ch&oacute;ng để thay đổi văn h&oacute;a doanh nghiệp của Honda. Kế hoạch ph&aacute;t triển sản phẩm định hướng thị trường dẫn đến sự ra mắt của Odyssey v&agrave; CR-V thế hệ đầu ti&ecirc;n.</p>\r\n\r\n<ul>\r\n	<li><strong><a href=\"https://oto.com.vn/bang-gia-xe-o-to-honda-moi-nhat\" title=\"Bảng giá xe Honda\">Bảng gi&aacute; xe Honda</a></strong></li>\r\n</ul>\r\n\r\n<h2><strong>1992</strong></h2>\r\n\r\n<p>Từ năm 1992, Honda đ&atilde; trở th&agrave;nh một c&aacute;i t&ecirc;n quen thuộc trong ng&agrave;nh c&ocirc;ng nghiệp &ocirc; t&ocirc;. H&atilde;ng trở th&agrave;nh &ldquo;người đi đầu&rdquo; trong việc sản xuất &ocirc; t&ocirc; chất lượng m&agrave; người ti&ecirc;u d&ugrave;ng y&ecirc;u th&iacute;ch. Honda thậm ch&iacute; c&ograve;n ở vị tr&iacute; thứ 24 trong danh s&aacute;ch c&aacute;c thương hiệu gi&aacute; trị nhất của Forbes.</p>\r\n\r\n<h2><strong>1995</strong></h2>\r\n\r\n<p>L&agrave; một phần trong tầm nh&igrave;n của n&oacute; để tạo ra một tương lai di chuyển bền vững hơn, Honda đ&atilde; giới thiệu mẫu xe pin nhi&ecirc;n liệu Clarity đại diện cho c&ocirc;ng nghệ xe kh&ocirc;ng ph&aacute;t thải h&agrave;ng đầu. Honda Clarity chạy bằng hydro c&oacute; thể di chuyển l&ecirc;n đến 589km chỉ bằng một b&igrave;nh nhi&ecirc;n liệu duy nhất v&agrave; ph&aacute;t ra chỉ hơi nước.</p>\r\n\r\n<p><img alt=\"Thương hiệu ô tô Honda đạt được nhiều thành công cho đến nay.\" src=\"https://img1.oto.com.vn/2020/04/29/8RgE0bMU/lich-su-va-nguon-goc-o-to-honda-cua-nuoc-nao-oto-c-374a.jpg\" title=\"Thương hiệu ô tô Honda đạt được nhiều thành công cho đến nay\" /></p>\r\n\r\n<p>Thương hiệu &ocirc; t&ocirc; Honda đạt được nhiều th&agrave;nh c&ocirc;ng cho đến nay.</p>\r\n\r\n<h2><strong>2018</strong></h2>\r\n\r\n<p>Honda Accord thế hệ thứ mười l&agrave; một trong những mẫu xe phổ biến nhất tại Mỹ v&agrave; đ&atilde; gi&agrave;nh được giải thưởng xe hơi Bắc Mỹ của năm. Accord cũng l&agrave; mẫu xe đầu ti&ecirc;n của một nh&agrave; sản xuất &ocirc; t&ocirc; Nhật Bản được sản xuất tại Mỹ với sản lượng vượt qu&aacute; 11 triệu xe. Trong hơn 35 năm, Honda hiện đang hướng tới một mục ti&ecirc;u quan trọng l&agrave; giảm 30% lượng kh&iacute; thải CO2.</p>', 1, 0, 7, 1, 0, 0, 0, 'Advertisement\r\nLịch sử và nguồn gốc ô tô Honda', 'Advertisement\r\nLịch sử và nguồn gốc ô tô Honda', 'Advertisement\r\nLịch sử và nguồn gốc ô tô Honda', '2022-12-19 16:11:15', '2022-12-22 10:32:26');
INSERT INTO `articles` VALUES (8, 'Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu', 'muon-ruoc-honda-cr-v-choi-tet-khach-hang-phai-bo-them-tram-trieu', 23, 'Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu', '2022-12-19__honda-crv-2017-1.jpg', '<h1>Muốn rước Honda CR-V chơi Tết kh&aacute;ch h&agrave;ng phải bỏ th&ecirc;m trăm triệu</h1>\r\n\r\n<p>&nbsp;Thứ tư, 03/01/2018 | 16:02</p>\r\n\r\n<p><a href=\"https://autoexpress.vn/upload/autoexpress_news/2018/01/xe-doi-song/03-01/honda-crv-2017-1.jpg\" id=\"post-img-0\" rel=\"view_image_post_5348\" title=\"Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu\"><img alt=\"Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu\" src=\"https://autoexpress.vn/upload/autoexpress_news/2018/01/xe-doi-song/03-01/honda-crv-2017-1.jpg\" style=\"width:100%\" /></a></p>\r\n\r\n<p><em>Với số lượng c&oacute; hạn gần 700 chiếc Honda CR-V thế hệ mới đ&atilde; được th&ocirc;ng quan trong những ng&agrave;y cuối c&ugrave;ng của năm 2017 v&agrave; được b&aacute;n trước Tết. Đ&acirc;y cũng l&agrave; l&uacute;c kh&aacute;ch &quot;h&acirc;m mộ&quot; thương hiệu n&agrave;y lại được thưởng thức chi&ecirc;u b&aacute;n h&agrave;ng kh&ocirc;ng c&ograve;n xưa cũ.</em></p>\r\n\r\n<p>Ngay khi những h&igrave;nh ảnh đầu ti&ecirc;n về chiếc CR-V thế hệ mới ch&iacute;nh thức xuất hiện, t&ocirc;i đ&atilde; mong chờ được trải nghiệm kh&ocirc;ng gian tr&ecirc;n chiếc xe 5+2 n&agrave;y. Nhưng kh&ocirc;ng v&igrave; thế m&agrave; t&ocirc;i c&oacute; thể bỏ ra số tiền lớn cao hơn gi&aacute; b&aacute;n đề xuất để rước vợ 2 về sớm được v&igrave; t&ocirc;i ch&uacute;a gh&eacute;t kiểu &quot;con bu&ocirc;n chộp giật&quot; khi h&agrave;ng h&oacute;a khan hiếm.</p>\r\n\r\n<p>Vẫn biết phi&ecirc;n bản nhập khẩu được Honda mang về Việt Nam với ngoại thất bắt mắt hơn v&agrave; t&acirc;m l&yacute; chuộng xe nhập của kh&aacute;ch Việt nhưng cứ mỗi độ &quot;tết đến xu&acirc;n về&quot; th&igrave; b&agrave;i ca tăng gi&aacute;, &eacute;p gi&aacute; lại được diễn lại. Với khoảng gần 700 chiếc Honda CR-V mới đ&atilde; được th&ocirc;ng quan trong những ng&agrave;y cuối c&ugrave;ng của năm 2017 th&igrave; nhiều khả năng kh&aacute;ch h&agrave;ng c&oacute; thể sở hữu những chiếc CR-V ngay trước Tết Mậu Tuất 2018. Tuy nhi&ecirc;n nếu muốn lấy xe chơi Tết sẽ phải chịu mức gi&aacute; cao hơn so với thời điểm sau Tết khi m&agrave; lượng cung c&oacute; thể sẽ dồi d&agrave;o.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://autoexpress.vn/upload/autoexpress_news/2018/01/xe-doi-song/03-01/honda-crv-2017-2.jpg\" id=\"post-img-1\" rel=\"highlight5348\" title=\"Honda CR-V thế hệ mới bị ép giá khi khan hàng\"><img alt=\"Honda CR-V thế hệ mới bị ép giá khi khan hàng\" src=\"https://autoexpress.vn/upload/autoexpress_news/2018/01/xe-doi-song/03-01/honda-crv-2017-2.jpg\" title=\"Honda CR-V thế hệ mới bị ép giá khi khan hàng\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chả thế m&agrave; anh bạn t&ocirc;i ở Nam Từ Li&ecirc;m - H&agrave; Nội vừa cho hay: &quot;Anh c&oacute; đặt mua chiếc CR-V mới bản cao cấp nhất v&agrave; dự kiến sẽ được giao xe v&agrave;o th&aacute;ng 3/2018. Tuy nhi&ecirc;n mới đ&acirc;y nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng tại Honda Mỹ Đ&igrave;nh đ&atilde; gọi điện v&agrave; th&ocirc;ng b&aacute;o đ&atilde; c&oacute; một lượng hạn chế Honda CR-V được nhập về nhưng nếu muốn lấy xe ngay gi&aacute; th&igrave; gi&aacute; b&aacute;n của xe l&agrave; 1,25 tỷ đồng thay v&igrave; mức gi&aacute; 1,1 tỷ đồng theo hợp đồng&quot;. C&aacute;i c&acirc;u chuyện mua xe tiền tỷ sao m&agrave; gian nan, vất vả đến vậy. Muốn lấy xe chơi tết kh&aacute;ch h&agrave;ng phải bỏ th&ecirc;m số tiền kh&ocirc;ng hề nhỏ v&igrave; l&yacute; do khan h&agrave;ng đồng nghĩa với việc kh&aacute;ch &quot;h&acirc;m mộ&quot; thương hiệu n&agrave;y lại được thưởng thức b&agrave;i ca&nbsp;&quot;&eacute;p gi&aacute;&quot;.</p>\r\n\r\n<p>T&acirc;m l&yacute; của đa số kh&aacute;ch h&agrave;ng muốn nhận xe sớm v&agrave; phần lớn trong số họ&nbsp;sẵn s&agrave;ng m&oacute;c hầu bao chi th&ecirc;m tiền để rước được &quot;vợ 2&quot; sớm về dinh. Đ&acirc;y cũng l&agrave; cơ hội để c&aacute;c đại l&yacute; v&agrave; nh&acirc;n vi&ecirc;n tha hồ mặc cả, l&agrave;m gi&aacute;. Với c&aacute; nh&acirc;n t&ocirc;i việc mua một chiếc xe &ocirc; t&ocirc; l&agrave; việc trọng đại, một t&agrave;i sản lớn vượt qua hẳn định nghĩa về phương tiện. Nhưng sẽ kh&ocirc;ng mua bằng mọi gi&aacute; v&agrave; thỏa hiệp với chi&ecirc;u thức b&aacute;n h&agrave;ng &quot;chộp giật&quot;. Tr&ecirc;n thị trường c&ograve;n rất nhiều lựa chọn kh&aacute;c c&ugrave;ng ph&acirc;n kh&uacute;c CUV 5 chỗ, h&atilde;y th&ocirc;ng th&aacute;i với việc xuống tiền của m&igrave;nh.</p>', 1, 0, 2, 1, 0, 0, 0, 'Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu', 'Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu', 'Muốn rước Honda CR-V chơi Tết khách hàng phải bỏ thêm trăm triệu', '2022-12-19 16:51:44', '2022-12-19 22:51:19');
INSERT INTO `articles` VALUES (9, 'TƯ VẤN - ĐÁNH GIÁ XE', 'tu-van---danh-gia-xe', 23, 'TƯ VẤN - ĐÁNH GIÁ XE', '2022-12-19__khu-vuc-trai-nghiem-phong-cach-song.jpg', '<h1>Toyota mang 7 mẫu xe mới đến Triển l&atilde;m &Ocirc; t&ocirc; Việt Nam 2022</h1>\r\n\r\n<p>&nbsp;Thứ tư, 26/10/2022 | 19:40</p>\r\n\r\n<p><a href=\"https://autoexpress.vn/upload/autoexpress_news/2022/26/toyota-lexus/khu-vuc-trai-nghiem-phong-cach-song.jpg\" id=\"post-img-0\" rel=\"view_image_post_6302\" title=\"Toyota mang 7 mẫu xe mới đến Triển lãm Ô tô Việt Nam 2022\"><img alt=\"Toyota mang 7 mẫu xe mới đến Triển lãm Ô tô Việt Nam 2022\" src=\"https://autoexpress.vn/upload/autoexpress_news/2022/26/toyota-lexus/khu-vuc-trai-nghiem-phong-cach-song.jpg\" style=\"width:100%\" /></a></p>\r\n\r\n<p><em>Tại Triển l&atilde;m &Ocirc; t&ocirc; Việt Nam 2022, Toyota Việt Nam chuyển m&igrave;nh đầy mới mẻ với c&aacute;c sản phẩm mới bao gồm c&aacute;c mẫu xe điện h&oacute;a, đại diện cho tầm nh&igrave;n Trung h&ograve;a Carbon v&agrave; mục ti&ecirc;u Ph&aacute;t triển bền vững to&agrave;n cầu.</em></p>\r\n\r\n<p>Tại Triển l&atilde;m năm nay, Toyota muốn khẳng định cam kết &ldquo;Move Your World&rdquo; bằng những trải nghiệm tuyệt vời trong từng g&oacute;c trưng b&agrave;y được thiết kế tinh tế với dải sản phẩm thế hệ mới v&agrave; c&aacute;c hoạt động tương t&aacute;c đầy th&uacute; vị:</p>\r\n\r\n<p>Khu vực trải nghiệm sản phẩm điện h&oacute;a: Nơi trưng b&agrave;y c&aacute;c mẫu xe điện h&oacute;a giảm ph&aacute;t thải kh&iacute; Carbon, thể hiện định hướng chuyển đổi của Toyota sang những d&ograve;ng xe xanh, th&acirc;n thiện với m&ocirc;i trường. Xe thuần điện sẽ l&agrave; tương lai kh&ocirc;ng xa, nhưng Hybrid vẫn l&agrave; giải ph&aacute;p thực tiễn trong điều kiện hiện tại.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://autoexpress.vn/upload/autoexpress_news/2022/26/toyota-lexus/ong-hiroyuki-ueda-va-ong-yoshiki-konishi-tai-gian-hang-toyota.jpg?1666824130922\" id=\"post-img-1\" rel=\"highlight6302\" title=\"ong-hiroyuki-ueda-va-ong-yoshiki-konishi-tai-gian-hang-toyota\"><img alt=\"ong-hiroyuki-ueda-va-ong-yoshiki-konishi-tai-gian-hang-toyota\" src=\"https://autoexpress.vn/upload/autoexpress_news/2022/26/toyota-lexus/ong-hiroyuki-ueda-va-ong-yoshiki-konishi-tai-gian-hang-toyota.jpg?1666824130922\" title=\"ong-hiroyuki-ueda-va-ong-yoshiki-konishi-tai-gian-hang-toyota\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Khu vực trải nghiệm sản phẩm: Khẳng định sức s&aacute;ng tạo kh&ocirc;ng giới hạn với mẫu xe Vios được kho&aacute;c l&ecirc;n m&igrave;nh một diện mạo trẻ trung v&agrave; năng động, trong khi Avanza Premio được thiết kế như một tiệm c&agrave; ph&ecirc; di động, chắc chắn sẽ lưu lại ấn tượng kh&oacute; qu&ecirc;n cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Khu vực trải nghiệm phong c&aacute;ch sống: Trưng b&agrave;y mẫu xe SUV v&agrave; B-MPV gồm Veloz Cross, Corolla Cross v&agrave; Fortuner Legender - &ldquo;người bạn&rdquo; đồng h&agrave;nh ho&agrave;n hảo, đa sắc m&agrave;u cho h&agrave;nh tr&igrave;nh của mỗi c&aacute; nh&acirc;n v&agrave; gia đ&igrave;nh.</p>\r\n\r\n<p>Tại thị trường Việt Nam, d&ograve;ng xe Toyota Hybrid hiện được xem l&agrave; giải ph&aacute;p thiết thực nhất trong điều kiện hiện tại nhờ kết hợp 2 động cơ xăng v&agrave; điện mang đến khả năng tiết kiệm nhi&ecirc;n liệu, th&acirc;n thiện m&ocirc;i trường, vận h&agrave;nh mạnh mẽ v&agrave; y&ecirc;n tĩnh.</p>\r\n\r\n<p>Tại Triển l&atilde;m lần n&agrave;y, Toyota trưng b&agrave;y c&aacute;c mẫu xe điện h&oacute;a, minh chứng cho những nỗ lực của Toyota trong việc giảm thiểu ph&aacute;t thải kh&iacute; Carbon, qua đ&oacute; tạo ra tương lai ph&aacute;t triển bền vững bằng nguồn năng lượng xanh. bZ4X &ndash; mẫu xe SUV thuần điện tương lai với khả năng vận h&agrave;nh &ecirc;m &aacute;i, động cơ mạnh mẽ v&agrave; cảm gi&aacute;c l&aacute;i tuyệt vời. bZ4X được xem l&agrave; bước đi đầu ti&ecirc;n trong chiến lược ph&aacute;t triển th&ecirc;m c&aacute;c t&ugrave;y chọn xe thuần điện của Toyota to&agrave;n cầu hướng tới tương lai.</p>\r\n\r\n<p>Toyota cũng h&eacute; lộ việc sản xuất v&agrave; lắp r&aacute;p mẫu xe Veloz Cross v&agrave; Avanza Premio tại Việt Nam từ th&aacute;ng 12/2022 với mức gi&aacute; kh&ocirc;ng đổi. Tại triển l&atilde;m lần n&agrave;y, Toyota mang tới cho kh&aacute;ch h&agrave;ng cơ hội chi&ecirc;m ngưỡng mẫu xe Veloz Cross được sản xuất v&agrave; lắp r&aacute;p ho&agrave;n to&agrave;n tại Việt Nam. Với việc chuyển đổi nguồn cung sang sản xuất, lắp r&aacute;p trong nước, Toyota tin rằng sẽ chủ động hơn trong việc cải thiện nguồn cung để đ&aacute;p ứng nhu cầu của kh&aacute;ch h&agrave;ng. C&ugrave;ng với đ&oacute;, Toyota cũng sẽ d&agrave;nh tặng g&oacute;i khuyến m&atilde;i &ldquo;gia hạn bảo h&agrave;nh 2 năm hoặc 50.000km (t&ugrave;y thuộc điều kiện n&agrave;o đến trước)&rdquo; cho những kh&aacute;ch h&agrave;ng mua mẫu xe Veloz Cross v&agrave; Avanza Premio sản xuất lắp r&aacute;p trong nước từ th&aacute;ng 12/2022 đến hết ng&agrave;y 31/12/2023 như một th&ocirc;ng điệp v&agrave; cam kết chất lượng mạnh mẽ từ Toyota với kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://autoexpress.vn/upload/autoexpress_news/2022/26/toyota-lexus/ong-hiroyuki-ueda---tong-giam-doc-cong-ty-toyota-viet-nam-phat-bieu-tai-trien-lam-o-to-viet-nam.jpg?1666824158130\" id=\"post-img-2\" rel=\"highlight6302\" title=\"ong-hiroyuki-ueda---tong-giam-doc-cong-ty-toyota-viet-nam-phat-bieu-tai-trien-lam-o-to-viet-nam\"><img alt=\"ong-hiroyuki-ueda---tong-giam-doc-cong-ty-toyota-viet-nam-phat-bieu-tai-trien-lam-o-to-viet-nam\" src=\"https://autoexpress.vn/upload/autoexpress_news/2022/26/toyota-lexus/ong-hiroyuki-ueda---tong-giam-doc-cong-ty-toyota-viet-nam-phat-bieu-tai-trien-lam-o-to-viet-nam.jpg?1666824158130\" title=\"ong-hiroyuki-ueda---tong-giam-doc-cong-ty-toyota-viet-nam-phat-bieu-tai-trien-lam-o-to-viet-nam\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với việc ra mắt th&ecirc;m một mẫu xe lắp r&aacute;p trong nước, số lượng nh&agrave; cung cấp linh, phụ kiện của Toyota đ&atilde; tăng th&ecirc;m 11 nh&agrave; cung cấp l&ecirc;n con số 57 (trong đ&oacute;, số lượng nh&agrave; cung cấp thuần Việt tăng từ 6 l&ecirc;n 12) v&agrave; tổng số linh kiện nội địa h&oacute;a đạt 740 sản phẩm c&aacute;c loại (tăng 16 sản phẩm).</p>\r\n\r\n<p>Với mong muốn n&acirc;ng tầm trải nghiệm kh&aacute;ch h&agrave;ng trong từng điểm chạm cảm x&uacute;c, Toyota đang v&agrave; sẽ cung cấp cho kh&aacute;ch h&agrave;ng những g&oacute;i giải ph&aacute;p dịch vụ v&agrave; chuỗi gi&aacute; trị gia tăng tổng thể, to&agrave;n diện trong suốt qu&aacute; tr&igrave;nh sử dụng xe như Phụ kiện ch&iacute;nh h&atilde;ng Toyota, Bảo hiểm Toyota, g&oacute;i hỗ trợ T&agrave;i ch&iacute;nh Toyota (TFS), kinh doanh xe đ&atilde; qua sử dụng (Toyota Sure) &hellip; qua đ&oacute; hỗ trợ qu&aacute; tr&igrave;nh di chuyển, sở hữu xe của kh&aacute;ch h&agrave;ng, mang đến sự an t&acirc;m khi sử dụng sản phẩm v&agrave; dịch vụ của Toyota. Tại gian h&agrave;ng Toyota, kh&aacute;ch h&agrave;ng c&oacute; thể t&igrave;m hiểu, kh&aacute;m ph&aacute; những giải ph&aacute;p tổng thể n&agrave;y tại Khu vực xanh d&agrave;nh cho Kh&aacute;ch h&agrave;ng.</p>', 1, 0, 2, 1, 0, 0, 0, 'TƯ VẤN - ĐÁNH GIÁ XE', 'TƯ VẤN - ĐÁNH GIÁ XE', 'TƯ VẤN - ĐÁNH GIÁ XE', '2022-12-19 16:53:26', '2022-12-19 16:55:05');
INSERT INTO `articles` VALUES (10, 'Lịch sử của Hyundai', 'lich-su-cua-hyundai', 23, 'Lịch sử của Hyundai', '2022-12-25__z3987910706891-08f7a809582b54b12c34d6d56de13d7f.jpg', '<h1>Lịch sử của Hyundai v&agrave; d&ograve;ng xe tải huyền Thoại.</h1>\r\n\r\n<p>Tập đo&agrave;n &ocirc; t&ocirc; Hyundai hay c&ograve;n c&oacute; t&ecirc;n tr&ecirc;n trường quốc tế l&agrave; Hyundai Motor Company, đ&acirc;y l&agrave; h&atilde;ng xe &ocirc; t&ocirc; c&oacute; doanh số b&aacute;n h&agrave;ng cao thứ 5 tr&ecirc;n thế giới v&agrave; h&atilde;ng xe lớn nhất H&agrave;n Quốc v&agrave; c&oacute; trụ sở đặt tại Seoul, H&agrave;n Quốc.&nbsp;<a href=\"https://xetaihyundai.vn/\">Hyundai</a>&nbsp;được th&agrave;nh lập v&agrave;o năm 1967 bởi &ocirc;ng Chung Ju-Yung sau đ&oacute; c&ocirc;ng ty nhanh ch&oacute;ng được x&acirc;y dựng với sự hợp t&aacute;c c&ugrave;ng một trong những nh&agrave; sản xuất &ocirc; t&ocirc; l&acirc;u đời nhất trong ng&agrave;nh c&ocirc;ng nghiệp &ocirc; t&ocirc; ch&iacute;nh l&agrave; Ford, v&agrave;o năm 1968 hai b&ecirc;n đ&atilde; k&yacute; hợp đồng li&ecirc;n doanh trong hai năm để chia sẻ c&ocirc;ng nghệ lắp r&aacute;p v&agrave; cho ra đời mẫu xe đầu ti&ecirc;n mang t&ecirc;n Cortina.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt12.jpg\" title=\"\" /></p>\r\n\r\n<p><br />\r\nNăm 1975, với sự hỗ trợ về mặt c&ocirc;ng nghệ của c&ocirc;ng ty Mitsubishi đến từ Nhật Bản kết hợp với sự thiết kế của Giorgio Giugiaro theo phong c&aacute;ch &Yacute;, Hyundai đ&atilde; tự thiết kế v&agrave; chế tạo th&agrave;nh c&ocirc;ng tại H&agrave;n Quốc c&oacute; t&ecirc;n l&agrave; Pony v&agrave; năm sau đ&oacute; Pony được xuất khẩu ra thị trường nước ngo&agrave;i.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt13.jpg\" title=\"\" /></p>\r\n\r\n<p><br />\r\nHyundai th&acirc;m nhập v&agrave;o thị trường Mỹ v&agrave;o năm 1986 bằng việc tung ra d&ograve;ng xe Excel hạng nhỏ v&agrave; kết quả kh&ocirc;ng ngờ l&agrave; d&ograve;ng xe n&agrave;y đ&atilde; đưa doanh số của Hyundai l&ecirc;n đến 100,000 chiếc được ti&ecirc;u thụ tại Mỹ trong bảy th&aacute;ng đầu ti&ecirc;n kể từ ng&agrave;y ra mắt kh&ocirc;ng những vậy, Excel được xếp v&agrave;o top &quot;10 xe được ưa chuộng nhất&rdquo; do tạp ch&iacute; Fortune b&igrave;nh chọn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt14.jpg\" title=\"\" /></p>\r\n\r\n<p>Mẫu Excel m&agrave; Hyundai đ&atilde; đưa ra thị trường Mĩ năm 1986</p>\r\n\r\n<p><br />\r\nNăm 1985, Hyundai bắt đầu sản xuất c&aacute;c loại xe sử dụng c&ocirc;ng nghệ ch&iacute;nh h&atilde;ng v&agrave; d&ograve;ng xe hạng trung mang t&ecirc;n Sonata l&agrave; th&agrave;nh quả đầu ti&ecirc;n của sự nỗ lực n&agrave;y.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt15.jpg\" title=\"\" /><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt16.jpg\" title=\"\" /><br />\r\nSonata ng&agrave;y ấy 1985 Sonata b&acirc;y giờ 2015<br />\r\n<br />\r\nNăm 1991, Hyundai đ&atilde; mở đường độc quyền c&ocirc;ng nghệ cho m&igrave;nh khi ph&aacute;t triển th&agrave;nh c&ocirc;ng động cơ xăng, I4 Alpha v&agrave; c&oacute; hộp truyền động.<br />\r\n<br />\r\nNăm 1996, Hyundai Motors India Limited được th&agrave;nh lập, đặt xưởng sản xuất tại Irrungattukatoi gần Chennai, Ấn Độ.<br />\r\n<br />\r\nNăm 1998 Huyndai đ&atilde; mua lại nh&atilde;n hiệu &ocirc; t&ocirc; Kia, nhờ đ&oacute; m&agrave; h&atilde;ng xe n&agrave;y đ&atilde; chiếm được thị phần lớn, trong khi số lượng sản phẩm của Hyudai &iacute;t hơn so với c&aacute;c nh&agrave; sản xuất &ocirc; t&ocirc; kh&aacute;c, từ đ&oacute; Hyundai được biết đến nhờ sản xuất những loại xe c&oacute; gi&aacute; trị cao nhưng gi&aacute; cả hợp l&yacute;.<br />\r\n<br />\r\nMột năm sau, 1999, Chung Ju Yung quyết định trao quyền l&atilde;nh đạo Hyndai Motor cho con trai m&igrave;nh l&agrave; Chung Mong Koo. Hyndai Motor Group, c&ocirc;ng ty mẹ của Hyundai đ&atilde; đầu tư rất nhiều v&agrave;o việc ph&aacute;t triển chất lượng, mẫu m&atilde;, tăng cường sản xuất v&agrave; nghi&ecirc;n cứu d&agrave;i hạn cho ng&agrave;nh &ocirc;t&ocirc; n&oacute;i ri&ecirc;ng. Tập đo&agrave;n đ&atilde; tăng thời gian bảo h&agrave;nh l&ecirc;n tới 10 năm hay 160.000 km đối với xe b&aacute;n tại Mỹ, đồng thời ph&aacute;t động chiến dịch marketing quy m&ocirc; lớn.<br />\r\n<br />\r\nTừ năm 2002 Hyndai cũng l&agrave; một trong những nh&agrave; t&agrave;i trợ ch&iacute;nh thức cho giải World Cup của FIFA.<br />\r\n<br />\r\nTrong cuộc khảo s&aacute;t về chất lượng xe hơi của tổ chức J.D. Power and Associates năm 2004, Hyundai đ&atilde; vượt qua nhiều đối thủ tiếng tăm v&agrave; giữ vị tr&iacute; thứ 2 v&agrave; hiện nay Hyndai nằm trong top 100 thương hiệu &ocirc;t&ocirc; lớn nhất thế giới.<br />\r\n<br />\r\nNăm 2006 &ocirc;ng Chung Mong Koo bị văn ph&ograve;ng c&ocirc;ng tố tối cao Seoul khởi tố v&igrave; tội tham &ocirc; 100 tỉ Won (106 triệu đ&ocirc; la Mĩ) từ Hyundai để lập quỹ đen. &Ocirc;ng bị bắt v&agrave;o ng&agrave;y 28 th&aacute;ng<br />\r\n<br />\r\n4 năm 2006 v&agrave; bị kết tội tham &ocirc; v&agrave; c&oacute; h&agrave;nh vi tham nhũng kh&aacute;c v&agrave; bị kết &aacute;n 3 năm t&ugrave; v&agrave;o ng&agrave;y 5 th&aacute;ng 2 năm 2007. V&agrave; sau vụ việc đ&oacute;, &ocirc;ng Kim Dong-jin được bổ nhiệm giữ chức Chủ tịch ki&ecirc;m Gi&aacute;m đốc điều h&agrave;nh c&ocirc;ng ty.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt17.jpg\" title=\"\" /></p>\r\n\r\n<p>&Ocirc;ng Chung Mong Koo l&atilde;nh đạo một thời của Hyundai</p>\r\n\r\n<p><br />\r\nSau scandal của &ocirc;ng Chung Mong Koo, Hyundai vẫn kh&ocirc;ng bị ch&ugrave;ng bước v&agrave; vẫn hoạt động để ph&aacute;t triển c&ocirc;ng ty kh&ocirc;ng ngừng v&agrave; theo khảo s&aacute;t của Interbrand and BusinessWeek, Hyundai đứng thứ 72 trong danh s&aacute;ch C&aacute;c thương hiệu tốt nhất thế giới năm 2007 với trị gi&aacute; thương hiệu ước t&iacute;nh l&agrave; 4,5 tỉ USD, Sự xuất hiện của d&ograve;ng SUV cỡ trung mang t&ecirc;n Santa Fe năm 2007 đ&atilde; đem đến cho Hyundai th&agrave;nh c&ocirc;ng vang dội v&agrave; gi&agrave;nh giải thưởng &quot;2007 Top Safety Pick&rdquo; của<br />\r\n<br />\r\nIIHS.<br />\r\n<br />\r\nTại triển l&atilde;m &ocirc;t&ocirc; quốc tế Bắc Mỹ 2008, Hyundai đ&atilde; tr&igrave;nh l&agrave;ng model Hyundai Genesis Coupe chủ động cầu sau v&agrave; được b&aacute;n tại c&aacute;c đai l&yacute; tr&ecirc;n H&agrave;n Quốc, cho đến khoảng 1 năm sau th&igrave; xe đ&atilde; c&oacute; mặt tại c&aacute;i đại l&yacute; Hyundai tr&ecirc;n đất nước Cờ Hoa.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt18.jpg\" title=\"\" /></p>\r\n\r\n<p>Genesis Coupe mẫu xe thể thao hai cửa của Huyndai</p>\r\n\r\n<p><br />\r\nNăm 2009 Hyundai ra mắt sản phẩm mang t&ecirc;n Avante tại Việt Nam để cạnh tranh c&aacute;c ph&acirc;n kh&uacute;c ngang tầm của h&atilde;ng kh&aacute;c m&agrave; khi ấy Toyota Vios được xem l&agrave; đối thủ cạnh tranh lớn nhất tại thị trường nước ta nhưng kết quả kh&ocirc;ng ngờ khi xe Avante đến tay người d&ugrave;ng v&agrave; nhận được sự đ&aacute;nh gi&aacute; cao c&oacute; thể so s&aacute;nh với mẫu Corolla Altis của h&atilde;ng Toyota.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xetaihyundai.vn/Editor/assets/dt19.jpg\" title=\"\" /></p>\r\n\r\n<p>Avante 2009 l&agrave; đối thủ cạnh tranh với những h&atilde;ng xe kh&aacute;c</p>\r\n\r\n<p><br />\r\nĐến năm 2011, Hyundai được biết đến l&agrave; nh&agrave; sản xuất &ocirc; t&ocirc; lớn nhất H&agrave;n Quốc, đứng thứ hai tại Ch&acirc;u &Aacute; (sau Toyota) v&agrave; đứng thứ tư tr&ecirc;n thế giới (sau GM, Volkswagen v&agrave; Toyota).<br />\r\n<br />\r\nNăm 2014 với thiết kế theo xu hướng to&agrave;n cầu l&uacute;c bấy giờ l&agrave; d&ograve;ng xe cỡ nhỏ, Hyudai dựa tr&ecirc;n đ&oacute; đ&atilde; giới thiệu th&ecirc;m mẫu i20 tại thị trường Ch&acirc;u &Aacute;, thể hiện h&atilde;ng xe n&agrave;y lu&ocirc;n nắm bắt được xu thế thị trường to&agrave;n cầu.<br />\r\n<br />\r\nT&iacute;nh đến thời điểm hiện tại, Hyudai trong nước đ&atilde; c&oacute; gần h&agrave;ng chục d&ograve;ng xe &ocirc; t&ocirc; du lịch như: I10, I20, Accent, Avante, Tucson, Santa Fe, Sonata, Genesis,&hellip; v&agrave; những d&ograve;ng xe tải như: H100, HD65, HD72, HD78, HD120,... Đi c&ugrave;ng đ&oacute; l&agrave; những phi&ecirc;n bản v&agrave; option kh&aacute;c nhau để kh&aacute;c h&agrave;ng c&oacute; nhiều lựa chọn hơn, mang đến cho h&atilde;ng Hyundai c&oacute; nhiều cơ hội để cạnh tranh với c&aacute;c &quot;&ocirc;ng lớn&rdquo; trong c&ocirc;ng nghiệp &ocirc; t&ocirc; kh&aacute;c.<br />\r\n<br />\r\nKhu vực kinh doanh của Hyundai cũng rộng khắp thế giới như:<br />\r\n<br />\r\nBắc Mĩ: Hoa K&igrave;, Canada, Mexico, Panama v&agrave; Cộng h&ograve;a Dominica.<br />\r\n<br />\r\nNam Mĩ: Brazil.<br />\r\n<br />\r\nCh&acirc;u &Aacute;: Trung Hoa, Ấn Độ, Nhật, Philippine.<br />\r\n<br />\r\nCh&acirc;u &Acirc;u: Đức, Cộng H&ograve;a Czech, Nga, Thổ Nhĩ Kỳ.<br />\r\n<br />\r\nCh&acirc;u Phi: Nam Phi, Ai Cập, Libya.<br />\r\n<br />\r\nCh&acirc;u Đại Dương: &Uacute;c, New Zealand.<br />\r\n<br />\r\nNhững chiếc xe mang thương hiệu Hyundai được b&aacute;n tại 193 quốc gia th&ocirc;ng qua 5.000 đại l&yacute; v&agrave; showroom. Theo nghi&ecirc;n cứu của Automotive News về doanh số to&agrave;n cầu của c&aacute;c h&atilde;ng th&igrave; Hyundai xếp thứ 5, vượt qua cả Nissan, Honda v&agrave; nhiều thương hiệu nổi tiếng kh&aacute;c với 3.715.096 xe trong năm 2005. Sức mạnh thương hiệu của Hyundai ng&agrave;y c&agrave;ng lớn nhưng để được người ti&ecirc;u d&ugrave;ng ưa chuộng, Hyundai đ&atilde; phải nỗ lực kh&ocirc;ng ngừng trong việc nghi&ecirc;n cứu cải tiến chất lượng sản phẩm v&agrave; th&agrave;nh c&ocirc;ng đạt được l&agrave; kết quả tất yếu của sự nỗ lực n&agrave;y.</p>', 1, 0, 2, 1, 0, 0, 0, 'Lịch sử của Hyundai', 'Lịch sử của Hyundai', 'Lịch sử của Hyundai', '2022-12-24 11:21:25', '2022-12-25 20:24:16');
COMMIT;

-- ----------------------------
-- Table structure for attribute_values
-- ----------------------------
DROP TABLE IF EXISTS `attribute_values`;
CREATE TABLE `attribute_values` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `av_name` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `av_slug` char(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `av_attribute_id` int DEFAULT '0',
  `av_price` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of attribute_values
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `atr_name` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atr_type` tinyint DEFAULT '1',
  `atr_menu_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of attributes
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for commens
-- ----------------------------
DROP TABLE IF EXISTS `commens`;
CREATE TABLE `commens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cm_content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cm_user_id` int DEFAULT NULL,
  `cm_admin_id` int DEFAULT NULL,
  `cm_parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of commens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `com_user_id` int NOT NULL,
  `com_user_type` tinyint NOT NULL DEFAULT '0',
  `com_source_id` int NOT NULL,
  `com_type` tinyint NOT NULL DEFAULT '0',
  `com_parent_id` int NOT NULL DEFAULT '0',
  `com_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `comments_com_user_id_index` (`com_user_id`) USING BTREE,
  KEY `comments_com_source_id_index` (`com_source_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of comments
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES (62, 23, 0, 123, 1, 0, 'Ô tô đẹp', '2022-12-25 12:35:22', '2022-12-25 12:35:30');
INSERT INTO `comments` VALUES (63, 23, 0, 118, 1, 0, 'Ô tô đẹp , nhân viên tư vấn nhiệt tình', '2022-12-25 12:47:16', '2022-12-25 12:47:27');
INSERT INTO `comments` VALUES (64, 23, 0, 123, 1, 0, 'Nhân viên thân thiện', '2022-12-25 14:38:23', '2022-12-25 14:38:35');
INSERT INTO `comments` VALUES (65, 23, 0, 122, 1, 0, 'Nhân viên tư vấn nhiệt tình', '2022-12-25 15:41:12', '2022-12-25 15:41:38');
INSERT INTO `comments` VALUES (66, 23, 0, 119, 1, 0, 'Nhân viên tư vấn nhiệt tình', '2022-12-26 08:57:39', '2022-12-26 08:57:50');
INSERT INTO `comments` VALUES (67, 23, 0, 119, 0, 0, 'Ô tô k đẹp', '2022-12-26 08:58:33', '2022-12-26 08:58:33');
COMMIT;

-- ----------------------------
-- Table structure for guests
-- ----------------------------
DROP TABLE IF EXISTS `guests`;
CREATE TABLE `guests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `g_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_phone` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `guests_g_email_unique` (`g_email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of guests
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for image_products
-- ----------------------------
DROP TABLE IF EXISTS `image_products`;
CREATE TABLE `image_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_product_id` int NOT NULL,
  `ip_image_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `image_products_ip_product_id_ip_image_id_unique` (`ip_product_id`,`ip_image_id`) USING BTREE,
  KEY `image_products_ip_product_id_index` (`ip_product_id`) USING BTREE,
  KEY `image_products_ip_image_id_index` (`ip_image_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of image_products
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `im_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `im_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `im_type` tinyint DEFAULT '0',
  `im_active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `images_im_slug_index` (`im_slug`) USING BTREE,
  KEY `images_im_type_index` (`im_type`) USING BTREE,
  KEY `images_im_active_index` (`im_active`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of images
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for informations
-- ----------------------------
DROP TABLE IF EXISTS `informations`;
CREATE TABLE `informations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `if_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_phone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_fax` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email_drive` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'smtp',
  `if_email_host` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'smtp.gmail.com',
  `if_email_port` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '587',
  `if_email_encryption` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'tls',
  `if_time_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_seo` tinyint DEFAULT '0',
  `if_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_google` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_youtobe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_target` int NOT NULL,
  `if_email_send` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_google_map` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `informations_if_seo_index` (`if_seo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of informations
-- ----------------------------
BEGIN;
INSERT INTO `informations` VALUES (1, 'Việt Phú Luxury', '0327292046', '0327292046', 'Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội', 'thuanddph13844@fpt.edu.vn', 'smtp', 'smtp.gmail.com', '587', 'tls', '0-24', 0, '2022-12-12__310446850-682789546527023-461738096662946535-n-1.png', NULL, NULL, NULL, 120000000, 'thuanddph13844@fpt.edu.vn', '09072002', NULL, 'Website bán xe ô tô', NULL, NULL, NULL, '2022-12-12 10:50:04');
COMMIT;

-- ----------------------------
-- Table structure for keyword_librarys
-- ----------------------------
DROP TABLE IF EXISTS `keyword_librarys`;
CREATE TABLE `keyword_librarys` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kwl_name` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kwl_slug` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kwl_hit` int DEFAULT '0',
  `kwl_admin_id` int DEFAULT '0',
  `kwl_count_word` tinyint DEFAULT '0',
  `kwl_active` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `keyword_librarys_kwl_slug_unique` (`kwl_slug`) USING BTREE,
  KEY `keyword_librarys_kwl_hit_index` (`kwl_hit`) USING BTREE,
  KEY `keyword_librarys_kwl_active_index` (`kwl_active`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of keyword_librarys
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for keyword_temps
-- ----------------------------
DROP TABLE IF EXISTS `keyword_temps`;
CREATE TABLE `keyword_temps` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kt_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kt_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kt_active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `keyword_temps_kt_slug_unique` (`kt_slug`) USING BTREE,
  KEY `keyword_temps_kt_active_index` (`kt_active`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of keyword_temps
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for keywords
-- ----------------------------
DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `k_name` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_name_slug` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_hit` int DEFAULT '0',
  `k_active` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `keywords_k_name_slug_unique` (`k_name_slug`) USING BTREE,
  KEY `keywords_k_active_index` (`k_active`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of keywords
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `m_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_id` tinyint DEFAULT '0',
  `m_type` tinyint DEFAULT '0',
  `m_active` tinyint DEFAULT '1',
  `m_hot` tinyint DEFAULT '0',
  `m_sort` tinyint DEFAULT '0',
  `m_type_count` tinyint DEFAULT '0',
  `m_type_seo` tinyint DEFAULT '1',
  `m_avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_title_seo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_keyword_seo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_description_seo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `menus_m_parent_id_index` (`m_parent_id`) USING BTREE,
  KEY `menus_m_type_index` (`m_type`) USING BTREE,
  KEY `menus_m_active_index` (`m_active`) USING BTREE,
  KEY `menus_m_type_seo_index` (`m_type_seo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of menus
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES (2, 'Hyundai Elantra', 'hyundai-elantra', 3, 2, 1, 1, NULL, 0, 0, NULL, NULL, 'Hyundai Elantra', 'Hyundai Elantra', 'Hyundai Elantra', '<p>Hyundai Elantra</p>', NULL, '2021-12-13 23:43:51');
INSERT INTO `menus` VALUES (6, 'Xe hundai', 'xe-hundai', 1, 2, 1, 0, 1, 0, 1, '2021-12-05__20210122144140-b378-wm.jpg', NULL, 'Xe hundai', 'Xe hundai', 'Xe hundai', '<p>Xe hundai</p>', NULL, NULL);
INSERT INTO `menus` VALUES (17, 'Ô TÔ', 'o-to', 0, 2, 1, 0, 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `menus` VALUES (18, 'FORD', 'ford', 17, 2, 1, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-19 13:43:50');
INSERT INTO `menus` VALUES (19, 'TOYOTA', 'toyota', 17, 2, 1, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `menus` VALUES (20, 'HYUNDAI', 'hyundai', 17, 2, 1, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `menus` VALUES (21, 'VINFAST', 'vinfast', 17, 2, 1, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `menus` VALUES (23, 'Tin tức', 'tin-tuc', 0, 1, 1, 0, 3, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-19 16:54:44');
INSERT INTO `menus` VALUES (24, 'Liên Hệ', 'lien-he', 0, 5, 1, 0, 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 22:30:59');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_09_11_202016_create_admins_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_09_13_171852_create_menus_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_09_16_013655_create_articles_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_09_16_014311_create_keywords_table', 1);
INSERT INTO `migrations` VALUES (7, '2018_09_16_014537_create_article_keywords_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_09_21_050809_create_keyword_temps_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_09_21_163200_entrust_setup_tables', 1);
INSERT INTO `migrations` VALUES (10, '2018_09_22_063710_create_keyword_librarys_table', 1);
INSERT INTO `migrations` VALUES (11, '2018_09_23_120817_create_images_table', 1);
INSERT INTO `migrations` VALUES (12, '2018_09_24_233909_create_products_table', 1);
INSERT INTO `migrations` VALUES (13, '2018_09_27_115033_create_cache_table', 1);
INSERT INTO `migrations` VALUES (14, '2018_09_27_152401_create_image_products_table', 1);
INSERT INTO `migrations` VALUES (15, '2018_09_28_154858_create_informations_table', 1);
INSERT INTO `migrations` VALUES (16, '2018_09_29_162032_create_slides_table', 1);
INSERT INTO `migrations` VALUES (17, '2018_09_30_231403_create_guests_table', 1);
INSERT INTO `migrations` VALUES (18, '2018_10_01_212941_create_orders_table', 1);
INSERT INTO `migrations` VALUES (19, '2018_10_07_223034_create_attributes_table', 1);
INSERT INTO `migrations` VALUES (20, '2018_10_07_223337_create_attribute_values_table', 1);
INSERT INTO `migrations` VALUES (21, '2018_10_08_002330_create_product_value_table', 1);
INSERT INTO `migrations` VALUES (22, '2018_10_09_232232_create_commens_table', 1);
INSERT INTO `migrations` VALUES (23, '2018_10_13_000845_create_comments_table', 1);
INSERT INTO `migrations` VALUES (24, '2018_10_14_075933_create_account_social_table', 1);
INSERT INTO `migrations` VALUES (25, '2018_10_18_165441_create_store_table', 1);
INSERT INTO `migrations` VALUES (26, '2018_10_25_203614_create_product_images_table', 1);
INSERT INTO `migrations` VALUES (27, '2022_11_17_125500_create_notifications_table', 2);
COMMIT;

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `o_guest_id` int DEFAULT NULL,
  `o_product_id` int NOT NULL DEFAULT '0',
  `o_submit` tinyint DEFAULT '0',
  `o_status` tinyint DEFAULT '0',
  `o_messages` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_viewing_day` date DEFAULT NULL,
  `o_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_menu_id` int DEFAULT NULL,
  `admin_id` int NOT NULL,
  `unified_price` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_appointment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `o_deposit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rose_money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_money` int NOT NULL DEFAULT '0',
  `export_car_customer` int NOT NULL DEFAULT '0',
  `o_pick_up_schedule` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `orders_o_guest_id_index` (`o_guest_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of orders
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES (64, 22, 126, 0, 5, NULL, '2022-12-24', '127.0.0.1', NULL, 0, NULL, '', '2022-12-24 10:53:40', '2022-12-25 12:30:39', NULL, NULL, 1, 1, NULL);
INSERT INTO `orders` VALUES (65, 23, 118, 0, 2, NULL, '2022-12-25', '127.0.0.1', NULL, 53, NULL, '', '2022-12-25 12:49:12', '2022-12-25 13:21:06', '80000000', NULL, 0, 0, NULL);
INSERT INTO `orders` VALUES (66, 23, 121, 0, 5, NULL, '2022-12-25', '127.0.0.1', NULL, 53, '800000000', '', '2022-12-25 12:50:40', '2022-12-25 21:24:25', NULL, '24000000', 1, 1, NULL);
INSERT INTO `orders` VALUES (67, 23, 123, 0, 5, NULL, '2022-12-26', '127.0.0.1', NULL, 53, '3800000000', '', '2022-12-25 14:39:18', '2022-12-25 14:44:17', '380000000', '76000000', 1, 1, '2022-12-26');
INSERT INTO `orders` VALUES (68, 23, 122, 0, 5, NULL, '2022-12-25', '127.0.0.1', NULL, 53, '600000000', '', '2022-12-25 15:42:14', '2022-12-25 15:46:43', '120000000', '12000000', 1, 1, '2022-12-26');
INSERT INTO `orders` VALUES (70, 23, 119, 0, 5, NULL, '2022-12-27', '127.0.0.1', NULL, 53, '600000000', '', '2022-12-26 08:59:59', '2022-12-26 09:03:35', '150000000', '12000000', 1, 1, '2022-12-27');
INSERT INTO `orders` VALUES (71, 23, 128, 0, 6, NULL, '2022-12-27', '127.0.0.1', NULL, 53, NULL, 'đổi xe khác', '2022-12-26 09:06:46', '2022-12-26 09:12:00', '375000000', NULL, 0, 0, '2022-12-27');
INSERT INTO `orders` VALUES (72, 23, 128, 0, 0, NULL, '2022-12-27', '127.0.0.1', NULL, 49, NULL, '', '2022-12-26 09:23:45', '2022-12-26 09:24:01', NULL, NULL, 0, 0, NULL);
INSERT INTO `orders` VALUES (73, 23, 123, 0, 0, 'dang co tien', '2022-12-27', '127.0.0.1', NULL, 0, NULL, '', '2022-12-26 09:33:06', '2022-12-26 09:33:06', NULL, NULL, 0, 0, NULL);
INSERT INTO `orders` VALUES (74, 23, 123, 0, 0, NULL, '2022-12-28', '127.0.0.1', NULL, 0, NULL, '', '2022-12-26 09:34:26', '2022-12-26 09:34:26', NULL, NULL, 0, 0, NULL);
INSERT INTO `orders` VALUES (75, 23, 123, 0, 5, NULL, '2022-12-28', '127.0.0.1', NULL, 53, '3800000000', '', '2022-12-26 09:36:32', '2022-12-26 09:38:56', NULL, '76000000', 0, 0, NULL);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  KEY `permission_role_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
BEGIN;
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (29, 1);
INSERT INTO `permission_role` VALUES (30, 1);
INSERT INTO `permission_role` VALUES (31, 1);
INSERT INTO `permission_role` VALUES (32, 1);
INSERT INTO `permission_role` VALUES (33, 1);
INSERT INTO `permission_role` VALUES (34, 1);
INSERT INTO `permission_role` VALUES (35, 1);
INSERT INTO `permission_role` VALUES (36, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (2, 2);
INSERT INTO `permission_role` VALUES (3, 2);
INSERT INTO `permission_role` VALUES (4, 2);
INSERT INTO `permission_role` VALUES (5, 2);
INSERT INTO `permission_role` VALUES (6, 2);
INSERT INTO `permission_role` VALUES (7, 2);
INSERT INTO `permission_role` VALUES (8, 2);
INSERT INTO `permission_role` VALUES (9, 2);
INSERT INTO `permission_role` VALUES (10, 2);
INSERT INTO `permission_role` VALUES (11, 2);
INSERT INTO `permission_role` VALUES (12, 2);
INSERT INTO `permission_role` VALUES (13, 2);
INSERT INTO `permission_role` VALUES (14, 2);
INSERT INTO `permission_role` VALUES (15, 2);
INSERT INTO `permission_role` VALUES (16, 2);
INSERT INTO `permission_role` VALUES (17, 2);
INSERT INTO `permission_role` VALUES (18, 2);
INSERT INTO `permission_role` VALUES (19, 2);
INSERT INTO `permission_role` VALUES (20, 2);
INSERT INTO `permission_role` VALUES (21, 2);
INSERT INTO `permission_role` VALUES (22, 2);
INSERT INTO `permission_role` VALUES (23, 2);
INSERT INTO `permission_role` VALUES (24, 2);
INSERT INTO `permission_role` VALUES (25, 2);
INSERT INTO `permission_role` VALUES (26, 2);
INSERT INTO `permission_role` VALUES (27, 2);
INSERT INTO `permission_role` VALUES (28, 2);
INSERT INTO `permission_role` VALUES (29, 2);
INSERT INTO `permission_role` VALUES (30, 2);
INSERT INTO `permission_role` VALUES (31, 2);
INSERT INTO `permission_role` VALUES (32, 2);
INSERT INTO `permission_role` VALUES (33, 2);
INSERT INTO `permission_role` VALUES (34, 2);
INSERT INTO `permission_role` VALUES (35, 2);
INSERT INTO `permission_role` VALUES (36, 2);
INSERT INTO `permission_role` VALUES (21, 3);
INSERT INTO `permission_role` VALUES (37, 3);
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_permission` tinyint DEFAULT '0',
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `permissions_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES (1, 'quan-tri-website', 0, 'Quản trị website', 'Quản lý toàn bộ website không bị hạn chế bất cứ quyền gì', '2022-11-12 07:08:01', '2022-11-12 07:08:01');
INSERT INTO `permissions` VALUES (2, 'truy-cap-website', 1, 'Truy cập website', 'Chỉ có quyền truy cập vào trang giới thiệu', '2022-11-12 07:08:29', '2022-11-12 07:14:47');
INSERT INTO `permissions` VALUES (3, 'quan-ly-menu', 5, 'Quản lý menu', 'Quản lý menu', '2022-11-12 07:09:16', '2022-11-12 07:09:16');
INSERT INTO `permissions` VALUES (4, 'them-moi-menu', 5, 'Thêm mới menu', 'Thêm mới menu', '2022-11-12 07:09:26', '2022-11-12 07:09:26');
INSERT INTO `permissions` VALUES (5, 'chinh-sua-menu', 5, 'Chỉnh sửa menu', 'Chỉnh sửa menu', '2022-11-12 07:09:36', '2022-11-12 07:09:36');
INSERT INTO `permissions` VALUES (6, 'xoa-menu', 5, 'Xóa menu', 'Xóa menu', '2022-11-12 07:09:48', '2022-11-12 07:09:48');
INSERT INTO `permissions` VALUES (7, 'quan-ly-san-pham', 7, 'Quản lý sản phẩm', 'Quản lý sản phẩm', '2022-11-12 07:15:26', '2022-11-12 07:15:26');
INSERT INTO `permissions` VALUES (8, 'them-moi-san-pham', 7, 'Thêm mới sản phẩm', 'Thêm mới sản phẩm', '2022-11-12 07:15:38', '2022-11-12 07:15:38');
INSERT INTO `permissions` VALUES (9, 'chinh-sua-san-pham', 7, 'Chỉnh sửa sản phẩm', 'Chỉnh sửa sản phẩm', '2022-11-12 07:15:51', '2022-11-12 07:15:51');
INSERT INTO `permissions` VALUES (10, 'xoa-san-pham', 7, 'Xóa sản phẩm', 'Xóa sản phẩm', '2022-11-12 07:16:03', '2022-11-12 07:16:03');
INSERT INTO `permissions` VALUES (11, 'quan-ly-bai-viet', 8, 'Quản lý bài viết', 'Quản lý bài viết', '2022-11-12 07:21:29', '2022-11-12 07:21:29');
INSERT INTO `permissions` VALUES (12, 'them-moi-bai-viet', 8, 'Thêm mới bài viết', 'Thêm mới bài viết', '2022-11-12 07:21:39', '2022-11-12 07:21:39');
INSERT INTO `permissions` VALUES (13, 'chinh-sua-bai-viet', 8, 'Chỉnh sửa bài viết', 'Chỉnh sửa bài viết', '2022-11-12 07:21:49', '2022-11-12 07:21:49');
INSERT INTO `permissions` VALUES (14, 'xoa-bai-viet', 8, 'Xóa bài viết', 'Xóa bài viết', '2022-11-12 07:21:59', '2022-11-12 07:21:59');
INSERT INTO `permissions` VALUES (15, 'danh-sach-khach-hang', 2, 'Danh sách khách hàng', 'Danh sách khách hàng', '2022-11-12 07:22:59', '2022-11-12 07:22:59');
INSERT INTO `permissions` VALUES (16, 'them-moi-khach-hang', 2, 'Thêm mới khách hàng', 'Thêm mới khách hàng', '2022-11-12 07:23:32', '2022-11-12 07:23:32');
INSERT INTO `permissions` VALUES (17, 'chinh-sua-khach-hang', 2, 'Chỉnh sửa khách hàng', 'Chỉnh sửa khách hàng', '2022-11-12 07:23:44', '2022-11-12 07:23:44');
INSERT INTO `permissions` VALUES (18, 'xoa-khach-hang', 2, 'Xóa khách hàng', 'Xóa khách hàng', '2022-11-12 07:23:54', '2022-11-12 07:23:54');
INSERT INTO `permissions` VALUES (19, 'quan-ly-binh-luan', 2, 'Quản lý bình luận', 'Quản lý bình luận', '2022-11-12 07:24:51', '2022-11-12 07:24:51');
INSERT INTO `permissions` VALUES (20, 'xoa-binh-luan', 2, 'Xóa bình luận', 'Xóa bình luận', '2022-11-12 07:25:09', '2022-11-12 07:25:09');
INSERT INTO `permissions` VALUES (21, 'danh-sach-lich-xem-xe', 2, 'Danh sách lịch xem xe', 'Danh sách lịch xem xe', '2022-11-12 07:25:24', '2022-11-12 07:25:24');
INSERT INTO `permissions` VALUES (22, 'xoa-lich-xem-xe', 2, 'Xóa lịch xem xe', 'Xóa lịch xem xe', '2022-11-12 07:25:43', '2022-11-12 07:25:43');
INSERT INTO `permissions` VALUES (23, 'quan-ly-hinh-anh', 9, 'Quản lý hình ảnh', 'Quản lý hình ảnh', '2022-11-12 07:29:30', '2022-11-12 07:29:30');
INSERT INTO `permissions` VALUES (24, 'quan-ly-thong-tin-website', 10, 'Quản lý thông tin website', 'Quản lý thông tin website', '2022-11-12 07:30:00', '2022-11-12 07:30:00');
INSERT INTO `permissions` VALUES (25, 'quan-ly-slide', 10, 'Quản lý slide', 'Quản lý slide', '2022-11-12 07:30:53', '2022-11-12 07:30:53');
INSERT INTO `permissions` VALUES (26, 'them-moi-slide', 10, 'Thêm mới slide', 'Thêm mới slide', '2022-11-12 07:31:08', '2022-11-12 07:31:08');
INSERT INTO `permissions` VALUES (27, 'chinh-sua-slide', 10, 'Chỉnh sửa slide', 'Chỉnh sửa slide', '2022-11-12 07:31:23', '2022-11-12 07:31:23');
INSERT INTO `permissions` VALUES (28, 'xoa-slide', 10, 'Xóa slide', 'Xóa slide', '2022-11-12 07:31:41', '2022-11-12 07:31:41');
INSERT INTO `permissions` VALUES (29, 'quan-ly-vai-tro', 3, 'Quản lý vai trò', 'Quản lý vai trò', '2022-11-12 07:41:09', '2022-11-12 07:41:09');
INSERT INTO `permissions` VALUES (30, 'them-moi-vai-tro', 3, 'Thêm mới vai trò', 'Thêm mới vai trò', '2022-11-12 07:41:21', '2022-11-12 07:41:21');
INSERT INTO `permissions` VALUES (31, 'chinh-sua-vai-tro', 3, 'Chỉnh sửa vai trò', 'Chỉnh sửa vai trò', '2022-11-12 07:41:34', '2022-11-12 07:41:34');
INSERT INTO `permissions` VALUES (32, 'xoa-vai-tro', 3, 'Xóa vai trò', 'Xóa vai trò', '2022-11-12 07:41:45', '2022-11-12 07:41:45');
INSERT INTO `permissions` VALUES (33, 'quan-ly-admin', 4, 'Quản lý admin', 'Quản lý admin', '2022-11-12 07:42:33', '2022-11-12 07:44:38');
INSERT INTO `permissions` VALUES (34, 'them-moi-admin', 4, 'Thêm mới admin', 'Thêm mới admin', '2022-11-12 07:44:00', '2022-11-12 07:44:00');
INSERT INTO `permissions` VALUES (35, 'chinh-sua-admin', 4, 'Chỉnh sửa admin', 'Chỉnh sửa admin', '2022-11-12 07:44:12', '2022-11-12 07:44:12');
INSERT INTO `permissions` VALUES (36, 'xoa-admin', 4, 'Xóa admin', 'Xóa admin', '2022-11-12 07:44:23', '2022-11-12 07:44:23');
INSERT INTO `permissions` VALUES (37, 'thong-ke-cua-toi', 1, 'Thống kê của tôi', 'Thống kê của tôi', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `pi_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_slug` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_product_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `product_images_pi_product_id_index` (`pi_product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_images
-- ----------------------------
BEGIN;
INSERT INTO `product_images` VALUES (1, '2021-11-24__sp-1.png', '2021-11-24-sp-1png', 1, '2021-11-24 12:51:37', '2021-11-24 12:51:37');
INSERT INTO `product_images` VALUES (2, '2021-12-05__20210122144140-a7bd-wm.jpg', '2021-12-05-20210122144140-a7bd-wmjpg', 2, '2021-12-05 15:54:47', '2021-12-05 15:54:47');
INSERT INTO `product_images` VALUES (3, '2021-12-05__20210122144140-b378-wm.jpg', '2021-12-05-20210122144140-b378-wmjpg', 2, '2021-12-05 15:54:47', '2021-12-05 15:54:47');
INSERT INTO `product_images` VALUES (4, '2021-12-05__20210122144139-8f78-wm.jpg', '2021-12-05-20210122144139-8f78-wmjpg', 2, '2021-12-05 15:54:47', '2021-12-05 15:54:47');
INSERT INTO `product_images` VALUES (5, '2021-12-05__20211126154725-475b-wm.jpg', '2021-12-05-20211126154725-475b-wmjpg', 3, '2021-12-05 16:00:11', '2021-12-05 16:00:11');
INSERT INTO `product_images` VALUES (6, '2021-12-05__20211126154725-d351-wm.jpg', '2021-12-05-20211126154725-d351-wmjpg', 3, '2021-12-05 16:00:11', '2021-12-05 16:00:11');
INSERT INTO `product_images` VALUES (7, '2021-12-05__20211126154725-3373-wm.jpg', '2021-12-05-20211126154725-3373-wmjpg', 3, '2021-12-05 16:00:11', '2021-12-05 16:00:11');
INSERT INTO `product_images` VALUES (8, '2021-12-05__20211126154725-6456-wm.jpg', '2021-12-05-20211126154725-6456-wmjpg', 3, '2021-12-05 16:00:11', '2021-12-05 16:00:11');
INSERT INTO `product_images` VALUES (9, '2022-11-14__2032f1d6cce1db6c5520ffa64bed47f8.jpg', '2022-11-14-2032f1d6cce1db6c5520ffa64bed47f8jpg', 55, '2022-11-14 23:04:57', '2022-11-14 23:04:57');
INSERT INTO `product_images` VALUES (10, '2022-11-15__anh-nen-minions-2k-341845.jpg', '2022-11-15-anh-nen-minions-2k-341845jpg', 56, '2022-11-15 09:48:14', '2022-11-15 09:48:14');
INSERT INTO `product_images` VALUES (11, '2022-11-21__2164741-2166006j32127.jpg', '2022-11-21-2164741-2166006j32127jpg', 69, '2022-11-21 15:56:27', '2022-11-21 15:56:27');
INSERT INTO `product_images` VALUES (12, '2022-11-21__2164742-2166007j32127.jpg', '2022-11-21-2164742-2166007j32127jpg', 69, '2022-11-21 15:56:27', '2022-11-21 15:56:27');
INSERT INTO `product_images` VALUES (13, '2022-11-21__2164745-2166010j32127.jpg', '2022-11-21-2164745-2166010j32127jpg', 69, '2022-11-21 15:56:27', '2022-11-21 15:56:27');
INSERT INTO `product_images` VALUES (14, '2022-11-21__2164746-2166011j32127.jpg', '2022-11-21-2164746-2166011j32127jpg', 69, '2022-11-21 15:56:27', '2022-11-21 15:56:27');
INSERT INTO `product_images` VALUES (15, '2022-11-21__2164747-2166012j32127.jpg', '2022-11-21-2164747-2166012j32127jpg', 69, '2022-11-21 15:56:27', '2022-11-21 15:56:27');
INSERT INTO `product_images` VALUES (16, '2022-11-26__2164741-2166006j32127.jpg', '2022-11-26-2164741-2166006j32127jpg', 87, '2022-11-26 18:09:12', '2022-11-26 18:09:12');
INSERT INTO `product_images` VALUES (17, '2022-11-26__2164742-2166007j32127.jpg', '2022-11-26-2164742-2166007j32127jpg', 87, '2022-11-26 18:09:12', '2022-11-26 18:09:12');
INSERT INTO `product_images` VALUES (18, '2022-11-26__2164745-2166010j32127.jpg', '2022-11-26-2164745-2166010j32127jpg', 87, '2022-11-26 18:09:12', '2022-11-26 18:09:12');
INSERT INTO `product_images` VALUES (19, '2022-11-26__2164746-2166011j32127.jpg', '2022-11-26-2164746-2166011j32127jpg', 87, '2022-11-26 18:09:12', '2022-11-26 18:09:12');
INSERT INTO `product_images` VALUES (20, '2022-11-26__2164747-2166012j32127.jpg', '2022-11-26-2164747-2166012j32127jpg', 87, '2022-11-26 18:09:12', '2022-11-26 18:09:12');
INSERT INTO `product_images` VALUES (21, '2022-12-12__1.jpg', '2022-12-12-1jpg', 113, '2022-12-12 10:53:51', '2022-12-12 10:53:51');
INSERT INTO `product_images` VALUES (22, '2022-12-18__screenshot-2022-12-18-104252.png', '2022-12-18-screenshot-2022-12-18-104252png', 117, '2022-12-18 10:43:09', '2022-12-18 10:43:09');
INSERT INTO `product_images` VALUES (23, '2022-12-18__screenshot-2022-12-18-104220.png', '2022-12-18-screenshot-2022-12-18-104220png', 117, '2022-12-18 10:43:09', '2022-12-18 10:43:09');
INSERT INTO `product_images` VALUES (24, '2022-12-19__6.jpg', '2022-12-19-6jpg', 118, '2022-12-19 14:15:14', '2022-12-19 14:15:14');
INSERT INTO `product_images` VALUES (25, '2022-12-19__5.jpg', '2022-12-19-5jpg', 118, '2022-12-19 14:15:14', '2022-12-19 14:15:14');
INSERT INTO `product_images` VALUES (26, '2022-12-19__4.jpg', '2022-12-19-4jpg', 118, '2022-12-19 14:15:14', '2022-12-19 14:15:14');
INSERT INTO `product_images` VALUES (29, '2022-12-19__1.jpg', '2022-12-19-1jpg', 118, '2022-12-19 14:15:14', '2022-12-19 14:15:14');
INSERT INTO `product_images` VALUES (34, '2022-12-19__21.jpg', '2022-12-19-21jpg', 119, '2022-12-19 14:24:32', '2022-12-19 14:24:32');
INSERT INTO `product_images` VALUES (35, '2022-12-19__36.png', '2022-12-19-36png', 120, '2022-12-19 14:34:10', '2022-12-19 14:34:10');
INSERT INTO `product_images` VALUES (36, '2022-12-19__35.png', '2022-12-19-35png', 120, '2022-12-19 14:34:10', '2022-12-19 14:34:10');
INSERT INTO `product_images` VALUES (37, '2022-12-19__34.png', '2022-12-19-34png', 120, '2022-12-19 14:34:10', '2022-12-19 14:34:10');
INSERT INTO `product_images` VALUES (38, '2022-12-19__33.png', '2022-12-19-33png', 120, '2022-12-19 14:34:10', '2022-12-19 14:34:10');
INSERT INTO `product_images` VALUES (39, '2022-12-19__32.png', '2022-12-19-32png', 120, '2022-12-19 14:34:10', '2022-12-19 14:34:10');
INSERT INTO `product_images` VALUES (40, '2022-12-19__31.jpg', '2022-12-19-31jpg', 120, '2022-12-19 14:34:10', '2022-12-19 14:34:10');
INSERT INTO `product_images` VALUES (41, '2022-12-19__14.png', '2022-12-19-14png', 121, '2022-12-19 14:43:19', '2022-12-19 14:43:19');
INSERT INTO `product_images` VALUES (42, '2022-12-19__13.png', '2022-12-19-13png', 121, '2022-12-19 14:43:19', '2022-12-19 14:43:19');
INSERT INTO `product_images` VALUES (43, '2022-12-19__12.png', '2022-12-19-12png', 121, '2022-12-19 14:43:19', '2022-12-19 14:43:19');
INSERT INTO `product_images` VALUES (44, '2022-12-19__11.png', '2022-12-19-11png', 121, '2022-12-19 14:43:19', '2022-12-19 14:43:19');
INSERT INTO `product_images` VALUES (45, '2022-12-19__1.jpg', '2022-12-19-1jpg', 121, '2022-12-19 14:43:19', '2022-12-19 14:43:19');
INSERT INTO `product_images` VALUES (46, '2022-12-19__24.png', '2022-12-19-24png', 122, '2022-12-19 14:47:58', '2022-12-19 14:47:58');
INSERT INTO `product_images` VALUES (47, '2022-12-19__23.png', '2022-12-19-23png', 122, '2022-12-19 14:47:58', '2022-12-19 14:47:58');
INSERT INTO `product_images` VALUES (48, '2022-12-19__22.png', '2022-12-19-22png', 122, '2022-12-19 14:47:58', '2022-12-19 14:47:58');
INSERT INTO `product_images` VALUES (49, '2022-12-19__21.png', '2022-12-19-21png', 122, '2022-12-19 14:47:58', '2022-12-19 14:47:58');
INSERT INTO `product_images` VALUES (50, '2022-12-19__2.jpg', '2022-12-19-2jpg', 122, '2022-12-19 14:47:58', '2022-12-19 14:47:58');
INSERT INTO `product_images` VALUES (51, '2022-12-19__34.png', '2022-12-19-34png', 123, '2022-12-19 14:54:30', '2022-12-19 14:54:30');
INSERT INTO `product_images` VALUES (52, '2022-12-19__33.png', '2022-12-19-33png', 123, '2022-12-19 14:54:30', '2022-12-19 14:54:30');
INSERT INTO `product_images` VALUES (53, '2022-12-19__32.png', '2022-12-19-32png', 123, '2022-12-19 14:54:30', '2022-12-19 14:54:30');
INSERT INTO `product_images` VALUES (54, '2022-12-19__31.png', '2022-12-19-31png', 123, '2022-12-19 14:54:30', '2022-12-19 14:54:30');
INSERT INTO `product_images` VALUES (55, '2022-12-19__3.jpg', '2022-12-19-3jpg', 123, '2022-12-19 14:54:30', '2022-12-19 14:54:30');
INSERT INTO `product_images` VALUES (56, '2022-12-19__73.png', '2022-12-19-73png', 119, '2022-12-19 15:02:16', '2022-12-19 15:02:16');
INSERT INTO `product_images` VALUES (57, '2022-12-19__72.png', '2022-12-19-72png', 119, '2022-12-19 15:02:16', '2022-12-19 15:02:16');
INSERT INTO `product_images` VALUES (58, '2022-12-19__71.png', '2022-12-19-71png', 119, '2022-12-19 15:02:16', '2022-12-19 15:02:16');
INSERT INTO `product_images` VALUES (59, '2022-12-19__7.jpg', '2022-12-19-7jpg', 119, '2022-12-19 15:02:16', '2022-12-19 15:02:16');
INSERT INTO `product_images` VALUES (60, '2022-12-19__15.png', '2022-12-19-15png', 124, '2022-12-19 15:12:11', '2022-12-19 15:12:11');
INSERT INTO `product_images` VALUES (61, '2022-12-19__14.png', '2022-12-19-14png', 124, '2022-12-19 15:12:11', '2022-12-19 15:12:11');
INSERT INTO `product_images` VALUES (62, '2022-12-19__13.png', '2022-12-19-13png', 124, '2022-12-19 15:12:11', '2022-12-19 15:12:11');
INSERT INTO `product_images` VALUES (63, '2022-12-19__12.png', '2022-12-19-12png', 124, '2022-12-19 15:12:11', '2022-12-19 15:12:11');
INSERT INTO `product_images` VALUES (64, '2022-12-19__11.png', '2022-12-19-11png', 124, '2022-12-19 15:12:11', '2022-12-19 15:12:11');
INSERT INTO `product_images` VALUES (65, '2022-12-19__1.jpg', '2022-12-19-1jpg', 124, '2022-12-19 15:12:11', '2022-12-19 15:12:11');
INSERT INTO `product_images` VALUES (66, '2022-12-19__44.png', '2022-12-19-44png', 126, '2022-12-19 15:26:59', '2022-12-19 15:26:59');
INSERT INTO `product_images` VALUES (67, '2022-12-19__43.png', '2022-12-19-43png', 126, '2022-12-19 15:26:59', '2022-12-19 15:26:59');
INSERT INTO `product_images` VALUES (68, '2022-12-19__42.png', '2022-12-19-42png', 126, '2022-12-19 15:26:59', '2022-12-19 15:26:59');
INSERT INTO `product_images` VALUES (69, '2022-12-19__41.png', '2022-12-19-41png', 126, '2022-12-19 15:26:59', '2022-12-19 15:26:59');
INSERT INTO `product_images` VALUES (70, '2022-12-19__4.jpg', '2022-12-19-4jpg', 126, '2022-12-19 15:26:59', '2022-12-19 15:26:59');
INSERT INTO `product_images` VALUES (71, '2022-12-19__16.png', '2022-12-19-16png', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
INSERT INTO `product_images` VALUES (72, '2022-12-19__15.png', '2022-12-19-15png', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
INSERT INTO `product_images` VALUES (73, '2022-12-19__14.png', '2022-12-19-14png', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
INSERT INTO `product_images` VALUES (74, '2022-12-19__13.png', '2022-12-19-13png', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
INSERT INTO `product_images` VALUES (75, '2022-12-19__12.png', '2022-12-19-12png', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
INSERT INTO `product_images` VALUES (76, '2022-12-19__11.png', '2022-12-19-11png', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
INSERT INTO `product_images` VALUES (77, '2022-12-19__1.jpg', '2022-12-19-1jpg', 127, '2022-12-19 15:46:43', '2022-12-19 15:46:43');
COMMIT;

-- ----------------------------
-- Table structure for product_value
-- ----------------------------
DROP TABLE IF EXISTS `product_value`;
CREATE TABLE `product_value` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `pv_product_id` int NOT NULL DEFAULT '0',
  `pv_value_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `product_value_pv_product_id_pv_value_id_unique` (`pv_product_id`,`pv_value_id`) USING BTREE,
  KEY `product_value_pv_product_id_index` (`pv_product_id`) USING BTREE,
  KEY `product_value_pv_value_id_index` (`pv_value_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_value
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for product_values
-- ----------------------------
DROP TABLE IF EXISTS `product_values`;
CREATE TABLE `product_values` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `designs` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_color` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_capacity` float DEFAULT NULL,
  `origin` tinyint DEFAULT '0',
  `fuel` tinyint DEFAULT '0',
  `year_of_manufacturing` int DEFAULT NULL,
  `gear` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_seats` int DEFAULT NULL,
  `went` int DEFAULT NULL,
  `drive` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_color` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `door_number` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of product_values
-- ----------------------------
BEGIN;
INSERT INTO `product_values` VALUES (1, 'aaaa', 'bbbb', 1, 1, 1, 2022, '1', 1, 1, '1', '1', 1, 56, NULL, '2022-11-17 00:45:25');
INSERT INTO `product_values` VALUES (2, 'aaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, NULL, NULL);
INSERT INTO `product_values` VALUES (3, '111aaaaaaa', '1', 1, 1, 1, 2022, '1', 1, 1, '1', '1', 5, 58, NULL, '2022-11-17 09:43:26');
INSERT INTO `product_values` VALUES (4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, NULL, NULL);
INSERT INTO `product_values` VALUES (5, '11111', '1111', 111, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 61, NULL, NULL);
INSERT INTO `product_values` VALUES (6, '1111', '1111', 111, 127, 127, 111, '111', 11, 111, '111', '111', 111, 66, NULL, NULL);
INSERT INTO `product_values` VALUES (7, '1111', '111', 11, 1, 1, 2022, '1', 1, 1, '1', '1', 1, 74, NULL, '2022-11-25 09:40:01');
INSERT INTO `product_values` VALUES (8, 'Den xan', 'Trang', 1, 4, 2, 2022, '1KAX', 1, 10000, 'MAXIMY', 'Đen', 6, 68, NULL, '2022-11-16 00:39:37');
INSERT INTO `product_values` VALUES (9, 'aa', 'aa', 11, 2, 1, 2022, '1', 1, 2, '1', '2dwadsd', 1, 69, NULL, '2022-11-21 15:56:43');
INSERT INTO `product_values` VALUES (10, 'aaa', 'aaaaaaaa', 1, 1, 1, 2022, '1KAX', 1, 111, 'ă', 'ă', 1, 58, NULL, NULL);
INSERT INTO `product_values` VALUES (11, 'aaaaaaaaa', 'aaaaaa', 1, 1, 1, 2022, '1', 1, 111, 'aaaaa', 'aaaaaaa', 1, 63, NULL, NULL);
INSERT INTO `product_values` VALUES (12, '111', '111', 11, 2, 2, 2004, '1', 2, 1, '1', '1', 1, 69, NULL, NULL);
INSERT INTO `product_values` VALUES (13, 'Kia', 'Kia', 1.2, 2, 1, 2022, 'Kia', 2, 111, 'Kia', 'Kia', 1, 76, NULL, '2022-11-25 10:02:09');
INSERT INTO `product_values` VALUES (14, 'Seden', 'Xanh', 5, 4, 2, 2022, 'Auto', 4, 2147483647, 'AWD', 'Zanh', 2, 87, NULL, '2022-11-26 18:09:27');
INSERT INTO `product_values` VALUES (15, 'sedan', 'Xanh', 1, 2, 1, 2022, '1', 5, 100000, '111', 'xanh', 1, 97, NULL, '2022-11-30 14:52:56');
INSERT INTO `product_values` VALUES (16, 'Seden11', 'Xanh11', 111, 1, 1, 2022, '11', 11, 11, 'AWD11', 'Zanh11', 1, 107, NULL, '2022-12-06 16:58:30');
INSERT INTO `product_values` VALUES (17, 'Seden', 'Xanh', 12, 1, 1, 2022, 'Auto', 1, 1, '1', 'Zanh', 1, 108, NULL, NULL);
INSERT INTO `product_values` VALUES (18, 'Seden', 'Xanh', 11, 1, 2, 2022, '100000000', 1, 1, 'AWD', 'Zanh', 5, 109, NULL, NULL);
INSERT INTO `product_values` VALUES (19, 'Seden', 'Xanh', 4, 1, 1, 2022, '100000000', 5, 1, '01000000000', 'Zanh', 1, 111, NULL, NULL);
INSERT INTO `product_values` VALUES (20, 'Seden', 'Xanh', 11, 1, 1, 2022, 'Auto', 1, 1, '10', 'Zanh', 1, 112, NULL, NULL);
INSERT INTO `product_values` VALUES (21, 'Sedan', 'Kem', 18, 3, 1, 2022, 'Số tay', 5, 14000, 'FWD - Dẫn động cầu trước', 'Xanh', 4, 113, NULL, '2022-12-12 10:54:10');
INSERT INTO `product_values` VALUES (22, 'Sedan', 'Đen', 1.5, 3, 1, 2022, 'Số tự động', 7, 1000, 'FWD - Dẫn động cầu trước', 'Đen', 5, 114, NULL, NULL);
INSERT INTO `product_values` VALUES (23, 'SUV / Cross over', 'Xanh', 3.5, 4, 1, 2022, 'Hộp số tự động', 4, 1111, 'FWD - Dẫn động cầu trước', 'update', 2, 115, NULL, '2022-12-18 10:44:11');
INSERT INTO `product_values` VALUES (24, '222', 'ádasd', 22, 1, 2, 2022, 'đâs', 2, 22, 'adasdasdas', '0001', 5, 116, NULL, NULL);
INSERT INTO `product_values` VALUES (25, 'Sedan', 'Đen', 0.1, 4, 1, 2022, 'Số tự động', 7, 6000, 'FWD - Dẫn động cầu trước', 'Đỏ', 5, 117, NULL, NULL);
INSERT INTO `product_values` VALUES (26, 'SUV/Crossover', 'Nhiều màu', 2.2, 4, 1, 2022, 'Số tự động', 5, 103000, 'FWD - Dẫn động cầu trước', 'Cát', 4, 118, NULL, NULL);
INSERT INTO `product_values` VALUES (27, 'SUV', 'Kem', 2.5, 3, 2, 2022, 'Số tay', 7, 67000, 'RFD - Dẫn động cầu sau', 'Hồng', 5, 119, NULL, '2022-12-19 14:35:13');
INSERT INTO `product_values` VALUES (28, 'Truck', 'Nhiều màu', 3.2, 4, 2, 2022, 'Số tự động', 5, 95000, '4WD - Dẫn động 4 bánh', 'Đỏ', 5, 120, NULL, '2022-12-19 14:34:40');
INSERT INTO `product_values` VALUES (29, 'SUV', 'ĐEN', 2.7, 3, 1, 2022, 'Số tự động', 7, 62000, '4WD - DẪN ĐỘNG 4 BÁNH', 'Trắng', 4, 121, NULL, NULL);
INSERT INTO `product_values` VALUES (30, 'Sedan', 'Kem', 1.8, 3, 1, 2022, 'Số tự động', 5, 86000, 'FWD - Dẫn động cầu trước', 'Đen', 5, 122, NULL, '2022-12-19 14:52:10');
INSERT INTO `product_values` VALUES (31, 'SUV', 'NÂU', 4.6, 4, 1, 2022, 'Số tự động', 8, 175000, 'AWD - 4 bánh toàn thời gian', 'Đen', 5, 123, NULL, '2022-12-19 14:52:33');
INSERT INTO `product_values` VALUES (32, 'SUV', 'Ghi', 2, 4, 1, 2022, 'Số tự động', 5, 133000, 'FWD - Dẫn động cầu trước', 'Bạc', 5, 124, NULL, '2022-12-19 15:29:50');
INSERT INTO `product_values` VALUES (33, 'Crossover', 'ĐEN', 2, 4, 1, 2022, 'Số tự động', 7, 135322, 'FWD - Dẫn động cầu trước', 'Bạc', 5, 125, NULL, '2022-12-19 15:30:12');
INSERT INTO `product_values` VALUES (34, 'Sedan', 'Nhiều màu', 1.6, 3, 1, 2022, 'Số tay', 5, 150000, 'FWD - Dẫn động cầu trước', 'Trắng', 5, 126, NULL, '2022-12-19 15:33:30');
INSERT INTO `product_values` VALUES (35, 'Hatchback', 'ĐEN', 1.4, 3, 1, 2022, 'Số tự động', 5, 37000, 'FWD - Dẫn động cầu trước', 'Đỏ', 5, 127, NULL, '2022-12-19 15:51:16');
INSERT INTO `product_values` VALUES (36, 'SUV', 'ĐEN', 2, 3, 1, 2022, 'Số tự động', 7, 35000, 'FWD - Dẫn động cầu trước', 'Đỏ', 5, 128, NULL, '2022-12-19 15:51:52');
INSERT INTO `product_values` VALUES (37, 'wer', 'wrwer', 4, 1, 1, 2022, 'sfsdfds', 5, 31, 'wrew', 'wrwer', 4, 129, NULL, NULL);
INSERT INTO `product_values` VALUES (38, 'wrwer', 'werwe', 4, 1, 1, 2022, 'sfs', 4, 42, 'fds', 'fsd', 3, 133, NULL, NULL);
INSERT INTO `product_values` VALUES (39, 'gdg', 'dfgdfg', 3, 1, 1, 2022, 'dgdfg', 5, 55, 'gdfgd', 'gdf', 4, 134, NULL, NULL);
INSERT INTO `product_values` VALUES (40, 'sdfsd', 'sdfdsf', 3, 1, 1, 2022, 'sdsfsd', 5, 100000, 'fsdfdsf', 'dsfsdf', 3, 135, NULL, '2022-12-25 15:02:29');
INSERT INTO `product_values` VALUES (41, 'sdfdsf', 'sdfds', 3, 1, 1, 2022, 'sdfds', 4, 324324, 'fdsfs', 'sdfsd', 3, 136, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price` bigint DEFAULT '0',
  `pro_menu_id` int DEFAULT '0',
  `pro_type` tinyint DEFAULT '0',
  `pro_active` tinyint DEFAULT '0',
  `pro_position` tinyint DEFAULT '0',
  `pro_description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pro_specifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pro_title_seo` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_keyword_seo` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description_seo` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_view` int DEFAULT '0',
  `pro_admin_id` int DEFAULT '0',
  `pro_point_rating` int DEFAULT '0',
  `pro_import` tinyint DEFAULT '0',
  `pro_total_ratings` int DEFAULT '0',
  `pro_price_import` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price_repair` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rose` int DEFAULT NULL,
  `maximum_deposit` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numbers_of_cars_left` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `products_pro_name_unique` (`pro_name`) USING BTREE,
  KEY `products_pro_menu_id_index` (`pro_menu_id`) USING BTREE,
  KEY `products_pro_type_index` (`pro_type`) USING BTREE,
  KEY `products_pro_active_index` (`pro_active`) USING BTREE,
  KEY `products_pro_admin_id_index` (`pro_admin_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (118, 'Ford Ranger XLS 2.2AT - 2017 Xe cũ Nhập khẩu', 'ford-ranger-xls-22at---2017-xe-cu-nhap-khau', 800000000, 18, 1, 1, 0, 'Siêu Thị ô tô Ánh Lý bán xe Ford Ranger XLS 2.2AT, sản xuất năm 2017, máy dầu, nhập khẩu, biển tỉnh hồ sơ rút nhanh gọn. Xe màu vàng cát cực đẹp, trang bị: Cabin kép, lazăng đúc, đèn gầm, bệ bước,... Nội thất ghế da cao cấp, ga tự động Cruise Control, đầu đài giả trí CD/DVD nguyên bản theo xe, điều', '<p>Si&ecirc;u Thị &ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Ford Ranger XLS 2.2AT, sản xuất năm 2017, m&aacute;y dầu, nhập khẩu, biển tỉnh hồ sơ r&uacute;t nhanh gọn. Xe m&agrave;u v&agrave;ng c&aacute;t cực đẹp, trang bị: Cabin k&eacute;p, lazăng đ&uacute;c, đ&egrave;n gầm, bệ bước,... Nội thất ghế da cao cấp, ga tự động Cruise Control, đầu đ&agrave;i giả tr&iacute; CD/DVD nguy&ecirc;n bản theo xe, điều h&ograve;a hai chiều m&aacute;t s&acirc;u, v&ocirc; lăng t&iacute;ch hợp đa chức năng, gương k&iacute;nh chỉnh điện cụp điện, tẩu sạc, kết nối USB/Bluetooth, trải s&agrave;n da,... Cam kết xe kh&ocirc;ng tai nạn, kh&ocirc;ng ngập nước, m&aacute;y nguy&ecirc;n bản của nh&agrave; sản xuất. Hỗ trợ ng&acirc;n h&agrave;ng 70% gi&aacute; trị xe l&atilde;i xuất ưu đ&atilde;i, thủ tục nhanh gọn</p>', '<h2>Th&ocirc;ng số cơ bản</h2>\r\n\r\n<ul>\r\n	<li>D&agrave;i x Rộng x Cao:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(mm)</li>\r\n	<li>Chiều d&agrave;i cơ sở:&nbsp; &nbsp; 0&nbsp; &nbsp; &nbsp; (mm)</li>\r\n	<li>Chiều rộng cơ sở trước/sau:&nbsp; &nbsp; &nbsp;(mm)</li>\r\n	<li>Trọng lượng kh&ocirc;ng tải:&nbsp; &nbsp; 0&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(kg)</li>\r\n	<li>Dung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp; 0&nbsp; &nbsp; &nbsp; &nbsp; (l&iacute;t)</li>\r\n</ul>\r\n\r\n<h2>Động cơ</h2>\r\n\r\n<ul>\r\n	<li>Động cơ:</li>\r\n	<li>Kiểu động cơ:</li>\r\n	<li>Dung t&iacute;ch xi lanh:&nbsp; &nbsp; 0 (cc)</li>\r\n</ul>\r\n\r\n<h2>Phanh - Giảm x&oacute;c - Lốp</h2>\r\n\r\n<ul>\r\n	<li>Phanh:</li>\r\n	<li>Giảm s&oacute;c:</li>\r\n	<li>Lốp xe:</li>\r\n	<li>V&agrave;nh m&acirc;m xe:</li>\r\n</ul>\r\n\r\n<h2>Th&ocirc;ng số kỹ thuật kh&aacute;c</h2>', 'Ford Ranger', 'Ford Ranger', 'Ford Ranger', '2022-12-19__1.jpg', 44, 1, 0, 1, 0, '575000000', '5000000', 1, 10, '2022-12-20 14:15:14', '2022-12-26 08:57:56', 2);
INSERT INTO `products` VALUES (119, 'Ford Everest 2.5MT - 2013 Xe cũ Trong nước', 'ford-everest-25mt---2013-xe-cu-trong-nuoc', 600000000, 18, 1, 1, 0, 'Gia đình cần bán Ford Everest 2013 số sàn máy dầu, màu hồng phấn, odo 67.000 Km, gia đình đi cẩn thận còn mới, dô nhiều phụ kiện, ghế da, màn hình android, camera de, loa sub, dán kính, vô lăng bọc da, gầm bệ máy móc nguyên bản, côn số êm, máy khỏe đi rất bốc, ít hao dầu, xe chính chủ bán trực tiếp,', '<p>Gia đ&igrave;nh cần b&aacute;n Ford Everest 2013 số s&agrave;n m&aacute;y dầu, m&agrave;u hồng phấn, odo 67.000 Km, gia đ&igrave;nh đi cẩn thận c&ograve;n mới, d&ocirc; nhiều phụ kiện, ghế da, m&agrave;n h&igrave;nh android, camera de, loa sub, d&aacute;n k&iacute;nh, v&ocirc; lăng bọc da, gầm bệ m&aacute;y m&oacute;c nguy&ecirc;n bản, c&ocirc;n số &ecirc;m, m&aacute;y khỏe đi rất bốc, &iacute;t hao dầu, xe ch&iacute;nh chủ b&aacute;n trực tiếp,</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Ford Everest', 'Ford Everest', 'Ford Everest', '2022-12-19__7.jpg', 7, 1, 0, 1, 0, '498000000', '1000000', 2, 25, '2022-12-19 14:24:32', '2022-12-26 09:03:13', 1);
INSERT INTO `products` VALUES (120, 'Ford Ranger 3.2AT - 2016 Xe cũ Nhập khẩu', 'ford-ranger-32at---2016-xe-cu-nhap-khau', 900000000, 18, 1, 1, 0, 'Siêu Thị Ô tô Ánh Lý bán xe Ford Ranger Wildtrak 3.2AT sản xuất 2016 nhập khẩu, máy dầu, hai cầu, biển tỉnh hồ sơ rút nhanh gọn. - Ngoại thất lazzang đúc, đèn gầm, cảnh báo rẽ tích hợp trên gương, bệ bước,… - Nội thất ghế da pha nỉ cao cấp, màn hình DVD kết hợp camera lùi, Ga tự động Cruise Control,', '<p>Si&ecirc;u Thị &Ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Ford Ranger Wildtrak 3.2AT sản xuất 2016 nhập khẩu, m&aacute;y dầu, hai cầu, biển tỉnh hồ sơ r&uacute;t nhanh gọn. - Ngoại thất lazzang đ&uacute;c, đ&egrave;n gầm, cảnh b&aacute;o rẽ t&iacute;ch hợp tr&ecirc;n gương, bệ bước,&hellip; - Nội thất ghế da pha nỉ cao cấp, m&agrave;n h&igrave;nh DVD kết hợp camera l&ugrave;i, Ga tự động Cruise Control, &acirc;m thanh AM/FM, kết nối Bluetooth/MP3, điều h&ograve;a m&aacute;t s&acirc;u, v&ocirc; lăng t&iacute;ch hợp n&uacute;t bấm bọc da, Ghế điện, gương k&iacute;nh chỉnh điện cụp điện,&hellip; - M&aacute;y nổ &ecirc;m gầm bệ chắc chắn, kiểu d&aacute;ng thể thao,... v&agrave; nhiều tiện nghi kh&aacute;c. - Cam kết xe:Kh&ocirc;ng đ&acirc;m đụng, kh&ocirc;ng ngập nước, m&aacute;y nguy&ecirc;n bản nh&agrave; sản xuất Hỗ trợ bank l&ecirc;n đến 70%, thủ tục nhanh gọn. Vui l&ograve;ng li&ecirc;n hệ để biết th&ecirc;m chi tiết !</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Ford Ranger', 'Ford Ranger', 'Ford Ranger', '2022-12-19__31.jpg', 3, 1, 0, 1, 0, '725000000', '2000000', 3, 15, '2022-12-19 14:34:10', '2022-12-24 10:50:29', 2);
INSERT INTO `products` VALUES (121, 'Toyota Fortuner 2.7AT - 2015 Xe cũ Trong nước', 'toyota-fortuner-27at---2015-xe-cu-trong-nuoc', 800000000, 19, 1, 1, 0, 'Siêu thị ô tô Ánh Lý bán xe Toyota Fortuner 2.7 AT sản xuất 2015, hai cầu, máy xăng, biển tỉnh hồ sơ rút nhanh gọn. -Xe trang bị full option: Lazăng đúc, đèn gầm, cảnh báo rẽ,bệ bước,... Nội thất da cao cấp, màn hình hiện thị Android kết hợp camera lùi, túi khí an toàn, ghế điện, vô lăng tích hợp nú', '<p>Si&ecirc;u thị &ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Toyota Fortuner 2.7 AT sản xuất 2015, hai cầu, m&aacute;y xăng, biển tỉnh hồ sơ r&uacute;t nhanh gọn. -Xe trang bị full option: Lazăng đ&uacute;c, đ&egrave;n gầm, cảnh b&aacute;o rẽ,bệ bước,... Nội thất da cao cấp, m&agrave;n h&igrave;nh hiện thị Android kết hợp camera l&ugrave;i, t&uacute;i kh&iacute; an to&agrave;n, ghế điện, v&ocirc; lăng t&iacute;ch hợp n&uacute;t bấm, điều h&ograve;a hai chiều, phanh ABS an to&agrave;n, tẩu sạc, jack cắm USB, gương k&iacute;nh chỉnh điện+ cụp điện Auto,... Cam kết xe kh&ocirc;ng đ&acirc;m đụng, ngập nước, m&aacute;y nguy&ecirc;n bản nh&agrave; sản xuất Hỗ trợ bank l&ecirc;n đến 50% gi&aacute; trị xe. ​L&atilde;i xuất ưu đ&atilde;i thủ tục nhanh gọn Vui l&ograve;ng li&ecirc;n hệ để biết th&ecirc;m th&ocirc;ng tin chi tiết!</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Toyota Fortuner', 'Toyota Fortuner', 'Toyota Fortuner', '2022-12-19__1.jpg', 26, 1, 0, 1, 0, '635000000', '3000000', 3, 30, '2022-12-19 14:43:19', '2022-12-26 09:42:19', 2);
INSERT INTO `products` VALUES (122, 'Toyota Corolla Altis 1.8AT - 2013 Xe cũ Trong nước', 'toyota-corolla-altis-18at---2013-xe-cu-trong-nuoc', 600000000, 19, 1, 1, 0, 'Siêu thị Ô tô Ánh Lý bán xe Toyota Corolla Altis 1.8AT sản xuất năm 2013, biển tỉnh hồ sơ rút cầm tay. Xe được thiết kế hiện đại, không gian rộng thoáng, vận hành êm ái, đẳng cấp thương hiệu. Trang bị lazang đúc, đèn gầm, cảnh báo rẽ tích hợp trên gương, … Nội thất ghế da cao cấp, ghế lái chỉnh điện', '<p>Si&ecirc;u thị &Ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Toyota Corolla Altis 1.8AT sản xuất năm 2013, biển tỉnh hồ sơ r&uacute;t cầm tay. Xe được thiết kế hiện đại, kh&ocirc;ng gian rộng tho&aacute;ng, vận h&agrave;nh &ecirc;m &aacute;i, đẳng cấp thương hiệu. Trang bị lazang đ&uacute;c, đ&egrave;n gầm, cảnh b&aacute;o rẽ t&iacute;ch hợp tr&ecirc;n gương, &hellip; Nội thất ghế da cao cấp, ghế l&aacute;i chỉnh điện, điều h&ograve;a auto, v&ocirc; lăng t&iacute;ch hợp n&uacute;t bấm, đầu DVD/CD, &acirc;m thanh AM/FM, gương k&iacute;nh chỉnh điện, cụp điện, cảm biến l&ugrave;i,&hellip; Hệ thống phanh ABS, t&uacute;i kh&iacute; an to&agrave;n. Cam kết xe kh&ocirc;ng tai nạn, kh&ocirc;ng ngập nước, m&aacute;y nguy&ecirc;n bản của nh&agrave; sản xuất. Hỗ trợ bank 50% gi&aacute; trị xe l&atilde;i xuất ưu đ&atilde;i</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Toyota Corolla Altis', 'Toyota Corolla Altis', 'Toyota Corolla Altis', '2022-12-19__2.jpg', 8, 1, 0, 1, 0, '465000000', '2000000', 2, 20, '2022-12-19 14:47:58', '2022-12-26 09:42:16', 1);
INSERT INTO `products` VALUES (123, 'Toyota Land Cruiser VX - 2016 Xe cũ Nhập khẩu', 'toyota-land-cruiser-vx---2016-xe-cu-nhap-khau', 3800000000, 19, 1, 1, 0, 'Siêu Thị ô tô Ánh Lý chính chủ bán xe Toyota Land Cruiser VX 4.6 V8 sản xuất năm 2016,xe nhập khẩu nguyên chiếc,đẳng cấp vượt trội. Xe trang bị ngoại thất nổi bật với mặt ca lăng hình lục giác gồm 3 thanh mạ crôm cỡ lớn,liên kết với dàn đèn pha dạng LED gương cầu ở hai bên,động cơ xăng mạnh mẽ V8. N', '<p>Si&ecirc;u Thị &ocirc; t&ocirc; &Aacute;nh L&yacute; ch&iacute;nh chủ b&aacute;n xe Toyota Land Cruiser VX 4.6 V8 sản xuất năm 2016,xe nhập khẩu nguy&ecirc;n chiếc,đẳng cấp vượt trội. Xe trang bị ngoại thất nổi bật với mặt ca lăng h&igrave;nh lục gi&aacute;c gồm 3 thanh mạ cr&ocirc;m cỡ lớn,li&ecirc;n kết với d&agrave;n đ&egrave;n pha dạng LED gương cầu ở hai b&ecirc;n,động cơ xăng mạnh mẽ V8. Nội thất ghế l&aacute;i chỉnh điện 10 hướng,ghế h&agrave;nh kh&aacute;ch chỉnh điện 8 hướng,rửa đ&egrave;n pha,hệ thống c&acirc;n bằng g&oacute;c chiếu,hệ thống điều h&ograve;a tự động 2 v&ugrave;ng độc lập,ch&igrave;a kh&oacute;a th&ocirc;ng minh &amp; khởi động bằng n&uacute;t bấm,Hệ thống điều khiển h&agrave;nh tr&igrave;nh,Hệ thống chống b&oacute; cứng phanh ABS,Hệ thống hỗ trợ lực phanh khẩn cấp BA,Hệ thống ph&acirc;n phối lực phanh điện tử EBS,Hệ thống kiểm so&aacute;t lực k&eacute;o TCS,Hệ thống hỗ trợ khởi h&agrave;nh ngang dốc HAC,.. Cam kết xe kh&ocirc;ng tai nạn,kh&ocirc;ng ngập nước,m&aacute;y số zin nguy&ecirc;n bản. Hỗ trợ bank 70% gi&aacute; trị xe l&atilde;i xuất ưu đ&atilde;i, thủ tục nhanh gọn. Mọi th&ocirc;ng tin xin li&ecirc;n hệ để được tư vấn v&agrave; trải nghiệm !</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Toyota Land Cruiser', 'Toyota Land Cruiser', 'Toyota Land Cruiser', '2022-12-19__3.jpg', 14, 1, 0, 1, 0, '3450000000', '10000000', 2, 10, '2022-12-19 14:51:29', '2022-12-26 09:40:35', 0);
INSERT INTO `products` VALUES (124, 'Huyndai Tucson 2.0AT - 2009 Xe cũ Nhập khẩu', 'huyndai-tucson-20at---2009-xe-cu-nhap-khau', 400000000, 20, 1, 1, 0, 'Siêu thị ô tô Ánh Lý bán xe Hyundai Tucson 2.0AT sản xuất năm 2009, nhập khẩu Hàn Quốc, biển tỉnh hồ sơ rút cầm tay. Xe trang bị ngoại thất: Phanh đĩa, lazzang đúc,đèn gầm,cảnh báo rẽ tích hợp trên gương,… Nội thất ghế da cao cấp, cửa sổ trời, gương kính chỉnh điện+ cụp điện, vô lăng bọc da, màn hìn', '<p>Si&ecirc;u thị &ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Hyundai Tucson 2.0AT sản xuất năm 2009, nhập khẩu H&agrave;n Quốc, biển tỉnh hồ sơ r&uacute;t cầm tay. Xe trang bị ngoại thất: Phanh đĩa, lazzang đ&uacute;c,đ&egrave;n gầm,cảnh b&aacute;o rẽ t&iacute;ch hợp tr&ecirc;n gương,&hellip; Nội thất ghế da cao cấp, cửa sổ trời, gương k&iacute;nh chỉnh điện+ cụp điện, v&ocirc; lăng bọc da, m&agrave;n h&igrave;nh giải tr&iacute; DVD, đầu CD, &acirc;m thanh AM/FM, điều h&ograve;a 2 chiều, l&oacute;t s&agrave;n v&agrave; nhiều tiện &iacute;ch kh&aacute;c,... Cam kết xe:Kh&ocirc;ng đ&acirc;m đụng, kh&ocirc;ng ngập nước, m&aacute;y nguy&ecirc;n bản nh&agrave; sản xuất Hỗ trợ ng&acirc;n h&agrave;ng 50% gi&aacute; trị xe l&atilde;i suất ưu đ&atilde;i Li&ecirc;n hệ để biết th&ecirc;m chi tiết!</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Huyndai Tucson', 'Huyndai Tucson', 'Huyndai Tucson', '2022-12-19__1.jpg', 16, 1, 0, 1, 0, '295000000', '3000000', 2, 25, '2022-12-19 15:12:11', '2022-12-25 20:28:52', 2);
INSERT INTO `products` VALUES (125, 'Huyndai Santafe SLX - 2009 Xe cũ Nhập khẩu', 'huyndai-santafe-slx---2009-xe-cu-nhap-khau', 750000000, 20, 1, 1, 0, 'Siêu thị ô tô Ánh Lý bán xe Santafe SLX sản xuất 2009 nhập khẩu nội địa Hàn Quốc biển Hà Nội hồ sơ rút nhanh gọn. - Xe phiên bản đủ trang bị: Nội thất ghế da, lót sàn, đầu CD nguyên bản, 2 ghế điện, sấy sưởi 4 ghế,cửa sổ trời, rửa đèn pha, gương kính điện, vô lăng tích hợp, điều hòa Auto và nhiều ti', '<p>Si&ecirc;u thị &ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Santafe SLX sản xuất 2009 nhập khẩu nội địa H&agrave;n Quốc biển H&agrave; Nội hồ sơ r&uacute;t nhanh gọn. - Xe phi&ecirc;n bản đủ trang bị: Nội thất ghế da, l&oacute;t s&agrave;n, đầu CD nguy&ecirc;n bản, 2 ghế điện, sấy sưởi 4 ghế,cửa sổ trời, rửa đ&egrave;n pha, gương k&iacute;nh điện, v&ocirc; lăng t&iacute;ch hợp, điều h&ograve;a Auto v&agrave; nhiều tiện &iacute;ch kh&aacute;c..... Để c&oacute; th&ocirc;ng tin chi tiết vui l&ograve;ng li&ecirc;n hệ Hotline hoặc Inbox trực tiếp. Hỗ trợ trả g&oacute;p 50% gi&aacute; trị xe l&atilde;i xuất ưu đ&atilde;i thủ tục nhanh gọn.</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Huyndai Santafe SLX', 'Huyndai Santafe SLX', 'Huyndai Santafe SLX', '2022-12-19__2.jpg', 0, 1, 0, 1, 0, '535000000', '3000000', 3, 20, '2022-12-19 15:19:52', '2022-12-19 15:52:14', 2);
INSERT INTO `products` VALUES (126, 'Huyndai Avante 1.6MT - 2012 Xe cũ Trong nước', 'huyndai-avante-16mt---2012-xe-cu-trong-nuoc', 510000000, 20, 1, 1, 0, 'Siêu thị ô tô Ánh Lý bán xe Hyundai Avante 1.6 MT 2012 rất đẹp biển tỉnh hồ sơ rút cầm tay. Xe trang bị: ghế da cao cấp, túi khí an toàn, vô lăng tích hợp, gương kính chỉnh điện,.... Xe còn rất mới, nội ngoại thất đẹp, máy móc, thân vỏ nguyên bản, lốp sử dụng tốt không phải thay thế, đầy đủ phụ kiện', '<p>Si&ecirc;u thị &ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Hyundai Avante 1.6 MT 2012 rất đẹp biển tỉnh hồ sơ r&uacute;t cầm tay. Xe trang bị: ghế da cao cấp, t&uacute;i kh&iacute; an to&agrave;n, v&ocirc; lăng t&iacute;ch hợp, gương k&iacute;nh chỉnh điện,.... Xe c&ograve;n rất mới, nội ngoại thất đẹp, m&aacute;y m&oacute;c, th&acirc;n vỏ nguy&ecirc;n bản, lốp sử dụng tốt kh&ocirc;ng phải thay thế, đầy đủ phụ kiện theo xe như m&agrave;n h&igrave;nh camera l&ugrave;i...... Xe kh&ocirc;ng đ&acirc;m đụng kh&ocirc;ng ngập nước, m&aacute;y nguy&ecirc;n bản của nh&agrave; sản xuất. Hỗ trợ sang t&ecirc;n ch&iacute;nh chủ, hỗ trợ trả g&oacute;p l&atilde;i xuất ưu đ&atilde;i thủ tục nhanh gọn. Vui l&ograve;ng li&ecirc;n hệ để biết th&ecirc;m th&ocirc;ng tin chi tiết!</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Huyndai Avante', 'Huyndai Avante', 'Huyndai Avante', '2022-12-19__4.jpg', 13, 1, 0, 1, 0, '310000000', '2000000', 2, 10, '2022-12-19 15:26:59', '2022-12-25 20:28:45', 2);
INSERT INTO `products` VALUES (127, 'Vinfast Fadil 1.4AT - 2020 Xe cũ Trong nước', 'vinfast-fadil-14at---2020-xe-cu-trong-nuoc', 510000000, 21, 1, 1, 0, 'Siêu thị ô tô Ánh Lý bán xe VinFast Fadil 1.4AT sản xuất 2020 cực đẹp, biển tỉnh hồ sơ rút nhanh gọn. Thiết kế khung xe nguyên khối chắc chắn, kiểu dáng nhỏ gọn, hộp số vô cấp CVT hoạt động mượt mà tiết kiệm nhiên liệu, Sơn si bóng đẹp. Nội thất ghế da cao cấp, màn hình DVD kết hợp camera lùi, dàn â', '<p>Si&ecirc;u thị &ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe VinFast Fadil 1.4AT sản xuất 2020 cực đẹp, biển tỉnh hồ sơ r&uacute;t nhanh gọn. Thiết kế khung xe nguy&ecirc;n khối chắc chắn, kiểu d&aacute;ng nhỏ gọn, hộp số v&ocirc; cấp CVT hoạt động mượt m&agrave; tiết kiệm nhi&ecirc;n liệu, Sơn si b&oacute;ng đẹp. Nội thất ghế da cao cấp, m&agrave;n h&igrave;nh DVD kết hợp camera l&ugrave;i, d&agrave;n &acirc;m thanh 6 loa, v&ocirc; lăng t&iacute;ch hợp n&uacute;t bấm+ điều khiển bằng giọng n&oacute;i, điều h&ograve;a 2 chiều m&aacute;t s&acirc;u, gương k&iacute;nh chỉnh điện gập điện,... Hệ thống an to&agrave;n c&acirc;n bằng điện tử ESC, chức năng kiểm so&aacute;t lực k&eacute;o TCS, hỗ trợ khởi h&agrave;ng ngang dốc HSA,hệ thống 2 t&uacute;i kh&iacute;,... Hỗ trợ trả g&oacute;p 70% gi&aacute; trị xe l&atilde;i suất ưu đ&atilde;i</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Vinfast Fadil', 'Vinfast Fadil', 'Vinfast Fadil', '2022-12-19__1.jpg', 28, 1, 0, 1, 0, '355000000', '3000000', 2, 10, '2022-12-19 15:46:43', '2022-12-26 09:06:41', 2);
INSERT INTO `products` VALUES (128, 'Vinfast Lux SA 2.0AT - 2021 Xe cũ Trong nước', 'vinfast-lux-sa-20at---2021-xe-cu-trong-nuoc', 1250000000, 21, 1, 1, 1, 'Siêu thị Ô tô Ánh Lý bán xe Vinfast LUX SA 2.0 AT Turbo sản xuất năm 2021, xe trang bị Full Options cực đẹp, biển tỉnh hồ sơ rút nhanh gọn. Xe thiết kế ngoại thất sang trọng, màu sắc tinh tế, trang bị Lazang đúc, đèn định vị ban ngày, phanh đĩa 4 bánh,… Nội thất ghế da cao cấp, phanh tay điện tử, Ga', '<p>Si&ecirc;u thị &Ocirc; t&ocirc; &Aacute;nh L&yacute; b&aacute;n xe Vinfast LUX SA 2.0 AT Turbo sản xuất năm 2021, xe trang bị Full Options cực đẹp, biển tỉnh hồ sơ r&uacute;t nhanh gọn. Xe thiết kế ngoại thất sang trọng, m&agrave;u sắc tinh tế, trang bị Lazang đ&uacute;c, đ&egrave;n định vị ban ng&agrave;y, phanh đĩa 4 b&aacute;nh,&hellip; Nội thất ghế da cao cấp, phanh tay điện tử, Ga tự động Cruise Control, m&agrave;n h&igrave;nh cảm ứng 10,4 Inch, đề nổ Start/Stop, điều h&ograve;a 2 chiều, ghế điện, gương k&iacute;nh chỉnh điện, v&ocirc; lăng t&iacute;ch hợp, camera l&ugrave;i, cảm biến quanh xe, t&uacute;i kh&iacute; an to&agrave;n... v&ocirc; v&agrave;n t&iacute;nh năng cao cấp kh&aacute;c - Cam kết xe b&aacute;n ra nguy&ecirc;n bản, kh&ocirc;ng đ&acirc;m đụng, kh&ocirc;ng ngập nước, sơn zin cả xe. - Hỗ trợ trả g&oacute;p l&ecirc;n đến 70 % gi&aacute; trị xe l&atilde;i suất ưu đ&atilde;i thủ tục nhanh gọn!</p>', '<p>Th&ocirc;ng số cơ bản<br />\r\nD&agrave;i x Rộng x Cao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều d&agrave;i cơ sở:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nChiều rộng cơ sở trước/sau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm)<br />\r\nTrọng lượng kh&ocirc;ng tải:&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(kg)<br />\r\nDung t&iacute;ch b&igrave;nh nhi&ecirc;n liệu:&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(l&iacute;t)<br />\r\nĐộng cơ<br />\r\nĐộng cơ:<br />\r\nKiểu động cơ:<br />\r\nDung t&iacute;ch xi lanh:&nbsp;&nbsp;&nbsp;&nbsp;0 (cc)<br />\r\nPhanh - Giảm x&oacute;c - Lốp<br />\r\nPhanh:<br />\r\nGiảm s&oacute;c:<br />\r\nLốp xe:<br />\r\nV&agrave;nh m&acirc;m xe:<br />\r\nTh&ocirc;ng số kỹ thuật kh&aacute;c</p>', 'Vinfast Lux', 'Vinfast Lux', 'Vinfast Lux', '2022-12-19__2.jpg', 13, 1, 0, 1, 0, '1065000000', '10000000', 1, 30, '2022-12-19 15:50:55', '2022-12-26 09:06:38', 2);
COMMIT;

-- ----------------------------
-- Table structure for rating
-- ----------------------------
DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `products_id` int NOT NULL,
  `rating` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of rating
-- ----------------------------
BEGIN;
INSERT INTO `rating` VALUES (1, 55, 4, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (2, 55, 1, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (3, 55, 1, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (4, 55, 5, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (5, 55, 5, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (6, 55, 5, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (7, 55, 5, 0, '2022-11-14', '2022-11-14');
INSERT INTO `rating` VALUES (8, 55, 5, 0, '2022-11-15', '2022-11-15');
INSERT INTO `rating` VALUES (9, 55, 5, 0, '2022-11-15', '2022-11-15');
INSERT INTO `rating` VALUES (10, 55, 5, 0, '2022-11-15', '2022-11-15');
INSERT INTO `rating` VALUES (11, 113, 4, 5, '2022-12-13', '2022-12-13');
INSERT INTO `rating` VALUES (12, 113, 1, 5, '2022-12-13', '2022-12-13');
INSERT INTO `rating` VALUES (13, 113, 4, 10, '2022-12-13', '2022-12-13');
INSERT INTO `rating` VALUES (14, 113, 4, 10, '2022-12-13', '2022-12-13');
INSERT INTO `rating` VALUES (15, 113, 4, 10, '2022-12-13', '2022-12-13');
INSERT INTO `rating` VALUES (16, 113, 5, 10, '2022-12-13', '2022-12-13');
INSERT INTO `rating` VALUES (17, 123, 5, 23, '2022-12-25', '2022-12-25');
INSERT INTO `rating` VALUES (18, 118, 5, 23, '2022-12-25', '2022-12-25');
INSERT INTO `rating` VALUES (19, 123, 5, 23, '2022-12-25', '2022-12-25');
INSERT INTO `rating` VALUES (20, 122, 5, 23, '2022-12-25', '2022-12-25');
INSERT INTO `rating` VALUES (21, 119, 5, 23, '2022-12-26', '2022-12-26');
INSERT INTO `rating` VALUES (22, 119, 4, 23, '2022-12-26', '2022-12-26');
COMMIT;

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`) USING BTREE,
  KEY `role_user_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_user
-- ----------------------------
BEGIN;
INSERT INTO `role_user` VALUES (1, 1);
INSERT INTO `role_user` VALUES (1, 2);
INSERT INTO `role_user` VALUES (49, 3);
INSERT INTO `role_user` VALUES (50, 3);
INSERT INTO `role_user` VALUES (51, 3);
INSERT INTO `role_user` VALUES (52, 3);
INSERT INTO `role_user` VALUES (53, 3);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `roles_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES (1, 'administrator', 'Administrator', 'Administrator toàn quyền quản lý website', '2022-11-12 07:50:14', '2022-11-12 07:50:14');
INSERT INTO `roles` VALUES (2, 'quan-ly-website', 'Quản lý website', 'Quản lý website', '2022-11-12 07:52:20', '2022-11-12 07:52:20');
INSERT INTO `roles` VALUES (3, 'quan-ly-lich-xem-xe', 'Quản lý lịch xem xe', 'Quản lý lịch xem xe', '2022-11-15 22:26:19', '2022-11-15 22:26:19');
COMMIT;

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sl_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_type` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of slides
-- ----------------------------
BEGIN;
INSERT INTO `slides` VALUES (3, 'Slide Việt Phú', 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', '2022-12-12__banner-civic.png', 4, NULL, NULL);
INSERT INTO `slides` VALUES (4, 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', '2022-12-12__all-new-civic-rs-banner.jpg', 4, NULL, NULL);
INSERT INTO `slides` VALUES (5, 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/', '2022-12-12__banner-du-toan-chi-phi.jpg', 4, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `s_script` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `s_file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_html` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `s_type` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `stores_s_type_index` (`s_type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of stores
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` tinyint DEFAULT '0',
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `password` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'check veriemail chua',
  `confirmation_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `active` tinyint DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  KEY `users_admin_id_index` (`admin_id`) USING BTREE,
  KEY `users_confirmed_index` (`confirmed`) USING BTREE,
  KEY `users_confirmation_code_index` (`confirmation_code`) USING BTREE,
  KEY `users_active_index` (`active`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (22, 'Vũ Minh Hoàng', 'hoangvm02.work@gmail.com', '0372482834', NULL, NULL, 0, NULL, NULL, '$2y$10$zJEb.pSNLPyBC9mne4F6GeQIP3x/uhyDHaWs39xGQGJuGucZlR2NO', 0, NULL, 1, NULL, '2022-12-24 10:53:40', '2022-12-24 10:53:40');
INSERT INTO `users` VALUES (23, 'kieu anh duc 2000', 'duc2722000@gmail.com', '0987339590', NULL, NULL, 0, NULL, NULL, '$2y$10$xn/lC/MQpQ7HZORnRN5Bf.zA/7Paxs5r4u6s4s7Cshkrla7vuC2oe', 0, NULL, 1, 'PHGwcgDhrNv5gL7YsgKcEKhWAFdyHVuDiXIayenOL4Qn0GUkK2m81wLtPdro', '2022-12-25 12:23:02', '2022-12-25 12:23:02');
INSERT INTO `users` VALUES (24, 'Thuan', 'thuanddph13844@fpt.edu.vn', '0327292046', NULL, NULL, 0, NULL, NULL, '$2y$10$eiYoSzWwyBhFn0dibk3r5.Bh4WDiLLwwaKxVyFn2jXMHG84AYOkDi', 0, NULL, 1, NULL, '2022-12-25 15:49:18', '2022-12-25 15:49:18');
COMMIT;

-- ----------------------------
-- Table structure for visitors
-- ----------------------------
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `ip` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of visitors
-- ----------------------------
BEGIN;
INSERT INTO `visitors` VALUES (7, '2022-11-12 00:00:00', '127.0.0.1', '2022-11-12 01:56:24', '2022-11-12 01:56:24');
INSERT INTO `visitors` VALUES (8, '2022-11-14 00:00:00', '127.0.0.1', '2022-11-14 21:54:28', '2022-11-14 21:54:28');
INSERT INTO `visitors` VALUES (9, '2022-11-15 00:00:00', '127.0.0.1', '2022-11-15 00:16:28', '2022-11-15 00:16:28');
INSERT INTO `visitors` VALUES (10, '2022-11-16 00:00:00', '127.0.0.1', '2022-11-16 00:31:43', '2022-11-16 00:31:43');
INSERT INTO `visitors` VALUES (11, '2022-11-17 00:00:00', '127.0.0.1', '2022-11-17 00:46:00', '2022-11-17 00:46:00');
INSERT INTO `visitors` VALUES (12, '2022-11-18 00:00:00', '127.0.0.1', '2022-11-18 09:41:51', '2022-11-18 09:41:51');
INSERT INTO `visitors` VALUES (13, '2022-11-18 00:00:00', '::1', '2022-11-18 12:12:47', '2022-11-18 12:12:47');
INSERT INTO `visitors` VALUES (14, '2022-11-20 00:00:00', '127.0.0.1', '2022-11-20 11:41:32', '2022-11-20 11:41:32');
INSERT INTO `visitors` VALUES (15, '2022-11-20 00:00:00', '127.0.0.1', '2022-11-20 11:41:32', '2022-11-20 11:41:32');
INSERT INTO `visitors` VALUES (16, '2022-11-21 00:00:00', '127.0.0.1', '2022-11-21 10:09:11', '2022-11-21 10:09:11');
INSERT INTO `visitors` VALUES (17, '2022-11-22 00:00:00', '127.0.0.1', '2022-11-22 17:47:30', '2022-11-22 17:47:30');
INSERT INTO `visitors` VALUES (18, '2022-11-23 00:00:00', '127.0.0.1', '2022-11-23 09:08:31', '2022-11-23 09:08:31');
INSERT INTO `visitors` VALUES (19, '2022-11-24 00:00:00', '127.0.0.1', '2022-11-24 08:40:54', '2022-11-24 08:40:54');
INSERT INTO `visitors` VALUES (20, '2022-11-25 00:00:00', '127.0.0.1', '2022-11-25 09:16:59', '2022-11-25 09:16:59');
INSERT INTO `visitors` VALUES (21, '2022-11-25 00:00:00', '127.0.0.1', '2022-11-25 09:16:59', '2022-11-25 09:16:59');
INSERT INTO `visitors` VALUES (22, '2022-11-26 00:00:00', '127.0.0.1', '2022-11-26 11:52:19', '2022-11-26 11:52:19');
INSERT INTO `visitors` VALUES (23, '2022-11-26 00:00:00', '127.0.0.1', '2022-11-26 11:52:19', '2022-11-26 11:52:19');
INSERT INTO `visitors` VALUES (24, '2022-11-27 00:00:00', '127.0.0.1', '2022-11-27 09:02:12', '2022-11-27 09:02:12');
INSERT INTO `visitors` VALUES (25, '2022-11-28 00:00:00', '127.0.0.1', '2022-11-28 09:16:27', '2022-11-28 09:16:27');
INSERT INTO `visitors` VALUES (26, '2022-11-28 00:00:00', '127.0.0.1', '2022-11-28 09:16:27', '2022-11-28 09:16:27');
INSERT INTO `visitors` VALUES (27, '2022-11-29 00:00:00', '127.0.0.1', '2022-11-29 21:23:39', '2022-11-29 21:23:39');
INSERT INTO `visitors` VALUES (28, '2022-11-29 00:00:00', '127.0.0.1', '2022-11-29 21:23:39', '2022-11-29 21:23:39');
INSERT INTO `visitors` VALUES (29, '2022-11-30 00:00:00', '127.0.0.1', '2022-11-30 10:26:57', '2022-11-30 10:26:57');
INSERT INTO `visitors` VALUES (30, '2022-11-30 00:00:00', '127.0.0.1', '2022-11-30 10:26:57', '2022-11-30 10:26:57');
INSERT INTO `visitors` VALUES (31, '2022-12-01 00:00:00', '127.0.0.1', '2022-12-01 00:33:17', '2022-12-01 00:33:17');
INSERT INTO `visitors` VALUES (32, '2022-12-03 00:00:00', '127.0.0.1', '2022-12-03 10:44:56', '2022-12-03 10:44:56');
INSERT INTO `visitors` VALUES (33, '2022-12-04 00:00:00', '127.0.0.1', '2022-12-04 09:25:25', '2022-12-04 09:25:25');
INSERT INTO `visitors` VALUES (34, '2022-12-04 00:00:00', '127.0.0.1', '2022-12-04 09:25:25', '2022-12-04 09:25:25');
INSERT INTO `visitors` VALUES (35, '2022-12-05 00:00:00', '127.0.0.1', '2022-12-05 10:34:03', '2022-12-05 10:34:03');
INSERT INTO `visitors` VALUES (36, '2022-12-06 00:00:00', '127.0.0.1', '2022-12-06 11:11:03', '2022-12-06 11:11:03');
INSERT INTO `visitors` VALUES (37, '2022-12-06 00:00:00', '127.0.0.1', '2022-12-06 11:11:03', '2022-12-06 11:11:03');
INSERT INTO `visitors` VALUES (38, '2022-12-07 00:00:00', '127.0.0.1', '2022-12-07 09:07:07', '2022-12-07 09:07:07');
INSERT INTO `visitors` VALUES (39, '2022-12-08 00:00:00', '127.0.0.1', '2022-12-08 12:10:29', '2022-12-08 12:10:29');
INSERT INTO `visitors` VALUES (40, '2022-12-09 00:00:00', '127.0.0.1', '2022-12-09 09:48:37', '2022-12-09 09:48:37');
INSERT INTO `visitors` VALUES (41, '2022-12-09 00:00:00', '127.0.0.1', '2022-12-09 09:48:37', '2022-12-09 09:48:37');
INSERT INTO `visitors` VALUES (42, '2022-12-12 00:00:00', '127.0.0.1', '2022-12-12 10:46:38', '2022-12-12 10:46:38');
INSERT INTO `visitors` VALUES (43, '2022-12-13 00:00:00', '127.0.0.1', '2022-12-13 08:30:22', '2022-12-13 08:30:22');
INSERT INTO `visitors` VALUES (44, '2022-12-14 00:00:00', '127.0.0.1', '2022-12-14 09:18:37', '2022-12-14 09:18:37');
INSERT INTO `visitors` VALUES (45, '2022-12-17 00:00:00', '127.0.0.1', '2022-12-17 18:20:38', '2022-12-17 18:20:38');
INSERT INTO `visitors` VALUES (46, '2022-12-18 00:00:00', '127.0.0.1', '2022-12-18 10:32:48', '2022-12-18 10:32:48');
INSERT INTO `visitors` VALUES (47, '2022-12-19 00:00:00', '127.0.0.1', '2022-12-19 13:31:49', '2022-12-19 13:31:49');
INSERT INTO `visitors` VALUES (48, '2022-12-20 00:00:00', '127.0.0.1', '2022-12-20 00:46:32', '2022-12-20 00:46:32');
INSERT INTO `visitors` VALUES (49, '2022-12-21 00:00:00', '127.0.0.1', '2022-12-21 00:01:42', '2022-12-21 00:01:42');
INSERT INTO `visitors` VALUES (50, '2022-12-22 00:00:00', '127.0.0.1', '2022-12-22 00:17:15', '2022-12-22 00:17:15');
INSERT INTO `visitors` VALUES (51, '2022-12-23 00:00:00', '127.0.0.1', '2022-12-23 10:58:03', '2022-12-23 10:58:03');
INSERT INTO `visitors` VALUES (52, '2022-12-24 00:00:00', '127.0.0.1', '2022-12-24 10:47:29', '2022-12-24 10:47:29');
INSERT INTO `visitors` VALUES (53, '2022-12-25 00:00:00', '127.0.0.1', '2022-12-25 12:14:56', '2022-12-25 12:14:56');
INSERT INTO `visitors` VALUES (54, '2022-12-26 00:00:00', '127.0.0.1', '2022-12-26 08:12:47', '2022-12-26 08:12:47');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
