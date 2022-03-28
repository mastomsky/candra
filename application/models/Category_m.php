<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_id_kenama($nama)
    {
        $this->db->select('nama')->from('category')->where('category_id', $nama);
        $query = $this->db->get();

        return $query;
    }

    public function edit_web($post)
    {
        $params['admin_1'] = $post['admin_1'];
        $params['admin_2'] = $post['admin_2'];
        $params['link_1'] = $post['link_1'];
        $params['link_2'] = $post['link_2'];
        $params['yt'] = $post['yt'];
        $params['fb'] = $post['fb'];
        $params['ig'] = $post['ig'];
        $params['email'] = $post['email'];
        $params['alamat'] = $post['alamat'];

        $this->db->update('profil_web', $params);
    }

    public function add($post)
    {
        $params['nama'] = $post['nama'];
        $this->db->insert('category', $params);
    }

    public function edit($post)
    {
        $params['nama'] = $post['nama'];

        $this->db->where('category_id', $post['category_id']);
        $this->db->update('category', $params);
    }

    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('category');
    }
    // Sesi Type Product

    public function get_type($id = null)
    {
        $this->db->from('type');
        if ($id != null) {
            $this->db->where('type_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add_type($post)
    {
        $params['type_nama'] = $post['nama'];
        $this->db->insert('type', $params);
    }

    public function edit_type($post)
    {
        $params['type_nama'] = $post['nama'];

        $this->db->where('type_id', $post['type_id']);
        $this->db->update('type', $params);
    }

    public function del_type($id)
    {
        $this->db->where('type_id', $id);
        $this->db->delete('type');
    }

    // category

    var $column_order_category = array(null, 'nama'); //set column field database for datatable orderable
    var $column_search_category = array('nama'); //set column field database for datatable searchable
    var $order_category = array('category_id' => 'desc'); // default order 

    private function _get_category_query()
    {
        $this->db->select('*');
        $this->db->from('category');
        $i = 0;
        foreach ($this->column_search_category as $category) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($category, $_POST['search']['value']);
                } else {
                    $this->db->or_like($category, $_POST['search']['value']);
                }
                if (count($this->column_search_category) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_category[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_category = $this->order;
            $this->db->order_by(key($order_category), $order_category[key($order_category)]);
        }
    }
    function get_datatables_category()
    {
        $this->_get_category_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_category()
    {
        $this->_get_category_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_category()
    {
        $this->db->from('category');
        return $this->db->count_all_results();
    }
    // type

    var $column_order_type = array(null, 'type_nama'); //set column field database for datatable orderable
    var $column_search_type = array('type_nama'); //set column field database for datatable searchable
    var $order_type = array('type_id' => 'desc'); // default order 

    private function _get_type_query()
    {
        $this->db->select('*');
        $this->db->from('type');
        $i = 0;
        foreach ($this->column_search_type as $type) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($type, $_POST['search']['value']);
                } else {
                    $this->db->or_like($type, $_POST['search']['value']);
                }
                if (count($this->column_search_type) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_type[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_type = $this->order;
            $this->db->order_by(key($order_type), $order_type[key($order_type)]);
        }
    }
    function get_datatables_type()
    {
        $this->_get_type_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_type()
    {
        $this->_get_type_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_type()
    {
        $this->db->from('type');
        return $this->db->count_all_results();
    }
    // Promo
    var $column_order_promo = array(null, 'foto', 'keterangan'); //set column field database for datatable orderable
    var $column_search_promo = array('foto'); //set column field database for datatable searchable
    var $order_promo = array('promo_id' => 'desc'); // default order 

    private function _get_promo_query()
    {
        $this->db->select('*');
        $this->db->from('promo');
        $i = 0;
        foreach ($this->column_search_promo as $promo) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($promo, $_POST['search']['value']);
                } else {
                    $this->db->or_like($promo, $_POST['search']['value']);
                }
                if (count($this->column_search_promo) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_promo[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_promo = $this->order;
            $this->db->order_by(key($order_promo), $order_promo[key($order_promo)]);
        }
    }
    function get_datatables_promo()
    {
        $this->_get_promo_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_promo()
    {
        $this->_get_promo_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_promo()
    {
        $this->db->from('promo');
        return $this->db->count_all_results();
    }
}
