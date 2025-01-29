<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Patient extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('patient_model');
	}

	public function index()
	{
		$data['patient']=$this->patient_model->get_all_data();
		$this->load->view('templates/header',$data);
		$this->load->view('patient/patient');
		$this->load->view('patient/patient_js');
		$this->load->view('templates/footer');
	}
    
    public function tampil_add()
    {
		$data['recordnumber'] = $this->patient_model->get_next_id();
        $this->load->view('patient/patient_add',$data);
		$this->load->view('patient/patient_js');
    }

    public function tampil_edit()
    {
      $idpatient = $_POST['id'];
        
      $cek=$this->patient_model->get_id($idpatient);
      $data['id_patient']=$cek->ID;
      $data['recordnumber']=$cek->RecordNumber;
      $data['name']=$cek->Name;
      $data['birth']=$cek->Birth;
      $data['nik']=$cek->NIK;
      $data['phone']=$cek->Phone;
      $data['address']=$cek->Address;
      $data['bloodtype']=$cek->BloodType;
      $data['weight']=$cek->Weight;
      $data['height']=$cek->Height;
      $this->load->view('patient/patient_edit',$data);
    }
  
    public function tampil_delete()
    {
      $idpatient = $_POST['id'];
        
      $cek = $this->patient_model->get_id($idpatient);
      $data['id_patient'] = $cek->ID;
      $data['name'] = $cek->Name;
      
      $this->load->view('patient/patient_delete',$data);
    }
  
    public function save()
    {
        if ($this->input->post()) 
        {
            $cekdata = $this->patient_model->simpan_data();
        
            if ($cekdata=="0") { 
                $this->session->set_flashdata('msgerror', 'errornik');
            }else { 
                $this->session->set_flashdata('message', 'simpan');
            }
            
            redirect('patient');
        }   
        
        redirect('patient');
    }
  
    public function update($id)
    {
        if ($this->input->post()) 
        {
            $cekdata = $this->patient_model->update_data($id);
            if ($cekdata=="0") 
            { 
                $this->session->set_flashdata('msgerror', 'errornik');
            }else
            { 
                $this->session->set_flashdata('message', 'ubah');
            }
              
            redirect('patient');
        }   
        redirect('patient');
    }
  
    public function delete($id)
    {
        $this->patient_model->delete_data($id);
        $this->session->set_flashdata('message', 'hapus');
                    
        redirect('patient');
    }
}