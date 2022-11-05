<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('department_model', 'department');
        $this->load->model('ticket_model', 'ticket');
        $this->load->model('user_model', 'user');
        $this->check_isvalidated();
    }

    private function check_isvalidated()
    {
        if (!$this->session->userdata('ticket')) {
            redirect('/');
        } elseif($this->session->userdata('utype')!='admin') {
            redirect('/');
        }
    }

    public function index()
    {
        $this->load->view('template/admin_header');
    }
}
?>