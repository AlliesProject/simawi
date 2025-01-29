<?php
defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Migration_add_users extends CI_Migration {
    
	public function up() {
		$this->db->query ( "CREATE TABLE `user` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `Email` varchar(255) DEFAULT NULL,
            `Password` varchar(255) DEFAULT NULL,
            `Name` varchar(255) DEFAULT NULL,
            `Role` enum('Admin','Doctor') DEFAULT 'Admin',
            `CreatedAt` datetime DEFAULT NULL,
            `UpdatedAt` datetime DEFAULT NULL,
            PRIMARY KEY (`ID`),
            UNIQUE KEY `Email` (`Email`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;" );
	}

	public function down() {
		$this->dbforge->drop_table ( 'user' );
	}
}

