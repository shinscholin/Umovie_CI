<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Movie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();  
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Movie';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = $this->db->get('movie')->result_array();

       /** $this->form_validation->set_rules('judul', 'Judul', 'required');**/

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('movie/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('movie', ['judul' => $this->input->post('judul')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New movie added!</div>');
            redirect('movie');
        }
    }
}