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
	public function settings(){
		$data = [
			'title' => 'Mental Health Assessment - Settings',
			'isActiveSideBar' => 'isForSettings',
			'pagination' => 'Settings',
			'isActiveTab' => 'forSettings',
			'myProfile' => $this->users->__getMyProfile()
		];
		// dd($data['myProfile']);
		$this->load->view('counselor/components/cheader.php', $data);
		$this->load->view('counselor/settings/settings.php', $data);
		$this->load->view('counselor/components/cfooter.php', $data);
	}
	public function updateProfile(){
		if (isset($_POST['btnUpdateProfile'])) {
			$userID = $this->input->get('userID');	
				$data_reg = array(
					'firstName' => $this->input->post('firstName'),
					'middleName' => $this->input->post('middleName'),
					'lastName' => $this->input->post('lastName'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'bDay' => $this->input->post('bDay')
				);
				
				$res = $this->users->__updateUsers($userID, $data_reg);

				if ($res == 'success') {
					$this->session->set_flashdata('messageupdateProfile', 'Successfully Inserted');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorToUpdateProfile', 'Error to Update Profile');
				}
				
				redirect('counselor/settings?str=profile');
		}
	}
	public function updatePassword(){
		if (isset($_POST['btnUpdatePassword'])) {
			$userID = $this->input->get('userID');	
				
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) {

				$data_reg = array(
					'password' => sha1($this->input->post('password'))
				);

				$res = $this->users->__updateUsers($userID, $data_reg);

				if ($res == 'success') {
					$this->session->set_flashdata('messageupdateProfile', 'Successfully Inserted');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorToUpdateProfile', 'Error to Update Profile');
				}
				
			}else{
				$this->session->set_flashdata('errorregmessage', 'Error');
			}
		}
		
		redirect('counselor/settings?str=profile');
	}
	public function updateProfilePicture(){
		
		$userID = $this->input->get('userID');

		if (isset($_POST['btnUpdatePic'])) {
			$config['upload_path']          = 'resort/dashboard_assets/img/users_picture/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('profilePicture');

			$path =  'resort/dashboard_assets/img/users_picture';
			$file_path = $path.'/'.$this->upload->data('file_name');
		
			$profile = array(
				'profilePicture' => $file_path
			);

			$isInserted = $this->users->__uploadProfilePicture($userID, $profile);

			if ($isInserted == 'success') {
				$this->session->set_flashdata('messageupdateProfile', 'Successfully Inserted');
			}elseif($res == 'error'){
				$this->session->set_flashdata('errorToUpdateProfile', 'Error to Update Profile');
			}
		}else{
			$this->session->set_flashdata('errorregmessage', 'Error');
		}

		redirect('counselor/settings?str=profile');
	}
	public function reports(){
		$data = [
			'title' => 'Mental Health Assessment - Reports',
			'isActiveSideBar' => 'isForReports',
			'pagination' => 'Analytical Reports',
			'departments' => $this->departments->__getAllDepartments(),
			'assessments' => $this->questions->__getReports(),
			'courses' => $this->courses->__getAllCourses(),
			'users' => count($this->users->__getAllUsers())
		];
		// dd($data['assessments']);
		$this->load->view('counselor/components/cheader.php', $data);
		$this->load->view('counselor/reports/pieReports.php', $data);
		$this->load->view('counselor/components/cfooter.php', $data);
	}
}