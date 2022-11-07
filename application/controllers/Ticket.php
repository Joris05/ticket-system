<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Ticket extends CI_Controller
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
        }
    }

    public function create($errors = null)
    {
        $data['title'] = 'Create Ticket';
        $data['error'] = $errors;
        $data['departments'] = $this->department->department_list($this->session->userdata('department_id'));
        $this->load->view('template/header', $data);
        $this->load->view('pages/create', $data);
        $this->load->view('template/footer');
    }

    public function list($cond)
    {
        if (!empty($cond)) {
            $data['title'] = 'All Tickets';
            $data['tickets'] = $this->ticket->ticket_list($this->session->userdata('userid'));
            $data['params'] = $cond;
            if ($cond === 'all') {
                $data['ticketsDepartment'] = $this->ticket->ticket_list_by_department($this->session->userdata('department_id'));
            } else {
                $cond = ($cond === 'close') ? 'Partially closed' : 'Open';
                $data['ticketsDepartment'] = $this->ticket->ticket_by_deparment_status($this->session->userdata('department_id'), $cond);
            }
            $data['departments'] = $this->department->department_list($this->session->userdata('department_id'));
            $this->load->view('template/header', $data);
            $this->load->view('pages/tickets', $data);
            $this->load->view('template/footer');
        }
    }

    public function filter($cond1, $cond2)
    {
        if ($cond1 && $cond2) {
            $data['title'] = 'All Tickets';
            $data['params'] = $cond2;
            $data['tickets'] = $this->ticket->ticket_list($this->session->userdata('userid'));
            $cond2 = ($cond2 === 'close') ? 'Partially closed' : 'Open';
            $data['ticketsDepartment'] = $this->ticket->ticket_by_deparment_status($cond1, $cond2);
            $data['departments'] = $this->department->department_list($this->session->userdata('department_id'));
            $this->load->view('template/header', $data);
            $this->load->view('pages/tickets', $data);
            $this->load->view('template/footer');
        }
    }

    public function store()
    {
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'department',
            'Department',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'msg',
            'Message',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors('<li>', '</li>');
            $this->create($errors);
        } else {
            $title = $this->input->post('title');
            $department = $this->input->post('department');
            $msg = $this->input->post('msg');

            $check = $this->ticket->get_ticket_title($title, 'Open');

            if ($check) {
                $errors = '<li>You have a open ticket for this request. Please contact the department for the updates.</li>';
                $this->create($errors);
            } else {
                $data = array(
                    'title' => $title,
                    'msg' => $msg,
                    'department_id' => $department,
                    'user_id' => $this->session->userdata('userid'),
                );
                $insert  = $this->ticket->insert_ticket($data);
                if ($insert) {
                    $this->list('all');
                } else {
                    $errors = '<li>Unable to submit your request. please contact the IT System Adminstrator.</li>';
                    $this->create($errors);
                }
            }
        }
    }

    public function view($id)
    {
        if ($id) {
            $data['title'] = 'View Ticket';
            $this->load->view('template/header', $data);
            if ($this->ticket->get_ticket($id, $this->session->userdata('department_id'))) {
                $data['ticket'] = $this->ticket->get_ticket($id, $this->session->userdata('department_id'));
                $this->load->view('pages/view_ticket', $data);
            }
            $this->load->view('template/footer');
        }
    }

    public function status($id, $status)
    {
        if ($id && $status) {
            $where = 'id = "' . $id . '"';
            ($status === 'close') ?

                $data = array(
                    'status' => ($status === 'close') ? 'Partially closed' : 'Open',
                    'date_modified' => date("Y-m-d H:i:s")
                )
                :
                $data = array(
                    'status' => ($status === 'close') ? 'Partially closed' : 'Open'
                );

            $this->ticket->update_ticket($data, $where);
            $this->view($id);
        }
    }
}
