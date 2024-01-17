<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Model {
	private $tableCourses = "courses";

	public function __insertCourse($insertData=array()){
		$res = $this->db->insert($this->tableCourses, $insertData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __getAllCourses(){
		$this->db->select('*');
		$this->db->from($this->tableCourses);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __updateCourse($eID, $toBeInsertedData=array()){
		$this->db->where('cID', $eID);
		$res = $this->db->update($this->tableCourses, $toBeInsertedData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __removedCourse($rID){
		$this->db->where('cID', $rID);
		$res = $this->db->delete($this->tableCourses);
		if ($res) {
			return 'success';
		}else{
			return 'error';
		}
	}
}