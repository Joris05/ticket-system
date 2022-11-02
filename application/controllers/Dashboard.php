<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated()
    {
        if (!$this->session->userdata('ticket')) {
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('template/header', $data);
        $this->load->view('pages/home');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
