-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 18 日 02:40
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai8`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `recipeList`
--

CREATE TABLE `recipeList` (
  `id` int(12) NOT NULL,
  `recipeTitle` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recipeDescription` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recipeIndication` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recipeUrl` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `insertDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foodImageUrl` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cookFlg` int(12) DEFAULT NULL,
  `rate` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `recipeList`
--

INSERT INTO `recipeList` (`id`, `recipeTitle`, `recipeDescription`, `recipeIndication`, `recipeUrl`, `insertDate`, `updateDate`, `foodImageUrl`, `cookFlg`, `rate`) VALUES
(26, '簡単！失敗なし！生クリーム不要！濃厚カルボナーラ♪', 'カルボナーラは卵、ベーコン、チーズ、黒胡椒の味を楽しむ料理ってご存知ですか？本場では生クリームは使わないんです！\r\n実際にイタリアで食べた味を再現してみました♪', '調理時間：5分以内', 'https://recipe.rakuten.co.jp/recipe/1490006720/', '2022-06-17 01:23:53', '2022-06-17 01:23:53', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/b9cc124420f61fdf2cb65d41592da944fb09a88e.70.2.3.2.jpg', NULL, NULL),
(32, '沖縄の味★タコライス', 'もうタコライスの素は要りません！家にある材料でできます(´∀｀)ノ', '調理時間：約30分', 'https://recipe.rakuten.co.jp/recipe/1370002492/', '2022-06-17 03:34:40', '2022-06-18 11:35:36', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/37a3b25623256e1f557a839c98ac3f447ea0ab8a.07.2.3.2.jpg', 1, 'もう作らない'),
(33, '我が家の人気者！！鶏の唐揚げ', '砂糖を入れることで柔らかくジューシーな唐揚げになります！\r\nぜひ一度お試しを！', '調理時間：約15分', 'https://recipe.rakuten.co.jp/recipe/1270000186/', '2022-06-17 03:35:34', '2022-06-18 11:34:24', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/638f1f80507338fe75ff0907396ce70ead09cdd2.48.2.3.2.jpg', 1, '美味しい'),
(35, 'グルテンフリー！米粉のバナナパウンドケーキ', '焼くまでの行程がとーっても簡単なので食べたい時にパパッと作れちゃいます(^^)', '調理時間：約1時間', 'https://recipe.rakuten.co.jp/recipe/1890019800/', '2022-06-17 04:02:10', '2022-06-18 11:35:30', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/de6d7063a27a6907b776003fe7a8a1a57fd57540.43.9.3.3.jpg', 1, '美味しい'),
(36, '1分で！うまうま胡麻キュウリ', '小鉢がもう1品ほしいなっていう時に簡単でオススメです。', '調理時間：5分以内', 'https://recipe.rakuten.co.jp/recipe/1200002403/', '2022-06-17 04:14:45', '2022-06-17 04:14:45', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/34d4ce95b8674c8fb6c8f08b5115464a9f180c31.17.2.3.2.jpg', NULL, NULL),
(37, '玉ねぎだけ！もちもち玉ねぎ焼き！！！', '普段よく食べる玉ねぎですが、もちもちな玉ねぎって食べる機会少なくないですか？たまに食べたくなる味です！', '調理時間：約15分', 'https://recipe.rakuten.co.jp/recipe/1800019381/', '2022-06-17 04:15:37', '2022-06-17 04:15:37', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/e49a59320231fc392d03687701b1fd2b7d5e82b9.00.2.3.2.jpg', NULL, NULL),
(44, '【夫婦のおつまみ】夏野菜たっぷり♡ラタトゥイユ', '夏野菜たっぷりで、野菜の甘みが美味しいラタトゥイユです！\r\n味付けにコンソメ不使用！\r\nパンに付けたり、オムレツ、チーズをかけても美味しいです♡', '調理時間：約1時間', 'https://recipe.rakuten.co.jp/recipe/1060011638/', '2022-06-18 11:36:13', '2022-06-18 11:36:13', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/f0657435587c4ee4a8c83a4561b31455f4b56ce6.65.2.3.2.jpg', NULL, NULL),
(45, '手抜きでも簡単美味しい！ぷりぷり海老マヨ！！！', '海老マヨは、子供たちの大好きなメニューの1つで、練乳とか使うと更に美味しいんやけど、おうちにある調味料だけでも簡単に出来るので、みなさんも是非作ってみてね！', '調理時間：約10分', 'https://recipe.rakuten.co.jp/recipe/1390032207/', '2022-06-18 11:36:25', '2022-06-18 11:36:36', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/9672a7e7cfbd1da82af6d46696777746d8662157.82.2.3.2.jpg', 1, '普通');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `username` varchar(64) NOT NULL,
  `login_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_pw` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `username`, `login_id`, `login_pw`, `create_at`, `updated_at`) VALUES
(1, '伊藤', 'ito', 'test1', '2022-06-12 19:21:19', '2022-06-12 19:21:19'),
(2, '田中', 'tanaka', 'test1', '2022-06-12 22:55:19', '2022-06-12 22:55:19'),
(5, 'gs', 'gs', 'dev23', '2022-06-17 04:42:54', '2022-06-17 04:42:54');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `recipeList`
--
ALTER TABLE `recipeList`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `recipeList`
--
ALTER TABLE `recipeList`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
