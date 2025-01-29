<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Api extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
        $this->load->model('patient_model');
        header('Content-Type: application/json');
	}

	public function patient($id = null)
	{
        if ($id === null) {
            // Jika $id tidak diberikan, tampilkan semua pasien
            $patients = $this->patient_model->get_all_data();
    
            if ($patients) {
                $response = [
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $patients
                ];
            } else {
                $response = [
                    'status' => 404,
                    'message' => 'No data found',
                    'data' => []
                ];
            }
        } else {
            // Jika $id diberikan, cari pasien berdasarkan ID
            $patient = $this->patient_model->get_id($id);
    
            if ($patient) {
                $response = [
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $patient
                ];
            } else {
                $response = [
                    'status' => 404,
                    'message' => 'Patient not found',
                    'data' => null
                ];
            }
        }
    
        echo json_encode($response, JSON_PRETTY_PRINT);
	}
}