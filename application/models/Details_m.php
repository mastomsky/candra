<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Details_m extends CI_Model
{

    public function type_id($id, $vehicles_id = null)
    {
        $this->db->from('detail_product');
        if ($id != null) {
            $this->db->where('type_id', $id);
        }
        $this->db->order_by('vehicles_id', $vehicles_id);

        $query = $this->db->get();
        return $query;
    }
    public function get($id = null)
    {
        $this->db->from('detail_product');
        $this->db->join('type', 'type.type_id = detail_product.type_id');
        if ($id != null) {
            $this->db->where('vehicles_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_row($id = null)
    {
        $this->db->from('detail_product');
        if ($id != null) {
            $this->db->where('detail_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {

        $params = [
            'vehicles_id' => htmlspecialchars($post['vehicles_id'], true),
            'type_id' => htmlspecialchars($post['type_id'], true),
            'category_id' => htmlspecialchars($post['category_id'], true),
            'product_cc' => htmlspecialchars($post['product_cc'], true),
            'seat_product' => htmlspecialchars($post['seat_product'], true),
            'price' => htmlspecialchars($post['price'], true),
            'mesin' => $post['mesin'],
            'transmisi' => $post['transmisi'],
            'exterior' => $post['exterior'],
            'interior' => $post['interior'],
            'dimensi' => $post['dimensi'],
            'kenyamanan' => $post['kenyamanan'],
            'sasis' => $post['sasis'],
            'rem' => $post['rem'],
            'suspensi' => $post['suspensi'],
            'warna' => $post['warna'],
            // 'user_id' => $this->session->userdata('user_id'),
        ];
        if ($post['foto_detail'] != null) {
            $params['foto_detail'] = $post['foto_detail'];
        }

        $this->db->insert('detail_product', $params);
    }
    public function edit($post)
    {
        $params = [
            'vehicles_id' => html_escape($post['vehicles_id'], true),
            'type_id' => html_escape($post['type_id'], true),
            'category_id' => html_escape($post['category_id'], true),
            'product_cc' => html_escape($post['product_cc'], true),
            'seat_product' => html_escape($post['seat_product'], true),
            'price' => html_escape($post['price'], true),
            'mesin' => $post['mesin'],
            'transmisi' => $post['transmisi'],
            'exterior' => $post['exterior'],
            'interior' => $post['interior'],
            'dimensi' => $post['dimensi'],
            'kenyamanan' => $post['kenyamanan'],
            'sasis' => $post['sasis'],
            'rem' => $post['rem'],
            'suspensi' => $post['suspensi'],
            'warna' => $post['warna'],
            // 'user_id' => $this->session->userdata('user_id'),
        ];
        if ($post['foto_detail'] != null) {
            $params['foto_detail'] = $post['foto_detail'];
        }
        $this->db->where('detail_id', $post['detail_id']);
        $this->db->update('detail_product', $params);
    }

    public function del($id)
    {
        $this->db->where('detail_id', $id);
        $this->db->delete('detail_product');
    }
    // Spesifikasi
    var $column_order_detail_product = array(null, 'Vehicles','price', 'Category', 'type_nama', 'foto_detail', 'judul'); //set column field database for datatable orderable
    var $column_search_detail_product = array('Vehicles', 'type_nama'); //set column field database for datatable searchable
    var $order_detail_product = array('detail_id' => 'desc'); // default order 

    private function _get_detail_product_query()
    {
        $this->db->select('detail_product.detail_id,detail_product.foto_detail, vehicles.nama as Vehicles, category.nama as Category, detail_product.price , type.type_nama');
        $this->db->from('detail_product');
        $this->db->join('vehicles', 'vehicles.vehicles_id = detail_product.vehicles_id');
        $this->db->join('category', 'category.category_id = detail_product.category_id');
        $this->db->join('type', 'type.type_id = detail_product.type_id');
        $i = 0;
        foreach ($this->column_search_detail_product as $detail_product) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($detail_product, $_POST['search']['value']);
                } else {
                    $this->db->or_like($detail_product, $_POST['search']['value']);
                }
                if (count($this->column_search_detail_product) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_detail_product[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_detail_product = $this->order;
            $this->db->order_by(key($order_detail_product), $order_detail_product[key($order_detail_product)]);
        }
    }
    function get_datatables_detail_product()
    {
        $this->_get_detail_product_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_detail_product()
    {
        $this->_get_detail_product_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_detail_product()
    {
        $this->db->from('detail_product');
        return $this->db->count_all_results();
    }
}
