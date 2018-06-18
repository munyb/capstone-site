-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2018 at 09:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neo_site_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `coin_data`
--

CREATE TABLE `coin_data` (
  `id` text,
  `name` text,
  `symbol` text,
  `grank` text,
  `price_usd` text,
  `price_btc` text,
  `market_cap_usd` text,
  `available_supply` text,
  `total_supply` text,
  `max_supply` text,
  `percent_change_1h` text,
  `percent_change_24h` text,
  `percent_change_7d` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_data`
--

INSERT INTO `coin_data` (`id`, `name`, `symbol`, `grank`, `price_usd`, `price_btc`, `market_cap_usd`, `available_supply`, `total_supply`, `max_supply`, `percent_change_1h`, `percent_change_24h`, `percent_change_7d`) VALUES
('deepbrain-chain', 'DeepBrain Chain', 'DBC', '119', '0.0867318', '0.00001027', '130097700.0', '1500000000.0', '10000000000.0', '10000000000.0', '0.19', '3.34', '-27.1'),
('gas', 'Gas', 'GAS', '70', '25.4608', '0.00301377', '257876533.0', '10128375.0', '17190378.0', '100000000.0', '0.47', '0.04', '-20.25'),
('neo', 'NEO', 'NEO', '11', '64.2645', '0.00760694', '4177192500.0', '65000000.0', '100000000.0', '100000000.0', '0.47', '1.57', '-24.51'),
('qlink', 'QLINK', 'QLC', '255', '0.16332', '0.00001933', '39196800.0', '240000000.0', '600000000.0', '0', '-0.56', '2.04', '-21.03'),
('red-pulse', 'Red Pulse', 'RPX', '181', '0.0945618', '0.00001119', '76208461.0', '805911699.0', '1358371250.0', '0', '-0.56', '5.02', '-27.79'),
('thekey', 'THEKEY', 'TKY', '179', '0.0169911', '0.00000201', '76544791.0', '4504993287.0', '9795844687.0', '0', '0.71', '1.95', '-15.33'),
('trinity-network-credit', 'Trinity Network Credit', 'TNC', '261', '0.110755', '0.00001311', '36918333.0', '333333333.0', '1000000000.0', '0', '2.0', '-9.2', '-29.23'),
('zeepin', 'Zeepin', 'ZPT', '347', '0.0777302', '0.00000920', '22839292.0', '293827778.0', '1000000000.0', '0', '0.76', '6.97', '-28.63'),
('alphacat', 'Alphacat', 'ACAT', '362', '0.00746958', '0.00000088', '20843326.0', '2790428084.0', '6250000000.0', '0', '2.13', '1.68', '-17.41'),
('ontology', 'Ontology', 'ONT', '28', '9.81064', '0.0010674', '1104870921.0', '112619658.0', '1000000000.0', '0', '1.72', '16.06', '85.47');

-- --------------------------------------------------------

--
-- Table structure for table `market_info`
--

CREATE TABLE `market_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `total_marketcap` text,
  `neo_dominance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_info`
--

INSERT INTO `market_info` (`id`, `total_marketcap`, `neo_dominance`) VALUES
(1, '4837717736', 86);

-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE `page_info` (
  `id` text,
  `name` text,
  `website` text,
  `twitter` text,
  `reddit` text,
  `telegram` text,
  `discord` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `name`, `website`, `twitter`, `reddit`, `telegram`, `discord`) VALUES
('neo', 'NEO', 'https://neo.org', 'https://twitter.com/neo_blockchain', 'https://www.reddit.com/r/NEO/', 'https://telegram.me/Neo_Blockchain', 'https://discordapp.com/invite/DtzSb2Z'),
('gas', 'Gas', 'https://neo.org', 'https://twitter.com/neo_blockchain', 'https://www.reddit.com/r/NEO/', 'https://telegram.me/Neo_Blockchain', 'https://discordapp.com/invite/DtzSb2Z'),
('deepbrain-chain', 'DeepBrain Chain', 'https://www.deepbrainchain.org', 'https://twitter.com/deepbrainchain', 'https://www.reddit.com/r/DeepBrainChain/', NULL, NULL),
('qlink', 'QLINK', 'https://qlink.mobi', 'https://twitter.com/qlinkmobi', 'https://www.reddit.com/r/Qlink', NULL, NULL),
('red-pulse', 'Red Pulse', 'https://red-pulse.com', 'https://twitter.com/red_pulse_china', 'https://www.reddit.com/r/RedPulseToken', NULL, NULL),
('zeepin', 'Zeepin', 'https://www.zeepin.io', 'https://twitter.com/ZeepinChain', 'https://www.reddit.com/r/ZEEPIN/', NULL, NULL),
('thekey', 'THEKEY', 'https://www.thekey.vip/', 'https://twitter.com/thekeyvip', 'https://www.reddit.com/user/TheKeyVIP', NULL, NULL),
('alphacat', 'Alphacat', 'https://www.alphacat.io', 'https://twitter.com/alphacat_io', NULL, 'https://t.me/alphacatglobal', NULL),
('trinity-network-credit', 'Trinity Network Credit', 'https://trinity.tech/', 'https://twitter.com/TrinityProtocol', 'https://www.reddit.com/r/TrinityNetworkCredit', 'https://t.me/TrinityStateChannels', NULL),
('ontology', 'Ontology', 'https://ont.io/', 'https://twitter.com/ontologynetwork', 'https://www.reddit.com/r/OntologyNetwork/', 'https://t.me/OntologyNetwork', 'https://discordapp.com/invite/4TQujHj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `market_info`
--
ALTER TABLE `market_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `market_info`
--
ALTER TABLE `market_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
