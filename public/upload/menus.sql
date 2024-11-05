-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 18, 2018 lúc 09:56 AM
-- Phiên bản máy phục vụ: 5.6.35
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `admin_laravel`
--

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `m_title`, `m_slug`, `m_parent_id`, `m_type`, `m_active`, `m_hot`, `m_sort`, `m_avatar`, `m_banner`, `m_title_seo`, `m_keyword_seo`, `m_description_seo`, `m_description`, `created_at`, `updated_at`) VALUES
(2, 'Hãng xe honda', NULL, 8, 2, 1, 1, 0, NULL, NULL, 'Hãng xe honda', 'hãng xe honda là 1 hãng xe tuyệt vời nhất mà tôi từng gặp', 'hãng xe honda là 1 hãng xe tuyệt vời nhất mà tôi từng gặp', '<p><strong>Bay 16000 km, SAO&nbsp;<a href=\"https://www.24h.com.vn/arsenal-fc-c48e3424.html\">Arsenal</a>&nbsp;vẫn n&oacute;i &quot;cứng&quot;</strong></p><p>Giữa tuần qua, Arsenal đ&atilde; phải bay chặng đường d&agrave;i&nbsp;10000 dặm (xấp xỉ 16000 km) từ London tới Baku (Azerbaijan) cả đi cả về&nbsp;để chạm tr&aacute;n Qarabag thuộc khu&ocirc;n khổ v&ograve;ng bảng Europa League (thắng 3-0). Đ&aacute;ng n&oacute;i hơn, HLV Unai Emery vẫn mang theo nhiều trụ cột như&nbsp;Mesut Ozil, Alexandre Lacazette, Granit Xhaka v&agrave; &quot;Ph&aacute;o thủ&quot; chỉ được nghỉ ngơi 56 tiếng trước trận gặp Fulham.</p><p>Tuy nhi&ecirc;n, hậu vệ Sokratis Papastathopoulos vẫn tỏ ra kh&aacute; lạc quan v&agrave;o t&igrave;nh h&igrave;nh sức khỏe&nbsp;cũng như khả năng chiến thắng của đội: &quot;Chặng bay d&agrave;i kh&ocirc;ng l&agrave;m kh&oacute; ch&uacute;ng t&ocirc;i. To&agrave;n đội đ&atilde; tập luyện rất chăm chỉ, v&igrave; vậy t&ocirc;i tin rằng tất cả sẽ kịp thời b&igrave;nh phục để gi&agrave;nh chiến thắng ở trận đấu n&agrave;y&quot;.</p><p><strong>Emery &quot;m&ecirc; mệt&quot; tr&ograve; cũ&nbsp;</strong></p><p>Theo tiết lộ từ Mundo Deportivo, HLV Unai Emery đ&atilde; sớm l&ecirc;n danh s&aacute;ch những mục ti&ecirc;u h&agrave;ng đầu ở k&igrave;&nbsp;chuyển nhượng m&ugrave;a đ&ocirc;ng. C&aacute;i t&ecirc;n đầu ti&ecirc;n được chiến lược gia người TBN nhắm tới l&agrave; Eva Banega. Tiền vệ 30 tuổi từng c&oacute; thời gian l&agrave;m việc với Emery ở Sevilla giai đoạn 2014-2016, c&ugrave;ng đội b&oacute;ng n&agrave;y gi&agrave;nh 3 chức v&ocirc; địch Europa League li&ecirc;n tiếp.</p><p>&quot;Ph&aacute;o thủ&quot; hừng hực kh&iacute; thế</p><p>HLV Unai Emery đ&atilde; cất gần như to&agrave;n bộ hảo thủ trong chuyến l&agrave;m kh&aacute;ch tại Azerbaijan nhưng sự mệt mỏi l&agrave; điều kh&oacute; c&oacute; thể tr&aacute;nh khỏi. Tuy nhi&ecirc;n, Arsenal thường xuy&ecirc;n được chơi tại c&uacute;p ch&acirc;u &Acirc;u n&ecirc;n đội b&oacute;ng cũng đ&atilde; qu&aacute; quen với vấn đề n&agrave;y.</p><p>Khoảng c&aacute;ch từ s&acirc;n Emirates tới s&acirc;n Craven Cottage chỉ khoảng 12km bởi c&ugrave;ng nằm trong th&agrave;nh phố London nhưng khoảng c&aacute;ch tr&igrave;nh độ giữa hai đội th&igrave; kh&ocirc;ng gần như vậy. Bởi vậy, một chiến thắng cho &quot;Ph&aacute;o thủ&quot; l&agrave; một điều c&oacute; thể dự đo&aacute;n trước</p>', NULL, '2018-10-07 12:47:46'),
(3, 'Tin Tức', NULL, 0, 1, 1, 0, 0, '2018-09-24__papa.jpg', NULL, 'Đại lý bán xe là gì', 'Đại lý bán xe', 'Đại lý bán xe', '<p>Đại l&yacute; b&aacute;n xe</p>', NULL, '2018-10-07 03:50:46'),
(4, 'Giới thiệu', NULL, 0, 3, 1, 0, 0, '2018-09-24__papa.jpg', NULL, 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', '<p>Để tin đăng xe c&oacute; thể nổi bật, hiệu quả v&agrave; thu h&uacute;t người mua giữa h&agrave;ng ng&agrave;n tin đăng kh&aacute;c ở Chợ Tốt l&agrave; 1 điều kh&ocirc;ng hề đơn giản. Thấu hiểu mong muốn của người d&ugrave;ng, Chợ Tốt sẽ chỉ cho bạn mẹo đăng tin rao b&aacute;n xe hiệu quả nhất.</p><p><strong>Mẹo số 1: Kiểm tra, bảo dưỡng v&agrave; l&agrave;m sạch tổng thể xe cũ trước khi đăng tin</strong></p><p>&ndash; Rửa, dọn, đ&aacute;nh b&oacute;ng cả nội thất lẫn ngoại thất của xe (ghế, bảng t&aacute;p l&ocirc;, k&iacute;nh, thảm, gương&hellip;)</p><p><em>Vệ sinh xe sạch sẽ trước khi rao b&aacute;n.</em></p><p>&ndash; Kiểm tra xe cũ cẩn thận d&ugrave; l&agrave; chi tiết nhỏ nhất l&agrave; 1 c&aacute;ch để tr&aacute;nh người mua mặc cả gi&aacute;.</p><p><em>Kiểm tra xe trước khi rao b&aacute;n.</em></p><p>&ndash; Bảo dưỡng xe định kỳ trước khi rao b&aacute;n để chắc chắn đ&acirc;y l&agrave; chiếc xe cũ an to&agrave;n v&agrave; đ&aacute;ng gi&aacute; (cải thiện m&aacute;y m&oacute;c, thay c&aacute;c bộ phận bị hư, khắc phục vết xước, sơn..)</p><p>&ndash; Tham khảo &yacute; kiến thợ sửa xe nếu cần điều chỉnh hoặc muốn l&agrave;m mới xe.</p><p>Sau khi đ&atilde; c&oacute; một chiếc xe thật &ldquo;xinh đẹp v&agrave; ngon l&agrave;nh&rdquo;, việc bạn cần l&agrave;m tiếp theo l&agrave; đăng một tin đăng rao b&aacute;n thật hấp dẫn:</p><p><strong>Mẹo số 2: Ti&ecirc;u đề ngắn gọn v&agrave; đầy đủ</strong></p><p>&ndash; H&igrave;nh thức ti&ecirc;u đề cơ bản: &ldquo;T&ecirc;n xe/loại xe + Năm sản xuất + M&agrave;u sắc&rdquo;.</p><p>&ndash; Đưa &ldquo;từ kh&oacute;a&rdquo; quan trọng g&acirc;y sức h&uacute;t l&ecirc;n ti&ecirc;u đề, như số km đ&atilde; đi, biển số tỉnh/th&agrave;nh.</p><p>Hẳn nhi&ecirc;n, những ti&ecirc;u đề dưới đ&acirc;y sẽ hấp dẫn bạn &hellip;</p><ul><li><em>&ldquo;Toyota inova G mẫu mới m&agrave;u bạc BS 4 số TP&rdquo;</em></li><li><em>&ldquo;Xe gia đ&igrave;nh số tự động Camry 2.4G 2.0.0.5&rdquo;</em></li><li><em>&ldquo;Camry 2.4 đk 12/2011, m&agrave;u ghi x&aacute;m, odo 30.000km&Prime;.</em></li></ul><p>&hellip; hơn l&agrave; c&aacute;c tin đăng với ti&ecirc;u đề &ldquo;<em>Xe toyota&rdquo;, &ldquo;Xe Camry số tự động</em>&ldquo;,.. đ&uacute;ng kh&ocirc;ng !?</p><p><strong>Mẹo số 3: H&igrave;nh ảnh thật, đẹp, r&otilde; r&agrave;ng</strong></p><p>&ndash; Chợ Tốt giới hạn 6 h&igrave;nh ảnh/ tin đăng; do vậy, bạn cần tận dụng một c&aacute;ch triệt để để khoe kh&eacute;o xe của m&igrave;nh:</p><ul><li>4 ảnh chụp 4 mặt tr&aacute;i, phải, trước, sau của xe.</li><li>2 ảnh chụp nội thất xe (đối với xe hơi), hoặc chụp bảng điều khiển (đối với xe m&aacute;y).</li></ul><p>&ndash; Đầu tư kỹ lưỡng cho h&igrave;nh ảnh xe của bạn, chụp thật đẹp v&agrave; chi tiết.</p><p>&ndash; Phần nền bức ảnh cũng kh&aacute; quan trọng; do đ&oacute;, bạn c&oacute; thể chạy xe đến c&ocirc;ng vi&ecirc;n, hoặc s&acirc;n b&atilde;i rộng, tho&aacute;ng để tăng độ hấp dẫn của bức h&igrave;nh.</p><p>&ndash; Nếu c&oacute; bạn b&egrave; biết chụp ảnh m&aacute;y cơ, bạn c&oacute; thể nhờ chụp.</p><p>Bạn c&oacute; thể tham khảo th&ecirc;m tại b&agrave;i viết&nbsp;<a href=\"http://trogiup.chotot.com/uncategorized/meo-chup-hinh-xe/\">Mẹo chụp h&igrave;nh cho tin đăng b&aacute;n xe</a></p><p><strong>Mẹo số 4: Nội dung chi tiết, hấp dẫn</strong></p><p>&ndash; N&ecirc;u đầy đủ c&aacute;c th&ocirc;ng tin cần thiết nhất như: t&ecirc;n xe, thương hiệu, năm sản xuất.</p><p>&ndash; N&ecirc;u c&aacute;c ưu điểm nổi bật của xe (v&iacute; dụ: sức mạnh động cơ, tiết kiệm nhi&ecirc;n liệu..) v&agrave; cả khuyết điểm (v&iacute; dụ: điều h&ograve;a yếu, hư hỏng bộ phận g&igrave;, c&oacute; trầy xước hay kh&ocirc;ng&hellip;)</p><p>&ndash; Tr&igrave;nh b&agrave;y nội dung thật kh&eacute;o l&eacute;o, th&aacute;i độ t&iacute;ch cực. Ngo&agrave;i ra, bạn c&oacute; thể tr&igrave;nh b&agrave;y th&ecirc;m l&yacute; do muốn b&aacute;n xe để tạo độ tin cậy của tin.</p><p>&ndash; Tr&aacute;nh d&ugrave;ng từ s&aacute;o rỗng:&nbsp;<em>xe nữ chạy, b&aacute;nh dự ph&ograve;ng chưa chạm đất.</em><br />&ndash; N&ecirc;u r&otilde; h&igrave;nh thức thanh to&aacute;n r&otilde; r&agrave;ng.</p><p><strong>Mẹo số 5: Gi&aacute; b&aacute;n hấp dẫn</strong></p><p>Gi&aacute; b&aacute;n l&agrave; một trong những yếu tố đầu ti&ecirc;n gi&uacute;p người mua quyết định c&oacute; nhấp v&agrave;o tin đăng của bạn hay kh&ocirc;ng. Do đ&oacute;, để đặt mức gi&aacute; hợp l&yacute;, bạn cần:<br />&ndash; Tham khảo gi&aacute; thị trường tr&ecirc;n Chợ Tốt hoặc c&aacute;c diễn đ&agrave;n chơi &ocirc; t&ocirc;/ xe m&aacute;y.<br />&ndash; Khảo s&aacute;t gi&aacute; ở c&aacute;c chợ xe hoặc salon xe cũ.<br />&ndash; Trao đổi với người từng c&oacute; kinh nghiệm mua b&aacute;n xe cũ.<br />&ndash; Suy nghĩ về mức gi&aacute; tối thiểu bạn c&oacute; thể b&aacute;n khi đ&ocirc;i b&ecirc;n thương lượng, c&oacute; thể t&iacute;nh lu&ocirc;n ch&iacute; ph&iacute; bạn vừa bảo dưỡng xe.</p><p>Bạn c&oacute; thể tham khảo th&ecirc;m tại b&agrave;i viết&nbsp;<a href=\"http://trogiup.chotot.com/uncategorized/dinh-gia-xe/\">C&aacute;ch định gi&aacute; xe đ&atilde; qua sử dụng</a>.</p><p><strong>Mẹo số 6: Nhấn mạnh h&igrave;nh thức li&ecirc;n hệ</strong></p><p>&ndash; Th&ocirc;ng tin ch&iacute;nh x&aacute;c, r&otilde; r&agrave;ng (bao gồm số điện thoại, địa chỉ email c&aacute; nh&acirc;n v&agrave; địa chỉ bạn muốn giao dịch) để người mua chắc chắn c&oacute; thể li&ecirc;n hệ được với bạn.</p><p>&ndash; Nhấn mạnh phương thức li&ecirc;n lạc với bạn dễ nhất, mở rộng th&ecirc;m 1 số h&igrave;nh thức kh&aacute;c như: zalo, viber, skype&hellip;</p><p><strong>Mẹo số 7: Quảng b&aacute; th&ocirc;ng tin Cửa h&agrave;ng tr&ecirc;n Chợ Tốt.</strong></p><p>T&igrave;m hiểu th&ecirc;m&nbsp;<a href=\"http://trogiup.chotot.com/quy-dinh/quy-dinh-su-dung-tinh-nang-cua-hang-tren-chotot-com/\">t&iacute;nh năng Cửa h&agrave;ng tr&ecirc;n Chợ Tốt</a>.</p><p>&ndash; Đặt t&ecirc;n Cửa h&agrave;ng r&otilde; r&agrave;ng, cụ thể để thu h&uacute;t người xem.&nbsp;V&iacute; dụ: Cửa h&agrave;ng xe m&aacute;y Nguyễn Văn A.</p><p>&ndash; Chia sẻ đường dẫn Cửa h&agrave;ng l&ecirc;n facebook, diễn đ&agrave;n để giới thiệu th&ocirc;ng tin Cửa h&agrave;ng đến với nhiều người hơn.</p><p>&ndash; Đăng 1 tin từ Cửa h&agrave;ng l&ecirc;n Chợ Tốt để người d&ugrave;ng c&oacute; thể truy cập Cửa h&agrave;ng của bạn tại giao diện xem tin tr&ecirc;n Chợ Tốt v&agrave; c&oacute; thể xem tất cả c&aacute;c tin đăng c&oacute; trong Cửa h&agrave;ng của bạn. Từ đ&oacute;, gi&uacute;p bạn tiết kiệm chi ph&iacute; đăng tin.</p>', NULL, '2018-09-30 08:15:20'),
(8, 'Hãng Xe', NULL, 0, 2, 1, 0, 3, NULL, NULL, 'Hãng xe', 'hãng xe', 'hãng xe', '<p>H&atilde;ng xe</p>', NULL, '2018-10-07 01:08:30'),
(9, 'Hyndai Tucson', NULL, 8, 2, 1, 0, NULL, '2018-10-07__image-0-compressed.jpg', NULL, 'Hyndai Tucson', 'Hyndai Tucson', 'Hyndai Tucson', '<p>- Nội dung&nbsp;</p><p>- Nội dung</p><p>&nbsp;</p>', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
