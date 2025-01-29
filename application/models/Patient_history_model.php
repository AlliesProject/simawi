<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Patient_history_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

    public function get_all_data(){
        $this->db->select('patient_history.*, patient.*, patient.Name as patient_name, user.Name as user_name'); 
        $this->db->from('patient_history');
        $this->db->join('patient', 'patient_history.RecordNumber = patient.RecordNumber');
        $this->db->join('user', 'patient_history.ConsultationBy = user.ID');
        $this->db->order_by('patient_history.id', 'DESC'); 
    
        return $this->db->get()->result();
    }
    
    public function get_all_data_doctor(){
        $iduser = $this->session->userdata('iduser');

        $this->db->select('patient_history.*, patient_history.ID as ID_history, patient.*, patient.Name as patient_name, user.Name as user_name'); 
        $this->db->from('patient_history');
        $this->db->join('patient', 'patient_history.RecordNumber = patient.RecordNumber');
        $this->db->join('user', 'patient_history.ConsultationBy = user.ID');
        $this->db->where('ConsultationBy', $iduser);
        $this->db->order_by('patient_history.id', 'DESC'); 
    
        return $this->db->get()->result();
    }
    
    public function get_total_data(){
        $this->db->from('patient_history');
        $this->db->where('DateVisit', date('Y-m-d'));
        return $this->db->count_all_results();
    }

    public function get_top_10_diseases() {
        $this->db->select('ICD10Name, COUNT(*) as total');
        $this->db->from('patient_history');
        $this->db->group_by('ICD10Name');
        $this->db->where('isDone', '1');
        $this->db->order_by('total', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        
        return $query->result();
    }

    public function get_id($id){
        return $this->db->select('patient_history.*, patient_history.ID as ID_history, patient.*')
                        ->from('patient_history')
                        ->join('patient', 'patient_history.RecordNumber = patient.RecordNumber')
                        ->where('patient_history.ID',$id)
                        ->get()->row();
    }

    public function simpan_data(){
        $patient = $this->input->post('patient');
        $doctor = $this->input->post('doctor');
        $iduser = $this->session->userdata('iduser');
        $today = date('Y-m-d');

        $cekpatient = $this->db->get_where('patient_history', array(
            'RecordNumber' => $patient, 
            'DATE(DateVisit)' => $today
        ));
        
        if ($cekpatient->num_rows()>0) {
            return "0";
        }else{
            $patient = array(
                'RecordNumber' => $patient,
                'DateVisit' => $today,
                'RegisteredBy' => $iduser,
                'ConsultationBy' => $doctor,
                'isDone' => '0',
            );

            $this->db->insert('patient_history',$patient);
        }
    }

    public function update_data($id){
        $symptoms = $this->input->post('symptoms');
        $diagnose = $this->input->post('diagnose');
        $codeicd = $this->input->post('codeicd');
        $nameicd = $this->input->post('nameicd');
        
        $patient = array(
                'Symptoms' => $symptoms,
                'DoctorDiagnose' => $diagnose,
                'ICD10Code' => $codeicd,
                'ICD10Name' => $nameicd,
                'isDone' => '1',
        );
        
        $this->db->where('ID',$id)
                ->update('patient_history',$patient);
    }
    
}
