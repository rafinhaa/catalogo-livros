-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para catalogo_livros
DROP DATABASE IF EXISTS `catalogo_livros`;
CREATE DATABASE IF NOT EXISTS `catalogo_livros` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `catalogo_livros`;

-- Copiando estrutura para tabela catalogo_livros.livros
DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `resumo` longtext DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela catalogo_livros.livros: ~6 rows (aproximadamente)
DELETE FROM `livros`;
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` (`id`, `titulo`, `autor`, `preco`, `resumo`, `ativo`, `img`) VALUES
	(1, 'Test Driven Development', 'Hugo Corbucci, Mauricio Aniche', 29.90, 'Neste livro, você aprenderá sobre TDD, uma das práticas ágeis de desenvolvimento de software mais populares. TDD faz o desenvolvedor escrever o teste antes mesmo de implementar o código. Essa simples inversão na maneira de se trabalhar faz com o que o desenvolvedor escreva código mais testado, com menos bugs, e, inclusive, com mais qualidade. Seja profissional, teste seu software!', 1, '6cdf2b9c1051ee40555057150374be1d.png'),
	(2, 'Segurança em aplicações Web', 'Rodrigo Ferreira', 29.90, 'Neste livro, Rodrigo Ferreira ensina como tratar ataques relacionados a vulnerabilidades presentes na própria aplicação, explicando de maneira detalhada como eles funcionam, como verificar se sua aplicação está vulnerável a eles, e como fazer para corrigir tais inseguranças. Você aprenderá a lidar com ataques como: SQL Injection, Cross-Site Scripting (XSS), Cross-Site Request Forgery (CSRF), Session Hijacking, dentre outros.', 1, '1db0684864940bcf8812a43667d4ff4a.jpg'),
	(12, 'Desenvolvimento web com PHP e MySQL', 'Evaldo Junior Bento', 29.90, 'Aprenda com esse livro os primeiros passos para usar o PHP, uma ferramenta que possibilita a criação de páginas web dinâmicas. Veja também como integrar o PHP ao MySQL, um dos bancos de dados mais usados no mundo.\r\n\r\nA dupla PHP e MySQL é usada por diversos tipos de aplicações e sites, de blogs a portais de notícias e grandes redes sociais.', 1, '6fdd7e713ad2b2dee279ffb1c970402c.jpg'),
	(13, 'CodeIgniter Produtividade na criação de aplicações', 'Jonathan Lamim Antunes', 29.90, 'O CodeIgniter 3.x é um framework MVC open source, escrito em PHP e mantido atualmente pelo British Columbia Institute of Technology e por uma grande comunidade de desenvolvedores ao redor do mundo. Com ele, é possível desenvolver sites, APIs e sistemas das mais diversas complexidades, tudo de forma otimizada, organizada e rápida. Suas bibliotecas nativas facilitam ainda mais o processo de desenvolvimento, e ainda permitem ser estendidas para que o funcionamento se adapte à necessidade de cada projeto.', 1, 'aec353dc627bc3d9449e40b1fe5ed003.jpg'),
	(14, 'Web Services REST com ASP .NET Web API e Windows A', 'Paulo Siécola', 59.99, 'Neste livro, Paulo Siécola aborda a criação de Web Services em C#, utilizando a mais recente tecnologia da Microsoft, ASP.NET Web API. Trata-se de um framework que torna simples a criação de serviços a serem consumidos por uma variada gama de clientes, incluindo browsers, dispositivos móveis ou qualquer equipamento capaz de acessar recursos através de HTTP. Para hospedagem dos serviços que serão gerados ao longo dos projetos deste livro, será utilizada a plataforma de computação nas nuvens Windows Azure, que permite a criação de sites, banco de dados e aplicações.', 1, '80ca4232864b81635b55acbfaea5db33.jpg'),
	(15, 'Design Patterns com PHP 7 Desenvolva com as melhor', 'Gabriel Anhaia', 39.90, 'Do inglês Design Patterns, os Padrões de Projeto podem ser definidos como modelos de soluções para algum problema específico encontrado frequentemente dentro de um projeto de software. Com eles, conseguimos desenvolver sistemas mais modulares, expansíveis, reutilizáveis e com mais flexibilidade. Atualmente, dominá-los é considerada uma skill fundamental para qualquer desenvolvedor.', 1, '7c3be8273a5f56ed4db79947b62de7ec.jpg');
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;

-- Copiando estrutura para tabela catalogo_livros.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ativo` int(1) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela catalogo_livros.usuarios: ~1 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`, `ativo`) VALUES
	(4, 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Rafael Rodrigues', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
