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
}
