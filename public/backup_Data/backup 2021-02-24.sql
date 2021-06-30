CREATE TABLE `access_info` (
  `user_id` int(10) unsigned NOT NULL,
  `login_period` datetime NOT NULL,
  `logout_period` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `ad_pay` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pay_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `ad_salary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `advance_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admitted' COMMENT 'admitted or released',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `admit_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabin_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `advanced_payment` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `created` date NOT NULL,
  `payment_date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `payment_date` (`payment_date`),
  KEY `emp_id` (`emp_id`(250))
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `altra_doctor_payment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `doctor_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`),
  KEY `rf_pc_id` (`doctor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` date NOT NULL,
  `admission_time` time NOT NULL,
  `disease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clearance_date` date NOT NULL,
  `clearance_time` time NOT NULL,
  `bed_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_pa_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_age` int(7) NOT NULL,
  `op_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_unconscious` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_witness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_of_witness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_of_witness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness_date` date NOT NULL,
  `name_of_consentant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_of_consentant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_of_consentant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentant_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentant_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentant_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bank_name` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `bank_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` date NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `init_balance` decimal(10,2) NOT NULL,
  `pre_balance` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `bank_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bank_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `barcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_width` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_y` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `voucher` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` decimal(10,2) NOT NULL COMMENT 'Without  Vat amount',
  `vat` int(100) NOT NULL COMMENT 'Vat percentage',
  `vat_amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `less_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `last_paid` decimal(10,2) NOT NULL,
  `last_payment_date` date NOT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `refereed_doctor` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `voucher` (`voucher`),
  KEY `pid` (`pid`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `bonus` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `created` date NOT NULL,
  `bonus_date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` decimal(10,2) NOT NULL COMMENT 'Bonus  (%)',
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`(250)),
  KEY `bonus_date` (`bonus_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `bonus_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `brand` (
  `id` int(45) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `closing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opening` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hand_cash` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'auto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `commission_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_date` date NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ref` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'expression [ registration:10 or pathology:15 ]. registration -> ID = 10 and pathology -> ID = 15',
  `person` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'doctors:ID or marketer:ID or pc:ID',
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `consultancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID of doctors table',
  `reference_name` int(100) NOT NULL,
  `room` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'any description for patient',
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or complete',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `cost` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cost_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spend_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `cost_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `voucher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `cost_bill_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `cost_field` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `create_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `procedure_id` int(11) NOT NULL,
  `standard` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `daily_wages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `attendance` decimal(10,2) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `bonus` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `created_at` (`created_at`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `deduction_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` date NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `delivery` date NOT NULL COMMENT 'Date value',
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Test name',
  `group_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refereed_doctor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Test group',
  `room` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_doctor_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_doctor_fee` decimal(8,2) NOT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Normal, High, Low etc',
  `amount` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `bill` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `refereed_doctor` (`refereed_doctor`),
  KEY `alt_doctor_id` (`alt_doctor_id`),
  KEY `bill` (`bill`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `doctor_payment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `total_paid` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `less` decimal(8,2) NOT NULL,
  `due` decimal(8,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`),
  KEY `rf_pc_id` (`doctor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `doctors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialised` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `commission` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `due_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `previous_paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `due_payment` (
  `id` int(45) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_number` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `prev_paid` decimal(10,2) NOT NULL,
  `prev_due` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `remission` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `employee` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `emp_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime` int(11) NOT NULL,
  `entry_time` time NOT NULL,
  `exit_time` time NOT NULL,
  `present_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `path` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `group_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `group_name` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `group_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `incentive_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `income` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `income_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `income_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `income_field` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `code` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `investigation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ref` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'expression [ registration:10 or pathology:15 or pid:123456 ]. registration -> ID = 10 and pathology -> ID = 15 and pid = patient ID',
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'income or cost or liability or assets',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `marketer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_at` date NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` decimal(10,2) NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  `img_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cat` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `unit` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `messages_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_condition` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `meta_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_status` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `mixed_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refd_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `mixed_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `opening_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opening_amount` decimal(10,2) NOT NULL,
  `initial_invest` decimal(10,2) NOT NULL,
  `closing_amount` decimal(10,2) NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1st : opening balance always on top',
  `trash` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `outstock` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reagent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `overtime` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `hourly_rate` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `parameter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `trash` (`trash`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `patient_admission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `admit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `pair` decimal(10,2) DEFAULT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_report` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `patient_barcode` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_width` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_y` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `patient_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `parameter_id` (`parameter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_pid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON String. { ''relation'' : ''person name'' }',
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_report` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `pc` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `privilege_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(100) NOT NULL,
  `access` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referral_value` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'with Condition',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `purchase` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `voucher_no` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_discount` decimal(10,2) NOT NULL,
  `transport_cost` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `final_due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `reagent` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reagent` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `reagent_stock` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reagent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `recharge_sms` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID of patients. Connect to patients table. ',
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'admission or, consultancy or, emergency or, pathology',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or admitted or released or consultancy or emergency',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `rf_pc_commission_payment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `rf_pc_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0,
  UNIQUE KEY `id` (`id`),
  KEY `rf_pc_id` (`rf_pc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` date NOT NULL,
  `payment_date` date NOT NULL,
  `emp_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `adjust_amount` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `payment_date` (`payment_date`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `salary_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` date NOT NULL,
  `payment_date` date NOT NULL,
  `emp_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `payment_date` (`payment_date`),
  KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `salary_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `incentive` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `deduction` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `bonus` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `remission` decimal(10,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `sessions` (
  `session_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT 0,
  `user_data` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `sitemeta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `sms_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_characters` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_messages` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_report` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pcs',
  `purchase_price` decimal(10,2) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `test_name` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` date NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `test_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `trash` (`trash`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `test_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `procedure_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_voucher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standerd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `test_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `parameter_id` (`parameter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `test_name` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `theme_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_pattern` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_background` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_icon` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `ultra_patient` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specimen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reff_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `ultra_patient_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` date NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_report` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `opening` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritial_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facecbook` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `vat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
 
 



 



 



 



INSERT INTO `admit_type` ( `id`, `type`, `room_no`, `cabin_no`, `seat_no`, `price`, `trash`) VALUES 
('11', 'cabin', '', '208', '', '5000.00', '0'), 
('10', 'cabin', '', '207', '', '0.00', '0'), 
('9', 'cabin', '', '206', '', '0.00', '0'), 
('8', 'cabin', '', '205', '', '0.00', '0');  



 



 



 



 



 



 



INSERT INTO `barcode` ( `id`, `img_height`, `img_width`, `code_width`, `code_height`, `pos_x`, `pos_y`, `code_type`) VALUES 
('1', '68', '209', '2', '40', '104', '23', 'code128'), 
('2', '68', '209', '2', '40', '104', '23', 'code128');  



 



 



 



 



 



 



 



 



 



 



 



INSERT INTO `cost_bill_items` ( `id`, `voucher`, `item_id`, `price`, `quantity`, `total`, `trash`) VALUES 
('1', '000001', '5', '190.00', '1.00', '190.00', '0'), 
('14', '000009', '8', '6000.00', '1.00', '6000.00', '0'), 
('13', '000009', '7', '1000.00', '1.00', '1000.00', '0'), 
('12', '000009', '6', '3500.00', '1.00', '3500.00', '0'), 
('11', '000009', '2', '1350.00', '1.00', '1350.00', '0'), 
('15', '000009', '9', '4500.00', '1.00', '3500.00', '0'), 
('16', '000010', '7', '1000.00', '1.00', '1000.00', '0'), 
('17', '000010', '8', '6000.00', '1.00', '6000.00', '0'), 
('18', '000010', '9', '4500.00', '1.00', '3500.00', '0'), 
('19', '000011', '2', '1350.00', '1.00', '1350.00', '0'), 
('20', '000011', '8', '6014.00', '1.00', '6014.00', '0'), 
('28', '000012', '9', '5000.00', '1.00', '5000.00', '0'), 
('27', '000012', '8', '8500.00', '1.00', '8500.00', '0'), 
('26', '000012', '7', '1000.00', '1.00', '1000.00', '0'), 
('25', '000012', '6', '3500.00', '1.00', '3500.00', '0'), 
('29', '000014', '2', '1000.00', '1.00', '1000.00', '0'), 
('30', '000014', '6', '3500.00', '1.00', '3500.00', '0'), 
('31', '000014', '7', '1000.00', '1.00', '1000.00', '0'), 
('32', '000014', '8', '6500.00', '1.00', '6500.00', '0'), 
('33', '000014', '9', '3500.00', '1.00', '3500.00', '0'), 
('34', '000015', '6', '3500.00', '1.00', '3500.00', '0'), 
('35', '000016', '2', '1350.00', '1.00', '1350.00', '0'), 
('38', '000018', '6', '2100.00', '1.00', '2100.00', '0'), 
('39', '000018', '9', '2345.00', '1.00', '2345.00', '0'), 
('40', '000019', '10', '3000.00', '1.00', '3000.00', '0'), 
('41', '000019', '11', '1500.00', '1.00', '1500.00', '0'), 
('42', '000019', '13', '500.00', '1.00', '500.00', '0'), 
('43', '000019', '14', '500.00', '1.00', '500.00', '0'), 
('44', '000019', '6', '700.00', '1.00', '700.00', '0'), 
('61', '000021', '10', '3000.00', '1.00', '3000.00', '0'), 
('60', '000021', '6', '700.00', '1.00', '700.00', '0'), 
('59', '000021', '13', '500.00', '1.00', '500.00', '0'), 
('58', '000021', '14', '500.00', '1.00', '500.00', '0'), 
('57', '000021', '11', '1500.00', '1.00', '1500.00', '0'), 
('56', '000021', '7', '1000.00', '1.00', '1000.00', '0'), 
('73', '000023', '7', '1000.00', '1.00', '1000.00', '0'), 
('72', '000023', '6', '500.00', '1.00', '500.00', '0'), 
('71', '000023', '14', '500.00', '1.00', '500.00', '0'), 
('70', '000023', '13', '500.00', '1.00', '500.00', '0'), 
('69', '000023', '11', '1500.00', '1.00', '1500.00', '0'), 
('68', '000023', '10', '3000.00', '1.00', '3000.00', '0'), 
('74', '000025', '10', '3000.00', '1.00', '3000.00', '0'), 
('75', '000025', '6', '500.00', '1.00', '500.00', '0'), 
('76', '000025', '7', '1000.00', '1.00', '1000.00', '0'), 
('77', '000025', '14', '500.00', '1.00', '500.00', '0'), 
('78', '000025', '13', '500.00', '1.00', '500.00', '0'), 
('79', '000025', '11', '1500.00', '1.00', '1500.00', '0'), 
('80', '000026', '7', '1000.00', '1.00', '1000.00', '0'), 
('81', '000026', '6', '3000.00', '1.00', '3000.00', '0'), 
('82', '000026', '9', '3000.00', '1.00', '3000.00', '0'), 
('83', '000026', '8', '6000.00', '1.00', '6000.00', '0'), 
('84', '000027', '11', '3000.00', '1.00', '3000.00', '0'), 
('85', '000027', '7', '1000.00', '1.00', '1000.00', '0'), 
('86', '000027', '6', '500.00', '1.00', '500.00', '0'), 
('87', '000027', '14', '500.00', '1.00', '500.00', '0'), 
('88', '000027', '13', '500.00', '1.00', '500.00', '0'), 
('89', '000027', '9', '1700.00', '1.00', '1700.00', '0'), 
('90', '000028', '6', '3500.00', '1.00', '3500.00', '0'), 
('91', '000028', '7', '1000.00', '1.00', '1000.00', '0'), 
('92', '000028', '14', '500.00', '1.00', '500.00', '0'), 
('93', '000028', '12', '1500.00', '1.00', '1500.00', '0'), 
('94', '000029', '6', '4000.00', '1.00', '4000.00', '0'), 
('95', '000029', '7', '1000.00', '1.00', '1000.00', '0'), 
('96', '000029', '8', '7000.00', '1.00', '7000.00', '0'), 
('97', '000029', '9', '4500.00', '1.00', '4500.00', '0'), 
('98', '000029', '13', '500.00', '1.00', '500.00', '0'), 
('99', '000029', '14', '1000.00', '1.00', '1000.00', '0'), 
('100', '000030', '6', '3500.00', '1.00', '3500.00', '0'), 
('101', '000030', '7', '1000.00', '1.00', '1000.00', '0'), 
('102', '000030', '8', '6000.00', '1.00', '6000.00', '0'), 
('103', '000030', '9', '4500.00', '1.00', '4500.00', '0'), 
('104', '000031', '6', '4000.00', '1.00', '4000.00', '0'), 
('105', '000031', '7', '1000.00', '1.00', '1000.00', '0'), 
('106', '000031', '8', '6000.00', '1.00', '6000.00', '0'), 
('107', '000031', '9', '5000.00', '1.00', '5000.00', '0'), 
('108', '000031', '13', '500.00', '1.00', '500.00', '0'), 
('109', '000031', '14', '500.00', '1.00', '500.00', '0');  



 



 



 



 



INSERT INTO `designations` ( `id`, `created_at`, `designation_name`, `trash`) VALUES 
('1', '2020-11-19', 'Managing Director', '0'), 
('2', '2020-11-07', 'Manager', '1'), 
('3', '2020-11-08', 'Labourer', '1'), 
('4', '2020-11-16', 'operator', '1'), 
('5', '2020-11-19', 'Laboratory Technician ', '0'), 
('6', '2020-11-19', 'Nurse', '0'), 
('7', '2020-11-19', 'O.T. Specialist ', '0'), 
('8', '2020-11-19', 'Nurse Maid', '0'), 
('9', '2020-11-19', 'Night Guard ', '0');  



 



 



 



 



 



 



 



INSERT INTO `group_mapping` ( `id`, `group_id`, `test_id`) VALUES 
('1', '11', '9'), 
('2', '18', '3'), 
('5', '23', '71'), 
('6', '23', '68'), 
('7', '23', '69'), 
('8', '23', '70'), 
('20', '37', '79'), 
('21', '38', '85'), 
('22', '38', '86'), 
('23', '38', '83'), 
('24', '38', '84'), 
('32', '41', '90'), 
('38', '44', '100'), 
('39', '45', '101'), 
('55', '36', '102'), 
('56', '36', '103'), 
('57', '36', '104'), 
('58', '36', '81'), 
('59', '36', '80'), 
('60', '36', '82'), 
('61', '36', '77'), 
('62', '36', '78'), 
('63', '36', '76'), 
('69', '35', '107'), 
('70', '35', '72'), 
('71', '35', '73'), 
('72', '35', '74'), 
('73', '35', '75'), 
('81', '47', '110'), 
('82', '46', '109'), 
('83', '40', '105'), 
('84', '40', '106'), 
('85', '40', '111'), 
('86', '40', '88'), 
('87', '39', '108'), 
('88', '39', '112'), 
('89', '39', '113'), 
('90', '39', '96'), 
('91', '39', '98'), 
('92', '39', '89'), 
('93', '39', '97'), 
('94', '39', '87'), 
('95', '39', '91'), 
('96', '43', '114'), 
('97', '49', '115'), 
('98', '50', '116'), 
('99', '51', '117'), 
('100', '53', '118'), 
('101', '54', '119'), 
('102', '55', '120'), 
('103', '56', '121'), 
('104', '60', '122'), 
('106', '57', '123'), 
('107', '58', '124'), 
('108', '61', '125'), 
('109', '62', '126'), 
('111', '63', '129'), 
('112', '69', '130'), 
('114', '73', '132'), 
('115', '74', '133'), 
('116', '75', '134'), 
('117', '76', '135'), 
('118', '78', '137'), 
('119', '79', '138'), 
('120', '80', '139'), 
('121', '81', '140'), 
('122', '82', '141'), 
('123', '48', '142'), 
('124', '83', '143'), 
('125', '84', '144'), 
('126', '85', '145'), 
('133', '42', '146'), 
('134', '42', '93'), 
('135', '42', '95'), 
('136', '42', '94'), 
('137', '42', '92'), 
('139', '87', '148'), 
('141', '88', '149'), 
('142', '89', '150'), 
('143', '89', '82'), 
('144', '90', '151'), 
('145', '91', '152'), 
('146', '92', '153'), 
('147', '93', '154'), 
('148', '94', '155');  



INSERT INTO `group_name` ( `id`, `position`, `group_name`, `trash`) VALUES 
('1', '0', 'BIOCHEMICAL_EXAMI', '0'), 
('2', '1', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', '0'), 
('4', '2', 'URINE_EXAMINATION_REPORT', '0'), 
('16', '3', 'STOOL', '0'), 
('24', '7', 'STOOL__EXAMINATION_REPORT', '0'), 
('25', '8', 'ABC', '0'), 
('26', '9', 'Blood', '0'), 
('28', '4', 'BIOCAMISTRI', '0'), 
('29', '5', 'IMONOLOGY', '0'), 
('30', '6', 'OTHERS', '0');  



 



 



INSERT INTO `income_field` ( `id`, `code`, `income_field`, `trash`) VALUES 
('3', '0003', 'MEDICARE', '1'), 
('4', '0004', 'Rent', '1'), 
('5', '0005', 'Test', '1'), 
('6', '0006', 'Current Bill', '1'), 
('7', '0007', 'Prashant ', '1');  



 



 



 



INSERT INTO `marketer` ( `id`, `create_at`, `name`, `mobile`, `commission`, `address`, `trash`, `img_url`) VALUES 
('1', '2020-11-18', 'Office', '00000000000', '0.00', 'Office', '0', ''), 
('2', '2020-11-18', 'PC 1', '012541254781', '20.00', 'Aut a neque maxime e', '0', ''), 
('3', '2020-11-28', 'Sekandar', '01', '40.00', 'Haluaghat', '0', ''), 
('4', '2020-12-27', 'Sekandar Ali(SACMO)', '', '40.00', '', '0', ''), 
('5', '2020-12-27', 'Dr Anisur Rahman(SACMO)', '', '40.00', '', '0', ''), 
('6', '2020-12-27', 'Dr Anisur Rahman(SACMO)', '', '40.00', '', '0', ''), 
('7', '2020-12-27', 'Dr Anisur Rahman(SACMO)', '', '40.00', '', '0', ''), 
('8', '2020-12-27', 'Dr.Hamida Khatun (SACMO)', '', '40.00', '', '0', ''), 
('9', '2020-12-27', 'Dr.M.HKhan(SACMO)', '', '40.00', '', '0', '');  



 



 



 



 



 



 



 



 



INSERT INTO `parameter` ( `id`, `position`, `parameter_name`, `ref_value`, `result`, `unit`, `created_at`, `trash`) VALUES 
('1', '', 'Parameter 1', '100', '', 'M/L', '2020-10-19', '1'), 
('3', '', 'Parameter 2', '12', 'Test', 't-m', '2020-10-21', '1'), 
('4', '', 'Parameter 3', '12', '', 'll', '2020-10-19', '1'), 
('5', '', 'Parameter 4', '12', '', 'lo', '2020-10-19', '1'), 
('6', '', 'Consistency', 'Soft', 'Soft', '0', '2020-11-03', '1'), 
('7', '', 'Color', 'Brown', 'Brown', '0', '2020-11-03', '1'), 
('9', '', 'Blood', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('10', '', 'Reaction', 'Alkaline', 'Alkaline', '0', '2020-11-03', '1'), 
('11', '', 'Occult Blood Test', 'Not done', '', '0', '2020-10-19', '1'), 
('12', '', 'Reducing Substance', 'Nil', '', '0', '2020-10-19', '1'), 
('13', '', 'Protozoa of', 'N. F', 'N. F', '0', '2020-11-03', '1'), 
('14', '', 'Cysts of', 'N.F', 'N.F', '0', '2020-11-03', '1'), 
('15', '', 'Larva of ', 'N.F', 'N.F', '0', '2020-11-03', '1'), 
('16', '', 'Ova of', 'N.F', 'N.F', '0', '2020-11-03', '1'), 
('17', '', 'Vegetable Cells', '0 - 2 / HPF', '0 - 2 / HPF', '0', '2020-11-03', '1'), 
('18', '', 'Epithelial Cell', '1 - 2 / HPF', '1 - 2 / HPF', '0', '2020-11-03', '1'), 
('19', '', 'Pus Cells', '0  -2 / HPF', '0  -2 / HPF', '0', '2020-11-03', '1'), 
('20', '', 'R B C', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('21', '', 'Macrophage', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('22', '', 'Fat Globules', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('23', '', 'Muscle  Fibres', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('24', '', 'Starch', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('25', '', 'Charcot Leyden Crystals', 'Nil ', 'Nil ', '0', '2020-11-03', '1'), 
('26', '', 'Blastocystis', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('27', '', 'Floatation / Ova Count', 'Not Done', 'Not Done', '0', '2020-11-03', '1'), 
('28', '', 'CHEST P/A', '1', '', '0', '2020-11-01', '1'), 
('29', '', ' USG P/P', '1', '', '0', '2020-11-01', '1'), 
('30', '', ' ASO', '1', '', '0', '2020-11-01', '1'), 
('33', '', 'BIocamical Exam', '5d4f', '', 'df5', '2020-11-02', '1'), 
('36', '', 'Mucus', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('37', '', 'Occult Blood Test', 'Not done', 'Not done', '0', '2020-11-03', '1'), 
('38', '', 'Reducing Substance', 'Nil', 'Nil', '0', '2020-11-03', '1'), 
('39', '', 'Amikacin', 'S', 'S', ' ', '2020-11-03', '1'), 
('40', '', 'Ceftriaxone', 'R', 'R', ' ', '2020-11-03', '1'), 
('41', '', 'Tetracycline', 'I', 'I', ' ', '2020-11-03', '1'), 
('42', '', 'Cephalexin', 'R', 'R', ' ', '2020-11-03', '1'), 
('43', '', 'Levofloxacin', 'S', 'S', ' ', '2020-11-03', '1'), 
('44', '', 'Cecixime', 'R', 'R', ' ', '2020-11-03', '1'), 
('45', '', 'Ciprofloxacin', 'S', 'S', ' ', '2020-11-03', '1'), 
('46', '', 'Clindamycin', 'I', 'I', '  ', '2020-11-03', '1'), 
('47', '', 'Linezokid', 'I', 'I', ' ', '2020-11-03', '1'), 
('48', '', 'Penicillin-G', ' ', ' ', ' ', '2020-11-03', '1'), 
('49', '', 'Colistin', 'R', 'R', ' ', '2020-11-03', '1'), 
('50', '', 'Cefepime', 'R', 'R', ' ', '2020-11-03', '1'), 
('51', '', 'Meropenem', 'S', 'S', ' ', '2020-11-03', '1'), 
('52', '', 'Cephradine', 'R', 'R', ' ', '2020-11-03', '1'), 
('53', '', 'Azithromycin', 'I', 'I', ' ', '2020-11-03', '1'), 
('54', '', 'Amoxicillin/ Clavulanate', 'R', 'R', ' ', '2020-11-03', '1'), 
('55', '', 'Co- Trimoxazole', ' ', ' ', ' ', '2020-11-03', '1'), 
('56', '', 'Gentamycin', 'S', 'S', ' ', '2020-11-03', '1'), 
('57', '', 'Nitrofurantoin', 'S', 'S', '  ', '2020-11-03', '1'), 
('58', '', 'Ceftazidime', 'R', 'R', ' ', '2020-11-03', '1'), 
('59', '', 'Cefuroxime', 'R', 'R', ' ', '2020-11-03', '1'), 
('60', '', 'Cefurozime', 'R', 'R', ' ', '2020-11-03', '1'), 
('61', '', 'Fluconazole', ' ', ' ', ' ', '2020-11-03', '1'), 
('62', '', 'Trimethoprime/ Sulphamehoxazole', 'I', 'I', ' ', '2020-11-03', '1'), 
('63', '', 'Flucloxacillin', 'I', 'I', ' ', '2020-11-03', '1'), 
('64', '', 'RBS', '4.3 -5.7', '', 'mmol/l', '2020-11-04', '1'), 
('65', '', 'S. Bilirubin', '0.3 - 1.2', '', 'mg/dl', '2020-11-04', '1'), 
('66', '', 'Appearance', 'Clear', 'Clear', 'Clear', '2020-11-07', '1'), 
('67', '', 'P 111', '0.256', '', '%', '2020-11-17', '1'), 
('68', '', 'P 222', '0.542', '', '%', '2020-11-17', '1'), 
('69', '', 'P 333', '0.65', '', '%', '2020-11-17', '1'), 
('70', '', 'A 111', '0.256', '', '%', '2020-11-17', '1'), 
('71', '', 'Neutrophils', '(40-70%)', '', '%', '2020-11-18', '1'), 
('72', '', 'Lymphocytes', '(20-40%)', '', '%', '2020-11-18', '1'), 
('73', '', 'Monocytes', '(2-6%)', '', '%', '2020-11-18', '1'), 
('74', '', 'Eosinophils', '(1-8%)', '', '%', '2020-11-18', '1'), 
('75', '', 'Basophils', '(0-1%)', '', '%', '2020-11-18', '1'), 
('76', '', 'ESR', 'Male 0-9/Female 0-10.', '', '0', '2020-11-18', '1'), 
('77', '', 'Hemoglobin (Hb%)', 'Male/Female16/14.8gm/dl', '', 'gm/dl', '2020-11-18', '1'), 
('78', '', 'Total Count (WBC)', '4000-11000/cmm.', '', 'cmm', '2020-11-18', '1'), 
('79', '3', 'ESR', 'Male 0-9/Female 0-10', '', '00', '2020-11-25', '1'), 
('80', '3', 'Hemoglobin (Hb%)', 'Male: 16 gm/dl<br>Female: 14.8 gm/dl', '', 'gm/dl', '2021-01-15', '0'), 
('81', '4', 'Total Count (WBC)', '4000-11000/cmm.', '', '/cmm', '2021-01-17', '0'), 
('82', '6', 'Neutrophils', '(40-70%)', '', '%', '2021-01-11', '0'), 
('83', '7', 'Lymphocytes', '(20-40%)', '', '%', '2021-01-11', '0'), 
('84', '8', 'Monocytes', '(2-6%)', '', '%', '2021-01-11', '0'), 
('85', '9', 'Eosinophils', '(1-8%)', '', '%', '2021-01-11', '0'), 
('86', '10', 'Basophils', '(0-1%)', '', '%', '2021-01-11', '0'), 
('87', '75', 'S.G.P.T (AST)', 'Upto 45 U/L', '', '00', '2020-11-25', '0'), 
('88', '76', 'S. Bilirubin (Total)', '0.2-1.2mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('89', '77', 'S.Creatinine', '0.6-1.5mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('90', '78', 'Skin Scraping for Fungus', 'N/A', '', '', '2020-11-29', '0'), 
('91', '79', 'Fasting Blood sugar (FBS)', '6.66 mmol/L', '', 'mmol/L', '2021-01-11', '0'), 
('92', '80', 'Blood Sugar (2 Hours After Breakfast)', '<10.0 mmol/L', '', 'mmol/L', '2021-01-11', '0'), 
('93', '81', 'Random Blood Sugar (RBS)', 'Upto 7.8 mmol/L', '', 'mmol/L', '2021-01-11', '0'), 
('94', '82', 'S. Cholesterol', '100-220mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('95', '83', 'S. Triglycerides', 'Upto 150mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('96', '84', 'H.D.L', 'Upto 55mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('97', '85', 'L.D.L', '50-150mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('98', '86', 'VDRL', 'N/A', 'Non-Reactive', '', '2020-11-29', '0'), 
('99', '87', 'TPHA', '00', 'Negative', '', '2021-01-11', '0'), 
('100', '88', 'Pregnancy Test', '00', '', '', '2021-01-11', '0'), 
('101', '89', 'Malaria Parasite (MP)', 'N/A', '', '', '2020-11-29', '0'), 
('102', '90', 'TO', 'Upto 1:80', '', '', '2020-11-29', '0'), 
('103', '91', 'TH', 'Upto 1:80', '', '', '2020-11-29', '0'), 
('104', '92', 'AH', 'Upto 1:40', '', '', '2020-11-29', '0'), 
('105', '93', 'BH', 'Upto 1:40', '', '', '2020-11-29', '0'), 
('106', '95', 'Quantity', '', '10ml', '', '2021-01-17', '0'), 
('107', '96', 'Colour', '', 'Straw', '', '2021-01-17', '0'), 
('108', '97', 'Appearance ', '', 'Clear', '', '2021-01-17', '0'), 
('109', '98', 'Sediment ', '', 'Nil', '', '2021-01-17', '0'), 
('110', '100', 'Ph (Reaction)', '', 'Acidic', '', '2021-01-17', '0'), 
('111', '101', 'Portein (Albumin)', '00', '', '', '2021-01-11', '0'), 
('112', '102', 'Sugar (Reducing Substances)', '', 'Nil', '', '2021-01-17', '0'), 
('113', '103', 'Phosphate', '', 'Nil', '', '2021-01-17', '0'), 
('114', '105', 'Pus Cell', '', '04-05/HPF', '', '2021-01-17', '0'), 
('115', '106', 'Epithelial Cells', '', '06-08/HPF', '', '2021-01-17', '0'), 
('116', '107', 'RBC', '', 'Nil', '', '2021-01-17', '0'), 
('117', '108', 'Tricomonus Vaginalis ', '', 'Nil', '', '2021-01-17', '0'), 
('118', '109', 'Spermetazooa', '', 'Nil', '', '2021-01-17', '0'), 
('119', '115', 'Triple Phosphate', '', 'Nil', '', '2021-01-17', '0'), 
('120', '116', 'Calcium Oxalate', '', 'Nil', '', '2021-01-17', '0'), 
('121', '117', 'Amorphous Phosphates', '', 'Nil', '', '2021-01-17', '0'), 
('122', '118', 'Urates', '', 'Nil', '', '2021-01-17', '0'), 
('123', '119', 'Granullar Cast', '', 'Nil', '', '2021-01-17', '0'), 
('124', '110', 'Blood Group (ABO) System', '00', '', '', '2021-01-17', '0'), 
('125', '111', 'Rh Factor', '00', '', '', '2021-01-11', '0'), 
('126', '112', 'HBsAG (ICT Method)', '00', '', '', '2021-01-11', '0'), 
('127', '113', 'Protein (Albumin)', '', 'Nil', '', '2021-01-17', '0'), 
('128', '', 'Test', 'test-Ref', '', '', '2020-11-26', '1'), 
('129', '114', 'test', 'test', '', '', '2021-01-11', '1'), 
('130', '73', 'Xray', '0', '', '', '2021-01-17', '0'), 
('131', '74', 'P/P', '0', '', '', '2020-11-28', '0'), 
('132', '2', 'ESR', 'Male: 0-9<br>Female: 0-10', '', 'mm in 1st Hour', '2021-01-15', '0'), 
('133', '11', 'Serum Uric Acid', '1.5-7 mg/dl', '', 'mg/dl', '2021-01-11', '0'), 
('134', '12', 'Platelet Count', '(150000-350000)/cmm', '', '/cmm', '2021-01-11', '0'), 
('135', '13', 'C Reactive Protein (CRP)', 'Upto 6.0 mg/l', '', 'mg/l', '2021-01-11', '0'), 
('136', '14', 'ESR (Westerngreen Method)', 'Male: 0-10<br>Female: 0-20', '', 'mm in 1st hour', '2021-01-15', '0'), 
('137', '15', 'Total Circulating Eiosinophil Count (TCE)', '40-400/cmm', '', '/cmm', '2021-01-11', '0'), 
('138', '16', 'ECG', '00', '', '', '2021-01-11', '0'), 
('139', '17', 'W/A', '0', '', '', '2021-01-11', '0'), 
('140', '18', 'Bleeding Time (BT)', '(3-5) Min', '', 'Min', '2021-01-11', '0'), 
('141', '19', 'Clotting Time (CT)', '(5-11) Min', '', 'Min', '2021-01-11', '0'), 
('142', '20', 'Aso Titre', '200 IU/ml', '', 'IU/ml', '2020-12-09', '0'), 
('143', '21', 'RA', '0', 'Negative', '', '2020-12-09', '0'), 
('144', '22', 'XRay L/S B/V', '0', '', '', '2020-12-23', '0'), 
('145', '23', 'Xray Chest P/A', '0', '', '', '2020-12-23', '0'), 
('146', '24', 'XRay Soft Tissu', '0', '', '', '2020-12-23', '0'), 
('147', '25', 'Xray L/s Letaral View', '0', '', '', '2020-12-23', '0'), 
('148', '26', 'Xray Rt Wrist Joint', '0', '', '', '2020-12-23', '0'), 
('149', '27', 'XRay Lt Wrist Joint', '0', '', '', '2020-12-23', '0'), 
('150', '28', 'XRay Rt Knee', '0', '', '', '2020-12-23', '0'), 
('151', '29', 'Xray Lt Knee', '0', '', '', '2020-12-23', '0'), 
('152', '30', 'XRay Rt Leg', '0', '', '', '2020-12-23', '0'), 
('153', '31', 'XRay Lt Leg', '0', '', '', '2020-12-23', '0'), 
('154', '32', 'XRay Lt Leg', '0', '', '', '2020-12-23', '0'), 
('155', '33', 'XRay Rt Sholder', '0', '', '', '2020-12-23', '0'), 
('156', '34', 'XRay Lt Sholder', '0', '', '', '2020-12-23', '0'), 
('157', '35', 'XRay Lt Sholder', '0', '', '', '2020-12-23', '0'), 
('158', '36', 'XRay Skull', '0', '', '', '2020-12-23', '0'), 
('159', '37', 'Xray L/s Letaral View', '0', '', '', '2021-01-11', '0'), 
('160', '38', 'XRay Lt Wrist Joint', '0', '', '', '2021-01-11', '0'), 
('161', '39', 'XRay Lt Wrist Joint', '0', '', '', '2021-01-11', '0'), 
('162', '40', 'XRay Skull', '0', '', '', '2021-01-11', '0'), 
('163', '41', 'XRay Rt Knee', '0', '', '', '2021-01-11', '0'), 
('164', '42', 'XRay LT knee', '0', '', '', '2021-01-11', '0'), 
('165', '43', 'XRay Rt Shoulder', '0', '', '', '2021-01-11', '0'), 
('166', '44', 'XRay Lt Shoulder', '0', '', '', '2021-01-11', '0'), 
('167', '45', 'Xray Chest P/A', '0', '', '', '2021-01-11', '0'), 
('168', '46', 'XRay Rt Leg', '0', '', '', '2021-01-11', '0'), 
('169', '47', 'XRay PNS', '0', '', '', '2021-01-11', '0'), 
('170', '48', 'XRay Neack', '0', '', '', '2021-01-11', '0'), 
('171', '49', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('172', '50', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('173', '51', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('174', '52', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('175', '53', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('176', '54', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('177', '55', 'XRay Rt Albow', '0', '', '', '2021-01-11', '0'), 
('178', '56', 'XRay Rt Foot', '0', '', '', '2021-01-11', '0'), 
('179', '57', 'XRay Rt Foot', '0', '', '', '2021-01-11', '0'), 
('180', '58', 'XRay Lt Albow', '0', '', '', '2021-01-11', '0'), 
('181', '59', 'USG of Kub', '0', '', '', '2021-01-11', '0'), 
('182', '60', 'USG of L/A', '0', '', '', '2021-01-11', '0'), 
('183', '61', 'USG of Uterus Adnexae', '0', '', '', '2021-01-11', '0'), 
('184', '62', 'USG of Uterus Adnexae', '0', '', '', '2021-01-11', '0'), 
('185', '63', 'Semen Analysis', '0', '', '', '2021-01-17', '0'), 
('186', '64', 'FNAC', '0', '', '', '2021-01-01', '0'), 
('187', '65', 'PBF', '0', '', '', '2021-01-01', '0'), 
('188', '66', 'Blood', '0', '', '', '2021-01-17', '0'), 
('189', '67', 'Medicine', '0', '', '', '2021-01-17', '0'), 
('190', '68', 'XRay Pealvis', '0', '', '', '2021-01-11', '0'), 
('191', '69', 'Xray L/s Letaral View', '0', '', '', '2021-01-11', '0'), 
('192', '70', 'XRay Rt Hip Joint', '0', '0', '', '2021-01-12', '0'), 
('193', '71', 'XRay Lt Hip Joint', '0', '0', '', '2021-01-12', '0'), 
('194', '72', 'Xray L/s Letaral View', '0', '0', '', '2021-01-12', '0'), 
('195', '5', '<b>Differential Count</b>', '.', '', '', '2021-01-17', '0'), 
('196', '0', 'Test-8', '', '', '', '2021-01-17', '0'), 
('197', '94', '<b>Physical Examination</b>', '', '', '', '2021-01-17', '0'), 
('198', '99', '<b>Chemical Examination</b>', '', '', '', '2021-01-17', '0'), 
('199', '1', 'Microscopic Examination', '', '', '', '2021-01-17', '0'), 
('200', '104', '<b>Microscopic Examination</b>', '', '', '', '2021-01-17', '0'), 
('201', '114', '<b>Crystal</b>', '', '', '', '2021-01-17', '0'), 
('202', '105', 'Cells', '', '', '', '2021-01-17', '1'), 
('203', '', 'P/S', '0', '0', '', '2021-01-29', '0'), 
('204', '', 'S.TSH', '0', '0', '0', '2021-02-04', '0'), 
('205', '', 'S.TSH', '0', '0', '0', '2021-02-04', '0'), 
('206', '', 'Anti H Pylori', '0', '0', '', '2021-02-12', '0'), 
('207', '', 'BTCT', '0', '0', '', '2021-02-12', '0'), 
('208', '', 'XRay Rt Ankle B/u', '0', '0', '0', '2021-02-18', '0'), 
('209', '', 'XRay Lt Ankle B/u', '0', '0', '', '2021-02-18', '0'), 
('210', '', 'XRay Rt Hand', '0', '0', '', '2021-02-19', '0'), 
('211', '', 'XRay Lt Hand', '0', '0', '', '2021-02-19', '0');  



 



INSERT INTO `patient_barcode` ( `id`, `img_height`, `img_width`, `code_width`, `code_height`, `pos_x`, `pos_y`, `code_type`) VALUES 
('1', '68', '209', '2', '40', '104', '23', 'code128');  



 



 



 



 



 



INSERT INTO `privileges` ( `id`, `date`, `privilege_name`, `user_id`, `access`) VALUES 
('1', '2021-01-06', 'admin', '11', '{"dashboard":["doctors","todays_consultancy","todays_total_report","total_diagnosis","total_investigation","todays_due","total_cost","total_income"],"doctor-menu":["add","all","payment","payment_all","alt_doctor_payment","altra_doctor_all_payment"],"marketer-menu":["add","all","commission-list","marketer_commision_collect","all_payment"],"investigation-menu":["group","test","addMenu","all"],"consultancy-menu":["add","all","report"],"diagnosis-menu":["add","all","due_list","com"],"tests":["add","list"],"ultra_test":["add_ultra","all_ultra"],"cost_menu":["field","new","all"],"income_menu":["field","new","all"],"bank_menu":["add-bank","add-new","all-acc","add","ledger","all"],"employee_menu":[],"salary_menu":[],"report_menu":["cost","drCom","diagnosis","patientReport","assets","balance_menu"],"sms_menu":["send-sms","custom-sms","sms-report"],"privilege-menu":[],"theme_menu":["logo","tools"]}'), 
('2', '2021-01-11', 'user', '5', '{"dashboard":["doctors","todays_consultancy","todays_total_report","total_diagnosis","total_investigation","todays_due","total_cost","total_income"],"doctor-menu":["add","all","payment","payment_all","alt_doctor_payment","altra_doctor_all_payment"],"marketer-menu":["add","all","commission-list","marketer_commision_collect","all_payment"],"investigation-menu":["group","test","addMenu","all"],"consultancy-menu":["add","all","report"],"diagnosis-menu":["add","all","due_list","com"],"tests":["add","list"],"ultra_test":["add_ultra","all_ultra"],"cost_menu":["field","new","all"],"report_menu":["cost","drCom","diagnosis","patientReport","assets","balance_menu"]}');  



 



 



 



 



 



INSERT INTO `recharge_sms` ( `id`, `date`, `amount`, `sms`) VALUES 
('1', '2020-11-18', '500', '1000');  



INSERT INTO `registrations` ( `id`, `date`, `pid`, `type`, `status`) VALUES 
('15', '2021-01-03', '0254', 'consultancy', 'consultancy');  



 



INSERT INTO `rf_pc_commission_payment` ( `id`, `date`, `rf_pc_id`, `payment`, `trash`) VALUES 
('3', '2020-11-18', '2', '9.40', '0'), 
('4', '2020-11-28', '2', '50.00', '0'), 
('5', '2021-01-17', '1', '0.00', '0');  



 



 



 



 



INSERT INTO `sessions` ( `session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES 
('03459ad6bd801dc780ac7019cc646522', '36.99.136.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', '1614142779', ''), 
('03583378abd43928bdc2eaad45f44d59', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062289', ''), 
('04800ade0e6b92d9297881ad000d5333', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2710.88 Safari/537.36', '1614091087', ''), 
('05453e08dac98b006a511a8e2b0702bd', '54.202.75.138', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '1614130764', ''), 
('064ba40689eac0bc6571f26fa5bd0c6d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1396.88 Safari/537.36', '1614138555', ''), 
('064db1ed7f96a69e26f08ea7d4b78ee1', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2370.88 Safari/537.36', '1614109234', ''), 
('097b4c64c96ff945736202ad326a9831', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2433.88 Safari/537.36', '1614073748', ''), 
('0a8929c3cad5a8b4c3e5480d056d8163', '3.138.153.13', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', '1614071332', ''), 
('17e1accea436705fb88b5cccd86ac987', '161.97.175.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0', '1614140278', ''), 
('192c48d1fe6cc1d88c826cde7d609daf', '73.244.202.3', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1614078033', ''), 
('194cde2ed7a6efce758e29373b266045', '138.197.197.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '1614078290', ''), 
('1a02507b4dd95ffcb312ebd76733ca71', '34.238.162.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14', '1614140740', ''), 
('255ebb1c2387af064274bc2ec0e8ed2b', '195.201.192.96', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0', '1614074886', ''), 
('2d03ac904b52e97d2e5df11269cfb38a', '54.218.81.1', 'Go-http-client/1.1', '1614139684', ''), 
('2f215c9801f2159e88ff8bc6822800b6', '23.106.249.52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '1614141575', 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";i:1001;s:12:"login_period";s:22:"2021-02-24 10:39:44 am";s:4:"name";s:16:"Freelance IT Lab";s:5:"email";s:19:"mrskuet08@gmail.com";s:8:"username";s:14:"freelanceitlab";s:6:"mobile";s:11:"01937476716";s:9:"privilege";s:5:"super";s:5:"image";s:27:"private/images/pic-male.png";s:6:"branch";s:10:"Mymensingh";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'), 
('349bcbf853d1588b690f1c9acea1eee2', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.1953.88 Safari/537.36', '1614080060', ''), 
('3701624ae3055ada5318bfdbc6a96f72', '3.15.233.193', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', '1614144153', ''), 
('382bada70d29b719ef2d155fc118b2ad', '42.236.10.78', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', '1614116194', ''), 
('38f9c67f6b76b4b2523e5d836a24070b', '195.201.41.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.9 Safari/536.5', '1614126700', ''), 
('398d85de8ef5a2c75ef1ea9f67e1f893', '34.210.50.167', 'Go-http-client/1.1', '1614062519', ''), 
('40e33f3faad1663dc4c69a466ad7e0f7', '205.169.39.84', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '1614119090', ''), 
('45aec19e76ad1f54a7d6618ffe282e86', '34.216.185.202', '0', '1614132251', ''), 
('46cbeac8574a98973b822f15c29de88b', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2433.88 Safari/537.36', '1614073748', ''), 
('475bcdde6575ff240b74ca9c3c0b74d5', '54.148.220.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '1614139660', ''), 
('47c140722d99fa259c9702564766bc5c', '44.234.51.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '1614062443', ''), 
('47ed813d7861dec01ed5e44b15353cac', '205.169.39.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '1614119098', ''), 
('48dee506eca6c429f9feea51952eb25f', '54.209.149.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '1614112125', ''), 
('4a8cd1947bf329c3a4e3956a4018f9c9', '34.82.182.44', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36', '1614071052', ''), 
('5747049d416aaa3589b5851b2c263b79', '34.213.190.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '1614062443', ''), 
('58fce8a64eacb89568a9d288ae34b0a7', '159.69.62.182', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0', '1614072093', ''), 
('5b9805fb5feb00dec52656eada7e8eec', '167.114.232.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0', '1614124692', ''), 
('5f38888e668bd39775d0f2672a9f1ec5', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3285.88 Safari/537.36', '1614134315', ''), 
('64329bf1eb3915891ce6dc773b11a6e0', '104.238.217.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '1614083808', ''), 
('66bfc068c38571fe79451c25a9d05088', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2370.88 Safari/537.36', '1614109235', ''), 
('68173684a242121f7af3cc9692773853', '181.215.202.16', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', '1614117430', ''), 
('6c4fd2463bd7b895376cbfd4dd18f817', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062263', ''), 
('6e62cda0a06b93806abff4b71aadfe6a', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1241.88 Safari/537.36', '1614130077', ''), 
('7011229b44c2caa2f40c58d538739a5c', '104.238.217.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '1614083808', ''), 
('71e1e3f32786aab0bc8c1e4bfb780bb9', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2207.88 Safari/537.36', '1614100556', ''), 
('72bb67f611f7dccb268f8f54601a687d', '205.169.39.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '1614114374', ''), 
('75e8447646008326e3f1d1e75950c011', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3285.88 Safari/537.36', '1614134316', ''), 
('775e69819287e2db411b51e030b215c6', '156.146.34.101', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', '1614131014', ''), 
('79dadb35d08c03ece2d31b1763aa091a', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3230.88 Safari/537.36', '1614125865', ''), 
('7b585190d4849a6fa3a57d83e4a30e2a', '34.105.19.82', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36', '1614071052', ''), 
('7f1a583c8720e51dbea8788be50c4d45', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2589.88 Safari/537.36', '1614105200', ''), 
('839105fca409b863197fdb849de0ddf6', '36.99.136.143', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', '1614142440', ''), 
('853e6bfeb98fd1abc324ec87765447ae', '3.15.233.193', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', '1614144153', ''), 
('864dbfc93d53a2b9ec383e908909971b', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062289', ''), 
('8e3acc77618aa307ede81e15fba6d4a9', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1780.88 Safari/537.36', '1614086551', ''), 
('8e3b0b54b36f7c50cb85aa2fdcf922e2', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2207.88 Safari/537.36', '1614100553', ''), 
('9053d6bc71deca5215609761d90d57a7', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2907.88 Safari/537.36', '1614142750', ''), 
('946270cd1ee3ed61aec0731f4bfb987e', '54.218.81.1', 'Go-http-client/1.1', '1614139683', ''), 
('954ee007427f60a714bba161109c98fd', '167.114.232.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0', '1614124692', ''), 
('9559e6c5aaf3142552b71218865e85b7', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2881.88 Safari/537.36', '1614113428', ''), 
('9ae67573e61194aeb4d6b79a3fb1fa6c', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2710.88 Safari/537.36', '1614091082', ''), 
('9e9f4ec05c900b0a25bd7208f6fa5002', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1568.88 Safari/537.36', '1614117814', ''), 
('a15bb3a630a6dc2bf9e1665eb0247ced', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062289', ''), 
('a24629659927d980616a6d0076473d54', '34.209.237.111', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', '1614143344', ''), 
('a273785fa8d4d2944dba323d710d9270', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062287', ''), 
('a65a679a626e8e977a12914a5320a1d0', '3.15.233.193', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', '1614144153', ''), 
('a853c7e1f1dc269f35c83f3df92da6e5', '191.96.57.244', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', '1614122718', ''), 
('a9b3ceac956bc398e7052d55dfe0a9fb', '34.213.190.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '1614062443', ''), 
('be56a2f47855b339397dd89eecdef40b', '52.88.49.251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1614140132', ''), 
('c30989c7f8a58f3c395ab458ade6dbae', '54.244.111.205', 'Go-http-client/1.1', '1614062484', ''), 
('c54fc70d1ff88167dfc1f3b75102877c', '161.97.175.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0', '1614140281', ''), 
('c556160680702cc32c773e50c21f781a', '54.148.220.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '1614139659', ''), 
('c59638c5cbabb2f7a19cabc18b1ad5ab', '167.114.185.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge', '1614062268', ''), 
('c739fd94aa97a33a3476382810cfab4b', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '1613982396', ''), 
('c78653f0003d4a778b371f7c39b79586', '156.146.34.101', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', '1614131015', ''), 
('c7ccb7b97a00a65d10757a49dfa4b5c6', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3230.88 Safari/537.36', '1614125865', ''), 
('cd41f79452f9a363f56f63c0781af446', '202.134.14.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', '1614143421', ''), 
('ce450a2623ba7918ffaab4eaeb0f05de', '42.236.10.93', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', '1614116075', ''), 
('cf6e36c34f6f1e788af0b8b0601aa2a9', '54.244.111.205', 'Go-http-client/1.1', '1614062484', ''), 
('d000da0542ddafbeb12467dc66f88a9d', '109.70.100.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3563.0 Safari/537.36', '1614122649', ''), 
('d21f22a8b589d784b0948d82eb38a60a', '34.220.242.115', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', '1614140137', ''), 
('d45b79cbac053e062c9a7243f3ea7a29', '124.71.180.89', 'Mozilla/5.0 (Windows NT 6.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3223.88 Safari/537.36', '1614121848', ''), 
('d501c7807a4315fc071340419be4ccfe', '34.83.11.124', 'Mozilla/5.0 (Windows NT 6.4; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36', '1614071051', ''), 
('d6570c3e9c8703aafc6d83a250039da0', '36.99.136.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', '1614142439', ''), 
('dc1136ac00cf268fd52a80c5bf858e85', '205.169.39.226', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '1614114370', ''), 
('e18246f5b207dabcee10343b07018544', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3434.88 Safari/537.36', '1614147072', ''), 
('e5b3f30bf5d5e43bc73cbb4341e3b864', '69.25.58.60', 'Mozilla/5.0 (Windows N\T 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.79 Safari/537.16', '1614138157', ''), 
('e742113d44a201d011de0046cbfce2c9', '54.209.149.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '1614112127', ''), 
('e782a14b6018786af7ba3dc0af08243d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2907.88 Safari/537.36', '1614142751', ''), 
('ec179279795f72c55d3f3a9c58542688', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062290', ''), 
('ec7bdd1b5510d5ef4768179647c7fd19', '65.154.226.165', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.71 Safari/537.36', '1614121675', ''), 
('ee7f904c31433ef9d9f69fe80215f3b7', '44.234.51.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '1614062443', ''), 
('ef9b75c4a0c384ba1e9ac3259eecf3a6', '158.69.64.72', 'python-requests/2.18.4', '1614062626', ''), 
('f5648e0db42ff59762a3eb7087eb3413', '34.83.44.235', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.67 Safari/537.36', '1614071051', ''), 
('f6f2409ed93b90d91ffa6918630244b3', '161.97.175.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/72.0', '1614140287', ''), 
('faafc2a643f8b653988fa12b6450e75d', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', '1614062264', ''), 
('fd392a5d8cb46fa5b778308bce0b09a3', '34.210.50.167', 'Go-http-client/1.1', '1614062519', ''), 
('fdd1bd5433730b35d60bf6c594391567', '34.238.162.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14', '1614140740', ''), 
('fdd285b623bd31eec173d4b60a088707', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.1953.88 Safari/537.36', '1614080060', ''), 
('ff96945d45bcea7d6dc9740ed6c7e565', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1780.88 Safari/537.36', '1614086551', '');  



 



 



 



INSERT INTO `test` ( `id`, `position`, `test_name`, `room`, `fee`, `cost`, `created_at`, `trash`) VALUES 
('1', '1', 'PHYSICAL CHARACTER', '0', '0.00', '0.00', '2020-10-19', '1'), 
('2', '0', 'MICROSCOPIC EXAMINATION', '0', '0.00', '0.00', '2020-10-19', '1'), 
('3', '0', 'CHEMICAL EXAMINATION', '105', '300.00', '0.00', '2020-11-18', '1'), 
('4', '0', 'SIRINCE 5ml', '0', '0.00', '0.00', '2020-11-01', '1'), 
('5', '0', 'EDT TIUB', '0', '0.00', '0.00', '2020-11-01', '1'), 
('6', '0', 'TSH', '0', '0.00', '0.00', '2020-11-01', '1'), 
('7', '0', 'T3', '1', '0.00', '0.00', '2020-11-01', '1'), 
('8', '0', 'FBS', '0', '0.00', '0.00', '2020-11-01', '1'), 
('9', '0', '2hrs ABF', '0', '0.00', '0.00', '2020-11-01', '1'), 
('10', '0', 'WIDEL', '0', '0.00', '0.00', '2020-11-01', '1'), 
('11', '0', 'ASO', '0', '0.00', '0.00', '2020-11-01', '1'), 
('12', '0', 'CHEST P/A', '12', '0.00', '0.00', '2020-11-01', '1'), 
('13', '0', 'USG P/P', '13', '0.00', '0.00', '2020-11-01', '1'), 
('14', '0', 'KBS', '0', '0.00', '0.00', '2020-11-02', '1'), 
('15', '0', 'Biochemical analysis report', '201', '0.00', '0.00', '2020-11-04', '1'), 
('16', '0', 'S. Bilirubin', '201', '0.00', '0.00', '2020-11-10', '1'), 
('17', '0', 'CBS/CP', '201', '350.00', '0.00', '2020-11-18', '1'), 
('18', '0', 'Platelate Count', '201', '300.00', '0.00', '2020-11-18', '1'), 
('19', '0', 'T.C.E', '201', '300.00', '0.00', '2020-11-18', '1'), 
('20', '0', 'M.P Test', '201', '80.00', '0.00', '2020-11-18', '1'), 
('21', '0', 'B.T.CT', '201', '300.00', '0.00', '2020-11-18', '1'), 
('22', '0', 'Blood Suger F/R/2hr', '201', '100.00', '0.00', '2020-11-18', '1'), 
('23', '0', 'TC', '201', '150.00', '0.00', '2020-11-18', '1'), 
('24', '0', 'DC', '201', '150.00', '0.00', '2020-11-18', '1'), 
('25', '0', 'Blood Urea', '201', '500.00', '0.00', '2020-11-18', '1'), 
('26', '0', 'S. Creatinic', '201', '500.00', '0.00', '2020-11-18', '1'), 
('27', '0', 'S. Cholesterol', '201', '500.00', '0.00', '2020-11-18', '1'), 
('28', '0', 'S.G.O.T', '201', '500.00', '0.00', '2020-11-18', '1'), 
('29', '0', 'S.G.P.T.', '201', '500.00', '0.00', '2020-11-18', '1'), 
('30', '0', 'A.S.O. Titre', '201', '400.00', '0.00', '2020-11-18', '1'), 
('31', '0', 'R.A Test', '201', '400.00', '0.00', '2020-11-18', '1'), 
('32', '0', 'Widal Test', '201', '300.00', '0.00', '2020-11-18', '1'), 
('33', '0', 'T.P.H.A', '201', '450.00', '0.00', '2020-11-18', '1'), 
('34', '0', 'HBsAg (Screening)', '201', '450.00', '0.00', '2020-11-18', '1'), 
('35', '0', 'HIV', '201', '500.00', '0.00', '2020-11-18', '1'), 
('36', '0', 'Blood Group', '201', '100.00', '0.00', '2020-11-18', '1'), 
('37', '0', 'V.D.R.L', '201', '350.00', '0.00', '2020-11-18', '1'), 
('38', '0', 'ICT For Malaria', '201', '350.00', '0.00', '2020-11-18', '1'), 
('39', '0', 'ICT For Kala-Azar', '201', '500.00', '0.00', '2020-11-18', '1'), 
('40', '0', 'ICT For T.B', '201', '500.00', '0.00', '2020-11-18', '1'), 
('41', '0', 'Lipid Prodile', '201', '1000.00', '0.00', '2020-11-18', '1'), 
('42', '0', 'ESR', '201', '150.00', '0.00', '2020-11-18', '1'), 
('43', '0', 'HB%', '201', '150.00', '0.00', '2020-11-18', '1'), 
('44', '0', 'CRP (Latest)', '201', '400.00', '0.00', '2020-11-18', '1'), 
('45', '0', 'Syphilis AB (ICT)', '201', '500.00', '0.00', '2020-11-18', '1'), 
('46', '0', 'OGTT (3 Sample)', '201', '300.00', '0.00', '2020-11-18', '1'), 
('47', '0', 'Sputum AFB', '201', '400.00', '0.00', '2020-11-18', '1'), 
('48', '0', 'S. Uric Acid', '201', '450.00', '0.00', '2020-11-18', '1'), 
('49', '0', 'S. Calcium', '201', '500.00', '0.00', '2020-11-18', '1'), 
('50', '0', 'Urine For R/E', '201', '150.00', '0.00', '2020-11-18', '1'), 
('51', '0', 'Urine For PT', '201', '100.00', '0.00', '2020-11-18', '1'), 
('52', '0', 'Stool For R/E', '201', '220.00', '0.00', '2020-11-18', '1'), 
('53', '0', 'Semen Anaiysis', '201', '500.00', '0.00', '2020-11-18', '1'), 
('54', '0', 'P/S For G/S and R/E', '201', '500.00', '0.00', '2020-11-18', '1'), 
('55', '0', 'Skin ? Mail Scraping', '201', '250.00', '0.00', '2020-11-18', '1'), 
('56', '0', 'MT', '201', '350.00', '0.00', '2020-11-18', '1'), 
('57', '0', 'Whole Abdomen', '201', '600.00', '0.00', '2020-11-18', '1'), 
('58', '0', 'Lower Abdomen', '201', '550.00', '0.00', '2020-11-18', '1'), 
('59', '0', 'Pregnancy Profile', '201', '550.00', '0.00', '2020-11-18', '1'), 
('60', '0', 'Uterus and Adnexa', '201', '550.00', '0.00', '2020-11-18', '1'), 
('61', '0', 'U.S.G Color', '201', '750.00', '0.00', '2020-11-18', '1'), 
('62', '0', 'E.C.G', '201', '300.00', '0.00', '2020-11-18', '1'), 
('63', '0', 'E.C.G/With Report', '201', '350.00', '0.00', '2020-11-18', '1'), 
('64', '0', 'X-Ray', '201', '300.00', '0.00', '2020-11-18', '1'), 
('65', '0', 'Digital X-Ray', '201', '450.00', '0.00', '2020-11-18', '1'), 
('66', '0', 'X-Ray-Report', '201', '100.00', '0.00', '2020-11-18', '1'), 
('67', '0', 'Dental X -Ray', '201', '200.00', '0.00', '2020-11-18', '1'), 
('68', '0', 'ESR', '113', '100.00', '0.00', '2020-11-18', '1'), 
('69', '0', 'Hemoglobin (Hb%)', '113', '100.00', '0.00', '2020-11-18', '1'), 
('70', '0', 'Total Count (WBC)', '113', '100.00', '0.00', '2020-11-18', '1'), 
('71', '0', 'Differential Count', '113', '100.00', '0.00', '2020-11-18', '1'), 
('72', '6', 'ESR', '00', '0.00', '0.00', '2020-11-25', '0'), 
('73', '7', 'Hemoglobin (Hb%)', '113', '100.00', '0.00', '2020-11-29', '0'), 
('74', '8', 'Total Count  (WBC)', '00', '100.00', '0.00', '2020-12-06', '0'), 
('75', '9', 'Differential Count', '00', '200.00', '0.00', '2020-11-28', '0'), 
('76', '24', 'S.G.P.T  (AST)', '113', '400.00', '0.00', '2020-11-29', '0'), 
('77', '20', 'S. Bilirubin (Total)', '113', '300.00', '0.00', '2020-11-29', '0'), 
('78', '22', 'S.  Creatinine', '113', '400.00', '0.00', '2021-01-10', '0'), 
('79', '25', 'Skin Scraping for Fungus', '111', '200.00', '0.00', '2020-11-29', '0'), 
('80', '10', 'Fasting Blood Sugar (FBS)', '00', '100.00', '0.00', '2020-12-07', '0'), 
('81', '3', 'Blood Sugar (2 Hours After Breakfast)', '113', '100.00', '0.00', '2020-12-09', '0'), 
('82', '18', 'Random Blood Sugar (RBS)', '113', '100.00', '0.00', '2021-01-17', '0'), 
('83', '21', 'S. Cholesterol', '00', '0.00', '0.00', '2020-11-25', '1'), 
('84', '23', 'S. Triglycerides', '00', '0.00', '0.00', '2020-11-25', '1'), 
('85', '11', 'H.D.L', '00', '0.00', '0.00', '2020-11-25', '1'), 
('86', '13', 'L.D.L', '00', '0.00', '0.00', '2020-11-25', '1'), 
('87', '27', 'VDRL', '113', '400.00', '0.00', '2020-11-29', '0'), 
('88', '26', 'TPHA', '113', '400.00', '0.00', '2020-11-29', '0'), 
('89', '17', 'Pregnancy Test', '111', '100.00', '0.00', '2020-12-09', '0'), 
('90', '14', 'Malaria Parasite (MP)', '113', '50.00', '0.00', '2020-11-29', '0'), 
('91', '28', 'Widal Test', '113', '300.00', '0.00', '2020-11-29', '0'), 
('92', '16', 'Physical Examination', '00', '100.00', '0.00', '2020-12-07', '0'), 
('93', '4', 'Chemical Examination', '00', '100.00', '0.00', '2020-12-07', '0'), 
('94', '15', 'Microscopic Examination', '00', '100.00', '0.00', '2020-12-07', '0'), 
('95', '5', 'Crystal', '00', '0.00', '0.00', '2020-11-25', '0'), 
('96', '2', 'Blood Group (ABO) System', '00', '100.00', '0.00', '2020-12-07', '0'), 
('97', '19', 'Rh Factor', '00', '0.00', '0.00', '2020-11-25', '0'), 
('98', '12', 'HBsAG (ICT Method)', '00', '400.00', '0.00', '2020-12-06', '0'), 
('99', '0', 'Xray', '115', '300.00', '0.00', '2021-01-17', '0'), 
('100', '1', 'P/P', '111', '600.00', '0.00', '2020-11-28', '0'), 
('101', '', 'CBC', '113', '400.00', '100.00', '2020-11-29', '0'), 
('102', '', 'Lipid Profile', '113', '1000.00', '0.00', '2020-11-29', '0'), 
('103', '', 'Serum Uric Acid', '113', '450.00', '0.00', '2020-11-29', '0'), 
('104', '', 'S. Cholesterol', '113', '500.00', '0.00', '2020-11-29', '0'), 
('105', '', 'Platelet Count', '113', '300.00', '0.00', '2020-11-29', '0'), 
('106', '', 'C Reactive Protein (CRP)', '113', '400.00', '0.00', '2020-11-29', '0'), 
('107', '', 'ESR (Westerngreen Method)', '113', '100.00', '0.00', '2020-11-29', '0'), 
('108', '', 'Total Circulating Eiosinophil Count (TCE)', '113', '200.00', '0.00', '2020-12-06', '0'), 
('109', '', 'ECG', '101', '250.00', '0.00', '2020-12-06', '0'), 
('110', '', 'W/A', '111', '600.00', '0.00', '2020-12-06', '0'), 
('111', '', 'Blood Examination', '113', '300.00', '0.00', '2020-12-09', '0'), 
('112', '', 'RA', '113', '400.00', '0.00', '2020-12-09', '0'), 
('113', '', 'ASO Titre', '113', '400.00', '0.00', '2020-12-09', '0'), 
('114', '', 'Xray L/S B/V', '115', '600.00', '0.00', '2020-12-23', '0'), 
('115', '', 'Xray Rt Wrist Joint', '115', '300.00', '0.00', '2021-01-17', '0'), 
('116', '', 'Xray Lt Wrist Joint', '115', '300.00', '0.00', '2021-01-17', '0'), 
('117', '', 'Xray Skull', '115', '300.00', '0.00', '2020-12-23', '0'), 
('118', '', 'Xray Rt Knee', '115', '300.00', '0.00', '2021-01-17', '0'), 
('119', '', 'Xray Lt Knee', '115', '300.00', '0.00', '2021-01-17', '0'), 
('120', '', 'XRay Rt Shoulder', '115', '300.00', '0.00', '2020-12-23', '0'), 
('121', '', 'XRay Lt Shoulder', '115', '300.00', '0.00', '2020-12-23', '0'), 
('122', '', 'XRay Chest P/A', '115', '300.00', '0.00', '2020-12-23', '0'), 
('123', '', 'XRay Rt Leg', '115', '300.00', '0.00', '2020-12-23', '0'), 
('124', '', 'XRay Lt Leg', '115', '300.00', '0.00', '2020-12-23', '0'), 
('125', '', 'XRay PNS', '115', '300.00', '0.00', '2020-12-24', '0'), 
('126', '', 'XRay Neack', '115', '300.00', '0.00', '2020-12-24', '0'), 
('127', '', 'XRay Neack', '115', '300.00', '0.00', '2020-12-24', '0'), 
('128', '', 'XRay Rt Albow', '115', '300.00', '0.00', '2020-12-31', '0'), 
('129', '', 'XRay Rt Albow', '115', '300.00', '0.00', '2020-12-31', '0'), 
('130', '', 'XRay Lt Albow', '115', '300.00', '0.00', '2020-12-31', '0'), 
('131', '', 'XRay Rt Foot', '115', '300.00', '0.00', '2020-12-31', '0'), 
('132', '', 'XRay Lt Foot', '115', '300.00', '0.00', '2020-12-31', '0'), 
('133', '', 'USG of Kub', '111', '600.00', '0.00', '2020-12-31', '0'), 
('134', '', 'USG of L/A', '111', '600.00', '0.00', '2020-12-31', '0'), 
('135', '', 'USG of Uterus Adnexae', '111', '600.00', '0.00', '2020-12-31', '0'), 
('136', '', 'USG of Uterus Adnexae', '111', '600.00', '0.00', '2020-12-31', '0'), 
('137', '', 'Semen Analysis', '113', '600.00', '0.00', '2021-01-01', '0'), 
('138', '', 'FNAC', '113', '1200.00', '0.00', '2021-01-01', '0'), 
('139', '', 'PBF', '113', '200.00', '0.00', '2021-01-01', '0'), 
('140', '', 'Blood', '113', '1500.00', '0.00', '2021-01-17', '0'), 
('141', '', 'Medicine', '113', '200.00', '0.00', '2021-01-17', '0'), 
('142', '', 'XRay Pealvis', '115', '300.00', '0.00', '2021-01-07', '0'), 
('143', '', 'XRay Rt Hip Joint', '115', '300.00', '0.00', '2021-01-12', '0'), 
('144', '', 'XRay Lt Hip Joint', '115', '300.00', '0.00', '2021-01-12', '0'), 
('145', '', 'XRay L/s Letaral View', '115', '300.00', '0.00', '2021-01-12', '0'), 
('146', '', 'Urine Examination Report', '113', '100.00', '0.00', '2021-01-17', '0'), 
('147', '', 'Urine Examination Report-1', '113', '100.00', '0.00', '2021-01-17', '1'), 
('148', '', 'P/S', '113', '600.00', '0.00', '2021-01-29', '0'), 
('149', '', 'S.TSH', '113', '1200.00', '0.00', '2021-02-04', '0'), 
('150', '', 'Anti H Pylori', '113', '1200.00', '0.00', '2021-02-12', '0'), 
('151', '', 'BTCT', '113', '200.00', '0.00', '2021-02-12', '0'), 
('152', '', 'XRay Rt Ankle B/u', '115', '300.00', '0.00', '2021-02-18', '0'), 
('153', '', 'XRay Lt Ankle B/u', '115', '300.00', '0.00', '2021-02-18', '0'), 
('154', '', 'XRay Rt Hand', '115', '300.00', '0.00', '2021-02-19', '0'), 
('155', '', 'XRay Lt Hand', '115', '300.00', '0.00', '2021-02-19', '0');  



INSERT INTO `test_group` ( `id`, `position`, `group_name`, `price`, `remarks`, `created_at`, `trash`) VALUES 
('6', '', 'Others', '0.00', '', '2020-10-19', '1'), 
('11', '', 'BIOCHEMICAL EXAM', '0.00', 'Remarks', '2020-10-19', '1'), 
('12', '', 'IMMUNOLOGY/SEROLOGY', '0.00', '', '2020-10-19', '1'), 
('13', '', 'ELISA METHOD', '0.00', '', '2020-10-19', '1'), 
('14', '', 'ELECTROLYTES', '0.00', '', '2020-10-19', '1'), 
('15', '', 'COLOUR DROPLER', '0.00', '', '2020-10-19', '1'), 
('16', '', 'STOOL  EXAMINATION REPORT', '0.00', '', '2020-10-19', '1'), 
('18', '', 'URINE EXAMINATION REPORT', '0.00', '', '2020-10-22', '1'), 
('19', '', 'Liquid biopsy', '0.00', '', '2020-10-29', '1'), 
('20', '', 'Sputum', '0.00', '', '2020-10-29', '1'), 
('23', '', 'CBC', '400.00', '', '2020-11-01', '1'), 
('24', '', 'IMONOLOGY', '0.00', '', '2020-11-01', '1'), 
('27', '', 'x-RAY', '0.00', '', '2020-11-01', '1'), 
('28', '', 'ULTRASOUND', '0.00', '', '2020-11-01', '1'), 
('34', '', 'ULTRASONGRAM', '0.00', '', '2020-11-18', '1'), 
('35', '39', 'Complete Blood Count', '400.00', '', '2020-11-25', '0'), 
('36', '40', 'Biochemical Examination', '0.00', '', '2020-11-25', '0'), 
('37', '41', 'Skin Examination Report', '0.00', '', '2020-11-25', '0'), 
('38', '42', 'Lipid Profile', '0.00', '', '2020-11-25', '0'), 
('39', '43', 'Serological Examination', '0.00', '', '2020-11-25', '0'), 
('40', '44', 'Blood Examinaion Report', '0.00', '', '2020-11-25', '0'), 
('41', '45', 'Microscopic Examination', '0.00', '', '2020-11-25', '0'), 
('42', '46', 'Urine Examination Report', '0.00', '', '2020-11-25', '0'), 
('43', '0', 'Xray L/s b/v', '600.00', '', '2020-11-28', '0'), 
('44', '1', 'USG', '600.00', '', '2020-11-28', '0'), 
('45', '2', 'CBC Report', '400.00', '', '2020-11-29', '0'), 
('46', '3', 'ECG', '250.00', '0', '2020-12-06', '0'), 
('47', '4', 'W/A', '600.00', '0', '2020-12-06', '0'), 
('48', '5', 'Xray L/s Lateral Veiw', '300.00', '', '2020-12-23', '0'), 
('49', '6', 'Xray Rt Wrist Joint', '300.00', '', '2020-12-23', '0'), 
('50', '7', 'Xray Lt Wrist Joint', '300.00', '', '2020-12-23', '0'), 
('51', '8', 'Xray Skull', '300.00', '', '2020-12-23', '0'), 
('52', '9', 'Xray Soft Tissu', '300.00', '', '2020-12-23', '0'), 
('53', '10', 'Xray Rt Knee', '300.00', '', '2020-12-23', '0'), 
('54', '11', 'Xray Lt Knee', '300.00', '', '2020-12-23', '0'), 
('55', '12', 'Xray Rt Sholder', '300.00', '', '2020-12-23', '0'), 
('56', '13', 'XRay Lt Sholder', '300.00', '', '2020-12-23', '0'), 
('57', '14', 'Xray Rt Leg', '300.00', '', '2020-12-23', '0'), 
('58', '15', 'Xray Lt Leg', '300.00', '', '2020-12-23', '0'), 
('59', '', 'Xray Lt Leg', '300.00', '', '2020-12-23', '1'), 
('60', '16', 'XRay Chest P/A', '300.00', '', '2020-12-23', '0'), 
('61', '17', 'XRay PNS', '300.00', '0', '2020-12-24', '0'), 
('62', '18', 'XRay Neack', '300.00', '0', '2020-12-24', '0'), 
('63', '19', 'XRay Rt Albow', '300.00', '0', '2020-12-31', '0'), 
('64', '20', 'Xray Rt elbow', '300.00', '0', '2020-12-31', '0'), 
('65', '21', 'XRay Rt Albow', '300.00', '0', '2020-12-31', '0'), 
('66', '22', 'XRay Rt Albow', '300.00', '0', '2020-12-31', '0'), 
('67', '23', 'XRay Rt Albow', '300.00', '0', '2020-12-31', '0'), 
('68', '24', 'XRay Lt Albow', '300.00', '0', '2020-12-31', '0'), 
('69', '25', 'XRay Lt Albow', '300.00', '0', '2020-12-31', '0'), 
('70', '26', 'XRay Lt Albow', '300.00', '0', '2020-12-31', '0'), 
('71', '27', 'XRay Rt Foot', '300.00', '0', '2020-12-31', '0'), 
('72', '28', 'XRay Lt Foot', '300.00', '0', '2020-12-31', '0'), 
('73', '29', 'XRay Lt Foot', '300.00', '0', '2020-12-31', '0'), 
('74', '30', 'USG Of Kub', '600.00', '0', '2020-12-31', '0'), 
('75', '31', 'USG of L/A', '600.00', '0', '2020-12-31', '0'), 
('76', '32', 'USG of Uterus Adnexae', '600.00', '0', '2020-12-31', '0'), 
('77', '33', 'USG of Uterus Adnexae', '600.00', '0', '2020-12-31', '0'), 
('78', '34', 'Semen Analysis', '600.00', '0', '2021-01-01', '0'), 
('79', '36', 'FNAC', '1200.00', '0', '2021-01-01', '0'), 
('80', '35', 'PBF', '0.00', '', '2021-01-01', '0'), 
('81', '37', 'Blood', '1500.00', '0', '2021-01-03', '0'), 
('82', '38', 'Medicine', '200.00', '0', '2021-01-03', '0'), 
('83', '', 'XRay Rt Hip Joint', '300.00', '0', '2021-01-12', '0'), 
('84', '', 'XRay Lt Hip Joint', '300.00', '0', '2021-01-12', '0'), 
('85', '', 'Xray L/s Lateral Veiw', '300.00', '0', '2021-01-12', '0'), 
('86', '', 'P/S', '600.00', '0', '2021-01-29', '0'), 
('87', '', 'P/S', '600.00', '0', '2021-01-29', '0'), 
('88', '', 'S.TSH', '1200.00', '0', '2021-02-04', '0'), 
('89', '', 'Anti H Pylori', '1200.00', '0', '2021-02-12', '0'), 
('90', '', 'BTCT', '200.00', '0', '2021-02-12', '0'), 
('91', '', 'XRay Rt Ankle B/U', '300.00', '0', '2021-02-18', '0'), 
('92', '', 'XRay Lt Ankle B/U', '300.00', '0', '2021-02-18', '0'), 
('93', '', 'XRay Rt Hand', '300.00', '0', '2021-02-19', '0'), 
('94', '', 'XRay Lt Hand', '300.00', '', '2021-02-19', '0');  



 



INSERT INTO `test_mapping` ( `id`, `test_id`, `parameter_id`) VALUES 
('1', '9', '30'), 
('2', '9', '29'), 
('3', '3', '1'), 
('4', '3', '3'), 
('5', '3', '4'), 
('6', '3', '5'), 
('7', '25', '70'), 
('8', '25', '9'), 
('9', '25', '44'), 
('10', '71', '75'), 
('11', '71', '74'), 
('12', '71', '72'), 
('13', '71', '73'), 
('14', '71', '71'), 
('15', '68', '76'), 
('16', '69', '77'), 
('17', '70', '78'), 
('19', '73', '80'), 
('20', '74', '81'), 
('21', '75', '86'), 
('22', '75', '85'), 
('23', '75', '83'), 
('24', '75', '84'), 
('25', '75', '82'), 
('26', '76', '87'), 
('27', '77', '88'), 
('28', '78', '89'), 
('29', '79', '90'), 
('30', '80', '91'), 
('31', '81', '92'), 
('32', '83', '94'), 
('33', '84', '95'), 
('34', '85', '96'), 
('35', '86', '97'), 
('36', '87', '98'), 
('37', '88', '99'), 
('38', '89', '100'), 
('39', '90', '101'), 
('40', '91', '104'), 
('41', '91', '105'), 
('42', '91', '103'), 
('43', '91', '102'), 
('44', '92', '108'), 
('45', '92', '107'), 
('46', '92', '106'), 
('47', '92', '109'), 
('48', '93', '110'), 
('49', '93', '113'), 
('50', '93', '127'), 
('51', '93', '112'), 
('52', '94', '115'), 
('53', '94', '114'), 
('54', '94', '116'), 
('55', '94', '118'), 
('56', '94', '117'), 
('57', '95', '121'), 
('58', '95', '120'), 
('59', '95', '123'), 
('60', '95', '119'), 
('61', '95', '122'), 
('62', '96', '124'), 
('63', '97', '125'), 
('64', '98', '126'), 
('65', '82', '93'), 
('66', '99', '130'), 
('67', '100', '131'), 
('76', '72', '132'), 
('77', '102', '94'), 
('78', '102', '95'), 
('79', '102', '96'), 
('80', '102', '97'), 
('81', '103', '133'), 
('82', '104', '94'), 
('83', '105', '134'), 
('84', '106', '135'), 
('85', '107', '136'), 
('86', '108', '137'), 
('87', '111', '140'), 
('88', '111', '141'), 
('89', '112', '143'), 
('90', '113', '142'), 
('91', '137', '185'), 
('92', '138', '186'), 
('93', '139', '187'), 
('94', '140', '188'), 
('95', '141', '189'), 
('104', '101', '132'), 
('105', '101', '195'), 
('106', '101', '80'), 
('107', '101', '81'), 
('108', '101', '82'), 
('109', '101', '83'), 
('110', '101', '84'), 
('111', '101', '85'), 
('112', '101', '86'), 
('147', '146', '199'), 
('148', '146', '197'), 
('149', '146', '106'), 
('150', '146', '107'), 
('151', '146', '108'), 
('152', '146', '109'), 
('153', '146', '198'), 
('154', '146', '110'), 
('155', '146', '112'), 
('156', '146', '113'), 
('157', '146', '114'), 
('158', '146', '115'), 
('159', '146', '116'), 
('160', '146', '117'), 
('161', '146', '118'), 
('162', '146', '127'), 
('163', '146', '201'), 
('164', '146', '119'), 
('165', '146', '120'), 
('166', '146', '121'), 
('167', '146', '122'), 
('168', '146', '123');  



INSERT INTO `test_name` ( `id`, `group_name`, `test_name`) VALUES 
('16', 'BIOCHEMICAL_EXAMI', 'A/G_Ration'), 
('18', 'BIOCHEMICAL_EXAMI', 'S._Phosphorus_(Inorganic)'), 
('20', 'BIOCHEMICAL_EXAMI', 'CK-(Total)'), 
('22', 'BIOCHEMICAL_EXAMI', 'S._Lipase'), 
('23', 'BIOCHEMICAL_EXAMI', 'S._Lactate_dehydrogenase_(LDH)_Total'), 
('24', 'BIOCHEMICAL_EXAMI', 'S._Acid_Phosphatase_(Total)'), 
('29', 'BIOCHEMICAL_EXAMI', 'S._Triglyceride'), 
('30', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Heamoglobin_(HB)'), 
('34', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'HBs Ag (Screening Test)'), 
('35', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'HIV_(Screening_Test)'), 
('36', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'VDRL_(Screening_Test)'), 
('37', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'TPHA'), 
('38', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Blood_Group_System'), 
('39', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Blood_AB_O'), 
('40', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Group_Rh(D)_Factor'), 
('41', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'At_(Kala-Azar)'), 
('49', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'CRP_(Serology_Test)'), 
('75', 'URINE_EXAMINATION_REPORT', 'ALBUMIN'), 
('76', 'URINE_EXAMINATION_REPORT', 'SUGAR'), 
('78', 'URINE_EXAMINATION_REPORT', 'BILE_PIGMENT'), 
('84', 'URINE_EXAMINATION_REPORT', 'CALCIUM_OXALATE'), 
('85', 'URINE_EXAMINATION_REPORT', 'URIC_ACID/URATE'), 
('88', 'URINE_EXAMINATION_REPORT', 'AMOR_PHOSPHATE'), 
('90', 'URINE_EXAMINATION_REPORT', 'HAEMOGLOBIN_(HB)'), 
('102', 'BIOCHEMICAL_EXAMI', 'SUGAR_(EACH_TEST)'), 
('103', 'BIOCHEMICAL_EXAM', 'G._T.T_(EACH_TEST)_UP_TO_3_SEMPLE'), 
('105', 'BIOCHEMICAL_EXAM', 'S.G.O.T'), 
('106', 'BIOCHEMICAL_EXAM', 'SERUM_ALK.PHOS'), 
('107', 'BIOCHEMICAL_EXAM', 'SERUM_ALBUMIN'), 
('108', 'BIOCHEMICAL_EXAM', 'SERUM_GLOBULIN'), 
('109', 'BIOCHEMICAL_EXAM', 'SERUM_A.G.RATIO'), 
('110', 'BIOCHEMICAL_EXAM', 'SERUM_AMYLASE'), 
('111', 'BIOCHEMICAL_EXAM', 'SERUM_BILIRUBIN'), 
('112', 'BIOCHEMICAL_EXAM', 'SERUM_CREATININE'), 
('113', 'BIOCHEMICAL_EXAM', 'CHOLESTEROL'), 
('114', 'BIOCHEMICAL_EXAM', 'SERUM_CALCIUM'), 
('118', 'BIOCHEMICAL_EXAM', 'LIPID_PROFILE'), 
('122', 'ABC', 'Blood_Test'), 
('123', 'Blood', 'Blood_Test'), 
('124', 'Blood', 'Rbs'), 
('125', 'BIOCAMISTRI', 'FBS'), 
('126', 'BIOCAMISTRI', '2hrs_ABF'), 
('127', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'WIDEL'), 
('128', 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'ASO'), 
('129', 'IMONOLOGY', 'TSH'), 
('130', 'IMONOLOGY', 'T3'), 
('131', 'OTHERS', 'SIRINCE_5ml'), 
('132', 'OTHERS', 'EDT_TIUB');  



INSERT INTO `theme_setting` ( `id`, `theme_color`, `background_pattern`, `login_background`, `google_map`, `footer`, `header`, `logo`, `menu_icon`, `social_icon`, `language`, `signature`) VALUES 
('1', '#00695c', 'public/img/background459623386.png', 'private/images/background24018.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3091.148925420826!2d89.51161527507686!3d22.87585642054873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9a4b7a54139f%3A0x1a72740d1989f91c!2sHorticulture+Centre%2C+Doulatpur%2C+Khulna!5e0!3m2!1sen!2s!4v1488304602841" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '{"l_footer_text":"","addr_moblile":"+8801718926673","addr_email":"contact@info.com","addr_address":"Old Dhaka Bus Stand,Muktagacha","footer_img":"public\/img\/footer_484510.jpg"}', '{"site_name":"Sherpur United (Pvt) Hospital","place_name":"Kalir Bazar, Bat Tola, Sherpur","addr_moblile":"01907088200","is_banner":"yes"}', '{"logo":"public\/img\/logo_556701.png","faveicon":"public\/img\/favicon_198347.png"}', '{"aside_menu":"fa fa-angle-right","footer_menu":"fa fa-caret-right"}', '{"s_facebook":"https:\/\/facebook.com","s_twitter":"https:\/\/twitter.com","s_gplus":"https:\/\/plus.google.com","s_pinterest":"https:\/\/www.pinterest.com\/"}', 'en', '{"name":"Sherpur United (Pvt) Hospital","designation":"Sherpur United (Pvt) Hospital"}');  



INSERT INTO `transaction` ( `id`, `transaction_date`, `bank`, `account_number`, `transaction_type`, `source`, `amount`, `transaction_by`, `remarks`) VALUES 
('2', '2020-09-01', 'Dbbl', '54654646546', 'Credit', '', '2000', 'jgklj', '');  



 



 



INSERT INTO `users` ( `id`, `opening`, `name`, `l_name`, `gender`, `birthday`, `maritial_status`, `position`, `about`, `website`, `facecbook`, `twitter`, `email`, `username`, `password`, `privilege`, `image`, `mobile`, `branch`) VALUES 
('2', '2020-11-18 01:34:56', 'Tithi Hospital', '', '', '', '', '', '', '', '', '', 'tithihospital@gmail.com', 'tithi247', 'fe92eb18358380ea9e47252ef27476f0', 'super', 'public/profiles/tithi247.jpg', '01937476716', ''), 
('3', '2020-11-18 02:59:46', 'Mustafiz Sohel', '', '', '', '', '', '', '', '', '', 'mrskuet08@gmail.com', 'mrskuet08', '28193231f2dd892e962440147434d9ad', 'user', 'public/profiles/mrskuet08.jpg', '01839973100', ''), 
('5', '2020-12-31 12:00:07', 'Tithi Hospital', '', '', '', '', '', '', '', '', '', 'parvin@gmail.com', 'parvin', '7993b02d0b7f62c97d6d497da94092cb', 'user', 'public/profiles/parvin.jpg', '01717627288', ''), 
('6', '2021-01-05 12:15:04', 'Tithi Hospital', '', '', '', '', '', '', '', '', '', 'tithi02@gmail.com', 'user2021', 'b6580502ce137c681f3d53b330cdeda5', 'user', 'public/profiles/user2021.png', '01222255555', ''), 
('11', '2021-01-06 10:19:39', 'developer24', '', '', '', '', '', '', '', '', '', 'developer24@gmail.com', 'developer24', '3d5ac6fb4269a3db634ba72d77f0b5b8', 'admin', '', '01983667651', ''), 
('12', '2021-01-11 01:46:35', 'sdfsdaf', '', '', '', '', '', '', '', '', '', 'admin12@gmail.com', 'hello123', '1ef9c9787abca348507cf81ba503ba83', 'super', '', '01937476717', '');  



INSERT INTO `vat` ( `id`, `percentage`, `vat_id`) VALUES 
('1', '0', ''); 