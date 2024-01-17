<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	private $table_users = "users";

	public function __canLogin($identification_ID, $password){
		$this->db->select('*');
		$this->db->from($this->table_users);
		$this->db->where('identification_ID', $identification_ID);
		$this->db->where('password', $password);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __insertNewUsers($data_reg = array()){
		$res = $this->db->insert($this->table_users, $data_reg);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __getAllUsers(){
		$this->db->select('*');
		$this->db->from($this->table_users);
		$this->db->where('userID !=', $this->session->userdata('userID'));
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __getReportUsers(){
		$this->db->select('courses.cID, users.courseID, courses.deptID');
		$this->db->from($this->table_users);
		$this->db->join('courses', 'users.courseID = courses.cID');
		$this->db->where('role', 'student');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __updateUsers($userID, $data_reg = array()){
		$this->db->where('userID', $userID);
		$res = $this->db->update($this->table_users, $data_reg);
		if ($res) {return 'success';}else{return 'error';}
	}
	public function __getMyProfile(){
		$this->db->select('*');
		$this->db->from($this->table_users);
		$this->db->where('userID =', $this->session->userdata('userID'));
		$query = $this->db->get();

		return $query->row_array();
	}
	public function __uploadProfilePicture($userID, $profile=array()){
		$this->db->where('userID', $userID);
		$res = $this->db->update($this->table_users, $profile);
		if ($res) {return 'success';}else{return 'error';}
	}
	public function __removedUsers($userID){
		$this->db->where('userID', $userID);
		$res = $this->db->delete($this->table_users);
		if ($res) {
			return 'success';
		}else{
			return 'error';
		}
	}
}
?>