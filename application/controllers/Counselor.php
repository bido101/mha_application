<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counselor extends CI_Controller {

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
		if (!$this->session->userdata('userID') or  $this->session->userdata('role') == 'student' or  $this->session->userdata('role') == 'admin')  
		{redirect('welcome');}
	}
	public function index()
	{
		$data = [
			'isActiveSideBar' => 'isForDashboard',
			'title' => 'Mental Health Assessment - Counsel Dashboard',
			'pagination' => 'Counsel Dashboard',
			'assessment' => $this->questions->__getAllRequestQuestions(),
			'questions' => $this->questions->__getAllQuestions(),
			'category' => $this->questions->__getCategories(),
		];

		$this->load->view('counselor/components/cheader.php', $data);
		$this->load->view('counselor/counselor_dashboard.php', $data);
		$this->load->view('counselor/components/cfooter.php', $data);
	}
	public function list_of_student_assessment(){
		$data = [
			'isActiveSideBar' => 'isForAssessment',
			'title' => 'Mental Health Assessment - Counsel Dashboard',
			'pagination' => 'Counsel Dashboard',
			'assessment' => $this->questions->__getAllRequestQuestions(),
			'questions' => $this->questions->__getAllQuestions(),
			'category' => $this->questions->__getCategories(),
		];

		$this->load->view('counselor/components/cheader.php', $data);
		$this->load->view('counselor/assessment/listOfAssessment.php', $data);
		$this->load->view('counselor/components/cfooter.php', $data);
	}
	public function appointStudent(){
		$assessmentID = $this->input->get('assessmentID');
	
		$updateData = array(
			'counselorID' => $this->session->userdata('userID'),
			'assessment_status' => '5',
			'appointmentDate' => $this->input->post('appointmentDate'),
			'virtualLink' => $this->input->post('virtualLink')
		);

		$result = $this->questions->__updateAssessmentStatusToApproved($assessmentID, $updateData);

		if ($result == 'success') {
			$this->session->set_flashdata('successUpdateAssessment', "Approved Request");
		}elseif($result == 'error'){
			$this->session->set_flashdata('errorUpdatingAssessment', "Error");
		}

		redirect('counselor');
	}
	public function insertRemarks(){
		$id = $this->input->get('id');
	
		$updateData = array(
			'assessment_status' => '2',
			'assess_remarks' => $this->input->post('assess_remarks')
		);

		$result = $this->questions->__insertRemarksForTheAssessment($id, $updateData);

		if ($result == 'success') {
			$this->session->set_flashdata('successInsertRemarks', "Successfully Submmited the Remarks");
		}elseif($result == 'error'){
			$this->session->set_flashdata('errorInsertingRemarks', "Error");
		}

		redirect('counselor');
	}
}