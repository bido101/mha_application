<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Model {
	private $tableDepartment = "departments";

	public function __insertDepartment($toBeInsertedData=array()){
		$res = $this->db->insert($this->tableDepartment, $toBeInsertedData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __getAllDepartments(){
		$this->db->select('*');
		$this->db->from($this->tableDepartment);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __updateDepartment($eID, $toBeInsertedData=array()){
		$this->db->where('dID', $eID);
		$res = $this->db->update($this->tableDepartment, $toBeInsertedData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __removedDepartment($rID){
		$this->db->where('dID', $rID);
		$res = $this->db->delete($this->tableDepartment);
		if ($res) {
			return 'success';
		}else{
			return 'error';
		}
	}
}