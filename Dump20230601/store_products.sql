-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: store
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Apple','Fresh red apple',0.50,'images/apple.jpg','VegiesFruits','100'),(2,'Banana','Ripe yellow banana',0.25,'images/banana.jpg','VegiesFruits','100'),(7,'Carrot','Fresh Carrot',0.50,'images/carrot.jpg','VegiesFruits','100'),(8,'Spinach','Fresh Baby Spinach',0.25,'images/spinach.jpg','VegiesFruits','100'),(9,'Pork','Organic pork',14.99,'images/pork.jpg','Meat','100'),(10,'Beef','Organic beef',18.99,'images/beef.jpg','Meat','100'),(11,'Chicken','Organic free range chicken',11.99,'images/chicken.jpg','Meat','100'),(12,'Milk','Organic Milk',3.99,'images/milk.jpg','Dairy','100'),(14,'Cheese','Homemade High quality cheese',9.99,'images/cheese.jpg','Dairy','100'),(15,'Almond','Roasted Almons',10.99,'images/almond.jpg','Nuts','100'),(16,'Cashew','Roasted Cashew',8.99,'images/cashew.jpg','Nuts','100'),(17,'Macadamia','Roasted Macadamia',12.99,'images/macadamia.jpg','Nuts','100'),(18,'Yogurt','Greek Yorgurt',2.99,'images/yogurt.jpg','Dairy','100'),(19,'Spanish Chicken and Bean','',9.99,'images/chickenDish.jpg','Meal','100'),(20,'Honey Garlic Salmon','',9.99,'images/salmonDish.jpg','Meal','100'),(21,'Steak Salad','',12.99,'images/beefDish.jpg','Meal','100'),(23,'Red Smoothie','For healthy heart',3.99,'images/RedSmoothie.jpg','Drink','100'),(24,'Peanut','Organic roasted peanut ',6.99,'images/peanut.jpg','Nuts','100'),(26,'Green Smoothies','For weight loss',3.99,'images/GreenSmoothie.jpg','Drink','100'),(27,'Green Tea leaf','Tea for health',2.00,'images/greenTea.jpg','Drink','100');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-01 20:06:50
