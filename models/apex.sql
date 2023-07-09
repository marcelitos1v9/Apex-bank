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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela apex_bank.clients: ~3 rows (aproximadamente)
REPLACE INTO `clients` (`id`, `nome`, `sobrenome`, `sexo`, `cpf`, `endereco`, `telefone`, `email`, `senha`, `saldo`) VALUES
	(6, 'marcelo', 'augusto', NULL, '78678789', 'rua 2', '897983807309', 'marcelo@gmail.com', '$2y$10$rlcKLrNJQTacmYP5YGuYyuYof56ouZE4g2/9g7Fa6MNAndRU322Nu', 24557.00),
	(7, 'julia', 'trajano', NULL, '984379044', 'ruann', '43984902', 'julia@gmail.com', '$2y$10$n.F2VPlOT7NQfIU3G0TPGucV.1nPdPkaWv.sEFKaa9GoWyojBRT4u', 51319.00),
	(8, 'marcelin piroquinha', 'uiui', NULL, '23124334223', 'rua das ostras', '09809879', 'marcelim@gmail.com', '$2y$10$QI0X6bBf30B6VCS1Ko8JYOt0/Hlfk816cwKZ5lBNgtzKXGpqPrBcq', 0.00);

-- Copiando estrutura para tabela apex_bank.sup_chat
DROP TABLE IF EXISTS `sup_chat`;
CREATE TABLE IF NOT EXISTS `sup_chat` (
  `id_atendimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `idsuporte` int(11) NOT NULL DEFAULT 0,
  `atendimentodata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_atendimento`),
  KEY `FK_sup_chat_clients` (`id_user`),
  KEY `idx_idsuporte` (`idsuporte`),
  CONSTRAINT `FK_sup_chat_clients` FOREIGN KEY (`id_user`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela apex_bank.sup_chat: ~5 rows (aproximadamente)
REPLACE INTO `sup_chat` (`id_atendimento`, `id_user`, `idsuporte`, `atendimentodata`) VALUES
	(1, 6, 0, '2023-07-09 18:14:13'),
	(2, 8, 0, '2023-07-09 21:07:26'),
	(3, 8, 0, '2023-07-09 21:08:12'),
	(4, 8, 0, '2023-07-09 21:15:13'),
	(5, 8, 0, '2023-07-09 21:25:09');

-- Copiando estrutura para tabela apex_bank.sup_chat_messages
DROP TABLE IF EXISTS `sup_chat_messages`;
CREATE TABLE IF NOT EXISTS `sup_chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atendimento` int(11) NOT NULL,
  `sender` enum('suporte','usuario') NOT NULL,
  `mensagem` text NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_sup_chat_messages_sup_chat` (`id_atendimento`),
  CONSTRAINT `FK_sup_chat_messages_sup_chat` FOREIGN KEY (`id_atendimento`) REFERENCES `sup_chat` (`id_atendimento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela apex_bank.sup_chat_messages: ~10 rows (aproximadamente)
REPLACE INTO `sup_chat_messages` (`id`, `id_atendimento`, `sender`, `mensagem`, `datahora`) VALUES
	(1, 1, 'usuario', 'ola', '2023-07-09 18:14:16'),
	(2, 1, 'usuario', 'joia', '2023-07-09 18:14:23'),
	(3, 4, 'usuario', 'ola', '2023-07-09 21:15:17'),
	(4, 5, 'usuario', 'ola', '2023-07-09 21:25:13'),
	(5, 5, 'usuario', 'ola', '2023-07-09 21:30:27'),
	(6, 5, 'usuario', 'teste de mensagem', '2023-07-09 21:30:36'),
	(7, 5, 'usuario', 'teste', '2023-07-09 21:44:51'),
	(8, 5, 'usuario', 'ola', '2023-07-09 22:19:33'),
	(9, 5, 'usuario', 'ihpij', '2023-07-09 22:19:40'),
	(10, 5, 'usuario', 'teste', '2023-07-09 22:26:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela apex_bank.transactions: ~0 rows (aproximadamente)
REPLACE INTO `transactions` (`id`, `id_conta`, `id_conta_recebe`, `valor`, `data_transacao`) VALUES
	(11, 7, 6, 43.00, '2023-05-02 23:58:51'),
	(12, 6, 7, 7909.00, '2023-07-05 20:16:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
