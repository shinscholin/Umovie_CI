	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){
		$data['title'] = 'Login Page';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
		}else{
			$this->login();
		}
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user){
			if(password_verify($password, $user['password'])){
				$data = ['email' => $user['email'], 'role_id' => $user['role_id']];
				$this->session->set_userdata($data);
				redirect('admin');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
				redirect('auth');
			}
		}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email has not been registered</div>');
				redirect('auth');
		}

	}

	public function register(){
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',['is_unique'=>'This email has already registered']);
		$this->form_validation->set_rules('password1','password','required|trim|min_length[8]|matches[password2]',['matches'=>'password dont match!','min_length'=>'Password too short']);
		$this->form_validation->set_rules('password2','password','required|trim|matches[password1]');

		if($this->form_validation->run()==false){
				$this->load->view('auth/register');
			}else{
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'birthdate'=> $this->input->post('birthdate'),
					'image' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 1,
					'date_created' => time()
				];

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">your account has been created. </div>');
				redirect('auth');
			}
	
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logged out. </div>');
		redirect('auth');
	}


}
