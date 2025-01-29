<?php 
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['user']=$this->user_model->get_all_data();
		$this->load->view('templates/header',$data);
		$this->load->view('user/user');
		$this->load->view('user/user_js');
		$this->load->view('templates/footer');
	}
    
    public function tampil_add()
    {
        $this->load->view('user/user_add');
		$this->load->view('user/user_js');
    }

    public function tampil_edit()
    {
      $iduser = $_POST['id'];
        
      $cek=$this->user_model->get_id($iduser);
      $data['id_user']=$cek->ID;
      $data['email']=$cek->Email;
      $data['password']=md5($cek->Password);
      $data['name']=$cek->Name;
      $data['role']=$cek->Role;
      $this->load->view('user/user_edit',$data);
    }
  
    public function tampil_delete()
    {
      $iduser = $_POST['id'];
        
      $cek = $this->user_model->get_id($iduser);
      $data['id_user'] = $cek->ID;
      $data['name'] = $cek->Name;
      
      $this->load->view('user/user_delete',$data);
    }
  
    public function save()
    {
        if ($this->input->post()) 
        {
            $cekdata = $this->user_model->simpan_data();
        
            if ($cekdata=="0") { 
                $this->session->set_flashdata('msgerror', 'erroremail');
            }else { 
                $this->session->set_flashdata('message', 'simpan');
            }
            
            redirect('user');
        }   
        
        redirect('user');
    }
  
    public function update($id)
    {
        if ($this->input->post()) 
        {
            $cekdata = $this->user_model->update_data($id);
            if ($cekdata=="0") 
            { 
                $this->session->set_flashdata('msgerror', 'erroremail');
            }else
            { 
                $this->session->set_flashdata('message', 'ubah');
            }
              
            redirect('user');
        }   
        redirect('user');
    }
  
    public function delete($id)
    {
        $this->user_model->delete_data($id);
        $this->session->set_flashdata('message', 'hapus');
                    
        redirect('user');
    }
}