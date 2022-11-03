<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ticket_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function ticket_list()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'DEC');
        $q = $this->db->get('tickets');
        return $q->result_array();
    }

    public function ticket_list_by_department($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'DEC');
        $q = $this->db->get('tickets');
        return $q->result_array();
    }

    public function ticket_by_deparment_status($id, $status)
    {
        $this->db->select('*');
        $this->db->where('status', $status);
        $this->db->where('department_id', $id);
        $this->db->order_by('id', 'DEC');
        $q = $this->db->get('tickets');
        return $q->result_array();
    }

    public function insert_ticket($data)
    {
        $this->db->insert('tickets', $data);
        return true;
    }

    public function update_ticket($data, $where)
    {
        $this->db->update('tickets', $data, $where);
        return true;
    }

    public function delete_ticket($where)
    {
        $this->db->delete('tickets', $where);
        return true;
    }

    public function get_ticket($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('tickets');
        return $q->row();
    }
}
