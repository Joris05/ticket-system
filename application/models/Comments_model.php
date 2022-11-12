<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Comments_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function comment_list($id)
    {
        $this->db->select('*');
        $this->db->where('ticket_id', $id);
        $this->db->order_by('id', 'DEC');
        $q = $this->db->get('tickets_comments');
        return $q->result_array();
    }

    public function insert_comment($data)
    {
        $this->db->insert('tickets_comments', $data);
        return true;
    }

}