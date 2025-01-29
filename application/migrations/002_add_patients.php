<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Migration_add_patients extends CI_Migration {
      
    public function up() {
        $this->db->query("CREATE TABLE `patient` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `RecordNumber` int(11) DEFAULT NULL,
            `Name` varchar(255) DEFAULT NULL,
            `Birth` date DEFAULT NULL,
            `NIK` varchar(50) DEFAULT NULL,
            `Phone` varchar(20) DEFAULT NULL,
            `Address` varchar(255) DEFAULT NULL,
            `BloodType` enum('A','B','AB','O') DEFAULT NULL,
            `Weight` float DEFAULT NULL,
            `Height` float DEFAULT NULL,
            `CreatedAt` datetime DEFAULT NULL,
            `UpdatedAt` datetime DEFAULT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
    }

    public function down() {
        $this->dbforge->drop_table('patient');
    }
}
