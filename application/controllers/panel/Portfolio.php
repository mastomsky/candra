<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Portfolio_m');
    }
    public function portfolio_data()
    {
        $data['judul'] = "Portfolio";
        $this->template->load('template', 'panel/p_portfolio/v_portfolio', $data);
    }
    public function add()
    {

        $portfolio = new stdClass();
        $portfolio->portfolio_id = null;
        $portfolio->service_id = null;
        $portfolio->judul = null;
        $portfolio->foto = null;

        $data = array(
            'judul' => 'Portfolio Add',
            'page' => 'add',
            'row' => $portfolio,
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->template->load('template', 'panel/p_portfolio/form_portfolio', $data);
    }

    public function edit($id = null)
    {
        $query = $this->Portfolio_m->get_join($id);
        if ($query->num_rows() > 0) {
            $portfolio = $query->row();

            $data = array(
                'judul' => 'Our Partner Edit',
                'page' => 'edit',
                'row' => $portfolio,
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->template->load('template', 'panel/p_portfolio/form_portfolio', $data);
        } else {
            $this->session->set_flashdata('erorr');
            redirect('portfolio/edit');
        }
    }
    public function process()
    {
        cek_csrf();
        $config['upload_path']          = './uploads/portfolio';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1048;
        $config['file_name']             = 'portfolio-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');

                    $this->Portfolio_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', '
                            Data portfolio berhasil di tambahkan!');
                    }
                } else {
                    $erorr = $this->upload->display_errors();
                    $this->session->set_flashdata('erorr');
                    redirect('panel/feature/add');
                }
            } else {
                $post['foto'] = null;
                $this->Portfolio_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '
                        Data portfolio berhasil di tambahkan!');
                }
            }
            redirect('panel/portfolio');
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $portfolio = $this->Portfolio_m->get($post['portfolio_id'])->row();
                    if ($portfolio->foto != null) {
                        $target_file = './uploads/portfolio/' . $portfolio->foto;
                        unlink($target_file);
                    }
                    $post['foto'] = $this->upload->data('file_name');

                    $this->Portfolio_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data portfolio berhasil di edit');
                    }
                    redirect('panel/portfolio');
                } else {
                    $erorr = $this->upload->display_errors();
                    $this->session->set_flashdata('erorr', $erorr);
                    redirect('panel/feature/edit');
                }
            } else {
                $post['foto'] = null;
                $this->Portfolio_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', 'Data portfolio berhasil di edit');
                }
                redirect('panel/portfolio');
            }
        }
    }
    public  function del($id)
    {
        $portfolio = $this->Portfolio_m->get($id)->row();
        if ($portfolio->foto != null) {
            $target_file = './uploads/portfolio/' . $portfolio->foto;
            unlink($target_file);
        }
        $this->Portfolio_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data berhasil di hapus');
        }
        redirect('panel/portfolio');
    }
}
