<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('department_model', 'department');
        $this->load->model('ticket_model', 'ticket');
        $this->load->model('user_model', 'user');
        $this->load->model('comments_model', 'comment');
        $this->check_isvalidated();
    }

    private function check_isvalidated()
    {
        if (!$this->session->userdata('ticket')) {
            redirect('/');
        } elseif ($this->session->userdata('utype') != 'admin') {
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['close'] = count($this->ticket->ticket_by_department_status(null, 'Partially closed'));
        $data['open'] = count($this->ticket->ticket_by_department_status(null, 'Open'));
        $data['all'] = count($this->ticket->ticket_by_department_status());
        $data['alltickets'] = $this->ticket->ticket_by_department_status(null, null, date('Y-m-d'), date('Y-m-d'));
        $data['today'] = count($this->ticket->ticket_by_department_status(null, null, date('Y-m-d'), date('Y-m-d')));
        $this->load->view('template/admin_header', $data);
        $this->load->view('pages/admin_dashboard');
        $this->load->view('template/admin_footer');
    }

    public function department()
    {
        $data['title'] = 'Department';
        $data['departments'] = $this->department->department_list();
        $this->load->view('template/admin_header', $data);
        $this->load->view('pages/admin_department', $data);
        $this->load->view('template/admin_footer');
    }

    public function createDepartment($errors = null)
    {
        $data['title'] = 'Add Department';
        $data['url'] = 'admin/department/store';
        $data['error'] = $errors;
        $this->load->view('template/admin_header', $data);
        $this->load->view('pages/admin_add_department', $data);
        $this->load->view('template/admin_footer');
    }

    public function storeDepartment()
    {
        $this->form_validation->set_rules(
            'department',
            'Department',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors('<li>', '</li>');
            $this->createDepartment($errors);
        } else {
            $department = $this->input->post('department');

            $check = $this->department->get_department_title($department);

            if ($check) {
                $errors = '<li>Department name is already exist.</li>';
                $this->createDepartment($errors);
            } else {
                $data = array(
                    'department_name' => $department
                );
                $insert  = $this->department->insert_department($data);
                if ($insert) {
                    redirect('admin/department');
                } else {
                    $errors = '<li>Unable to save department.</li>';
                    $this->createDepartment($errors);
                }
            }
        }
    }

    public function editDepartment($id, $errors = null)
    {
        if ($id) {
            $data['title'] = 'Edit Department';
            $data['url'] = 'admin/department/update';
            $data['error'] = $errors;
            $data['department'] = $this->department->get_department($id);
            $this->load->view('template/admin_header', $data);
            $this->load->view('pages/admin_add_department', $data);
            $this->load->view('template/admin_footer');
        }
    }

    public function updateDepartment()
    {
        $this->form_validation->set_rules(
            'department',
            'Department',
            'required|trim'
        );
        $id = $this->input->post('department_id');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors('<li>', '</li>');
            $this->editDepartment($id, $errors);
        } else {
            $department = $this->input->post('department');

            $check = $this->department->get_department_title_other($id, $department);

            if ($check) {
                $errors = '<li>Department name is already exist.</li>';
                $this->editDepartment($id, $errors);
            } else {
                $data = array(
                    'department_name' => $department
                );
                $insert  = $this->department->update_department($data, 'department_id = "' . $id . '"');
                if ($insert) {
                    redirect('admin/department');
                } else {
                    $errors = '<li>Unable to save department.</li>';
                    $this->editDepartment($id, $errors);
                }
            }
        }
    }

    public function deleteDepartment($id)
    {
        if ($id) {
            $delete  = $this->department->delete_department('department_id = "' . $id . '"');
            if ($delete) {
                redirect('admin/department');
            }
        }
    }

    public function accounts()
    {
        $data['title'] = 'Accounts';
        $data['users'] = $this->user->users_list();
        $this->load->view('template/admin_header', $data);
        $this->load->view('pages/admin_accounts', $data);
        $this->load->view('template/admin_footer');
    }

    public function createUser($errors = null)
    {
        $data['title'] = 'Add User';
        $data['url'] = 'admin/user/store';
        $data['error'] = $errors;
        $data['departments'] = $this->department->department_list();
        $this->load->view('template/admin_header', $data);
        $this->load->view('pages/admin_add_accounts', $data);
        $this->load->view('template/admin_footer');
    }

    public function storeUser()
    {
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim'
        );
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
        $this->form_validation->set_rules(
            'department',
            'Department',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'utype',
            'User Type',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors('<li>', '</li>');
            $this->createUser($errors);
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $department = $this->input->post('department');
            $utype = $this->input->post('utype');

            $check = $this->user->get_user_name($name);
            $check1 = $this->user->get_username($username);

            if ($check) {
                $errors = "<li>User's name is already exist.</li>";
                $this->createUser($errors);
            } else if ($check1) {
                $errors = "<li>User's username is already exist.</li>";
                $this->createUser($errors);
            } else {
                $data = array(
                    'username' => $username,
                    'password' => md5($password),
                    'name' => $name,
                    'department_id' => $department,
                    'user_type' => $utype
                );
                $insert  = $this->user->insert_user($data);
                if ($insert) {
                    redirect('admin/accounts');
                } else {
                    $errors = '<li>Unable to save user.</li>';
                    $this->createUser($errors);
                }
            }
        }
    }

    public function deleteUser($id)
    {
        if ($id) {
            if ($id) {
                $delete  = $this->user->delete_user('user_id = "' . $id . '"');
                if ($delete) {
                    redirect('admin/accounts');
                }
            }
        }
    }

    public function editUser($id, $errors = null)
    {
        if ($id) {
            $data['title'] = 'Edit User';
            $data['url'] = 'admin/user/update';
            $data['error'] = $errors;
            $data['id'] = $id;
            $data['departments'] = $this->department->department_list();
            $data['user'] = $this->user->get_user($id);
            $this->load->view('template/admin_header', $data);
            $this->load->view('pages/admin_add_accounts', $data);
            $this->load->view('template/admin_footer');
        }
    }

    public function updateUser()
    {

        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim'
        );
        // $this->form_validation->set_rules(
        //     'password',
        //     'Password',
        //     'required|trim'
        // );
        $this->form_validation->set_rules(
            'department',
            'Department',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'utype',
            'User Type',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors('<li>', '</li>');
            $this->createUser($errors);
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $department = $this->input->post('department');
            $utype = $this->input->post('utype');
            $id = $this->input->post('user_id');

            $check = $this->user->get_user_name_other($id, $name);
            $check1 = $this->user->get_username_other($id, $username);

            if ($check) {
                $errors = "<li>User's name is already exist.</li>";
                $this->editUser($id, $errors);
            } else if ($check1) {
                $errors = "<li>User's username is already exist.</li>";
                $this->editUser($id, $errors);
            } else {
                $data = array(
                    'username' => $username,
                    'name' => $name,
                    'department_id' => $department,
                    'user_type' => $utype
                );
                $update  = $this->user->update_user($data ,'user_id = "'.$id.'"');
                if ($update) {
                    redirect('admin/accounts');
                } else {
                    $errors = '<li>Unable to update user.</li>';
                    $this->editUser($id, $errors);
                }
            }
        }
    }

    public function tickets($stat)
    {
        if($stat){
            $data['title'] = 'Tickets';
            $data['stat'] = $stat;
            $stat = ($stat === 'closed') ? 'Partially closed' : 'Open';
            $data['alltickets'] = $this->ticket->ticket_by_department_status(null, $stat, null, null);
            $this->load->view('template/admin_header', $data);
            $this->load->view('pages/admin_tickets');
            $this->load->view('template/admin_footer');
        }
    }

    public function viewTicket($id)
    {
        if($id){
            $data['title'] = 'View Tickets';
            $data['comments'] = $this->comment->comment_list($id);
            $data['ticket'] = $this->ticket->get_ticket_info($id);
            $this->load->view('template/admin_header', $data);
            $this->load->view('pages/admin_view_ticket', $data);
            $this->load->view('template/admin_footer');
        }
    }
}
