-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(7, 'A太郎', 'AAA', '$2y$10$D4.Pzsyy.Xr6hXLLIWH/9.VwAKiEgoVIqRoCs7rAYPRmpV.so72S.', 1, 1),
(8, 'B次郎', 'BBB', '$2y$10$7Bxi2k/0yU3SLPKJpE3qzephDBNCE9FiToWsKGq8y2ehXM7/6zBNS', 0, 1),
(9, 'C太郎', 'CCC', '$2y$10$wafAeThLSZP5RTUaldDc/eK9TRRveP5BkW8xL7iiqGTlmUSD6DNIy', 1, 1),
(10, 'D四郎', 'DDD', '$2y$10$DN4Ny.qgXb8R/pIE7XteRuB5vexRvg3VMwLWWwvLOxymHkgAAWn0i', 0, 1),
(11, 'EEE', 'EEE', '$2y$10$VLtpk7lwKN68TrIPgCBgH.5OuYdB0uf/nEddAYqUmpzE1/wD1Sdxy', 0, 1),
(12, 'M次郎', 'MMM', '$2y$10$fRu.f.q9vyItpmZSQalNre5HfWL1c92tFwOdWuTve9PSrhq.HMMv.', 1, 1),
(13, 'WWW', 'WWW', '$2y$10$MUwvhkeriaZzlgYyaYBd8OBC8KjV2lOKP4q5rLSZKtGU/F34xOWz.', 1, 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
