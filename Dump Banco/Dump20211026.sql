-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: vistoria
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamento` (
  `idAgenda` int(11) NOT NULL AUTO_INCREMENT,
  `shoppingAgenda` varchar(30) DEFAULT NULL,
  `lojaAgenda` varchar(30) DEFAULT NULL,
  `nomeAgenda` varchar(30) DEFAULT NULL,
  `dataAgenda` date DEFAULT NULL,
  `numeroAgenda` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`idAgenda`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento`
--

LOCK TABLES `agendamento` WRITE;
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipamentos` (
  `idEquipamentos` int(11) NOT NULL AUTO_INCREMENT,
  `shoppingVistoria` varchar(50) DEFAULT NULL,
  `lojaVistoria` varchar(50) DEFAULT NULL,
  `nomeVistoriador` varchar(20) DEFAULT NULL,
  `dataVistoria` date DEFAULT NULL,
  `coifa` varchar(100) DEFAULT NULL,
  `lavador` varchar(100) DEFAULT NULL,
  `duto` varchar(100) DEFAULT NULL,
  `exaustor` varchar(100) DEFAULT NULL,
  `central` varchar(100) DEFAULT NULL,
  `co2` varchar(100) DEFAULT NULL,
  `saponaceo` varchar(100) DEFAULT NULL,
  `damper` varchar(100) DEFAULT NULL,
  `desarmeEx` varchar(100) DEFAULT NULL,
  `id_loja` int(11) DEFAULT NULL,
  `numero` varchar(13) NOT NULL,
  PRIMARY KEY (`idEquipamentos`),
  UNIQUE KEY `id_loja` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipamentos`
--

LOCK TABLES `equipamentos` WRITE;
/*!40000 ALTER TABLE `equipamentos` DISABLE KEYS */;
INSERT INTO `equipamentos` VALUES (115,'West Shopping','Bobs','André Guimarães','2021-09-17','Filtros Inerciais inexistentes','Lavador de gases inoperante','Duto não possui portas de inspeção','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'6144eaf84a639'),(116,'Park Shopping','Billy the Grill','André Guimarães','2021-09-17','Filtros Inerciais sujos','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'6144eb8974195'),(117,'Park Shopping','Divino fogão','teste4','2021-09-20','Filtros Inerciais não completos','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'6144ec55b5ea5'),(118,'Recreio Shopping','Kone','André Guimarães','2021-09-17','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'6144ed32771cf'),(119,'Recreio Shopping','Vivenda do camarão','teste4','2021-09-24','Filtros Inerciais sujos','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'6144ef57863f7'),(122,'West Shopping','Bobs','André Guimarães','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616ea7592f4c0'),(123,'West Shopping','Bobs','André Guimarães','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616eaadcd4b36'),(124,'West Shopping','Bobs','André Guimarães','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616eab1e43d5f'),(125,'West Shopping','Bobs','André Guimarães','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616eab8ce4e7c'),(126,'West Shopping','Bobs','André Guimarães','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616eabaab1d3f'),(127,'West Shopping','Bobs','André Guimarães','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616f0e23ea01e'),(128,'Recreio Shopping','BK','teste','2021-10-19','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'616f0e318cfad'),(129,'West Shopping','Bobs','André Guimarães','2021-10-26','Filtros Inerciais ok','Lavador de gases ok','Duto ok','Exaustor ok','Central ok','Cilindro ok','Cilindro ok','Damper corta-fogo acionado','Exaustor desarmou',NULL,'617817ad5831d');
/*!40000 ALTER TABLE `equipamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loja`
--

DROP TABLE IF EXISTS `loja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loja` (
  `idLoja` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(20) DEFAULT NULL,
  `CNPJ` varchar(18) DEFAULT NULL,
  `pessoaContato` varchar(20) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `shopping` varchar(20) DEFAULT NULL,
  `id_Shop` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLoja`),
  KEY `fk_id_Shop` (`id_Shop`),
  CONSTRAINT `fk_id_Shop` FOREIGN KEY (`id_Shop`) REFERENCES `shop` (`idShop`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loja`
--

LOCK TABLES `loja` WRITE;
/*!40000 ALTER TABLE `loja` DISABLE KEYS */;
INSERT INTO `loja` VALUES (16,'Bobs','31.313.131/3131-31','Manoleste','(13) 13131-1313','bobs@gmail.com','West Shopping',11),(17,'BK','13.131.313/1313-13','fjvnjnf','(11) 51515-1515','kfmvkf@gmail.com','Recreio Shopping',12),(18,'outback','13.131.313/1313-11','mvdfvkdj','(12) 12121-2121','fbhdf@gmail.com','Park Shopping',13);
/*!40000 ALTER TABLE `loja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `idShop` int(11) NOT NULL AUTO_INCREMENT,
  `razaoSocial` varchar(50) DEFAULT NULL,
  `nomeFantasia` varchar(20) DEFAULT NULL,
  `CNPJ` varchar(18) DEFAULT NULL,
  `pessoaContato` varchar(20) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(14) DEFAULT NULL,
  `ativo_shop` char(1) DEFAULT NULL,
  PRIMARY KEY (`idShop`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (11,'CONDOMINIO DO WEST SHOPPING - RIO','West Shopping','01.946.522/0001-43','Marcio Andrade','(21) 9856-8741','mandrade@gmail.com','EST DO MENDANHA, 555','CAMPO GRANDE','Rio de Janeiro','RJ','23.097-003','1'),(12,'Condominio Recreio Shopping Center','Recreio Shopping','02.210.210/0001-30','Julio da Costa','(21) 9652-3345','jcosta@gmail.com','AVENIDA DAS AMERICAS/19019','REC DOS BANDEIRANTES','Rio de Janeiro','RJ','22.790-851','1'),(13,'PARKSHOPPING CAMPO GRANDE LTDA','Park Shopping','13.511.181/0001-62','Luana Pinheiro','(21) 9525-6685','lpinheiro@gmail.com','Estrada do Monteiro, 1200','CAMPO GRANDE','Rio de Janeiro','RJ','23.045-830','1');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(14) DEFAULT NULL,
  `adm` int(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (18,'andregtst@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','André Guimarães','(21) 99784-0683','128.654.147-60','Rua Lucia Rocha Vanderlei','Itaguaí','RJ','23.820-430',1),(19,'teste@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','teste','(21) 99784-0000','212.121.212-12','teste','teste','RJ','23.097-003',0),(20,'teste1@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','teste1','(21) 99784-0000','212.121.212-12','teste1','teste1','RJ','22.790-851',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-26 12:01:35
