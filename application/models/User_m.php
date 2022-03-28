<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    var $column_order = array(null, 'nama', 'foto', 'telpon', 'email', 'status'); //set column field database for datatable orderable
    var $column_search = array('nama'); //set column field database for datatable searchable
    var $order = array('user_id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('user');
        $i = 0;
        foreach ($this->column_search as $blog) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($blog, $_POST['search']['value']);
                } else {
                    $this->db->or_like($blog, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('user');
        return $this->db->count_all_results();
    }


    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function get_data_anggota($id = null)
    // {
    //     $this->db->select('user.*, level.nama as level_nama, korwil.nama as korwil_nama');
    //     $this->db->from('user');
    //     $this->db->join('korwil', 'korwil.korwil_id = user.korwil_id');
    //     $this->db->join('level', 'level.level_id = user.level_id');
    //     if ($id != null) {
    //         $this->db->where('user_id', $id);
    //     }
    //     $this->db->order_by('user_id', 'desc');
    //     $query = $this->db->get();
    //     return $query;
    // }


    public function get_detail($id)
    {
        $this->db->select('user.*, user.nama as user_nama, korwil.nama as korwil_nama, level.nama as level_nama');
        $this->db->from('user');
        $this->db->join('korwil', 'korwil.korwil_id = user.korwil_id');
        $this->db->join('level', 'level.level_id = user.level_id');

        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $this->db->order_by('user_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {

        $params = [
            'nama' => htmlspecialchars($post['nama'], true),
            'jk' => htmlspecialchars($post['jk'], true),
            'telpon' => htmlspecialchars($post['telpon'], true),
            'email' => htmlspecialchars($post['email'], true),
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'jabatan' => htmlspecialchars($post['jabatan'], true),
            'status' => htmlspecialchars($post['status'], true),
            'alamat' => htmlspecialchars($post['alamat'], true),


        ];
        if ($post['foto'] != null) {
            $params['foto'] = $post['foto'];
        }

        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => htmlspecialchars($post['nama'], true),
            'jk' => htmlspecialchars($post['jk'], true),
            'telpon' => htmlspecialchars($post['telpon'], true),
            'email' => htmlspecialchars($post['email'], true),
            'jabatan' => htmlspecialchars($post['jabatan'], true),
            'status' => htmlspecialchars($post['status'], true),
            'alamat' => htmlspecialchars($post['alamat'], true),


        ];
        if ($post['foto'] != null) {
            $params['foto'] = $post['foto'];
        }
        if (!empty($post['password'])) {
            $params['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
    public function check_email($code, $id = null)
    {
        $this->db->from('user');
        $this->db->where('email', $code);
        if ($id = null) {
            $this->db->where('user_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
