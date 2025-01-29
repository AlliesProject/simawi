<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Patient_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

 	public function get_all_data(){
    	$this->db->select('*');
    	$this->db->from('patient');

        return $this->db->get()->result();
    }

    public function get_total_data(){
        $this->db->from('patient');
        return $this->db->count_all_results();
    }

    public function get_next_id(){
        $last = $this->db->select('RecordNumber')
                         ->from('patient')
                         ->order_by('RecordNumber', 'DESC')
                         ->limit(1)
                         ->get()
                         ->row();
    
        return $last ? $last->RecordNumber + 1 : 1;
    }
    
    public function get_id($id){
        return $this->db->select('*')
                        ->from('patient')
                        ->where('ID',$id)
                        ->get()->row();
    }

    public function simpan_data(){
        $recordnumber = $this->input->post('recordnumber');
        $name = $this->input->post('name');
        $birth = $this->input->post('birth');
        $nik = $this->input->post('nik');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $bloodtype = $this->input->post('bloodtype');
        $weight = $this->input->post('weight');
        $height = $this->input->post('height');
    
        $ceknik = $this->db->get_where('patient',array('NIK'=> $nik));

        if ($ceknik->num_rows()>0) {
            return "0";
        }else{
            $patient = array(
                'RecordNumber' => $recordnumber,
                'Name' => $name,
                'Birth' => $birth,
                'NIK' => $nik,
                'Phone' => $phone,
                'Address' =>  $address,
                'BloodType' => $bloodtype,
                'Weight' =>  $weight,
                'Height' =>  $height,
                'CreatedAt' => date('Y-m-d H:i:s'),
                'UpdatedAt' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('patient',$patient);
        }
    }

    public function update_data($id){
        $name = $this->input->post('name');
        $birth = $this->input->post('birth');
        $nik = $this->input->post('nik');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $bloodtype = $this->input->post('bloodtype');
        $weight = $this->input->post('weight');
        $height = $this->input->post('height');
         
        $ceknik =  $this->db->get_where('patient',array('ID!='=>$id,'NIK'=> $nik));
  
        if ($ceknik->num_rows()>0) {
            return "0";
        }else{
            $patient = array(
                'Name' => $name,
                'Birth' => $birth,
                'NIK' => $nik,
                'Phone' => $phone,
                'Address' =>  $address,
                'BloodType' => $bloodtype,
                'Weight' =>  $weight,
                'Height' =>  $height,
                'UpdatedAt' => date('Y-m-d H:i:s'),
            );
            $this->db->where('ID',$id)
                    ->update('patient',$patient);
        }
    }
  
    public function delete_data($id){
        $this->db->where('ID', $id)
             ->delete('patient');
    }
  
}
