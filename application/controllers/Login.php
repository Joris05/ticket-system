<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors('<li>', '</li>');
            $data['error'] = $errors;
            $this->load->view('pages/login', $data);
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $check = $this->user->checkLogin($username, $password);

            if ($check) {
                $data    = array(
                    'userid' => $check->user_id,
                    'name' => $check->name,
                    'username' => $check->username,
                    'password' => $check->password,
                    'utype' => $check->user_type,
                    'department_id' => $check->department_id,
                    'status' => $check->status,
                    'ticket' => true
                );
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $data['error'] = "<li>You have entered an invalid username or password.</li>";
                $this->load->view('pages/login', $data);
            }
        }
    }
}
