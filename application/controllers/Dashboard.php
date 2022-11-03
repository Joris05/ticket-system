<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ticket_model', 'ticket');
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
        $data['open'] = count($this->ticket->ticket_by_deparment_status('1', 'Open'));
        $data['close'] = count($this->ticket->ticket_by_deparment_status('1', 'Partially close'));
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
