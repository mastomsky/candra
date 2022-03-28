<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('portfolio');
        if ($id != null) {
            $this->db->where('portfolio_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['foto'] = $post['foto'];
        $this->db->insert('portfolio', $params);
    }

    public function edit($post)
    {
        $params['service_id'] = $post['service_id'];
        $params['judul'] = $post['judul'];
        if (!empty($post['foto'])) {
            $params['foto'] = $post['foto'];
        }
        $this->db->where('portfolio_id', $post['portfolio_id']);
        $this->db->update('portfolio', $params);
    }

    public function del($id)
    {
        $this->db->where('portfolio_id', $id);
        $this->db->delete('portfolio');
    }

    // portfolio
    var $column_order_portfolio = array(null, 'foto', 'created'); //set column field database for datatable orderable
    var $column_search_portfolio = array('foto'); //set column field database for datatable searchable
    var $order_portfolio = array('portfolio_id' => 'desc'); // default order 

    private function _get_portfolio_query()
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $i = 0;
        foreach ($this->column_search_portfolio as $portfolio) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($portfolio, $_POST['search']['value']);
                } else {
                    $this->db->or_like($portfolio, $_POST['search']['value']);
                }
                if (count($this->column_search_portfolio) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_portfolio[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_portfolio = $this->order;
            $this->db->order_by(key($order_portfolio), $order_portfolio[key($order_portfolio)]);
        }
    }
    function get_datatables_portfolio()
    {
        $this->_get_portfolio_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_portfolio()
    {
        $this->_get_portfolio_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_portfolio()
    {
        $this->db->from('portfolio');
        return $this->db->count_all_results();
    }
}
