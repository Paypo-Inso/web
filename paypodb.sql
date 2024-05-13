/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.4.27-MariaDB : Database - paypodb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`paypodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `paypodb`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `nam` varchar(20) NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categories` */

insert  into `categories`(`categories_id`,`nam`) values (1,'Servicios Básicos'),(2,'Facturas'),(3,'Multas'),(4,'Recurrentes'),(5,'Prestamos'),(6,'Impuestos'),(7,'Otros');

/*Table structure for table `reminders` */

DROP TABLE IF EXISTS `reminders`;

CREATE TABLE `reminders` (
  `reminders_id` int(11) NOT NULL AUTO_INCREMENT,
  `general_amount` decimal(10,2) NOT NULL,
  `quota_number` int(11) NOT NULL,
  `currency` varchar(1) NOT NULL,
  `descrip` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `payment_interval` int(11) NOT NULL,
  `status` int(11) DEFAULT 2 COMMENT '1: Pagado, 2:En proceso, 3: Cancelado',
  PRIMARY KEY (`reminders_id`),
  KEY `fk_user_reminders` (`id_user`),
  KEY `fk_categories_reminders` (`categories_id`),
  CONSTRAINT `fk_categories_reminders` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`),
  CONSTRAINT `fk_user_reminders` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reminders` */

insert  into `reminders`(`reminders_id`,`general_amount`,`quota_number`,`currency`,`descrip`,`id_user`,`categories_id`,`date_start`,`payment_interval`,`status`) values (10,'50.00',1,'1','Luz',9,1,'2024-05-15',30,2),(11,'94.00',1,'1','Telefono',10,1,'2024-05-14',30,1),(13,'100.00',1,'2','Iwusj',11,5,'2024-05-14',30,1),(14,'100.00',1,'2','Test 3',11,5,'2024-05-12',30,1),(15,'2000.00',1,'2','Test 4',11,5,'2024-05-13',30,1),(16,'200.00',1,'1','Test',11,4,'2024-05-12',30,1),(17,'100.00',10,'2','Test 7',11,2,'2024-05-12',7,2),(18,'10.00',1,'2','Ueusuaj',11,7,'2024-05-14',30,1),(19,'200.00',3,'2','Test 9',11,5,'2024-05-18',7,2),(20,'10.00',1,'2','Test 10',11,4,'2024-05-12',30,1),(21,'50.00',1,'1','Test 11',11,3,'2024-05-12',30,1),(22,'300.00',1,'2','Testing',11,6,'2024-05-15',30,2),(23,'200.00',1,'1','Luz',11,1,'2024-05-31',30,2),(24,'241.00',1,'1','1',11,1,'2024-05-13',30,1),(25,'214.00',1,'1','2',11,2,'2024-05-13',30,1),(26,'123.00',1,'1','3',11,3,'2024-05-13',30,1),(27,'123.00',1,'1','4',11,4,'2024-05-13',30,2),(28,'123.00',5,'1','5',11,5,'2024-05-13',1,2),(29,'213.00',1,'1','6',11,6,'2024-05-13',30,2),(30,'123.00',1,'1','7',11,7,'2024-05-13',30,2),(31,'234.00',1,'1','degrff',11,3,'2024-05-14',30,2),(32,'123.00',1,'1','qerwtgf',11,3,'2024-05-13',30,2),(34,'500.00',1,'1','Luz',11,1,'2024-05-25',30,2),(35,'7.00',1,'1','Le debo 7 soles a Cesar Pinillos',13,5,'2024-05-13',30,2),(37,'0.50',1,'1','Multa por dormir',14,3,'2024-05-12',30,1),(38,'250.00',1,'1','Multa por cabezón y por sentarse boca arriba',12,3,'2024-05-30',30,2),(39,'1300.00',1,'1','Predio - Casa Huanchaco ',12,6,'2024-07-24',30,2),(40,'5.00',1,'1','Tmr me olvidé del man que me dio 5 lucas',11,5,'2024-05-13',30,1),(42,'2300.00',2,'1','Interback - 2da letra',12,2,'2024-05-12',1,1),(43,'100.00',20,'1','prueba',15,5,'2024-05-13',30,2),(44,'100.00',1,'1','prueba',15,1,'2024-05-31',30,2),(45,'2000.00',1,'1','Ecxeso de velocidad',14,3,'2024-05-13',30,2),(46,'200.00',0,'1','pago para sustitutorio',12,2,'2024-05-13',1,1),(47,'72.00',1,'1','Pagar Plan Entel SuperMAX',12,4,'2024-05-13',30,2),(48,'50.00',1,'1','pago pasoaosd',12,4,'2024-05-13',30,1),(49,'40.00',1,'1','sipo',12,4,'2024-05-13',30,2),(50,'60.00',1,'1','agua',10,1,'2024-05-13',30,1),(51,'5000.00',5,'1','Sol Naciente',10,2,'2024-05-13',30,2),(52,'80.00',1,'1','sunat',10,6,'2024-05-13',30,1);

/*Table structure for table `reminders_details` */

DROP TABLE IF EXISTS `reminders_details`;

CREATE TABLE `reminders_details` (
  `reminders_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `payment_date` date NOT NULL,
  `quota` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 2 COMMENT '1: Pagado, 2: Pendiente, 3:Por vencer, 4: vencido',
  `reminders_id` int(11) NOT NULL,
  PRIMARY KEY (`reminders_details_id`),
  KEY `fk_reminders_details_reminders` (`reminders_id`),
  CONSTRAINT `fk_reminders_details_reminders` FOREIGN KEY (`reminders_id`) REFERENCES `reminders` (`reminders_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reminders_details` */

insert  into `reminders_details`(`reminders_details_id`,`name`,`payment_date`,`quota`,`amount`,`status`,`reminders_id`) values (23,'Luz','2024-05-15',1,'50.00',3,10),(24,'Telefono','2024-05-14',1,'94.00',1,11),(26,'Iwusj','2024-05-14',1,'100.00',1,13),(27,'Test 3','2024-05-12',1,'100.00',1,14),(28,'Test 4','2024-05-13',1,'2000.00',1,15),(29,'Test','2024-05-12',1,'200.00',1,16),(30,'Cuota 1','2024-05-12',1,'10.00',1,17),(31,'Cuota 2','2024-05-19',2,'10.00',2,17),(32,'Cuota 3','2024-05-26',3,'10.00',2,17),(33,'Cuota 4','2024-06-02',4,'10.00',2,17),(34,'Cuota 5','2024-06-09',5,'10.00',2,17),(35,'Cuota 6','2024-06-16',6,'10.00',2,17),(36,'Cuota 7','2024-06-23',7,'10.00',2,17),(37,'Cuota 8','2024-06-30',8,'10.00',2,17),(38,'Cuota 9','2024-07-07',9,'10.00',2,17),(39,'Cuota 10','2024-07-14',10,'10.00',2,17),(40,'Ueusuaj','2024-05-14',1,'10.00',1,18),(41,'Cuota 1','2024-05-18',1,'66.67',2,19),(42,'Cuota 2','2024-05-25',2,'66.67',2,19),(43,'Cuota 3','2024-06-01',3,'66.67',2,19),(44,'Test 10','2024-05-12',1,'10.00',1,20),(45,'Test 11','2024-05-12',1,'50.00',1,21),(46,'Testing','2024-05-15',1,'300.00',3,22),(47,'Luz','2024-05-31',1,'200.00',2,23),(48,'1','2024-05-13',1,'241.00',1,24),(49,'2','2024-05-13',1,'214.00',1,25),(50,'3','2024-05-13',1,'123.00',1,26),(51,'4','2024-05-13',1,'123.00',1,27),(52,'Cuota 1','2024-05-13',1,'24.60',3,28),(53,'Cuota 2','2024-05-14',2,'24.60',3,28),(54,'Cuota 3','2024-05-15',3,'24.60',3,28),(55,'Cuota 4','2024-05-16',4,'24.60',2,28),(56,'Cuota 5','2024-05-17',5,'24.60',2,28),(57,'6','2024-05-13',1,'213.00',3,29),(58,'7','2024-05-13',1,'123.00',3,30),(59,'degrff','2024-05-14',1,'234.00',3,31),(60,'qerwtgf','2024-05-13',1,'123.00',3,32),(62,'Luz','2024-05-25',1,'500.00',2,34),(63,'Le debo 7 soles a Cesar Pinillos','2024-05-13',1,'7.00',3,35),(65,'Multa por dormir','2024-05-12',1,'0.50',1,37),(66,'Multa por cabezón y por sentarse boca arriba','2024-05-30',1,'250.00',2,38),(67,'Predio - Casa Huanchaco ','2024-07-24',1,'1300.00',2,39),(68,'Tmr me olvidé del man que me dio 5 lucas','2024-05-13',1,'5.00',1,40),(71,'Cuota 1','2024-05-12',1,'1150.00',1,42),(72,'Cuota 2','2024-05-13',2,'1150.00',1,42),(73,'Cuota 1','2024-05-13',1,'5.00',1,43),(74,'Cuota 2','2024-06-12',2,'5.00',2,43),(75,'Cuota 3','2024-07-12',3,'5.00',2,43),(76,'Cuota 4','2024-08-11',4,'5.00',2,43),(77,'Cuota 5','2024-09-10',5,'5.00',2,43),(78,'Cuota 6','2024-10-10',6,'5.00',2,43),(79,'Cuota 7','2024-11-09',7,'5.00',2,43),(80,'Cuota 8','2024-12-09',8,'5.00',2,43),(81,'Cuota 9','2025-01-08',9,'5.00',2,43),(82,'Cuota 10','2025-02-07',10,'5.00',2,43),(83,'Cuota 11','2025-03-09',11,'5.00',2,43),(84,'Cuota 12','2025-04-08',12,'5.00',2,43),(85,'Cuota 13','2025-05-08',13,'5.00',2,43),(86,'Cuota 14','2025-06-07',14,'5.00',2,43),(87,'Cuota 15','2025-07-07',15,'5.00',2,43),(88,'Cuota 16','2025-08-06',16,'5.00',2,43),(89,'Cuota 17','2025-09-05',17,'5.00',2,43),(90,'Cuota 18','2025-10-05',18,'5.00',2,43),(91,'Cuota 19','2025-11-04',19,'5.00',2,43),(92,'Cuota 20','2025-12-04',20,'5.00',2,43),(93,'prueba','2024-05-31',1,'100.00',2,44),(94,'Ecxeso de velocidad','2024-05-13',1,'2000.00',3,45),(95,'pago para sustitutorio','2024-05-13',1,'200.00',1,46),(96,'Pagar Plan Entel SuperMAX','2024-05-13',1,'72.00',3,47),(97,'pago pasoaosd','2024-05-13',1,'50.00',3,48),(98,'sipo','2024-05-13',1,'40.00',3,49),(99,'agua','2024-05-13',1,'60.00',1,50),(100,'Cuota 1','2024-05-13',1,'1000.00',1,51),(101,'Cuota 2','2024-06-12',2,'1000.00',2,51),(102,'Cuota 3','2024-07-12',3,'1000.00',2,51),(103,'Cuota 4','2024-08-11',4,'1000.00',2,51),(104,'Cuota 5','2024-09-10',5,'1000.00',2,51),(105,'sunat','2024-05-13',1,'80.00',1,52);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`email`,`pass`,`first_name`,`last_name`) values (9,'cesarpinillos18@gmail.com','123456','Cesar','Pinillos'),(10,'pabloasmad15@gmail.com','pablo15+','Pablo','Asmad'),(11,'dapato6984@bsomek.com','t','T','T'),(12,'franvalv@hotmail.com','contra16','François ','Valverde '),(13,'izpo1117@gmail.com','Izpo1714@','Fabricio','Ruiz Ponce'),(14,'ytolentinos1@upao.edu.pe','Jair2001','Jair','Tolentino'),(15,'ecastillor@upao.edu.pe','12345678','profe','profe'),(16,'fvalverdev@upao.edu.pe','contra164','fran','valverde');

/* Trigger structure for table `reminders_details` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `UpdateReminderStatusTrigger` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'service'@'%' */ /*!50003 TRIGGER `UpdateReminderStatusTrigger` AFTER UPDATE ON `reminders_details` FOR EACH ROW BEGIN
    DECLARE all_payments_completed INT;
    
    -- Verificar si todos los pagos están completados
    SELECT COUNT(d.reminders_id)
    INTO all_payments_completed
    FROM reminders_details d
    inner join reminders r
    on d.reminders_id = r.reminders_id
    WHERE d.reminders_id = NEW.reminders_id
    AND d.status <> 1;
    
    -- Si no hay pagos pendientes, actualizar estado del recordatorio a 1
    IF all_payments_completed = 0 THEN
        UPDATE reminders
        SET STATUS = 1
        WHERE reminders_id = NEW.reminders_id
        AND STATUS <> 1;
    END IF;
END */$$


DELIMITER ;

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `CheckPaymentStatus` */

/*!50106 DROP EVENT IF EXISTS `CheckPaymentStatus`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`service`@`%` EVENT `CheckPaymentStatus` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-11 00:00:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    -- Cambiar estado a 3 dos días antes de la fecha de pago
    call StatusDetailsReminders();
END */$$
DELIMITER ;

/* Event structure for event `CreateMonthlyReminderDetails` */

/*!50106 DROP EVENT IF EXISTS `CreateMonthlyReminderDetails`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`service`@`%` EVENT `CreateMonthlyReminderDetails` ON SCHEDULE EVERY 1 MONTH STARTS '2024-06-01 00:00:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    DECLARE is_first_day_of_month INT;
    
    -- Verificar si es el primer día del mes
    SELECT DAYOFMONTH(CURDATE()) = 1
    INTO is_first_day_of_month;
    
    IF is_first_day_of_month THEN
        -- Crear detalles de recordatorio para los recordatorios con id_category = 4
        INSERT INTO reminders_details (NAME, payment_date, quota, amount, reminders_id)
        SELECT r.descrip, 
               DATE_ADD(r.date_start, INTERVAL 1 MONTH), -- Ajustar la fecha al mismo día del mes siguiente
               1, 
               r.general_amount, 
               r.reminders_id
        FROM reminders r
        WHERE r.categories_id = 4 and r.status = 2;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `DeleteReminder` */

/*!50003 DROP PROCEDURE IF EXISTS  `DeleteReminder` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`service`@`%` PROCEDURE `DeleteReminder`(IN p_reminders_id INT)
BEGIN
    DECLARE has_pending_payments INT;
    declare v_resp int;
    
    -- Verificar si hay pagos pendientes con estado 1
    SELECT COUNT(*)
    INTO has_pending_payments
    FROM reminders_details
    WHERE reminders_id = p_reminders_id
    AND status = 1;
    
    -- Si hay pagos pendientes, no permitir la eliminación
    IF has_pending_payments > 0 THEN
	set v_resp = 0;
    ELSE
        -- Si no hay pagos pendientes, eliminar el recordatorio
        DELETE FROM reminders
        WHERE reminders_id = p_reminders_id;
        SET v_resp = 1;
    END IF;
    select v_resp;
END */$$
DELIMITER ;

/* Procedure structure for procedure `InsertReminder` */

/*!50003 DROP PROCEDURE IF EXISTS  `InsertReminder` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`service`@`%` PROCEDURE `InsertReminder`(IN p_general_amount DECIMAL(10,2), 
                                IN p_quota_number INT, 
                                IN p_currency VARCHAR(1), 
                                IN p_descrip VARCHAR(200), 
                                IN p_categories_id INT, 
                                IN p_date_start varchar(20),
                                IN p_user_id INT,
                                IN p_payment_interval INT)
BEGIN
	DECLARE quota_amount DECIMAL(10,2);
	DECLARE i INT DEFAULT 1;
	DECLARE new_reminder_id INT;
	DECLARE start_date DATE;
        DECLARE end_date DATE;
	
	INSERT INTO reminders (general_amount, quota_number, currency, descrip, categories_id, date_start, id_user, payment_interval)
	VALUES (p_general_amount, p_quota_number, p_currency, p_descrip, p_categories_id, p_date_start, p_user_id, p_payment_interval);
    
	SET new_reminder_id = LAST_INSERT_ID();
	
	-- Verificar si quota_number es mayor a 1
	    IF p_quota_number > 1 THEN
		-- Calcular el monto de cada cuota
		SET quota_amount = p_general_amount / p_quota_number;
		
		SET start_date = p_date_start;
		
		-- Insertar detalles en la tabla reminders_details
		WHILE i <= p_quota_number DO
			SET end_date = DATE_ADD(start_date, INTERVAL p_payment_interval day);
			
		    INSERT INTO reminders_details (NAME, payment_date, quota, amount, reminders_id)
		    VALUES (CONCAT('Cuota ', i), start_date, i, quota_amount, new_reminder_id);
		    SET start_date = end_date;
		    SET i = i + 1;
		END WHILE;
	    ELSE
		-- Insertar solo un detalle en la tabla reminders_details
		INSERT INTO reminders_details (NAME, payment_date, quota, amount, reminders_id)
		VALUES (p_descrip, p_date_start, 1, p_general_amount, new_reminder_id);
	    END IF;
	    
	    CALL StatusDetailsReminders();
	    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `StatusDetailsReminders` */

/*!50003 DROP PROCEDURE IF EXISTS  `StatusDetailsReminders` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`service`@`%` PROCEDURE `StatusDetailsReminders`()
BEGIN
	UPDATE reminders_details
    SET STATUS = 3
    WHERE STATUS <> 1
    AND (DATEDIFF(payment_date, CURDATE()) = 2 OR DATEDIFF(payment_date, CURDATE()) = 1 OR DATEDIFF(payment_date, CURDATE()) = 0)
    AND STATUS <> 3; -- Evitar cambios innecesarios si ya está en estado 3
    -- Cambiar estado a 4 después de la fecha de pago
    UPDATE reminders_details
    SET STATUS = 4
    WHERE STATUS <> 1
    AND payment_date < CURDATE()
    AND STATUS <> 4; -- Evitar cambios innecesarios si ya está en estado 4
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
