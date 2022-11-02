<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends CI_Controller
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

    public function create()
    {
        $data['title'] = 'Create Ticket';
        $this->load->view('template/header', $data);
        $this->load->view('pages/create');
        $this->load->view('template/footer');
    }

    public function list()
    {
        $data['title'] = 'All Tickets';
        $this->load->view('template/header', $data);
        $this->load->view('pages/tickets');
        $this->load->view('template/footer');
    }
}
