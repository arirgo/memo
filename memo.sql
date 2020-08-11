CREATE TABLE `approval` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`kepada` VARCHAR(30) NOT NULL,
	`type_app` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;


CREATE TABLE `dt_declined` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`no_memo` VARCHAR(10) NOT NULL,
	`detail` TEXT NOT NULL,
	`date` VARCHAR(20) NOT NULL,
	`declined_by` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `no_memo` (`no_memo`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=69
;


CREATE TABLE `dt_expired` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`no_memo` VARCHAR(10) NOT NULL,
	`date` VARCHAR(20) NOT NULL,
	`expired_by` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `no_memo` (`no_memo`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1612
;



CREATE TABLE `dt_kepada` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`no_memo` VARCHAR(25) NOT NULL,
	`kepada` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3467
;



CREATE TABLE `dt_reactive` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`no_memo` VARCHAR(10) NOT NULL,
	`date` VARCHAR(20) NOT NULL,
	`reactive_by` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=49
;



CREATE TABLE `dt_section` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`section` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
ROW_FORMAT=COMPACT
AUTO_INCREMENT=20
;


CREATE TABLE `memo` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`nama` TEXT NOT NULL,
	`kepada` VARCHAR(100) NOT NULL,
	`hal` VARCHAR(100) NOT NULL,
	`tanggal` DATE NOT NULL,
	`detail` LONGTEXT NOT NULL,
	`keterangan` TEXT NOT NULL,
	`status` VARCHAR(12) NOT NULL,
	`app0` VARCHAR(1) NOT NULL,
	`app1` VARCHAR(1) NULL DEFAULT NULL,
	`app2` VARCHAR(1) NULL DEFAULT NULL,
	`app3` VARCHAR(1) NULL DEFAULT NULL,
	`app4` VARCHAR(1) NOT NULL,
	`totapp` VARCHAR(1) NOT NULL,
	`status_app0` VARCHAR(1) NOT NULL,
	`status_app1` VARCHAR(1) NOT NULL,
	`status_app2` VARCHAR(1) NOT NULL,
	`status_app3` VARCHAR(1) NOT NULL,
	`status_app4` VARCHAR(1) NOT NULL,
	`tgl_app0` VARCHAR(16) NOT NULL,
	`tgl_app1` VARCHAR(16) NOT NULL,
	`tgl_app2` VARCHAR(16) NOT NULL,
	`tgl_app3` VARCHAR(16) NOT NULL,
	`tgl_app4` VARCHAR(16) NOT NULL,
	`app_ppic` VARCHAR(100) NOT NULL,
	`app_qc` VARCHAR(100) NULL DEFAULT NULL,
	`app_rnd` VARCHAR(100) NULL DEFAULT NULL,
	`app_produksi` VARCHAR(100) NULL DEFAULT NULL,
	`app_acc` VARCHAR(100) NOT NULL,
	`dibuat` VARCHAR(100) NOT NULL,
	`no_memo` VARCHAR(10) NOT NULL,
	`expire` VARCHAR(1) NOT NULL,
	`app_log` VARCHAR(2) NOT NULL,
	`finish` VARCHAR(1) NOT NULL,
	`useradd` VARCHAR(255) NOT NULL,
	`system_apprv` VARCHAR(2) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `no_memo` (`no_memo`),
	INDEX `totapp` (`totapp`),
	INDEX `app0` (`app0`),
	INDEX `app1` (`app1`),
	INDEX `app2` (`app2`),
	INDEX `app3` (`app3`),
	INDEX `status_app0` (`status_app0`),
	INDEX `app4` (`app4`),
	INDEX `status_app1` (`status_app1`),
	INDEX `status_app2` (`status_app2`),
	INDEX `status_app3` (`status_app3`),
	INDEX `app_produksi` (`app_produksi`),
	INDEX `app_rnd` (`app_rnd`),
	INDEX `app_qc` (`app_qc`),
	INDEX `app_ppic` (`app_ppic`),
	INDEX `app_log` (`app_log`),
	INDEX `expire` (`expire`),
	INDEX `finish` (`finish`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
ROW_FORMAT=COMPACT
AUTO_INCREMENT=2260
;


CREATE TABLE `section` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`id_section` VARCHAR(11) NOT NULL,
	`section` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=42
;



CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`uname` VARCHAR(12) NOT NULL,
	`pwd` VARCHAR(100) NOT NULL,
	`nama` VARCHAR(35) NOT NULL,
	`section` VARCHAR(20) NOT NULL,
	`email` VARCHAR(35) NOT NULL,
	`level` VARCHAR(12) NOT NULL,
	`flag` VARCHAR(1) NOT NULL,
	`chek1` VARCHAR(1) NOT NULL,
	`chek2` VARCHAR(1) NOT NULL,
	`chek3` VARCHAR(1) NOT NULL,
	`chek4` VARCHAR(1) NOT NULL,
	`chek5` VARCHAR(1) NOT NULL,
	`signature` TEXT NOT NULL,
	`forecast` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `uname` (`uname`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=115
;



INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (1, 'robby', 'e77989ed21758e78331b20e477fc5582', 'ROBBY TIRTA SAPUTRA', 'IT', 'robby.tirta@plasindo.loc', 'Super Admin', '1', '1', '1', '1', '1', '1', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (30, 'prt01', 'e10adc3949ba59abbe56e057f20f883e', 'PL 1 PRINTING', 'PL 1 PRINTING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (31, 'spv-qc06', '2467d3744600858cc9026d5ac6005305', 'KRESNA ADHI PERMANA', 'QC', 'kresna.adhi@plasindo.loc', 'QC', '', '0', '0', '1', '', '', 'assets/img/signature/23kresna.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (32, 'bm-01', 'e10adc3949ba59abbe56e057f20f883e', 'BAG MAKING', 'PL 1 BAG MAKING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (33, 'petrus', 'fb0607231e23b633076d1fe7ddfde96f', 'PETRUS THEMA', 'STAFF', 'petrus.thema@plasindo.loc', 'PRODUKSI', '', '0', '0', '1', '', '', 'assets/img/signature/4petrus.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (37, 'ppic-01', 'e10adc3949ba59abbe56e057f20f883e', 'ARIEF KURNIAWAN', 'PPIC', 'arief.kurniawan@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (38, 'ppic-02', '6bf3265cef56d8ab5f0f9053a1075a05', 'ROBERTUS BRYAN SANJAYA', 'PPIC', 'robertus.bryan@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (39, 'ppic-03', 'e10adc3949ba59abbe56e057f20f883e', 'PEMI JUNI SETIAWAN', 'PPIC', 'testing1@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (40, 'ppic-04', 'c85357d88c1ca63a030d121fd1699bd1', 'MIKALEWI VIRGAN', 'PPIC', 'mika.lewi@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (41, 'ppic-05', 'e10adc3949ba59abbe56e057f20f883e', 'DESI DWI PRAPTIWI', 'PPIC', 'desi.dwipraptiwi@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (42, 'ppic-06', 'e10adc3949ba59abbe56e057f20f883e', 'FABIANUS FITZGERALD LETHE', 'PPIC', 'fabianus@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (43, 'ppic-07', 'bb9784fcf60bfd1e2300560b4a8cca24', 'GARET PURNOMO', 'PPIC', 'garet.purnomo@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (44, 'ssh-ppic01', 'e10adc3949ba59abbe56e057f20f883e', 'ADI ERDIYANTO', 'PPIC', 'adi.erdianto@plasindo.loc', 'PPIC', '', '0', '1', '1', '0', '', 'assets/img/signature/default.png', 1);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (45, 'ssh-ppic02', 'e10adc3949ba59abbe56e057f20f883e', 'EDI PURNOMO', 'PPIC', 'edi.purnomo@plasindo.loc', 'PPIC', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (46, 'sh-rnd01', 'bb9784fcf60bfd1e2300560b4a8cca24', 'AFRIANTO WAHYU WIBOWO', 'R&D', 'afrianto@plasindo.loc', 'R&D', '', '0', '0', '1', '', '', 'assets/img/signature/3afrie.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (47, 'ssh-coat01', 'e10adc3949ba59abbe56e057f20f883e', 'DAMARINI', 'COATING', 'coating@plasindo.loc', 'R&D', '', '0', '0', '1', '', '', 'assets/img/signature/13damarini.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (48, 'jeffrey', '93300cd32ac3ed4f4892096adb2af0de', 'JEFFREY SUDIONO', 'STAFF', 'jeffrey.sudiono@plasindo.loc', 'PRODUKSI', '', '0', '0', '1', '', '', 'assets/img/signature/8jeffrey.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (50, 'sh-log01', 'e10adc3949ba59abbe56e057f20f883e', 'DWI KURNIAWAN', 'LOGISTIK', 'dwi.kurniawan@plasindo.loc', 'Admin', '', '1', '1', '1', '0', '', 'assets/img/signature/8jeffrey.png', 1);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (54, 'ppic-test', 'e10adc3949ba59abbe56e057f20f883e', 'PPIC TEST', 'PPIC', 'testing1@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (61, 'yudhi123', '54bc6c8e4f7baf89fd68a91ce7f307f8', 'YUDHI WILYANTO', 'STAFF', 'yudhi.wilyanto@plasindo.loc', 'PRODUKSI', '', '0', '0', '1', '', '', 'assets/img/signature/68yudi.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (62, 'wrh-01', 'e10adc3949ba59abbe56e057f20f883e', 'WAREHOUSE', 'WAREHOUSE', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (63, 'lmn-01', 'e10adc3949ba59abbe56e057f20f883e', 'PL 1 LAMINASI', 'PL 1 LAMINASI', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (64, 'blf01', 'e10adc3949ba59abbe56e057f20f883e', 'BLOWN FILM', 'BLOWN FILM', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (65, 'pcm01', 'e10adc3949ba59abbe56e057f20f883e', 'PCM', 'PCM', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (66, 'cpp01', 'e10adc3949ba59abbe56e057f20f883e', 'CPP', 'CPP', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (67, 'metalize01', 'e10adc3949ba59abbe56e057f20f883e', 'METALIZE', 'METALIZE', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (68, 'lmn02', 'e10adc3949ba59abbe56e057f20f883e', 'PL 2 LAMINATING', 'PL 2 LAMINASI', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (69, 'prt02', 'e10adc3949ba59abbe56e057f20f883e', 'PL 2 PRINTING', 'PL 2 PRINTING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (70, 'slt02', 'e10adc3949ba59abbe56e057f20f883e', 'PL 2 SLITTER', 'PL 2 SLITTER', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (71, 'lmn01', 'e10adc3949ba59abbe56e057f20f883e', 'PL 1 LAMINASI', 'PL 1 LAMINASI', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (72, 'ext01', 'e10adc3949ba59abbe56e057f20f883e', 'PL 1 EXTRUSION', 'PL 1 EXTRUSION', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (73, 'slt01', 'e10adc3949ba59abbe56e057f20f883e', 'PL 1 SLITTER', 'PL 1 SLITTER', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (74, 'bmg01', 'e10adc3949ba59abbe56e057f20f883e', 'PL 1 BAG MAKING', 'PL 1 BAG MAKING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (75, 'nopran', '5e4850633e3161106d90e04d9c86fd6e', 'NOPRAN', 'BLOWN FILM', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (76, 'spv-wrh01', 'e10adc3949ba59abbe56e057f20f883e', 'ASIKIN', 'WAREHOUSE', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (77, 'ssh-pcm01', '2bfb91916649f15ed918b4c7f1359a75', 'WAHYU ANDREY', 'PCM', 'wahyu.andrey@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (78, 'spv-fjtk01', 'e10adc3949ba59abbe56e057f20f883e', 'IWAN HENDRAWAN', 'CPP', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (80, 'tismails', '7ccddf1a407113a526ac55a82465fb15', 'TAUFIK ISMAIL SUPRAYOGI', 'METALIZE', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (81, 'sh-lmn02', 'e10adc3949ba59abbe56e057f20f883e', 'T. ANDI', 'PL 2 LAMINASI', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (82, 'krisna', 'e10adc3949ba59abbe56e057f20f883e', 'YULIUS KRISNA PERDANA NP.', 'PL 2 PRINTING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (83, 'dwia01', 'e10adc3949ba59abbe56e057f20f883e', 'DWI ARIYANTO', 'PL 1 PRINTING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (84, 'sh-lmn01', 'fe1ce9a5a6f82c2cb9a2e9cc845f0003', 'SYAMSUDDIN', 'PL 1 LAMINASI', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (85, 'sh-ext01', 'e10adc3949ba59abbe56e057f20f883e', 'KAMAL', 'PL 1 EXTRUSION', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (86, 'sh-slt01', 'bb9784fcf60bfd1e2300560b4a8cca24', 'YASER', 'PL 1 SLITTER', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (87, 'sh-bmg01', 'e10adc3949ba59abbe56e057f20f883e', 'AGUS SUTRISNO', 'PL 1 BAG MAKING', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (88, 'ppic-08', '1f14c2425e63df71ca14f5e2cc50233d', 'FIRMAN KARIMULLAH', 'PPIC', 'firman.karimullah@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (89, 'ppic-09', 'e10adc3949ba59abbe56e057f20f883e', 'TUTUT TRIYASTUTIK', 'PPIC', 'testing1@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (90, 'ppic-10', 'e10adc3949ba59abbe56e057f20f883e', 'DIAN KRISTANTI', 'PPIC', 'example@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (91, 'ppic-11', 'e10adc3949ba59abbe56e057f20f883e', 'TOMY FIRNANDO', 'PPIC', 'example@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (92, 'ppic-12', 'e10adc3949ba59abbe56e057f20f883e', 'WAWAN RIDWAN', 'PPIC', 'example@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (93, 'ppic-13', 'e10adc3949ba59abbe56e057f20f883e', 'MUHAMMAD AGUNG FAUZI', 'PPIC', 'example@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (94, 'ppic-14', 'bb9784fcf60bfd1e2300560b4a8cca24', 'INDRA WALOYO', 'PPIC', 'indra.waloyo@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (95, 'sopian', 'bb9784fcf60bfd1e2300560b4a8cca24', 'Sopian', 'it', '', 'Super Admin', '1', '1', '1', '1', '1', '1', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (96, 'ext-pl1', '25d55ad283aa400af464c76d713c07ad', 'EXT-PL1', 'PL 1 EXTRUSION', 'example@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (97, 'staff-test', 'e10adc3949ba59abbe56e057f20f883e', 'JEFFREY SUDIONO', 'STAFF', 'jeffrey.sudiono@plasindo.loc', 'Super Admin', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (98, 'yudhia', 'e10adc3949ba59abbe56e057f20f883e', 'YUDHI WILYANTO', 'STAFF', 'yudhi.wilyanto@plasindo.loc', 'Super Admin', '', '0', '0', '1', '', '', 'assets/img/signature/68yudi.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (99, 'sh-ext03', 'e10adc3949ba59abbe56e057f20f883e', 'KAMAL', 'PL 3 EXTRUSION', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (100, 'app_sys', '869ea7181de16e4f12cd8651755ebdb5', 'APPROVAL SYSTEM', 'IT', '', 'Super Admin', '1', '1', '1', '1', '1', '1', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (101, 'spv-qctest', 'e10adc3949ba59abbe56e057f20f883e', 'KRESNA ADHI PERMANA', 'QC', 'kresna.adhi@plasindo.loc', 'Super Admin', '', '0', '0', '1', '', '', 'assets/img/signature/23kresna.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (102, 'it02', 'bb9784fcf60bfd1e2300560b4a8cca24', 'Deni Setiyo Wibowo', 'IT', 'deni.setiyo@plasindo.loc', 'Super Admin', '', '1', '1', '1', '1', '', 'assets/img/signature/default.png', 1);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (103, 'arirgo', 'bb9784fcf60bfd1e2300560b4a8cca24', 'Deni Setiyo Wibowo', 'IT', 'deni.setiyo@plasindo.loc', 'Super Admin', '', '1', '1', '1', '1', '', 'assets/img/signature/default.png', 1);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (104, 'mkt-01', 'bb9784fcf60bfd1e2300560b4a8cca24', 'Marketing 01', 'Marketing', 'testing1@plasindo.loc', '', '', '0', '1', '0', '0', '', 'assets/img/signature/default.png', 1);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (105, 'ppic-15', 'e10adc3949ba59abbe56e057f20f883e', 'MUHAMMAD AGUNG FAUZI', 'PPIC', 'example@plasindo.loc', 'Admin', '', '0', '1', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (106, 'eko_bram', '5bba515c63bd6392410cef8828bb2c10', 'EKO BRAMANTYO', 'QC', 'eko.bramantyo@plasindo.loc', 'QC', '', '0', '0', '1', '', '', 'assets/img/signature/24bram.jpg', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (107, 'app_rnd', '869ea7181de16e4f12cd8651755ebdb5', 'AFRIANTO WAHYU WIBOWO', 'R&D', 'example@plasindo.loc', 'Super Admin', '', '0', '0', '1', '', '', 'assets/img/signature/3afrie.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (108, 'extph01', 'e10adc3949ba59abbe56e057f20f883e', 'EXTRUSION PHARMA', 'EXTRUSION PHARMA', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (109, 'alfredo', 'bb9784fcf60bfd1e2300560b4a8cca24', 'CORNELIUS BRIAN ALFREDO ', 'QC', 'cornelius.brian@plasindo.loc', 'QC', '', '0', '0', '1', '', '', 'assets/img/signature/25brian.jpg', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (110, 'prtph01', 'bb9784fcf60bfd1e2300560b4a8cca24', 'PRINTING PHARMA', 'PRINTING PHARMA', 'testing1@plasindo.loc', 'User', '', '0', '0', '1', '', '', 'assets/img/signature/default.png', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (113, 'eko_test', 'e10adc3949ba59abbe56e057f20f883e', 'EKO BRAMANTYO', 'QC', 'eko.bramantyo@plasindo.loc', 'Super Admin', '', '0', '0', '1', '', '', 'assets/img/signature/24bram.jpg', 0);
INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `signature`, `forecast`) VALUES (114, 'yoyo', 'bb9784fcf60bfd1e2300560b4a8cca24', 'YOYO WAHYU SUMANTRI', 'STAFF', 'yoyo.sumantri@plasindo.loc', 'PRODUKSI', '', '0', '0', '1', '', '', 'assets/img/signature/6yoyo.png', 0);




