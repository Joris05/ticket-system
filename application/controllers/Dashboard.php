<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ticket_model', 'ticket');
        $this->load->model('user_model', 'user');
        $this->load->model('department_model', 'department');
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
        $data['open'] = count($this->ticket->ticket_by_department_status($this->session->userdata('department_id'), 'Open'));
        $data['close'] = count($this->ticket->ticket_by_department_status($this->session->userdata('department_id'), 'Partially closed'));
        $data['tickets'] = $this->ticket->ticket_list_by_department($this->session->userdata('department_id'), date("Y-m-d"), date("Y-m-d"));
        $this->load->view('template/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
