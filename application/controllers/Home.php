<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();  
        is_logged_in();
    }


public function index(){
	 $data['title'] = 'UMovie';
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  	  $this->load->view('templates/home_header', $data);
      $this->load->view('templates/home_topbar', $data);
      $this->load->view('home/', $data);
      $this->load->view('templates/home_footer', $data);
}}