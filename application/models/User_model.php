<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function checkLogin($username, $password)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $q = $this->db->get('users');
        return $q->row();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $q = $this->db->get('users');
        return $q->row();
    }

    public function users_list($notId = null)
    {
        $this->db->select('*');
        if ($notId) {
            $this->db->where('user_id !=', $notId);
        }
        $this->db->order_by('name', 'ASC');
        $q = $this->db->get('users');
        return $q->result_array();
    }

    public function insert_user($data)
    {
        $this->db->insert('users', $data);
        return true;
    }

    public function update_user($data, $where)
    {
        $this->db->update('users', $data, $where);
        return true;
    }

    public function delete_user($where)
    {
        $this->db->delete('users', $where);
        return true;
    }

    public function get_user_name($name)
    {
        $this->db->select('*');
        $this->db->where('name', $name);
        $q = $this->db->get('users');
        return $q->row();
    }

    public function get_username($name)
    {
        $this->db->select('*');
        $this->db->where('username', $name);
        $q = $this->db->get('users');
        return $q->row();
    }

    public function get_user_name_other($id, $name)
    {
        $this->db->select('*');
        $this->db->where('user_id !=', $id);
        $this->db->where('name', $name);
        $q = $this->db->get('users');
        return $q->row();
    }

    public function get_username_other($id, $name)
    {
        $this->db->select('*');
        $this->db->where('user_id !=', $id);
        $this->db->where('username', $name);
        $q = $this->db->get('users');
        return $q->row();
    }
}
