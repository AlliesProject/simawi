<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Rekammedis extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('patient_history_model');
	}

	public function index()
	{
		$data['rekammedis']=$this->patient_history_model->get_all_data_doctor();
		$this->load->view('templates/header',$data);
		$this->load->view('rekammedis/rekammedis');
		$this->load->view('rekammedis/rekammedis_js');
		$this->load->view('templates/footer');
	}
    
    public function tampil_edit()
    {
      $idpatienthistory = $_POST['id'];
        
      $cek = $this->patient_history_model->get_id($idpatienthistory);
      $data['id_patient_history']=$cek->ID_history;
      $data['patient']=$cek->Name;
      
      $this->load->view('rekammedis/rekammedis_edit',$data);
    }

    public function tampil_detail()
    {
      $idpatienthistory = $_POST['id'];
        
      $datahistory = $this->patient_history_model->get_id($idpatienthistory);
      $data['NIK'] = $datahistory->NIK;
      $data['Name'] = $datahistory->Name;
      $data['DateVisit'] = $datahistory->DateVisit;
      $data['Symptoms'] = $datahistory->Symptoms;
      $data['DoctorDiagnose'] = $datahistory->DoctorDiagnose;
      $data['ICD10Code'] = $datahistory->ICD10Code;
      $data['ICD10Name'] = $datahistory->ICD10Name;
      
      $this->load->view('rekammedis/rekammedis_detail',$data);
    }

    public function update($id)
    {
        if ($this->input->post()) 
        {
            $this->patient_history_model->update_data($id);
            $this->session->set_flashdata('message', 'ubah');
              
            redirect('rekammedis');
        }   
        redirect('rekammedis');
    }
  
}