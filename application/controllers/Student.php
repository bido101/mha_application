<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
		if (!$this->session->userdata('userID') or  $this->session->userdata('role') == 'admin' or $this->session->userdata('role') == 'counsel'){
			redirect('welcome');
		}
	}
	public function index()
	{
		$isStart = 'off';

		$data = [
			'title' => 'Mental Health Assessment - Dashboard',
			'isActiveSideBar' => 'isForDashboard',
			'pagination' => 'Student Dasboard',
			'sections' => $this->questions->__getCategories(),
			'paging' => $isStart
		];

		$this->load->view('student/components/sheader.php', $data);
		$this->load->view('student/student_dashboard.php', $data);
		$this->load->view('student/components/sfooter.php', $data);
	}
	public function start_assessment(){
		$isStart = 'on';

		$data = [
			'title' => 'Mental Health Assessment - Dashboard',
			'isActiveSideBar' => 'isForDashboard',
			'pagination' => 'Student Dasboard',
			'sections' => $this->questions->__getCategories(),
			'sections_content' => $this->questions->__getAllQuestions(),
			'paging' => $isStart
		];

		$this->load->view('student/components/sheader.php', $data);
		$this->load->view('student/student_dashboard.php', $data);
		$this->load->view('student/components/sfooter.php', $data);
	}
	public function submitting_assessment(){
		$studAnswer = $this->input->post('studAnswer');

		if (!empty($studAnswer)) {
			$ser = serialize($studAnswer);

			$inserData = array(
				'questionID' => $ser,
				'studID' => $this->session->userdata('userID'),
				'assessment_status' => '1'
			);

			$res = $this->questions->__insertAnswerQuestionOfStudents($inserData);
			if ($res == 'success') {
				$this->session->set_flashdata('successSubmittedAssessment', "Your Pre-Assessment has Successfully been submitted");
				redirect('student/my_assessment');
			}elseif ($res == 'success') {
				$this->session->set_flashdata('errorSubmittingAssessment', "Error in Submitting your Assessnent, Plase try again");
				redirect('student/start_assessment');
			}
		}else{
			$this->session->set_flashdata('errorNoSelectedData', "Please Select of the Corresponding Questions");
			redirect('student/start_assessment');
		}
	}
	public function my_assessment(){
		$data = [
			'title' => 'Mental Health Assessment - Dashboard',
			'isActiveSideBar' => 'isForMyAssessment',
			'pagination' => 'Assessment',
			'pre_assess' => $this->questions->__getMyAnswerOnPreAssessment(),
			'category' => $this->questions->__getCategories(),
			'allquestions' => $this->questions->__getAllQuestions(),
		];
		// dd($data['pre_assess']);
		$this->load->view('student/components/sheader.php', $data);
		$this->load->view('student/assessments/myAssessment.php', $data);
		$this->load->view('student/components/sfooter.php', $data);
	}
	public function assessment_history(){
		$data = [
			'title' => 'Mental Health Assessment - Dashboard',
			'isActiveSideBar' => 'isForMyHistoryAssessment',
			'pagination' => 'Assessment History',
			'pre_assess' => $this->questions->__getMyAnswerOnPreAssessment(),
			'category' => $this->questions->__getCategories(),
			'allquestions' => $this->questions->__getAllQuestions(),
		];
		// dd($data['pre_assess']);
		$this->load->view('student/components/sheader.php', $data);
		$this->load->view('student/assessments/myAssessmentHistory.php', $data);
		$this->load->view('student/components/sfooter.php', $data);
	}
	public function settings(){
		$data = [
			'title' => 'Mental Health Assessment - Settings',
			'isActiveSideBar' => 'isForSettings',
			'pagination' => 'Settings',
			'isActiveTab' => 'forSettings',
			'myProfile' => $this->users->__getMyProfile(),
			'courses' => $this->courses->__getAllCourses()
		];
		// dd($data['myProfile']);
		$this->load->view('student/components/sheader.php', $data);
		$this->load->view('student/settings/settings.php', $data);
		$this->load->view('student/components/sfooter.php', $data);
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
					'bDay' => $this->input->post('bDay'),
					'courseID' => $this->input->post('courseID')
				);
				
				$res = $this->users->__updateUsers($userID, $data_reg);

				if ($res == 'success') {
					$this->session->set_flashdata('messageupdateProfile', 'Successfully Inserted');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorToUpdateProfile', 'Error to Update Profile');
				}
				
				redirect('student/settings?str=profile');
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
		
		redirect('student/settings?str=profile');
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

		redirect('student/settings?str=profile');

	}
}