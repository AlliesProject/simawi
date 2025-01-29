<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

 	public function get_all_data(){
    	$this->db->select('*');
    	$this->db->from('user');

        return $this->db->get()->result();
    }
    
    public function get_id($id){
        return $this->db->select('*')
                        ->from('user')
                        ->where('ID',$id)
                        ->get()->row();
    }

    public function simpan_data(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
    
        $cekemail = $this->db->get_where('user',array('Email'=> $email));

        if ($cekemail->num_rows()>0) {
            return "0";
        }else{
            $user = array(
                'Email' => $email,
                'Password' => md5($password),
                'Name' =>  $name,
                'Role' => $role,
                'CreatedAt' => date('Y-m-d H:i:s'),
                'UpdatedAt' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('user',$user);
        }
    }

    public function update_data($id){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
         
        $cekemail =  $this->db->get_where('user',array('ID!='=>$id,'Email'=> $email));
  
        if ($cekemail->num_rows()>0) {
          return "0";
        }else{
            $user = array(
                'Email' => $email,
                'Password' => md5($password),
                'Name' =>  $name,
                'Role' => $role,
                'UpdatedAt' => date('Y-m-d H:i:s'),
            );
            $this->db->where('ID',$id)
                    ->update('user',$user);
        }
    }
  
    public function delete_data($id){
        $this->db->where('ID', $id)
             ->delete('user');
    }
  
}
