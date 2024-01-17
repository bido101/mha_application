<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			'isActiveSideBar' => 'isForDashboard',
			'title' => 'Mental Health Assessment - Admin Dashboard',
			'pagination' => 'Admin Dashboard',
			'users' => count($this->users->__getAllUsers()),
			'departments' => $this->departments->__getAllDepartments(),
			'assessments' => $this->questions->__getReports(),
			'courses' => $this->courses->__getAllCourses()
		];

		$this->load->view('admin/components/aheader.php', $data);
		$this->load->view('admin/admin_dashboard.php', $data);
		$this->load->view('admin/components/afooter.php', $data);
	}
	public function user_management(){
		$data = [
			'title' => 'Mental Health Assessment - Users Management',
			'isActiveSideBar' => 'isForUsersManagement',
			'pagination' => 'User Management',
			'users' => $this->users->__getAllUsers()
		];

		$this->load->view('admin/components/aheader.php', $data);
		$this->load->view('admin/users_management/users.php', $data);
		$this->load->view('admin/components/afooter.php', $data);
	}
	public function addUser(){
		if (isset($_POST['btnAddUsers'])) {
			$this->form_validation->set_rules('identification_ID', 'Identification ID', 'required|is_unique[users.identification_ID]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('conpassword', 'Password Confirmation', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) {
				$data_reg = array(
					'identification_ID' => $this->input->post('identification_ID'),
					'firstName' => $this->input->post('firstName'),
					'middleName' => $this->input->post('middleName'),
					'lastName' => $this->input->post('lastName'),
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'role' => $this->input->post('role')
				);
				
				$res = $this->users->__insertNewUsers($data_reg);

				if ($res == 'success') {
					$this->session->set_flashdata('successregmessage', 'Successfully Inserted User');
					redirect('admin/user_management');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorregmessage', 'Error');
					redirect('admin/user_management');
				}
			}else{
				$this->session->set_flashdata('errorregmessage', 'Error');
				redirect('admin/user_management');
			}
		}else{
			$this->session->set_flashdata('errorregmessage', 'Error');
					redirect('admin/user_management');
		}
	}
	public function editUser(){
		if (isset($_POST['btnEditUsers'])) {

				$userID = $this->input->get('id');

				$data_reg = array(
					'identification_ID' => $this->input->post('identification_ID'),
					'firstName' => $this->input->post('firstName'),
					'middleName' => $this->input->post('middleName'),
					'lastName' => $this->input->post('lastName'),
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'role' => $this->input->post('role')
				);
				
				$res = $this->users->__updateUsers($userID, $data_reg);

				if ($res == 'success') {
					$this->session->set_flashdata('successregmessage', 'Successfully Inserted User');
					redirect('admin/user_management');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorregmessage', 'Error');
					redirect('admin/user_management');
				}
		}else{
			$this->session->set_flashdata('errorregmessage', 'Error');
					redirect('admin/user_management');
		}
	}
	public function department(){
		$data = [
			'title' => 'Mental Health Assessment - Department Management',
			'isActiveSideBar' => 'isForDepartmentManagement',
			'pagination' => 'Department Management',
			'isActiveTab' => 'forDepartment',
			'departments' => $this->departments->__getAllDepartments()
		];
		// dd($data['departments']);
		$this->load->view('admin/components/aheader.php', $data);
		$this->load->view('admin/department_management/department.php', $data);
		$this->load->view('admin/components/afooter.php', $data);
	}
	public function addDepartment(){
		if (isset($_POST['btnAddDepartment'])) {
				$toBeInsertedData = array(
					'departmentName' => $this->input->post('departmentName'),
					'departmentAbbreviation' => $this->input->post('departmentAbbreviation')
				);
				
				$res = $this->departments->__insertDepartment($toBeInsertedData);

				if ($res == 'success') {
					$this->session->set_flashdata('insertedDepartment', 'Successfully Inserted');
					redirect('admin/department');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorToInsertDepartment', 'Error to insert Department');
					redirect('admin/department');
				}
		}
	}
	public function editDepartment(){
		if (isset($_POST['btnUpdateDeparatment'])) {
			
			$eID = $this->input->get('eID');	
				$toBeInsertedData = array(
					'departmentName' => $this->input->post('departmentName'),
					'departmentAbbreviation' => $this->input->post('departmentAbbreviation')
				);
				
				$res = $this->departments->__updateDepartment($eID, $toBeInsertedData);

				if ($res == 'success') {
					$this->session->set_flashdata('insertedDepartment', 'Successfully Inserted');
					redirect('admin/department');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorToInsertDepartment', 'Error to insert Department');
					redirect('admin/department');
				}
		}
	}
	public function removeDepartment(){
		$rID = $this->input->get('rID');
		$res = $this->departments->__removedDepartment($rID);
			
			if ($res == 'success') {
				$this->session->set_flashdata('removedDepartment', 'Successfully Removed');
				redirect('admin/department');
			}elseif($res == 'error'){
				$this->session->set_flashdata('errorToInsertDepartment', 'Error to Remove Department');
				redirect('admin/department');
			}
	}
	public function courses(){
		$data = [
			'title' => 'Mental Health Assessment - Courses Management',
			'isActiveSideBar' => 'isForCourseManagement',
			'pagination' => 'Courses Management',
			'isActiveTab' => 'forCourses',
			'departments' => $this->departments->__getAllDepartments(),
			'courses' => $this->courses->__getAllCourses()
		];
		// dd($data['departments']);
		$this->load->view('admin/components/aheader.php', $data);
		$this->load->view('admin/courses_management/courses.php', $data);
		$this->load->view('admin/components/afooter.php', $data);
	}
	public function addCourse(){
		if (isset($_POST['btnAddCourse'])) {
			if ($this->input->post('deptID') != 0) {
				$insertData = [
					'deptID' => $this->input->post('deptID'),
					'courseName' => $this->input->post('courseName'),
					'courseAbbreviation' => $this->input->post('courseAbbreviation')
				];

				$isAdded = $this->courses->__insertCourse($insertData);
				if ($isAdded == 'success') {
					$this->session->set_flashdata('successInsertCourse', "Successfully Inserted Course");
				}elseif ($isAdded == 'error') {
					$this->session->set_flashdata('errorInsertCourse', "Error to Insert Course");
				}
			}else{
				$this->session->set_flashdata('errorSelectCourseCategory', "Please Select Category");
			}
			
			redirect('admin/courses');
		}
	}
	public function editCourse(){
		if (isset($_POST['btnUpdateCourse'])) {
			
			$eID = $this->input->get('eID');	
				$toBeInsertedData = array(
					'deptID' => $this->input->post('deptID'),
					'courseName' => $this->input->post('courseName'),
					'courseAbbreviation' => $this->input->post('courseAbbreviation')
				);
				
				$res = $this->courses->__updateCourse($eID, $toBeInsertedData);

				if ($res == 'success') {
					$this->session->set_flashdata('insertedCourse', 'Successfully Inserted');
					redirect('admin/courses');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorToInsertCourse', 'Error to insert Course');
					redirect('admin/courses');
				}
		}
	}
	public function removeCourse(){
		$rID = $this->input->get('rID');
		$res = $this->courses->__removedCourse($rID);
			
			if ($res == 'success') {
				$this->session->set_flashdata('removedCourse', 'Successfully Removed');
				redirect('admin/courses');
			}elseif($res == 'error'){
				$this->session->set_flashdata('errorToInsertCourse', 'Error to Remove Course');
				redirect('admin/courses');
			}
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
		$this->load->view('admin/components/aheader.php', $data);
		$this->load->view('admin/settings/settings.php', $data);
		$this->load->view('admin/components/afooter.php', $data);
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
				
				redirect('admin/settings?str=profile');
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
		
		redirect('admin/settings?str=profile');
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

		redirect('admin/settings?str=profile');
	}
	public function removeUsers(){
		$userID = $this->input->get('userID');
		$res = $this->users->__removedUsers($rID);
			
			if ($res == 'success') {
				$this->session->set_flashdata('removedUsers', 'Successfully Removed');
				redirect('admin/user_management');
			}elseif($res == 'error'){
				$this->session->set_flashdata('errorToInsertUsers', 'Error to Remove Users');
				redirect('admin/user_management');
			}
	}
}
