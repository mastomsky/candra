<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicles_m extends CI_Model
{

    // vehicles
    var $column_order_vehicles = array(null, 'nama', 'harga',  'category_nama', 'foto'); //set column field database for datatable orderable
    var $column_search_vehicles = array('vehicles.nama', 'category'); //set column field database for datatable searchable
    var $order_vehicles = array('vehicles_id' => 'desc'); // default order 

    private function _get_vehicles_query()
    {
        $this->db->select('vehicles.vehicles_id,vehicles.category, vehicles.nama,vehicles.harga,vehicles.foto, category.nama as category_nama ');
        $this->db->from('vehicles');
        $this->db->join('category', 'category.category_id = vehicles.category', 'left');
        $i = 0;
        foreach ($this->column_search_vehicles as $vehicles) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($vehicles, $_POST['search']['value']);
                } else {
                    $this->db->or_like($vehicles, $_POST['search']['value']);
                }
                if (count($this->column_search_vehicles) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_vehicles[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_vehicles = $this->order;
            $this->db->order_by(key($order_vehicles), $order_vehicles[key($order_vehicles)]);
        }
    }
    function get_datatables_vehicles()
    {
        $this->_get_vehicles_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_vehicles()
    {
        $this->_get_vehicles_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_vehicles()
    {
        $this->db->from('vehicles');
        return $this->db->count_all_results();
    }

    public function get($id = null)
    {
        $this->db->from('vehicles');
        if ($id != null) {
            $this->db->where('vehicles_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_detail($id = null)
    {
        $this->db->from('detail_product');
        if ($id != null) {
            $this->db->where('detail_id', $id);
        }

        $query = $this->db->get();
        return $query;
    }
    public function get_join($id = null)
    {
        $this->db->from('vehicles');
        if ($id != null) {
            $this->db->where('category', $id);
        }

        $query = $this->db->get();
        return $query;
    }
    public function get_category($terkait)
    {
        $this->db->select('*')->from('vehicles')->where('category', $terkait);
        $query = $this->db->get();

        return $query;
    }
    public function get_baca($slug)
    {
        $this->db->select('detail_product.detail_id,detail_product.vehicles_id,detail_product.category_id,detail_product.type_id, vehicles.nama ,vehicles.foto ,detail_product.foto_detail,vehicles.harga ,detail_product.product_cc ,detail_product.seat_product, category.nama as nama_category,type.type_nama');
        $this->db->join('vehicles', 'vehicles.vehicles_id = detail_product.vehicles_id');
        $this->db->join('category', 'category.category_id = detail_product.category_id', 'left');
        $this->db->join('type', 'type.type_id = detail_product.type_id', 'left');

        if ($slug != null) {
            $this->db->where('vehicles.slug', $slug);
        }
        $query = $this->db->get('detail_product');
        return $query;
    }

    public function add($post)
    {
        $name = preg_replace('/\s+/', '-', $post['nama']);
        $patransmisis = [
            'nama' => html_escape($post['nama'], true),
            'slug' => html_escape($name, true),
            'harga' => html_escape($post['harga'], true),
            'category' => html_escape($post['category'], true),
            'harga' => html_escape($post['harga'], true),
            'foto' => html_escape($post['foto'], true),
        ];
        $this->db->insert('vehicles', $patransmisis);
    }

    public function edit($post)
    {
        $name = preg_replace('/\s+/', '-', $post['nama']);
        $patransmisis = [
            'nama' => html_escape($post['nama'], true),
            'slug' => html_escape($name, true),
            'harga' => html_escape($post['harga'], true),
            'category' => html_escape($post['category'], true),
            'harga' => html_escape($post['harga'], true),

            'status' => html_escape($post['status'], true),
        ];
        if ($post['foto'] != null) {
            $patransmisis['foto'] = $post['foto'];
        }
        $this->db->where('vehicles_id', $post['vehicles_id']);
        $this->db->update('vehicles', $patransmisis);
    }

    public function del($id)
    {
        $this->db->where('vehicles_id', $id);
        $this->db->delete('vehicles');
    }


    public function check_nama($code, $id = null)
    {
        $this->db->from('vehicles');
        $this->db->where('nama', $code);
        if ($id = null) {
            $this->db->where('vehicles_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    function fetch_data_search($query)
    {
        $this->db->select("*");
        $this->db->from("vehicles");
        if ($query != '') {
            $this->db->like('nama', $query);
        }
        $this->db->where('status', '1');
        $this->db->order_by('nama', 'DESC');
        $this->db->limit(8);
        return $this->db->get();
    }
    function fetch_filter_type($type)
    {
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('vehicles');
        $this->db->where('status', '1');
        return $this->db->get();
    }

    function make_query($category)
    {
        $query = "
  SELECT * FROM vehicles 
  WHERE status = '1' 
  ";

        //         if (isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price)) {
        //             $query .= "
        //     AND harga BETWEEN '" . $minimum_price . "' AND '" . $maximum_price . "'
        //    ";
        //         }

        if (isset($category)) {
            $category_filter = implode("','", $category);
            $query .= "
    AND category IN('" . $category_filter . "')
   ";
        }

        //         if (isset($transmisi)) {
        //             $transmisi_filter = implode("','", $transmisi);
        //             $query .= "
        //     AND transmisi IN('" . $transmisi_filter . "')
        //    ";
        //         }

        //         if (isset($type)) {
        //             $type_filter = implode("','", $type);
        //             $query .= "
        //     AND type IN('" . $type_filter . "')
        //    ";
        //         }
        return $query;
    }

    function count_all($category)
    {
        $query = $this->make_query($category);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    function fetch_data($limit, $start,  $category)
    {
        $query = $this->make_query($category);

        $query .= ' LIMIT ' . $start . ', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $output .= '
                             
                <div class="car-wrap">
                <div class="car-image">
                            <img src="' . base_url() . 'uploads/vehicles/' . $row['foto'] . '" alt="" class="img-fluid">
                </div>
                <div class="car-content">
                            <h4>' . $row['nama'] . '</h4>
                            <small>Starting at</small>
                            <h4>' . $row['harga'] . '</h4>
                            <hr>
                            <a href="' . site_url('vehicle-spesification/' . strtolower($row['slug'])) . '" class="car-link">
                            Explore
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        <a href="' . site_url('konsultasi-pembelian') . '" class="car-link" target="_blank">
                                Konsultasi Pembelian
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                </div>
            </div>
                    ';
            }
        } else {
            $output = '<h3 class="text-center">Vehicle Not Found</h3>';
        }
        return $output;
    }
    function fetch_vehicles($vehicles_id)
    {
        $this->db->select('detail_product.type_id , type.type_nama');
        $this->db->join('type', 'type.type_id = detail_product.type_id', 'left');
        $this->db->where('vehicles_id', $vehicles_id);
        $this->db->order_by('detail_product.type_id', 'ASC');
        $query = $this->db->get('detail_product');
        $output = '<option hidden="hidden" selected="selected" value="default">Product Type</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->type_id . '">' . $row->type_nama . '</option>';
        }
        return $output;
    }
}
