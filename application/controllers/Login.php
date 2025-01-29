<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

    public function authenticate()
	{
		if (isset($_POST['submit'])) 
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
				
				$cekdata = $this->login_model->login($email,$password);
				if ($cekdata=="0") 
				{
					?>
					<script language="JavaScript">
						alert('Email atau Password tidak sesuai !');
						document.location='<?php echo base_url('login');?>';
					</script><?php
				}else
				{
					$session_data = array('iduser' => $cekdata->ID, 'name' => $cekdata->Name, 'email' => $email, 'password' => $password, 'role' => $cekdata->Role);
					$this->session->set_userdata($session_data);

					redirect('home');
					
				}
		}
	}
    
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
}