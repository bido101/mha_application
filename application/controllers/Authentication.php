<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

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
	public function index()
	{
		if (isset($_POST['btnLogin'])) {

			$this->form_validation->set_rules('identification_ID', 'PLMUN Identification No.', 'required|min_length[2]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			
			if ($this->form_validation->run() == TRUE) {
				$identification_ID = $this->input->post('identification_ID');
				$password = sha1($this->input->post('password'));

				$isLogin = $this->users->__canLogin($identification_ID, $password);

				if ($isLogin) {
					foreach ($isLogin as $key => $value) {
						$session_data = array(
												'userID' => $value['userID'],
												'identification_ID' => $value['identification_ID'],
												'firstName' => $value['firstName'],
												'middleName' => $value['middleName'],
												'lastName' => $value['lastName'],
												'email' => $value['email'],
												'role' => $value['role']
											);	
						$this->session->set_userdata($session_data);

						//redirect to determined specify role
						if($this->session->userdata('role') == 'admin'){
							$this->session->set_flashdata('successlogin', "Successfully Login");
							redirect('admin');
						}elseif($this->session->userdata('role') == 'student'){
							$this->session->set_flashdata('successlogin', "Successfully Login");
							redirect('student');
						}elseif ($this->session->userdata('role') == 'counselor') {
							$this->session->set_flashdata('successlogin', "Successfully Login");
							redirect('counselor');
						}else{
							$this->session->set_flashdata('errorlogin', "Error");
							redirect('welcome');
						}
					}
				}else{
							$this->session->set_flashdata('errorlogin', "Error");
							redirect('welcome');
						}
			}
		}
	}
	public function postRegisterUsers(){
		if (isset($_POST['btnRegister'])) {
			$this->form_validation->set_rules('identification_ID', 'Identification ID', 'required|is_unique[users.identification_ID]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('conpassword', 'Password Confirmation', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) {
				$data_reg = array(
					'identification_ID' => $this->input->post('identification_ID'),
					'firstName' => $this->input->post('firstName'),
					'middleName' => $this->input->post('middleName'),
					'lastName' => $this->input->post('lastName'),
					'courseID' => $this->input->post('courseID'),
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'role' => 'student'
				);
				
				$res = $this->users->__insertNewUsers($data_reg);

				if ($res == 'success') {
					$this->session->set_flashdata('successregmessage', 'Successfully Inserted User');
					redirect('welcome');
				}elseif($res == 'error'){
					$this->session->set_flashdata('errorregmessage', 'Error');
					redirect('welcome');
				}
			}else{
				$this->session->set_flashdata('errorregmessage', 'Error');
				redirect('welcome');
			}
		}else{
			$this->session->set_flashdata('errorregmessage', 'Error');
					redirect('welcome');
		}
	}
	public function logout(){
		session_destroy();
		redirect('welcome');
	}
}
