<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ticket_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function ticket_list($id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->order_by('id', 'DEC');
        $q = $this->db->get('tickets');
        return $q->result_array();
    }

    public function ticket_list_by_department($id, $sdate = null, $edate = null)
    {
        $this->db->select('*');
        $this->db->where('department_id', $id);
        if ($sdate) {
            $this->db->where('DATE(date_created) >=', $sdate);
            $this->db->where('DATE(date_created) <=', $edate);
        }
        $this->db->order_by('id', 'DEC');
        $q = $this->db->get('tickets');
        return $q->result_array();
    }

    public function ticket_by_deparment_status($id = null, $status = null, $sdate = null, $edate = null)
    {
        $this->db->select('*');
        if($id){
            $this->db->where('department_id', $id);
        }
        if ($status) {
            $this->db->where('status', $status);
        }
        if ($sdate) {
            $this->db->where('DATE(date_created) >=', $sdate);
            $this->db->where('DATE(date_created) <=', $edate);
        }
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

    public function get_ticket($id, $department)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('department_id', $department);
        $q = $this->db->get('tickets');
        return $q->row();
    }

    public function get_ticket_by_user($id, $userid)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('user_id', $userid);
        $q = $this->db->get('tickets');
        return $q->row();
    }

    public function get_ticket_title($title, $status)
    {
        $this->db->select('*');
        $this->db->where('title', $title);
        $this->db->where('status', $status);
        $q = $this->db->get('tickets');
        return $q->row();
    }
}
