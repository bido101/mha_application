<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Model {

	private $table_categories = "gccategories";
	private $table_question = "gcquestions";
	private $tableAssessment = "assessment";

	public function __insertCategoryForQuestions($inserData){
		$res = $this->db->insert($this->table_categories, $inserData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __updateQuestions($qid, $updatedData = array()){
		$this->db->where('id', $qid);
		$res = $this->db->update($this->table_question, $updatedData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __getCategories(){
		$this->db->select('*');
		$this->db->from($this->table_categories);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __getCategoriesLimit1(){
		$this->db->select('*');
		$this->db->from($this->table_categories);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->row_array();
	}
	public function __insertQuestions($inserData){
		$res = $this->db->insert($this->table_question, $inserData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __insertAnswerQuestionOfStudents($inserData = array()){
		$res = $this->db->insert($this->tableAssessment, $inserData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __getAllQuestions(){
		$this->db->select('gcquestions.*, gccategories.categoryName');
		$this->db->from($this->table_question);
		$this->db->join($this->table_categories, 'gcquestions.catID = gccategories.gcID');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __getAllRequestQuestions(){
		$this->db->select('assessment.*, users.firstName, users.lastName, users.middleName');
		$this->db->from($this->tableAssessment);
		$this->db->join('users', 'assessment.studID = users.userID');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __removeQuestions($qid){
		$this->db->where('id', $qid);
		$res = $this->db->delete($this->table_question);
		if ($res) {
			return 'success';
		}else{
			return 'error';
		}
	}
	public function __getMyAnswerOnPreAssessment(){
		$this->db->select('*');
		$this->db->from($this->tableAssessment);
		$this->db->where('studID', $this->session->userdata('userID'));
		$this->db->where('assessment_status', '1');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function __updateAssessmentStatusToApproved($assessmentID, $updateData=array()){
		$this->db->where('id', $assessmentID);
		$res = $this->db->update($this->tableAssessment, $updateData);

		if ($res) {return 'success';}else{return 'error';}
	}
	public function __insertRemarksForTheAssessment($id, $updateData=array()){
		$this->db->where('id', $id);
		$res = $this->db->update($this->tableAssessment, $updateData);

		if ($res) {return 'success';}else{return 'error';}
	}
}