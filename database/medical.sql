-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2018 at 07:05 PM
-- Server version: 5.7.20-log
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
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefit_claim`
--

CREATE TABLE `benefit_claim` (
  `benClmId` int(11) NOT NULL,
  `benClmKode` varchar(255) DEFAULT NULL,
  `benClmEmpId` int(11) DEFAULT NULL,
  `benClmApproveBy` int(11) DEFAULT NULL,
  `benClmNominalApprove` decimal(20,2) DEFAULT NULL,
  `benClmApproveStatus` enum('0','1') DEFAULT NULL,
  `benClmApproveNote` varchar(255) DEFAULT NULL,
  `benClmTanggal` date DEFAULT NULL,
  `benClmSubmitStatus` enum('0','1') DEFAULT '0' COMMENT '0=save,1=confirm',
  `benClmCancel` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_claim`
--

INSERT INTO `benefit_claim` (`benClmId`, `benClmKode`, `benClmEmpId`, `benClmApproveBy`, `benClmNominalApprove`, `benClmApproveStatus`, `benClmApproveNote`, `benClmTanggal`, `benClmSubmitStatus`, `benClmCancel`) VALUES
(165, '1808/48/1', 48, NULL, NULL, NULL, NULL, '2018-08-07', '1', NULL),
(166, '1808/54/1', 54, NULL, NULL, NULL, NULL, '2018-08-07', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_claim_det`
--

CREATE TABLE `benefit_claim_det` (
  `benClmDetId` int(11) NOT NULL,
  `benClmDetMasterId` int(11) DEFAULT NULL,
  `benClmDetEmpBenId` int(11) DEFAULT NULL,
  `benClmNominal` decimal(20,2) DEFAULT NULL,
  `benClmPathFile` varchar(255) DEFAULT NULL,
  `benClmDetFile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_claim_det`
--

INSERT INTO `benefit_claim_det` (`benClmDetId`, `benClmDetMasterId`, `benClmDetEmpBenId`, `benClmNominal`, `benClmPathFile`, `benClmDetFile`) VALUES
(236, 165, 7357, '944000.00', NULL, NULL),
(237, 166, 7398, '5625000.00', NULL, NULL),
(238, 166, 7401, '5000000.00', NULL, NULL),
(239, 166, 7402, '1500000.00', NULL, NULL),
(240, 166, 7399, '10800000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day_off`
--

CREATE TABLE `day_off` (
  `dayOffId` int(11) NOT NULL,
  `dayOffTanggal` date DEFAULT NULL,
  `dayOffKeterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_off`
--

INSERT INTO `day_off` (`dayOffId`, `dayOffTanggal`, `dayOffKeterangan`) VALUES
(1081, '2018-01-06', 'weekend'),
(1082, '2018-01-07', 'weekend'),
(1083, '2018-01-13', 'weekend'),
(1084, '2018-01-14', 'weekend'),
(1085, '2018-01-20', 'weekend'),
(1086, '2018-01-21', 'weekend'),
(1087, '2018-01-27', 'weekend'),
(1088, '2018-01-28', 'weekend'),
(1089, '2018-02-03', 'weekend'),
(1090, '2018-02-04', 'weekend'),
(1091, '2018-02-10', 'weekend'),
(1092, '2018-02-11', 'weekend'),
(1093, '2018-02-17', 'weekend'),
(1094, '2018-02-18', 'weekend'),
(1095, '2018-02-24', 'weekend'),
(1096, '2018-02-25', 'weekend'),
(1097, '2018-03-03', 'weekend'),
(1098, '2018-03-04', 'weekend'),
(1099, '2018-03-10', 'weekend'),
(1100, '2018-03-11', 'weekend'),
(1101, '2018-03-17', 'weekend'),
(1102, '2018-03-18', 'weekend'),
(1103, '2018-03-24', 'weekend'),
(1104, '2018-03-25', 'weekend'),
(1105, '2018-03-31', 'weekend'),
(1106, '2018-04-01', 'weekend'),
(1107, '2018-04-07', 'weekend'),
(1108, '2018-04-08', 'weekend'),
(1109, '2018-04-14', 'weekend'),
(1110, '2018-04-15', 'weekend'),
(1111, '2018-04-21', 'weekend'),
(1112, '2018-04-22', 'weekend'),
(1113, '2018-04-28', 'weekend'),
(1114, '2018-04-29', 'weekend'),
(1115, '2018-05-05', 'weekend'),
(1116, '2018-05-06', 'weekend'),
(1117, '2018-05-12', 'weekend'),
(1118, '2018-05-13', 'weekend'),
(1119, '2018-05-19', 'weekend'),
(1120, '2018-05-20', 'weekend'),
(1121, '2018-05-26', 'weekend'),
(1122, '2018-05-27', 'weekend'),
(1123, '2018-06-02', 'weekend'),
(1124, '2018-06-03', 'weekend'),
(1125, '2018-06-09', 'weekend'),
(1126, '2018-06-10', 'weekend'),
(1127, '2018-06-16', 'weekend'),
(1128, '2018-06-17', 'weekend'),
(1129, '2018-06-23', 'weekend'),
(1130, '2018-06-24', 'weekend'),
(1131, '2018-06-30', 'weekend'),
(1132, '2018-07-01', 'weekend'),
(1133, '2018-07-07', 'weekend'),
(1134, '2018-07-08', 'weekend'),
(1135, '2018-07-14', 'weekend'),
(1136, '2018-07-15', 'weekend'),
(1137, '2018-07-21', 'weekend'),
(1138, '2018-07-22', 'weekend'),
(1139, '2018-07-28', 'weekend'),
(1140, '2018-07-29', 'weekend'),
(1141, '2018-08-04', 'weekend'),
(1142, '2018-08-05', 'weekend'),
(1143, '2018-08-11', 'weekend'),
(1144, '2018-08-12', 'weekend'),
(1145, '2018-08-18', 'weekend'),
(1146, '2018-08-19', 'weekend'),
(1147, '2018-08-25', 'weekend'),
(1148, '2018-08-26', 'weekend'),
(1149, '2018-09-01', 'weekend'),
(1150, '2018-09-02', 'weekend'),
(1151, '2018-09-08', 'weekend'),
(1152, '2018-09-09', 'weekend'),
(1153, '2018-09-15', 'weekend'),
(1154, '2018-09-16', 'weekend'),
(1155, '2018-09-22', 'weekend'),
(1156, '2018-09-23', 'weekend'),
(1157, '2018-09-29', 'weekend'),
(1158, '2018-09-30', 'weekend'),
(1159, '2018-10-06', 'weekend'),
(1160, '2018-10-07', 'weekend'),
(1161, '2018-10-13', 'weekend'),
(1162, '2018-10-14', 'weekend'),
(1163, '2018-10-20', 'weekend'),
(1164, '2018-10-21', 'weekend'),
(1165, '2018-10-27', 'weekend'),
(1166, '2018-10-28', 'weekend'),
(1167, '2018-11-03', 'weekend'),
(1168, '2018-11-04', 'weekend'),
(1169, '2018-11-10', 'weekend'),
(1170, '2018-11-11', 'weekend'),
(1171, '2018-11-17', 'weekend'),
(1172, '2018-11-18', 'weekend'),
(1173, '2018-11-24', 'weekend'),
(1174, '2018-11-25', 'weekend'),
(1175, '2018-12-01', 'weekend'),
(1176, '2018-12-02', 'weekend'),
(1177, '2018-12-08', 'weekend'),
(1178, '2018-12-09', 'weekend'),
(1179, '2018-12-15', 'weekend'),
(1180, '2018-12-16', 'weekend'),
(1181, '2018-12-22', 'weekend'),
(1182, '2018-12-23', 'weekend'),
(1183, '2018-12-29', 'weekend'),
(1184, '2018-12-30', 'weekend'),
(1185, '2019-01-05', 'weekend'),
(1186, '2019-01-06', 'weekend'),
(1187, '2019-01-12', 'weekend'),
(1188, '2019-01-13', 'weekend'),
(1189, '2019-01-19', 'weekend'),
(1190, '2019-01-20', 'weekend'),
(1191, '2019-01-26', 'weekend'),
(1192, '2019-01-27', 'weekend'),
(1193, '2019-02-02', 'weekend'),
(1194, '2019-02-03', 'weekend'),
(1195, '2019-02-09', 'weekend'),
(1196, '2019-02-10', 'weekend'),
(1197, '2019-02-16', 'weekend'),
(1198, '2019-02-17', 'weekend'),
(1199, '2019-02-23', 'weekend'),
(1200, '2019-02-24', 'weekend'),
(1201, '2019-03-02', 'weekend'),
(1202, '2019-03-03', 'weekend'),
(1203, '2019-03-09', 'weekend'),
(1204, '2019-03-10', 'weekend'),
(1205, '2019-03-16', 'weekend'),
(1206, '2019-03-17', 'weekend'),
(1207, '2019-03-23', 'weekend'),
(1208, '2019-03-24', 'weekend'),
(1209, '2019-03-30', 'weekend'),
(1210, '2019-03-31', 'weekend'),
(1211, '2019-04-06', 'weekend'),
(1212, '2019-04-07', 'weekend'),
(1213, '2019-04-13', 'weekend'),
(1214, '2019-04-14', 'weekend'),
(1215, '2019-04-20', 'weekend'),
(1216, '2019-04-21', 'weekend'),
(1217, '2019-04-27', 'weekend'),
(1218, '2019-04-28', 'weekend'),
(1219, '2019-05-04', 'weekend'),
(1220, '2019-05-05', 'weekend'),
(1221, '2019-05-11', 'weekend'),
(1222, '2019-05-12', 'weekend'),
(1223, '2019-05-18', 'weekend'),
(1224, '2019-05-19', 'weekend'),
(1225, '2019-05-25', 'weekend'),
(1226, '2019-05-26', 'weekend'),
(1227, '2019-06-01', 'weekend'),
(1228, '2019-06-02', 'weekend'),
(1229, '2019-06-08', 'weekend'),
(1230, '2019-06-09', 'weekend'),
(1231, '2019-06-15', 'weekend'),
(1232, '2019-06-16', 'weekend'),
(1233, '2019-06-22', 'weekend'),
(1234, '2019-06-23', 'weekend'),
(1235, '2019-06-29', 'weekend'),
(1236, '2019-06-30', 'weekend'),
(1237, '2019-07-06', 'weekend'),
(1238, '2019-07-07', 'weekend'),
(1239, '2019-07-13', 'weekend'),
(1240, '2019-07-14', 'weekend'),
(1241, '2019-07-20', 'weekend'),
(1242, '2019-07-21', 'weekend'),
(1243, '2019-07-27', 'weekend'),
(1244, '2019-07-28', 'weekend'),
(1245, '2019-08-03', 'weekend'),
(1246, '2019-08-04', 'weekend'),
(1247, '2019-08-10', 'weekend'),
(1248, '2019-08-11', 'weekend'),
(1249, '2019-08-17', 'weekend'),
(1250, '2019-08-18', 'weekend'),
(1251, '2019-08-24', 'weekend'),
(1252, '2019-08-25', 'weekend'),
(1253, '2019-08-31', 'weekend'),
(1254, '2019-09-01', 'weekend'),
(1255, '2019-09-07', 'weekend'),
(1256, '2019-09-08', 'weekend'),
(1257, '2019-09-14', 'weekend'),
(1258, '2019-09-15', 'weekend'),
(1259, '2019-09-21', 'weekend'),
(1260, '2019-09-22', 'weekend'),
(1261, '2019-09-28', 'weekend'),
(1262, '2019-09-29', 'weekend'),
(1263, '2019-10-05', 'weekend'),
(1264, '2019-10-06', 'weekend'),
(1265, '2019-10-12', 'weekend'),
(1266, '2019-10-13', 'weekend'),
(1267, '2019-10-19', 'weekend'),
(1268, '2019-10-20', 'weekend'),
(1269, '2019-10-26', 'weekend'),
(1270, '2019-10-27', 'weekend'),
(1271, '2019-11-02', 'weekend'),
(1272, '2019-11-03', 'weekend'),
(1273, '2019-11-09', 'weekend'),
(1274, '2019-11-10', 'weekend'),
(1275, '2019-11-16', 'weekend'),
(1276, '2019-11-17', 'weekend'),
(1277, '2019-11-23', 'weekend'),
(1278, '2019-11-24', 'weekend'),
(1279, '2019-11-30', 'weekend'),
(1280, '2019-12-01', 'weekend'),
(1281, '2019-12-07', 'weekend'),
(1282, '2019-12-08', 'weekend'),
(1283, '2019-12-14', 'weekend'),
(1284, '2019-12-15', 'weekend'),
(1285, '2019-12-21', 'weekend'),
(1286, '2019-12-22', 'weekend'),
(1287, '2019-12-28', 'weekend'),
(1288, '2019-12-29', 'weekend'),
(1289, '2020-01-04', 'weekend'),
(1290, '2020-01-05', 'weekend'),
(1291, '2020-01-11', 'weekend'),
(1292, '2020-01-12', 'weekend'),
(1293, '2020-01-18', 'weekend'),
(1294, '2020-01-19', 'weekend'),
(1295, '2020-01-25', 'weekend'),
(1296, '2020-01-26', 'weekend'),
(1297, '2020-02-01', 'weekend'),
(1298, '2020-02-02', 'weekend'),
(1299, '2020-02-08', 'weekend'),
(1300, '2020-02-09', 'weekend'),
(1301, '2020-02-15', 'weekend'),
(1302, '2020-02-16', 'weekend'),
(1303, '2020-02-22', 'weekend'),
(1304, '2020-02-23', 'weekend'),
(1305, '2020-02-29', 'weekend'),
(1306, '2020-03-01', 'weekend'),
(1307, '2020-03-07', 'weekend'),
(1308, '2020-03-08', 'weekend'),
(1309, '2020-03-14', 'weekend'),
(1310, '2020-03-15', 'weekend'),
(1311, '2020-03-21', 'weekend'),
(1312, '2020-03-22', 'weekend'),
(1313, '2020-03-28', 'weekend'),
(1314, '2020-03-29', 'weekend'),
(1315, '2020-04-04', 'weekend'),
(1316, '2020-04-05', 'weekend'),
(1317, '2020-04-11', 'weekend'),
(1318, '2020-04-12', 'weekend'),
(1319, '2020-04-18', 'weekend'),
(1320, '2020-04-19', 'weekend'),
(1321, '2020-04-25', 'weekend'),
(1322, '2020-04-26', 'weekend'),
(1323, '2020-05-02', 'weekend'),
(1324, '2020-05-03', 'weekend'),
(1325, '2020-05-09', 'weekend'),
(1326, '2020-05-10', 'weekend'),
(1327, '2020-05-16', 'weekend'),
(1328, '2020-05-17', 'weekend'),
(1329, '2020-05-23', 'weekend'),
(1330, '2020-05-24', 'weekend'),
(1331, '2020-05-30', 'weekend'),
(1332, '2020-05-31', 'weekend'),
(1333, '2020-06-06', 'weekend'),
(1334, '2020-06-07', 'weekend'),
(1335, '2020-06-13', 'weekend'),
(1336, '2020-06-14', 'weekend'),
(1337, '2020-06-20', 'weekend'),
(1338, '2020-06-21', 'weekend'),
(1339, '2020-06-27', 'weekend'),
(1340, '2020-06-28', 'weekend'),
(1341, '2020-07-04', 'weekend'),
(1342, '2020-07-05', 'weekend'),
(1343, '2020-07-11', 'weekend'),
(1344, '2020-07-12', 'weekend'),
(1345, '2020-07-18', 'weekend'),
(1346, '2020-07-19', 'weekend'),
(1347, '2020-07-25', 'weekend'),
(1348, '2020-07-26', 'weekend'),
(1349, '2020-08-01', 'weekend'),
(1350, '2020-08-02', 'weekend'),
(1351, '2020-08-08', 'weekend'),
(1352, '2020-08-09', 'weekend'),
(1353, '2020-08-15', 'weekend'),
(1354, '2020-08-16', 'weekend'),
(1355, '2020-08-22', 'weekend'),
(1356, '2020-08-23', 'weekend'),
(1357, '2020-08-29', 'weekend'),
(1358, '2020-08-30', 'weekend'),
(1359, '2020-09-05', 'weekend'),
(1360, '2020-09-06', 'weekend'),
(1361, '2020-09-12', 'weekend'),
(1362, '2020-09-13', 'weekend'),
(1363, '2020-09-19', 'weekend'),
(1364, '2020-09-20', 'weekend'),
(1365, '2020-09-26', 'weekend'),
(1366, '2020-09-27', 'weekend'),
(1367, '2020-10-03', 'weekend'),
(1368, '2020-10-04', 'weekend'),
(1369, '2020-10-10', 'weekend'),
(1370, '2020-10-11', 'weekend'),
(1371, '2020-10-17', 'weekend'),
(1372, '2020-10-18', 'weekend'),
(1373, '2020-10-24', 'weekend'),
(1374, '2020-10-25', 'weekend'),
(1375, '2020-10-31', 'weekend'),
(1376, '2020-11-01', 'weekend'),
(1377, '2020-11-07', 'weekend'),
(1378, '2020-11-08', 'weekend'),
(1379, '2020-11-14', 'weekend'),
(1380, '2020-11-15', 'weekend'),
(1381, '2020-11-21', 'weekend'),
(1382, '2020-11-22', 'weekend'),
(1383, '2020-11-28', 'weekend'),
(1384, '2020-11-29', 'weekend'),
(1385, '2020-12-05', 'weekend'),
(1386, '2020-12-06', 'weekend'),
(1387, '2020-12-12', 'weekend'),
(1388, '2020-12-13', 'weekend'),
(1389, '2020-12-19', 'weekend'),
(1390, '2020-12-20', 'weekend'),
(1391, '2020-12-26', 'weekend'),
(1392, '2020-12-27', 'weekend'),
(1393, '2021-01-02', 'weekend'),
(1394, '2021-01-03', 'weekend'),
(1395, '2021-01-09', 'weekend'),
(1396, '2021-01-10', 'weekend'),
(1397, '2021-01-16', 'weekend'),
(1398, '2021-01-17', 'weekend'),
(1399, '2021-01-23', 'weekend'),
(1400, '2021-01-24', 'weekend'),
(1401, '2021-01-30', 'weekend'),
(1402, '2021-01-31', 'weekend'),
(1403, '2021-02-06', 'weekend'),
(1404, '2021-02-07', 'weekend'),
(1405, '2021-02-13', 'weekend'),
(1406, '2021-02-14', 'weekend'),
(1407, '2021-02-20', 'weekend'),
(1408, '2021-02-21', 'weekend'),
(1409, '2021-02-27', 'weekend'),
(1410, '2021-02-28', 'weekend'),
(1411, '2021-03-06', 'weekend'),
(1412, '2021-03-07', 'weekend'),
(1413, '2021-03-13', 'weekend'),
(1414, '2021-03-14', 'weekend'),
(1415, '2021-03-20', 'weekend'),
(1416, '2021-03-21', 'weekend'),
(1417, '2021-03-27', 'weekend'),
(1418, '2021-03-28', 'weekend'),
(1419, '2021-04-03', 'weekend'),
(1420, '2021-04-04', 'weekend'),
(1421, '2021-04-10', 'weekend'),
(1422, '2021-04-11', 'weekend'),
(1423, '2021-04-17', 'weekend'),
(1424, '2021-04-18', 'weekend'),
(1425, '2021-04-24', 'weekend'),
(1426, '2021-04-25', 'weekend'),
(1427, '2021-05-01', 'weekend'),
(1428, '2021-05-02', 'weekend'),
(1429, '2021-05-08', 'weekend'),
(1430, '2021-05-09', 'weekend'),
(1431, '2021-05-15', 'weekend'),
(1432, '2021-05-16', 'weekend'),
(1433, '2021-05-22', 'weekend'),
(1434, '2021-05-23', 'weekend'),
(1435, '2021-05-29', 'weekend'),
(1436, '2021-05-30', 'weekend'),
(1437, '2021-06-05', 'weekend'),
(1438, '2021-06-06', 'weekend'),
(1439, '2021-06-12', 'weekend'),
(1440, '2021-06-13', 'weekend'),
(1441, '2021-06-19', 'weekend'),
(1442, '2021-06-20', 'weekend'),
(1443, '2021-06-26', 'weekend'),
(1444, '2021-06-27', 'weekend'),
(1445, '2021-07-03', 'weekend'),
(1446, '2021-07-04', 'weekend'),
(1447, '2021-07-10', 'weekend'),
(1448, '2021-07-11', 'weekend'),
(1449, '2021-07-17', 'weekend'),
(1450, '2021-07-18', 'weekend'),
(1451, '2017-07-29', ''),
(1452, '2017-07-01', ''),
(1453, '2017-07-08', ''),
(1454, '2017-07-15', ''),
(1455, '2017-07-22', ''),
(1456, '2017-07-02', ''),
(1457, '2017-07-09', ''),
(1458, '2017-07-16', ''),
(1459, '2017-07-23', ''),
(1460, '2017-07-30', ''),
(1461, '2017-08-05', ''),
(1462, '2017-08-12', ''),
(1463, '2017-08-19', ''),
(1464, '2017-08-26', ''),
(1465, '2017-08-06', ''),
(1466, '2017-08-13', ''),
(1467, '2017-08-20', ''),
(1468, '2017-08-27', ''),
(1469, '2017-09-02', ''),
(1470, '2017-09-09', ''),
(1471, '2017-09-16', ''),
(1472, '2017-09-23', ''),
(1473, '2017-09-30', ''),
(1474, '2017-09-03', ''),
(1475, '2017-09-10', ''),
(1476, '2017-09-17', ''),
(1477, '2017-09-24', ''),
(1480, '2018-01-01', 'New Year'),
(1481, '2018-02-16', 'New Year'),
(1482, '2018-03-30', 'New Year'),
(1483, '2018-05-01', 'New Year'),
(1484, '2018-05-10', 'New Year'),
(1485, '2018-05-29', 'New Year'),
(1486, '2018-06-01', 'New Year'),
(1487, '2018-06-15', 'New Year'),
(1488, '2018-08-17', 'New Year'),
(1489, '2018-08-22', 'New Year'),
(1490, '2018-09-11', 'New Year'),
(1491, '2018-11-20', 'New Year'),
(1492, '2018-12-25', 'New Year');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empId` int(11) NOT NULL,
  `empNo` varchar(255) DEFAULT NULL,
  `empNoFormatted` varchar(255) DEFAULT NULL,
  `empEmail` varchar(255) DEFAULT NULL,
  `empNama` varchar(255) DEFAULT NULL,
  `empBirthday` date DEFAULT NULL,
  `empJoinedDate` date DEFAULT NULL,
  `empOfficeId` int(11) DEFAULT NULL,
  `empJobStId` int(11) DEFAULT NULL,
  `empGender` enum('M','F') DEFAULT 'M',
  `empPeriod` int(11) DEFAULT NULL COMMENT 'Lama kontrak dalam bulan',
  `empMrgSt` int(11) DEFAULT NULL,
  `empStatus` enum('0','1') DEFAULT '1' COMMENT 'Status aktif',
  `empParentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `empNo`, `empNoFormatted`, `empEmail`, `empNama`, `empBirthday`, `empJoinedDate`, `empOfficeId`, `empJobStId`, `empGender`, `empPeriod`, `empMrgSt`, `empStatus`, `empParentId`) VALUES
(48, '56565', '0056565', 'fitri@gmail.com', 'Fitri S. Lubis', '1969-11-24', '2004-05-17', 2, 1, 'F', 0, 2, '1', NULL),
(49, '57440', '0057440', 'dicky@gmail.com', 'Dicky Susanto', '1971-12-02', '1997-09-15', 2, 1, 'M', 0, 2, '1', NULL),
(50, '60220', '0060220', 'imron@gmail.com', 'Imron Rosadi', '1968-03-25', '2001-06-15', 2, 1, 'M', 0, 2, '1', NULL),
(53, '62453', '0062453', 'tri@gmail.com', 'Tri Arwani P. Soekirman', '1962-11-10', '2003-07-14', 2, 1, 'M', 0, 1, '1', NULL),
(54, '62658', '0062658', 'annasri@gmail.com', 'Annasri Gani', '1979-06-29', '2003-12-01', 2, 1, 'M', 0, 2, '1', NULL),
(55, '63027', '0063027', 'purnomo@gmail.com', 'Purnomo', '1973-05-15', '2002-10-01', 3, 1, 'M', 0, 2, '1', NULL),
(56, '63081', '0063081', 'ivo@gmail.com', 'Ivo Kesuma Sari Panggabean', '1971-06-26', '2003-11-01', 1, 1, 'F', 0, 2, '1', NULL),
(57, '63286', '0063286', 'edy@gmail.com', 'Edy Soediyono', '1969-11-01', '2003-01-06', 7, 1, 'M', 0, 2, '1', NULL),
(58, '63289', '0063289', 'suharyo@gmail.com', 'Suharyo', '1967-08-10', '2003-01-02', 2, 1, 'M', 0, 2, '1', NULL),
(59, '63849', '0063849', 'taufiq@gmail.com', 'Taufiq Hidayat', '1970-06-30', '2004-11-10', 7, 1, 'M', 0, 2, '1', NULL),
(60, '66035', '0066035', 'matias@gmail.com', 'Matias Ruben', '1975-03-19', '2007-02-19', 3, 1, 'M', 0, 2, '1', NULL),
(61, '67049', '0067049', 'alie@gmail.com', 'Alie Syopyan', '1972-10-01', '2008-03-24', 7, 1, 'M', 0, 2, '1', NULL),
(62, '67496', '0067496', 'kumi@gmail.com', 'Kumiawan Fahmi', '1971-02-15', '2008-08-16', 2, 1, 'M', 0, 2, '1', NULL),
(63, '67541', '0067541', 'arif@gmail.com', 'La Ode Arifudin', '1977-04-09', '2008-08-25', 4, 1, 'M', 0, 2, '1', NULL),
(64, '67672', '0067672', 'juanita@gmail.com', 'Juanita Ann Kariata Kaligis', '1970-11-26', '2008-11-16', 2, 1, 'F', 0, 1, '1', NULL),
(65, '67746', '0067746', 'salomina@gmail.com', 'Salomina Jubelina Tjoe', '1980-06-19', '2009-01-01', 5, 1, 'F', 0, 1, '1', NULL),
(66, '85024', '0085024', 'aan@gmail.com', 'Aan Pryatna', '1981-04-16', '2005-04-01', 2, 1, 'M', 0, 2, '1', NULL),
(67, '85028', '0085028', 'lukas@gmail.com', 'Lukas Rumetna', '1967-05-22', '2005-04-01', 5, 1, 'M', 0, 2, '1', NULL),
(68, '85136', '0085136', 'achmad@gmail.com', 'Achmad Faisal Kairupan', '1971-08-14', '2013-03-01', 3, 2, 'M', 12, 2, '1', NULL),
(69, '85137', '0085137', 'bachrun@gmail.com', 'H. M. Bachrun Idris', '1954-07-12', '2006-01-13', 2, 1, 'M', 0, 1, '1', NULL),
(70, '85143', '0085143', 'niel@gmail.com', 'Niel Makinuddin', '1965-10-15', '2006-01-23', 7, 1, 'M', 0, 2, '1', NULL),
(71, '85180', '0085180', 'stanley@gmail.com', 'Stanley Mathew Rajagukguk', '1957-11-06', '2006-05-01', 3, 1, 'M', 0, 2, '1', NULL),
(73, '85190', '0085190', 'Imran@gmail.com', 'M. Imran Amin', '1973-03-03', '2006-06-01', 2, 1, 'M', 0, 2, '1', NULL),
(74, '67789', '0067789', 'bambang@gmail.com', 'Bambang Wahyudi', '1963-07-04', '2009-01-21', 3, 2, 'M', 12, 2, '1', NULL),
(76, '67913', '0067913', 'wahjudi@gmail.com', 'Wahjudi Wardojo', '1950-07-22', '2009-04-30', 2, 1, 'M', 0, 2, '1', NULL),
(77, '68271', '0068271', 'zufahri@gmail.com', 'Zufahri Halomoan Siagian', '1978-11-01', '2010-01-08', 5, 1, 'M', 0, 2, '1', NULL),
(78, '68300', '0068300', 'intan@gmail.com', 'Intan Sarah Dewi Ritonga', '1979-02-21', '2010-02-01', 2, 1, 'F', 0, 2, '1', NULL),
(79, '68299', '0068299', 'herlina@gmail.com', 'Herlina Hartanto', '1968-06-22', '2010-02-01', 2, 1, 'F', 0, 1, '1', NULL),
(80, '68407', '0068407', 'yusuf@gmail.com', 'Yusuf Fajariyanto', '1982-12-12', '2010-04-12', 6, 1, 'M', 0, 2, '1', NULL),
(81, '68410', '0068410', 'yohannes@gmail.com', 'Yohannes Maturbongs', '1962-11-23', '2010-04-05', 5, 1, 'M', 0, 2, '1', NULL),
(82, '68782', '0068782', 'sally@gmail.com', 'Sally Ingrid Kailola', '1971-11-25', '2010-09-16', 2, 1, 'M', 0, 1, '1', NULL),
(83, '68594', '0068594', 'asty@gmail.com', 'Asty Leonasty', '1968-08-07', '2010-07-01', 2, 1, 'F', 0, 2, '1', NULL),
(84, '68829', '0068829', 'rilya@gmail.com', 'Rilya A. Kansil', '1979-04-30', '2010-11-18', 2, 1, 'F', 0, 2, '1', NULL),
(85, '68937', '0068937', 'rizya@gmail.com', 'Rizya Legawa Ardiwijaya', '1972-06-07', '2011-01-17', 2, 2, 'M', 12, 2, '1', NULL),
(86, '69077', '0069077', 'rynal@gmail.com', 'Rynal May Fadly', '1977-05-16', '2011-03-30', 6, 2, 'M', 12, 1, '1', NULL),
(87, '69637', '0069637', 'dheny@gmail.com', 'Dheny Setyawan', '1974-09-11', '2011-10-18', 2, 2, 'M', 12, 2, '1', NULL),
(88, '69515', '0069515', 'agus@gmail.com', 'Agus Saripudin', '1986-08-15', '2011-08-01', 2, 1, 'M', 0, 1, '1', NULL),
(89, '70292', '0070292', 'anisa@gmail.com', 'Anisa Budiayu', '1979-08-03', '2012-08-06', 3, 2, 'F', 12, 1, '1', NULL),
(90, '70355', '0070355', 'ciicila@gmail.com', 'Cecilia Peggy Mariska', '1981-10-21', '2012-09-17', 2, 2, 'F', 12, 1, '1', NULL),
(91, '70359', '0070359', 'rizal@gmail.com', 'M. Rizal Algamar', '1971-07-17', '2012-10-15', 2, 1, 'M', 0, 2, '1', NULL),
(92, '63549', '0063549', 'ketut@gmail.com', 'Ni Ketut Wartiantini Nita', '1972-12-13', '2013-01-15', 1, 2, 'M', 12, 1, '1', NULL),
(93, '70471', '0070471', 'saipul@gmail.com', 'Saipul Rahman', '1975-10-07', '2012-11-26', 3, 2, 'M', 12, 2, '1', NULL),
(94, '70596', '0070596', 'delon@gmail.com', 'Delon Marthinus', '1980-02-01', '2013-02-25', 2, 2, 'M', 12, 2, '1', NULL),
(95, '70602', '0070602', 'glaudy@gmail.com', 'Glaudy Hendarsa Perdana', '1976-01-28', '2013-03-18', 2, 2, 'M', 12, 1, '1', NULL),
(96, '70631', '0070631', 'astrid@gmail.com', 'Astrid Candrasari', '1984-01-05', '2013-03-25', 2, 1, 'F', 0, 1, '1', NULL),
(97, '70634', '0070634', 'sutra@gmail.com', 'Sutraman', '1979-05-14', '2013-03-11', 2, 2, 'M', 12, 2, '1', NULL),
(98, '70710', '0070710', 'rizalbuk@gmail.com', 'Rizal Bukhari', '1959-11-21', '2013-04-15', 2, 2, 'M', 12, 2, '1', NULL),
(99, '70852', '0070852', 'jaka@gmail.com', 'R. Jaka Setia', '1978-07-06', '2018-08-03', 2, 2, 'M', 12, 2, '1', NULL),
(100, '70750', '0070750', 'diana@gmail.com', 'Diana Maria Ekarita Gessing', '1979-05-29', '2013-05-01', 6, 2, 'F', 12, 2, '1', NULL),
(102, '71153', '0071153', 'musnanda@gmail.com', 'Musnanda', '1969-08-26', '2013-08-01', 2, 2, 'M', 12, 2, '1', NULL),
(103, '69830', '0069830', 'khomay@gmail.com', 'Khornaylius Ervin', '1978-07-08', '2014-03-03', 3, 2, 'F', 12, 2, '1', NULL),
(104, '71519', '0071519', 'ika@gmail.com', 'Ika Sulistiyanni Raharjo', '1982-10-27', '2014-03-24', 2, 1, 'F', 0, 2, '1', NULL),
(105, '71533', '0071533', 'kun@gmail.com', 'Kun Setyawan', '1970-09-10', '2014-04-01', 2, 2, 'M', 12, 2, '1', NULL),
(106, '71756', '0071756', 'eliansyah@gmail.com', 'Eliansyah', '1971-05-07', '2014-06-03', 3, 2, 'M', 12, 2, '1', NULL),
(107, '71339', '0071339', 'nugroho@gmail.com', 'Nugroho Arif Prabowo', '1978-08-30', '2014-06-03', 5, 2, 'M', 12, 2, '1', NULL),
(108, '72051', '0072051', 'dino@gmail.com', 'Dino Valentinus Prajoga K', '1968-09-16', '2014-08-11', 2, 1, 'M', 0, 2, '1', NULL),
(109, '72253', '0072253', 'septi@gmail.com', 'Septiana Rustandi', '1971-09-24', '2015-01-05', 2, 1, 'F', 0, 2, '1', NULL),
(110, '72242', '0072242', 'rahmina@gmail.com', 'Rahmina', '1974-01-06', '2015-01-05', 3, 2, 'F', 12, 2, '1', NULL),
(111, '72365', '0072365', 'dini@gmail.com', 'Dini Septiani', '1979-09-09', '2015-04-01', 2, 1, 'F', 0, 1, '1', NULL),
(112, '72324', '0072324', 'awal@gmail.com', 'Awaludinnoer', '1985-09-14', '2015-03-01', 5, 2, 'M', 12, 1, '1', NULL),
(113, '72542', '0072542', 'abdi@gmail.com', 'Abdi Yuniono', '1977-06-01', '2015-06-01', 2, 2, 'M', 12, 2, '1', NULL),
(114, '72632', '0072632', 'sutraanjani@gmail.com', 'Sutra Anjani', '1991-10-22', '2015-06-10', 2, 2, 'F', 12, 2, '1', NULL),
(115, '72899', '0072899', 'hultera@gmail.com', 'Hultera', '1976-06-02', '2015-09-01', 2, 2, 'M', 12, 2, '1', NULL),
(116, '72015', '0072015', 'andreas@gmail.com', 'Andreas Tomi Prasetya', '1982-06-13', '2014-07-14', 6, 2, 'M', 12, 1, '1', NULL),
(117, '72898', '0072898', 'mahatma@gmail.com', 'Mahatma Windrawan Inantha', '1971-11-28', '2015-09-01', 2, 2, 'M', 12, 2, '1', NULL),
(118, '72900', '0072900', 'tho@gmail.com', 'Tho Yvonne Margaret Tumewu', '1986-09-13', '2015-09-01', 2, 2, 'F', 12, 1, '1', NULL),
(119, '73005', '0073005', 'cintya@gmail.com', 'Cintya Dian Astuty', '1974-04-17', '2015-11-02', 2, 2, 'F', 12, 2, '1', NULL),
(120, '73026', '0073026', 'syaiful@gmail.com', 'Syaiful Anwar', '1987-01-18', '2015-11-16', 2, 2, 'M', 12, 1, '1', NULL),
(121, '73048', '0073048', 'agustina@gmail.com', 'Agustina Wulandari', '1988-08-16', '2015-11-26', 2, 2, 'F', 12, 1, '1', NULL),
(122, '72322', '0072322', 'gunawan@gmail.com', 'Gunawan Wibisono', '1974-06-12', '2015-03-01', 3, 2, 'M', 12, 2, '1', NULL),
(123, '73080', '0073080', 'ratih@gmail.com', 'Ratih A Loekito', '1963-04-07', '2016-01-04', 2, 2, 'F', 12, 2, '1', NULL),
(124, '73081', '0073081', 'arifdwi@gmail.com', 'Arif Dwi Cahyono', '1982-05-05', '2016-01-04', 8, 2, 'M', 12, 2, '1', NULL),
(125, '73084', '0073084', 'ida@gmail.com', 'Ida Bagus Ketut Wedastra', '1976-04-22', '2016-01-04', 2, 2, 'M', 12, 2, '1', NULL),
(126, '73125', '0073125', 'cici@gmail.com', 'Cici Rachmaida', '1974-07-22', '2016-01-21', 2, 2, 'F', 12, 1, '1', NULL),
(127, '72886', '0072886', 'patma@gmail.com', 'Patmasanti', '1982-08-18', '2015-08-24', 3, 2, 'F', 12, 1, '1', NULL),
(128, '72880', '0072880', 'ingrid@gmail.com', 'Ingrid Leonlike', '1985-08-20', '2015-08-19', 2, 2, 'F', 12, 1, '1', NULL),
(129, '73219', '0073219', 'lailan@gmail.com', 'Lailan Syahri Ramadhan', '1978-08-24', '2016-03-14', 8, 2, 'M', 12, 2, '1', NULL),
(130, '73269', '0073269', 'rudi@gmail.com', 'Rudi Zapariza', '1974-08-24', '2016-04-04', 8, 2, 'M', 12, 2, '1', NULL),
(131, '72757', '0072757', 'jevelina@gmail.com', 'Jevelina Punuh', '1978-01-07', '2016-06-23', 2, 2, 'F', 12, 2, '1', NULL),
(132, '67462', '0067462', 'alfan@gmail.com', 'Alfan Subekti', '1968-09-07', '2016-05-02', 7, 2, 'M', 12, 2, '1', NULL),
(133, '73407', '0073407', 'laksmi@gmail.com', 'Laksmi Larastti', '1990-02-12', '2016-06-06', 1, 2, 'F', 12, 2, '1', NULL),
(134, '73426', '0073426', 'shanina@gmail.com', 'Shanina Boestami', '1992-10-24', '2016-06-01', 2, 2, 'F', 12, 1, '1', NULL),
(135, '73483', '0073483', 'bharata@gmail.com', 'Bharata Ramedhan', '1980-07-19', '2016-06-13', 2, 1, 'M', 0, 2, '1', NULL),
(136, '73714', '0073714', 'ayumas@gmail.com', 'Ayumas Putri', '1992-05-28', '2016-07-25', 2, 2, 'F', 12, 1, '1', NULL),
(137, '73726', '0073726', 'yadranka@gmail.com', 'Yadranka Farita', '1980-01-17', '2016-08-01', 2, 2, 'F', 12, 2, '1', NULL),
(138, '73730', '0073730', 'ginan@gmail.com', 'Ginanjar Adi Priatna', '1984-09-19', '2016-08-03', 2, 2, 'M', 12, 1, '1', NULL),
(139, '73763', '0073763', 'dewi@gmail.com', 'Dewi Damayani', '1975-07-25', '2016-08-16', 2, 1, 'F', 0, 2, '1', NULL),
(140, '73815', '0073815', 'retno@gmail.com', 'Retno Indah Dianing Sari', '1983-01-16', '2016-09-14', 7, 2, 'F', 12, 1, '1', NULL),
(141, '73861', '0073861', 'ali@gmail.com', 'Ali Chayatuddin', '1993-09-19', '2016-08-06', 3, 2, 'M', 0, 1, '1', NULL),
(142, '73865', '0073865', 'aisyah@gmail.com', 'Aisyah Laila Paramacitra', '1982-01-28', '2016-10-10', 2, 1, 'F', 0, 2, '1', NULL),
(143, '73925', '0073925', 'aby@gmail.com', 'Aby', '1992-10-15', '2016-11-07', 2, 2, 'F', 12, 1, '1', NULL),
(144, '72866', '0072866', 'sumanda@gmail.com', 'Sumanda Purba Tondang', '1985-06-22', '2015-08-10', 2, 2, 'M', 12, 2, '1', NULL),
(145, '73947', '0073947', 'adis@gmail.com', 'Adis Hendriatna', '1989-12-05', '2018-08-06', 2, 2, 'M', 12, 2, '1', NULL),
(146, '73971', '0073971', 'indriani@gmail.com', 'Indriani Gita Arjana', '1992-12-29', '2016-12-01', 1, 2, 'F', 12, 1, '1', NULL),
(147, '73994', '0073994', 'ade@gmail.com', 'Ade Rachmi Yuliantri', '1977-07-24', '2016-12-15', 2, 2, 'F', 12, 2, '1', NULL),
(148, '74042', '0074042', 'maya@gmail.com', 'Maya Patriani', '1988-07-20', '2017-01-09', 3, 2, 'F', 12, 1, '1', NULL),
(149, '74040', '0074040', 'thomas@gmail.com', 'Thomas Ariston', '1973-04-08', '2017-01-09', 2, 2, 'M', 12, 1, '1', NULL),
(150, '74041', '0074041', 'hilda@gmail.com', 'Hilda Lionata', '1980-04-27', '2017-01-09', 2, 2, 'F', 12, 1, '1', NULL),
(151, '74043', '0074043', 'arista@gmail.com', 'Arista Efraim Benu', '1977-08-10', '2017-01-09', 6, 2, 'M', 12, 1, '1', NULL),
(152, '74044', '0074044', 'lebin@gmail.com', 'Lebin Yen', '1983-03-15', '2017-01-09', 3, 2, 'M', 12, 2, '1', NULL),
(153, '74027', '0074027', 'stefanus@gmail.com', 'Stefanus Rudy Aryawan', '1972-10-03', '2017-01-05', 2, 1, 'M', 0, 2, '1', NULL),
(154, '74132', '0074132', 'adhi@gmail.com', 'M Adhi Atmajaya', '1978-02-02', '2017-03-01', 2, 2, 'M', 12, 2, '1', NULL),
(155, '74139', '0074139', 'christianus@gmail.com', 'Christianus W Djoko', '2017-07-06', '2017-03-06', 7, 2, 'M', 12, 2, '1', NULL),
(156, '74157', '0074157', 'bintang@gmail.com', 'Bintang Intan Oematan', '1981-11-27', '2017-03-15', 2, 2, 'F', 12, 1, '1', NULL),
(157, '74165', '0074165', 'nandana@gmail.com', 'Nandana Godjali', '1983-12-09', '2017-03-20', 1, 2, 'M', 12, 1, '1', NULL),
(158, '74200', '0074200', 'jefferson@gmail.com', 'Jefferson Tasik', '1973-10-21', '2017-04-04', 6, 2, 'M', 12, 2, '1', NULL),
(159, '74262', '0074262', 'yus@gmail.com', 'Yus Santoro', '1973-05-10', '2017-05-02', 2, 2, 'M', 12, 2, '1', NULL),
(160, '74321', '0074321', 'danis@gmail.com', 'Aditya Daniswara ', '1990-02-14', '2018-08-06', 2, 2, 'M', 12, 2, '1', NULL),
(161, '74383', '0074383', 'rifqi@gmail.com', 'M Arif Rifqi', '1990-03-19', '2017-05-06', 3, 2, 'M', 12, 2, '1', NULL),
(162, '74441', '0074441', 'hanifatul@gmail.com', 'Hanifatul Choiriah', '1994-01-22', '2017-06-15', 3, 2, 'F', 12, 2, '1', NULL),
(163, '74654', '0074654', 'maika@gmail.com', 'Maika Nova Yudha', '1987-03-05', '2017-08-01', 2, 2, 'F', 12, 2, '1', NULL),
(164, '74653', '0074653', 'lidia@gmail.com', 'Lidia Mirosa', '1973-02-16', '2017-08-01', 2, 2, 'F', 12, 2, '1', NULL),
(165, '74655', '0074655', 'adriani@gmail.com', 'Dini Adriani Adnan', '1979-06-10', '2017-08-01', 2, 2, 'F', 12, 2, '1', NULL),
(166, '74673', '0074673', 'yuppy@gmail.com', 'Yoppy Hidayanto', '1977-09-23', '2017-08-21', 2, 2, 'M', 12, 2, '1', NULL),
(167, '74672', '0074672', 'fachrul@gmail.com', 'Fachrul Rozi', '1987-01-27', '2017-08-18', 2, 2, 'M', 12, 2, '1', NULL),
(168, '74682', '0074682', 'Ruslandi@gmail.com', 'Ruslandi', '1973-04-07', '2017-08-23', 2, 2, 'M', 12, 2, '1', NULL),
(169, '74703', '0074703', 'swargo@gmail.com', 'Ade Swargo Mulyo', '1968-04-11', '2017-09-04', 2, 1, 'M', 12, 2, '1', NULL),
(170, '74704', '0074704', 'oni@gmail.com', 'Oni Sulistyaningrum', '1973-10-12', '2017-09-04', 2, 2, 'F', 6, 2, '1', NULL),
(171, '74747', '0074747', 'boni@gmail.com', 'Bonifasius Santiko Parikesit', '1989-12-28', '2017-10-02', 2, 2, 'M', 12, 1, '1', NULL),
(172, '74829', '0074829', 'saryadi@gmail.com', 'Saryadi', '1979-10-11', '2017-11-27', 3, 2, 'M', 12, 2, '1', NULL),
(173, '74830', '0074830', 'jeane@gmail.com', 'Jeanekewaty Sindy Niode', '1983-01-06', '2017-12-04', 2, 2, 'F', 12, 2, '1', NULL),
(174, '74876', '0074876', 'tricia@gmail.com', 'Tricia Habsari Kusumawardhani', '1980-04-14', '2018-01-08', 2, 2, 'F', 12, 2, '1', NULL),
(175, '74881', '0074881', 'resha@gmail.com', 'Resha Ayu Putri Belinawati', '1991-06-27', '2018-01-08', 2, 2, 'F', 12, 2, '1', NULL),
(176, '74914', '0074914', 'triana@gmail.com', 'Triana', '1976-02-28', '2018-01-22', 6, 2, 'F', 12, 1, '1', NULL),
(177, '74935', '0074935', 'rosidi@gmail.com', 'M Rosidi', '1977-10-10', '2018-02-01', 2, 2, 'M', 12, 2, '1', NULL),
(178, '74936', '0074936', 'widar@gmail.com', 'Widaryanto', '1973-12-31', '2018-02-05', 2, 2, 'M', 12, 2, '1', NULL),
(179, '74937', '0074937', 'candy@gmail.com', 'Candy Bonita Nauli', '1983-05-24', '2018-02-05', 2, 2, 'F', 12, 2, '1', NULL),
(180, '74940', '0074940', 'diany@gmail.com', 'Diany Budi Wibowo', '1978-08-22', '2018-02-05', 2, 2, 'F', 12, 2, '1', NULL),
(181, '74938', '0074938', 'anggyta@gmail.com', 'Anggyta Setyorini', '1981-08-29', '2018-02-05', 2, 2, 'F', 12, 1, '1', NULL),
(182, '74968', '0074968', 'kusworo@gmail.com', 'A Kusworo', '1970-06-12', '2018-03-01', 2, 2, 'M', 12, 2, '1', NULL),
(183, '74990', '0074990', 'mustofa@gmail.com', 'Ali Mustofa', '1977-05-02', '2018-03-19', 3, 2, 'M', 12, 2, '1', NULL),
(184, '75016', '0075016', 'lastyo@gmail.com', 'Lastyo Kuntoaji Lukito', '1972-07-13', '2018-04-04', 2, 1, 'M', 12, 2, '1', NULL),
(185, '75045', '0075045', 'bunga@gmail.com', 'Lidia Bunga Lestari', '1983-05-29', '2018-07-01', 2, 2, 'F', 12, 2, '1', NULL),
(186, '75084', '0075084', 'fachry@gmail.com', 'Fachry Ramadyan', '1990-04-18', '2018-07-01', 2, 2, 'M', 12, 1, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_benefit`
--

CREATE TABLE `employee_benefit` (
  `empBenId` int(11) NOT NULL,
  `empBenEmpId` int(11) DEFAULT NULL COMMENT 'emp id',
  `empBenRelId` int(11) DEFAULT NULL COMMENT 'employee det (family)',
  `empBenParentId` varchar(255) DEFAULT NULL COMMENT 'empId|benId',
  `empBenBenId` int(11) DEFAULT NULL COMMENT 'id benefit',
  `empBenLabel` varchar(255) DEFAULT NULL,
  `empBenNominal` decimal(20,2) DEFAULT NULL,
  `empBenDesc` varchar(255) DEFAULT NULL,
  `unique_index` varchar(255) DEFAULT NULL COMMENT 'index unik'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_benefit`
--

INSERT INTO `employee_benefit` (`empBenId`, `empBenEmpId`, `empBenRelId`, `empBenParentId`, `empBenBenId`, `empBenLabel`, `empBenNominal`, `empBenDesc`, `unique_index`) VALUES
(7357, 48, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5196 days. regular calculation. 1 family included', '48-5'),
(7358, 48, 52, '48|5', 5, 'Outpatient married spouse', '5625000.00', 'Handoyo Budi Santoso', '48-5-52'),
(7359, 48, NULL, '', 7, 'Normal', '10800000.00', '', '48-7'),
(7360, 48, NULL, '', 8, 'C-Section', '18000000.00', '', '48-8'),
(7361, 48, NULL, '', 9, 'Complication', '5000000.00', '', '48-9'),
(7362, 48, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '48-10'),
(7363, 48, NULL, '', 11, 'Frame', '1500000.00', '', '48-11'),
(7364, 48, NULL, '', 12, 'Lenses', '1500000.00', '', '48-12'),
(7365, 48, NULL, '', 13, 'Contact Lens', '1500000.00', '', '48-13'),
(7366, 49, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 7632 days. regular calculation. 4 family included', '49-5'),
(7367, 49, 35, '49|5', 5, 'Outpatient married spouse', '5625000.00', 'Rita Theresia', '49-5-35'),
(7368, 49, 36, '49|5', 6, 'Outpatient single child 1', '7970000.00', 'Felicia Marcella', '49-5-36'),
(7369, 49, 37, '49|5', 6, 'Outpatient single child 2', '7970000.00', 'Filipo Marcelinno', '49-5-37'),
(7370, 49, 38, '49|5', 6, 'Outpatient single child 3', '7970000.00', 'Finella Marcia', '49-5-38'),
(7371, 49, NULL, '', 7, 'Normal', '10800000.00', '', '49-7'),
(7372, 49, NULL, '', 8, 'C-Section', '18000000.00', '', '49-8'),
(7373, 49, NULL, '', 9, 'Complication', '5000000.00', '', '49-9'),
(7374, 49, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '49-10'),
(7375, 49, NULL, '', 11, 'Frame', '1500000.00', '', '49-11'),
(7376, 49, NULL, '', 12, 'Lenses', '1500000.00', '', '49-12'),
(7377, 49, NULL, '', 13, 'Contact Lens', '1500000.00', '', '49-13'),
(7378, 50, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 6263 days. regular calculation. 4 family included', '50-5'),
(7379, 50, 41, '50|5', 5, 'Outpatient married spouse', '5625000.00', 'Ellys Rahmasari', '50-5-41'),
(7380, 50, 42, '50|5', 6, 'Outpatient single child 1', '7970000.00', 'Sylvia Aulia Dewi', '50-5-42'),
(7381, 50, 43, '50|5', 6, 'Outpatient single child 2', '7970000.00', 'Mutia Aisyatur Ridho', '50-5-43'),
(7382, 50, 44, '50|5', 6, 'Outpatient single child 3', '7970000.00', 'Tania Putri Ayunita', '50-5-44'),
(7383, 50, NULL, '', 7, 'Normal', '10800000.00', '', '50-7'),
(7384, 50, NULL, '', 8, 'C-Section', '18000000.00', '', '50-8'),
(7385, 50, NULL, '', 9, 'Complication', '5000000.00', '', '50-9'),
(7386, 50, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '50-10'),
(7387, 50, NULL, '', 11, 'Frame', '1500000.00', '', '50-11'),
(7388, 50, NULL, '', 12, 'Lenses', '1500000.00', '', '50-12'),
(7389, 50, NULL, '', 13, 'Contact Lens', '1500000.00', '', '50-13'),
(7390, 53, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 5504 days. regular calculation.', '53-6'),
(7391, 53, NULL, '', 7, 'Normal', '10800000.00', '', '53-7'),
(7392, 53, NULL, '', 8, 'C-Section', '18000000.00', '', '53-8'),
(7393, 53, NULL, '', 9, 'Complication', '5000000.00', '', '53-9'),
(7394, 53, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '53-10'),
(7395, 53, NULL, '', 11, 'Frame', '1500000.00', '', '53-11'),
(7396, 53, NULL, '', 12, 'Lenses', '1500000.00', '', '53-12'),
(7397, 53, NULL, '', 13, 'Contact Lens', '1500000.00', '', '53-13'),
(7398, 54, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5364 days. regular calculation. 0 family included', '54-5'),
(7399, 54, NULL, '', 7, 'Normal', '10800000.00', '', '54-7'),
(7400, 54, NULL, '', 8, 'C-Section', '18000000.00', '', '54-8'),
(7401, 54, NULL, '', 9, 'Complication', '5000000.00', '', '54-9'),
(7402, 54, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '54-10'),
(7403, 54, NULL, '', 11, 'Frame', '1500000.00', '', '54-11'),
(7404, 54, NULL, '', 12, 'Lenses', '1500000.00', '', '54-12'),
(7405, 54, NULL, '', 13, 'Contact Lens', '1500000.00', '', '54-13'),
(7406, 55, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5790 days. regular calculation. 3 family included', '55-5'),
(7407, 55, 53, '55|5', 5, 'Outpatient married spouse', '5625000.00', 'Ruminem', '55-5-53'),
(7408, 55, 54, '55|5', 6, 'Outpatient single child 1', '7970000.00', 'Adetya Ningrum', '55-5-54'),
(7409, 55, 55, '55|5', 6, 'Outpatient single child 2', '7970000.00', 'Dea Yulinda', '55-5-55'),
(7410, 55, NULL, '', 7, 'Normal', '10800000.00', '', '55-7'),
(7411, 55, NULL, '', 8, 'C-Section', '18000000.00', '', '55-8'),
(7412, 55, NULL, '', 9, 'Complication', '5000000.00', '', '55-9'),
(7413, 55, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '55-10'),
(7414, 55, NULL, '', 11, 'Frame', '1500000.00', '', '55-11'),
(7415, 55, NULL, '', 12, 'Lenses', '1500000.00', '', '55-12'),
(7416, 55, NULL, '', 13, 'Contact Lens', '1500000.00', '', '55-13'),
(7417, 56, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5394 days. regular calculation. 2 family included', '56-5'),
(7418, 56, 56, '56|5', 5, 'Outpatient married spouse', '5625000.00', 'Yosep Luminggas', '56-5-56'),
(7419, 56, 57, '56|5', 6, 'Outpatient single child 1', '7970000.00', 'Yusakh H. Luminggas', '56-5-57'),
(7420, 56, NULL, '', 7, 'Normal', '10800000.00', '', '56-7'),
(7421, 56, NULL, '', 8, 'C-Section', '18000000.00', '', '56-8'),
(7422, 56, NULL, '', 9, 'Complication', '5000000.00', '', '56-9'),
(7423, 56, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '56-10'),
(7424, 56, NULL, '', 11, 'Frame', '1500000.00', '', '56-11'),
(7425, 56, NULL, '', 12, 'Lenses', '1500000.00', '', '56-12'),
(7426, 56, NULL, '', 13, 'Contact Lens', '1500000.00', '', '56-13'),
(7427, 57, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5693 days. regular calculation. 3 family included', '57-5'),
(7428, 57, 58, '57|5', 5, 'Outpatient married spouse', '5625000.00', 'Rosleni', '57-5-58'),
(7429, 57, 59, '57|5', 6, 'Outpatient single child 1', '7970000.00', 'Sausan Nabila E', '57-5-59'),
(7430, 57, 60, '57|5', 6, 'Outpatient single child 2', '7970000.00', 'Kurahman Fadilah', '57-5-60'),
(7431, 57, NULL, '', 7, 'Normal', '10800000.00', '', '57-7'),
(7432, 57, NULL, '', 8, 'C-Section', '18000000.00', '', '57-8'),
(7433, 57, NULL, '', 9, 'Complication', '5000000.00', '', '57-9'),
(7434, 57, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '57-10'),
(7435, 57, NULL, '', 11, 'Frame', '1500000.00', '', '57-11'),
(7436, 57, NULL, '', 12, 'Lenses', '1500000.00', '', '57-12'),
(7437, 57, NULL, '', 13, 'Contact Lens', '1500000.00', '', '57-13'),
(7438, 58, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5697 days. regular calculation. 4 family included', '58-5'),
(7439, 58, 61, '58|5', 5, 'Outpatient married spouse', '5625000.00', 'Nurhaya', '58-5-61'),
(7440, 58, 62, '58|5', 6, 'Outpatient single child 1', '7970000.00', 'Dita Angraini', '58-5-62'),
(7441, 58, 63, '58|5', 6, 'Outpatient single child 2', '7970000.00', 'M. Alfian Harfan', '58-5-63'),
(7442, 58, 64, '58|5', 6, 'Outpatient single child 3', '7970000.00', 'M. Dhafa Aditya', '58-5-64'),
(7443, 58, NULL, '', 7, 'Normal', '10800000.00', '', '58-7'),
(7444, 58, NULL, '', 8, 'C-Section', '18000000.00', '', '58-8'),
(7445, 58, NULL, '', 9, 'Complication', '5000000.00', '', '58-9'),
(7446, 58, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '58-10'),
(7447, 58, NULL, '', 11, 'Frame', '1500000.00', '', '58-11'),
(7448, 58, NULL, '', 12, 'Lenses', '1500000.00', '', '58-12'),
(7449, 58, NULL, '', 13, 'Contact Lens', '1500000.00', '', '58-13'),
(7450, 59, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 5019 days. regular calculation. 3 family included', '59-5'),
(7451, 59, 65, '59|5', 5, 'Outpatient married spouse', '5625000.00', 'Nur Laila Wati', '59-5-65'),
(7452, 59, 66, '59|5', 6, 'Outpatient single child 1', '7970000.00', 'Zahra Aulia Fitri', '59-5-66'),
(7453, 59, 67, '59|5', 6, 'Outpatient single child 2', '7970000.00', 'Amjaad Haedar', '59-5-67'),
(7454, 59, NULL, '', 7, 'Normal', '10800000.00', '', '59-7'),
(7455, 59, NULL, '', 8, 'C-Section', '18000000.00', '', '59-8'),
(7456, 59, NULL, '', 9, 'Complication', '5000000.00', '', '59-9'),
(7457, 59, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '59-10'),
(7458, 59, NULL, '', 11, 'Frame', '1500000.00', '', '59-11'),
(7459, 59, NULL, '', 12, 'Lenses', '1500000.00', '', '59-12'),
(7460, 59, NULL, '', 13, 'Contact Lens', '1500000.00', '', '59-13'),
(7461, 60, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 4188 days. regular calculation. 4 family included', '60-5'),
(7462, 60, 68, '60|5', 5, 'Outpatient married spouse', '5625000.00', 'Agustinawati', '60-5-68'),
(7463, 60, 69, '60|5', 6, 'Outpatient single child 1', '7970000.00', 'Deni', '60-5-69'),
(7464, 60, 70, '60|5', 6, 'Outpatient single child 2', '7970000.00', 'Kris Andrean', '60-5-70'),
(7465, 60, 71, '60|5', 6, 'Outpatient single child 3', '7970000.00', 'Jesika', '60-5-71'),
(7466, 60, NULL, '', 7, 'Normal', '10800000.00', '', '60-7'),
(7467, 60, NULL, '', 8, 'C-Section', '18000000.00', '', '60-8'),
(7468, 60, NULL, '', 9, 'Complication', '5000000.00', '', '60-9'),
(7469, 60, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '60-10'),
(7470, 60, NULL, '', 11, 'Frame', '1500000.00', '', '60-11'),
(7471, 60, NULL, '', 12, 'Lenses', '1500000.00', '', '60-12'),
(7472, 60, NULL, '', 13, 'Contact Lens', '1500000.00', '', '60-13'),
(7473, 61, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3789 days. regular calculation. 4 family included', '61-5'),
(7474, 61, 72, '61|5', 5, 'Outpatient married spouse', '5625000.00', 'Wiji Sulastri', '61-5-72'),
(7475, 61, 73, '61|5', 6, 'Outpatient single child 1', '7970000.00', 'Balqis Asri Salsabila', '61-5-73'),
(7476, 61, 74, '61|5', 6, 'Outpatient single child 2', '7970000.00', 'Alya Astrik Salsabila', '61-5-74'),
(7477, 61, 75, '61|5', 6, 'Outpatient single child 3', '7970000.00', 'Trilia Amira Afiifa Salsabila', '61-5-75'),
(7478, 61, NULL, '', 7, 'Normal', '10800000.00', '', '61-7'),
(7479, 61, NULL, '', 8, 'C-Section', '18000000.00', '', '61-8'),
(7480, 61, NULL, '', 9, 'Complication', '5000000.00', '', '61-9'),
(7481, 61, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '61-10'),
(7482, 61, NULL, '', 11, 'Frame', '1500000.00', '', '61-11'),
(7483, 61, NULL, '', 12, 'Lenses', '1500000.00', '', '61-12'),
(7484, 61, NULL, '', 13, 'Contact Lens', '1500000.00', '', '61-13'),
(7485, 62, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3644 days. regular calculation. 4 family included', '62-5'),
(7486, 62, 76, '62|5', 5, 'Outpatient married spouse', '5625000.00', 'Ria Aprianti', '62-5-76'),
(7487, 62, 77, '62|5', 6, 'Outpatient single child 1', '7970000.00', 'Alif Ramadhan Kumiawan', '62-5-77'),
(7488, 62, 78, '62|5', 6, 'Outpatient single child 2', '7970000.00', 'M/ Baihaki Kumiawan', '62-5-78'),
(7489, 62, 79, '62|5', 6, 'Outpatient single child 3', '7970000.00', 'Tasya Amalia Kumiawan', '62-5-79'),
(7490, 62, NULL, '', 7, 'Normal', '10800000.00', '', '62-7'),
(7491, 62, NULL, '', 8, 'C-Section', '18000000.00', '', '62-8'),
(7492, 62, NULL, '', 9, 'Complication', '5000000.00', '', '62-9'),
(7493, 62, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '62-10'),
(7494, 62, NULL, '', 11, 'Frame', '1500000.00', '', '62-11'),
(7495, 62, NULL, '', 12, 'Lenses', '1500000.00', '', '62-12'),
(7496, 62, NULL, '', 13, 'Contact Lens', '1500000.00', '', '62-13'),
(7497, 63, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3635 days. regular calculation. 4 family included', '63-5'),
(7498, 63, 80, '63|5', 5, 'Outpatient married spouse', '5625000.00', 'Sumia', '63-5-80'),
(7499, 63, 81, '63|5', 6, 'Outpatient single child 1', '7970000.00', 'La Ode Dino SEtiawan', '63-5-81'),
(7500, 63, 82, '63|5', 6, 'Outpatient single child 2', '7970000.00', 'Wa Ode Dina Putriwangi', '63-5-82'),
(7501, 63, 83, '63|5', 6, 'Outpatient single child 3', '7970000.00', 'La Ode Dias Saputra', '63-5-83'),
(7502, 63, NULL, '', 7, 'Normal', '10800000.00', '', '63-7'),
(7503, 63, NULL, '', 8, 'C-Section', '18000000.00', '', '63-8'),
(7504, 63, NULL, '', 9, 'Complication', '5000000.00', '', '63-9'),
(7505, 63, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '63-10'),
(7506, 63, NULL, '', 11, 'Frame', '1500000.00', '', '63-11'),
(7507, 63, NULL, '', 12, 'Lenses', '1500000.00', '', '63-12'),
(7508, 63, NULL, '', 13, 'Contact Lens', '1500000.00', '', '63-13'),
(7509, 64, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 3552 days. regular calculation.', '64-6'),
(7510, 64, NULL, '', 7, 'Normal', '10800000.00', '', '64-7'),
(7511, 64, NULL, '', 8, 'C-Section', '18000000.00', '', '64-8'),
(7512, 64, NULL, '', 9, 'Complication', '5000000.00', '', '64-9'),
(7513, 64, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '64-10'),
(7514, 64, NULL, '', 11, 'Frame', '1500000.00', '', '64-11'),
(7515, 64, NULL, '', 12, 'Lenses', '1500000.00', '', '64-12'),
(7516, 64, NULL, '', 13, 'Contact Lens', '1500000.00', '', '64-13'),
(7517, 65, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 3506 days. regular calculation.', '65-6'),
(7518, 65, NULL, '', 7, 'Normal', '10800000.00', '', '65-7'),
(7519, 65, NULL, '', 8, 'C-Section', '18000000.00', '', '65-8'),
(7520, 65, NULL, '', 9, 'Complication', '5000000.00', '', '65-9'),
(7521, 65, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '65-10'),
(7522, 65, NULL, '', 11, 'Frame', '1500000.00', '', '65-11'),
(7523, 65, NULL, '', 12, 'Lenses', '1500000.00', '', '65-12'),
(7524, 65, NULL, '', 13, 'Contact Lens', '1500000.00', '', '65-13'),
(7525, 66, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 4877 days. regular calculation. 3 family included', '66-5'),
(7526, 66, 84, '66|5', 5, 'Outpatient married spouse', '5625000.00', 'Yusi Fitria', '66-5-84'),
(7527, 66, 85, '66|5', 6, 'Outpatient single child 1', '7970000.00', 'Rivaldhy Rizki Akbar', '66-5-85'),
(7528, 66, 86, '66|5', 6, 'Outpatient single child 2', '7970000.00', 'Anastasya Ayu Bilqis', '66-5-86'),
(7529, 66, NULL, '', 7, 'Normal', '10800000.00', '', '66-7'),
(7530, 66, NULL, '', 8, 'C-Section', '18000000.00', '', '66-8'),
(7531, 66, NULL, '', 9, 'Complication', '5000000.00', '', '66-9'),
(7532, 66, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '66-10'),
(7533, 66, NULL, '', 11, 'Frame', '1500000.00', '', '66-11'),
(7534, 66, NULL, '', 12, 'Lenses', '1500000.00', '', '66-12'),
(7535, 66, NULL, '', 13, 'Contact Lens', '1500000.00', '', '66-13'),
(7536, 67, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 4877 days. regular calculation. 4 family included', '67-5'),
(7537, 67, 87, '67|5', 5, 'Outpatient married spouse', '5625000.00', 'Sri Nuryani', '67-5-87'),
(7538, 67, 88, '67|5', 6, 'Outpatient single child 1', '7970000.00', 'Matheus S. Rumetna', '67-5-88'),
(7539, 67, 89, '67|5', 6, 'Outpatient single child 2', '7970000.00', 'Julian M Ch Rumetna', '67-5-89'),
(7540, 67, 90, '67|5', 6, 'Outpatient single child 3', '7970000.00', 'Ardian E Rumetna', '67-5-90'),
(7541, 67, NULL, '', 7, 'Normal', '10800000.00', '', '67-7'),
(7542, 67, NULL, '', 8, 'C-Section', '18000000.00', '', '67-8'),
(7543, 67, NULL, '', 9, 'Complication', '5000000.00', '', '67-9'),
(7544, 67, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '67-10'),
(7545, 67, NULL, '', 11, 'Frame', '1500000.00', '', '67-11'),
(7546, 67, NULL, '', 12, 'Lenses', '1500000.00', '', '67-12'),
(7547, 67, NULL, '', 13, 'Contact Lens', '1500000.00', '', '67-13'),
(7548, 68, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1986 days. regular calculation. 3 family included', '68-5'),
(7549, 68, 91, '68|5', 5, 'Outpatient married spouse', '5625000.00', 'Suprihatin', '68-5-91'),
(7550, 68, 92, '68|5', 6, 'Outpatient single child 1', '7970000.00', 'Aisyah Ummu Atsal', '68-5-92'),
(7551, 68, 93, '68|5', 6, 'Outpatient single child 2', '7970000.00', 'Asma Latifa Khairunisa', '68-5-93'),
(7552, 68, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-7'),
(7553, 68, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-8'),
(7554, 68, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-9'),
(7555, 68, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-10'),
(7556, 68, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-11'),
(7557, 68, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-12'),
(7558, 68, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1986 days. minimum work 6 months.', '68-13'),
(7559, 69, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 4590 days. regular calculation.', '69-6'),
(7560, 69, NULL, '', 7, 'Normal', '10800000.00', '', '69-7'),
(7561, 69, NULL, '', 8, 'C-Section', '18000000.00', '', '69-8'),
(7562, 69, NULL, '', 9, 'Complication', '5000000.00', '', '69-9'),
(7563, 69, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '69-10'),
(7564, 69, NULL, '', 11, 'Frame', '1500000.00', '', '69-11'),
(7565, 69, NULL, '', 12, 'Lenses', '1500000.00', '', '69-12'),
(7566, 69, NULL, '', 13, 'Contact Lens', '1500000.00', '', '69-13'),
(7567, 70, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 4580 days. regular calculation. 4 family included', '70-5'),
(7568, 70, 97, '70|5', 5, 'Outpatient married spouse', '5625000.00', 'Dewi Widyaningrum', '70-5-97'),
(7569, 70, 98, '70|5', 5, 'Outpatient married child 1', '5625000.00', 'Rania Farhana', '70-5-98'),
(7570, 70, 99, '70|5', 6, 'Outpatient single child 2', '7970000.00', 'Khairani Makina', '70-5-99'),
(7571, 70, 100, '70|5', 6, 'Outpatient single child 3', '7970000.00', 'Khairana Makina', '70-5-100'),
(7572, 70, NULL, '', 7, 'Normal', '10800000.00', '', '70-7'),
(7573, 70, NULL, '', 8, 'C-Section', '18000000.00', '', '70-8'),
(7574, 70, NULL, '', 9, 'Complication', '5000000.00', '', '70-9'),
(7575, 70, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '70-10'),
(7576, 70, NULL, '', 11, 'Frame', '1500000.00', '', '70-11'),
(7577, 70, NULL, '', 12, 'Lenses', '1500000.00', '', '70-12'),
(7578, 70, NULL, '', 13, 'Contact Lens', '1500000.00', '', '70-13'),
(7579, 71, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 4482 days. regular calculation. 1 family included', '71-5'),
(7580, 71, 101, '71|5', 5, 'Outpatient married spouse', '5625000.00', 'Rosella', '71-5-101'),
(7581, 71, NULL, '', 7, 'Normal', '10800000.00', '', '71-7'),
(7582, 71, NULL, '', 8, 'C-Section', '18000000.00', '', '71-8'),
(7583, 71, NULL, '', 9, 'Complication', '5000000.00', '', '71-9'),
(7584, 71, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '71-10'),
(7585, 71, NULL, '', 11, 'Frame', '1500000.00', '', '71-11'),
(7586, 71, NULL, '', 12, 'Lenses', '1500000.00', '', '71-12'),
(7587, 71, NULL, '', 13, 'Contact Lens', '1500000.00', '', '71-13'),
(7588, 73, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 4451 days. regular calculation. 4 family included', '73-5'),
(7589, 73, 102, '73|5', 5, 'Outpatient married spouse', '5625000.00', 'Miska Nurwahyuni', '73-5-102'),
(7590, 73, 103, '73|5', 6, 'Outpatient single child 1', '7970000.00', 'Nur Ramzi Makkaratte', '73-5-103'),
(7591, 73, 104, '73|5', 6, 'Outpatient single child 2', '7970000.00', 'Rabih Perkasa Makkaratte', '73-5-104'),
(7592, 73, 105, '73|5', 6, 'Outpatient single child 3', '7970000.00', 'Ranggadika Askana Sakhi', '73-5-105'),
(7593, 73, NULL, '', 7, 'Normal', '10800000.00', '', '73-7'),
(7594, 73, NULL, '', 8, 'C-Section', '18000000.00', '', '73-8'),
(7595, 73, NULL, '', 9, 'Complication', '5000000.00', '', '73-9'),
(7596, 73, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '73-10'),
(7597, 73, NULL, '', 11, 'Frame', '1500000.00', '', '73-11'),
(7598, 73, NULL, '', 12, 'Lenses', '1500000.00', '', '73-12'),
(7599, 73, NULL, '', 13, 'Contact Lens', '1500000.00', '', '73-13'),
(7600, 74, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3486 days. regular calculation. 3 family included', '74-5'),
(7601, 74, 106, '74|5', 5, 'Outpatient married spouse', '5625000.00', 'Uriyati', '74-5-106'),
(7602, 74, 107, '74|5', 6, 'Outpatient single child 1', '7970000.00', 'Primawan Luqman Hakim', '74-5-107'),
(7603, 74, 108, '74|5', 6, 'Outpatient single child 2', '7970000.00', 'Setiawan Akbar Mahesa', '74-5-108'),
(7604, 74, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-7'),
(7605, 74, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-8'),
(7606, 74, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-9'),
(7607, 74, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-10'),
(7608, 74, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-11'),
(7609, 74, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-12'),
(7610, 74, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 3486 days. minimum work 6 months.', '74-13'),
(7611, 76, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3387 days. regular calculation. 1 family included', '76-5'),
(7612, 76, 109, '76|5', 5, 'Outpatient married spouse', '5625000.00', 'Eliza Krisnawati', '76-5-109'),
(7613, 76, NULL, '', 7, 'Normal', '10800000.00', '', '76-7'),
(7614, 76, NULL, '', 8, 'C-Section', '18000000.00', '', '76-8'),
(7615, 76, NULL, '', 9, 'Complication', '5000000.00', '', '76-9'),
(7616, 76, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '76-10'),
(7617, 76, NULL, '', 11, 'Frame', '1500000.00', '', '76-11'),
(7618, 76, NULL, '', 12, 'Lenses', '1500000.00', '', '76-12'),
(7619, 76, NULL, '', 13, 'Contact Lens', '1500000.00', '', '76-13'),
(7620, 77, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3134 days. regular calculation. 4 family included', '77-5'),
(7621, 77, 110, '77|5', 5, 'Outpatient married spouse', '5625000.00', 'Surya Hafni', '77-5-110'),
(7622, 77, 111, '77|5', 6, 'Outpatient single child 1', '7970000.00', 'Ilham Fahkreza Taher', '77-5-111'),
(7623, 77, 112, '77|5', 6, 'Outpatient single child 2', '7970000.00', 'Fiqri Fauzul Hamdi Siagian', '77-5-112'),
(7624, 77, 113, '77|5', 6, 'Outpatient single child 3', '7970000.00', 'Amanda Fahdila Siagian', '77-5-113'),
(7625, 77, NULL, '', 7, 'Normal', '10800000.00', '', '77-7'),
(7626, 77, NULL, '', 8, 'C-Section', '18000000.00', '', '77-8'),
(7627, 77, NULL, '', 9, 'Complication', '5000000.00', '', '77-9'),
(7628, 77, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '77-10'),
(7629, 77, NULL, '', 11, 'Frame', '1500000.00', '', '77-11'),
(7630, 77, NULL, '', 12, 'Lenses', '1500000.00', '', '77-12'),
(7631, 77, NULL, '', 13, 'Contact Lens', '1500000.00', '', '77-13'),
(7632, 78, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3110 days. regular calculation. 1 family included', '78-5'),
(7633, 78, 114, '78|5', 5, 'Outpatient married spouse', '5625000.00', 'Tagor Aditya Uktolseja', '78-5-114'),
(7634, 78, NULL, '', 7, 'Normal', '10800000.00', '', '78-7'),
(7635, 78, NULL, '', 8, 'C-Section', '18000000.00', '', '78-8'),
(7636, 78, NULL, '', 9, 'Complication', '5000000.00', '', '78-9'),
(7637, 78, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '78-10'),
(7638, 78, NULL, '', 11, 'Frame', '1500000.00', '', '78-11'),
(7639, 78, NULL, '', 12, 'Lenses', '1500000.00', '', '78-12'),
(7640, 78, NULL, '', 13, 'Contact Lens', '1500000.00', '', '78-13'),
(7641, 79, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 3110 days. regular calculation.', '79-6'),
(7642, 79, NULL, '', 7, 'Normal', '10800000.00', '', '79-7'),
(7643, 79, NULL, '', 8, 'C-Section', '18000000.00', '', '79-8'),
(7644, 79, NULL, '', 9, 'Complication', '5000000.00', '', '79-9'),
(7645, 79, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '79-10'),
(7646, 79, NULL, '', 11, 'Frame', '1500000.00', '', '79-11'),
(7647, 79, NULL, '', 12, 'Lenses', '1500000.00', '', '79-12'),
(7648, 79, NULL, '', 13, 'Contact Lens', '1500000.00', '', '79-13'),
(7649, 80, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3040 days. regular calculation. 3 family included', '80-5'),
(7650, 80, 115, '80|5', 5, 'Outpatient married spouse', '5625000.00', 'Ririn Rinduwati', '80-5-115'),
(7651, 80, 116, '80|5', 6, 'Outpatient single child 1', '7970000.00', 'M. Raihaan Tsaqifari', '80-5-116'),
(7652, 80, 117, '80|5', 6, 'Outpatient single child 2', '7970000.00', 'M. Kenze Bryant Tsaqifari', '80-5-117'),
(7653, 80, NULL, '', 7, 'Normal', '10800000.00', '', '80-7'),
(7654, 80, NULL, '', 8, 'C-Section', '18000000.00', '', '80-8'),
(7655, 80, NULL, '', 9, 'Complication', '5000000.00', '', '80-9'),
(7656, 80, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '80-10'),
(7657, 80, NULL, '', 11, 'Frame', '1500000.00', '', '80-11'),
(7658, 80, NULL, '', 12, 'Lenses', '1500000.00', '', '80-12'),
(7659, 80, NULL, '', 13, 'Contact Lens', '1500000.00', '', '80-13'),
(7660, 81, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 3047 days. regular calculation. 4 family included', '81-5'),
(7661, 81, 118, '81|5', 5, 'Outpatient married spouse', '5625000.00', 'Yannie Oko', '81-5-118'),
(7662, 81, 119, '81|5', 6, 'Outpatient single child 1', '7970000.00', 'Sri Rahayu', '81-5-119'),
(7663, 81, 120, '81|5', 6, 'Outpatient single child 2', '7970000.00', 'Audrey Hannelore', '81-5-120'),
(7664, 81, 121, '81|5', 6, 'Outpatient single child 3', '7970000.00', 'Godlief Emmanuel Tilemans Sado', '81-5-121'),
(7665, 81, NULL, '', 7, 'Normal', '10800000.00', '', '81-7'),
(7666, 81, NULL, '', 8, 'C-Section', '18000000.00', '', '81-8'),
(7667, 81, NULL, '', 9, 'Complication', '5000000.00', '', '81-9'),
(7668, 81, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '81-10'),
(7669, 81, NULL, '', 11, 'Frame', '1500000.00', '', '81-11'),
(7670, 81, NULL, '', 12, 'Lenses', '1500000.00', '', '81-12'),
(7671, 81, NULL, '', 13, 'Contact Lens', '1500000.00', '', '81-13'),
(7672, 82, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 2883 days. regular calculation.', '82-6'),
(7673, 82, NULL, '', 7, 'Normal', '10800000.00', '', '82-7'),
(7674, 82, NULL, '', 8, 'C-Section', '18000000.00', '', '82-8'),
(7675, 82, NULL, '', 9, 'Complication', '5000000.00', '', '82-9'),
(7676, 82, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '82-10'),
(7677, 82, NULL, '', 11, 'Frame', '1500000.00', '', '82-11'),
(7678, 82, NULL, '', 12, 'Lenses', '1500000.00', '', '82-12'),
(7679, 82, NULL, '', 13, 'Contact Lens', '1500000.00', '', '82-13'),
(7680, 83, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 2960 days. regular calculation. 1 family included', '83-5'),
(7681, 83, 122, '83|5', 5, 'Outpatient married spouse', '5625000.00', 'Carl Grazio Fermandez', '83-5-122'),
(7682, 83, NULL, '', 7, 'Normal', '10800000.00', '', '83-7'),
(7683, 83, NULL, '', 8, 'C-Section', '18000000.00', '', '83-8'),
(7684, 83, NULL, '', 9, 'Complication', '5000000.00', '', '83-9'),
(7685, 83, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '83-10'),
(7686, 83, NULL, '', 11, 'Frame', '1500000.00', '', '83-11'),
(7687, 83, NULL, '', 12, 'Lenses', '1500000.00', '', '83-12'),
(7688, 83, NULL, '', 13, 'Contact Lens', '1500000.00', '', '83-13'),
(7689, 84, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 2820 days. regular calculation. 1 family included', '84-5'),
(7690, 84, 123, '84|5', 5, 'Outpatient married spouse', '5625000.00', 'R Ivan M Nainggolan', '84-5-123'),
(7691, 84, NULL, '', 7, 'Normal', '10800000.00', '', '84-7'),
(7692, 84, NULL, '', 8, 'C-Section', '18000000.00', '', '84-8'),
(7693, 84, NULL, '', 9, 'Complication', '5000000.00', '', '84-9'),
(7694, 84, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '84-10'),
(7695, 84, NULL, '', 11, 'Frame', '1500000.00', '', '84-11'),
(7696, 84, NULL, '', 12, 'Lenses', '1500000.00', '', '84-12'),
(7697, 84, NULL, '', 13, 'Contact Lens', '1500000.00', '', '84-13'),
(7698, 85, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 2760 days. regular calculation. 2 family included', '85-5'),
(7699, 85, 124, '85|5', 5, 'Outpatient married spouse', '5625000.00', 'Frida Mindasari Saanin', '85-5-124'),
(7700, 85, 125, '85|5', 6, 'Outpatient single child 1', '7970000.00', 'Amiriz Ismail Ardiwijaya', '85-5-125'),
(7701, 85, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-7'),
(7702, 85, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-8'),
(7703, 85, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-9'),
(7704, 85, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-10'),
(7705, 85, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-11'),
(7706, 85, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-12'),
(7707, 85, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2760 days. minimum work 6 months.', '85-13'),
(7708, 86, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 2688 days. regular calculation.', '86-6'),
(7709, 86, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-7'),
(7710, 86, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-8'),
(7711, 86, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-9'),
(7712, 86, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-10'),
(7713, 86, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-11'),
(7714, 86, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-12'),
(7715, 86, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2688 days. minimum work 6 months.', '86-13'),
(7716, 87, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 2486 days. regular calculation. 4 family included', '87-5'),
(7717, 87, 126, '87|5', 5, 'Outpatient married spouse', '5625000.00', 'Tri Indri Pumamawati', '87-5-126'),
(7718, 87, 127, '87|5', 6, 'Outpatient single child 1', '7970000.00', 'Zhavira Ziyan Arfadilah', '87-5-127'),
(7719, 87, 128, '87|5', 6, 'Outpatient single child 2', '7970000.00', 'Azkavhian Arfaza', '87-5-128'),
(7720, 87, 129, '87|5', 6, 'Outpatient single child 3', '7970000.00', 'Prabavhali Cakra Rayanza', '87-5-129'),
(7721, 87, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-7'),
(7722, 87, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-8'),
(7723, 87, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-9'),
(7724, 87, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-10'),
(7725, 87, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-11'),
(7726, 87, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-12'),
(7727, 87, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2486 days. minimum work 6 months.', '87-13'),
(7728, 88, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 2564 days. regular calculation.', '88-6'),
(7729, 88, NULL, '', 7, 'Normal', '10800000.00', '', '88-7'),
(7730, 88, NULL, '', 8, 'C-Section', '18000000.00', '', '88-8'),
(7731, 88, NULL, '', 9, 'Complication', '5000000.00', '', '88-9'),
(7732, 88, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '88-10'),
(7733, 88, NULL, '', 11, 'Frame', '1500000.00', '', '88-11'),
(7734, 88, NULL, '', 12, 'Lenses', '1500000.00', '', '88-12'),
(7735, 88, NULL, '', 13, 'Contact Lens', '1500000.00', '', '88-13'),
(7736, 89, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 2193 days. regular calculation.', '89-6'),
(7737, 89, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-7'),
(7738, 89, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-8'),
(7739, 89, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-9'),
(7740, 89, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-10'),
(7741, 89, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-11'),
(7742, 89, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-12'),
(7743, 89, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2193 days. minimum work 6 months.', '89-13'),
(7744, 90, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 2151 days. regular calculation.', '90-6'),
(7745, 90, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-7'),
(7746, 90, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-8'),
(7747, 90, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-9'),
(7748, 90, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-10'),
(7749, 90, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-11'),
(7750, 90, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-12'),
(7751, 90, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2151 days. minimum work 6 months.', '90-13'),
(7752, 91, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 2123 days. regular calculation. 4 family included', '91-5'),
(7753, 91, 130, '91|5', 5, 'Outpatient married spouse', '5625000.00', 'Filomena', '91-5-130'),
(7754, 91, 131, '91|5', 6, 'Outpatient single child 1', '7970000.00', 'Azizah Zhafira', '91-5-131'),
(7755, 91, 132, '91|5', 6, 'Outpatient single child 2', '7970000.00', 'M. Sulthan', '91-5-132'),
(7756, 91, 133, '91|5', 6, 'Outpatient single child 3', '7970000.00', 'Diva Rhea', '91-5-133'),
(7757, 91, NULL, '', 7, 'Normal', '10800000.00', '', '91-7'),
(7758, 91, NULL, '', 8, 'C-Section', '18000000.00', '', '91-8'),
(7759, 91, NULL, '', 9, 'Complication', '5000000.00', '', '91-9'),
(7760, 91, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '91-10'),
(7761, 91, NULL, '', 11, 'Frame', '1500000.00', '', '91-11'),
(7762, 91, NULL, '', 12, 'Lenses', '1500000.00', '', '91-12'),
(7763, 91, NULL, '', 13, 'Contact Lens', '1500000.00', '', '91-13'),
(7764, 92, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 2031 days. regular calculation.', '92-6'),
(7765, 92, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-7'),
(7766, 92, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-8'),
(7767, 92, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-9'),
(7768, 92, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-10'),
(7769, 92, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-11'),
(7770, 92, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-12'),
(7771, 92, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2031 days. minimum work 6 months.', '92-13'),
(7772, 93, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 2081 days. regular calculation. 4 family included', '93-5'),
(7773, 93, 135, '93|5', 5, 'Outpatient married spouse', '5625000.00', 'Susi Noviza', '93-5-135'),
(7774, 93, 136, '93|5', 6, 'Outpatient single child 1', '7970000.00', 'Maryam Khalisa Rahman', '93-5-136'),
(7775, 93, 137, '93|5', 6, 'Outpatient single child 2', '7970000.00', 'Abdullah Azzam Rahman', '93-5-137'),
(7776, 93, 138, '93|5', 6, 'Outpatient single child 3', '7970000.00', 'Ahmad Ibrahim Hanif', '93-5-138'),
(7777, 93, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-7'),
(7778, 93, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-8'),
(7779, 93, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-9'),
(7780, 93, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-10'),
(7781, 93, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-11'),
(7782, 93, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-12'),
(7783, 93, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 2081 days. minimum work 6 months.', '93-13'),
(7784, 94, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1990 days. regular calculation. 4 family included', '94-5'),
(7785, 94, 139, '94|5', 5, 'Outpatient married spouse', '5625000.00', 'Dea Oktovina', '94-5-139'),
(7786, 94, 140, '94|5', 6, 'Outpatient single child 1', '7970000.00', 'Delea OctobelleMarvina', '94-5-140'),
(7787, 94, 141, '94|5', 6, 'Outpatient single child 2', '7970000.00', 'Dennis Junian Marvino', '94-5-141'),
(7788, 94, 142, '94|5', 6, 'Outpatient single child 3', '7970000.00', 'Demia Novel Marvina', '94-5-142'),
(7789, 94, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-7'),
(7790, 94, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-8'),
(7791, 94, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-9'),
(7792, 94, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-10'),
(7793, 94, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-11'),
(7794, 94, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-12'),
(7795, 94, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1990 days. minimum work 6 months.', '94-13'),
(7796, 95, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1969 days. regular calculation.', '95-6'),
(7797, 95, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-7'),
(7798, 95, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-8'),
(7799, 95, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-9'),
(7800, 95, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-10'),
(7801, 95, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-11'),
(7802, 95, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-12'),
(7803, 95, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1969 days. minimum work 6 months.', '95-13'),
(7804, 96, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1962 days. regular calculation.', '96-6'),
(7805, 96, NULL, '', 7, 'Normal', '10800000.00', '', '96-7'),
(7806, 96, NULL, '', 8, 'C-Section', '18000000.00', '', '96-8'),
(7807, 96, NULL, '', 9, 'Complication', '5000000.00', '', '96-9'),
(7808, 96, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '96-10'),
(7809, 96, NULL, '', 11, 'Frame', '1500000.00', '', '96-11'),
(7810, 96, NULL, '', 12, 'Lenses', '1500000.00', '', '96-12'),
(7811, 96, NULL, '', 13, 'Contact Lens', '1500000.00', '', '96-13'),
(7812, 97, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1976 days. regular calculation. 3 family included', '97-5'),
(7813, 97, 146, '97|5', 5, 'Outpatient married spouse', '5625000.00', 'Arti Permata', '97-5-146'),
(7814, 97, 147, '97|5', 6, 'Outpatient single child 1', '7970000.00', 'Direnartha Agastya', '97-5-147'),
(7815, 97, 148, '97|5', 6, 'Outpatient single child 2', '7970000.00', 'Kansa Adyastha Sutraman', '97-5-148'),
(7816, 97, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-7'),
(7817, 97, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-8'),
(7818, 97, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-9'),
(7819, 97, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-10'),
(7820, 97, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-11'),
(7821, 97, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-12'),
(7822, 97, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1976 days. minimum work 6 months.', '97-13'),
(7823, 98, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1941 days. regular calculation. 0 family included', '98-5'),
(7824, 98, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-7'),
(7825, 98, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-8'),
(7826, 98, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-9'),
(7827, 98, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-10'),
(7828, 98, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-11'),
(7829, 98, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-12'),
(7830, 98, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1941 days. minimum work 6 months.', '98-13'),
(7831, 99, NULL, '', 5, 'Outpatient married', '77055.00', 'married, work duration 5 days. Prorata calculation. Family not included', '99-5'),
(7832, 100, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1925 days. regular calculation. 1 family included', '100-5'),
(7833, 100, 151, '100|5', 5, 'Outpatient married spouse', '5625000.00', 'Yohanes Eudes Siga Mango', '100-5-151'),
(7834, 100, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-7'),
(7835, 100, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-8'),
(7836, 100, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-9'),
(7837, 100, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-10'),
(7838, 100, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-11'),
(7839, 100, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-12'),
(7840, 100, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1925 days. minimum work 6 months.', '100-13'),
(7841, 102, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1833 days. regular calculation. 2 family included', '102-5'),
(7842, 102, 152, '102|5', 5, 'Outpatient married spouse', '5625000.00', 'Donna Elvira', '102-5-152'),
(7843, 102, 153, '102|5', 6, 'Outpatient single child 1', '7970000.00', 'Maliq Figlo Satar', '102-5-153'),
(7844, 102, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-7'),
(7845, 102, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-8'),
(7846, 102, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-9'),
(7847, 102, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-10'),
(7848, 102, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-11'),
(7849, 102, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-12'),
(7850, 102, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1833 days. minimum work 6 months.', '102-13'),
(7851, 103, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1619 days. regular calculation. 2 family included', '103-5'),
(7852, 103, 154, '103|5', 5, 'Outpatient married spouse', '5625000.00', 'Wong Liem', '103-5-154'),
(7853, 103, 155, '103|5', 6, 'Outpatient single child 1', '7970000.00', 'Matthew Alvin Wong', '103-5-155'),
(7854, 103, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-7'),
(7855, 103, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-8'),
(7856, 103, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-9'),
(7857, 103, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-10'),
(7858, 103, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-11'),
(7859, 103, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-12'),
(7860, 103, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1619 days. minimum work 6 months.', '103-13'),
(7861, 104, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1598 days. regular calculation. 2 family included', '104-5'),
(7862, 104, 156, '104|5', 5, 'Outpatient married spouse', '5625000.00', 'El Hana Yuliatmaja', '104-5-156'),
(7863, 104, 157, '104|5', 6, 'Outpatient single child 1', '7970000.00', 'Elika Mahdiya Atmaja', '104-5-157'),
(7864, 104, NULL, '', 7, 'Normal', '10800000.00', '', '104-7'),
(7865, 104, NULL, '', 8, 'C-Section', '18000000.00', '', '104-8'),
(7866, 104, NULL, '', 9, 'Complication', '5000000.00', '', '104-9'),
(7867, 104, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '104-10'),
(7868, 104, NULL, '', 11, 'Frame', '1500000.00', '', '104-11'),
(7869, 104, NULL, '', 12, 'Lenses', '1500000.00', '', '104-12'),
(7870, 104, NULL, '', 13, 'Contact Lens', '1500000.00', '', '104-13'),
(7871, 105, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1590 days. regular calculation. 2 family included', '105-5'),
(7872, 105, 158, '105|5', 5, 'Outpatient married spouse', '5625000.00', 'Dalih Ade Solaiha', '105-5-158'),
(7873, 105, 159, '105|5', 6, 'Outpatient single child 1', '7970000.00', 'Aidan Prama Zheesan', '105-5-159'),
(7874, 105, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-7'),
(7875, 105, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-8'),
(7876, 105, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-9'),
(7877, 105, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-10'),
(7878, 105, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-11'),
(7879, 105, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-12'),
(7880, 105, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1590 days. minimum work 6 months.', '105-13'),
(7881, 106, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1527 days. regular calculation. 3 family included', '106-5'),
(7882, 106, 160, '106|5', 5, 'Outpatient married spouse', '5625000.00', 'Rusiani', '106-5-160'),
(7883, 106, 161, '106|5', 6, 'Outpatient single child 1', '7970000.00', 'Tendy Zulkamain', '106-5-161'),
(7884, 106, 162, '106|5', 6, 'Outpatient single child 2', '7970000.00', 'Eca Eliana', '106-5-162'),
(7885, 106, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-7'),
(7886, 106, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-8'),
(7887, 106, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-9'),
(7888, 106, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-10'),
(7889, 106, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-11'),
(7890, 106, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-12'),
(7891, 106, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '106-13'),
(7892, 107, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1527 days. regular calculation. 1 family included', '107-5'),
(7893, 107, 163, '107|5', 5, 'Outpatient married spouse', '5625000.00', 'Yasmina Anindyajati', '107-5-163'),
(7894, 107, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-7'),
(7895, 107, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-8'),
(7896, 107, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-9'),
(7897, 107, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-10');
INSERT INTO `employee_benefit` (`empBenId`, `empBenEmpId`, `empBenRelId`, `empBenParentId`, `empBenBenId`, `empBenLabel`, `empBenNominal`, `empBenDesc`, `unique_index`) VALUES
(7898, 107, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-11'),
(7899, 107, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-12'),
(7900, 107, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1527 days. minimum work 6 months.', '107-13'),
(7901, 108, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1458 days. regular calculation. 2 family included', '108-5'),
(7902, 108, 164, '108|5', 5, 'Outpatient married spouse', '5625000.00', 'Juliane Andanti', '108-5-164'),
(7903, 108, 165, '108|5', 6, 'Outpatient single child 1', '7970000.00', 'Amadeo Putra Projoga', '108-5-165'),
(7904, 108, NULL, '', 7, 'Normal', '10800000.00', '', '108-7'),
(7905, 108, NULL, '', 8, 'C-Section', '18000000.00', '', '108-8'),
(7906, 108, NULL, '', 9, 'Complication', '5000000.00', '', '108-9'),
(7907, 108, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '108-10'),
(7908, 108, NULL, '', 11, 'Frame', '1500000.00', '', '108-11'),
(7909, 108, NULL, '', 12, 'Lenses', '1500000.00', '', '108-12'),
(7910, 108, NULL, '', 13, 'Contact Lens', '1500000.00', '', '108-13'),
(7911, 109, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1311 days. regular calculation. 1 family included', '109-5'),
(7912, 109, 166, '109|5', 5, 'Outpatient married spouse', '5625000.00', 'Henry Asri', '109-5-166'),
(7913, 109, NULL, '', 7, 'Normal', '10800000.00', '', '109-7'),
(7914, 109, NULL, '', 8, 'C-Section', '18000000.00', '', '109-8'),
(7915, 109, NULL, '', 9, 'Complication', '5000000.00', '', '109-9'),
(7916, 109, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '109-10'),
(7917, 109, NULL, '', 11, 'Frame', '1500000.00', '', '109-11'),
(7918, 109, NULL, '', 12, 'Lenses', '1500000.00', '', '109-12'),
(7919, 109, NULL, '', 13, 'Contact Lens', '1500000.00', '', '109-13'),
(7920, 110, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1311 days. regular calculation. 2 family included', '110-5'),
(7921, 110, 167, '110|5', 5, 'Outpatient married spouse', '5625000.00', 'Hamsuri', '110-5-167'),
(7922, 110, 168, '110|5', 6, 'Outpatient single child 1', '7970000.00', 'Arya Razza Makkasau', '110-5-168'),
(7923, 110, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-7'),
(7924, 110, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-8'),
(7925, 110, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-9'),
(7926, 110, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-10'),
(7927, 110, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-11'),
(7928, 110, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-12'),
(7929, 110, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1311 days. minimum work 6 months.', '110-13'),
(7930, 111, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1225 days. regular calculation.', '111-6'),
(7931, 111, NULL, '', 7, 'Normal', '10800000.00', '', '111-7'),
(7932, 111, NULL, '', 8, 'C-Section', '18000000.00', '', '111-8'),
(7933, 111, NULL, '', 9, 'Complication', '5000000.00', '', '111-9'),
(7934, 111, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '111-10'),
(7935, 111, NULL, '', 11, 'Frame', '1500000.00', '', '111-11'),
(7936, 111, NULL, '', 12, 'Lenses', '1500000.00', '', '111-12'),
(7937, 111, NULL, '', 13, 'Contact Lens', '1500000.00', '', '111-13'),
(7938, 112, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1256 days. regular calculation.', '112-6'),
(7939, 112, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-7'),
(7940, 112, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-8'),
(7941, 112, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-9'),
(7942, 112, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-10'),
(7943, 112, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-11'),
(7944, 112, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-12'),
(7945, 112, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '112-13'),
(7946, 113, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1164 days. regular calculation. 3 family included', '113-5'),
(7947, 113, 169, '113|5', 5, 'Outpatient married spouse', '5625000.00', 'Rini Susanti', '113-5-169'),
(7948, 113, 170, '113|5', 6, 'Outpatient single child 1', '7970000.00', 'Tania Audia Nivadi', '113-5-170'),
(7949, 113, 171, '113|5', 6, 'Outpatient single child 2', '7970000.00', 'Sahira Salsabila', '113-5-171'),
(7950, 113, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-7'),
(7951, 113, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-8'),
(7952, 113, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-9'),
(7953, 113, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-10'),
(7954, 113, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-11'),
(7955, 113, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-12'),
(7956, 113, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1164 days. minimum work 6 months.', '113-13'),
(7957, 114, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1155 days. regular calculation. 1 family included', '114-5'),
(7958, 114, 172, '114|5', 5, 'Outpatient married spouse', '5625000.00', 'Kefas T Ponggawa', '114-5-172'),
(7959, 114, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-7'),
(7960, 114, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-8'),
(7961, 114, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-9'),
(7962, 114, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-10'),
(7963, 114, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-11'),
(7964, 114, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-12'),
(7965, 114, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1155 days. minimum work 6 months.', '114-13'),
(7966, 115, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1072 days. regular calculation. 3 family included', '115-5'),
(7967, 115, 173, '115|5', 5, 'Outpatient married spouse', '5625000.00', 'Novie', '115-5-173'),
(7968, 115, 174, '115|5', 6, 'Outpatient single child 1', '7970000.00', 'Mardiyah Azizah Ravie Putri', '115-5-174'),
(7969, 115, 175, '115|5', 6, 'Outpatient single child 2', '7970000.00', 'Athallah Dhawi Dzaki Ravie Putra', '115-5-175'),
(7970, 115, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-7'),
(7971, 115, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-8'),
(7972, 115, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-9'),
(7973, 115, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-10'),
(7974, 115, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-11'),
(7975, 115, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-12'),
(7976, 115, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '115-13'),
(7977, 116, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1486 days. regular calculation.', '116-6'),
(7978, 116, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-7'),
(7979, 116, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-8'),
(7980, 116, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-9'),
(7981, 116, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-10'),
(7982, 116, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-11'),
(7983, 116, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-12'),
(7984, 116, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1486 days. minimum work 6 months.', '116-13'),
(7985, 117, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1072 days. regular calculation. 2 family included', '117-5'),
(7986, 117, 176, '117|5', 5, 'Outpatient married spouse', '5625000.00', 'Laily Suharlina Mahalli', '117-5-176'),
(7987, 117, 177, '117|5', 6, 'Outpatient single child 1', '7970000.00', 'Radhika Ayesha Innatha', '117-5-177'),
(7988, 117, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-7'),
(7989, 117, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-8'),
(7990, 117, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-9'),
(7991, 117, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-10'),
(7992, 117, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-11'),
(7993, 117, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-12'),
(7994, 117, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '117-13'),
(7995, 118, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1072 days. regular calculation.', '118-6'),
(7996, 118, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-7'),
(7997, 118, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-8'),
(7998, 118, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-9'),
(7999, 118, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-10'),
(8000, 118, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-11'),
(8001, 118, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-12'),
(8002, 118, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1072 days. minimum work 6 months.', '118-13'),
(8003, 119, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1010 days. regular calculation. 4 family included', '119-5'),
(8004, 119, 178, '119|5', 5, 'Outpatient married spouse', '5625000.00', 'Achmad Fauzi', '119-5-178'),
(8005, 119, 179, '119|5', 6, 'Outpatient single child 1', '7970000.00', 'Maria Jezzyca Oktaviane', '119-5-179'),
(8006, 119, 180, '119|5', 6, 'Outpatient single child 2', '7970000.00', 'Nickolas Delfino Abimanyu', '119-5-180'),
(8007, 119, 181, '119|5', 6, 'Outpatient single child 3', '7970000.00', 'Putri Zieta N. Fauzi', '119-5-181'),
(8008, 119, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-7'),
(8009, 119, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-8'),
(8010, 119, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-9'),
(8011, 119, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-10'),
(8012, 119, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-11'),
(8013, 119, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-12'),
(8014, 119, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1010 days. minimum work 6 months.', '119-13'),
(8015, 120, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 996 days. regular calculation.', '120-6'),
(8016, 120, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-7'),
(8017, 120, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-8'),
(8018, 120, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-9'),
(8019, 120, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-10'),
(8020, 120, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-11'),
(8021, 120, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-12'),
(8022, 120, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 996 days. minimum work 6 months.', '120-13'),
(8023, 121, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 986 days. regular calculation.', '121-6'),
(8024, 121, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-7'),
(8025, 121, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-8'),
(8026, 121, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-9'),
(8027, 121, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-10'),
(8028, 121, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-11'),
(8029, 121, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-12'),
(8030, 121, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 986 days. minimum work 6 months.', '121-13'),
(8031, 122, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1256 days. regular calculation. 4 family included', '122-5'),
(8032, 122, 182, '122|5', 5, 'Outpatient married spouse', '5625000.00', 'Damiyah', '122-5-182'),
(8033, 122, 183, '122|5', 6, 'Outpatient single child 1', '7970000.00', 'Aulia Lufitawati', '122-5-183'),
(8034, 122, 184, '122|5', 6, 'Outpatient single child 2', '7970000.00', 'M. Faiz Syahidan', '122-5-184'),
(8035, 122, 185, '122|5', 6, 'Outpatient single child 3', '7970000.00', 'Fayyiz Hanifa Amidha', '122-5-185'),
(8036, 122, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-7'),
(8037, 122, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-8'),
(8038, 122, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-9'),
(8039, 122, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-10'),
(8040, 122, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-11'),
(8041, 122, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-12'),
(8042, 122, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1256 days. minimum work 6 months.', '122-13'),
(8043, 123, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 947 days. regular calculation. 1 family included', '123-5'),
(8044, 123, 186, '123|5', 5, 'Outpatient married spouse', '5625000.00', 'Budhy Chandra', '123-5-186'),
(8045, 123, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-7'),
(8046, 123, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-8'),
(8047, 123, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-9'),
(8048, 123, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-10'),
(8049, 123, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-11'),
(8050, 123, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-12'),
(8051, 123, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '123-13'),
(8052, 124, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 947 days. regular calculation. 3 family included', '124-5'),
(8053, 124, 187, '124|5', 5, 'Outpatient married spouse', '5625000.00', 'Inayati Aenah', '124-5-187'),
(8054, 124, 188, '124|5', 6, 'Outpatient single child 1', '7970000.00', 'Raniya Khudeva Arif', '124-5-188'),
(8055, 124, 189, '124|5', 6, 'Outpatient single child 2', '7970000.00', 'M Hafizh Arif', '124-5-189'),
(8056, 124, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-7'),
(8057, 124, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-8'),
(8058, 124, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-9'),
(8059, 124, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-10'),
(8060, 124, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-11'),
(8061, 124, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-12'),
(8062, 124, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '124-13'),
(8063, 125, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 947 days. regular calculation. 4 family included', '125-5'),
(8064, 125, 190, '125|5', 5, 'Outpatient married spouse', '5625000.00', 'Djero Putu Darmike Nurhayati', '125-5-190'),
(8065, 125, 191, '125|5', 6, 'Outpatient single child 1', '7970000.00', 'Ida Ayu Oka Chandenni Sativaveda', '125-5-191'),
(8066, 125, 192, '125|5', 6, 'Outpatient single child 2', '7970000.00', 'Ida Bagus Made Gripati Sattivaveda', '125-5-192'),
(8067, 125, 193, '125|5', 6, 'Outpatient single child 3', '7970000.00', 'Ida Bagus Ketut Dhanyavada Sativaveda', '125-5-193'),
(8068, 125, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-7'),
(8069, 125, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-8'),
(8070, 125, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-9'),
(8071, 125, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-10'),
(8072, 125, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-11'),
(8073, 125, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-12'),
(8074, 125, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 947 days. minimum work 6 months.', '125-13'),
(8075, 126, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 930 days. regular calculation.', '126-6'),
(8076, 126, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-7'),
(8077, 126, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-8'),
(8078, 126, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-9'),
(8079, 126, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-10'),
(8080, 126, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-11'),
(8081, 126, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-12'),
(8082, 126, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 930 days. minimum work 6 months.', '126-13'),
(8083, 127, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1080 days. regular calculation.', '127-6'),
(8084, 127, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-7'),
(8085, 127, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-8'),
(8086, 127, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-9'),
(8087, 127, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-10'),
(8088, 127, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-11'),
(8089, 127, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-12'),
(8090, 127, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1080 days. minimum work 6 months.', '127-13'),
(8091, 128, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 1085 days. regular calculation.', '128-6'),
(8092, 128, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-7'),
(8093, 128, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-8'),
(8094, 128, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-9'),
(8095, 128, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-10'),
(8096, 128, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-11'),
(8097, 128, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-12'),
(8098, 128, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1085 days. minimum work 6 months.', '128-13'),
(8099, 129, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 877 days. regular calculation. 3 family included', '129-5'),
(8100, 129, 194, '129|5', 5, 'Outpatient married spouse', '5625000.00', 'Retno Kartikowati', '129-5-194'),
(8101, 129, 195, '129|5', 6, 'Outpatient single child 1', '7970000.00', 'Tasbitah Najwa', '129-5-195'),
(8102, 129, 196, '129|5', 6, 'Outpatient single child 2', '7970000.00', 'Shafa Azura', '129-5-196'),
(8103, 129, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-7'),
(8104, 129, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-8'),
(8105, 129, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-9'),
(8106, 129, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-10'),
(8107, 129, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-11'),
(8108, 129, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-12'),
(8109, 129, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 877 days. minimum work 6 months.', '129-13'),
(8110, 130, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 856 days. regular calculation. 4 family included', '130-5'),
(8111, 130, 197, '130|5', 5, 'Outpatient married spouse', '5625000.00', 'Lailatul Muatiroh', '130-5-197'),
(8112, 130, 198, '130|5', 6, 'Outpatient single child 1', '7970000.00', 'Naufal Syuja Zapariza', '130-5-198'),
(8113, 130, 199, '130|5', 6, 'Outpatient single child 2', '7970000.00', 'Aulia Syifa Zapariza', '130-5-199'),
(8114, 130, 200, '130|5', 6, 'Outpatient single child 3', '7970000.00', 'Nabil Al-Faresel Zapariza', '130-5-200'),
(8115, 130, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-7'),
(8116, 130, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-8'),
(8117, 130, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-9'),
(8118, 130, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-10'),
(8119, 130, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-11'),
(8120, 130, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-12'),
(8121, 130, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 856 days. minimum work 6 months.', '130-13'),
(8122, 131, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 776 days. regular calculation. 2 family included', '131-5'),
(8123, 131, 201, '131|5', 5, 'Outpatient married spouse', '5625000.00', 'Adi Widyanto', '131-5-201'),
(8124, 131, 202, '131|5', 6, 'Outpatient single child 1', '7970000.00', 'Galang Nitisara Punto', '131-5-202'),
(8125, 131, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-7'),
(8126, 131, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-8'),
(8127, 131, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-9'),
(8128, 131, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-10'),
(8129, 131, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-11'),
(8130, 131, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-12'),
(8131, 131, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 776 days. minimum work 6 months.', '131-13'),
(8132, 132, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 828 days. regular calculation. 3 family included', '132-5'),
(8133, 132, 203, '132|5', 5, 'Outpatient married spouse', '5625000.00', 'Syerlina Rombe', '132-5-203'),
(8134, 132, 204, '132|5', 6, 'Outpatient single child 1', '7970000.00', 'Alfida Kintabela Subekti', '132-5-204'),
(8135, 132, 205, '132|5', 6, 'Outpatient single child 2', '7970000.00', 'Zaujane Kantadara Subekti', '132-5-205'),
(8136, 132, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-7'),
(8137, 132, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-8'),
(8138, 132, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-9'),
(8139, 132, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-10'),
(8140, 132, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-11'),
(8141, 132, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-12'),
(8142, 132, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 828 days. minimum work 6 months.', '132-13'),
(8143, 133, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 793 days. regular calculation. 1 family included', '133-5'),
(8144, 133, 206, '133|5', 5, 'Outpatient married spouse', '5625000.00', 'Wintang Haryokusumo', '133-5-206'),
(8145, 133, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-7'),
(8146, 133, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-8'),
(8147, 133, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-9'),
(8148, 133, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-10'),
(8149, 133, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-11'),
(8150, 133, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-12'),
(8151, 133, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 793 days. minimum work 6 months.', '133-13'),
(8152, 134, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 798 days. regular calculation.', '134-6'),
(8153, 134, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-7'),
(8154, 134, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-8'),
(8155, 134, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-9'),
(8156, 134, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-10'),
(8157, 134, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-11'),
(8158, 134, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-12'),
(8159, 134, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 798 days. minimum work 6 months.', '134-13'),
(8160, 135, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 786 days. regular calculation. 2 family included', '135-5'),
(8161, 135, 207, '135|5', 5, 'Outpatient married spouse', '5625000.00', 'Fransiska Ari Indrawati', '135-5-207'),
(8162, 135, 208, '135|5', 5, 'Outpatient married child 1', '5625000.00', 'Ailena Brisa Ramedhan', '135-5-208'),
(8163, 135, NULL, '', 7, 'Normal', '10800000.00', '', '135-7'),
(8164, 135, NULL, '', 8, 'C-Section', '18000000.00', '', '135-8'),
(8165, 135, NULL, '', 9, 'Complication', '5000000.00', '', '135-9'),
(8166, 135, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '135-10'),
(8167, 135, NULL, '', 11, 'Frame', '1500000.00', '', '135-11'),
(8168, 135, NULL, '', 12, 'Lenses', '1500000.00', '', '135-12'),
(8169, 135, NULL, '', 13, 'Contact Lens', '1500000.00', '', '135-13'),
(8170, 136, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 744 days. regular calculation.', '136-6'),
(8171, 136, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-7'),
(8172, 136, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-8'),
(8173, 136, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-9'),
(8174, 136, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-10'),
(8175, 136, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-11'),
(8176, 136, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-12'),
(8177, 136, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 744 days. minimum work 6 months.', '136-13'),
(8178, 137, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 737 days. regular calculation. 3 family included', '137-5'),
(8179, 137, 209, '137|5', 5, 'Outpatient married spouse', '5625000.00', 'Teguh Rismanto', '137-5-209'),
(8180, 137, 210, '137|5', 6, 'Outpatient single child 1', '7970000.00', 'Rain Geraldi Milan', '137-5-210'),
(8181, 137, 211, '137|5', 6, 'Outpatient single child 2', '7970000.00', 'Rain Marina Revaline', '137-5-211'),
(8182, 137, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-7'),
(8183, 137, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-8'),
(8184, 137, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-9'),
(8185, 137, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-10'),
(8186, 137, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-11'),
(8187, 137, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-12'),
(8188, 137, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 737 days. minimum work 6 months.', '137-13'),
(8189, 138, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 735 days. regular calculation.', '138-6'),
(8190, 138, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-7'),
(8191, 138, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-8'),
(8192, 138, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-9'),
(8193, 138, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-10'),
(8194, 138, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-11'),
(8195, 138, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-12'),
(8196, 138, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 735 days. minimum work 6 months.', '138-13'),
(8197, 139, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 722 days. regular calculation. 3 family included', '139-5'),
(8198, 139, 212, '139|5', 5, 'Outpatient married spouse', '5625000.00', 'Indra eryanto', '139-5-212'),
(8199, 139, 213, '139|5', 6, 'Outpatient single child 1', '7970000.00', 'Annisa Salsabila', '139-5-213'),
(8200, 139, 214, '139|5', 6, 'Outpatient single child 2', '7970000.00', 'Naeema Kirana Dewi', '139-5-214'),
(8201, 139, NULL, '', 7, 'Normal', '10800000.00', '', '139-7'),
(8202, 139, NULL, '', 8, 'C-Section', '18000000.00', '', '139-8'),
(8203, 139, NULL, '', 9, 'Complication', '5000000.00', '', '139-9'),
(8204, 139, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '139-10'),
(8205, 139, NULL, '', 11, 'Frame', '1500000.00', '', '139-11'),
(8206, 139, NULL, '', 12, 'Lenses', '1500000.00', '', '139-12'),
(8207, 139, NULL, '', 13, 'Contact Lens', '1500000.00', '', '139-13'),
(8208, 140, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 693 days. regular calculation.', '140-6'),
(8209, 140, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-7'),
(8210, 140, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-8'),
(8211, 140, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-9'),
(8212, 140, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-10'),
(8213, 140, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-11'),
(8214, 140, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-12'),
(8215, 140, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 693 days. minimum work 6 months.', '140-13'),
(8216, 141, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 732 days. regular calculation.', '141-6'),
(8217, 141, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-7'),
(8218, 141, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-8'),
(8219, 141, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-9'),
(8220, 141, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-10'),
(8221, 141, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-11'),
(8222, 141, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-12'),
(8223, 141, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 732 days. minimum work 6 months.', '141-13'),
(8224, 142, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 667 days. regular calculation. 1 family included', '142-5'),
(8225, 142, 215, '142|5', 5, 'Outpatient married spouse', '5625000.00', 'Dandi Achmad Ramdhani', '142-5-215'),
(8226, 142, NULL, '', 7, 'Normal', '10800000.00', '', '142-7'),
(8227, 142, NULL, '', 8, 'C-Section', '18000000.00', '', '142-8'),
(8228, 142, NULL, '', 9, 'Complication', '5000000.00', '', '142-9'),
(8229, 142, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '142-10'),
(8230, 142, NULL, '', 11, 'Frame', '1500000.00', '', '142-11'),
(8231, 142, NULL, '', 12, 'Lenses', '1500000.00', '', '142-12'),
(8232, 142, NULL, '', 13, 'Contact Lens', '1500000.00', '', '142-13'),
(8233, 143, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 639 days. regular calculation.', '143-6'),
(8234, 143, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-7'),
(8235, 143, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-8'),
(8236, 143, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-9'),
(8237, 143, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-10'),
(8238, 143, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-11'),
(8239, 143, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-12'),
(8240, 143, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 639 days. minimum work 6 months.', '143-13'),
(8241, 144, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 1094 days. regular calculation. 3 family included', '144-5'),
(8242, 144, 216, '144|5', 5, 'Outpatient married spouse', '5625000.00', 'Agnette Kartika Sumarauw', '144-5-216'),
(8243, 144, 217, '144|5', 6, 'Outpatient single child 1', '7970000.00', 'Kayana Yudakris Tondang', '144-5-217'),
(8244, 144, 218, '144|5', 6, 'Outpatient single child 2', '7970000.00', 'Maximilian Jazz Tondang', '144-5-218'),
(8245, 144, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-7'),
(8246, 144, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-8'),
(8247, 144, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-9'),
(8248, 144, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-10'),
(8249, 144, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-11'),
(8250, 144, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-12'),
(8251, 144, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 1094 days. minimum work 6 months.', '144-13'),
(8252, 145, NULL, '', 5, 'Outpatient married', '30822.00', 'married, work duration 2 days. Prorata calculation. Family not included', '145-5'),
(8253, 146, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 615 days. regular calculation.', '146-6'),
(8254, 146, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-7'),
(8255, 146, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-8'),
(8256, 146, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-9'),
(8257, 146, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-10'),
(8258, 146, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-11'),
(8259, 146, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-12'),
(8260, 146, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 615 days. minimum work 6 months.', '146-13'),
(8261, 147, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 601 days. regular calculation. 4 family included', '147-5'),
(8262, 147, 221, '147|5', 5, 'Outpatient married spouse', '5625000.00', 'A Muh Hijaz Jalil', '147-5-221'),
(8263, 147, 222, '147|5', 6, 'Outpatient single child 1', '7970000.00', 'Andi Naila Salsabila Hjaz', '147-5-222'),
(8264, 147, 223, '147|5', 6, 'Outpatient single child 2', '7970000.00', 'Andi Dhaifa Adelia Hijaz', '147-5-223'),
(8265, 147, 224, '147|5', 6, 'Outpatient single child 3', '7970000.00', 'Andi Waldan Rauf Hijaz', '147-5-224'),
(8266, 147, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-7'),
(8267, 147, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-8'),
(8268, 147, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-9'),
(8269, 147, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-10'),
(8270, 147, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-11'),
(8271, 147, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-12'),
(8272, 147, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 601 days. minimum work 6 months.', '147-13'),
(8273, 148, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 576 days. regular calculation.', '148-6'),
(8274, 148, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-7'),
(8275, 148, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-8'),
(8276, 148, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-9'),
(8277, 148, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-10'),
(8278, 148, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-11'),
(8279, 148, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-12'),
(8280, 148, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '148-13'),
(8281, 149, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 576 days. regular calculation.', '149-6'),
(8282, 149, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-7'),
(8283, 149, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-8'),
(8284, 149, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-9'),
(8285, 149, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-10'),
(8286, 149, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-11'),
(8287, 149, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-12'),
(8288, 149, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '149-13'),
(8289, 150, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 576 days. regular calculation.', '150-6'),
(8290, 150, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-7'),
(8291, 150, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-8'),
(8292, 150, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-9'),
(8293, 150, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-10'),
(8294, 150, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-11'),
(8295, 150, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-12'),
(8296, 150, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '150-13'),
(8297, 151, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 576 days. regular calculation.', '151-6'),
(8298, 151, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-7'),
(8299, 151, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-8'),
(8300, 151, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-9'),
(8301, 151, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-10'),
(8302, 151, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-11'),
(8303, 151, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-12'),
(8304, 151, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '151-13'),
(8305, 152, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 576 days. regular calculation. 2 family included', '152-5'),
(8306, 152, 225, '152|5', 5, 'Outpatient married spouse', '5625000.00', 'Eni Erliana', '152-5-225'),
(8307, 152, 226, '152|5', 6, 'Outpatient single child 1', '7970000.00', 'Lusiana Odelia', '152-5-226'),
(8308, 152, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-7'),
(8309, 152, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-8'),
(8310, 152, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-9'),
(8311, 152, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-10'),
(8312, 152, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-11'),
(8313, 152, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-12'),
(8314, 152, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 576 days. minimum work 6 months.', '152-13'),
(8315, 153, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 580 days. regular calculation. 1 family included', '153-5'),
(8316, 153, 227, '153|5', 5, 'Outpatient married spouse', '5625000.00', 'Christine Nisrina', '153-5-227'),
(8317, 153, NULL, '', 7, 'Normal', '10800000.00', '', '153-7'),
(8318, 153, NULL, '', 8, 'C-Section', '18000000.00', '', '153-8'),
(8319, 153, NULL, '', 9, 'Complication', '5000000.00', '', '153-9'),
(8320, 153, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '153-10'),
(8321, 153, NULL, '', 11, 'Frame', '1500000.00', '', '153-11'),
(8322, 153, NULL, '', 12, 'Lenses', '1500000.00', '', '153-12'),
(8323, 153, NULL, '', 13, 'Contact Lens', '1500000.00', '', '153-13'),
(8324, 154, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 525 days. regular calculation. 3 family included', '154-5'),
(8325, 154, 228, '154|5', 5, 'Outpatient married spouse', '5625000.00', 'Ninis Sityaningrum', '154-5-228'),
(8326, 154, 229, '154|5', 6, 'Outpatient single child 1', '7970000.00', 'Aditya Eka Putra Atmajaya', '154-5-229'),
(8327, 154, 230, '154|5', 6, 'Outpatient single child 2', '7970000.00', 'Nasyhilla Dwi Putri', '154-5-230'),
(8328, 154, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-7'),
(8329, 154, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-8'),
(8330, 154, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-9'),
(8331, 154, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-10'),
(8332, 154, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-11'),
(8333, 154, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-12'),
(8334, 154, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 525 days. minimum work 6 months.', '154-13'),
(8335, 155, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 520 days. regular calculation. 3 family included', '155-5'),
(8336, 155, 231, '155|5', 6, 'Outpatient single spouse', '7970000.00', 'Nurmalasari', '155-5-231'),
(8337, 155, 232, '155|5', 6, 'Outpatient single child 1', '7970000.00', 'Gabri Perboar Sengga', '155-5-232'),
(8338, 155, 233, '155|5', 6, 'Outpatient single child 2', '7970000.00', 'Stefano De Natale Sengga', '155-5-233'),
(8339, 155, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-7'),
(8340, 155, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-8');
INSERT INTO `employee_benefit` (`empBenId`, `empBenEmpId`, `empBenRelId`, `empBenParentId`, `empBenBenId`, `empBenLabel`, `empBenNominal`, `empBenDesc`, `unique_index`) VALUES
(8341, 155, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-9'),
(8342, 155, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-10'),
(8343, 155, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-11'),
(8344, 155, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-12'),
(8345, 155, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 520 days. minimum work 6 months.', '155-13'),
(8346, 156, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 511 days. regular calculation.', '156-6'),
(8347, 156, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-7'),
(8348, 156, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-8'),
(8349, 156, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-9'),
(8350, 156, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-10'),
(8351, 156, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-11'),
(8352, 156, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-12'),
(8353, 156, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 511 days. minimum work 6 months.', '156-13'),
(8354, 157, NULL, '', 6, 'Outpatient single', '7970000.00', 'single, work duration 506 days. regular calculation.', '157-6'),
(8355, 157, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-7'),
(8356, 157, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-8'),
(8357, 157, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-9'),
(8358, 157, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-10'),
(8359, 157, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-11'),
(8360, 157, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-12'),
(8361, 157, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 506 days. minimum work 6 months.', '157-13'),
(8362, 158, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 491 days. regular calculation. 3 family included', '158-5'),
(8363, 158, 234, '158|5', 5, 'Outpatient married spouse', '5625000.00', 'Lidya Friyani Mangipi', '158-5-234'),
(8364, 158, 235, '158|5', 6, 'Outpatient single child 1', '7970000.00', 'El Goldian', '158-5-235'),
(8365, 158, 236, '158|5', 6, 'Outpatient single child 2', '7970000.00', 'Geoffrey', '158-5-236'),
(8366, 158, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-7'),
(8367, 158, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-8'),
(8368, 158, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-9'),
(8369, 158, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-10'),
(8370, 158, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-11'),
(8371, 158, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-12'),
(8372, 158, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 491 days. minimum work 6 months.', '158-13'),
(8373, 159, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 463 days. regular calculation. 3 family included', '159-5'),
(8374, 159, 237, '159|5', 5, 'Outpatient married spouse', '5625000.00', 'Ida Harida', '159-5-237'),
(8375, 159, 238, '159|5', 6, 'Outpatient single child 1', '7970000.00', 'Adrian Agung Dharmawan', '159-5-238'),
(8376, 159, 239, '159|5', 6, 'Outpatient single child 2', '7970000.00', 'Audria Rianne', '159-5-239'),
(8377, 159, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-7'),
(8378, 159, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-8'),
(8379, 159, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-9'),
(8380, 159, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-10'),
(8381, 159, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-11'),
(8382, 159, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-12'),
(8383, 159, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 463 days. minimum work 6 months.', '159-13'),
(8384, 160, NULL, '', 5, 'Outpatient married', '30822.00', 'married, work duration 2 days. Prorata calculation. Family not included', '160-5'),
(8385, 161, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 459 days. regular calculation. 1 family included', '161-5'),
(8386, 161, 241, '161|5', 5, 'Outpatient married spouse', '5625000.00', 'Afifi Rahmadetiassani', '161-5-241'),
(8387, 161, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-7'),
(8388, 161, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-8'),
(8389, 161, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-9'),
(8390, 161, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-10'),
(8391, 161, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-11'),
(8392, 161, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-12'),
(8393, 161, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 459 days. minimum work 6 months.', '161-13'),
(8394, 162, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 419 days. regular calculation. 3 family included', '162-5'),
(8395, 162, 242, '162|5', 5, 'Outpatient married spouse', '5625000.00', 'Irianto Dwi Gunawan', '162-5-242'),
(8396, 162, 243, '162|5', 6, 'Outpatient single child 1', '7970000.00', 'David Christian Gunawan', '162-5-243'),
(8397, 162, 244, '162|5', 6, 'Outpatient single child 2', '7970000.00', 'Daniel Christian Gunawan', '162-5-244'),
(8398, 162, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-7'),
(8399, 162, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-8'),
(8400, 162, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-9'),
(8401, 162, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-10'),
(8402, 162, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-11'),
(8403, 162, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-12'),
(8404, 162, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 419 days. minimum work 6 months.', '162-13'),
(8405, 163, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 372 days. regular calculation. 3 family included', '163-5'),
(8406, 163, 245, '163|5', 5, 'Outpatient married spouse', '5625000.00', 'Pandu Setia', '163-5-245'),
(8407, 163, 246, '163|5', 6, 'Outpatient single child 1', '7970000.00', 'Razaska Aqso Setia', '163-5-246'),
(8408, 163, 247, '163|5', 6, 'Outpatient single child 2', '7970000.00', 'Arrazaq Ikram Setia', '163-5-247'),
(8409, 163, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-7'),
(8410, 163, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-8'),
(8411, 163, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-9'),
(8412, 163, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-10'),
(8413, 163, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-11'),
(8414, 163, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-12'),
(8415, 163, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '163-13'),
(8416, 164, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 372 days. regular calculation. 3 family included', '164-5'),
(8417, 164, 248, '164|5', 5, 'Outpatient married spouse', '5625000.00', 'M Hikmah Deri Suryana', '164-5-248'),
(8418, 164, 249, '164|5', 6, 'Outpatient single child 1', '7970000.00', 'Syafira Ramlin', '164-5-249'),
(8419, 164, 250, '164|5', 6, 'Outpatient single child 2', '7970000.00', 'Delia Nada Suryana', '164-5-250'),
(8420, 164, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-7'),
(8421, 164, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-8'),
(8422, 164, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-9'),
(8423, 164, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-10'),
(8424, 164, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-11'),
(8425, 164, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-12'),
(8426, 164, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '164-13'),
(8427, 165, NULL, '', 5, 'Outpatient married', '5625000.00', 'married, work duration 372 days. regular calculation. 2 family included', '165-5'),
(8428, 165, 251, '165|5', 6, 'Outpatient single child 1', '7970000.00', 'Omar Shidqi M Sjukri', '165-5-251'),
(8429, 165, 252, '165|5', 6, 'Outpatient single child 2', '7970000.00', 'Kenzi Errando M Sjukri', '165-5-252'),
(8430, 165, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-7'),
(8431, 165, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-8'),
(8432, 165, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-9'),
(8433, 165, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-10'),
(8434, 165, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-11'),
(8435, 165, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-12'),
(8436, 165, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 372 days. minimum work 6 months.', '165-13'),
(8437, 166, NULL, '', 5, 'Outpatient married', '5424658.00', 'married, work duration 352 days. Prorata calculation. 3 family included', ''),
(8438, 166, 253, '166|5', 5, 'Outpatient married spouse', '5625000.00', 'Diah Radini Noerdjito', '166-5-253'),
(8439, 166, 254, '166|5', 6, 'Outpatient single child 1', '7970000.00', 'Bhadrika Cettadhira Hidayanto', '166-5-254'),
(8440, 166, 255, '166|5', 6, 'Outpatient single child 2', '7970000.00', 'Prajnacetta Sarwendriya Hidayanto', '166-5-255'),
(8441, 166, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-7'),
(8442, 166, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-8'),
(8443, 166, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-9'),
(8444, 166, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-10'),
(8445, 166, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-11'),
(8446, 166, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-12'),
(8447, 166, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 352 days. minimum work 6 months.', '166-13'),
(8448, 167, 256, '167|5', 5, 'Outpatient married spouse', '5625000.00', 'Dina Maulida', '167-5-256'),
(8449, 167, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-7'),
(8450, 167, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-8'),
(8451, 167, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-9'),
(8452, 167, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-10'),
(8453, 167, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-11'),
(8454, 167, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-12'),
(8455, 167, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 355 days. minimum work 6 months.', '167-13'),
(8456, 168, 257, '168|5', 5, 'Outpatient married spouse', '5625000.00', 'Yudhanti', '168-5-257'),
(8457, 168, 258, '168|5', 6, 'Outpatient single child 1', '7970000.00', 'Raul Raffi Hakeem', '168-5-258'),
(8458, 168, 259, '168|5', 6, 'Outpatient single child 2', '7970000.00', 'Adeeba Mandana', '168-5-259'),
(8459, 168, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-7'),
(8460, 168, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-8'),
(8461, 168, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-9'),
(8462, 168, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-10'),
(8463, 168, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-11'),
(8464, 168, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-12'),
(8465, 168, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 350 days. minimum work 6 months.', '168-13'),
(8466, 169, 260, '169|5', 5, 'Outpatient married spouse', '5625000.00', 'Ratih Retno Ratri', '169-5-260'),
(8467, 169, 261, '169|5', 6, 'Outpatient single child 1', '7970000.00', 'Kevin Kanaka Swagoputra', '169-5-261'),
(8468, 169, NULL, '', 7, 'Normal', '10800000.00', '', '169-7'),
(8469, 169, NULL, '', 8, 'C-Section', '18000000.00', '', '169-8'),
(8470, 169, NULL, '', 9, 'Complication', '5000000.00', '', '169-9'),
(8471, 169, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '169-10'),
(8472, 169, NULL, '', 11, 'Frame', '1500000.00', '', '169-11'),
(8473, 169, NULL, '', 12, 'Lenses', '1500000.00', '', '169-12'),
(8474, 169, NULL, '', 13, 'Contact Lens', '1500000.00', '', '169-13'),
(8475, 170, 262, '170|5', 5, 'Outpatient married spouse', '5625000.00', 'Gusman Yahya', '170-5-262'),
(8476, 170, 263, '170|5', 6, 'Outpatient single child 1', '7970000.00', 'Audrey Shamira', '170-5-263'),
(8477, 170, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-7'),
(8478, 170, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-8'),
(8479, 170, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-9'),
(8480, 170, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-10'),
(8481, 170, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-11'),
(8482, 170, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-12'),
(8483, 170, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 338 days. minimum work 6 months.', '170-13'),
(8484, 171, NULL, '', 6, 'Outpatient single', '6769041.00', 'single, work duration 310 days. Prorata calculation.', '171-6'),
(8485, 171, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-7'),
(8486, 171, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-8'),
(8487, 171, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-9'),
(8488, 171, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-10'),
(8489, 171, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-11'),
(8490, 171, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-12'),
(8491, 171, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 310 days. minimum work 6 months.', '171-13'),
(8492, 172, 264, '172|5', 5, 'Outpatient married spouse', '5625000.00', 'Suranti', '172-5-264'),
(8493, 172, 265, '172|5', 6, 'Outpatient single child 1', '7970000.00', 'Aulia Utami Wasiorima Saryadi', '172-5-265'),
(8494, 172, 266, '172|5', 6, 'Outpatient single child 2', '7970000.00', 'Argatsani Derawan Setyo Saryadi', '172-5-266'),
(8495, 172, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-7'),
(8496, 172, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-8'),
(8497, 172, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-9'),
(8498, 172, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-10'),
(8499, 172, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-11'),
(8500, 172, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-12'),
(8501, 172, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 254 days. minimum work 6 months.', '172-13'),
(8502, 173, 267, '173|5', 5, 'Outpatient married spouse', '5625000.00', 'Tasori', '173-5-267'),
(8503, 173, 268, '173|5', 6, 'Outpatient single child 1', '7970000.00', 'Nicho Bagas Pratama', '173-5-268'),
(8504, 173, 269, '173|5', 6, 'Outpatient single child 2', '7970000.00', 'Nikita Adhia Kirana', '173-5-269'),
(8505, 173, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-7'),
(8506, 173, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-8'),
(8507, 173, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-9'),
(8508, 173, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-10'),
(8509, 173, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-11'),
(8510, 173, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-12'),
(8511, 173, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 247 days. minimum work 6 months.', '173-13'),
(8512, 174, 270, '174|5', 5, 'Outpatient married spouse', '5625000.00', 'Budi Oktavian Nasution', '174-5-270'),
(8513, 174, 271, '174|5', 6, 'Outpatient single child 1', '7970000.00', 'Radit Havian Kasmir', '174-5-271'),
(8514, 174, 272, '174|5', 6, 'Outpatient single child 2', '7970000.00', 'Randa Havian Kasmir', '174-5-272'),
(8515, 174, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-7'),
(8516, 174, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-8'),
(8517, 174, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-9'),
(8518, 174, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-10'),
(8519, 174, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-11'),
(8520, 174, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-12'),
(8521, 174, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '174-13'),
(8522, 175, 273, '175|5', 5, 'Outpatient married spouse', '5625000.00', 'Abdan Nafik', '175-5-273'),
(8523, 175, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-7'),
(8524, 175, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-8'),
(8525, 175, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-9'),
(8526, 175, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-10'),
(8527, 175, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-11'),
(8528, 175, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-12'),
(8529, 175, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 212 days. minimum work 6 months.', '175-13'),
(8530, 176, NULL, '', 6, 'Outpatient single', '4323452.00', 'single, work duration 198 days. Prorata calculation.', '176-6'),
(8531, 176, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-7'),
(8532, 176, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-8'),
(8533, 176, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-9'),
(8534, 176, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-10'),
(8535, 176, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-11'),
(8536, 176, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-12'),
(8537, 176, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 198 days. minimum work 6 months.', '176-13'),
(8538, 177, 274, '177|5', 5, 'Outpatient married spouse', '5625000.00', 'Dewi Indah Sari', '177-5-274'),
(8539, 177, 275, '177|5', 6, 'Outpatient single child 1', '7970000.00', 'Fathimah Ghaida Rosyidi', '177-5-275'),
(8540, 177, 276, '177|5', 6, 'Outpatient single child 2', '7970000.00', 'Tali Fahima Rosyidi', '177-5-276'),
(8541, 177, 277, '177|5', 6, 'Outpatient single child 3', '7970000.00', 'Eshan Wong Hanif Rosyidi', '177-5-277'),
(8542, 177, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-7'),
(8543, 177, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-8'),
(8544, 177, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-9'),
(8545, 177, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-10'),
(8546, 177, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-11'),
(8547, 177, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-12'),
(8548, 177, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 188 days. minimum work 6 months.', '177-13'),
(8549, 178, 278, '178|5', 5, 'Outpatient married spouse', '5625000.00', 'Ria Tantri Sevrida', '178-5-278'),
(8550, 178, 279, '178|5', 6, 'Outpatient single child 1', '7970000.00', 'Chifa Tentry Hannaz', '178-5-279'),
(8551, 178, 280, '178|5', 6, 'Outpatient single child 2', '7970000.00', 'Reva Ayuandhira Hannaz', '178-5-280'),
(8552, 178, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-7'),
(8553, 178, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-8'),
(8554, 178, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-9'),
(8555, 178, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-10'),
(8556, 178, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-11'),
(8557, 178, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-12'),
(8558, 178, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '178-13'),
(8559, 179, 281, '179|5', 5, 'Outpatient married spouse', '5625000.00', 'Winner Jusuf', '179-5-281'),
(8560, 179, 282, '179|5', 6, 'Outpatient single child 1', '7970000.00', 'Mathew Gianni Jusuf', '179-5-282'),
(8561, 179, 283, '179|5', 6, 'Outpatient single child 2', '7970000.00', 'Mikhaela Gianni Jusuf', '179-5-283'),
(8562, 179, 284, '179|5', 6, 'Outpatient single child 3', '7970000.00', 'Marvel Gianni Jusuf', '179-5-284'),
(8563, 179, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-7'),
(8564, 179, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-8'),
(8565, 179, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-9'),
(8566, 179, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-10'),
(8567, 179, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-11'),
(8568, 179, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-12'),
(8569, 179, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '179-13'),
(8570, 180, 285, '180|5', 5, 'Outpatient married spouse', '5625000.00', 'Yana Supriatna', '180-5-285'),
(8571, 180, 286, '180|5', 6, 'Outpatient single child 1', '7970000.00', 'Putri Maura Faathimah', '180-5-286'),
(8572, 180, 287, '180|5', 6, 'Outpatient single child 2', '7970000.00', 'Putri Maura Azzahra', '180-5-287'),
(8573, 180, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-7'),
(8574, 180, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-8'),
(8575, 180, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-9'),
(8576, 180, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-10'),
(8577, 180, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-11'),
(8578, 180, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-12'),
(8579, 180, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '180-13'),
(8580, 181, NULL, '', 6, 'Outpatient single', '4017753.00', 'single, work duration 184 days. Prorata calculation.', '181-6'),
(8581, 181, NULL, '', 7, 'Normal', '10800000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-7'),
(8582, 181, NULL, '', 8, 'C-Section', '18000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-8'),
(8583, 181, NULL, '', 9, 'Complication', '5000000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-9'),
(8584, 181, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-10'),
(8585, 181, NULL, '', 11, 'Frame', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-11'),
(8586, 181, NULL, '', 12, 'Lenses', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-12'),
(8587, 181, NULL, '', 13, 'Contact Lens', '1500000.00', 'LSA, work duration 184 days. minimum work 6 months.', '181-13'),
(8588, 182, NULL, '', 5, 'Outpatient married', '2465753.00', 'married, work duration 160 days. Prorata calculation. Family not included', '182-5'),
(8589, 183, NULL, '', 5, 'Outpatient married', '2188356.00', 'married, work duration 142 days. Prorata calculation. Family not included', '183-5'),
(8590, 184, NULL, '', 5, 'Outpatient married', '1941781.00', 'married, work duration 126 days. Prorata calculation. Family not included', '184-5'),
(8591, 184, NULL, '', 7, 'Normal', '10800000.00', '', '184-7'),
(8592, 184, NULL, '', 8, 'C-Section', '18000000.00', '', '184-8'),
(8593, 184, NULL, '', 9, 'Complication', '5000000.00', '', '184-9'),
(8594, 184, NULL, '', 10, 'Pre & Post Delivery', '1500000.00', '', '184-10'),
(8595, 184, NULL, '', 11, 'Frame', '1500000.00', '', '184-11'),
(8596, 184, NULL, '', 12, 'Lenses', '1500000.00', '', '184-12'),
(8597, 184, NULL, '', 13, 'Contact Lens', '1500000.00', '', '184-13'),
(8598, 185, NULL, '', 5, 'Outpatient married', '585616.00', 'married, work duration 38 days. Prorata calculation. Family not included', '185-5'),
(8599, 186, NULL, '', 6, 'Outpatient single', '829753.00', 'single, work duration 38 days. Prorata calculation.', '186-6');

-- --------------------------------------------------------

--
-- Table structure for table `employee_det`
--

CREATE TABLE `employee_det` (
  `empDetId` int(11) NOT NULL,
  `empMasterId` int(11) DEFAULT NULL,
  `empDetSuffixNo` varchar(255) DEFAULT NULL,
  `empDetNo` varchar(255) DEFAULT NULL,
  `empDetNama` varchar(255) DEFAULT NULL,
  `empDetBirthDate` date DEFAULT NULL,
  `empDetStaffRelId` int(11) DEFAULT NULL,
  `empDetGender` enum('M','F') DEFAULT NULL,
  `empDetMrgSt` int(11) DEFAULT NULL,
  `empDetStatus` enum('0','1') DEFAULT '1' COMMENT 'status aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_det`
--

INSERT INTO `employee_det` (`empDetId`, `empMasterId`, `empDetSuffixNo`, `empDetNo`, `empDetNama`, `empDetBirthDate`, `empDetStaffRelId`, `empDetGender`, `empDetMrgSt`, `empDetStatus`) VALUES
(35, 49, '1', NULL, 'Rita Theresia', '1971-10-23', 2, 'F', 2, '1'),
(36, 49, '2', NULL, 'Felicia Marcella', '1999-03-12', 3, 'F', 1, '1'),
(37, 49, '3', NULL, 'Filipo Marcelinno', '2002-07-17', 4, 'M', 1, '1'),
(38, 49, '4', NULL, 'Finella Marcia', '2013-03-06', 5, 'F', 1, '1'),
(41, 50, '1', NULL, 'Ellys Rahmasari', '1971-09-12', 2, 'F', 2, '1'),
(42, 50, '2', NULL, 'Sylvia Aulia Dewi', '1996-08-28', 3, 'F', 1, '1'),
(43, 50, '3', NULL, 'Mutia Aisyatur Ridho', '1998-05-15', 4, 'F', 1, '1'),
(44, 50, '4', NULL, 'Tania Putri Ayunita', '2002-03-03', 5, 'F', 1, '1'),
(52, 48, '1', NULL, 'Handoyo Budi Santoso', '1971-04-09', 2, 'M', 2, '1'),
(53, 55, '1', '63027', 'Ruminem', '1977-01-10', 2, 'F', 2, '1'),
(54, 55, '2', '63027', 'Adetya Ningrum', '1998-11-14', 3, 'F', 1, '1'),
(55, 55, '3', '63027', 'Dea Yulinda', '2005-07-06', 4, 'F', 1, '1'),
(56, 56, '1', '63081', 'Yosep Luminggas', '1968-04-18', 2, 'M', 2, '1'),
(57, 56, '2', '63081', 'Yusakh H. Luminggas', '2005-04-27', 3, 'M', 1, '1'),
(58, 57, '1', '63286', 'Rosleni', '1977-06-07', 2, 'F', 2, '1'),
(59, 57, '2', '63286', 'Sausan Nabila E', '1999-03-17', 3, 'F', 1, '1'),
(60, 57, '3', '63286', 'Kurahman Fadilah', '2003-05-01', 4, 'M', 1, '1'),
(61, 58, '1', '63289', 'Nurhaya', '1973-02-01', 2, 'F', 2, '1'),
(62, 58, '2', '63289', 'Dita Angraini', '1997-03-27', 3, 'F', 1, '1'),
(63, 58, '3', '63289', 'M. Alfian Harfan', '2005-04-27', 4, 'M', 1, '1'),
(64, 58, '4', '63289', 'M. Dhafa Aditya', '2006-10-30', 5, 'M', 1, '1'),
(65, 59, '1', '63849', 'Nur Laila Wati', '1971-06-25', 2, 'F', 2, '1'),
(66, 59, '2', '63849', 'Zahra Aulia Fitri', '2001-12-10', 3, 'F', 1, '1'),
(67, 59, '3', '63849', 'Amjaad Haedar', '2011-06-14', 4, 'M', 1, '1'),
(68, 60, '1', '66035', 'Agustinawati', '1982-08-03', 2, 'F', 2, '1'),
(69, 60, '2', '66035', 'Deni', '1997-07-07', 3, 'M', 1, '1'),
(70, 60, '3', '66035', 'Kris Andrean', '1998-12-23', 4, 'M', 1, '1'),
(71, 60, '4', '66035', 'Jesika', '2006-07-09', 5, 'F', 1, '1'),
(72, 61, '1', '67049', 'Wiji Sulastri', '1978-09-20', 2, 'F', 2, '1'),
(73, 61, '2', '67049', 'Balqis Asri Salsabila', '2002-05-27', 3, 'F', 1, '1'),
(74, 61, '3', '67049', 'Alya Astrik Salsabila', '2006-03-01', 4, 'F', 1, '1'),
(75, 61, '4', '67049', 'Trilia Amira Afiifa Salsabila', '2013-11-03', 5, 'F', 1, '1'),
(76, 62, '1', '67496', 'Ria Aprianti', '1968-04-28', 2, 'F', 2, '1'),
(77, 62, '2', '67496', 'Alif Ramadhan Kumiawan', '1998-12-20', 3, 'M', 1, '1'),
(78, 62, '3', '67496', 'M/ Baihaki Kumiawan', '2000-05-20', 4, 'M', 1, '1'),
(79, 62, '4', '67496', 'Tasya Amalia Kumiawan', '2002-04-23', 5, 'F', 1, '1'),
(80, 63, '1', '67541', 'Sumia', '1983-05-03', 2, 'F', 2, '1'),
(81, 63, '2', '67541', 'La Ode Dino SEtiawan', '2005-08-28', 3, 'M', 1, '1'),
(82, 63, '3', '67541', 'Wa Ode Dina Putriwangi', '2010-08-03', 4, 'F', 1, '1'),
(83, 63, '4', '67541', 'La Ode Dias Saputra', '2017-05-14', 5, 'M', 1, '1'),
(84, 66, '1', '85024', 'Yusi Fitria', '1980-08-15', 2, 'F', 2, '1'),
(85, 66, '2', '85024', 'Rivaldhy Rizki Akbar', '2004-11-23', 3, 'M', 1, '1'),
(86, 66, '3', '85024', 'Anastasya Ayu Bilqis', '2010-10-21', 4, 'F', 1, '1'),
(87, 67, '1', '85028', 'Sri Nuryani', '1968-08-08', 2, 'F', 2, '1'),
(88, 67, '2', '85028', 'Matheus S. Rumetna', '1990-12-03', 3, 'M', 1, '1'),
(89, 67, '3', '85028', 'Julian M Ch Rumetna', '1996-07-07', 4, 'M', 1, '1'),
(90, 67, '4', '85028', 'Ardian E Rumetna', '1997-10-12', 5, 'M', 1, '1'),
(91, 68, '1', NULL, 'Suprihatin', '1071-09-21', 2, 'F', 2, '1'),
(92, 68, '2', NULL, 'Aisyah Ummu Atsal', '1971-08-14', 3, 'F', 1, '1'),
(93, 68, '3', NULL, 'Asma Latifa Khairunisa', '2009-01-17', 4, 'F', 1, '1'),
(94, 69, '1', '85137', 'Sri Ambarwati', '1954-01-24', 2, 'F', 2, '1'),
(95, 69, '2', '85137', 'Amalia Rachmawati', '1981-01-17', 3, 'F', 1, '1'),
(96, 69, '4', '85137', 'M. Fauzi Rahman', '1991-09-12', 5, 'M', 1, '1'),
(97, 70, '1', '85143', 'Dewi Widyaningrum', '1970-12-08', 2, 'F', 2, '1'),
(98, 70, '2', '85143', 'Rania Farhana', '1998-05-09', 3, 'F', 2, '1'),
(99, 70, '3', '85143', 'Khairani Makina', '2002-01-06', 4, 'F', 1, '1'),
(100, 70, '4', '85143', 'Khairana Makina', '2002-01-06', 5, 'F', 1, '1'),
(101, 71, '1', '85180', 'Rosella', '1957-05-22', 2, 'F', 2, '1'),
(102, 73, '1', '85190', 'Miska Nurwahyuni', '1980-05-17', 2, 'F', 2, '1'),
(103, 73, '2', '85190', 'Nur Ramzi Makkaratte', '2002-05-31', 3, 'M', 1, '1'),
(104, 73, '3', '85190', 'Rabih Perkasa Makkaratte', '2005-12-30', 4, 'M', 1, '1'),
(105, 73, '4', '85190', 'Ranggadika Askana Sakhi', '2016-05-02', 5, 'M', 1, '1'),
(106, 74, '1', NULL, 'Uriyati', '1969-07-16', 2, 'F', 2, '1'),
(107, 74, '2', NULL, 'Primawan Luqman Hakim', '1989-02-27', 3, 'M', 1, '1'),
(108, 74, '3', NULL, 'Setiawan Akbar Mahesa', '1998-12-11', 4, 'M', 1, '1'),
(109, 76, '1', '67913', 'Eliza Krisnawati', '1952-03-09', 2, 'F', 2, '1'),
(110, 77, '1', '68271', 'Surya Hafni', '1980-12-29', 2, 'F', 2, '1'),
(111, 77, '2', '68271', 'Ilham Fahkreza Taher', '2001-03-15', 3, 'M', 1, '1'),
(112, 77, '3', '68271', 'Fiqri Fauzul Hamdi Siagian', '2002-04-16', 4, 'M', 1, '1'),
(113, 77, '4', '68271', 'Amanda Fahdila Siagian', '2004-10-28', 5, 'F', 1, '1'),
(114, 78, '1', '68300', 'Tagor Aditya Uktolseja', '1975-02-13', 2, 'M', 2, '1'),
(115, 80, '1', '68407', 'Ririn Rinduwati', '1986-06-17', 2, 'F', 2, '1'),
(116, 80, '2', '68407', 'M. Raihaan Tsaqifari', '1986-12-25', 3, 'M', 1, '1'),
(117, 80, '3', '68407', 'M. Kenze Bryant Tsaqifari', '2017-09-20', 4, 'M', 1, '1'),
(118, 81, '1', '68410', 'Yannie Oko', '1977-08-16', 2, 'F', 2, '1'),
(119, 81, '2', '68410', 'Sri Rahayu', '1998-01-21', 3, 'F', 1, '1'),
(120, 81, '3', '68410', 'Audrey Hannelore', '2002-04-06', 4, 'F', 1, '1'),
(121, 81, '4', '68410', 'Godlief Emmanuel Tilemans Sado', '2009-05-12', 5, 'M', 1, '1'),
(122, 83, '1', '68594', 'Carl Grazio Fermandez', '1973-02-11', 2, 'M', 2, '1'),
(123, 84, '1', '68829', 'R Ivan M Nainggolan', '1972-11-28', 2, 'M', 2, '1'),
(124, 85, '1', NULL, 'Frida Mindasari Saanin', '1971-06-07', 2, 'F', 2, '1'),
(125, 85, '2', NULL, 'Amiriz Ismail Ardiwijaya', '2002-02-22', 3, 'M', 1, '1'),
(126, 87, '1', NULL, 'Tri Indri Pumamawati', '1982-05-27', 2, 'F', 2, '1'),
(127, 87, '2', NULL, 'Zhavira Ziyan Arfadilah', '1995-12-26', 3, 'F', 1, '1'),
(128, 87, '3', NULL, 'Azkavhian Arfaza', '1999-11-01', 4, 'F', 1, '1'),
(129, 87, '4', NULL, 'Prabavhali Cakra Rayanza', '2004-08-29', 5, 'M', 1, '1'),
(130, 91, '1', '70359', 'Filomena', '1972-08-23', 2, 'F', 2, '1'),
(131, 91, '2', '70359', 'Azizah Zhafira', '2000-02-14', 3, 'F', 1, '1'),
(132, 91, '3', '70359', 'M. Sulthan', '2002-01-01', 4, 'M', 1, '1'),
(133, 91, '4', '70359', 'Diva Rhea', '2005-03-08', 5, 'F', 1, '1'),
(134, 92, '2', NULL, 'Virginie Kirrana Shima Schmidt', '2009-07-15', 3, 'F', 1, '1'),
(135, 93, '1', NULL, 'Susi Noviza', '1974-11-13', 2, 'F', 2, '1'),
(136, 93, '2', NULL, 'Maryam Khalisa Rahman', '2003-07-09', 3, 'F', 1, '1'),
(137, 93, '3', NULL, 'Abdullah Azzam Rahman', '2005-02-05', 4, 'M', 1, '1'),
(138, 93, '4', NULL, 'Ahmad Ibrahim Hanif', '2009-03-09', 5, 'M', 1, '1'),
(139, 94, '1', NULL, 'Dea Oktovina', '1979-10-24', 2, 'F', 2, '1'),
(140, 94, '2', NULL, 'Delea OctobelleMarvina', '2010-10-22', 3, 'F', 1, '1'),
(141, 94, '3', NULL, 'Dennis Junian Marvino', '2012-06-28', 4, 'M', 1, '1'),
(142, 94, '4', NULL, 'Demia Novel Marvina', '2015-11-08', 5, 'F', 1, '1'),
(143, 96, '1', '70631', 'Havie Abdul Gafur', '1983-04-30', 2, 'M', 2, '1'),
(144, 96, '2', '70631', 'Kinaya Fariishta', '2011-06-12', 3, 'F', 1, '1'),
(145, 96, '3', '70631', 'Ramadhan Rayendra Gafur', '2014-06-12', 4, 'M', 1, '1'),
(146, 97, '1', NULL, 'Arti Permata', '1980-04-05', 2, 'F', 2, '1'),
(147, 97, '2', NULL, 'Direnartha Agastya', '2012-01-17', 3, 'M', 1, '1'),
(148, 97, '3', NULL, 'Kansa Adyastha Sutraman', '2016-04-14', 4, 'M', 1, '1'),
(149, 99, '1', NULL, 'Asti Nuraini', '1983-12-16', 2, 'F', 2, '1'),
(150, 99, '2', NULL, 'Kemala Roshani Jakti', '2001-12-16', 3, 'F', 1, '1'),
(151, 100, '1', NULL, 'Yohanes Eudes Siga Mango', '1978-05-29', 2, 'M', 2, '1'),
(152, 102, '1', NULL, 'Donna Elvira', '1978-08-11', 2, 'F', 2, '1'),
(153, 102, '2', NULL, 'Maliq Figlo Satar', '2013-01-01', 3, 'M', 1, '1'),
(154, 103, '1', NULL, 'Wong Liem', '1982-09-12', 2, 'M', 2, '1'),
(155, 103, '2', NULL, 'Matthew Alvin Wong', '2011-09-27', 3, 'M', 1, '1'),
(156, 104, '1', '71519', 'El Hana Yuliatmaja', '1984-07-15', 2, 'M', 2, '1'),
(157, 104, '2', '71519', 'Elika Mahdiya Atmaja', '2014-10-12', 3, 'F', 1, '1'),
(158, 105, '1', NULL, 'Dalih Ade Solaiha', '1982-07-18', 2, 'F', 2, '1'),
(159, 105, '2', NULL, 'Aidan Prama Zheesan', '2015-05-29', 3, 'M', 1, '1'),
(160, 106, '1', NULL, 'Rusiani', '1977-07-10', 2, 'F', 2, '1'),
(161, 106, '2', NULL, 'Tendy Zulkamain', '1999-09-03', 3, 'M', 1, '1'),
(162, 106, '3', NULL, 'Eca Eliana', '2001-07-08', 4, 'F', 1, '1'),
(163, 107, '1', NULL, 'Yasmina Anindyajati', '1989-01-03', 2, 'F', 2, '1'),
(164, 108, '1', '72051', 'Juliane Andanti', '1970-07-20', 2, 'F', 2, '1'),
(165, 108, '2', '72051', 'Amadeo Putra Projoga', '2007-05-12', 3, 'M', 1, '1'),
(166, 109, '1', '72253', 'Henry Asri', '1970-11-10', 2, 'M', 2, '1'),
(167, 110, '1', NULL, 'Hamsuri', '1975-06-07', 2, 'M', 2, '1'),
(168, 110, '2', NULL, 'Arya Razza Makkasau', '2006-08-10', 3, 'M', 1, '1'),
(169, 113, '1', NULL, 'Rini Susanti', '1983-12-19', 2, 'F', 2, '1'),
(170, 113, '2', NULL, 'Tania Audia Nivadi', '2008-02-08', 3, 'F', 1, '1'),
(171, 113, '3', NULL, 'Sahira Salsabila', '2012-02-11', 4, 'F', 1, '1'),
(172, 114, '1', NULL, 'Kefas T Ponggawa', '1989-08-22', 2, 'M', 2, '1'),
(173, 115, '1', NULL, 'Novie', '1977-11-17', 2, 'F', 2, '1'),
(174, 115, '2', NULL, 'Mardiyah Azizah Ravie Putri', '2006-12-14', 3, 'F', 1, '1'),
(175, 115, '3', NULL, 'Athallah Dhawi Dzaki Ravie Putra', '2011-09-18', 4, 'M', 1, '1'),
(176, 117, '1', NULL, 'Laily Suharlina Mahalli', '1966-06-22', 2, 'F', 2, '1'),
(177, 117, '2', NULL, 'Radhika Ayesha Innatha', '2004-09-20', 3, 'F', 1, '1'),
(178, 119, '1', NULL, 'Achmad Fauzi', '1967-02-13', 2, 'M', 2, '1'),
(179, 119, '2', NULL, 'Maria Jezzyca Oktaviane', '2001-10-01', 3, 'F', 1, '1'),
(180, 119, '3', NULL, 'Nickolas Delfino Abimanyu', '2003-05-20', 4, 'M', 1, '1'),
(181, 119, '4', NULL, 'Putri Zieta N. Fauzi', '2010-09-05', 5, 'F', 1, '1'),
(182, 122, '1', NULL, 'Damiyah', '1974-01-22', 2, 'F', 2, '1'),
(183, 122, '2', NULL, 'Aulia Lufitawati', '2001-05-28', 3, 'F', 1, '1'),
(184, 122, '3', NULL, 'M. Faiz Syahidan', '2004-03-08', 4, 'M', 1, '1'),
(185, 122, '4', NULL, 'Fayyiz Hanifa Amidha', '2007-08-03', 5, 'F', 1, '1'),
(186, 123, '1', NULL, 'Budhy Chandra', '1961-09-21', 2, 'M', 2, '1'),
(187, 124, '1', NULL, 'Inayati Aenah', '1986-08-24', 2, 'F', 2, '1'),
(188, 124, '2', NULL, 'Raniya Khudeva Arif', '2008-11-14', 3, 'F', 1, '1'),
(189, 124, '3', NULL, 'M Hafizh Arif', '2013-11-28', 4, 'M', 1, '1'),
(190, 125, '1', NULL, 'Djero Putu Darmike Nurhayati', '1980-08-27', 2, 'F', 2, '1'),
(191, 125, '2', NULL, 'Ida Ayu Oka Chandenni Sativaveda', '2007-04-01', 3, 'F', 1, '1'),
(192, 125, '3', NULL, 'Ida Bagus Made Gripati Sattivaveda', '2009-04-05', 4, 'M', 1, '1'),
(193, 125, '4', NULL, 'Ida Bagus Ketut Dhanyavada Sativaveda', '2016-06-01', 5, 'M', 1, '1'),
(194, 129, '1', NULL, 'Retno Kartikowati', '1980-03-20', 2, 'F', 2, '1'),
(195, 129, '2', NULL, 'Tasbitah Najwa', '2009-10-17', 3, 'F', 1, '1'),
(196, 129, '3', NULL, 'Shafa Azura', '2012-10-26', 4, 'F', 1, '1'),
(197, 130, '1', NULL, 'Lailatul Muatiroh', '1975-03-19', 2, 'F', 2, '1'),
(198, 130, '2', NULL, 'Naufal Syuja Zapariza', '2003-02-25', 3, 'M', 1, '1'),
(199, 130, '3', NULL, 'Aulia Syifa Zapariza', '2006-06-06', 4, 'F', 1, '1'),
(200, 130, '4', NULL, 'Nabil Al-Faresel Zapariza', '2010-05-02', 5, 'M', 1, '1'),
(201, 131, '1', NULL, 'Adi Widyanto', '1976-05-28', 2, 'M', 2, '1'),
(202, 131, '2', NULL, 'Galang Nitisara Punto', '2010-11-24', 3, 'M', 1, '1'),
(203, 132, '1', NULL, 'Syerlina Rombe', '1973-04-18', 2, 'F', 2, '1'),
(204, 132, '2', NULL, 'Alfida Kintabela Subekti', '1999-04-12', 3, 'F', 1, '1'),
(205, 132, '3', NULL, 'Zaujane Kantadara Subekti', '2006-07-04', 4, 'F', 1, '1'),
(206, 133, '1', NULL, 'Wintang Haryokusumo', '1988-05-29', 2, 'M', 2, '1'),
(207, 135, '1', '73483', 'Fransiska Ari Indrawati', '1982-04-05', 2, 'F', 2, '1'),
(208, 135, '2', '73483', 'Ailena Brisa Ramedhan', '2011-10-09', 3, 'F', 2, '1'),
(209, 137, '1', NULL, 'Teguh Rismanto', '1978-07-02', 2, 'M', 2, '1'),
(210, 137, '2', NULL, 'Rain Geraldi Milan', '2008-05-05', 3, 'M', 1, '1'),
(211, 137, '3', NULL, 'Rain Marina Revaline', '2011-09-19', 4, 'F', 1, '1'),
(212, 139, '1', '73763', 'Indra eryanto', '1973-08-04', 2, 'M', 2, '1'),
(213, 139, '2', '73763', 'Annisa Salsabila', '2005-11-18', 3, 'F', 1, '1'),
(214, 139, '3', '73763', 'Naeema Kirana Dewi', '2007-11-26', 4, 'F', 1, '1'),
(215, 142, '1', '73865', 'Dandi Achmad Ramdhani', '1974-09-29', 2, 'M', 2, '1'),
(216, 144, '1', NULL, 'Agnette Kartika Sumarauw', '1985-04-14', 2, 'F', 2, '1'),
(217, 144, '2', NULL, 'Kayana Yudakris Tondang', '2014-06-16', 3, 'M', 1, '1'),
(218, 144, '3', NULL, 'Maximilian Jazz Tondang', '2018-03-05', 4, 'M', 1, '1'),
(219, 145, '1', NULL, 'Deasy Putri Permatasari', '1991-12-12', 2, 'F', 2, '1'),
(220, 145, '2', NULL, 'Alkahf Saaqib Ahendeas', '2017-06-16', 3, 'M', 1, '1'),
(221, 147, '1', NULL, 'A Muh Hijaz Jalil', '1980-08-28', 2, 'M', 2, '1'),
(222, 147, '2', NULL, 'Andi Naila Salsabila Hjaz', '2006-04-02', 3, 'F', 1, '1'),
(223, 147, '3', NULL, 'Andi Dhaifa Adelia Hijaz', '2009-06-04', 4, 'F', 1, '1'),
(224, 147, '4', NULL, 'Andi Waldan Rauf Hijaz', '2010-11-10', 5, 'M', 1, '1'),
(225, 152, '1', NULL, 'Eni Erliana', '1990-12-31', 2, 'F', 2, '1'),
(226, 152, '2', NULL, 'Lusiana Odelia', '2015-01-07', 3, 'F', 1, '1'),
(227, 153, '1', '74027', 'Christine Nisrina', '1972-10-03', 2, 'F', 2, '1'),
(228, 154, '1', NULL, 'Ninis Sityaningrum', '1981-05-22', 2, 'F', 2, '1'),
(229, 154, '2', NULL, 'Aditya Eka Putra Atmajaya', '2003-08-02', 3, 'M', 1, '1'),
(230, 154, '3', NULL, 'Nasyhilla Dwi Putri', '2007-03-17', 4, 'F', 1, '1'),
(231, 155, '1', NULL, 'Nurmalasari', '1983-01-25', 2, 'F', 1, '1'),
(232, 155, '2', NULL, 'Gabri Perboar Sengga', '2006-09-11', 3, 'M', 1, '1'),
(233, 155, '3', NULL, 'Stefano De Natale Sengga', '2013-12-26', 4, 'M', 1, '1'),
(234, 158, '1', NULL, 'Lidya Friyani Mangipi', '1980-04-04', 2, 'F', 2, '1'),
(235, 158, '2', NULL, 'El Goldian', '2002-02-25', 3, 'M', 1, '1'),
(236, 158, '3', NULL, 'Geoffrey', '2012-07-19', 4, 'M', 1, '1'),
(237, 159, '1', NULL, 'Ida Harida', '1972-01-06', 2, 'F', 2, '1'),
(238, 159, '2', NULL, 'Adrian Agung Dharmawan', '2002-07-14', 3, 'M', 1, '1'),
(239, 159, '3', NULL, 'Audria Rianne', '2008-11-27', 4, 'F', 1, '1'),
(240, 160, '1', NULL, 'Arini Rahayu', '1989-05-19', 2, 'F', 2, '1'),
(241, 161, '1', NULL, 'Afifi Rahmadetiassani', '1990-11-14', 2, 'F', 2, '1'),
(242, 162, '1', NULL, 'Irianto Dwi Gunawan', '1966-10-13', 2, 'M', 2, '1'),
(243, 162, '2', NULL, 'David Christian Gunawan', '1996-02-20', 3, 'M', 1, '1'),
(244, 162, '3', NULL, 'Daniel Christian Gunawan', '2002-10-25', 4, 'M', 1, '1'),
(245, 163, '1', NULL, 'Pandu Setia', '1981-05-13', 2, 'M', 2, '1'),
(246, 163, '2', NULL, 'Razaska Aqso Setia', '2013-08-27', 3, 'M', 1, '1'),
(247, 163, '3', NULL, 'Arrazaq Ikram Setia', '2017-03-31', 4, 'M', 1, '1'),
(248, 164, '1', NULL, 'M Hikmah Deri Suryana', '1970-04-12', 2, 'M', 2, '1'),
(249, 164, '2', NULL, 'Syafira Ramlin', '1998-09-19', 3, 'F', 1, '1'),
(250, 164, '3', NULL, 'Delia Nada Suryana', '2000-10-19', 4, 'F', 1, '1'),
(251, 165, '2', NULL, 'Omar Shidqi M Sjukri', '2005-08-04', 3, 'M', 1, '1'),
(252, 165, '3', NULL, 'Kenzi Errando M Sjukri', '2007-05-07', 4, 'M', 1, '1'),
(253, 166, '1', NULL, 'Diah Radini Noerdjito', '1980-03-04', 2, 'F', 2, '1'),
(254, 166, '2', NULL, 'Bhadrika Cettadhira Hidayanto', '2008-07-09', 3, 'M', 1, '1'),
(255, 166, '3', NULL, 'Prajnacetta Sarwendriya Hidayanto', '2012-04-29', 4, 'F', 1, '1'),
(256, 167, '1', '74672', 'Dina Maulida', '1987-12-18', 2, 'F', 2, '1'),
(257, 168, '1', '74682', 'Yudhanti', '1973-03-18', 2, 'F', 2, '1'),
(258, 168, '2', '74682', 'Raul Raffi Hakeem', '2003-08-27', 3, 'M', 1, '1'),
(259, 168, '3', '74682', 'Adeeba Mandana', '2006-12-09', 4, 'F', 1, '1'),
(260, 169, '1', NULL, 'Ratih Retno Ratri', '1969-07-09', 2, 'F', 2, '1'),
(261, 169, '2', NULL, 'Kevin Kanaka Swagoputra', '2000-08-03', 3, 'M', 1, '1'),
(262, 170, '1', '74704', 'Gusman Yahya', '1974-08-04', 2, 'M', 2, '1'),
(263, 170, '2', '74704', 'Audrey Shamira', '2006-11-24', 3, 'F', 1, '1'),
(264, 172, '1', NULL, 'Suranti', '1982-05-28', 2, 'F', 2, '1'),
(265, 172, '2', NULL, 'Aulia Utami Wasiorima Saryadi', '2008-11-19', 3, 'F', 1, '1'),
(266, 172, '3', NULL, 'Argatsani Derawan Setyo Saryadi', '2017-10-08', 4, 'M', 1, '1'),
(267, 173, '1', NULL, 'Tasori', '1975-06-11', 2, 'M', 2, '1'),
(268, 173, '2', NULL, 'Nicho Bagas Pratama', '2013-05-01', 3, 'M', 1, '1'),
(269, 173, '3', NULL, 'Nikita Adhia Kirana', '2017-08-11', 4, 'F', 1, '1'),
(270, 174, '1', '74876', 'Budi Oktavian Nasution', '1977-10-17', 2, 'M', 2, '1'),
(271, 174, '2', '74876', 'Radit Havian Kasmir', '2007-06-04', 3, 'M', 1, '1'),
(272, 174, '3', '74876', 'Randa Havian Kasmir', '2012-05-06', 4, 'M', 1, '1'),
(273, 175, '1', '74881', 'Abdan Nafik', '1991-07-19', 2, 'M', 2, '1'),
(274, 177, '1', '74935', 'Dewi Indah Sari', '1983-10-01', 2, 'F', 2, '1'),
(275, 177, '2', '74935', 'Fathimah Ghaida Rosyidi', '2008-07-23', 3, 'F', 1, '1'),
(276, 177, '3', '74935', 'Tali Fahima Rosyidi', '2010-08-03', 4, 'F', 1, '1'),
(277, 177, '4', '74935', 'Eshan Wong Hanif Rosyidi', '2013-04-27', 5, 'M', 1, '1'),
(278, 178, '1', '74936', 'Ria Tantri Sevrida', '1973-09-23', 2, 'F', 2, '1'),
(279, 178, '2', '74936', 'Chifa Tentry Hannaz', '1999-04-20', 3, 'F', 1, '1'),
(280, 178, '3', '74936', 'Reva Ayuandhira Hannaz', '2007-08-07', 4, 'F', 1, '1'),
(281, 179, '1', '74937', 'Winner Jusuf', '1975-06-10', 2, 'M', 2, '1'),
(282, 179, '2', '74937', 'Mathew Gianni Jusuf', '2013-02-07', 3, 'M', 1, '1'),
(283, 179, '3', '74937', 'Mikhaela Gianni Jusuf', '2014-07-21', 4, 'F', 1, '1'),
(284, 179, '4', '74937', 'Marvel Gianni Jusuf', '2016-01-30', 5, 'M', 1, '1'),
(285, 180, '1', '74940', 'Yana Supriatna', '1977-09-22', 2, 'M', 2, '1'),
(286, 180, '2', '74940', 'Putri Maura Faathimah', '2006-03-06', 3, 'F', 1, '1'),
(287, 180, '3', '74940', 'Putri Maura Azzahra', '2006-03-06', 4, 'F', 1, '1'),
(288, 182, '1', '74968', 'Riana Eka Sari', '1972-07-12', 2, 'F', 2, '1'),
(289, 182, '2', '74968', 'Alia Nur Annisa', '1997-12-10', 3, 'F', 1, '1'),
(290, 182, '3', '74968', 'Nabila Putri Kirana', '2000-11-02', 4, 'F', 1, '1'),
(291, 183, '1', NULL, 'Tri Furi Megawati', '1988-12-28', 2, 'F', 2, '1'),
(292, 183, '2', NULL, 'Keitha Gizardenia Alie', '2014-05-26', 3, 'F', 1, '1'),
(293, 183, '3', NULL, 'Gadiza Gizavrinadeya', '2015-11-27', 4, 'F', 1, '1'),
(294, 184, '1', NULL, 'Sri Rahayu', '1983-11-11', 2, 'F', 2, '1'),
(295, 185, '1', '75045', 'M Gentile Andilolo', '1984-08-10', 2, 'M', 2, '1'),
(296, 185, '2', '75045', 'Barata Toratu Andilolo', '2006-10-24', 3, 'M', 1, '1'),
(297, 185, '3', '75045', 'Jingga Arundhati Andilolo', '2009-12-17', 4, 'F', 1, '1'),
(298, 185, '4', '75045', 'Daliati Ramaniya Dasha Andilolo', '2012-08-04', 5, 'F', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `empLvId` int(11) NOT NULL,
  `empYear` year(4) NOT NULL,
  `empLvEmpId` int(11) DEFAULT NULL COMMENT 'emp id',
  `empLvTypId` int(11) DEFAULT NULL COMMENT 'id leave',
  `empLvTypNama` varchar(255) NOT NULL DEFAULT '',
  `empLvDayType` enum('W','C') NOT NULL DEFAULT 'W',
  `empLvMaxPerYear` decimal(5,2) UNSIGNED DEFAULT NULL,
  `empLvMaxPerMonth` decimal(5,2) UNSIGNED DEFAULT NULL,
  `empLvMaxPerYearInitial` decimal(5,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE `job_status` (
  `jobStatusId` int(11) NOT NULL,
  `jobStatusNama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`jobStatusId`, `jobStatusNama`) VALUES
(2, 'LSA'),
(1, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `lvreqId` int(11) NOT NULL,
  `lvreqKode` varchar(255) DEFAULT NULL,
  `lvreqEmpId` int(11) DEFAULT NULL,
  `lvreqLvNama` varchar(255) NOT NULL DEFAULT '',
  `lvreqApproveBy` int(11) DEFAULT NULL,
  `lvreqApproveStatus` enum('0','1','2') DEFAULT NULL COMMENT '0=belum diproses, 1=disetujui, 2=ditolak',
  `lvreqApproveNote` varchar(255) DEFAULT NULL,
  `lvreqTanggalAwal` date DEFAULT NULL,
  `lvreqTanggalAkhir` date DEFAULT NULL,
  `lvreqJumlah` decimal(5,2) UNSIGNED DEFAULT '0.00',
  `lvreqBalanceStart` decimal(5,2) UNSIGNED DEFAULT NULL,
  `lvreqBalanceEnd` decimal(5,2) UNSIGNED DEFAULT NULL,
  `lvreqTanggalPengajuan` date DEFAULT NULL,
  `lvreqTanggalApproval` date DEFAULT NULL,
  `lvreqSubmitStatus` enum('0','1') DEFAULT '0' COMMENT '0=save,1=confirm'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `lvTypId` int(11) NOT NULL,
  `lvTypNama` varchar(255) DEFAULT NULL,
  `lvDayType` enum('W','C') NOT NULL DEFAULT 'W',
  `lvMaxPerYear` decimal(5,2) UNSIGNED DEFAULT NULL,
  `lvMaxPerMonth` decimal(5,2) UNSIGNED DEFAULT NULL,
  `lvGender` enum('M','F') DEFAULT NULL,
  `lvMinLSA` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`lvTypId`, `lvTypNama`, `lvDayType`, `lvMaxPerYear`, `lvMaxPerMonth`, `lvGender`, `lvMinLSA`) VALUES
(2, 'Sick Leave', 'W', '12.00', '0.00', '', 0),
(3, 'Annual Leave', 'W', '12.00', '1.00', '', 1),
(4, 'Annual Leave', 'W', '15.00', '1.25', '', 2),
(5, 'Annual Leave', 'W', '20.00', '1.67', '', 5),
(6, 'Death of a Member of the Immediate Family', 'W', '4.00', '0.00', '', 0),
(7, 'Serious Illness of a Member of the Immediate Family', 'W', '2.00', '0.00', '', 0),
(8, 'Marriage of the Employee', 'W', '3.00', '0.00', '', 0),
(9, 'Marriage of the Employee\'s Immediate Family', 'W', '1.00', '0.00', '', 0),
(10, 'Marriage of the Employee\'s Dependents', 'W', '2.00', '0.00', '', 0),
(11, 'Baptism / Cirmumcision an Employee\'s Child', 'W', '2.00', '0.00', '', 0),
(12, 'Birth of Male Employee\'s Child', 'W', '10.00', '0.00', 'M', 0),
(13, 'Adoption of a Child', 'W', '10.00', '0.00', '', 0),
(14, 'Employee\'s Graduation', 'W', '1.00', '0.00', '', 0),
(15, 'Religius Leave (Hajj)', 'W', '44.00', '0.00', '', 0),
(16, 'Maternity Leave', 'W', '90.00', '0.00', 'F', 0),
(17, 'Menstrual Leave', 'W', '0.00', '2.00', 'F', 0),
(18, 'Unpaid Leave', 'W', '0.00', '0.00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marriage_status`
--

CREATE TABLE `marriage_status` (
  `mrgStId` int(11) NOT NULL,
  `mrgStNama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marriage_status`
--

INSERT INTO `marriage_status` (`mrgStId`, `mrgStNama`) VALUES
(2, 'Married'),
(1, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_period`
--

CREATE TABLE `monthly_period` (
  `monthlyPeriodId` int(11) NOT NULL,
  `monthlyPeriodNama` varchar(255) DEFAULT NULL,
  `monthlyPeriodStart` date DEFAULT NULL,
  `monthlyPeriodEnd` date DEFAULT NULL,
  `monthlyPeriodStatus` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_period`
--

INSERT INTO `monthly_period` (`monthlyPeriodId`, `monthlyPeriodNama`, `monthlyPeriodStart`, `monthlyPeriodEnd`, `monthlyPeriodStatus`) VALUES
(1, 'Jul 2017', '2017-07-01', '2017-07-31', '1'),
(2, 'Aug 2017', '2017-08-01', '2017-08-31', '0'),
(3, 'Sep 17', '2017-09-01', '2017-09-30', '0'),
(4, 'Oct 17', '2017-10-01', '2017-10-31', '0'),
(5, 'Nov 17', '2017-11-01', '2017-11-30', '0'),
(6, 'Dec 17', '2017-12-01', '2017-12-31', '0'),
(7, 'Jan 18', '2018-01-01', '2018-01-31', '0'),
(8, 'Feb 18', '2018-02-01', '2018-02-28', '0'),
(9, 'Mar 18', '2018-03-01', '2018-03-31', '0'),
(10, 'Apr 18', '2018-04-01', '2018-04-30', '0'),
(11, 'May 18', '2018-05-01', '2018-05-31', '0'),
(12, 'Jun 18', '2018-06-01', '2018-06-30', '0'),
(13, 'Jul 18', '2018-07-01', '2018-07-31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `office_location`
--

CREATE TABLE `office_location` (
  `officeLocId` int(11) NOT NULL,
  `officeLocKode` varchar(50) DEFAULT NULL,
  `officeLocNama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_location`
--

INSERT INTO `office_location` (`officeLocId`, `officeLocKode`, `officeLocNama`) VALUES
(1, 'IND01', 'Bali'),
(2, 'IND02', 'Jakarta'),
(3, 'IND07', 'Berau'),
(4, 'IND08', 'Wanci'),
(5, 'IND09', 'Raja Ampat'),
(6, 'IND12', 'Kupang'),
(7, 'IND05', 'Samarinda'),
(8, 'IND20', 'Riau');

-- --------------------------------------------------------

--
-- Table structure for table `outpatient_benefit`
--

CREATE TABLE `outpatient_benefit` (
  `outBenId` int(11) NOT NULL,
  `outBenNama` varchar(255) DEFAULT NULL,
  `outBenNominal` decimal(20,2) DEFAULT '0.00',
  `outBenMaritalStatus` int(11) DEFAULT NULL,
  `outBenEndBalLabel` enum('0','1') DEFAULT '0' COMMENT 'Ending balance label',
  `outBenLsaMonth` int(11) DEFAULT NULL COMMENT 'Minimal lama bekerja pekerja tipe LSA, dalam bulan',
  `outBenMaxClaimCount` int(11) DEFAULT NULL COMMENT 'Berapa kali boleh diclaim',
  `outBenSetEmpty` enum('0','1') DEFAULT '0' COMMENT 'Benefit langsung diset 0, setelah dipakai. Misal kacamata',
  `outBenStart` date DEFAULT NULL,
  `outBenEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outpatient_benefit`
--

INSERT INTO `outpatient_benefit` (`outBenId`, `outBenNama`, `outBenNominal`, `outBenMaritalStatus`, `outBenEndBalLabel`, `outBenLsaMonth`, `outBenMaxClaimCount`, `outBenSetEmpty`, `outBenStart`, `outBenEnd`) VALUES
(5, 'Outpatient married', '5625000.00', 2, '1', 6, 0, '0', '2018-07-01', '2019-06-30'),
(6, 'Outpatient single', '7970000.00', 1, '1', 6, 0, '0', '2018-07-01', '2019-06-30'),
(7, 'Normal', '10800000.00', 0, '0', 6, 1, '1', '2018-07-01', '2019-06-30'),
(8, 'C-Section', '18000000.00', 0, '0', 6, 1, '1', '2018-07-01', '2019-06-30'),
(9, 'Complication', '5000000.00', 0, '0', 6, 1, '1', '2018-07-01', '2019-06-30'),
(10, 'Pre & Post Delivery', '1500000.00', 0, '1', 6, 0, '0', '2018-07-01', '2019-06-30'),
(11, 'Frame', '1500000.00', 0, '0', 6, 1, '1', '2018-07-01', '2019-06-30'),
(12, 'Lenses', '1500000.00', 0, '0', 6, 1, '1', '2018-07-01', '2019-06-30'),
(13, 'Contact Lens', '1500000.00', 0, '0', 6, 1, '1', '2018-07-01', '2019-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `ref_akses`
--

CREATE TABLE `ref_akses` (
  `refAksesId` int(11) NOT NULL,
  `refSubMenuId` int(11) DEFAULT NULL,
  `refGroupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_akses`
--

INSERT INTO `ref_akses` (`refAksesId`, `refSubMenuId`, `refGroupId`) VALUES
(354, 1, 2),
(375, 1, 100),
(355, 4, 2),
(376, 4, 100),
(356, 5, 2),
(377, 5, 100),
(357, 6, 2),
(378, 6, 100),
(358, 7, 2),
(379, 7, 100),
(359, 8, 2),
(380, 8, 100),
(360, 9, 2),
(381, 9, 100),
(361, 10, 2),
(382, 10, 100),
(362, 11, 2),
(383, 11, 100),
(363, 12, 2),
(384, 12, 100),
(364, 15, 2),
(385, 15, 100),
(365, 18, 2),
(386, 18, 100),
(350, 20, 2),
(371, 20, 100),
(351, 22, 2),
(372, 22, 100),
(352, 23, 2),
(373, 23, 100),
(387, 24, 99),
(369, 24, 100),
(328, 24, 101),
(348, 25, 2),
(366, 25, 100),
(370, 26, 100),
(329, 26, 101),
(349, 27, 2),
(367, 27, 100),
(388, 28, 99),
(368, 28, 100),
(327, 28, 101),
(353, 29, 2),
(374, 29, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ref_controller`
--

CREATE TABLE `ref_controller` (
  `refControllerId` int(11) NOT NULL,
  `refControllerNama` varchar(255) NOT NULL,
  `refControllerCek` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_controller`
--

INSERT INTO `ref_controller` (`refControllerId`, `refControllerNama`, `refControllerCek`) VALUES
(73, 'Ref_controller', '1'),
(87, 'Ref_group', '1'),
(88, 'Ref_menu', '1'),
(89, 'Ref_sub_menu', '1'),
(90, 'Ref_user', '1'),
(146, 'Office_location', '1'),
(147, 'Job_status', '1'),
(148, 'Monthly_period', '1'),
(149, 'Staff_relation', '1'),
(150, 'Day_off', '1'),
(151, 'Outpatient_benefit', '1'),
(152, 'Leave_type', '1'),
(154, 'Employee', '1'),
(161, 'Set_benefit', '1'),
(162, 'Employee_benefit', '1'),
(163, 'Benefit_claim', '1'),
(164, 'Medical_approval', '1'),
(165, 'Leave_request_approval', '1'),
(166, 'Report_leave_request', '1'),
(167, 'Leave_request', '1'),
(168, 'Set_leave', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ref_group`
--

CREATE TABLE `ref_group` (
  `refGroupId` int(11) NOT NULL,
  `refGroupNama` varchar(255) DEFAULT NULL,
  `refGroupInfo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_group`
--

INSERT INTO `ref_group` (`refGroupId`, `refGroupNama`, `refGroupInfo`) VALUES
(2, 'admin', 'Group untuk administrator'),
(99, 'pegawai', ''),
(100, 'Super admin', ''),
(101, 'Approval leave', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_menu`
--

CREATE TABLE `ref_menu` (
  `refMenuId` int(11) NOT NULL,
  `refMenuNama` varchar(255) NOT NULL,
  `refMenuInfo` varchar(255) DEFAULT NULL,
  `refMenuUrutan` int(2) DEFAULT NULL,
  `refMenuIcon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_menu`
--

INSERT INTO `ref_menu` (`refMenuId`, `refMenuNama`, `refMenuInfo`, `refMenuUrutan`, `refMenuIcon`) VALUES
(2, 'System configuration', '', 0, ' fa fa-desktop '),
(3, 'Reference data', '', 1, ' fa fa-copy '),
(4, 'Employee data', '', 2, ' fa fa-user '),
(5, 'User transaction', '', 3, ' fa fa-book '),
(6, 'Approval', '', 3, ' fa fa-thumbs-o-up '),
(7, 'Report', '', 0, ' fa fa-tasks ');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pesan`
--

CREATE TABLE `ref_pesan` (
  `refPesanId` int(11) NOT NULL,
  `refPesanKode` varchar(255) DEFAULT NULL,
  `refPesanValue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pesan`
--

INSERT INTO `ref_pesan` (`refPesanId`, `refPesanKode`, `refPesanValue`) VALUES
(4, '1064', 'Database error -  null value'),
(5, '1451', 'Database error - foreign key issue'),
(6, '1062', 'Database error - duplicate data'),
(7, '1054', 'Database error - unknown field');

-- --------------------------------------------------------

--
-- Table structure for table `ref_sub_menu`
--

CREATE TABLE `ref_sub_menu` (
  `refSubMenuId` int(11) NOT NULL,
  `refMenuId` int(11) DEFAULT NULL,
  `refSubMenuNama` varchar(255) NOT NULL,
  `refSubMenuInfo` varchar(255) DEFAULT NULL,
  `refControllerId` int(11) DEFAULT NULL,
  `refSubMenuUrutan` int(2) DEFAULT NULL,
  `refSubMenuIcon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_sub_menu`
--

INSERT INTO `ref_sub_menu` (`refSubMenuId`, `refMenuId`, `refSubMenuNama`, `refSubMenuInfo`, `refControllerId`, `refSubMenuUrutan`, `refSubMenuIcon`) VALUES
(1, 2, 'Ref controller', NULL, 73, 0, ' fa fa-gears '),
(4, 2, 'Ref Menu', NULL, 88, 1, ' fa fa-gears '),
(5, 2, 'Ref sub menu', NULL, 89, 2, ' fa fa-gears '),
(6, 2, 'Ref Group', NULL, 87, 3, ' fa fa-gears '),
(7, 2, 'User management', NULL, 90, 4, ' fa fa-user '),
(8, 3, 'Office location', NULL, 146, 0, ' fa fa-building-o '),
(9, 3, 'Job status', NULL, 147, 2, ' fa fa-edit '),
(10, 3, 'Monthly period', NULL, 148, 3, ' fa fa-calendar '),
(11, 3, 'Staff relation', NULL, 149, 4, ' fa fa-users '),
(12, 3, 'Day off calendar', NULL, 150, 5, ' fa fa-calendar '),
(15, 3, 'Outpatient Benefit', NULL, 151, 5, ' fa fa-file-o '),
(18, 3, 'Type of Leave', NULL, 152, 6, ' fa fa-file-o '),
(20, 4, 'Input employee', NULL, 154, 0, ' fa fa-save '),
(22, 4, 'Set benefit', NULL, 161, 1, ' fa fa-money '),
(23, 4, 'Employee benefit', NULL, 162, 4, ' fa fa-file-o '),
(24, 5, 'Medical benefit request', NULL, 163, 0, ' fa fa-book '),
(25, 6, 'Medical benefit approval', NULL, 164, 0, ' fa fa-plus '),
(26, 6, 'Leave request approval', NULL, 165, 2, 'fa fa-book'),
(27, 7, 'Leave Request Report', NULL, 166, 2, 'fa fa-book'),
(28, 5, 'Leave request', NULL, 167, 0, ' fa fa-file-o '),
(29, 4, 'Set leave', NULL, 168, 2, ' fa fa-file-o ');

-- --------------------------------------------------------

--
-- Table structure for table `ref_user`
--

CREATE TABLE `ref_user` (
  `refUserId` int(11) NOT NULL,
  `refUserNama` varchar(255) NOT NULL,
  `refUserNamaAsli` varchar(255) NOT NULL,
  `refUserPassword` varchar(255) NOT NULL,
  `refGroupId` int(11) NOT NULL,
  `refUserSessionActive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_user`
--

INSERT INTO `ref_user` (`refUserId`, `refUserNama`, `refUserNamaAsli`, `refUserPassword`, `refGroupId`, `refUserSessionActive`) VALUES
(1, 'nyoman.kresna@gmail.com', 'I Nyoman Dwi Cahya Kresna', '+pXdGTgB/ScqTIT8yosBKA==', 100, 'sTSDI7QvTAJc3H2gwZKpGA=='),
(2, 'espfirst@gmail.com', 'Michael Lawardi', 'pFBEAYhhg7BIUu2dVeg4SH48z8c5F/RlLLIvwML0150=', 100, 'sjFs49CuTipL7Nu5XwHoiQ=='),
(32, 'reg_married_2year@gmail.com', 'reg_married_2year', 'yIzqrwjToYQWYhOzbTuBfRSC959VPxkK5AezAw4V9CY=', 99, 'bH4FMlfj11sFZ6XFRHJy2Q=='),
(33, 'reg_married_2month@gmail.com	', 'reg_married_2month', 'IPSaO/ehCnOce5D5Uk17G4Z02wAltQqRuyPbY3SeRfo=', 99, NULL),
(34, 'LSA_married_2year@gmail.com	', 'LSA_married_2year', 'mvcSHiYOa/dlufvaL6VugapOdRqsrTO8okIenTD+Odo=', 99, NULL),
(35, 'LSA_married_2month@gmail.com', 'LSA_married_2month', '+vvg1apTYQ0NyNq0tdKCf5KC5f8jSzeRpcaIDWGWccM=', 99, 'wyf9BhhF7RqQUeFW7v52mw=='),
(36, 'reg_single_2year@gmail.com	', 'reg_single_2year', '5/82XTM+j8f/Umpo31RsLZ0ySRd8i/gxrObwHgdTQNA=', 99, NULL),
(37, 'reg_single_2month@gmail.com	', 'reg_single_2month', 'QOPugyotj4+SL2FzFqd7R+kAwb2OvzZlqI7hYcQCyqM=', 99, NULL),
(38, 'LSA_single_2year@gmail.com', 'LSA_single_2year', 'wryxg8B+GmbLkqlHzEq4okpTfFZWEUi14yhEsXdPUGc=', 99, NULL),
(39, 'LSA_single_2month@gmail.com', 'LSA_single_2month', 'Dh/erp0C5awOvi6Li4KMSHUTL/20RE6gL0c3x5FL0vQ=', 99, NULL),
(40, 'fachrul.rozi@tnc.org', 'Fachrul', '71IBAtv/NpQBELfTBM3Qhw==', 2, 'uhB2Lrs5uTb/nafcJZr9mw=='),
(41, 'aiping621@gmail.com', 'aiping621@gmail.com', 'htvDdpXPhMHLJTh88pjUy+POd45TyoL4JdwGrXTz+xI=', 2, 'oBI4cyTPfUTw4fqmOuBLWw=='),
(42, 'fitri@gmail.com', 'Fitri S. Lubis', 'cQgexXr1HdhImEkgJkoEng==', 99, 'IzVqH5oPEre+T+WRDhtTbg=='),
(43, 'dicky@gmail.com', 'Dicky Susanto', 'LETre4/5JBGhTz5kleptOw==', 99, NULL),
(44, 'imron@gmail.com', 'Imron Rosadi', 'PrIunYSPoujmWvuGeg4Mog==', 99, NULL),
(47, 'tri@gmail.com', 'Tri Arwani P. Soekirman', 'BiDkoBX3eh6XUp3dKyt+bg==', 99, NULL),
(48, 'annasri@gmail.com', 'Annasri Gani', 'SnBrMFNCJJeZjzehiE6vzLOEhLL6qDzJJUXrFXtP7s4=', 99, '6gXYLu5T12/QJoTnOcy+Dg=='),
(49, 'purnomo@gmail.com', 'Purnomo', 'ZB9nyNXdqnoGfXL4VIP+ZrOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(50, 'ivo@gmail.com', 'Ivo Kesuma Sari Panggabean', 'maqrQpQ88NqdwBFO5VYD9Q==', 99, NULL),
(51, 'edy@gmail.com', 'Edy Soediyono', 'zaPhr7erGQIFHyUwKdqh9g==', 99, NULL),
(52, 'suharyo@gmail.com', 'Suharyo', 'ykHUPyzMDTUNL6CgThK5/LOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(53, 'taufiq@gmail.com', 'Taufiq Hidayat', 'LVu4/uXnrFw3wUdbrdXCJevjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(54, 'matias@gmail.com', 'Matias Ruben', 'QnWruYoPy7iPJ6cajNd2y+vjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(55, 'alie@gmail.com', 'Alie Syopyan', 'NGs1pKR+oR/0zo2lPNOGnw==', 99, NULL),
(56, 'kumi@gmail.com', 'Kumiawan Fahmi', 'LFLOuKMi+4tQoPYZCurzSg==', 99, NULL),
(57, 'arif@gmail.com', 'La Ode Arifudin', 'uS3Y7lr46G4d9tec9XwfUQ==', 99, NULL),
(58, 'juanita@gmail.com', 'Juanita Ann Kariata Kaligis', 'tLLIyTnFKUA4JAFK2J1FALOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(59, 'salomina@gmail.com', 'Salomina Jubelina Tjoe', 'abzrfBoOoIhjL4YBwyxS9tuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(60, 'aan@gmail.com', 'Aan Pryatna', 'mBdXfr69fXoAWyd1YHUbQA==', 99, NULL),
(61, 'lukas@gmail.com', 'Lukas Rumetna', 'EjCsdTUB0/+vMvtKk/maEA==', 99, NULL),
(62, 'achmad@gmail.com', 'Achmad Faisal Kairupan', 'qFX1mC6H3vDkzNYNBcXREOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(63, 'bachrun@gmail.com', 'H. M. Bachrun Idris', 'ugidoSryURInQs/wuUXTGLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(64, 'niel@gmail.com', 'Niel Makinuddin', 'Lc1G5SamDaqvJOhCGucyQA==', 99, NULL),
(65, 'stanley@gmail.com', 'Stanley Mathew Rajagukguk', 'NdauQNY/I2aKQvV+/2OLDLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(66, 'Imran@gmail.com', 'M. Imran Amin', 'HydRMLEKY/lm3xeJAqIOUg==', 99, NULL),
(67, 'bambang@gmail.com', 'Bambang Wahyudi', 'GaUCpK4gozz5JiJQ6mmvF7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(69, 'wahjudi@gmail.com', 'Wahjudi Wardojo', 'Of+eRWIMvlYbNih8ssy3Y7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(70, 'zufahri@gmail.com', 'Zufahri Halomoan Siagian', 'DQpDB9ZLLJInqF41jRGDzLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(71, 'intan@gmail.com', 'Intan Sarah Dewi Ritonga', 'bgjlqXWR9cgUyLxDoCtSug==', 99, NULL),
(72, 'herlina@gmail.com', 'Herlina Hartanto', 'w6EiRJaglnT/uHWmKWUsBbOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(73, 'yusuf@gmail.com', 'Yusuf Fajariyanto', 'SQpC1MZ7aactcwH0SyQ0SA==', 99, NULL),
(74, 'yohannes@gmail.com', 'Yohannes Maturbongs', 'w1jgvV+CjOYA84bFRimYoNuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(75, 'sally@gmail.com', 'Sally Ingrid Kailola', 'QP7qmTjcGRTS5HjrwWsSaQ==', 99, NULL),
(76, 'asty@gmail.com', 'Asty Leonasty', '1ymxT/solUBZ7HhiOecL9g==', 99, NULL),
(77, 'rilya@gmail.com', 'Rilya A. Kansil', 'lPK4vyAyZbAYsDKjKuE3cw==', 99, NULL),
(78, 'rizya@gmail.com', 'Rizya Legawa Ardiwijaya', 'aJsdEd6cdgJ+JqkzbbNMuQ==', 99, NULL),
(79, 'rynal@gmail.com', 'Rynal May Fadly', 'xPC+sFCiiNYxrGIGFJVdaw==', 99, NULL),
(80, 'dheny@gmail.com', 'Dheny Setyawan', 'f6MzznxzAYYkq9WtGtSzPw==', 99, 'SpKj0BoVZ4mnj7vVMal6fA=='),
(81, 'agus@gmail.com', 'Agus Saripudin', 'ktq0E9amjDrjnhRktsyoFQ==', 99, NULL),
(82, 'anisa@gmail.com', 'Anisa Budiayu', 'I5imG+ak/xFgW+dLDMrbkw==', 99, NULL),
(83, 'ciicila@gmail.com', 'Cicilia Peggy Mariska', 'dEd6qM/YhSQ4EZDgVnhGK7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(84, 'rizal@gmail.com', 'M. Rizal Algamar', 'tW7FfYf6nJGBMarIODzEOw==', 99, NULL),
(85, 'ketut@gmail.com', 'Ni Ketut Wartiantini Nita', 'NmPFC3yUIChNXtofsD44JA==', 99, NULL),
(86, 'saipul@gmail.com', 'Saipul Rahman', '+jf+fJwQcdWmxM6qksU0MuvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(87, 'delon@gmail.com', 'Delon Marthinus', 'g/XHVQzgmSpg91SbmhY3oQ==', 99, NULL),
(88, 'glaudy@gmail.com', 'Glaudy Hendarsa Perdana', '7Wto15C5B4+3QyNxBIrvvuvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(89, 'astrid@gmail.com', 'Astrid Candrasari', 'ZPvJgyQeDHshqAj7Es00fuvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(90, 'sutra@gmail.com', 'Sutraman', 'h0/Q09liTroQ1lMHWWmejw==', 99, NULL),
(91, 'rizalbuk@gmail.com', 'Rizal Bukhari', '4rJkLCjQrqhU+XxMIeJRaNuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(92, 'jaka@gmail.com', 'R. Jaka Setia', '8A2If1JmTr9IdyD7koSu/A==', 99, NULL),
(93, 'diana@gmail.com', 'Diana Maria Ekarita Gessing', 'WTffKPK6MsBsHntYhggLWQ==', 99, NULL),
(95, 'musnanda@gmail.com', 'Musnanda', 'rNHLJxDAN/UI2GdLRPnWKtuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(96, 'khomay@gmail.com', 'Khomaylius Ervin', 'ufg1a93STDLFVLQjobogdevjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(97, 'ika@gmail.com', 'Ika Sulistiyanni Raharjo', 'ACwggdwaadYxNioWRqpFfQ==', 99, NULL),
(98, 'kun@gmail.com', 'Kun Setyawan', 'QtLrvCeDwm3liX6QKiEB2w==', 99, NULL),
(99, 'eliansyah@gmail.com', 'Eliansyah', 'XemBjuPIgymEPbD6g7cwmKixow+aolgBrFL0kDwGGpU=', 99, NULL),
(100, 'nugroho@gmail.com', 'Nugroho Arif Prabowo', 'xm4JvWcyzg6SNBSNWZZuQLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(101, 'dino@gmail.com', 'Dino Valentinus Prajoga K', 'Q/yOxOSfPAnk+WK36to0EA==', 99, NULL),
(102, 'septi@gmail.com', 'Septiana Rustandi', 'WsCmHIZ61kT7rKcx3TWI7g==', 99, NULL),
(103, 'rahmina@gmail.com', 'Rahmina', 'dOdnf35kdKVT+kQ4bGtCf7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(104, 'dini@gmail.com', 'Dini Septiani', 'cqiUfBiLXrk+ICH3F5hhEA==', 99, NULL),
(105, 'awal@gmail.com', 'Awaludinnoer', '22KPCD/RSXSyi8Mk3M1FCg==', 99, NULL),
(106, 'abdi@gmail.com', 'Abdi Yuniono', '3hrKV8us+pUci23yXnTygA==', 99, NULL),
(107, 'sutraanjani@gmail.com', 'Sutra Anjani', 'asyt4WAGp0fPuKMBrS58h6kxymR852m5etS2aFB93Ls=', 99, NULL),
(108, 'hultera@gmail.com', 'Hultera', 'ZwQx9g/6d04mbNFHDn8lWLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(109, 'andreas@gmail.com', 'Andreas Tomi Prasetya', 'sgJTS2AG8MDjRUXd1gEOf7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(110, 'mahatma@gmail.com', 'Mahatma Windrawan Inantha', 'z0myqhiTqpfvH9s20SMfd7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(111, 'tho@gmail.com', 'Tho Yvounne Margaret Tumewu', 'JU3tCuadpOPcYl57T4Omlw==', 99, NULL),
(112, 'cintya@gmail.com', 'Cintya Dian Astuty', 'cJH0NS3Ptqbtz4BwueHwYOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(113, 'syaiful@gmail.com', 'Syaiful Anwar', 'ukzsB5w2tpSHWRWR4hPBnLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(114, 'agustina@gmail.com', 'Agustina Wulandari', '3ybrJXAqbVAbFTsiJ1VtqNuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(115, 'gunawan@gmail.com', 'Gunawan Wibisono', 'C82bB7WsYDHVFNS6SPPkDrOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(116, 'ratih@gmail.com', 'Ratih A Loekito', '2oKuyMn7Zg/0mp4RvcJhdQ==', 99, NULL),
(117, 'arifdwi@gmail.com', 'Arif Dwi Cahyono', 'yN3P/HmKwStq2WJpTS/vLLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(118, 'ida@gmail.com', 'Ida Bagus Ketut Wedastra', 'c+xY3y7YGTltCyM5/tBtIQ==', 99, NULL),
(119, 'cici@gmail.com', 'Cici Rachmaida', 'EplJ7YzO4bgsjOjVE283+g==', 99, NULL),
(120, 'patma@gmail.com', 'Patmasanti', 'ReCt1xwzqm96bsrJ/OkYjA==', 99, NULL),
(121, 'ingrid@gmail.com', 'Ingrid Leonlike', 'ZlgY/GP8GbXf7NuKHSUzi+vjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(122, 'lailan@gmail.com', 'Lailan Syahri Ramadhan', 'ZVa41YpQsbDmbAb5znl3r+vjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(123, 'rudi@gmail.com', 'Rudi Zapariza', '+jCuCnqgdCCZ5KX//OIZTg==', 99, NULL),
(124, 'jevelina@gmail.com', 'Jevelina Punuh', 'Mi5wFlTRDt0lpByEnxYbztuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(125, 'alfan@gmail.com', 'Alfan Subekti', 'N5C/mRzntzuNxY3TfJgafA==', 99, NULL),
(126, 'laksmi@gmail.com', 'Laksmi Larastti', 'HBJoxIv6MKdtAnGYUCOpsOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(127, 'shanina@gmail.com', 'Shanina Boestami', 'jPvx68x0HN/HNtbyCh4+rbOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(128, 'bharata@gmail.com', 'Bharata Ramedhan', 'TnipajtiRN+G1PMAX+jdYrOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(129, 'ayumas@gmail.com', 'Ayumas Putri', 'g/HaOsfcBt+f163OMKfde+vjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(130, 'yadranka@gmail.com', 'Yadranka Farita', 'PXcpxcEr0SEt5HOkKMS/sNuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(131, 'ginan@gmail.com', 'Ginanjar Adi Priatna', 'o2o7kbU7LuOSphPqROXTfw==', 99, NULL),
(132, 'dewi@gmail.com', 'Dewi Damayani', 'fKBRgKlAsSIZza1NAXCzXA==', 99, NULL),
(133, 'retno@gmail.com', 'Retno Indah Dianing Sari', 'tBZ1FpB/7sK+zaADwgfHGQ==', 99, NULL),
(134, 'ali@gmail.com', 'Ali Chayatuddin', 'qIHurL8eS7+Lt+aQduynNQ==', 99, NULL),
(135, 'aisyah@gmail.com', 'Aisyah Laila Paramacitra', 'LbAGDNo5+kVDVb8p64fKVevjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(136, 'aby@gmail.com', 'Aby', 'c/fSP9WdHXTw1s12ZtLQag==', 99, NULL),
(137, 'sumanda@gmail.com', 'Sumanda Purba Tondang', 'DQEXG52fpwG8cxr6quVL/LOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(138, 'adis@gmail.com', 'Adis Hendriatna', 'zq2aA0qPQzxyPniDv3YAig==', 99, NULL),
(139, 'indriani@gmail.com', 'Indriani Gita Arjana', '3SBeGJvXiaQuKl0l8qY/ntuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(140, 'ade@gmail.com', 'Ade Rachmi Yuliantri', 'GMhsf6xUWptMtYqHbUJqIA==', 99, NULL),
(141, 'maya@gmail.com', 'Maya Patriani', 'QLR/+67XYMrGMeMLkNBU3A==', 99, NULL),
(142, 'thomas@gmail.com', 'Thomas Ariston', 'WF51nTrJuJp1/1zlXkNXAOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(143, 'hilda@gmail.com', 'Hilda Lionata', '0F8T1t9BoEFZKXKSEoFJMQ==', 99, NULL),
(144, 'arista@gmail.com', 'Arista Efraim Benu', '29Vd03mohGerzHPs5ta6EuvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(145, 'lebin@gmail.com', 'Lebin Yen', 'kddi/FIFJ5YwxObRlrc1/Q==', 99, NULL),
(146, 'stefanus@gmail.com', 'Stefanus Rudy Aryawan', 'd+pAiGD7pTtHGPrJAji4XNuP5a4xo580axKUp6m1LQ0=', 99, NULL),
(147, 'adhi@gmail.com', 'M Adhi Atmajaya', 'ghnTuEG8uo9U1+sSgPCI1g==', 99, NULL),
(148, 'christianus@gmail.com', 'Christianus W Djoko', 'FGTXZbLANqcmwdK2cC4gKakxymR852m5etS2aFB93Ls=', 99, NULL),
(149, 'bintang@gmail.com', 'Bintang Intan Oematan', 'valqIdXnHeSsWKugXr+2dLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(150, 'nandana@gmail.com', 'Nandana Godjali', 'xBdpuArKlOlLUqJVRDiROLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(151, 'jefferson@gmail.com', 'Jefferson Tasik', 'c/NkPvQ/ZKHe5EqyOGv2Caixow+aolgBrFL0kDwGGpU=', 99, NULL),
(152, 'yus@gmail.com', 'Yus Santoro', 'cL0lRJ8cQzW4ayihRtkNSw==', 99, NULL),
(153, 'danis@gmail.com', 'Aditya Daniswara ', 'pcNRVVOBVdgmstr7yAIBPw==', 99, NULL),
(154, 'rifqi@gmail.com', 'M Arif Rifqi', 'jvaCS5705GBGpR4/mW6dAw==', 99, NULL),
(155, 'hanifatul@gmail.com', 'Hanifatul Choiriah', 'Uj2l1GiFBXCA7GK7SR2EHqixow+aolgBrFL0kDwGGpU=', 99, NULL),
(156, 'maika@gmail.com', 'Maika Nova Yudha', '/lzi71T0M4jRDduui/Rmyw==', 99, NULL),
(157, 'lidia@gmail.com', 'Lidia Mirosa', 'nHRqcqDm5PVaJ/O1/U/PCg==', 99, NULL),
(158, 'adriani@gmail.com', 'Dini Adriani Adnan', '9W2B6HiTUCkfKjBzljAPBbOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(159, 'yuppy@gmail.com', 'Yoppy Hidayanto', 'Rq+Fi11s/7sB/g8fTl6pCQ==', 99, NULL),
(160, 'fachrul@gmail.com', 'Fachrul Rozi', 'GLQGEKLxonUn9WIYwPsS1LOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(161, 'Ruslandi@gmail.com', 'Ruslandi', 'u5rBT+5qLKHG5f7ezphrZduP5a4xo580axKUp6m1LQ0=', 99, NULL),
(162, 'swargo@gmail.com', 'Ade Swargo Mulyo', 'Az4lBPAieTulLHelHvvYnOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(163, 'oni@gmail.com', 'Oni Sulistyaningrum', 'I2H9RcrMIVYSu+x5RF9uRQ==', 99, NULL),
(164, 'boni@gmail.com', 'Bonifasius Santiko Parikesit', '1zILQjhsNcyflXcw1dEueA==', 99, NULL),
(165, 'saryadi@gmail.com', 'Saryadi', 'N1P8u1wdaOycM83T0wjdorOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(166, 'jeane@gmail.com', 'Jeanekewaty Sindy Niode', 'omw0BYb/5SSrkOA+MztkkQ==', 99, NULL),
(167, 'tricia@gmail.com', 'Tricia Habsari Kusumawardhani', 'Bb0BEbl6p4/GlPgWgl77xOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(168, 'resha@gmail.com', 'Resha Ayu Putri Belinawati', '88FdD8fKpTJBQ1wXrXwsrw==', 99, NULL),
(169, 'triana@gmail.com', 'Triana', 'BKfYbxxAyuagDY9y63enJevjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(170, 'rosidi@gmail.com', 'M Rosidi', 'pnXst1uLuc8UuIiWn/4DqOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(171, 'widar@gmail.com', 'Widaryanto', 'YowmNqRaaYG2XjARI+xp2A==', 99, NULL),
(172, 'candy@gmail.com', 'Candy Bonita Nauli', 'd8AQOn75a0GRMLziZJEtLQ==', 99, NULL),
(173, 'diany@gmail.com', 'Diany Budi Wibowo', 'EuFVUa74anyAOQImBJtrWA==', 99, NULL),
(174, 'anggyta@gmail.com', 'Anggyta Setyorini', 'dhsi8dpKhTRGoXswMhEBabOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(175, 'kusworo@gmail.com', 'A Kusworo', 'JoZPRlEQbSciL1btG+Guw7OEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(176, 'mustofa@gmail.com', 'Ali Mustofa', 'IAeSyQrTBx34M7+OkqwscLOEhLL6qDzJJUXrFXtP7s4=', 99, NULL),
(177, 'lastyo@gmail.com', 'Lastyo Kuntoaji Lukito', '7JY2C9Ktrew7xaM1fpDwVOvjqKnW7pCjYLeV5X7kNeE=', 99, NULL),
(178, 'bunga@gmail.com', 'Lidia Bunga Lestari', 'M6r6Imjqh8iSqlRgFkbGkg==', 99, NULL),
(179, 'fachry@gmail.com', 'Fachry Ramadyan', '4cSLgQB9YF13bpG0ETBBY+vjqKnW7pCjYLeV5X7kNeE=', 99, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_relation`
--

CREATE TABLE `staff_relation` (
  `staffRelId` int(11) NOT NULL,
  `staffRelNama` varchar(255) DEFAULT NULL,
  `staffRelEmpSubNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_relation`
--

INSERT INTO `staff_relation` (`staffRelId`, `staffRelNama`, `staffRelEmpSubNo`) VALUES
(1, 'staff', NULL),
(2, 'spouse', 1),
(3, 'child 1', 2),
(4, 'child 2', 3),
(5, 'child 3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sys_sessions`
--

CREATE TABLE `sys_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_sessions`
--

INSERT INTO `sys_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('12p9kfbaiqnppa6brrcko4n64llq5rvs', '36.73.22.196', 1533634298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633343239383b7265665573657253657373696f6e4163746976657c733a32343a225578524c624a4f796b4d585335436768387350546c773d3d223b7265665573657249647c733a323a223432223b726566557365724e616d617c733a31353a22666974726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a22466974726920532e204c75626973223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223438223b656d704e6f7c733a353a223536353635223b656d704e6f466f726d61747465647c733a373a2230303536353635223b),
('1ll8fmn4ko2cb2gcumj4d0mtcogo7he2', '36.73.22.196', 1533638567, 0x7265665573657253657373696f6e4163746976657c733a32343a22366758594c75355431322f514a6f546e4f63792b44673d3d223b7265665573657249647c733a323a223438223b726566557365724e616d617c733a31373a22616e6e6173726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31323a22416e6e617372692047616e69223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223534223b656d704e6f7c733a353a223632363538223b656d704e6f466f726d61747465647c733a373a2230303632363538223b5f5f63695f6c6173745f726567656e65726174657c693a313533333633373338383b),
('49eroj3oh5erkrqv3r686ja06irigvkj', '36.73.22.196', 1533634227, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633343232373b7265665573657253657373696f6e4163746976657c733a32343a226a36364f6a6a566432494c626c5957355339383237413d3d223b7265665573657249647c733a313a2231223b726566557365724e616d617c733a32333a226e796f6d616e2e6b7265736e6140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a32353a2249204e796f6d616e20447769204361687961204b7265736e61223b72656647726f757049647c733a333a22313030223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b),
('652mpk1i9rucgvfm89qji51k94jjsjon', '36.73.22.196', 1533638566, 0x7265665573657253657373696f6e4163746976657c733a32343a22735453444937517654414a6333483267775a4b7047413d3d223b7265665573657249647c733a313a2231223b726566557365724e616d617c733a32333a226e796f6d616e2e6b7265736e6140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a32353a2249204e796f6d616e20447769204361687961204b7265736e61223b72656647726f757049647c733a333a22313030223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b5f5f63695f6c6173745f726567656e65726174657c693a313533333633373337323b4d65646963616c5f617070726f76616c7c613a313a7b733a363a2266696c746572223b613a333a7b733a32323a22746168756e5f62656e656669745f73656c6563746564223b733a343a2232303138223b733a31393a2262656e436c6d417070726f7665537461747573223b733a333a22616c6c223b733a31313a22656d704f66666963654964223b733a333a22616c6c223b7d7d),
('781igcit59hqfeo2vj8vvu1cut05e1ec', '114.142.171.40', 1533636633, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633363531363b7265665573657253657373696f6e4163746976657c733a32343a2259357459624e49366737496c4a4e707a6353527878413d3d223b7265665573657249647c733a313a2231223b726566557365724e616d617c733a32333a226e796f6d616e2e6b7265736e6140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a32353a2249204e796f6d616e20447769204361687961204b7265736e61223b72656647726f757049647c733a333a22313030223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b),
('7ie92ituvjikg20kme174boknrujq242', '125.161.116.246', 1533633891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633333839313b7265665573657253657373696f6e4163746976657c733a32343a222f5a524f716171662f654d72655771446a48716746773d3d223b7265665573657249647c733a323a223431223b726566557365724e616d617c733a31393a22616970696e6736323140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31393a22616970696e6736323140676d61696c2e636f6d223b72656647726f757049647c733a313a2232223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b7265706f72745f6c656176655f74616e6767616c5f6177616c7c733a31313a223031204d61722032303138223b7265706f72745f6c656176655f74616e6767616c5f616b6869727c733a31313a223035204d61722032303138223b7265706f72745f6c656176655f656d704e6f7c733a353a223536353635223b7265706f72745f6c656176655f656d704e616d617c733a31343a22466974726920532e204c75626973223b),
('81qib6gch2m3o4h1a9ke6d7jho6ncgd7', '36.73.22.196', 1533633879, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633333837393b7265665573657253657373696f6e4163746976657c733a32343a2253704b6a30426f565a346d6e6a3776564d616c3666413d3d223b7265665573657249647c733a323a223830223b726566557365724e616d617c733a31353a226468656e7940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a224468656e7920536574796177616e223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223837223b656d704e6f7c733a353a223639363337223b656d704e6f466f726d61747465647c733a373a2230303639363337223b),
('882jdtv2kckigei3fgiiisnhtj8senan', '125.161.116.246', 1533637127, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633373132373b7265665573657253657373696f6e4163746976657c733a32343a22516e78566c3631587a5954326930526f756d4d772f413d3d223b7265665573657249647c733a323a223431223b726566557365724e616d617c733a31393a22616970696e6736323140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31393a22616970696e6736323140676d61696c2e636f6d223b72656647726f757049647c733a313a2232223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b),
('aef0dvicu24oiv8gk6q9fpfiqcc9dki8', '125.161.116.246', 1533638324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633383332343b7265665573657253657373696f6e4163746976657c733a32343a22497a567148356f504572652b542b57524468745462673d3d223b7265665573657249647c733a323a223432223b726566557365724e616d617c733a31353a22666974726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a22466974726920532e204c75626973223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223438223b656d704e6f7c733a353a223536353635223b656d704e6f466f726d61747465647c733a373a2230303536353635223b4d65646963616c5f617070726f76616c7c613a313a7b733a363a2266696c746572223b613a333a7b733a32323a22746168756e5f62656e656669745f73656c6563746564223b733a343a2232303138223b733a31393a2262656e436c6d417070726f7665537461747573223b733a333a22616c6c223b733a31313a22656d704f66666963654964223b733a313a2232223b7d7d),
('dtdf968ki8ud2sbdjd2j0hgegp0rab0v', '36.73.22.196', 1533631123, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633313132333b),
('ibkoicg0m95q0uhd9514p5j9r43u96s5', '36.73.22.196', 1533634766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633343736363b7265665573657253657373696f6e4163746976657c733a32343a223853466c33554b38482b4d2b6b4e346e5a74587146673d3d223b7265665573657249647c733a323a223432223b726566557365724e616d617c733a31353a22666974726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a22466974726920532e204c75626973223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223438223b656d704e6f7c733a353a223536353635223b656d704e6f466f726d61747465647c733a373a2230303536353635223b),
('s8bffmpj4f4bqsvcf44rmtfss3pc2h7o', '125.161.116.246', 1533638894, 0x7265665573657253657373696f6e4163746976657c733a32343a226f42493463795450665554773466716d4f75424c57773d3d223b7265665573657249647c733a323a223431223b726566557365724e616d617c733a31393a22616970696e6736323140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31393a22616970696e6736323140676d61696c2e636f6d223b72656647726f757049647c733a313a2232223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b5f5f63695f6c6173745f726567656e65726174657c693a313533333633383735393b4d65646963616c5f617070726f76616c7c613a313a7b733a363a2266696c746572223b613a333a7b733a32323a22746168756e5f62656e656669745f73656c6563746564223b733a343a2232303138223b733a31393a2262656e436c6d417070726f7665537461747573223b733a333a22616c6c223b733a31313a22656d704f66666963654964223b733a333a22616c6c223b7d7d),
('sits6fjthps6vodnft9up9p70qm8rmi4', '125.161.116.246', 1533632165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633323136353b7265665573657253657373696f6e4163746976657c733a32343a225245326d31636b59584738776a566957592b4e736f773d3d223b7265665573657249647c733a323a223432223b726566557365724e616d617c733a31353a22666974726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a22466974726920532e204c75626973223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223438223b656d704e6f7c733a353a223536353635223b656d704e6f466f726d61747465647c733a373a2230303536353635223b7265706f72745f6c656176655f74616e6767616c5f6177616c7c733a31313a223031204d61722032303138223b7265706f72745f6c656176655f74616e6767616c5f616b6869727c733a31313a223035204d61722032303138223b7265706f72745f6c656176655f656d704e6f7c733a353a223536353635223b7265706f72745f6c656176655f656d704e616d617c733a31343a22466974726920532e204c75626973223b),
('sl193n2ghsv9fccaag614ahvm3cavkvi', '125.161.116.246', 1533635262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633353236323b7265665573657253657373696f6e4163746976657c733a32343a22654562335a4e534b59706e47644d546138382f5954673d3d223b7265665573657249647c733a323a223432223b726566557365724e616d617c733a31353a22666974726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a22466974726920532e204c75626973223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223438223b656d704e6f7c733a353a223536353635223b656d704e6f466f726d61747465647c733a373a2230303536353635223b7265706f72745f6c656176655f74616e6767616c5f6177616c7c733a31313a223031204d61722032303138223b7265706f72745f6c656176655f74616e6767616c5f616b6869727c733a31313a223035204d61722032303138223b7265706f72745f6c656176655f656d704e6f7c733a353a223536353635223b7265706f72745f6c656176655f656d704e616d617c733a31343a22466974726920532e204c75626973223b),
('tv02bog14d6fff92h5k1ajvgs9tb2cev', '125.161.116.246', 1533631046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633313034363b7265665573657253657373696f6e4163746976657c733a32343a2271346a5a62365243706b74494e477a65417452474a413d3d223b7265665573657249647c733a323a223431223b726566557365724e616d617c733a31393a22616970696e6736323140676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31393a22616970696e6736323140676d61696c2e636f6d223b72656647726f757049647c733a313a2232223b656d7049647c733a303a22223b656d704e6f7c733a303a22223b656d704e6f466f726d61747465647c733a303a22223b7265706f72745f6c656176655f74616e6767616c5f6177616c7c733a31313a223031204d61722032303138223b7265706f72745f6c656176655f74616e6767616c5f616b6869727c733a31313a223035204d61722032303138223b7265706f72745f6c656176655f656d704e6f7c733a353a223536353635223b7265706f72745f6c656176655f656d704e616d617c733a31343a22466974726920532e204c75626973223b),
('ur5h0636bp4s1qipeftt0pfo1og77dnk', '64.233.173.60', 1533634436, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333633343430303b7265665573657253657373696f6e4163746976657c733a32343a22342b4742397a2b636c6a712b73356d7a7a2b784a46513d3d223b7265665573657249647c733a323a223432223b726566557365724e616d617c733a31353a22666974726940676d61696c2e636f6d223b726566557365724e616d6141736c697c733a31343a22466974726920532e204c75626973223b72656647726f757049647c733a323a223939223b656d7049647c733a323a223438223b656d704e6f7c733a353a223536353635223b656d704e6f466f726d61747465647c733a373a2230303536353635223b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefit_claim`
--
ALTER TABLE `benefit_claim`
  ADD PRIMARY KEY (`benClmId`),
  ADD KEY `FK_benefit_claim_employee_id` (`benClmEmpId`);

--
-- Indexes for table `benefit_claim_det`
--
ALTER TABLE `benefit_claim_det`
  ADD PRIMARY KEY (`benClmDetId`),
  ADD KEY `FK_benefit_claim_id` (`benClmDetMasterId`),
  ADD KEY `FK_benefit_claim_employee_benefit` (`benClmDetEmpBenId`);

--
-- Indexes for table `day_off`
--
ALTER TABLE `day_off`
  ADD PRIMARY KEY (`dayOffId`),
  ADD UNIQUE KEY `UNIK` (`dayOffTanggal`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empId`),
  ADD UNIQUE KEY `UNIK` (`empNo`),
  ADD UNIQUE KEY `UNIK2` (`empEmail`),
  ADD KEY `FK_emp_job_status` (`empJobStId`),
  ADD KEY `FK_emp_office_location` (`empOfficeId`),
  ADD KEY `FK_emp_marriage_status` (`empMrgSt`);

--
-- Indexes for table `employee_benefit`
--
ALTER TABLE `employee_benefit`
  ADD PRIMARY KEY (`empBenId`),
  ADD UNIQUE KEY `UNIK` (`empBenEmpId`,`empBenBenId`,`empBenRelId`),
  ADD UNIQUE KEY `UNIK_2` (`unique_index`),
  ADD KEY `FK_emp_ben_benefit_id` (`empBenBenId`),
  ADD KEY `FK_emp_ben_staff_id` (`empBenRelId`);

--
-- Indexes for table `employee_det`
--
ALTER TABLE `employee_det`
  ADD PRIMARY KEY (`empDetId`),
  ADD UNIQUE KEY `UNIK` (`empMasterId`,`empDetStaffRelId`),
  ADD KEY `FK_emp_det_staff_rel` (`empDetStaffRelId`),
  ADD KEY `FK_emp_det_marriage_status` (`empDetMrgSt`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`empLvId`),
  ADD UNIQUE KEY `UNIK` (`empYear`,`empLvEmpId`,`empLvTypNama`),
  ADD KEY `FK_employee_leave_employee` (`empLvEmpId`),
  ADD KEY `FK_employee_leave_type` (`empLvTypId`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`jobStatusId`),
  ADD UNIQUE KEY `UNIK` (`jobStatusNama`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`lvreqId`),
  ADD KEY `FK_leave_request_employee_id` (`lvreqEmpId`),
  ADD KEY `KEY_leave_request_type` (`lvreqLvNama`),
  ADD KEY `KEY_leave_request_kode` (`lvreqKode`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`lvTypId`),
  ADD UNIQUE KEY `UNIK` (`lvTypNama`,`lvMinLSA`);

--
-- Indexes for table `marriage_status`
--
ALTER TABLE `marriage_status`
  ADD PRIMARY KEY (`mrgStId`),
  ADD UNIQUE KEY `UNIK` (`mrgStNama`);

--
-- Indexes for table `monthly_period`
--
ALTER TABLE `monthly_period`
  ADD PRIMARY KEY (`monthlyPeriodId`);

--
-- Indexes for table `office_location`
--
ALTER TABLE `office_location`
  ADD PRIMARY KEY (`officeLocId`),
  ADD UNIQUE KEY `UNIK` (`officeLocKode`);

--
-- Indexes for table `outpatient_benefit`
--
ALTER TABLE `outpatient_benefit`
  ADD PRIMARY KEY (`outBenId`),
  ADD UNIQUE KEY `UNIK` (`outBenNama`),
  ADD KEY `FK_benefit_marital_status` (`outBenMaritalStatus`);

--
-- Indexes for table `ref_akses`
--
ALTER TABLE `ref_akses`
  ADD PRIMARY KEY (`refAksesId`),
  ADD UNIQUE KEY `UNIK` (`refSubMenuId`,`refGroupId`),
  ADD KEY `FK_permission_user_id` (`refGroupId`);

--
-- Indexes for table `ref_controller`
--
ALTER TABLE `ref_controller`
  ADD PRIMARY KEY (`refControllerId`),
  ADD UNIQUE KEY `UNIK` (`refControllerNama`);

--
-- Indexes for table `ref_group`
--
ALTER TABLE `ref_group`
  ADD PRIMARY KEY (`refGroupId`);

--
-- Indexes for table `ref_menu`
--
ALTER TABLE `ref_menu`
  ADD PRIMARY KEY (`refMenuId`),
  ADD UNIQUE KEY `UNIK` (`refMenuNama`);

--
-- Indexes for table `ref_pesan`
--
ALTER TABLE `ref_pesan`
  ADD PRIMARY KEY (`refPesanId`);

--
-- Indexes for table `ref_sub_menu`
--
ALTER TABLE `ref_sub_menu`
  ADD PRIMARY KEY (`refSubMenuId`),
  ADD UNIQUE KEY `UNIK` (`refSubMenuNama`),
  ADD UNIQUE KEY `UNIK_2` (`refControllerId`),
  ADD KEY `FK_sub_menu_menu_id` (`refMenuId`);

--
-- Indexes for table `ref_user`
--
ALTER TABLE `ref_user`
  ADD PRIMARY KEY (`refUserId`),
  ADD UNIQUE KEY `UNIK` (`refUserNama`),
  ADD KEY `FK_user_group_id` (`refGroupId`);

--
-- Indexes for table `staff_relation`
--
ALTER TABLE `staff_relation`
  ADD PRIMARY KEY (`staffRelId`),
  ADD UNIQUE KEY `UNIK` (`staffRelNama`),
  ADD UNIQUE KEY `UNIK2` (`staffRelEmpSubNo`);

--
-- Indexes for table `sys_sessions`
--
ALTER TABLE `sys_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefit_claim`
--
ALTER TABLE `benefit_claim`
  MODIFY `benClmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `benefit_claim_det`
--
ALTER TABLE `benefit_claim_det`
  MODIFY `benClmDetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `day_off`
--
ALTER TABLE `day_off`
  MODIFY `dayOffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1493;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `employee_benefit`
--
ALTER TABLE `employee_benefit`
  MODIFY `empBenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9867;

--
-- AUTO_INCREMENT for table `employee_det`
--
ALTER TABLE `employee_det`
  MODIFY `empDetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `empLvId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
  MODIFY `jobStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `lvreqId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `lvTypId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `marriage_status`
--
ALTER TABLE `marriage_status`
  MODIFY `mrgStId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monthly_period`
--
ALTER TABLE `monthly_period`
  MODIFY `monthlyPeriodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `office_location`
--
ALTER TABLE `office_location`
  MODIFY `officeLocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outpatient_benefit`
--
ALTER TABLE `outpatient_benefit`
  MODIFY `outBenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ref_akses`
--
ALTER TABLE `ref_akses`
  MODIFY `refAksesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `ref_controller`
--
ALTER TABLE `ref_controller`
  MODIFY `refControllerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `ref_group`
--
ALTER TABLE `ref_group`
  MODIFY `refGroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `ref_menu`
--
ALTER TABLE `ref_menu`
  MODIFY `refMenuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ref_pesan`
--
ALTER TABLE `ref_pesan`
  MODIFY `refPesanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ref_sub_menu`
--
ALTER TABLE `ref_sub_menu`
  MODIFY `refSubMenuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ref_user`
--
ALTER TABLE `ref_user`
  MODIFY `refUserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `staff_relation`
--
ALTER TABLE `staff_relation`
  MODIFY `staffRelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benefit_claim`
--
ALTER TABLE `benefit_claim`
  ADD CONSTRAINT `FK_benefit_claim_employee_id` FOREIGN KEY (`benClmEmpId`) REFERENCES `employee` (`empId`) ON UPDATE CASCADE;

--
-- Constraints for table `benefit_claim_det`
--
ALTER TABLE `benefit_claim_det`
  ADD CONSTRAINT `FK_benefit_claim_employee_benefit` FOREIGN KEY (`benClmDetEmpBenId`) REFERENCES `employee_benefit` (`empBenId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_benefit_claim_id` FOREIGN KEY (`benClmDetMasterId`) REFERENCES `benefit_claim` (`benClmId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_emp_job_status` FOREIGN KEY (`empJobStId`) REFERENCES `job_status` (`jobStatusId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp_marriage_status` FOREIGN KEY (`empMrgSt`) REFERENCES `marriage_status` (`mrgStId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp_office_location` FOREIGN KEY (`empOfficeId`) REFERENCES `office_location` (`officeLocId`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_benefit`
--
ALTER TABLE `employee_benefit`
  ADD CONSTRAINT `FK_emp_ben_benefit_id` FOREIGN KEY (`empBenBenId`) REFERENCES `outpatient_benefit` (`outBenId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp_ben_employee_id` FOREIGN KEY (`empBenEmpId`) REFERENCES `employee` (`empId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp_ben_staff_id` FOREIGN KEY (`empBenRelId`) REFERENCES `employee_det` (`empDetId`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_det`
--
ALTER TABLE `employee_det`
  ADD CONSTRAINT `FK_emp_det_emp_id` FOREIGN KEY (`empMasterId`) REFERENCES `employee` (`empId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp_det_marriage_status` FOREIGN KEY (`empDetMrgSt`) REFERENCES `marriage_status` (`mrgStId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_emp_det_staff_rel` FOREIGN KEY (`empDetStaffRelId`) REFERENCES `staff_relation` (`staffRelId`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD CONSTRAINT `FK_employee_leave_employee` FOREIGN KEY (`empLvEmpId`) REFERENCES `employee` (`empId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_employee_leave_type` FOREIGN KEY (`empLvTypId`) REFERENCES `leave_type` (`lvTypId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD CONSTRAINT `FK_leave_request_employee_id` FOREIGN KEY (`lvreqEmpId`) REFERENCES `employee` (`empId`) ON UPDATE CASCADE;

--
-- Constraints for table `ref_akses`
--
ALTER TABLE `ref_akses`
  ADD CONSTRAINT `FK_akses_group_id` FOREIGN KEY (`refGroupId`) REFERENCES `ref_group` (`refGroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_akses_sub_menu_id` FOREIGN KEY (`refSubMenuId`) REFERENCES `ref_sub_menu` (`refSubMenuId`) ON UPDATE CASCADE;

--
-- Constraints for table `ref_sub_menu`
--
ALTER TABLE `ref_sub_menu`
  ADD CONSTRAINT `FK_224A331A37DE68C` FOREIGN KEY (`refControllerId`) REFERENCES `ref_controller` (`refControllerId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_224A331ABA291022` FOREIGN KEY (`refMenuId`) REFERENCES `ref_menu` (`refMenuId`) ON UPDATE CASCADE;

--
-- Constraints for table `ref_user`
--
ALTER TABLE `ref_user`
  ADD CONSTRAINT `FK_user_group_id` FOREIGN KEY (`refGroupId`) REFERENCES `ref_group` (`refGroupId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
