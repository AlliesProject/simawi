<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('patient_model');
		$this->load->model('patient_history_model');
	}

	public function index()
	{
		$data['total_patient']=$this->patient_model->get_total_data();
		$data['total_patient_today']=$this->patient_history_model->get_total_data();
		$this->load->view('templates/header',$data);
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}