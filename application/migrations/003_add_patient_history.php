<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Migration_add_patient_history extends CI_Migration {

    public function up() {
        // Membuat tabel 'patient_history'
        $this->db->query("CREATE TABLE `patient_history` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `RecordNumber` int(11) DEFAULT NULL,
            `DateVisit` datetime DEFAULT NULL,
            `RegisteredBy` int(11) DEFAULT NULL,
            `ConsultationBy` int(11) DEFAULT NULL,
            `Symptoms` text DEFAULT NULL,
            `DoctorDiagnose` text DEFAULT NULL,
            `IDC10Code` varchar(100) DEFAULT NULL,
            `IDC10Name` varchar(255) DEFAULT NULL,
            `isDone` TINYINT(1) DEFAULT 0,
            PRIMARY KEY (`ID`),
            FOREIGN KEY (`RecordNumber`) REFERENCES `patient`(`RecordNumber`),
            FOREIGN KEY (`RegisteredBy`) REFERENCES `user`(`ID`),
            FOREIGN KEY (`ConsultationBy`) REFERENCES `user`(`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
    }

    public function down() {
        $this->dbforge->drop_table('patient_history');
    }
}
