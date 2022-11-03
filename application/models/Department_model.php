<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Department_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function department_list()
    {
        $this->db->select('*');
        $this->db->order_by('department_name', 'ASC');
        $q = $this->db->get('department');
        return $q->result_array();
    }
}
