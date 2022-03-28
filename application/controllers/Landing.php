<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['User_m', 'Portfolio_m', 'Dashboard_m', 'Category_m', 'Vehicles_m', 'Details_m']);
    }

    public function index()
    {
        $data['judul'] = "Jasa Renovasi bangunan dan Rumah";

        $data['category'] = $this->Category_m->get()->result();
        $data['promo'] = $this->Dashboard_m->get_promo_status()->result();
        $data['banner'] = $this->Dashboard_m->get_banner_status()->result();
        $this->template->load('landing/landing', 'landing/l_home/v_home', $data);
    }
    public function booking_service()
    {
        $data['judul'] = "Booking Service";
        $data['mobil'] = $this->Vehicles_m->get();
        $this->template->load('landing/landing', 'landing/l_booking/v_booking', $data);
    }
    function get_product_type()
    {
        if ($this->input->post('product_id')) {
            echo $this->Vehicles_m->fetch_vehicles($this->input->post('product_id'));
        }
    }
    public function test_drive()
    {
        $data['judul'] = "Test Drive";
        $data['mobil'] = $this->Vehicles_m->get();
        $this->template->load('landing/landing', 'landing/l_test_drive/v_test', $data);
    }
    public function customer_gallery()
    {
        $data['judul'] = "Customer Gallery";
        $data['gallery'] = $this->Portfolio_m->get()->result();
        $this->template->load('landing/landing', 'landing/l_gallery/v_gallery', $data);
    }
    public function price_list()
    {
        $data['judul'] = "Price List Update";

        $this->template->load('landing/landing', 'landing/l_price/v_price', $data);
    }
    public function promo_toyota()
    {
        $data['judul'] = "Promo Toyota";
        $data['promo'] = $this->Dashboard_m->get_promo_status()->result();
        $this->template->load('landing/landing', 'landing/l_promo/v_promo', $data);
    }
    public function product_toyota()
    {
        $data['judul'] = "Toyota Vehicles";
        $data['category'] = $this->Category_m->get();
        $this->template->load('landing/landing', 'landing/l_vehicles/v_vehicles', $data);
    }
    public function konsultasi_pembelian()
    {
        $data['judul'] = "Konsultasi Pembelian";
        $data['mobil'] = $this->Vehicles_m->get();
        $this->template->load('landing/landing', 'landing/l_pembelian/v_pembelian', $data);
    }
    function fetch_data_vehicles()
    {
        //set hear pagination and filter 
        sleep(1);
        $category = $this->input->post('category');
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->Vehicles_m->count_all($category);
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination" id="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a class='page-link' href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'product_list'   => $this->Vehicles_m->fetch_data($config["per_page"], $start, $category)
        );
        //all value send in json 
        echo json_encode($output);
    }

    function fetch_data_promo()
    {
        //set hear pagination and filter 
        sleep(1);
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->Dashboard_m->count_all_promo();
        $config['per_page'] = 9;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination" id="pagination_link_promo">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a class='page-link' href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link_promo'  => $this->pagination->create_links(),
            'promo_list'   => $this->Dashboard_m->fetch_promo($config["per_page"], $start)
        );
        //all value send in json 
        echo json_encode($output);
    }

    function fetch_search()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Vehicles_m->fetch_data_search($query);
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
        echo $output;
    }

    function vehicles_model()
    {
        $output = '';
        $id = $this->input->post('id');
        $query =  $this->Category_m->get_id_kenama($id);
        if ($query->num_rows() > 0) {
            $model = $query->row();
            $print = $model->nama;
        }
        $data = $this->Vehicles_m->get_join($id);
        $output .= '
        <div data-tab-content="' . $print . '">
        <div class="vehicles-grid">

        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <div class="car-wrap">
                    <div class="car-image">
                                <img src="' . base_url() . 'uploads/vehicles/' . $row->foto . '" alt="" class="img-fluid">
                    </div>
                    <div class="car-content">
                                <h4>' . $row->nama . '</h4>
                                <small>Starting at</small>
                                <h4>' . $row->harga . '</h4>
                                <hr>
                            <a href="' . site_url('vehicle-spesification/' . strtolower($row->slug)) . '" class="car-link">
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
        $output .= '</div></div>';
        echo $output;
    }


    // public function portfolio()
    // {
    //     $data['judul'] = "Portfolio";
    //     $data['profilweb'] = $this->Kelengkapan_m->get_profilweb()->row();
    //     $data['service'] = $this->Service_m->get()->result();
    //     $data['port'] = $this->Portfolio_m->get_join()->result();
    //     $this->template->load('landing/landing', 'landing/l_portfolio/v_portfolio', $data);
    // }
    public function detail_product($slug)
    {
        $query = $this->Vehicles_m->get_baca($slug);

        if ($query->num_rows() > 0) {
            $vehicles = $query->row();
            $judul =  ucfirst($vehicles->nama);
            $id = $vehicles->vehicles_id;
            $vehicles_id = $this->Details_m->get($id);
            $terkait = $vehicles->category_id;
            $category_id = $this->Vehicles_m->get_join($terkait);
            $data = array(
                'judul' => $judul,
                'page' => $vehicles,
                'vehicles' => $vehicles_id,
                'terkait_id' => $category_id,
            );
            $this->template->load('landing/landing', 'landing/l_detail/v_detail', $data);
        } else {
            $this->session->set_flashdata('error', "Services $slug tidak ditemukan");
            echo "<script>window.location='" . base_url() . "';</script>";
        }
    }
    public function data_specification()

    {
        $output = '';
        $id = $this->input->post('type_id');
        $vehicles_id = $this->input->post('vehicles_id');
        $data = $this->Details_m->type_id($id, $vehicles_id);
        if ($data->num_rows() > 0) {
            $row = $data->row();
            $output .= '
                <dt>Mesin</dt>
                                    <dd>
                                        ' . $row->mesin . '
                                    </dd>
                                    <dt>Transmisi</dt>
                                    <dd>
                                    ' . $row->transmisi . '
                                    </dd>
                                    <dt>Exterior</dt>
                                    <dd>
                                    ' . $row->exterior . '
                                    </dd>
                                    <dt>Interior</dt>
                                    <dd>
                                    ' . $row->interior . '
                                    </dd>
                                    <dt>Dimensi</dt>
                                    <dd>
                                    ' . $row->dimensi . '
                                    </dd>
                                    <dt>Kenyamanan dan Keselamatan</dt>
                                    <dd>
                                    ' . $row->kenyamanan . '
                                    </dd>
                                    <dt>Sasis</dt>
                                    <dd>
                                    ' . $row->sasis . '
                                    </dd>
                                    <dt>Rem</dt>
                                    <dd>
                                    ' . $row->rem . '
                                    </dd>
                                    <dt>Suspensi</dt>
                                    <dd>
                                    ' . $row->suspensi . '
                                    </dd>
                                    <dt>Warna</dt>
                                    <dd>
                                    ' . $row->warna . '
                                    </dd>
                ';
        } else {
            $output = '';
        }

        echo $output;
    }
    public function harga_type()

    {
        $output = '';
        $id = $this->input->post('type_id');
        $vehicles_id = $this->input->post('vehicles_id');
        $data = $this->Details_m->type_id($id, $vehicles_id);
        if ($data->num_rows() > 0) {
            $row = $data->row();
            $output .= '
            <img src="' . base_url('uploads/vehicle-detail/' . $row->foto_detail) . '" alt="" title="<?= $page->nama ?>" class="img-fluid">
            <h4>' . $row->price . '</h4>

                ';
        }
        echo $output;
    }
}
