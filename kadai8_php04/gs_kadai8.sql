-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 16 日 19:48
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
  `rating` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `recipeList`
--

INSERT INTO `recipeList` (`id`, `recipeTitle`, `recipeDescription`, `recipeIndication`, `recipeUrl`, `insertDate`, `updateDate`, `foodImageUrl`, `cookFlg`, `rating`) VALUES
(26, '簡単！失敗なし！生クリーム不要！濃厚カルボナーラ♪', 'カルボナーラは卵、ベーコン、チーズ、黒胡椒の味を楽しむ料理ってご存知ですか？本場では生クリームは使わないんです！\r\n実際にイタリアで食べた味を再現してみました♪', '調理時間：5分以内', 'https://recipe.rakuten.co.jp/recipe/1490006720/', '2022-06-17 01:23:53', '2022-06-17 01:23:53', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/b9cc124420f61fdf2cb65d41592da944fb09a88e.70.2.3.2.jpg', NULL, NULL),
(27, '豚肉とじゃがいもとアスパラの甘辛炒め', '茹でたものとは違う炒めたじゃがいもとアスパラののシャキシャキとした食感を楽しめます。', '調理時間：約15分', 'https://recipe.rakuten.co.jp/recipe/1360013485/', '2022-06-17 01:35:33', '2022-06-17 03:00:00', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/c498d0d05124dff9feca79f3111bff2339c2800c.84.2.3.2.jpg', 1, NULL),
(28, '夏だ！絹ごし豆腐でふんわりゴーヤーチャンプルー♪', 'Pick up レシピに選ばれました♪\r\n木綿豆腐で作ってもＯＫ！！\r\n塩もみでは苦みが増すという説もあるので、テレビで見た情報を元に苦みを抜く方法を変更しました☆', '調理時間：指定なし', 'https://recipe.rakuten.co.jp/recipe/1310001611/', '2022-06-17 01:40:07', '2022-06-17 03:05:46', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/a5fe503e18f2f5abfe27357997b9dd67ceab4db2.74.2.3.2.jpg', 1, NULL),
(29, '野菜たっぷり！！鮭のちゃんちゃん焼き', 'フライパンで手軽に作れます～', '調理時間：約30分', 'https://recipe.rakuten.co.jp/recipe/1740006209/', '2022-06-17 01:40:24', '2022-06-17 04:00:54', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/24435dd2f2e8891b6ccf1f055ce39d7bc8f8c0e3.68.2.3.2.jpg', 1, NULL),
(30, '簡単一品！激ウマもやしのナムル', '安くて美味しいもやしで簡単ナムルです！！おつまみに！あと一品に！', '調理時間：5分以内', 'https://recipe.rakuten.co.jp/recipe/1620021351/', '2022-06-17 01:40:38', '2022-06-17 04:02:18', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/fe9d063ef4b6f020732540e0e97020ce1024bb00.83.2.3.2.jpg', 1, NULL),
(31, 'うまっ！超簡単！☆ガーリックシュリンプ☆', '安いむきえびを使いますがすごく美味しいです（＾ｖ＾）\r\nそして超簡単です！おつまみに◎', '調理時間：約10分', 'https://recipe.rakuten.co.jp/recipe/1490006111/', '2022-06-17 01:41:09', '2022-06-17 02:58:43', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/bf354c159f684b2f16ca1229c28a135e17040a46.32.2.3.2.jpg', 1, NULL),
(32, '沖縄の味★タコライス', 'もうタコライスの素は要りません！家にある材料でできます(´∀｀)ノ', '調理時間：約30分', 'https://recipe.rakuten.co.jp/recipe/1370002492/', '2022-06-17 03:34:40', '2022-06-17 03:34:40', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/37a3b25623256e1f557a839c98ac3f447ea0ab8a.07.2.3.2.jpg', NULL, NULL),
(33, '我が家の人気者！！鶏の唐揚げ', '砂糖を入れることで柔らかくジューシーな唐揚げになります！\r\nぜひ一度お試しを！', '調理時間：約15分', 'https://recipe.rakuten.co.jp/recipe/1270000186/', '2022-06-17 03:35:34', '2022-06-17 03:35:34', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/638f1f80507338fe75ff0907396ce70ead09cdd2.48.2.3.2.jpg', NULL, NULL),
(34, '甜麺醤なしで出来る！簡単 ホイコーロー', '家にある材料で簡単にホイコーローが出来ます♪甜麺醤なしできるのでいつでも作れますヾ(*´∀｀*)ﾉ', '調理時間：約10分', 'https://recipe.rakuten.co.jp/recipe/1090001352/', '2022-06-17 03:36:19', '2022-06-17 03:36:28', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/a1e10faff3c822e32a92aa8531801e62828eaad2.47.2.3.2.jpg', 1, NULL),
(35, 'グルテンフリー！米粉のバナナパウンドケーキ', '焼くまでの行程がとーっても簡単なので食べたい時にパパッと作れちゃいます(^^)', '調理時間：約1時間', 'https://recipe.rakuten.co.jp/recipe/1890019800/', '2022-06-17 04:02:10', '2022-06-17 04:33:31', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/de6d7063a27a6907b776003fe7a8a1a57fd57540.43.9.3.3.jpg', NULL, NULL),
(36, '1分で！うまうま胡麻キュウリ', '小鉢がもう1品ほしいなっていう時に簡単でオススメです。', '調理時間：5分以内', 'https://recipe.rakuten.co.jp/recipe/1200002403/', '2022-06-17 04:14:45', '2022-06-17 04:14:45', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/34d4ce95b8674c8fb6c8f08b5115464a9f180c31.17.2.3.2.jpg', NULL, NULL),
(37, '玉ねぎだけ！もちもち玉ねぎ焼き！！！', '普段よく食べる玉ねぎですが、もちもちな玉ねぎって食べる機会少なくないですか？たまに食べたくなる味です！', '調理時間：約15分', 'https://recipe.rakuten.co.jp/recipe/1800019381/', '2022-06-17 04:15:37', '2022-06-17 04:15:37', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/e49a59320231fc392d03687701b1fd2b7d5e82b9.00.2.3.2.jpg', NULL, NULL),
(38, 'ご飯がすすむ！鶏むね肉のねぎ塩焼き', 'そのままでも、ご飯にのせて丼にしても♪', '調理時間：約10分', 'https://recipe.rakuten.co.jp/recipe/1760028309/', '2022-06-17 04:18:08', '2022-06-17 04:19:34', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/fbd7dd260d736654532e6c0b1ec185a0cede8675.49.2.3.2.jpg', 1, NULL),
(39, 'ご飯がすすむ♪ 豚肉となすの味噌炒め☆', 'ささっと簡単、豚バラ肉と夏野菜の味噌味の炒めものです。　ご飯のおかずに、おつまみにお箸が進みます。', '調理時間：約10分', 'https://recipe.rakuten.co.jp/recipe/1390015585/', '2022-06-17 04:34:41', '2022-06-17 04:34:41', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/b9439a7c2fd591879279d91e61d4fb6b09388f27.92.2.3.2.jpg', NULL, NULL),
(40, '簡単！ふわふわとろとろ☆ねぎ焼き', 'ふわふわとろとろなので、大きさはこれぐらいが限界です。ねぎの甘みを存分に味わえます。', '調理時間：約30分', 'https://recipe.rakuten.co.jp/recipe/1170005042/', '2022-06-17 04:45:11', '2022-06-17 04:45:11', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/317e560868d61ebade1877f8f50437cf9e42e62d.01.2.3.2.jpg', NULL, NULL),
(41, '玉ねぎだけ！もちもち玉ねぎ焼き！！！', '普段よく食べる玉ねぎですが、もちもちな玉ねぎって食べる機会少なくないですか？たまに食べたくなる味です！', '調理時間：約15分', 'https://recipe.rakuten.co.jp/recipe/1800019381/', '2022-06-17 04:47:18', '2022-06-17 04:47:18', 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/e49a59320231fc392d03687701b1fd2b7d5e82b9.00.2.3.2.jpg', NULL, NULL);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
