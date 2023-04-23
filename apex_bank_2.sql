-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para apex_bank
DROP DATABASE IF EXISTS `apex_bank`;
CREATE DATABASE IF NOT EXISTS `apex_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `apex_bank`;

-- Copiando estrutura para tabela apex_bank.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `saldo` double(20,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela apex_bank.clients: ~3 rows (aproximadamente)
INSERT INTO `clients` (`id`, `nome`, `sobrenome`, `sexo`, `cpf`, `endereco`, `telefone`, `email`, `senha`, `saldo`) VALUES
	(1, 'marcelo', 'augusto', '', '843780298', 'rua 1', '90489-238', 'marcelo@gmail.com', '1234', 151843.76),
	(3, 'marcelo', 'jesus', '', '2133232', 'rua 2', '2324332323', 'marcelo3@gmail.com', '1234', 65242569.00),
	(4, 'julia', 'albuquerque', '', '3432893', 'rua 3', '342425432', 'julia@gmail.com', '1234', 9589931.00),
	(5, 'joão ', 'trombeta', NULL, '64678976', 'eua tyu', '8975679096787', 'joao@gmail.com', '1234', 8676343.24);

-- Copiando estrutura para tabela apex_bank.transactions
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_conta` int(11) NOT NULL,
  `id_conta_recebe` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_transacao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_transactions_clients` (`id_conta`),
  CONSTRAINT `FK_transactions_clients` FOREIGN KEY (`id_conta`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela apex_bank.transactions: ~8 rows (aproximadamente)
INSERT INTO `transactions` (`id`, `id_conta`, `id_conta_recebe`, `valor`, `data_transacao`) VALUES
	(1, 4, 1, 789.00, '2023-04-22 13:34:14'),
	(2, 4, 3, 6789.00, '2023-04-22 13:49:07'),
	(3, 4, 1, 789.00, '2023-04-22 16:44:55'),
	(4, 4, 5, 890.00, '2023-04-22 17:12:44'),
	(5, 1, 4, 10000.00, '2023-04-22 17:39:06'),
	(6, 1, 5, 7899768.00, '2023-04-22 22:03:19'),
	(7, 1, 3, 65100000.00, '2023-04-22 22:04:05'),
	(8, 1, 4, 789.00, '2023-04-23 10:07:58'),
	(9, 4, 5, 7777.00, '2023-04-23 10:43:29');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
