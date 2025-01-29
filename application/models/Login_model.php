<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Login_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function login($email, $password)
	{
		$chek =  $this->db->get_where('user',array('email'=>$email,'password'=> md5($password)));
		if ($chek->num_rows()>0) {
			return $chek->row();
		}else{
			return "0";
		}
	}

}
