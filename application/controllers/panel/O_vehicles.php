<?php
defined('BASEPATH') or exit('No direct script access allowed');

class O_vehicles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Vehicles_m', 'Category_m', 'Details_m']);
    }
    public function index()
    {
        $data['judul'] = "Toyota Vehicles";
        $this->template->load('template', 'panel/p_vehicles/v_vehicles', $data);
    }
    public function add()
    {

        $vehicles = new stdClass();
        $vehicles->vehicles_id = null;
        $vehicles->category_id = null;
        $vehicles->category = null;
        $vehicles->nama = null;
        $vehicles->slug = null;
        $vehicles->foto = null;
        $vehicles->harga = null;

        $vehicles->status = null;

        $category = $this->Category_m->get();
        $data = array(
            'judul' => 'Toyota Vehicles Add',
            'page' => 'add',
            'row' => $vehicles,
            'category' => $category,
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->template->load('template', 'panel/p_vehicles/form_vehicles', $data);
    }

    public function edit($id)
    {
        $query = $this->Vehicles_m->get($id);
        if ($query->num_rows() > 0) {
            $vehicles = $query->row();
            $category = $this->Category_m->get();
            $data = array(
                'judul' => 'Toyota Vehicles Edit',
                'page' => 'edit',
                'row' => $vehicles,
                'category' => $category,
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()

            );
            $this->template->load('template', 'panel/p_vehicles/form_vehicles', $data);
        } else {
            echo "<script>alert('Data Not Found');</script>";
            echo "<script>window.location='" . site_url('panel/vehicles') . "';</script>";
        }
    }

    public function process()
    {
        cek_csrf();
        $config['upload_path']          = './uploads/vehicles';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1048;
        $config['file_name']             = 'vehicles-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->Vehicles_m->check_nama($post['nama'])->num_rows() >  0) {
                $this->session->set_flashdata('error', "nama $post[nama] sudah terpakai");
                redirect('panel/vehicles/add');
            } else {
                if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                        $post['foto'] = $this->upload->data('file_name');
                        $this->Vehicles_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('message', 'Data berhasil di tambahkan');
                        }
                    } else {
                        $erorr = $this->upload->display_errors();
                        $this->session->set_flashdata('error');
                        redirect('panel/vehicles/add');
                    }
                } else {
                    $post['foto'] = null;
                    $this->Vehicles_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data berhasil di tambahkan');
                    }
                }
                redirect('panel/vehicles');
            }
        } else if (isset($_POST['edit'])) {
            if ($this->Vehicles_m->check_nama($post['id'])->num_rows() >  0) {
                $this->session->set_flashdata('erorr', "nama $post[nama] sudah terpakai");
                redirect('panel/vehicles/edit' . $post['vehicles_id']);
            } else {
                if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                        $vehicles = $this->Vehicles_m->get($post['vehicles_id'])->row();
                        if ($vehicles->foto != null) {
                            $target_file = './uploads/vehicles/' . $vehicles->foto;
                            unlink($target_file);
                        }
                        $post['foto'] = $this->upload->data('file_name');

                        $this->Vehicles_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('message', 'Data berhasil di edit');
                        }
                        redirect('panel/vehicles');
                    } else {
                        $erorr = $this->upload->display_errors();
                        $this->session->set_flashdata('erorr', $erorr);
                        redirect('panel/vehicles/edit');
                    }
                } else {
                    $post['foto'] = null;
                    $this->Vehicles_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data berhasil di edit');
                    }
                    redirect('panel/vehicles');
                }
            }
        }
    }
    public  function del($id)
    {
        $vehicles = $this->Vehicles_m->get($id)->row();
        if ($vehicles->foto != null) {
            $target_file = './uploads/vehicles/' . $vehicles->foto;
            unlink($target_file);
        }
        $this->Vehicles_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data layanan berhasil di hapus');
        }
        redirect('panel/vehicles');
    }
    public function vehicle_detail()
    {
        $data['judul'] = "Toyota Vehicles";
        $this->template->load('template', 'panel/p_detail/v_detail', $data);
    }
    public function add_detail()
    {

        $vehicles = new stdClass();
        $vehicles->detail_id = null;
        $vehicles->foto_detail = null;
        $vehicles->vehicles_id = null;
        $vehicles->type_id = null;
        $vehicles->category_id = null;
        $vehicles->product_cc = null;
        $vehicles->seat_product = null;
        $vehicles->price = null;
        $vehicles->mesin = null;
        $vehicles->transmisi = null;
        $vehicles->exterior = null;
        $vehicles->interior = null;
        $vehicles->dimensi = null;
        $vehicles->kenyamanan = null;
        $vehicles->sasis = null;
        $vehicles->rem = null;
        $vehicles->suspensi = null;
        $vehicles->warna = null;
        $vehicles->status = null;

        $category = $this->Category_m->get();
        $type = $this->Category_m->get_type();
        $model = $this->Vehicles_m->get();
        $data = array(
            'judul' => 'Toyota Vehicles Add',
            'page' => 'add',
            'row' => $vehicles,
            'category' => $category,
            'type' => $type,
            'model' => $model,
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->template->load('template', 'panel/p_detail/form_detail', $data);
    }

    public function edit_detail($id)
    {
        $query = $this->Vehicles_m->get_detail($id);
        if ($query->num_rows() > 0) {
            $detail = $query->row();
            $nama = $detail->vehicles_id;
            $model =  $this->db->get_where('vehicles', ['vehicles_id' => $nama])->row();

            $type = $this->Category_m->get_type();
            $data = array(
                'judul' => 'Toyota Vehicles Edit',
                'page' => 'edit',
                'row' => $detail,
                'model' => $model,
                'type' => $type,
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()

            );
            $this->template->load('template', 'panel/p_detail/edit_detail', $data);
        } else {
            echo "<script>alert('Data Not Found');</script>";
            echo "<script>window.location='" . site_url('panel/vehicle-detail') . "';</script>";
        }
    }

    public function process_detail()
    {
        cek_csrf();
        $config['upload_path']          = './uploads/vehicle-detail';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1048;
        $config['file_name']             = 'vehicles-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {

            if (@$_FILES['foto_detail']['name'] != null) {
                if ($this->upload->do_upload('foto_detail')) {
                    $post['foto_detail'] = $this->upload->data('file_name');
                    $this->Details_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data berhasil di tambahkan');
                    }
                } else {
                    $erorr = $this->upload->display_errors();
                    $this->session->set_flashdata('error');
                    redirect('panel/vehicle-detail/add');
                }
            } else {
                $post['foto_detail'] = null;
                $this->Details_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', 'Data berhasil di tambahkan');
                }
            }
            redirect('panel/vehicle-detail');
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['foto_detail']['name'] != null) {
                if ($this->upload->do_upload('foto_detail')) {
                    $detail = $this->Details_m->get_row($post['detail_id'])->row();
                    if ($detail->foto_detail != null) {
                        $target_file = './uploads/vehicle-detail/' . $detail->foto_detail;
                        unlink($target_file);
                    }
                    $post['foto_detail'] = $this->upload->data('file_name');

                    $this->Details_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data berhasil di edit');
                    }
                    redirect('panel/vehicle-detail');
                } else {
                    $erorr = $this->upload->display_errors();
                    $this->session->set_flashdata('erorr', $erorr);
                    redirect('panel/vehicle-detail/edit');
                }
            } else {
                $post['foto_detail'] = null;
                $this->Details_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', 'Data berhasil di edit');
                }
            }
            redirect('panel/vehicle-detail');
        }
    }
    public  function del_detail($id)
    {
        $detail = $this->Details_m->get_row($id)->row();
        if ($detail->foto_detail != null) {
            $target_file = './uploads/detail/' . $detail->foto_detail;
            unlink($target_file);
        }
        $this->Details_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data layanan berhasil di hapus');
        }
        redirect('panel/vehicle-detail');
    }


    function get_category_id()
    {
        if ($this->input->post('vehicles_id')) {
            echo $this->Vehicles_m->fetch_category_id($this->input->post('vehicles_id'));
        }
    }
}
