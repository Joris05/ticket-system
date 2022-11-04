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
        if($notId){
            $this->db->where('department_id !=', $notId);
        }
        $this->db->order_by('department_name', 'ASC');
        $q = $this->db->get('department');
        return $q->result_array();
    }

    public function get_deparment($id)
    {
        $this->db->select('*');
        $this->db->where('department_id', $id);
        $q = $this->db->get('department');
        return $q->row();
    }
}
