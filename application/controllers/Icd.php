<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Icd_model');  // Model untuk interaksi dengan API atau database
    }

    // Method untuk menangani AJAX request dan mengembalikan nama ICD-10
    public function get_icd_name() {
        $codeicd = $this->input->get('codeicd');  // Mendapatkan kode ICD-10 dari request

        if ($codeicd) {
            // Ambil nama ICD-10 dari API atau database
            $result = $this->Icd_model->get_icd_name_by_code($codeicd);

            // Jika nama ditemukan, kirimkan dalam bentuk JSON
            if ($result) {
                echo json_encode(['title' => $result]);
            } else {
                echo json_encode(['error' => 'Nama ICD-10 tidak ditemukan']);
            }
        } else {
            echo json_encode(['error' => 'Kode ICD-10 tidak valid']);
        }
    }
}
?>
