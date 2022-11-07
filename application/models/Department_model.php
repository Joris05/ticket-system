<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Department_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function department_list($notId = null)
    {
        $this->db->select('*');
        if ($notId) {
            $this->db->where('department_id !=', $notId);
        }
        $this->db->order_by('department_name', 'ASC');
        $q = $this->db->get('department');
        return $q->result_array();
    }

    public function get_department($id)
    {
        $this->db->select('*');
        $this->db->where('department_id', $id);
        $q = $this->db->get('department');
        return $q->row();
    }

    public function get_department_title($title)
    {
        $this->db->select('*');
        $this->db->where('department_name', $title);
        $q = $this->db->get('department');
        return $q->row();
    }

    public function get_department_title_other($id, $title)
    {
        $this->db->select('*');
        $this->db->where('department_id !=', $id);
        $this->db->where('department_name', $title);
        $q = $this->db->get('department');
        return $q->row();
    }

    public function insert_department($data)
    {
        $this->db->insert('department', $data);
        return true;
    }

    public function update_department($data, $where)
    {
        $this->db->update('department', $data, $where);
        return true;
    }

    public function delete_department($where)
    {
        $this->db->delete('department', $where);
        return true;
    }
}
