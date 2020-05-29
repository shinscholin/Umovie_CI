<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index(){
		$data['title'] = 'Admin Dashboard';	
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/dash_footer');

	}
}	