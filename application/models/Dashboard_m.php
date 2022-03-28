<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    var $column_order = array(null, 'status', 'foto'); //set column field database for datatable orderable
    var $column_search = array('status'); //set column field database for datatable searchable
    var $order = array('ban_id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('banner');
        $i = 0;
        foreach ($this->column_search as $blog) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // name loop
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
        $this->db->from('banner');
        return $this->db->count_all_results();
    }


    public function get_banner_status()
    {
        $this->db->from('banner');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query;
    }
    public function get_banner($id = null)
    {
        $this->db->from('banner');
        if ($id != null) {
            $this->db->where('ban_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function banner_add($post)
    {
        $params['ban_id'] = $post['ban_id'];
        $params['status'] = $post['status'];
        $params['foto'] = $post['foto'];
        $this->db->insert('banner', $params);
    }

    public function banner_edit($post)
    {
        $params['ban_id'] = $post['ban_id'];
        $params['status'] = $post['status'];
        if (!empty($post['foto'])) {
            $params['foto'] = $post['foto'];
        }
        $this->db->where('ban_id', $post['ban_id']);
        $this->db->update('banner', $params);
    }

    public function banner_del($id)
    {
        $this->db->where('ban_id', $id);
        $this->db->delete('banner');
    }

    // Promo Toyota
    public function get_promo_status()
    {
        $this->db->from('promo');
        $this->db->where('status', 1);
        $this->db->limit(3);
        $query = $this->db->get();
        return $query;
    }
    public function get_promo($id = null)
    {
        $this->db->from('promo');
        if ($id != null) {
            $this->db->where('promo_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function promo_add($post)
    {
        $params['promo_id'] = $post['promo_id'];
        $params['keterangan'] = $post['keterangan'];
        $params['status'] = $post['status'];
        $params['foto'] = $post['foto'];
        $this->db->insert('promo', $params);
    }

    public function promo_edit($post)
    {
        $params['promo_id'] = $post['promo_id'];
        $params['keterangan'] = $post['keterangan'];
        $params['status'] = html_escape($post['status']);
        if (!empty($post['foto'])) {
            $params['foto'] = $post['foto'];
        }
        $this->db->where('promo_id', $post['promo_id']);
        $this->db->update('promo', $params);
    }

    public function promo_del($id)
    {
        $this->db->where('promo_id', $id);
        $this->db->delete('promo');
    }

    function make_query()
    {
        $query = "
  SELECT * FROM promo 
  WHERE status = '1' 
  ";

        return $query;
    }

    function count_all_promo()
    {
        $query = $this->make_query();
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    function fetch_promo($limit, $start)
    {
        $query = $this->make_query();

        $query .= ' LIMIT ' . $start . ', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $output .= '
                             
                <div class="col-md-4">
                <div class="blog-card blog-card-blog">
                    <div class="blog-card-image">
                        <a href="#"> <img class="img" src="' . base_url('uploads/promo/' . $row['foto']) . '"> </a>
                        <div class="ripple-cont"></div>
                    </div>
                    <div class="blog-table">
                        <div class="row blog-category">
                            <h6 class="blog-text-success float-right"><i class="far fa-newspaper"></i>'.indo_date($row['created']).'</h6>
                        </div>

                        <p class="blog-card-description">' . $row['keterangan'] . '</p>
                        <div class="ftr">
                            <div class="author">
                                <a href="https://api.whatsapp.com/send?phone=6281357199161 "> <span class="fa fa-whatsapp ">&nbsp;</span>Info Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    ';
            }
        } else {
            $output = '<h3 class="text-center">Vehicle Not Found</h3>';
        }
        return $output;
    }
}
