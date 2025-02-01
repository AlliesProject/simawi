<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Migration_add_history extends CI_Migration {
    public function up() {
        // Definisikan struktur tabel
        $fields = [
            'ID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'RecordNumber' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'DateVisit' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'RegisteredBy' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'ConsultationBy' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'Symptoms' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'DoctorDiagnose' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'ICD10Code' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ],
            'ICD10Name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ],
            'isDone' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ]
        ];
    
        // Tambahkan primary key
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('ID', TRUE);
    
        // Buat tabel
        $this->dbforge->create_table('patient_history');
    
        // Tambahkan foreign key constraints
        $this->db->query("ALTER TABLE `patient_history`
            ADD CONSTRAINT `fk_patient_history_recordnumber`
            FOREIGN KEY (`RecordNumber`) REFERENCES `patient`(`RecordNumber`)
            ON DELETE CASCADE ON UPDATE CASCADE;");
    
        $this->db->query("ALTER TABLE `patient_history`
            ADD CONSTRAINT `fk_patient_history_registeredby`
            FOREIGN KEY (`RegisteredBy`) REFERENCES `user`(`ID`)
            ON DELETE CASCADE ON UPDATE CASCADE;");
    
        $this->db->query("ALTER TABLE `patient_history`
            ADD CONSTRAINT `fk_patient_history_consultationby`
            FOREIGN KEY (`ConsultationBy`) REFERENCES `user`(`ID`)
            ON DELETE CASCADE ON UPDATE CASCADE;");
    }
    
    public function down() {
        // Hapus tabel
        $this->dbforge->drop_table('patient_history');
    }
}
