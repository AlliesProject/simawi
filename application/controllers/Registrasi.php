<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->model('patient_model');
		$this->load->model('patient_history_model');
	}

	public function index()
	{
		$data['registrasi']=$this->patient_history_model->get_all_data();
		$this->load->view('templates/header',$data);
		$this->load->view('registrasi/registrasi');
		$this->load->view('registrasi/registrasi_js');
		$this->load->view('templates/footer');
	}
    
    public function tampil_add()
    {
		$data['doctor'] = $this->user_model->get_all_doctor();
		$data['patient'] = $this->patient_model->get_all_data();
        $this->load->view('registrasi/registrasi_add',$data);
		$this->load->view('registrasi/registrasi_js');
    }

    public function save()
    {
        if ($this->input->post()) 
        {
            $cekdata = $this->patient_history_model->simpan_data();
        
            if ($cekdata=="0") { 
                $this->session->set_flashdata('msgerror', 'errorpatient');
            }else { 
                $this->session->set_flashdata('message', 'simpan');
            }
            
            redirect('registrasi');
        }   
        
        redirect('registrasi');
    }
}