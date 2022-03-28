<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Category_m');
    }

    public function category_data()
    {

        $data['judul'] = "Vehicle Category";

        $this->template->load('template', 'panel/p_category/v_category', $data);
    }

    public function add()
    {

        $category = new stdClass();
        $category->category_id = null;
        $category->nama = null;
        $data = array(
            'page' => 'add',
            'judul' => 'Category Add',
            'row' => $category
        );
        $this->template->load('template', 'panel/p_category/form_category', $data);
    }

    public function edit($id)
    {
        $query = $this->Category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'judul' => 'Category Edit',

                'row' => $category
            );
            $this->template->load('template', 'panel/p_category/form_category', $data);
        } else {
            echo "<script>alert('Data Not Found');</script>";
            echo "<script>window.location='" . site_url('panel/category') . "';</script>";
        }
    }

    public function process()
    {
        cek_csrf();
        $post = $this->input->post(null, TRUE);

        if (isset($_POST['add'])) {
            $this->Category_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->Category_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
        }
        redirect('panel/category');
    }



    public  function del($id)
    {
        $this->Category_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus');
        }
        redirect('panel/category');
    }
    // SESI Type Product


    public function add_type()
    {

        $type = new stdClass();
        $type->type_id = null;
        $type->type_nama = null;
        $data = array(
            'page' => 'add',
            'judul' => 'Vehicle Type Add',
            'row' => $type
        );
        $this->template->load('template', 'panel/p_type/form_type', $data);
    }

    public function edit_type($id)
    {
        $query = $this->Category_m->get_type($id);
        if ($query->num_rows() > 0) {
            $type = $query->row();
            $data = array(
                'page' => 'edit',
                'judul' => 'Vehicle Type Edit',
                'row' => $type
            );
            $this->template->load('template', 'panel/p_type/form_type', $data);
        } else {
            echo "<script>alert('Data Not Found');</script>";
            echo "<script>window.location='" . site_url('panel/category') . "';</script>";
        }
    }

    public function process_type()
    {
        cek_csrf();
        $post = $this->input->post(null, TRUE);

        if (isset($_POST['add'])) {
            $this->Category_m->add_type($post);
        } else if (isset($_POST['edit'])) {
            $this->Category_m->edit_type($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
        }
        redirect('panel/category');
    }



    public  function del_type($id)
    {
        $this->Category_m->del_type($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus');
        }
        redirect('panel/category');
    }
}
