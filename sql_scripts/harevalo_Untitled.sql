-- MySQL dump 10.13  Distrib 5.5.42-37.1, for Linux (x86_64)
--
-- Host: localhost    Database: harevalo_Untitled
-- ------------------------------------------------------
-- Server version	5.5.42-37.1

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
-- Table structure for table `AlumnosPorCurso`
--

DROP TABLE IF EXISTS `AlumnosPorCurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AlumnosPorCurso` (
  `idAlumnosPorCurso` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioEstudiante_IdUsuarioEstudiante` int(11) NOT NULL,
  `Curso_IdCurso` int(11) NOT NULL,
  `Activo` varchar(45) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAlumnosPorCurso`),
  KEY `fk_AlumnosPorCurso_UsuarioEstudiante1_idx` (`UsuarioEstudiante_IdUsuarioEstudiante`),
  KEY `fk_AlumnosPorCurso_Curso1_idx` (`Curso_IdCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AlumnosPorCurso`
--

LOCK TABLES `AlumnosPorCurso` WRITE;
/*!40000 ALTER TABLE `AlumnosPorCurso` DISABLE KEYS */;
INSERT INTO `AlumnosPorCurso` (`idAlumnosPorCurso`, `UsuarioEstudiante_IdUsuarioEstudiante`, `Curso_IdCurso`, `Activo`, `CreadoPor`, `FechaCreacion`) VALUES (1,5,1,'1','nancy','2015-07-22 02:22:36'),(2,1,1,'1','nancy','2015-07-22 02:23:29'),(3,6,1,'1','nancy','2015-07-22 02:47:37'),(4,7,1,'1','nancy','2015-07-22 12:06:43');
/*!40000 ALTER TABLE `AlumnosPorCurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AsesoramientoAlumno`
--

DROP TABLE IF EXISTS `AsesoramientoAlumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AsesoramientoAlumno` (
  `IdAsesoramientoAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioUnitec_IdUsuarioUnitec` int(11) NOT NULL,
  `Curso_IdCurso` int(11) NOT NULL,
  `UsuarioEstudiante_IdUsuarioEstudiante` int(11) NOT NULL,
  `PracticaProfesional_IdPracticaProfesional` int(11) NOT NULL,
  `Comentario` varchar(1000) DEFAULT NULL,
  `PuntosAcordados` varchar(5000) DEFAULT NULL,
  `FechaCreacionAsesoramiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdAsesoramientoAlumno`),
  KEY `fk_AsesoramientoAlumno_UsuarioUnitec1_idx` (`UsuarioUnitec_IdUsuarioUnitec`),
  KEY `fk_AsesoramientoAlumno_Curso1_idx` (`Curso_IdCurso`),
  KEY `fk_AsesoramientoAlumno_UsuarioEstudiante1_idx` (`UsuarioEstudiante_IdUsuarioEstudiante`),
  KEY `fk_AsesoramientoAlumno_PracticaProfesional1_idx` (`PracticaProfesional_IdPracticaProfesional`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AsesoramientoAlumno`
--

LOCK TABLES `AsesoramientoAlumno` WRITE;
/*!40000 ALTER TABLE `AsesoramientoAlumno` DISABLE KEYS */;
INSERT INTO `AsesoramientoAlumno` (`IdAsesoramientoAlumno`, `UsuarioUnitec_IdUsuarioUnitec`, `Curso_IdCurso`, `UsuarioEstudiante_IdUsuarioEstudiante`, `PracticaProfesional_IdPracticaProfesional`, `Comentario`, `PuntosAcordados`, `FechaCreacionAsesoramiento`) VALUES (1,1,1,5,12,'Favor poner atención a lo siguiente:','•Revisar ortografía.,\r\n•Algunos cambios indicados en la revisión anterior no fueron realizados.,\r\n•Revisar formato de bibliografía.,\r\n•Seguir avanzando en el desarrollo de la aplicación.','2015-07-22 10:25:16'),(2,1,1,5,12,'Necesita mejorar la redacción del informe, a continuación le envió los puntos acordados según la asesoría:','•Los específicos tienen que ser no más de 4 no podemos poner objetivos que se realizaron en 3 días o 1 semana.,\r\n•El marco teórico está muy pobre debe de enriquecer más cada ítem.,\r\n•En su documento encontrará indicaciones de que cosas agregar.,\r\n•Continuar con el trabajo realizado.,\r\n•Crear el diagrama de Gantt con el cronograma de actividades.,\r\n•Debe buscar otros proyectos y asignaciones para que se vea mejor el aporte realizado a la empresa.','2015-07-22 10:27:16'),(3,1,1,5,12,'Favor poner atención a las siguientes recomendaciones, no se aceptará el siguiente informe con los mismos errores.','•Continuar con el trabajo realizado.,\r\n•Crear el diagrama de Gantt con el cronograma de actividades.,\r\n•Debe buscar otros proyectos y asignaciones para que se vea mejor el aporte realizado a la empresa.,\r\n•No hay avance del trabajo realizado desde el último reporte??','2015-07-22 10:29:14'),(4,1,1,6,20,'Por favor avanzar con los siguientes puntos:','•Revisar ortografía.,\r\n•Algunos cambios indicados en la revisión anterior no fueron realizados.,\r\n•Revisar formato de bibliografía.,\r\n•Seguir avanzando en el desarrollo de la aplicación.','2015-07-22 10:50:01'),(5,1,1,7,21,'Necesitamos mejorar la redacción del informe, así mismo avanzar con los siguientes puntos:','•Modificar objetivos específicos que sean entre 4 y 5 máximo y que sigan el método SMART.,\r\n•Nuevamente Agregar justificación – agregar control de asesoramiento con el asesor.,\r\n•Revisar en donde puede faltar referencia bibliográfica cuidado con el plagio.,\r\n•Corregir referencias bibliográficas que especifican el número de página. ','2015-07-22 20:08:34'),(6,1,1,7,21,'No se aceptará su informe si no realiza las siguientes recomendaciones:','•Mejorar redacción y poner atención a la ortografía.,\r\n•Seguir el nombre de las secciones tal como lo indica el manual de redacción.,\r\n•Modificar objetivos específicos, que sean entre 4 y 5 máximo y que sigan el método SMART.,\r\n•Nuevamente Agregar justificación – agregar control de asesoramiento con el asesor.','2015-07-22 20:08:57');
/*!40000 ALTER TABLE `AsesoramientoAlumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Carrera`
--

DROP TABLE IF EXISTS `Carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Carrera` (
  `IdCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(45) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `TipoCarrera_idTipoCarrera` int(11) NOT NULL,
  `Imagen` varchar(500) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCarrera`),
  KEY `fk_Carrera_TipoCarrera1_idx` (`TipoCarrera_idTipoCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Carrera`
--

LOCK TABLES `Carrera` WRITE;
/*!40000 ALTER TABLE `Carrera` DISABLE KEYS */;
INSERT INTO `Carrera` (`IdCarrera`, `NombreCarrera`, `Activo`, `TipoCarrera_idTipoCarrera`, `Imagen`, `CreadoPor`, `ModificadoPor`, `FechaCreacion`, `FechaModificacion`) VALUES (1,'Sistemas Computacionales',1,2,NULL,'unitec','unitec1','2015-04-25 20:37:22','2015-07-17 19:02:00'),(2,'Industrial y de Sistemas',1,2,NULL,'unitec','unitec','2015-04-25 20:37:51','2015-05-03 21:51:34'),(3,'Gestión Logistica',1,2,NULL,'unitec','unitec','2015-04-25 20:38:08','2015-05-12 18:06:59'),(4,'Telecomunicaciones',1,2,NULL,'unitec','unitec','2015-04-25 20:38:16','2015-05-12 18:07:02'),(5,'Derecho',1,1,NULL,'unitec',NULL,'2015-04-25 20:38:38',NULL),(6,'Finanzas',1,1,NULL,'unitec',NULL,'2015-04-25 20:38:46',NULL),(7,'Diseño Gráfico',1,1,NULL,'unitec',NULL,'2015-04-25 20:39:01',NULL),(8,'Medicina y Cirugía',1,3,NULL,'unitec',NULL,'2015-04-25 20:39:31',NULL),(9,'Odontología',1,3,NULL,'unitec',NULL,'2015-04-25 20:39:45',NULL),(10,'Nutrición',1,3,NULL,'unitec',NULL,'2015-04-25 20:39:53',NULL),(11,'Admin. de Empresas Turísticas',1,1,NULL,'UNITEC','UNITEC','2015-05-01 17:06:14','2015-05-01 17:07:29'),(12,'Admin. Industrial y de Negocios',1,1,NULL,'UNITEC','UNITEC','2015-05-01 17:06:43','2015-05-01 17:07:23'),(13,'Ingeniería en Energía',1,2,NULL,'UNITEC','unitec','2015-05-01 17:09:57','2015-05-12 18:04:41'),(14,'Comunicación y Publicidad',1,1,NULL,'UNITEC',NULL,'2015-05-01 17:54:32',NULL),(15,'Relaciones Internacionales',1,1,NULL,'UNITEC',NULL,'2015-05-01 17:58:48',NULL),(16,'Psicología',1,1,NULL,'UNITEC',NULL,'2015-05-01 17:59:44',NULL),(17,'Merca. y Negocios Internacionales',1,1,NULL,'UNITEC','UNITEC','2015-05-01 18:19:07','2015-05-01 18:32:15');
/*!40000 ALTER TABLE `Carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CarreraPorUsuarioUnitec`
--

DROP TABLE IF EXISTS `CarreraPorUsuarioUnitec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CarreraPorUsuarioUnitec` (
  `IdCarreraPorUsuarioUnitec` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioUnitec_IdUsuarioUnitec` int(11) NOT NULL,
  `TipoUsuarioUnitec_IdTipoUsuarioUnitec` int(11) NOT NULL,
  `Rol_IdRol` int(11) NOT NULL,
  `Carrera_IdCarrera` int(11) NOT NULL,
  `Activo` varchar(45) DEFAULT NULL,
  `VerificadoPor` varchar(45) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  `FechaVerificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCarreraPorUsuarioUnitec`),
  UNIQUE KEY `IdCarreraPorUsuarioUnitec_UNIQUE` (`IdCarreraPorUsuarioUnitec`),
  KEY `fk_CarreraPorUsuarioUnitec_UsuarioUnitec1_idx` (`UsuarioUnitec_IdUsuarioUnitec`),
  KEY `fk_CarreraPorUsuarioUnitec_TipoUsuarioUnitec1_idx` (`TipoUsuarioUnitec_IdTipoUsuarioUnitec`),
  KEY `fk_CarreraPorUsuarioUnitec_Rol1_idx` (`Rol_IdRol`),
  KEY `fk_CarreraPorUsuarioUnitec_Carrera1_idx` (`Carrera_IdCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CarreraPorUsuarioUnitec`
--

LOCK TABLES `CarreraPorUsuarioUnitec` WRITE;
/*!40000 ALTER TABLE `CarreraPorUsuarioUnitec` DISABLE KEYS */;
INSERT INTO `CarreraPorUsuarioUnitec` (`IdCarreraPorUsuarioUnitec`, `UsuarioUnitec_IdUsuarioUnitec`, `TipoUsuarioUnitec_IdTipoUsuarioUnitec`, `Rol_IdRol`, `Carrera_IdCarrera`, `Activo`, `VerificadoPor`, `CreadoPor`, `ModificadoPor`, `FechaCreacion`, `FechaModificacion`, `FechaVerificacion`) VALUES (1,1,2,1,1,'1',NULL,NULL,NULL,NULL,NULL,NULL),(2,2,1,1,1,'1',NULL,NULL,NULL,NULL,NULL,NULL),(4,1,1,1,4,'1',NULL,NULL,NULL,NULL,NULL,NULL),(5,2,1,1,3,'1',NULL,NULL,NULL,NULL,NULL,NULL),(6,2,1,1,4,'1',NULL,NULL,NULL,NULL,NULL,NULL),(7,3,1,1,3,'0',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `CarreraPorUsuarioUnitec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CarrerasPorCurso`
--

DROP TABLE IF EXISTS `CarrerasPorCurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CarrerasPorCurso` (
  `IdCarrerasPorCurso` int(11) NOT NULL AUTO_INCREMENT,
  `Carrera_IdCarrera` int(11) NOT NULL,
  `Curso_IdCurso` int(11) NOT NULL,
  PRIMARY KEY (`IdCarrerasPorCurso`),
  KEY `fk_CarrerasPorCurso_Carrera1_idx` (`Carrera_IdCarrera`),
  KEY `fk_CarrerasPorCurso_Curso1_idx` (`Curso_IdCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CarrerasPorCurso`
--

LOCK TABLES `CarrerasPorCurso` WRITE;
/*!40000 ALTER TABLE `CarrerasPorCurso` DISABLE KEYS */;
INSERT INTO `CarrerasPorCurso` (`IdCarrerasPorCurso`, `Carrera_IdCarrera`, `Curso_IdCurso`) VALUES (1,1,1),(2,4,1);
/*!40000 ALTER TABLE `CarrerasPorCurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CarrerasPorPractica`
--

DROP TABLE IF EXISTS `CarrerasPorPractica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CarrerasPorPractica` (
  `idCarrerasPorPractica` int(11) NOT NULL AUTO_INCREMENT,
  `PracticaProfesional_IdPracticaProfesional` int(11) NOT NULL,
  `Carrera_IdCarrera` int(11) NOT NULL,
  `UsuarioEmpresa_IdUsuarioEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`idCarrerasPorPractica`),
  KEY `fk_CarrerasPorPractica_PracticaProfesional1_idx` (`PracticaProfesional_IdPracticaProfesional`),
  KEY `fk_CarrerasPorPractica_Carrera1_idx` (`Carrera_IdCarrera`),
  KEY `fk_CarrerasPorPractica_UsuarioEmpresa1_idx` (`UsuarioEmpresa_IdUsuarioEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CarrerasPorPractica`
--

LOCK TABLES `CarrerasPorPractica` WRITE;
/*!40000 ALTER TABLE `CarrerasPorPractica` DISABLE KEYS */;
INSERT INTO `CarrerasPorPractica` (`idCarrerasPorPractica`, `PracticaProfesional_IdPracticaProfesional`, `Carrera_IdCarrera`, `UsuarioEmpresa_IdUsuarioEmpresa`) VALUES (1,12,3,1),(2,12,1,1),(3,12,4,1),(4,13,1,1),(5,13,4,1),(6,14,1,1),(7,17,1,2),(8,18,4,2),(10,15,4,3),(11,16,1,3),(12,16,4,3),(13,19,1,4),(14,20,1,2),(15,21,1,3),(16,21,4,3);
/*!40000 ALTER TABLE `CarrerasPorPractica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ciudad`
--

DROP TABLE IF EXISTS `Ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ciudad` (
  `IdCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCiudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCiudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ciudad`
--

LOCK TABLES `Ciudad` WRITE;
/*!40000 ALTER TABLE `Ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ContactoEmpresa`
--

DROP TABLE IF EXISTS `ContactoEmpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ContactoEmpresa` (
  `IdContactoEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCompleto` varchar(200) DEFAULT NULL,
  `TelefonoFijo` varchar(45) DEFAULT NULL,
  `TelefonoCelular` varchar(45) DEFAULT NULL,
  `CorreoElectronico` varchar(70) DEFAULT NULL,
  `PuestoEmpresa` varchar(200) DEFAULT NULL,
  `UsuarioEmpresa_IdUsuarioEmpresa` int(11) NOT NULL,
  `UsuarioEmpresa_Rol_IdRol` int(11) NOT NULL,
  `UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa` int(11) NOT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `VerificadoPor` varchar(45) DEFAULT NULL,
  `FechaVerificacion` varchar(45) DEFAULT NULL,
  `ObjetivoProfesional` varchar(230) DEFAULT NULL,
  `DescripcionPersonal` varchar(230) DEFAULT NULL,
  `Imagen` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IdContactoEmpresa`),
  KEY `fk_ContactoEmpresa_UsuarioEmpresa1_idx` (`UsuarioEmpresa_IdUsuarioEmpresa`,`UsuarioEmpresa_Rol_IdRol`,`UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContactoEmpresa`
--

LOCK TABLES `ContactoEmpresa` WRITE;
/*!40000 ALTER TABLE `ContactoEmpresa` DISABLE KEYS */;
INSERT INTO `ContactoEmpresa` (`IdContactoEmpresa`, `NombreCompleto`, `TelefonoFijo`, `TelefonoCelular`, `CorreoElectronico`, `PuestoEmpresa`, `UsuarioEmpresa_IdUsuarioEmpresa`, `UsuarioEmpresa_Rol_IdRol`, `UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa`, `Activo`, `FechaCreacion`, `FechaModificacion`, `Usuario`, `Contrasena`, `VerificadoPor`, `FechaVerificacion`, `ObjetivoProfesional`, `DescripcionPersonal`, `Imagen`) VALUES (1,'ABELARDO ALVAREZ','22455664','99834056','abelardoa@nidodeaguilas.edu.hn','GERENTE GENERAL',1,1,1,1,'2015-06-09 21:28:01','2015-06-09 21:28:01','abelardo','proyecto','unitec1','2015-06-09 21:33:46','Mi objetivo profesional va más allá del aprendizaje, soy de las personas que pienso que enseñar es aprender dos veces, los conocimientos necesitan ser transmitidos para formar un mundo mejor.','Soy una persona carismática, amante de la naturaleza, fanatico de las nuevas tecnología. Me gusta correr, pasar tiempo con mi familia, ir a pescar entre otras cosas.','790291456505656193113742379937320947312106696837581694091abelardo.jpg'),(2,'JUAN ORLANDO HERNANDEZ','22456893','99837465','juantortilla@partidonacional.hn','PRESIDENTE',2,1,1,1,'2015-06-15 21:12:51','2015-06-15 21:12:51','juan','proyecto','unitec1','2015-06-15 21:13:35',NULL,NULL,'1158212460577488012juantortilla.jpg'),(3,'RICARDO ALVAREZ','22456789','99485764','ricardo@partidonacional.hn','DESIGNADO PRESIDENCIAL',2,1,1,1,'2015-06-15 21:12:51','2015-06-15 21:12:51','ricardo','proyecto','unitec1','2015-06-15 21:13:35',NULL,NULL,'7867507338523864333ricardoladron.jpg'),(4,'SALVADOR NASRALLA','25543949','99384532','salvadorpac@salvadornasralla.com','CEO PAC',3,1,1,1,'2015-06-15 21:44:12','2015-06-15 21:44:12','salvador','proyecto','unitec1','2015-06-15 21:44:52',NULL,NULL,'6871018288657068814SalvadorMiPresidente.jpg'),(5,'HANS HOLGER ALBRECHT','23234235','99323423','hans@tigo.com.hn','DIRECTOR EJECUTIVO',4,1,1,1,'2015-06-16 23:59:24','2015-06-16 23:59:24','hans','proyecto','carlos','2015-07-21 23:13:53',NULL,NULL,NULL),(7,'LUIS ROLANDO REDONDO','28839454','99845384','luisredondo@salvadornasralla.com','DIRECTOR DE CAMAPAÑA',3,1,1,1,'2015-07-15 21:44:12','2015-07-15 21:44:12','luis','proyecto','unitec1','2015-07-15 21:44:52',NULL,NULL,'94708960363641382570801197301612.jpg');
/*!40000 ALTER TABLE `ContactoEmpresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Curso`
--

DROP TABLE IF EXISTS `Curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Curso` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Codigo` varchar(45) DEFAULT NULL,
  `Seccion` varchar(45) DEFAULT NULL,
  `Activo` varchar(45) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `PeriodoAcademico_IdPeriodoAcademico` int(11) NOT NULL,
  `UsuarioUnitec_IdUsuarioUnitec` int(11) NOT NULL,
  PRIMARY KEY (`IdCurso`),
  KEY `fk_Curso_PeriodoAcademico1_idx` (`PeriodoAcademico_IdPeriodoAcademico`),
  KEY `fk_Curso_UsuarioUnitec1_idx` (`UsuarioUnitec_IdUsuarioUnitec`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Curso`
--

LOCK TABLES `Curso` WRITE;
/*!40000 ALTER TABLE `Curso` DISABLE KEYS */;
INSERT INTO `Curso` (`IdCurso`, `Nombre`, `Codigo`, `Seccion`, `Activo`, `CreadoPor`, `ModificadoPor`, `PeriodoAcademico_IdPeriodoAcademico`, `UsuarioUnitec_IdUsuarioUnitec`) VALUES (1,'PRáCTICA PROFESIONAL FASE I','CC9353','9983','1','nancy',NULL,2,1);
/*!40000 ALTER TABLE `Curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DireccionEmpresa`
--

DROP TABLE IF EXISTS `DireccionEmpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DireccionEmpresa` (
  `IdDireccionEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `DireccionEmpresa` varchar(45) DEFAULT NULL,
  `Principal` tinyint(1) DEFAULT NULL,
  `Activado` tinyint(1) DEFAULT NULL,
  `Ciudad_IdCiudad` int(11) NOT NULL,
  `UsuarioEmpresa_IdUsuarioEmpresa` int(11) NOT NULL,
  `UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa` int(11) NOT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdDireccionEmpresa`),
  KEY `fk_DireccionEmpresa_Ciudad1_idx` (`Ciudad_IdCiudad`),
  KEY `fk_DireccionEmpresa_UsuarioEmpresa1_idx` (`UsuarioEmpresa_IdUsuarioEmpresa`,`UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DireccionEmpresa`
--

LOCK TABLES `DireccionEmpresa` WRITE;
/*!40000 ALTER TABLE `DireccionEmpresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `DireccionEmpresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EscritorioPracticaPorAlumno`
--

DROP TABLE IF EXISTS `EscritorioPracticaPorAlumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EscritorioPracticaPorAlumno` (
  `IdEscritorioPracticaPorAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioEstudiante_IdUsuarioEstudiante` int(11) NOT NULL,
  `PracticaProfesional_IdPracticaProfesional` int(11) NOT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdEscritorioPracticaPorAlumno`),
  KEY `fk_EscritorioPracticaPorAlumno_UsuarioEstudiante1_idx` (`UsuarioEstudiante_IdUsuarioEstudiante`),
  KEY `fk_EscritorioPracticaPorAlumno_PracticaProfesional1_idx` (`PracticaProfesional_IdPracticaProfesional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EscritorioPracticaPorAlumno`
--

LOCK TABLES `EscritorioPracticaPorAlumno` WRITE;
/*!40000 ALTER TABLE `EscritorioPracticaPorAlumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `EscritorioPracticaPorAlumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PeriodoAcademico`
--

DROP TABLE IF EXISTS `PeriodoAcademico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PeriodoAcademico` (
  `IdPeriodoAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `Anio` varchar(45) DEFAULT NULL,
  `Semestre` varchar(45) DEFAULT NULL,
  `Trimestre` varchar(45) DEFAULT NULL,
  `Activo` varchar(45) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdPeriodoAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PeriodoAcademico`
--

LOCK TABLES `PeriodoAcademico` WRITE;
/*!40000 ALTER TABLE `PeriodoAcademico` DISABLE KEYS */;
INSERT INTO `PeriodoAcademico` (`IdPeriodoAcademico`, `Anio`, `Semestre`, `Trimestre`, `Activo`, `CreadoPor`, `ModificadoPor`, `FechaCreacion`) VALUES (1,'2015','1','1','1','unitec1','unitec1',NULL),(2,'2015','2','1','1','unitec1',NULL,NULL),(3,'2015','2','1','0','unitec1','unitec1',NULL);
/*!40000 ALTER TABLE `PeriodoAcademico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PracticaProfesional`
--

DROP TABLE IF EXISTS `PracticaProfesional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PracticaProfesional` (
  `IdPracticaProfesional` int(11) NOT NULL AUTO_INCREMENT,
  `AreaODepartamento` varchar(45) DEFAULT NULL,
  `PuestoDesempeniar` varchar(45) DEFAULT NULL,
  `HoraEntrada` varchar(45) DEFAULT NULL,
  `HoraSalida` varchar(45) DEFAULT NULL,
  `FechaVencimientoPlaza` varchar(45) DEFAULT NULL,
  `ObjetivoDelCargo` varchar(500) DEFAULT NULL,
  `Reponsabilidades` varchar(2000) DEFAULT NULL,
  `Observaciones` varchar(2000) DEFAULT NULL,
  `PosibilidadEmpleo` varchar(25) DEFAULT NULL,
  `RequierePromedio` varchar(45) DEFAULT NULL,
  `ContactoEmpresa_IdContactoEmpresa` int(11) NOT NULL,
  `ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa` int(11) NOT NULL,
  `ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa` int(11) NOT NULL,
  `Activo` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  `HorarioFlexible` varchar(45) DEFAULT NULL,
  `UsuarioEstudiante_IdUsuarioEstudiante` int(11) NOT NULL,
  `VinculadoPor` varchar(100) DEFAULT NULL,
  `FechaVinculacion` varchar(45) DEFAULT NULL,
  `Curso_IdCurso` int(11) NOT NULL,
  PRIMARY KEY (`IdPracticaProfesional`),
  KEY `fk_PracticaProfesional_ContactoEmpresa1_idx` (`ContactoEmpresa_IdContactoEmpresa`,`ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa`,`ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa`),
  KEY `fk_PracticaProfesional_UsuarioEstudiante1_idx` (`UsuarioEstudiante_IdUsuarioEstudiante`),
  KEY `fk_PracticaProfesional_Curso1_idx` (`Curso_IdCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PracticaProfesional`
--

LOCK TABLES `PracticaProfesional` WRITE;
/*!40000 ALTER TABLE `PracticaProfesional` DISABLE KEYS */;
INSERT INTO `PracticaProfesional` (`IdPracticaProfesional`, `AreaODepartamento`, `PuestoDesempeniar`, `HoraEntrada`, `HoraSalida`, `FechaVencimientoPlaza`, `ObjetivoDelCargo`, `Reponsabilidades`, `Observaciones`, `PosibilidadEmpleo`, `RequierePromedio`, `ContactoEmpresa_IdContactoEmpresa`, `ContactoEmpresa_UsuarioEmpresa_IdUsuarioEmpresa`, `ContactoEmpresa_UsuarioEmpresa_TipoEmpresa_IdTipoEmpresa`, `Activo`, `FechaCreacion`, `FechaModificacion`, `HorarioFlexible`, `UsuarioEstudiante_IdUsuarioEstudiante`, `VinculadoPor`, `FechaVinculacion`, `Curso_IdCurso`) VALUES (12,'Consultoría','Analista de Learning ','07:00','16:00','2015-08-31','En Nido de Águilas buscamos incorporar un Analista de Learning & Development para colaborar con el equipo regional de HR, necesitamos que los estudiante interesados pueden aplicar lo más pronto posible.','-Creación diseño y coordinación de cursos (logística gestión de materiales seguimiento de los participantes), \r\n-Gestión de la currícula de Capacitaciones  asesorando a las oficinas de diferentes países de América Latina en la implementación de iniciativas / acciones.,\r\n-Soporte y relevamiento de necesidades de las distintas oficinas de Recursos Humanos que componen la región., \r\n-Elaboración de reportes y métricas., \r\n-Elaboración de campañas de difusión de cursos., \r\n-Participación en iniciativas y foros de Learning Global. ','','1','1',1,1,1,'1','2015-07-22 00:06:50',NULL,'0',5,'nancy','2015-07-22',1),(13,'Tecnología','Soporte Redes ','10:00','19:00','2015-08-12','Necesitamos un estudiante que se encargue de  de servicios informáticos para desempeñarse en nuestra empresas como agente de  soporte técnico de redes y telecomunicaciones. ','•Dominio de redes LAN Cisco., \r\n•Dominio de las normas de cableado estructurado., \r\n•Conocimientos sobre protocolos de comunicación (TCP/IP switching routing telefonía video conferencia),	\r\n•Conocimientos sobre informática generalista, \r\n•Comprensión de las arquitecturas de redes de computadores telecomunicaciones videoconferencia telefonía e QOS,	\r\n•Conocimientos básicos sobre la gestión de centrales telefónicas., \r\n•Conocimientos básicos de sistemas operativos (Windows UNIX Linux).','Necesitamos que sea sumamente puntual y dedicado.','1','1',1,1,1,'1','2015-07-22 00:13:13',NULL,'0',0,NULL,NULL,0),(14,'IT','Analista y Soporte IT','11:00','16:00','2015-09-07','Necesitamos un estudiante pronto a graduarse de Ing. En Telecomunicaciones o carreras afines, con el objetivo de integrarlo en nuestro equipo de de IT, a continuación describimos las actividades a realizar: ','•Participar en la concepción y desarrollo de nuevos productos o servicios., \r\n•Coordinar e implementar proyectos de productos o servicios y articular la participación de todos los sectores intervinientes., \r\n•Analizar y monitorear las aplicaciones desarrolladas indicadores de gestión y satisfacción de clientes para detectar desvíos nuevos desarrollos y oportunidades de mejora. ','Imprescindible uso de paquete Office (excelente uso de Excel), Imprescindible conocimiento de Base de Datos amigables y modernas, Conocimiento de SQL (nivel intermedio/avanzado),Se valorará conocimiento en programación en PHP (PYTHON deseable) ','1','0',1,1,1,'1','2015-07-22 00:18:18',NULL,'1',0,NULL,NULL,0),(15,'Telecomunicacion y Medios','Oficial de Telecomunicaciones','05:00','13:00','2015-09-13','El estudiante que se vincule con este cargo laborará en nuestra empresa empresa de telecomunicaciones, estamos seleccionando torristas con experiencia en altura, preferentemente en empresas de telefonía manejo 2 g y 3 G.','1._ Instalación /Integración de Equipamiento NOKIA (BTS- 2G/3G/4G)., \r\n2._ Participación en Proyectos de Desarrollo para Operador.,\r\n3._ Implementación de LTE-4G,\r\n4._ Modernización de Nodos GSM-2G(Swap de Equipamiento ULTRA-Site por Flexi MultiRadio)., \r\n5._ Ampliación BandaBase y 3ra-portadora de Nodos UMTS/WCDMA-3G. ','Con licencia de conducir al día. ','0','0',4,3,1,'1','2015-07-22 00:23:02',NULL,'1',0,NULL,NULL,0),(16,'Redes y Medios','Operador de Redes','07:00','21:00','2015-09-24','Necesitamos un estudiante capaz de tomar el rol de Operador de Redes en nuestra empresa, el objetivo del cargo es mantener la calidad de los servicios a traves de la rapida y efectiva resolución de incidencias técnicas .','-Recepción de reclamos escalonados de clientes internos.,\r\n-Analisis y resolución de problemas y back office.,\r\n-Coordinación de tareas.,\r\n- Diagnosticar e informar incidencias masivas.,\r\n-Encapsulamiento Vlans-L3 Routing-OSPF- BGP-Telefonia R2  ISDN-VOIP-MPLS seguridad-Radius ','Posibilidad de empleo según rendimiento del estudiante.','1','0',7,3,1,'1','2015-07-22 00:27:44',NULL,'1',0,NULL,NULL,0),(17,'Sistemas','Analista Programador','08:00','15:00','2015-11-30','Disponer servicios de soporte y administración de sistemas computacionales al igual que involucrarse en el desarrollo y adaptación de  sistemas computacionales de la organización.','1._ Programar consultas para obtener información de una base de datos de acuerdo a los requerimientos de la organización.,\r\n2._ Construir programas y rutinas de baja y mediana complejidad que dan solución a requerimientos de la organización y acordes a tecnologías de mercado.,\r\n3._ Construir programas y rutinas de alta complejidad que dan solución a requerimientos de la organización y acordes a tecnologías de mercado.','','0','0',2,2,1,'1','2015-07-22 00:47:03',NULL,'0',0,NULL,NULL,0),(18,'Tecnología de Información','Supervisor CISCO','13:00','21:00','2015-07-31','El estudiante vinculado con este puesto estará encargado de realizar supervisiones constantes a el equipo CISCO de diferentes empresas, esto como parte de el servicio de outsourcing que brindamos.','1._Instalación de  Fibra Optica., 2._Administración de sistemas de Cisco., \r\n3._Llevar control de zonas de instalación rotación de personal realizar movimientos organización de intinerarios de instalación y programación de los mismos.','Requerimos disponibilidad de horario absoluta.','0','0',3,2,1,'1','2015-07-22 00:51:27',NULL,'1',0,NULL,NULL,0),(19,'Informática','Asistente de Informática','08:00','21:00','2015-09-10','El estudiante que desempeñe este cargo tendrá que regirse bajo las reglas de su jefe inmediato quien asignará las tareas según las requisiciones de los clientes.','1._ Acceso Remoto vía VPN.\r\n 2._ Respaldo de Información.\r\n 3._ Integración de equipo a dominios.\r\n 4._ Instalación de equipo de comunicaciones (Switch Routers etc). 5._ Soporte a Telefonía VoIP y Cableado Estructurado. 6._ Instalación de Active Directory.','','1','0',5,4,1,'1','2015-07-22 02:17:39',NULL,'1',0,NULL,NULL,0),(20,'Desarrollo ','Programador JR','09:00','22:09','2015-09-09','Necesitamos un estudiante que pueda trabajar bajo presión, ejecución y cumplimiento de procedimientos, iniciativa, proactividad, capacidad analítica, comunicación efectiva. Sean bienvenidos a nuestra empresa. ','1._ Conocimiento en XML.,\r\n2._ Desarrollo de sistemas utilizando  WebService., 3._ Desarrollo de modelos de Interfaces web., 4._ Administración de proyectos de desarrollo e implementación.','Tener motocicleta','1','1',3,2,1,'1','2015-07-22 02:46:17',NULL,'0',6,'nancy','2015-07-22',1),(21,'Desarrollo','Analistas Programadores Java','09:09','00:00','2015-07-30','Formar parte de un equipo de profesionales encargados del diseño, desarrollo, documentación y pruebas de integración de aplicaciones web y servicios, desarrollados en el stack tecnológico indicado. ','- Stack de Frameworks Spring (Spring Spring MVC Spring Security)., \r\n- Desarrollo y consumo de Web Services., \r\n- Base de datos Oracle o SQL Server., \r\n- Maven.,\r\n-JavaScript y JQuery.','Estudiante de Ingeniería en Sistemas, Informática o carreras  afines.','1','1',4,3,1,'1','2015-07-22 12:04:38',NULL,'1',7,'nancy','2015-07-22',1);
/*!40000 ALTER TABLE `PracticaProfesional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PracticasPorAlumno`
--

DROP TABLE IF EXISTS `PracticasPorAlumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PracticasPorAlumno` (
  `IdPracticasPorAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `PracticaProfesional_IdPracticaProfesional` int(11) NOT NULL,
  `UsuarioEstudiante_IdUsuarioEstudiante` int(11) NOT NULL,
  `Curso_IdCurso` int(11) NOT NULL,
  `UsuarioUnitec_IdUsuarioUnitec` int(11) NOT NULL,
  `Activo` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdPracticasPorAlumno`),
  KEY `fk_PracticasPorAlumno_PracticaProfesional1_idx` (`PracticaProfesional_IdPracticaProfesional`),
  KEY `fk_PracticasPorAlumno_UsuarioEstudiante1_idx` (`UsuarioEstudiante_IdUsuarioEstudiante`),
  KEY `fk_PracticasPorAlumno_Curso1_idx` (`Curso_IdCurso`),
  KEY `fk_PracticasPorAlumno_UsuarioUnitec1_idx` (`UsuarioUnitec_IdUsuarioUnitec`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PracticasPorAlumno`
--

LOCK TABLES `PracticasPorAlumno` WRITE;
/*!40000 ALTER TABLE `PracticasPorAlumno` DISABLE KEYS */;
INSERT INTO `PracticasPorAlumno` (`IdPracticasPorAlumno`, `PracticaProfesional_IdPracticaProfesional`, `UsuarioEstudiante_IdUsuarioEstudiante`, `Curso_IdCurso`, `UsuarioUnitec_IdUsuarioUnitec`, `Activo`, `FechaCreacion`) VALUES (1,12,5,1,1,'1','2015-07-22 02:22:58'),(2,20,6,1,1,'1','2015-07-22 02:48:41'),(3,21,7,1,1,'1','2015-07-22 12:07:07');
/*!40000 ALTER TABLE `PracticasPorAlumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rol`
--

DROP TABLE IF EXISTS `Rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rol` (
  `IdRol` int(11) NOT NULL AUTO_INCREMENT,
  `NombreRol` varchar(45) NOT NULL,
  `DescripcionRol` varchar(200) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdRol`),
  UNIQUE KEY `idRol_UNIQUE` (`IdRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rol`
--

LOCK TABLES `Rol` WRITE;
/*!40000 ALTER TABLE `Rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `Rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoCarrera`
--

DROP TABLE IF EXISTS `TipoCarrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoCarrera` (
  `idTipoCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoCarrera`
--

LOCK TABLES `TipoCarrera` WRITE;
/*!40000 ALTER TABLE `TipoCarrera` DISABLE KEYS */;
INSERT INTO `TipoCarrera` (`idTipoCarrera`, `Nombre`, `Activo`, `CreadoPor`, `ModificadoPor`, `FechaCreacion`, `FechaModificacion`) VALUES (1,'Licenciatura',1,'unitec','unitec1','2015-04-25 20:36:19','2015-07-17 15:55:38'),(2,'Ingenieria',1,'unitec','unitec','2015-04-25 20:36:25','2015-05-12 18:03:02'),(3,'Ciencias de la Salud',1,'unitec','unitec','2015-04-25 20:36:58','2015-05-12 18:01:26'),(4,'Postgrado',1,'unitec','unitec','2015-04-25 20:37:10','2015-05-12 18:01:51');
/*!40000 ALTER TABLE `TipoCarrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoEmpresa`
--

DROP TABLE IF EXISTS `TipoEmpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoEmpresa` (
  `IdTipoEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipoEmpresa` varchar(200) DEFAULT NULL,
  `DescripcionTipoEmpresa` varchar(500) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `FechaCreacion` varchar(45) DEFAULT NULL,
  `FechaModificacion` varchar(45) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdTipoEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoEmpresa`
--

LOCK TABLES `TipoEmpresa` WRITE;
/*!40000 ALTER TABLE `TipoEmpresa` DISABLE KEYS */;
INSERT INTO `TipoEmpresa` (`IdTipoEmpresa`, `NombreTipoEmpresa`, `DescripcionTipoEmpresa`, `Activo`, `FechaCreacion`, `FechaModificacion`, `CreadoPor`, `ModificadoPor`) VALUES (1,'Local',NULL,1,'2015-04-25 20:40:34','2015-05-12 18:08:07','unitec','unitec'),(2,'Internacional',NULL,1,'2015-04-25 20:40:40','2015-05-12 18:08:04','unitec','unitec'),(3,'Nacional',NULL,1,'2015-04-25 20:40:47','2015-07-17 19:02:20','unitec','unitec1');
/*!40000 ALTER TABLE `TipoEmpresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoUsuarioUnitec`
--

DROP TABLE IF EXISTS `TipoUsuarioUnitec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoUsuarioUnitec` (
  `IdTipoUsuarioUnitec` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdTipoUsuarioUnitec`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoUsuarioUnitec`
--

LOCK TABLES `TipoUsuarioUnitec` WRITE;
/*!40000 ALTER TABLE `TipoUsuarioUnitec` DISABLE KEYS */;
INSERT INTO `TipoUsuarioUnitec` (`IdTipoUsuarioUnitec`, `Nombre`) VALUES (1,'Asesor'),(2,'Jefe Académico');
/*!40000 ALTER TABLE `TipoUsuarioUnitec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsuarioEmpresa`
--

DROP TABLE IF EXISTS `UsuarioEmpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuarioEmpresa` (
  `IdUsuarioEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEmpresa` varchar(300) DEFAULT NULL,
  `TelefonoEmpresa` varchar(45) DEFAULT NULL,
  `CorreoEmpresa` varchar(70) DEFAULT NULL,
  `RubroEmpresa` varchar(200) DEFAULT NULL,
  `SitioWebEmpresa` varchar(200) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `FechaCreacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` varchar(50) DEFAULT NULL,
  `Rol_IdRol` int(11) NOT NULL,
  `TipoEmpresa_IdTipoEmpresa` int(11) NOT NULL,
  `VerificadoPor` varchar(45) DEFAULT NULL,
  `FechaVerificacion` varchar(45) DEFAULT NULL,
  `Mision` varchar(230) DEFAULT NULL,
  `Vision` varchar(230) DEFAULT NULL,
  PRIMARY KEY (`IdUsuarioEmpresa`),
  KEY `fk_UsuarioEmpresa_Rol1_idx` (`Rol_IdRol`),
  KEY `fk_UsuarioEmpresa_TipoEmpresa1_idx` (`TipoEmpresa_IdTipoEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuarioEmpresa`
--

LOCK TABLES `UsuarioEmpresa` WRITE;
/*!40000 ALTER TABLE `UsuarioEmpresa` DISABLE KEYS */;
INSERT INTO `UsuarioEmpresa` (`IdUsuarioEmpresa`, `NombreEmpresa`, `TelefonoEmpresa`, `CorreoEmpresa`, `RubroEmpresa`, `SitioWebEmpresa`, `CreadoPor`, `ModificadoPor`, `Activo`, `FechaCreacion`, `FechaModificacion`, `Rol_IdRol`, `TipoEmpresa_IdTipoEmpresa`, `VerificadoPor`, `FechaVerificacion`, `Mision`, `Vision`) VALUES (1,'NIDO DE AGUILAS','22218563','info@nidodaguilas.edu.hn','EDUCACION','www.nidodeaguilas.edu.hn','Invitado','Invitado',1,'2015-06-09 21:28:01','2015-06-09 21:28:01',1,1,'unitec1','2015-06-09 21:33:42','Somos una institución educativa enmarcada dentro de un esquema moderno, concebida y diseñada para que el alumno (a) reciba una educación de calidad.','Ser un centro educativo líder en la formación de ciudadanos íntegros que puedan desempeñarse eficientemente y con éxito en los distintos campos de la vida universitaria y profesional.'),(2,'PARTIDO NACIONAL','22345931','info@partidonacional.hn','POLITICA','http://partidonacional.hn/','Invitado','Invitado',1,'2015-06-15 21:12:51','2015-06-15 21:12:51',1,3,'unitec1','2015-06-15 21:13:29','Somos una organización política democrática con líderes transformadores y con una agenda ideológica moderna, vinculada a todos los sectores sociales para generar el crecimiento y bienestar del pueblo hondureño.\r\n','Somos un partido político mayoritario, humanista cristiano e incluyente, con un liderazgo ético, que promueve los cambios para transformar el país, en democracia, libertad e igualdad de oportunidades.'),(3,'PAC','22394839','info@salvadornasralla.com','POLITICA','http://www.salvadornasralla.com','Invitado','Invitado',1,'2015-06-15 21:44:12','2015-06-15 21:44:12',1,3,'unitec1','2015-06-15 21:44:48','En una época como la actual donde hay tan poco tiempo para la lectura, era necesario tener compilada, en muy pocas páginas, la historia de nuestro Partido, para que todas y todos, especialmente lo(a)s jóvenes.','\"El PAC triunfará más tarde o más temprano a despecho de los apóstatas que lo han traicionado por cobardía o por conveniencia. Entonces sabrá hacer distinción entre los que le hayan quedado fieles.'),(4,'TIGO','23423423','info@tigo.com.hn','TELECOMUNICACIONES','www.tigo.com.hn','Invitado','Invitado',1,'2015-06-16 23:59:24','2015-06-16 23:59:24',1,2,'carlos','2015-07-21 23:13:46','TIGO es la marca GSM que Millicom International Cellular S.A. (MIC), lanza al mercado, en el rubro de telefonía celular, en sus operaciones de Latinoamérica ( Honduras, El Salvador, Guatemala, Bolivia y Paraguay).\r\n ','Millicom International Cellular S.A. (MIC), con sede central en Luxemburgo, cuenta con 16 operaciones celulares en diferentes países de Asia, Latinoamérica, Europa y África.');
/*!40000 ALTER TABLE `UsuarioEmpresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsuarioEstudiante`
--

DROP TABLE IF EXISTS `UsuarioEstudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuarioEstudiante` (
  `IdUsuarioEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `PrimerApellido` varchar(45) DEFAULT NULL,
  `SegundoApellido` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Email` varchar(70) DEFAULT NULL,
  `NumeroDeCuenta` varchar(45) DEFAULT NULL,
  `CreadoPor` varchar(45) DEFAULT NULL,
  `ModificadoPor` varchar(45) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `FechaCreacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` varchar(50) DEFAULT NULL,
  `Rol_IdRol` int(11) NOT NULL,
  `Carrera_IdCarrera` int(11) NOT NULL,
  `VerificadoPor` varchar(45) DEFAULT NULL,
  `FechaVerificacion` varchar(45) DEFAULT NULL,
  `Imagen` varchar(500) DEFAULT NULL,
  `ObjetivoProfesional` varchar(230) DEFAULT NULL,
  `DescripcionPersonal` varchar(230) DEFAULT NULL,
  PRIMARY KEY (`IdUsuarioEstudiante`),
  KEY `fk_UsuarioEstudiante_Rol1_idx` (`Rol_IdRol`),
  KEY `fk_UsuarioEstudiante_Carrera1_idx` (`Carrera_IdCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuarioEstudiante`
--

LOCK TABLES `UsuarioEstudiante` WRITE;
/*!40000 ALTER TABLE `UsuarioEstudiante` DISABLE KEYS */;
INSERT INTO `UsuarioEstudiante` (`IdUsuarioEstudiante`, `Nombre`, `PrimerApellido`, `SegundoApellido`, `Usuario`, `Contrasena`, `Email`, `NumeroDeCuenta`, `CreadoPor`, `ModificadoPor`, `Activo`, `FechaCreacion`, `FechaModificacion`, `Rol_IdRol`, `Carrera_IdCarrera`, `VerificadoPor`, `FechaVerificacion`, `Imagen`, `ObjetivoProfesional`, `DescripcionPersonal`) VALUES (1,'HENRY','AREVALO','FLORES','henry','proyecto','henrya@nidodeaguilas.edu.hn','10911254','Invitado','unitec1',1,'2015-06-09 05:03:27','2015-06-09 05:03:27',2,1,'unitec1','2015-06-15 20:18:04','64968040678650145188945107627660032119956205156631768331DSC00177.JPG','Mi objetivo principal es lograr aprobar mi práctica profesional exitosamente, durante estos 3 meses espero poder desarrollar competencias que me ayuden a ser mejor cada día. ','Me caracterizo como una persona amante de la tecnología y la informática, me gusta leer, ver Netflix, viaja y conocer amigos. Mis series favoritas son Sherlock, Lost, Prision Break entre otras.'),(2,'MARY JOHANNA','ARéVALO','FLORES','mary','proyecto','johanna@nidodeaguilas.edu.hn','10911255','Invitado','unitec1',1,'2015-06-17 02:46:15','2015-06-17 02:46:15',2,4,'unitec1','2015-06-16 18:50:37','2117013651877641727386972187086940172joha.jpg',NULL,NULL),(5,'ARIEL GERMAN','CASTELLANOS','BARAHONA','ariel','proyecto','ariel@redbela.com','109234412','Invitado','Invitado',1,'2015-07-18 20:35:00','2015-07-18 20:35:00',2,1,'unitec1','2015-07-18 12:55:01','2158024613745510735ariel.jpg',NULL,NULL),(6,'DAVID','RUIZ','','david','proyecto','david@unitec.edu','10922344','Invitado','Invitado',1,'2015-07-22 10:45:01','2015-07-22 10:45:01',2,1,'nancy','2015-07-22 02:46:38',NULL,NULL,NULL),(7,'GABRIELA ISABEL ','PINEDA','GUEVARA','gabriela','proyecto','gabriela@unitec.edu','234234234','Invitado','Invitado',1,'2015-07-22 20:01:48','2015-07-22 20:01:48',2,1,'nancy','2015-07-22 12:05:12',NULL,NULL,NULL);
/*!40000 ALTER TABLE `UsuarioEstudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsuarioUnitec`
--

DROP TABLE IF EXISTS `UsuarioUnitec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsuarioUnitec` (
  `IdUsuarioUnitec` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `PrimerApellido` varchar(45) DEFAULT NULL,
  `SegundoApellido` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Email` varchar(70) DEFAULT NULL,
  `CreadoPor` varchar(50) DEFAULT NULL,
  `ModificadoPor` varchar(50) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `FechaCreacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` varchar(50) DEFAULT NULL,
  `ObjetivoProfesional` varchar(230) DEFAULT NULL,
  `DescripcionPersonal` varchar(230) DEFAULT NULL,
  `Imagen` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IdUsuarioUnitec`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsuarioUnitec`
--

LOCK TABLES `UsuarioUnitec` WRITE;
/*!40000 ALTER TABLE `UsuarioUnitec` DISABLE KEYS */;
INSERT INTO `UsuarioUnitec` (`IdUsuarioUnitec`, `Nombre`, `PrimerApellido`, `SegundoApellido`, `Usuario`, `Contrasena`, `Email`, `CreadoPor`, `ModificadoPor`, `Activo`, `FechaCreacion`, `FechaModificacion`, `ObjetivoProfesional`, `DescripcionPersonal`, `Imagen`) VALUES (1,'NANCY','URBINA','RODAS','nancy','proyecto','nurbina@unitec.edu','Invitado','Invitado',1,'2015-06-10 04:48:36','2015-06-10 04:48:36','','',''),(2,'CARLOS ROBERTO','ARIAS','ARéVALO','carlos','proyecto','carias@unitec.edu','Invitado','Invitado',1,'2015-06-16 04:11:11','2015-06-16 04:11:11',NULL,NULL,NULL),(3,'CARLOS ','ENRIQUE','VALLEJO','vallejo','proyecto','cvallejo@unitec.edu','Invitado','Invitado',0,'2015-07-22 07:53:13','2015-07-22 07:53:13',NULL,NULL,NULL);
/*!40000 ALTER TABLE `UsuarioUnitec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'harevalo_Untitled'
--

--
-- Dumping routines for database 'harevalo_Untitled'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-22 22:12:44
