/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `audit_logs`;
CREATE TABLE `audit_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `host` varchar(46) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `babs`;
CREATE TABLE `babs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul_bab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cpls`;
CREATE TABLE `cpls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cpmk_sub_cpmk`;
CREATE TABLE `cpmk_sub_cpmk` (
  `cpmk_id` bigint(20) unsigned NOT NULL,
  `sub_cpmk_id` bigint(20) unsigned NOT NULL,
  KEY `cpmk_id_fk_9976660` (`cpmk_id`),
  KEY `sub_cpmk_id_fk_9976660` (`sub_cpmk_id`),
  CONSTRAINT `cpmk_id_fk_9976660` FOREIGN KEY (`cpmk_id`) REFERENCES `cpmks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sub_cpmk_id_fk_9976660` FOREIGN KEY (`sub_cpmk_id`) REFERENCES `sub_cpmks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cpmks`;
CREATE TABLE `cpmks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `indikators`;
CREATE TABLE `indikators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `kabupatens`;
CREATE TABLE `kabupatens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `provinsi_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provinsi_fk_9225233` (`provinsi_id`),
  CONSTRAINT `provinsi_fk_9225233` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `klasifikasi_materi`;
CREATE TABLE `klasifikasi_materi` (
  `materi_id` bigint(20) unsigned NOT NULL,
  `klasifikasi_id` bigint(20) unsigned NOT NULL,
  KEY `materi_id_fk_10028530` (`materi_id`),
  KEY `klasifikasi_id_fk_10028530` (`klasifikasi_id`),
  CONSTRAINT `klasifikasi_id_fk_10028530` FOREIGN KEY (`klasifikasi_id`) REFERENCES `klasifikasis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materi_id_fk_10028530` FOREIGN KEY (`materi_id`) REFERENCES `materis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `klasifikasis`;
CREATE TABLE `klasifikasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_subkategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(1155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subkategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `mata_kuliahs`;
CREATE TABLE `mata_kuliahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `jumlah_pertemuan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `materis`;
CREATE TABLE `materis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `keterampilan_apoteker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sub_bab_id` bigint(20) unsigned DEFAULT NULL,
  `klasifikasi_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_bab_fk_10028527` (`sub_bab_id`),
  CONSTRAINT `sub_bab_fk_10028527` FOREIGN KEY (`sub_bab_id`) REFERENCES `sub_babs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `ms_categories`;
CREATE TABLE `ms_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `nilais`;
CREATE TABLE `nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `materi_id` bigint(20) unsigned DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk_16181618` (`user_id`),
  KEY `nilais_materi_id_foreign` (`materi_id`),
  CONSTRAINT `nilais_materi_id_foreign` FOREIGN KEY (`materi_id`) REFERENCES `materis` (`id`) ON DELETE SET NULL,
  CONSTRAINT `user_id_fk_16181618` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `penduduks`;
CREATE TABLE `penduduks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `provinsi_id` bigint(20) unsigned DEFAULT NULL,
  `kabupaten_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provinsi_fk_9225234` (`provinsi_id`),
  KEY `kabupaten_fk_9225235` (`kabupaten_id`),
  CONSTRAINT `kabupaten_fk_9225235` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`),
  CONSTRAINT `provinsi_fk_9225234` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  KEY `role_id_fk_8243770` (`role_id`),
  KEY `permission_id_fk_8243770` (`permission_id`),
  CONSTRAINT `permission_id_fk_8243770` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_8243770` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `perusahaans`;
CREATE TABLE `perusahaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_8582907` (`user_id`),
  CONSTRAINT `user_fk_8582907` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `produks`;
CREATE TABLE `produks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_checkout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koleksi_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `captcha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibilitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_maksimal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `tipe_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manajemen_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_persediaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_stok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_bump` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ongkos_kirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurir_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layanan_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dikirim_dari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penambahan_biaya_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asuransi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_unik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reseller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_komisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cs_rotator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_checkout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_titles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_checkout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_garansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variasi_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_yang_diminta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dropship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci,
  `kolom_kupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poin_poin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ringkasan_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_bispro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_finish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_finish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_text_finish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_finish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_8583206` (`user_id`),
  CONSTRAINT `user_fk_8583206` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `provinsis`;
CREATE TABLE `provinsis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `qa_messages`;
CREATE TABLE `qa_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(20) unsigned NOT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qa_messages_topic_id_foreign` (`topic_id`),
  KEY `qa_messages_sender_id_foreign` (`sender_id`),
  CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `qa_topics`;
CREATE TABLE `qa_topics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qa_topics_creator_id_foreign` (`creator_id`),
  KEY `qa_topics_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  KEY `user_id_fk_8243779` (`user_id`),
  KEY `role_id_fk_8243779` (`role_id`),
  CONSTRAINT `role_id_fk_8243779` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_8243779` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sub_babs`;
CREATE TABLE `sub_babs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sub_bab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_sub_bab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bab_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab_fk_10028521` (`bab_id`),
  CONSTRAINT `bab_fk_10028521` FOREIGN KEY (`bab_id`) REFERENCES `babs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sub_cpmks`;
CREATE TABLE `sub_cpmks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `owner_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_fk_8243834` (`owner_id`),
  CONSTRAINT `owner_fk_8243834` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `transaction_detail_transaction_header`;
CREATE TABLE `transaction_detail_transaction_header` (
  `transaction_detail_id` bigint(20) unsigned NOT NULL,
  `transaction_header_id` bigint(20) unsigned NOT NULL,
  KEY `transaction_detail_id_fk_9803894` (`transaction_detail_id`),
  KEY `transaction_header_id_fk_9803894` (`transaction_header_id`),
  CONSTRAINT `transaction_detail_id_fk_9803894` FOREIGN KEY (`transaction_detail_id`) REFERENCES `transaction_details` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaction_header_id_fk_9803894` FOREIGN KEY (`transaction_header_id`) REFERENCES `transaction_headers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `transaction_details`;
CREATE TABLE `transaction_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_idr` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `transaction_headers`;
CREATE TABLE `transaction_headers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_euro` double(15,2) DEFAULT NULL,
  `date_paid` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_fk_9824469` (`category_id`),
  CONSTRAINT `category_fk_9824469` FOREIGN KEY (`category_id`) REFERENCES `ms_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `transaksis`;
CREATE TABLE `transaksis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kustomer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `produk_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_fk_8584636` (`produk_id`),
  CONSTRAINT `produk_fk_8584636` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `user_alerts`;
CREATE TABLE `user_alerts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alert_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `user_user_alert`;
CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  KEY `user_alert_id_fk_8243839` (`user_alert_id`),
  KEY `user_id_fk_8243839` (`user_id`),
  CONSTRAINT `user_alert_id_fk_8243839` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_8243839` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_id` tinyint(4) DEFAULT '0',
  `temp_status` tinyint(1) DEFAULT '0',
  `approved` tinyint(1) DEFAULT '0',
  `verified` tinyint(1) DEFAULT '0',
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor` tinyint(1) DEFAULT '0',
  `two_factor_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) unsigned DEFAULT NULL,
  `kelas_id` bigint(20) unsigned DEFAULT NULL,
  `nidn` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `team_fk_8243835` (`team_id`),
  KEY `kelas_fk_9976644` (`kelas_id`),
  CONSTRAINT `kelas_fk_9976644` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  CONSTRAINT `team_fk_8243835` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `babs` (`id`, `judul_bab`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BAB A. Pembuatan atau Produksi Sediaan Farmasi', '2024-08-15 20:46:05', '2024-08-15 20:46:05', NULL);
INSERT INTO `babs` (`id`, `judul_bab`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'BAB B. Pengujian Mutu (QC) dan Pemastian Mutu (QA) Sediaan Farmasi', '2024-08-21 01:00:50', '2024-08-28 08:35:15', NULL);
INSERT INTO `babs` (`id`, `judul_bab`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'BAB C. Pengadaan Sediaan Farmasi dan Alat Kesehatan', '2024-08-21 01:01:30', '2024-08-28 08:35:25', NULL);
INSERT INTO `babs` (`id`, `judul_bab`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'BAB D. Penyimpanan Sediaan Farmasi dan Alat Kesehatan', '2024-08-21 01:01:35', '2024-08-28 08:35:41', NULL),
(5, 'BAB E. Distribusi/Penyaluran Sediaan Farmasi dan Alat kesehatan', '2024-08-21 09:06:27', '2024-08-28 08:35:54', NULL),
(6, 'BAB F. Pengelolaan Sediaan Narkotika, Psikotropika, dan Prekursor Farmasi', '2024-08-21 09:12:05', '2024-08-28 08:36:08', NULL),
(7, 'BAB G. Pengelolaan Sediaan Farmasi Critical, HAM, Sitostatika, Radiofarmaka, Kelompok B3', '2024-08-28 08:36:23', '2024-08-28 08:36:23', NULL),
(8, 'BAB H. Penelitian dan Pengembangan Sediaan Farmasi', '2024-08-28 08:36:33', '2024-08-28 08:36:33', NULL),
(9, 'BAB I. Compounding Sediaan Farmasi Extemporaneous', '2024-08-28 08:36:42', '2024-08-28 08:36:42', NULL),
(10, 'BAB J. Penyiapan dan Pendistribusian Bahan, Alat, Peralatan, dan Perlengkapan Steril Siap Pakai', '2024-08-28 08:36:54', '2024-08-28 08:36:54', NULL),
(11, 'BAB K.  Farmakovigilans', '2024-08-28 08:37:07', '2024-08-28 08:46:55', NULL),
(12, 'BAB L. Pelayanan Kefarmasian Untuk Individu', '2024-08-28 08:37:13', '2024-08-28 08:37:13', NULL),
(13, 'BAB M. Pelayanan Kefarmasian Untuk Masyarakat', '2024-08-28 08:37:35', '2024-08-28 08:37:35', NULL),
(14, 'Bab N. Farmasi Digital', '2024-09-09 06:01:38', '2024-09-09 06:01:46', NULL);











INSERT INTO `kelas` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `nama_kelas`) VALUES
(1, 'Veritas', '2024-09-26 03:32:33', '2024-09-26 03:33:33', NULL, 'Veritas');


INSERT INTO `klasifikasi_materi` (`materi_id`, `klasifikasi_id`) VALUES
(1, 1);
INSERT INTO `klasifikasi_materi` (`materi_id`, `klasifikasi_id`) VALUES
(2, 1);
INSERT INTO `klasifikasi_materi` (`materi_id`, `klasifikasi_id`) VALUES
(3, 1);
INSERT INTO `klasifikasi_materi` (`materi_id`, `klasifikasi_id`) VALUES
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 2),
(24, 3),
(25, 4),
(26, 2),
(27, 2),
(28, 3),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(65, 1),
(73, 1),
(73, 2),
(108, 7),
(109, 7),
(110, 7),
(111, 7),
(112, 7),
(113, 7),
(114, 7),
(115, 7),
(116, 7),
(117, 7),
(118, 7),
(119, 7),
(120, 7),
(121, 7),
(122, 7),
(123, 7);

INSERT INTO `klasifikasis` (`id`, `kode_klasifikasi`, `klasifikasi`, `kode_subkategori`, `keterangan`, `subkategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CS', 'Farmasi Klinik', 'FK', 'Clinical Science-Biomedical Science (CS-BS);', 'Farmasi Klinis', '2024-08-15 20:05:39', '2024-08-15 20:05:39', NULL);
INSERT INTO `klasifikasis` (`id`, `kode_klasifikasi`, `klasifikasi`, `kode_subkategori`, `keterangan`, `subkategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SB', 'Farmasi Komunitas', 'FS', 'Farmasi Sosial', 'Farmasi Sosial', '2024-08-15 20:06:11', '2024-08-15 20:06:11', NULL);
INSERT INTO `klasifikasis` (`id`, `kode_klasifikasi`, `klasifikasi`, `kode_subkategori`, `keterangan`, `subkategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'SB', 'Farmasi Komunitas', 'FM', 'Farmasi Manajemen', 'Farmasi Manajemen', '2024-08-15 20:06:34', '2024-08-15 20:07:15', NULL);
INSERT INTO `klasifikasis` (`id`, `kode_klasifikasi`, `klasifikasi`, `kode_subkategori`, `keterangan`, `subkategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'PS', 'Farmasi Industri', 'KF', 'Pharmaceutical Science (PS);', 'Kimia - Farmasi', '2024-08-15 20:08:00', '2024-08-15 20:08:00', NULL),
(5, 'PS', 'Farmasi Industri', 'TF', 'Pharmaceutical Science (PS)', 'Teknologi Farmasi', '2024-08-21 09:02:01', '2024-08-21 09:02:01', NULL),
(6, 'PS', 'Farmasi Industri', 'BF', 'Pharmaceutical Science (PS);', 'Biologi Farmasi', '2024-08-28 08:34:19', '2024-08-28 08:34:19', NULL),
(7, 'PSI', 'Farmasi Digital', 'TF', 'Farmasi Digital', 'Farmasi Digital', '2024-09-09 06:01:19', '2024-09-09 06:01:19', NULL);

INSERT INTO `mata_kuliahs` (`id`, `name`, `sks`, `jumlah_pertemuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Matematika', 6, 14, '2024-09-26 03:31:29', '2024-09-26 03:31:29', NULL);


INSERT INTO `materis` (`id`, `keterampilan_apoteker`, `kode`, `created_at`, `updated_at`, `deleted_at`, `sub_bab_id`, `klasifikasi_id`) VALUES
(1, 'Penentuan prosedur penimbangan bahan sesuai jenis dan bobot bahan yang dibutuhkan', 'PS-TF-A-1.1', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL);
INSERT INTO `materis` (`id`, `keterampilan_apoteker`, `kode`, `created_at`, `updated_at`, `deleted_at`, `sub_bab_id`, `klasifikasi_id`) VALUES
(2, 'Penentuan prosedur pengukuran volume bahan sesuai jenis dan volume bahan yang dibutuhkan', 'PS-TF-A-1.2', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL);
INSERT INTO `materis` (`id`, `keterampilan_apoteker`, `kode`, `created_at`, `updated_at`, `deleted_at`, `sub_bab_id`, `klasifikasi_id`) VALUES
(3, 'Verifikasi timbangan harian, pengawasan proses, dan verifikasi hasil penimbangan atau pengukuran volume bahan', 'PS-TF-A-1.3', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL);
INSERT INTO `materis` (`id`, `keterampilan_apoteker`, `kode`, `created_at`, `updated_at`, `deleted_at`, `sub_bab_id`, `klasifikasi_id`) VALUES
(4, 'Pengecilan atau reduksi ukuran partikel bahan padat', 'PS-TF-A-1.4', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(5, 'Pemisahan partikel padat untuk memperoleh derajat halus tertentu', 'PS-TF-A-1.5', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(6, 'Pengeringan bahan cair atau bahan padat lembap', 'PS-TF-A-1.6', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(7, 'Pencampuran bahan padat ? padat', 'PS-TF-A-1.7', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(8, 'Pencampuran bahan padat ? cair', 'PS-TF-A-1.8', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(9, 'Pencampuran bahan padat ? setengah padat', 'PS-TF-A-1.9', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(10, 'Pencampuran bahan cair - cair', 'PS-TF-A-1.10', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(11, 'Pencampuran bahan cair ? setengah padat', 'PS-TF-A-1.11', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(12, 'Pengenceran bahan padat, bahan cair, bahan setengah padat', 'PS-TF-A-1.12', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(13, 'Pelelehan lemak atau bahan setengah padat', 'PS-TF-A-1.13', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(14, 'Pelarutan bahan padat ke dalam cairan', 'PS-TF-A-1.14', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(15, 'Penyaringan larutan atau cairan untuk memperoleh filtrat atau untuk memisahkan kristal dari cairan', 'PS-TF-A-1.15', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(16, 'Penambahan (adding) untuk mencapai volume akhir sediaan cair', 'PS-TF-A-1.16', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(17, 'Perhitungan penyesuaian kebutuhan komponen formulasi terhadap formula standar', 'PS-TF-A-1.17', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(18, 'Perhitungan kebutuhan pelarut campuran', 'PS-TF-A-1.18', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(19, 'Perhitungan kebutuhan komponen dapar', 'PS-TF-A-1.19', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(20, 'Perhitungan isotonisitas dengan kesetaraan NaCl dan penurunan titik beku', 'PS-TF-A-1.20', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(21, 'Perhitungan kebutuhan emulgator berdasarkan nilai Hydrophilic Lipophilic Balance (HLB)', 'PS-TF-A-1.21', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(22, 'Perhitungan penyesuaian bobot basis supositoria berdasarkan displacement value', 'PS-TF-A-1.22', '2024-08-21 00:24:11', '2024-08-21 00:24:11', NULL, 1, NULL),
(23, 'Contoh Keterampilan Bab 2', 'QWERTY', '2024-08-21 01:03:14', '2024-08-21 01:03:14', NULL, 2, NULL),
(24, 'Contoh Keterampilan Bab 3', 'YUIOP', '2024-08-21 01:03:31', '2024-08-21 01:03:31', NULL, 3, NULL),
(25, 'Contoh Keterampilan Bab 4', 'ASDFG', '2024-08-21 01:03:49', '2024-08-21 01:03:49', NULL, 4, NULL),
(26, 'Contoh Keterampilan Bab 2 jilid 2', 'ZXCVBN', '2024-08-21 01:18:33', '2024-08-21 01:18:33', NULL, 2, NULL),
(27, 'Contoh Keterampilan Bab 2 jilid 3', 'VBNM', '2024-08-21 01:19:01', '2024-08-21 01:19:07', NULL, 2, NULL),
(28, 'Contoh Keterampilan Bab 3.3', 'HJKLG', '2024-08-21 01:19:36', '2024-08-21 01:19:36', NULL, 3, NULL),
(32, 'Penetapan formula sediaan yang akan dibuat', 'PS-TF-A-2.23', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(33, 'Verifikasi perhitungan dan penyiapan kebutuhan bahan baku dan bahan penolong atau eksipien', 'PS-TF-A-2.24', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(34, 'Verifikasi penyiapan alat, peralatan, dan ruangan untuk pembuatan atau produksi sediaan non steril', 'PS-TF-A-2.25', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(35, 'Verifikasi penyiapan alat, peralatan, dan ruangan untuk pembuatan atau produksi sediaan steril', 'PS-TF-A-2.26', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(36, 'Verifikasi penyiapan alat, peralatan, dan ruangan untuk pembuatan atau produksi sediaan beta lactam', 'PS-TF-A-2.27', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(37, 'Verifikasi penimbangan dan pengukuran bahan baku pada pembuatan atau produksi Sediaan Farmasi', 'PS-TF-A-2.28', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(38, 'Penghalusan dan pencampuran bahan', 'PS-TF-A-2.29', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(39, 'Pelarutan dan pencampuran bahan', 'PS-TF-A-2.30', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(40, 'Penyaringan larutan bahan, sediaan akhir', 'PS-TF-A-2.31', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(41, 'Penyiapan bahan pensuspensi, pengemulsi', 'PS-TF-A-2.32', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(42, 'Pelelehan dan pencampuran basis', 'PS-TF-A-2.33', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(43, 'Pembuatan dan pengeringan granul', 'PS-TF-A-2.34', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(44, 'Pengisian sediaan ke dalam cangkang kapsul', 'PS-TF-A-2.35', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(45, 'Pengempaan tablet', 'PS-TF-A-2.36', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(46, 'Pembuatan sediaan larutan obat minum', 'PS-TF-A-2.37', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(47, 'Pembuatan sediaan suspensi', 'PS-TF-A-2.38', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(48, 'Pembuatan sediaan emulsi', 'PS-TF-A-2.39', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(49, 'Pembuatan sediaan salep, pasta, dan krim', 'PS-TF-A-2.40', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(50, 'Pembuatan sediaan obat tetes: mata, hidung, telinga', 'PS-TF-A-2.41', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(51, 'Pencetakan supositoria', 'PS-TF-A-2.42', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(52, 'Pembuatan sediaan kosmetik', 'PS-TF-A-2.43', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(53, 'Penyalutan tablet dengan penyalut gula', 'PS-TF-A-2.44', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(54, 'Penyalutan tablet dengan penyalut film', 'PS-TF-A-2.45', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(55, 'Sterilisasi bahan atau sediaan akhir dengan teknik panas kering', 'PS-TF-A-2.46', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(56, 'Sterilisasi bahan atau sediaan akhir dengan teknik panas basah', 'PS-TF-A-2.47', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(57, 'Sterilisasi bahan atau sediaan akhir dengan teknik filtrasi', 'PS-TF-A-2.48', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(58, 'Pencampuran bahan atau sediaan akhir dengan teknik aseptik', 'PS-TF-A-2.49', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(59, 'Pengisian produk Sediaan Farmasi ke dalam wadah atau kemasan primer', 'PS-TF-A-2.50', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(60, 'Penyimpanan produk jadi sesuai hasil uji stabilitas produk', 'PS-TF-A-2.51', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(61, 'Verifikasi pengemasan hasil pembuatan atau produksi Sediaan Farmasi', 'PS-TF-A-2.52', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(62, 'Verifikasi kesesuaian informasi pada kemasan, brosur dan leaflet terhadap ketentuan atau rancangan', 'PS-TF-A-2.53', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(63, 'Verifikasi kelengkapan pengisian lembar kerja dan dokumentasi pembuatan atau produksi Sediaan Farmasi', 'PS-TF-A-2.54', '2024-08-21 09:08:32', '2024-08-21 09:08:32', NULL, 5, NULL),
(65, 'qweqweqw', '892539', '2024-08-28 08:29:47', '2024-08-28 08:29:47', NULL, 5, NULL),
(66, 'Identfikasi karakteristik kelompok masyarakat sasaran: faktor sosial, budaya, dan ekonomi', 'SB-FS-M-1.1', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(67, 'Identifikasi masalah obat masyarakat dengan melibatkan kelompok/komunitas sasaran', 'SB-FS-M-1.2', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(68, 'Penyusunan solusi masalah obat pada kelompok masyarakat sasaran', 'SB-FS-M-1.3', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(69, 'Penyiapan informasi yang berkaitan dengan obat sesuai kebutuhan kelompok masyarakat sasaran', 'SB-FS-M-1.4', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(70, 'Promosi dan edukasi kepada masyarakat tentang: Cara yang tepat untuk memperoleh obat; Penggunaan obat bijak; Cara yang tepat dalam menyimpan obat; Cara yang tepat untuk membuang obat', 'SB-FS-M-1.5', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(71, 'Promosi tentang risiko yang dapat terjadi akibat penyalahgunaan obat (drug abuse) dan atau penggunaan obat yang tidak tepat (drug misuse)', 'SB-FS-M-1.6', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(72, 'Promosi kesehatan untuk membangun kesadaran akan kesehatan, pencegahan dan pengendalian penyakit, dan gaya hidup sehat untuk mendukung keberhasilan penggunaan obat', 'SB-FS-M-1.7', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(73, 'Promosi bebas rokok dan konseling henti rokok secara kolaboratif', 'SB-FS-M-1.8', '2024-09-05 00:36:46', '2024-09-05 00:36:46', NULL, 37, NULL),
(74, 'Analisis resiko penyimpanan terhadap mutu, khasiat, dan keamanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-1', '2024-09-05 00:44:19', '2024-09-05 00:44:19', NULL, 3, '1,2'),
(75, 'Analisis resiko penyimpanan terhadap mutu, khasiat, dan keamanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-1', '2024-09-05 00:45:17', '2024-09-05 00:45:17', NULL, 3, '1,2'),
(76, 'Analisis resiko penyimpanan terhadap mutu, khasiat, dan keamanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-1', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(77, 'Penetapan tempat, metode, sarana dan prasarana penyimpanan berdasarkan pertimbangan bentuk sediaan', 'SB-FM-D-2', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(78, 'Penetapan cara penyimpanan Sediaan Farmasi berdasarkan data stabilitas', 'SB-FM-D-3', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(79, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan alfabetik nama produk', 'SB-FM-D-4', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(80, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan farmakoterapi', 'SB-FM-D-5', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(81, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan bentuk sediaan dan rute pemberian obat', 'SB-FM-D-6', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(82, 'Penerapan prinsip First in First out (FIFO) dan First Expire First Out (FEFO)', 'SB-FM-D-7', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(83, 'Penyimpanan sediaan narkotika, psikotropika, dan prekursor farmasi', 'SB-FM-D-8', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(84, 'Mapping suhu ruang penyimpanan', 'SB-FM-D-9', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(85, 'Perencanaan dan pelaksanaan monitoring suhu dan kelembaban penyimpanan', 'SB-FM-D-10', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(86, 'Pengendalian kondisi ruang penyimpanan meliputi suhu, kelembaban, dan cahaya', 'SB-FM-D-11', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(87, 'Penetapan penyimpanan troli obat emergensi dan/atau alternatif penyimpanan lain', 'SB-FM-D-12', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(88, 'Perancangan dan penetapan sistem informasi persediaan', 'SB-FM-D-13', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(89, 'Verifikasi dokumentasi penyimpanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-14', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(90, 'Identifikasi adanya kejadian tumpahan bahan di lokasi penyimpanan', 'SB-FM-D-15', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(91, 'Pengawasan penanganan tumpahan bahan di lokasi penyimpanan, dan memastikan prosedur pencegahan dilakukan', 'SB-FM-D-16', '2024-09-09 05:12:11', '2024-09-09 05:12:11', NULL, 3, NULL),
(92, 'Analisis resiko penyimpanan terhadap mutu, khasiat, dan keamanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-1', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(93, 'Penetapan tempat, metode, sarana dan prasarana penyimpanan berdasarkan pertimbangan bentuk sediaan', 'SB-FM-D-2', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(94, 'Penetapan cara penyimpanan Sediaan Farmasi berdasarkan data stabilitas', 'SB-FM-D-3', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(95, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan alfabetik nama produk', 'SB-FM-D-4', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(96, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan farmakoterapi', 'SB-FM-D-5', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(97, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan bentuk sediaan dan rute pemberian obat', 'SB-FM-D-6', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(98, 'Penerapan prinsip First in First out (FIFO) dan First Expire First Out (FEFO)', 'SB-FM-D-7', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(99, 'Penyimpanan sediaan narkotika, psikotropika, dan prekursor farmasi', 'SB-FM-D-8', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(100, 'Mapping suhu ruang penyimpanan', 'SB-FM-D-9', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(101, 'Perencanaan dan pelaksanaan monitoring suhu dan kelembaban penyimpanan', 'SB-FM-D-10', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(102, 'Pengendalian kondisi ruang penyimpanan meliputi suhu, kelembaban, dan cahaya', 'SB-FM-D-11', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(103, 'Penetapan penyimpanan troli obat emergensi dan/atau alternatif penyimpanan lain', 'SB-FM-D-12', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(104, 'Perancangan dan penetapan sistem informasi persediaan', 'SB-FM-D-13', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(105, 'Verifikasi dokumentasi penyimpanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-14', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(106, 'Identifikasi adanya kejadian tumpahan bahan di lokasi penyimpanan', 'SB-FM-D-15', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(107, 'Pengawasan penanganan tumpahan bahan di lokasi penyimpanan, dan memastikan prosedur pencegahan dilakukan', 'SB-FM-D-16', '2024-09-09 06:04:04', '2024-09-09 06:04:04', NULL, 3, NULL),
(108, 'Analisis resiko penyimpanan terhadap mutu, khasiat, dan keamanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-1', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(109, 'Penetapan tempat, metode, sarana dan prasarana penyimpanan berdasarkan pertimbangan bentuk sediaan', 'SB-FM-D-2', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(110, 'Penetapan cara penyimpanan Sediaan Farmasi berdasarkan data stabilitas', 'SB-FM-D-3', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(111, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan alfabetik nama produk', 'SB-FM-D-4', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(112, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan farmakoterapi', 'SB-FM-D-5', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(113, 'Penetapan tempat dan metode penyimpanan berdasarkan pertimbangan bentuk sediaan dan rute pemberian obat', 'SB-FM-D-6', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(114, 'Penerapan prinsip First in First out (FIFO) dan First Expire First Out (FEFO)', 'SB-FM-D-7', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(115, 'Penyimpanan sediaan narkotika, psikotropika, dan prekursor farmasi', 'SB-FM-D-8', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(116, 'Mapping suhu ruang penyimpanan', 'SB-FM-D-9', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(117, 'Perencanaan dan pelaksanaan monitoring suhu dan kelembaban penyimpanan', 'SB-FM-D-10', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(118, 'Pengendalian kondisi ruang penyimpanan meliputi suhu, kelembaban, dan cahaya', 'SB-FM-D-11', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(119, 'Penetapan penyimpanan troli obat emergensi dan/atau alternatif penyimpanan lain', 'SB-FM-D-12', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(120, 'Perancangan dan penetapan sistem informasi persediaan', 'SB-FM-D-13', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(121, 'Verifikasi dokumentasi penyimpanan Sediaan Farmasi dan Alat Kesehatan', 'SB-FM-D-14', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(122, 'Identifikasi adanya kejadian tumpahan bahan di lokasi penyimpanan', 'SB-FM-D-15', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7'),
(123, 'Pengawasan penanganan tumpahan bahan di lokasi penyimpanan, dan memastikan prosedur pencegahan dilakukan', 'SB-FM-D-16', '2024-09-09 06:15:12', '2024-09-09 06:15:12', NULL, 40, '7');



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2023_03_27_000001_create_audit_logs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2023_03_27_000002_create_permissions_table', 1),
(5, '2023_03_27_000003_create_roles_table', 1),
(6, '2023_03_27_000004_create_users_table', 1),
(7, '2023_03_27_000005_create_teams_table', 1),
(8, '2023_03_27_000006_create_user_alerts_table', 1),
(9, '2023_03_27_000007_create_permission_role_pivot_table', 1),
(10, '2023_03_27_000008_create_role_user_pivot_table', 1),
(11, '2023_03_27_000009_create_user_user_alert_pivot_table', 1),
(12, '2023_03_27_000010_add_relationship_fields_to_users_table', 1),
(13, '2023_03_27_000011_add_relationship_fields_to_teams_table', 1),
(14, '2023_03_27_000012_add_verification_fields', 1),
(15, '2023_03_27_000013_add_approval_fields', 1),
(16, '2023_03_27_000014_create_qa_topics_table', 1),
(17, '2023_03_27_000015_create_qa_messages_table', 1),
(18, '2023_06_05_171009_perusahaans', 1),
(19, '2023_06_05_171058_produks', 1),
(20, '2023_06_05_171810_transaksis', 1),
(21, '2023_06_05_171914_add_relationship_fields', 1),
(22, '2023_06_06_003558_create_media_table', 1),
(23, '2023_11_19_102042_create_provinsis_table', 1),
(24, '2023_11_19_102127_create_kabupatens_table', 1),
(25, '2023_11_19_102150_create_penduduks_table', 1),
(26, '2023_11_19_102218_add_relationship_fields_to_kabupatens_table', 1),
(27, '2023_11_19_102230_add_relationship_fields_to_penduduks_table', 1),
(28, '2024_05_28_000004_create_ms_categories_table', 1),
(29, '2024_05_28_000005_create_transaction_details_table', 1),
(30, '2024_05_28_000006_create_transaction_headers_table', 1),
(31, '2024_05_28_000009_create_transaction_detail_transaction_header_pivot_table', 1),
(32, '2024_05_28_000010_add_relationship_fields_to_transaction_headers_table', 1),
(33, '2024_07_26_000004_create_cpls_table', 1),
(34, '2024_07_26_000005_create_sub_cpmks_table', 1),
(35, '2024_07_26_000006_create_mata_kuliahs_table', 1),
(36, '2024_07_26_000007_create_kelas_table', 1),
(37, '2024_07_26_000008_create_indikators_table', 1),
(38, '2024_07_26_000009_create_cpmks_table', 1),
(39, '2024_07_26_000012_create_cpmk_sub_cpmk_pivot_table', 1),
(40, '2024_07_26_000013_add_relationship_fields_kelas_to_users_table', 1),
(41, '2024_08_15_000004_create_klasifikasis_table', 1),
(42, '2024_08_15_000005_create_babs_table', 1),
(43, '2024_08_15_000006_create_sub_babs_table', 1),
(44, '2024_08_15_000007_create_materis_table', 1),
(45, '2024_08_15_000010_create_klasifikasi_materi_pivot_table', 1),
(46, '2024_08_15_000011_add_relationship_fields_to_sub_babs_table', 1),
(47, '2024_08_15_000012_add_relationship_fields_to_materis_table', 1),
(48, '2024_08_16_000008_create_nilais_table', 1);



INSERT INTO `nilais` (`id`, `user_id`, `materi_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 90, '2024-08-21 00:37:19', '2024-08-21 00:37:19', NULL);
INSERT INTO `nilais` (`id`, `user_id`, `materi_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 2, 88, '2024-08-21 00:40:16', '2024-08-21 00:40:16', NULL);
INSERT INTO `nilais` (`id`, `user_id`, `materi_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 3, 77, '2024-08-21 00:40:26', '2024-08-21 00:40:26', NULL);
INSERT INTO `nilais` (`id`, `user_id`, `materi_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, 4, 87, '2024-08-21 00:41:33', '2024-08-21 00:41:33', NULL),
(5, 1, 23, 85, '2024-08-21 01:04:31', '2024-08-21 01:04:31', NULL),
(6, 1, 24, 91, '2024-08-21 01:04:40', '2024-08-21 01:04:40', NULL),
(7, 1, 25, 77, '2024-08-21 01:04:53', '2024-08-21 01:04:53', NULL),
(8, 1, 26, 45, '2024-08-21 01:20:03', '2024-08-21 01:20:03', NULL),
(9, 1, 27, 55, '2024-08-21 01:20:11', '2024-08-21 01:20:11', NULL),
(10, 1, 28, 34, '2024-08-21 01:20:21', '2024-08-21 01:20:21', NULL),
(11, 1, 32, 88, '2024-08-21 09:09:11', '2024-08-21 09:09:11', NULL),
(12, 2, 1, 44, '2024-08-22 06:19:55', '2024-08-22 06:19:55', NULL),
(13, 2, 2, 55, '2024-08-22 06:20:10', '2024-08-22 06:20:10', NULL),
(14, 2, 23, 90, '2024-08-22 06:20:19', '2024-08-22 06:20:19', NULL),
(15, 2, 26, 55, '2024-08-22 06:20:42', '2024-08-22 06:20:42', NULL),
(16, 2, 28, 77, '2024-08-22 06:20:54', '2024-08-22 06:20:54', NULL),
(17, 2, 25, 55, '2024-08-22 06:21:46', '2024-08-22 06:21:46', NULL),
(18, 3, 1, 22, NULL, NULL, NULL),
(19, 3, 2, 33, NULL, NULL, NULL),
(20, 3, 3, 44, NULL, NULL, NULL),
(21, 3, 4, 55, NULL, NULL, NULL),
(22, 3, 5, 66, NULL, NULL, NULL),
(23, 3, 6, 77, NULL, NULL, NULL),
(24, 3, 7, 88, NULL, NULL, NULL),
(25, 3, 8, 99, NULL, NULL, NULL),
(26, 3, 9, 22, NULL, NULL, NULL),
(27, 3, 10, 33, NULL, NULL, NULL),
(28, 3, 11, 44, NULL, NULL, NULL),
(29, 3, 12, 55, NULL, NULL, NULL),
(30, 3, 13, 66, NULL, NULL, NULL),
(31, 3, 14, 77, NULL, NULL, NULL),
(32, 3, 15, 88, NULL, NULL, NULL),
(33, 3, 16, 99, NULL, NULL, NULL),
(34, 3, 17, 22, NULL, NULL, NULL),
(35, 3, 18, 33, NULL, NULL, NULL),
(36, 3, 19, 44, NULL, NULL, NULL),
(37, 3, 20, 55, NULL, NULL, NULL),
(38, 3, 21, 66, NULL, NULL, NULL),
(39, 3, 22, 77, NULL, NULL, NULL),
(40, 3, 23, 88, NULL, NULL, NULL),
(41, 3, 24, 99, NULL, NULL, NULL),
(42, 3, 1, 22, NULL, NULL, NULL),
(43, 3, 2, 33, NULL, NULL, NULL),
(44, 3, 3, 44, NULL, NULL, NULL),
(45, 3, 4, 55, NULL, NULL, NULL),
(46, 3, 5, 66, NULL, NULL, NULL),
(47, 3, 6, 77, NULL, NULL, NULL),
(48, 3, 7, 88, NULL, NULL, NULL),
(49, 3, 8, 99, NULL, NULL, NULL),
(50, 3, 9, 22, NULL, NULL, NULL),
(51, 3, 10, 33, NULL, NULL, NULL),
(52, 3, 11, 44, NULL, NULL, NULL),
(53, 3, 12, 55, NULL, NULL, NULL),
(54, 3, 13, 66, NULL, NULL, NULL),
(55, 3, 14, 77, NULL, NULL, NULL),
(56, 3, 15, 88, NULL, NULL, NULL),
(57, 3, 16, 99, NULL, NULL, NULL),
(58, 3, 17, 22, NULL, NULL, NULL),
(59, 3, 18, 33, NULL, NULL, NULL),
(60, 3, 19, 44, NULL, NULL, NULL),
(61, 3, 20, 55, NULL, NULL, NULL),
(62, 3, 21, 66, NULL, NULL, NULL),
(63, 3, 22, 77, NULL, NULL, NULL),
(64, 3, 23, 88, NULL, NULL, NULL),
(65, 3, 24, 99, NULL, NULL, NULL),
(66, 3, 1, 22, NULL, NULL, NULL),
(67, 3, 2, 33, NULL, NULL, NULL),
(68, 3, 3, 44, NULL, NULL, NULL),
(69, 3, 4, 55, NULL, NULL, NULL),
(70, 3, 5, 66, NULL, NULL, NULL),
(71, 3, 6, 77, NULL, NULL, NULL),
(72, 3, 7, 88, NULL, NULL, NULL),
(73, 3, 8, 99, NULL, NULL, NULL),
(74, 3, 9, 22, NULL, NULL, NULL),
(75, 3, 10, 33, NULL, NULL, NULL),
(76, 3, 11, 44, NULL, NULL, NULL),
(77, 3, 12, 55, NULL, NULL, NULL),
(78, 3, 13, 66, NULL, NULL, NULL),
(79, 3, 14, 77, NULL, NULL, NULL),
(80, 3, 15, 88, NULL, NULL, NULL),
(81, 3, 16, 99, NULL, NULL, NULL),
(82, 3, 17, 22, NULL, NULL, NULL),
(83, 3, 18, 33, NULL, NULL, NULL),
(84, 3, 19, 44, NULL, NULL, NULL),
(85, 3, 20, 55, NULL, NULL, NULL),
(86, 3, 21, 66, NULL, NULL, NULL),
(87, 3, 22, 77, NULL, NULL, NULL),
(88, 3, 23, 88, NULL, NULL, NULL),
(89, 3, 24, 99, NULL, NULL, NULL),
(90, 3, 1, 22, NULL, NULL, NULL),
(91, 3, 2, 33, NULL, NULL, NULL),
(92, 3, 3, 44, NULL, NULL, NULL),
(93, 3, 4, 55, NULL, NULL, NULL),
(94, 3, 5, 66, NULL, NULL, NULL),
(95, 3, 6, 77, NULL, NULL, NULL),
(96, 3, 7, 88, NULL, NULL, NULL),
(97, 3, 8, 99, NULL, NULL, NULL),
(98, 3, 9, 22, NULL, NULL, NULL),
(99, 3, 10, 33, NULL, NULL, NULL),
(100, 3, 11, 44, NULL, NULL, NULL),
(101, 3, 12, 55, NULL, NULL, NULL),
(102, 3, 13, 66, NULL, NULL, NULL),
(103, 3, 14, 77, NULL, NULL, NULL),
(104, 3, 15, 88, NULL, NULL, NULL),
(105, 3, 16, 99, NULL, NULL, NULL),
(106, 3, 17, 22, NULL, NULL, NULL),
(107, 3, 18, 33, NULL, NULL, NULL),
(108, 3, 19, 44, NULL, NULL, NULL),
(109, 3, 20, 55, NULL, NULL, NULL),
(110, 3, 21, 66, NULL, NULL, NULL),
(111, 3, 22, 77, NULL, NULL, NULL),
(112, 3, 23, 88, NULL, NULL, NULL),
(113, 3, 24, 99, NULL, NULL, NULL);





INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1);
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 2);
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 3);
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 78),
(3, 1),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(3, 75),
(3, 76),
(3, 77),
(3, 78),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 39),
(4, 40),
(4, 41),
(4, 42),
(4, 43),
(4, 44),
(4, 45),
(4, 46),
(4, 47),
(4, 48),
(4, 49),
(4, 50),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(4, 56),
(4, 57),
(4, 58),
(4, 59),
(4, 60),
(4, 61),
(4, 62),
(4, 63),
(4, 64),
(4, 65),
(4, 66),
(4, 67),
(4, 68),
(4, 69),
(4, 70),
(4, 71),
(4, 72),
(4, 73),
(4, 74),
(4, 75),
(4, 76),
(4, 77),
(4, 78),
(3, 51),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(5, 65),
(5, 66),
(5, 67),
(5, 68),
(5, 69),
(5, 70),
(5, 71),
(5, 72),
(5, 73),
(5, 74),
(5, 75),
(5, 76),
(5, 77),
(5, 78);

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'permission_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'permission_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'cpl_create', NULL, NULL, NULL),
(18, 'cpl_edit', NULL, NULL, NULL),
(19, 'cpl_show', NULL, NULL, NULL),
(20, 'cpl_delete', NULL, NULL, NULL),
(21, 'cpl_access', NULL, NULL, NULL),
(22, 'sub_cpmk_create', NULL, NULL, NULL),
(23, 'sub_cpmk_edit', NULL, NULL, NULL),
(24, 'sub_cpmk_show', NULL, NULL, NULL),
(25, 'sub_cpmk_delete', NULL, NULL, NULL),
(26, 'sub_cpmk_access', NULL, NULL, NULL),
(27, 'mata_kuliah_create', NULL, NULL, NULL),
(28, 'mata_kuliah_edit', NULL, NULL, NULL),
(29, 'mata_kuliah_show', NULL, NULL, NULL),
(30, 'mata_kuliah_delete', NULL, NULL, NULL),
(31, 'mata_kuliah_access', NULL, NULL, NULL),
(32, 'kela_create', NULL, NULL, NULL),
(33, 'kela_edit', NULL, NULL, NULL),
(34, 'kela_show', NULL, NULL, NULL),
(35, 'kela_delete', NULL, NULL, NULL),
(36, 'kela_access', NULL, NULL, NULL),
(37, 'nilai_create', NULL, NULL, NULL),
(38, 'nilai_edit', NULL, NULL, NULL),
(39, 'nilai_show', NULL, NULL, NULL),
(40, 'nilai_delete', NULL, NULL, NULL),
(41, 'nilai_access', NULL, NULL, NULL),
(42, 'cpmk_create', NULL, NULL, NULL),
(43, 'cpmk_edit', NULL, NULL, NULL),
(44, 'cpmk_show', NULL, NULL, NULL),
(45, 'cpmk_delete', NULL, NULL, NULL),
(46, 'cpmk_access', NULL, NULL, NULL),
(47, 'audit_log_show', NULL, NULL, NULL),
(48, 'audit_log_access', NULL, NULL, NULL),
(49, 'team_create', NULL, NULL, NULL),
(50, 'team_edit', NULL, NULL, NULL),
(51, 'team_show', NULL, NULL, NULL),
(52, 'team_delete', NULL, NULL, NULL),
(53, 'team_access', NULL, NULL, NULL),
(54, 'user_alert_create', NULL, NULL, NULL),
(55, 'user_alert_show', NULL, NULL, NULL),
(56, 'user_alert_delete', NULL, NULL, NULL),
(57, 'user_alert_access', NULL, NULL, NULL),
(58, 'klasifikasi_edit', NULL, NULL, NULL),
(59, 'klasifikasi_show', NULL, NULL, NULL),
(60, 'klasifikasi_delete', NULL, NULL, NULL),
(61, 'klasifikasi_access', NULL, NULL, NULL),
(62, 'bab_create', NULL, NULL, NULL),
(63, 'bab_edit', NULL, NULL, NULL),
(64, 'bab_show', NULL, NULL, NULL),
(65, 'bab_delete', NULL, NULL, NULL),
(66, 'bab_access', NULL, NULL, NULL),
(67, 'sub_bab_create', NULL, NULL, NULL),
(68, 'sub_bab_edit', NULL, NULL, NULL),
(69, 'sub_bab_show', NULL, NULL, NULL),
(70, 'sub_bab_delete', NULL, NULL, NULL),
(71, 'sub_bab_access', NULL, NULL, NULL),
(72, 'materi_create', NULL, NULL, NULL),
(73, 'materi_edit', NULL, NULL, NULL),
(74, 'materi_show', NULL, NULL, NULL),
(75, 'materi_delete', NULL, NULL, NULL),
(76, 'materi_access', NULL, NULL, NULL),
(77, 'klasifikasi_create', NULL, NULL, NULL),
(78, 'profile_password_edit', NULL, NULL, NULL);













INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(3, 2);
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(4, 2);
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(5, 2);
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(6, 2),
(7, 2),
(8, 2),
(2, 2),
(9, 3),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(1, 1),
(14, 4);

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, '2024-08-21 00:44:48', NULL);
INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mahasiswa', NULL, '2024-09-05 00:30:38', NULL);
INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Admin', '2024-08-21 00:44:25', '2024-08-21 00:44:25', NULL);
INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Dosen', '2024-08-21 00:44:58', '2024-09-26 06:18:43', NULL),
(5, 'Operator', '2024-09-26 06:18:56', '2024-09-26 06:18:56', NULL);

INSERT INTO `sub_babs` (`id`, `sub_bab`, `judul_sub_bab`, `created_at`, `updated_at`, `deleted_at`, `bab_id`) VALUES
(1, NULL, '1) Kemampuan Dasar Pembuatan Sediaan Farmasi', '2024-08-15 20:46:28', '2024-08-15 20:46:28', NULL, 1);
INSERT INTO `sub_babs` (`id`, `sub_bab`, `judul_sub_bab`, `created_at`, `updated_at`, `deleted_at`, `bab_id`) VALUES
(2, NULL, '2)Pembuatan atau Produksi Sediaan Farmasi', '2024-08-21 01:01:18', '2024-08-28 08:38:41', NULL, 1);
INSERT INTO `sub_babs` (`id`, `sub_bab`, `judul_sub_bab`, `created_at`, `updated_at`, `deleted_at`, `bab_id`) VALUES
(3, NULL, '1) Pengukuran Parameter Mutu Sediaan Farmasi', '2024-08-21 01:01:50', '2024-08-28 08:39:00', NULL, 2);
INSERT INTO `sub_babs` (`id`, `sub_bab`, `judul_sub_bab`, `created_at`, `updated_at`, `deleted_at`, `bab_id`) VALUES
(4, NULL, '2) Pengujian Mutu Sediaan Farmasi (QC)', '2024-08-21 01:01:57', '2024-08-28 08:39:17', NULL, 2),
(5, NULL, '3) Pemastian Mutu Sediaan Farmasi', '2024-08-21 09:08:27', '2024-08-28 08:39:29', NULL, 2),
(6, NULL, '1) Perencanaan Pengadaan Sediaan Farmasi dan Alat Kesehatan', '2024-08-21 09:12:23', '2024-08-28 00:56:35', '2024-08-28 00:56:35', 6),
(7, NULL, '1) Perencanaan Pengadaan Sediaan Farmasi dan Alat Kesehatan', '2024-08-28 08:40:15', '2024-08-28 08:40:15', NULL, 3),
(8, NULL, '2) Pengadaan Sediaan Farmasi dan Alat Kesehatan', '2024-08-28 08:40:26', '2024-08-28 08:40:26', NULL, 3),
(9, NULL, '3) Penerimaan Sediaan Farmasi dan Alat Kesehatan', '2024-08-28 08:40:35', '2024-08-28 08:40:35', NULL, 3),
(10, NULL, '1) Penyimpanan Sediaan Farmasi dan Alat Kesehatan', '2024-08-28 08:40:58', '2024-08-28 08:40:58', NULL, 4),
(11, NULL, '1)Pendistribusian / Penyaluran Sediaan Farmasi dan Alat kesehatan', '2024-08-28 08:41:15', '2024-08-28 08:41:15', NULL, 5),
(12, NULL, '2) Penanganan Keluhan dan Produk Kembalian', '2024-08-28 08:41:22', '2024-08-28 08:41:22', NULL, 5),
(13, NULL, '3) Penarikan Sediaan Farmasi', '2024-08-28 08:41:29', '2024-08-28 08:41:29', NULL, 5),
(14, NULL, '4) Pemusnahan Sediaan Farmasi', '2024-08-28 08:41:36', '2024-08-28 08:41:36', NULL, 5),
(15, NULL, '1) Pengelolaan Sediaan Narkotika, Psikotropika, dan Prekursor Farmasi', '2024-08-28 08:42:00', '2024-08-28 08:42:00', NULL, 6),
(16, NULL, '1) Pengelolaan Sediaan Farmasi Critical, HAM, Sitostatika, Radiofarmaka, Kelompok B3', '2024-08-28 08:42:25', '2024-08-28 08:42:25', NULL, 7),
(17, NULL, '1) Penelitian dan Pengembangan Sediaan Farmasi', '2024-08-28 08:42:47', '2024-08-28 08:42:47', NULL, 8),
(18, NULL, '1) Compounding Sediaan Farmasi Extemporaneous', '2024-08-28 08:43:07', '2024-08-28 08:43:07', NULL, 9),
(19, NULL, '1) Penyiapan dan Pendistribusian Bahan, Alat, Peralatan, dan Perlengkapan Steril Siap Pakai', '2024-08-28 08:43:32', '2024-08-28 08:43:32', NULL, 10),
(20, NULL, '1) Farmakovigilans', '2024-08-28 08:46:41', '2024-08-28 08:46:41', NULL, 11),
(21, NULL, '2) Pelayanan Informasi Obat', '2024-08-28 08:47:18', '2024-08-28 08:47:18', NULL, 11),
(22, NULL, '1) Rekonsiliasi Obat', '2024-08-28 08:48:24', '2024-08-28 08:48:24', NULL, 12),
(23, NULL, '2) Kemampuan Dasar Kalkulasi Farmasi', '2024-08-28 08:48:34', '2024-08-28 08:48:34', NULL, 12),
(24, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | a) Assesment Administratif', '2024-08-28 08:49:09', '2024-08-28 08:49:09', NULL, 12),
(25, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | b) Assesment Farmasetis', '2024-08-28 08:49:23', '2024-08-28 08:49:23', NULL, 12),
(26, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | c) Asesmen Farmasi Klinik: Indikasi', '2024-08-28 08:49:43', '2024-08-28 08:49:43', NULL, 12),
(27, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | d) Asesmen Farmasi Klinik: Efikasi Obat', '2024-08-28 08:50:25', '2024-08-28 08:50:25', NULL, 12),
(28, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | e) Asesmen Farmasi Klinis: Keamanan Obat', '2024-08-28 08:51:21', '2024-08-28 08:51:21', NULL, 12),
(29, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | f) Asesmen Farmasi Klinis: Kepatuhan Penggunaan Obat', '2024-08-28 08:51:58', '2024-08-28 08:51:58', NULL, 12),
(30, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | g) Penatalaksanaan Masalah Obat', '2024-08-28 08:52:22', '2024-08-28 08:52:22', NULL, 12),
(31, NULL, '3) Pelayanan Obat Berdasarkan Resep/Permintaan Obat | i) Kontrol Kualitas', '2024-08-28 08:53:18', '2024-08-28 08:53:18', NULL, 12),
(32, NULL, '4) Dispensing Sediaan Farmasi dan Alat Kesehatan | a) Penyerahan Sediaan Farmasi dan Alat kesehatan', '2024-08-28 08:53:47', '2024-08-28 08:53:47', NULL, 12),
(33, NULL, '4) Dispensing Sediaan Farmasi dan Alat Kesehatan | b) Pemberian Konseling dan Edukasi', '2024-08-28 08:53:58', '2024-08-28 08:53:58', NULL, 12),
(34, NULL, '5) Pelayanan Obat Non Resep (Swamedikasi, Responding to Symptoms)', '2024-08-28 08:54:13', '2024-08-28 08:54:13', NULL, 12),
(35, NULL, '6) Pemantauan Terapi Obat | a) Pemantauan Efektivitas Penggunaan Obat', '2024-08-28 08:54:33', '2024-08-28 08:54:33', NULL, 12),
(36, NULL, '6) Pemantauan Terapi Obat | b) Pemantauan Efek Yang Tidak Diinginkan', '2024-08-28 08:54:51', '2024-08-28 08:54:51', NULL, 12),
(37, NULL, '1) Promosi dan Edukasi', '2024-08-28 08:55:16', '2024-08-28 08:55:16', NULL, 13),
(38, NULL, '2) Pengelolaan Obat Emergensi', '2024-08-28 08:55:24', '2024-08-28 08:55:24', NULL, 13),
(39, NULL, '3) Pengelolaan Obat Mitigasi Bencana', '2024-08-28 08:55:31', '2024-08-28 08:55:31', NULL, 13),
(40, NULL, '1) Mengenal Farmasi Digital', '2024-09-09 06:03:11', '2024-09-09 06:03:11', NULL, 14),
(41, 'tes', NULL, '2024-09-26 01:55:38', '2024-09-26 02:09:31', '2024-09-26 02:09:31', 14),
(42, 'tes', NULL, '2024-09-26 02:00:30', '2024-09-26 02:09:31', '2024-09-26 02:09:31', 1),
(43, 'tes', NULL, '2024-09-26 02:00:59', '2024-09-26 02:09:31', '2024-09-26 02:09:31', 1),
(44, 'tes', 'Sub Bab => Bab D.', '2024-09-26 02:02:37', '2024-09-26 02:09:31', '2024-09-26 02:09:31', 1),
(45, 'tessss', '1) Promosi dan Edukasi', '2024-09-26 02:09:06', '2024-09-26 02:09:06', NULL, 13);



INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `owner_id`) VALUES
(1, 'Universitas Indonesia', '2024-08-21 00:43:50', '2024-08-21 00:43:50', NULL, 1);
INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `owner_id`) VALUES
(2, 'Universitas Gajah Mada', '2024-08-21 00:43:59', '2024-08-21 00:43:59', NULL, 1);
INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `owner_id`) VALUES
(3, 'Universitas AMIKOM Yogyakarta', '2024-08-21 00:44:09', '2024-08-21 00:44:09', NULL, 1);
INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `owner_id`) VALUES
(4, 'failamir@students.amikom.ac.id', '2024-09-05 00:29:35', '2024-09-05 00:29:35', NULL, 12),
(5, 'ceokokngoding@gmail.com', '2024-09-06 13:00:52', '2024-09-06 13:00:52', NULL, 13);













INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `temp_id`, `temp_status`, `approved`, `verified`, `verified_at`, `verification_token`, `two_factor`, `two_factor_code`, `remember_token`, `two_factor_expires_at`, `created_at`, `updated_at`, `deleted_at`, `team_id`, `kelas_id`, `nidn`, `nim`) VALUES
(1, 'Admin', 'admin@salman.com', '2024-09-01 14:39:39', '$2y$10$dBG6PHw.DPjWaHAxC1Jzu.h/t1JWppS4c2Cj.a3/zPzykBG.R8aa.', NULL, 0, 1, 1, '2023-03-27 07:40:07', NULL, 0, NULL, 'H6ByMCsCVdBgxIV38LFWYWJ6PRq85J9XOG0TlOTADKpgZURs5nITdrtDAGdC', NULL, '2024-09-01 14:40:23', '2024-09-26 03:38:21', NULL, NULL, 1, '12334', '898131');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `temp_id`, `temp_status`, `approved`, `verified`, `verified_at`, `verification_token`, `two_factor`, `two_factor_code`, `remember_token`, `two_factor_expires_at`, `created_at`, `updated_at`, `deleted_at`, `team_id`, `kelas_id`, `nidn`, `nim`) VALUES
(2, 'Fail Amir', 'ifailamir@gmail.com', NULL, '$2y$10$Wmpm8nnXrBri/A4ftkzhJeDPwVExNvPLiAG0PBQ4Tf116gVeRBdQG', 0, 0, 1, 1, '2024-08-21 02:21:20', NULL, 0, NULL, NULL, NULL, '2024-08-21 09:21:20', '2024-08-28 00:01:37', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `temp_id`, `temp_status`, `approved`, `verified`, `verified_at`, `verification_token`, `two_factor`, `two_factor_code`, `remember_token`, `two_factor_expires_at`, `created_at`, `updated_at`, `deleted_at`, `team_id`, `kelas_id`, `nidn`, `nim`) VALUES
(3, 'Bramansyah', 'Bramansyah@admin.com', NULL, '$2y$10$sHGQCttlnxCrndyXrU3cR.L9X6tm4wc.IWIjsRpWmsdh/O5uzlYdG', 0, 0, 1, 1, '2024-08-26 12:46:44', NULL, 0, NULL, NULL, NULL, '2024-08-26 19:46:44', '2024-08-26 19:46:44', NULL, 2, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `temp_id`, `temp_status`, `approved`, `verified`, `verified_at`, `verification_token`, `two_factor`, `two_factor_code`, `remember_token`, `two_factor_expires_at`, `created_at`, `updated_at`, `deleted_at`, `team_id`, `kelas_id`, `nidn`, `nim`) VALUES
(4, 'Selesai', 'Selesai@admin.com', NULL, '$2y$10$ubQZXoXpPyJJXKc9RR3Ele/I/JiFk6IlQl/ABIGfOf54IL2Ze2Dmm', 0, 0, 1, 1, '2024-08-26 12:47:06', NULL, 0, NULL, NULL, NULL, '2024-08-26 19:47:06', '2024-08-26 19:47:06', NULL, 3, NULL, NULL, NULL),
(5, 'Fail Amir', 'FailAmir@admin.com', NULL, '$2y$10$JbQddZNENjgHJqlazf0ucOmQ4eRNevrrjNSwMYh4N3Nfvok6nAiH2', 0, 0, 1, 1, '2024-08-26 12:47:27', NULL, 0, NULL, NULL, NULL, '2024-08-26 19:47:27', '2024-08-26 19:47:27', NULL, 3, NULL, NULL, NULL),
(6, 'Azzam', 'Azzam@admin.com', NULL, '$2y$10$5uOqwnODOXhjze3GrCO8teFH3GksOPmH7TPLro3sTVr8VIga9.1j2', 0, 0, 1, 1, '2024-08-26 12:49:14', NULL, 0, NULL, NULL, NULL, '2024-08-26 19:49:14', '2024-08-26 19:49:14', NULL, 3, NULL, NULL, NULL),
(7, 'Alfir', 'Alfir@admin.com', NULL, '$2y$10$OJ1sJ3Hn8Hgy3PUSloKxK.bY1UTIxBONAkt/Ln0jVBvX2iEBr03B.', 0, 0, 1, 1, '2024-08-26 12:49:51', NULL, 0, NULL, NULL, NULL, '2024-08-26 19:49:51', '2024-08-26 19:49:51', NULL, 2, NULL, NULL, NULL),
(8, 'Rudi', 'Rudi@admin.com', NULL, '$2y$10$MW09b3/WZoAagdb41Lmx8ODURMpdtR4OBHvmAOJzcituvNRd2vSDm', 0, 0, 1, 1, '2024-08-26 12:50:20', NULL, 0, NULL, NULL, NULL, '2024-08-26 19:50:20', '2024-08-26 19:50:20', NULL, 1, NULL, NULL, NULL),
(9, 'Staff UI', 'StaffUI@gmail.com', NULL, '$2y$10$D.WM1dq6t.ncHtUq9bSEce31xE2aH7dU9wlDZmfNtuVy1P.NhBSsu', 0, 0, 1, 1, '2024-08-28 00:05:28', NULL, 0, NULL, 'x8EGoMKyy1x8gJtbjcWjtuZ1Ksu4VkORFTrEFGnsa0waRxvuErVbF4ezoDvg', NULL, '2024-08-28 00:05:28', '2024-08-28 00:05:28', NULL, 1, NULL, NULL, NULL),
(10, 'fail amir', 'faail.amir@students.amikom.ac.id', NULL, '$2y$10$M59j8WmmxYvXhA4Ka9nV6uEyhA10RV5kPYcWuvDXI0KEXpm6X6dJK', 0, 0, 0, 0, NULL, 'XoZyGKcteiMa9tugKifvpShctWuvQJJhhX6U1a2pDgA4p1D57Rb3B7nEoUzspn16', 0, NULL, NULL, NULL, '2024-09-04 23:44:51', '2024-09-04 23:44:51', NULL, NULL, NULL, NULL, NULL),
(11, 'Fail Amir', 'faailamir@students.amikom.ac.id', NULL, '$2y$10$GqsHHawfXVJKeKf6Tp2GDOgHl1wPS4W9OduD5mPKq8Vvmve/y0ICG', 0, 0, 0, 0, NULL, 'XSDydqxjWolbZh3QEweIjUFklR3uexpdb2z4FpNlPStwLJ2uHanaqd5WKUUukn2E', 0, NULL, NULL, NULL, '2024-09-04 23:54:19', '2024-09-04 23:54:19', NULL, NULL, NULL, NULL, NULL),
(12, 'Fail Amir', 'failamir@students.amikom.ac.id', NULL, '$2y$10$uEjiH1e6vvr2gwaObmQXQ.tH0uvpfbs4mSJaldId4SyNX/DjtG5Wy', 0, 0, 1, 0, NULL, 'ffwQqWO5HNVzIIOmbDoJhC2ZrC6gpCyzxUPcXAMJeT08iQyOE354qLZx9R5sggbT', 0, NULL, '2sIM5fGyuCFDGRo1HLVEBI9kM4SzkMef24ukggSJqrIlcc9LxLbRyw0QSHKv', NULL, '2024-09-05 00:29:32', '2024-09-05 00:31:14', NULL, 1, NULL, NULL, NULL),
(13, 'Fail Amir', 'ceokokngoding@gmail.com', NULL, '$2y$10$lWMG5iNtZxWYEHuePYtuX.xk1jf6QXCJvqoweqvGg6descEq3oCUe', 0, 0, 0, 0, NULL, '9UTDZqUcTrOvh3fFAKLf5SaRiErPeKVMC2IklH7lIe0SUyWALzjTbvEJtC6pih3l', 0, NULL, NULL, NULL, '2024-09-06 13:00:49', '2024-09-06 13:00:52', NULL, 5, NULL, NULL, NULL),
(14, 'Rudi', 'rudi@salman.com', NULL, '$2y$10$mwxMnafSK1xR5ON3VI8ONOZypowYn7boMB3absVWvFhRxChsZECKC', 0, 0, 1, 1, '2024-09-26 13:20:35', NULL, 0, NULL, NULL, NULL, '2024-09-26 06:20:35', '2024-09-26 06:20:35', NULL, 1, NULL, NULL, NULL);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;