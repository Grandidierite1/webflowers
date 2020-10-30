/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : floricultura

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 22/11/2019 00:30:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_cliente
-- ----------------------------
DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE `tb_cliente`  (
  `COD_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CLIENTE` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RG_CLIENTE` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CPF_CLIENTE` char(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RUA_CLIENTE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NUM_CLIENTE` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `BAIRRO_CLIENTE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CIDADE_CLIENTE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ESTADO_CLIENTE` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `EMAIL_CLIENTE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TEL_CLIENTE` char(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CEL_CLIENTE` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DATA_NASC_CLIENTE` date NOT NULL,
  `DATA_CAD_CLIENTE` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `CEP_CLIENTE` char(9) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `COMPLEMENTO_CLIENTE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`COD_CLIENTE`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_cliente
-- ----------------------------
INSERT INTO `tb_cliente` VALUES (1, 'Andre', '53.536.180-4', '458.785.788-24', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'andregonzaga@gmail.com', '(11)3492-0094', '(11)98496-8814', '1998-03-31', '2019-11-21 17:57:53', '09664-000', 'Bloco 2 Apto 81');
INSERT INTO `tb_cliente` VALUES (2, 'Jose', '12.345.678-9', '123.456.789-77', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'andre@gmail.com', '', '(11)11111-1111', '1998-03-31', '2019-11-21 18:04:46', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (3, 'andre', '55.555.555-5', '555.555.555-55', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'andre', '(11)1111-1111', '(22)22222-2222', '1998-03-31', '2019-11-21 18:49:13', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (4, 'aaaa', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaaa', '', '(11)11111-1111', '2019-11-12', '2019-11-21 19:13:43', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (5, 'aaaa', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaaa', '', '(11)11111-1111', '2019-11-12', '2019-11-21 19:14:04', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (6, 'aaaa', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaaa', '', '(11)11111-1111', '2019-11-12', '2019-11-21 19:15:19', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (7, 'aaaa', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaaa', '', '(11)11111-1111', '2019-11-12', '2019-11-21 19:15:20', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (8, 'aaaa', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaaa', '', '(11)11111-1111', '2019-11-12', '2019-11-21 19:15:27', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (9, 'aaaa', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaaa', '', '(11)11111-1111', '2019-11-12', '2019-11-21 19:43:28', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (10, 'abc', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaa', '(11)1111-1111', '(22)22222-2222', '1998-03-31', '2019-11-21 20:13:27', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (11, 'abc', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaa', '(11)1111-1111', '(22)22222-2222', '1998-03-31', '2019-11-21 20:13:58', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (12, 'abc', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaa', '(11)1111-1111', '(22)22222-2222', '1998-03-31', '2019-11-21 20:14:33', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (13, 'abc', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaa', '(11)1111-1111', '(22)22222-2222', '1998-03-31', '2019-11-21 20:14:54', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (14, 'abc', '11.111.111-1', '111.111.111-11', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaaaa', '(11)1111-1111', '(22)22222-2222', '1998-03-31', '2019-11-21 20:15:11', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (15, 'Andre Gonzaga', '53.536.180-4', '458.785.788-24', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'andregonzaga@live.com', '', '(11)98496-8814', '1998-03-31', '2019-11-21 22:10:22', '09664-000', 'Bloco 2 Apto 81');
INSERT INTO `tb_cliente` VALUES (16, 'Andre Gonzaga', '53.536.180-4', '458.785.788-24', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaa', '', '(11)98496-8814', '2010-10-10', '2019-11-21 22:12:16', '09664-000', '');
INSERT INTO `tb_cliente` VALUES (17, 'Andre ', '53.536.180-4', '458.785.788-24', 'Rua Doutor Vital Brasil', '241', 'Taboão', 'São Bernardo do Campo', 'SP', 'aaaa', '', '(11)11111-1111', '1910-11-11', '2019-11-21 22:13:18', '09664-000', '');

-- ----------------------------
-- Table structure for tb_forn
-- ----------------------------
DROP TABLE IF EXISTS `tb_forn`;
CREATE TABLE `tb_forn`  (
  `COD_FORN` int(11) NOT NULL,
  `DATA_CAD_FORN` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `RUA_FORN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NUM_FORN` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `COMP_FORN` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BAIRRO_FORN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CIDADE_FORN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ESTADO_FORN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `EMAIL_FORN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TEL1_FORN` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TEL2_FORN` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CEP_FORN` char(9) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `VALOR_KIT` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`COD_FORN`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_forn
-- ----------------------------
INSERT INTO `tb_forn` VALUES (1, '2019-11-21 19:35:41', 'aaaa', '2411', '2411', 'aaaa', 'aaaa', 'sp', 'aaaaa', '1198496881', '1198496881', '09664000', '10000');

-- ----------------------------
-- Table structure for tb_kit
-- ----------------------------
DROP TABLE IF EXISTS `tb_kit`;
CREATE TABLE `tb_kit`  (
  `COD_KIT` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_KIT` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `COD_FORN` int(11) NOT NULL,
  `DES_KIT` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`COD_KIT`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kit
-- ----------------------------
INSERT INTO `tb_kit` VALUES (1, 'Basico - Forn 1', 1, 'Flores 1');
INSERT INTO `tb_kit` VALUES (2, 'Basico - Forn 2', 2, 'Flores Topzada');

-- ----------------------------
-- Table structure for tb_venda
-- ----------------------------
DROP TABLE IF EXISTS `tb_venda`;
CREATE TABLE `tb_venda`  (
  `COD_VENDA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_CLIENTE` int(11) NOT NULL,
  `COD_KIT` int(11) NOT NULL,
  `COD_FORN` int(11) NOT NULL,
  `DATA_VENDA` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `VALOR_VENDA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ENDERECO_ENTREGA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DATA_EVENTO` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`COD_VENDA`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_venda
-- ----------------------------
INSERT INTO `tb_venda` VALUES (1, 14, 1, 1, '2019-11-21 20:15:11', '10000', NULL, NULL);
INSERT INTO `tb_venda` VALUES (2, 15, 1, 1, '2019-11-21 22:10:22', '10000', NULL, NULL);
INSERT INTO `tb_venda` VALUES (3, 16, 1, 1, '2019-11-21 22:12:16', '10000', NULL, NULL);
INSERT INTO `tb_venda` VALUES (4, 17, 1, 1, '2019-11-21 22:13:18', '10000', NULL, NULL);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ativo` int(1) NULL DEFAULT 1,
  `data_cadastro` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `nAcesso` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'Administrador', '123', 1, '2019-10-24 10:40:54.586413', 1);
INSERT INTO `usuarios` VALUES (2, 'Funcionario', '123', 1, '2019-11-05 12:38:48.273720', 1);

SET FOREIGN_KEY_CHECKS = 1;
