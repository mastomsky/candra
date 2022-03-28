<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inbox_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('contact');
        if ($id != null) {
            $this->db->where('contact_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['nama'] = $post['nama'];
        $this->db->insert('contact', $params);
    }

    public function edit($post)
    {
        $params['nama'] = $post['nama'];

        $this->db->where('contact_id', $post['contact_id']);
        $this->db->update('contact', $params);
    }

    public function del($id)
    {
        $this->db->where('contact_id', $id);
        $this->db->delete('contact');
    }

    // inbox

    var $column_order_inbox = array(null, 'nama', 'phone', 'email', 'service_nama', 'created'); //set column field database for datatable orderable
    var $column_search_inbox = array('nama'); //set column field database for datatable searchable
    var $order_inbox = array('contact_id' => 'desc'); // default order 

    private function _get_inbox_query()
    {
        $this->db->select('contact.*, our_service.nama as service_nama');
        $this->db->from('contact');
        $this->db->join('our_service', 'our_service.service_id = contact.service_id');
        $i = 0;
        foreach ($this->column_search_inbox as $inbox) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($inbox, $_POST['search']['value']);
                } else {
                    $this->db->or_like($inbox, $_POST['search']['value']);
                }
                if (count($this->column_search_inbox) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_inbox[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_inbox = $this->order;
            $this->db->order_by(key($order_inbox), $order_inbox[key($order_inbox)]);
        }
    }
    function get_datatables_inbox()
    {
        $this->_get_inbox_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_inbox()
    {
        $this->_get_inbox_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_inbox()
    {
        $this->db->from('contact');
        return $this->db->count_all_results();
    }
}
