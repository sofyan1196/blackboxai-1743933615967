-- Tambahkan tabel users jika belum ada
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pastikan semua tabel menggunakan engine InnoDB
ALTER TABLE `users` ENGINE=InnoDB;
ALTER TABLE `esim_products` ENGINE=InnoDB;
ALTER TABLE `esim_orders` ENGINE=InnoDB;

-- Tambahkan foreign key setelah tabel users ada
ALTER TABLE `esim_orders` 
DROP FOREIGN KEY IF EXISTS `esim_orders_ibfk_1`,
DROP FOREIGN KEY IF EXISTS `esim_orders_ibfk_2`;

ALTER TABLE `esim_orders`
ADD CONSTRAINT `esim_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `esim_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `esim_products` (`id`) ON DELETE CASCADE;