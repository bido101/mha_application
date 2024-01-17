<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
		Parent::__construct();
		if (!$this->session->userdata('userID') or  $this->session->userdata('role') == 'student')  
		{redirect('welcome');}
	}
	public function index()
	{
		$data = [
			'title' => 'Mental Health Assessment - Questionnaire Management',
			'isActiveSideBar' => 'isForQuestions',
			'pagination' => 'Questionnaire Management',
			'category' => $this->questions->__getCategories(),
			'question' => $this->questions->__getAllQuestions()
		];
		$this->load->view('admin/components/aheader.php', $data);
		$this->load->view('admin/questionnaire_management/questions.php', $data);
		$this->load->view('admin/components/afooter.php', $data);
	}
	public function addCategory(){
		if (isset($_POST['btnAddCat'])) {
			$inserData = [
				'categoryName' => $this->input->post('categoryName')
			];

			$isAdded = $this->questions->__insertCategoryForQuestions($inserData);
			if ($isAdded == 'success') {
				$this->session->set_flashdata('successInsertCategory', "Successfully");
			}elseif ($isAdded == 'error') {
				$this->session->set_flashdata('errorInsertCategory', "Error");
			}
			
			redirect('question');
		}
	}
	public function addQuestion(){
		if (isset($_POST['btnAddQuestion'])) {
			if ($this->input->post('catID') != 0) {
				$inserData = [
					'catID' => $this->input->post('catID'),
					'question' => $this->input->post('question')
				];

				$isAdded = $this->questions->__insertQuestions($inserData);
				if ($isAdded == 'success') {
					$this->session->set_flashdata('successInsertQuestion', "Successfully Inserted Question");
				}elseif ($isAdded == 'error') {
					$this->session->set_flashdata('errorInsertQuestion', "Error");
				}
			}else{
				$this->session->set_flashdata('errorForNotCategory', "Please Select Category");
			}
			
			redirect('question');
		}
	}
	public function updateQuestion(){
		if (isset($_POST['btnUpdateQuestion'])) {
			if ($this->input->post('catID') != 0) {
				$qid = $this->input->get('id');

				$updatedData = array(
					'catID' => $this->input->post('catID'),
					'question' => $this->input->post('question')
				);

				$isAdded = $this->questions->__updateQuestions($qid, $updatedData);
				if ($isAdded == 'success') {
					$this->session->set_flashdata('successUpdateQuestion', "Successfully Update Question");
				}elseif ($isAdded == 'error') {
					$this->session->set_flashdata('errorUpdateQuestion', "Error");
				}
			}
			
			redirect('question');
		}
	}
	public function removeQuestion(){
		$qid = $this->input->get('id');

		$isAdded = $this->questions->__removeQuestions($qid);
				
			if ($isAdded == 'success') {
				$this->session->set_flashdata('successRemovedQuestion', "Successfully Removed Question");
			}elseif ($isAdded == 'error') {
				$this->session->set_flashdata('errorRemovingQuestion', "Error");
			}
		redirect('question');
	}
}
