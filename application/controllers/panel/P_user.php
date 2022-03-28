<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('User_m');
    }

    public function user_data()
    {

        $data['judul'] = "Data user";

        $this->template->load('template', 'panel/p_user/v_user', $data);
    }

    public function add()
    {

        $user = new stdClass();
        $user->user_id = null;
        $user->nama = null;
        $user->jk = null;
        $user->telpon = null;
        $user->email = null;
        $user->password = null;
        $user->foto = null;
        $user->jabatan = null;
        $user->status = null;
        $user->alamat = null;


        // $query_level = $this->level_m->get();

        // $query_korwil = $this->korwil_m->get();
        // $korwil['null'] = '- Pilih -';
        // foreach ($query_korwil->result() as $unt) {
        //     $korwil[$unt->korwil_id] = $unt->nama;
        // }
        $data = array(
            'judul' => 'User Add',
            'page' => 'add',
            'row' => $user,
            // 'level' => $query_level,
            // 'korwil' => $korwil, 'selectedkorwil' => null,
        );
        $this->template->load('template', 'panel/p_user/form_user', $data);
    }

    public function edit($id = null)
    {
        $query = $this->User_m->get($id);
        if ($query->num_rows() > 0) {
            $user = $query->row();
            // $query_level = $this->level_m->get();

            // $query_korwil = $this->korwil_m->get();
            // $korwil['null'] = '- Pilih -';
            // foreach ($query_korwil->result() as $unt) {
            //     $korwil[$unt->korwil_id] = $unt->nama;
            // }
            $data = array(
                'judul' => 'Edit user',
                'page' => 'edit',
                'row' => $user,
                // 'level' => $query_level,
                // 'korwil' => $korwil, 'selectedkorwil' => $user->korwil_id,
            );
            $this->template->load('template', 'panel/p_user/form_user', $data);
        } else {
            $this->session->set_flashdata('erorr');
            redirect('panel/user/edit');
        }
    }

    public function process()
    {
        $config['upload_path']          = './uploads/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1048;
        $config['file_name']             = 'user-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->User_m->check_email($post['email'])->num_rows() >  0) {
                $this->session->set_flashdata('erorr', "email $post[email] sudah terpakai");

                redirect('panel/user/add');
            } else {
                if (@$_FILES['foto']['name'] != null) {

                    if ($this->upload->do_upload('foto')) {
                        $post['foto'] = $this->upload->data('file_name');


                        $this->User_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('message', 'Data berhasil di simpan');
                        }
                    } else {
                        $erorr = $this->upload->display_errors();
                        $this->session->set_flashdata('erorr');
                        redirect('panel/user/add');
                    }
                } else {
                    $post['foto'] = null;
                    $this->User_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data berhasil di simpan');
                    }
                }
                redirect('panel/user');
            }
        } else if (isset($_POST['edit'])) {
            if ($this->User_m->check_email($post['user_id'])->num_rows() >  0) {
                $this->session->set_flashdata('erorr', "email $post[email] Sudah terpakai");
                redirect('panel/user/edit/' . encrypt_url($post['user_id']));
            } else {
                if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                        $user = $this->User_m->get($post['user_id'])->row();
                        if ($user->foto != null) {
                            $target_file = './uploads/user/' . $user->foto;
                            unlink($target_file);
                        }
                        $post['foto'] = $this->upload->data('file_name');

                        $this->User_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('message', 'Data berhasil di simpan');
                        }
                        redirect('panel/user');
                    } else {
                        $erorr = $this->upload->display_errors();
                        $this->session->set_flashdata('erorr', $erorr);
                        redirect('panel/user/edit');
                    }
                } else {
                    $post['foto'] = null;
                    $this->User_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', 'Data berhasil di simpan');
                    }
                    redirect('panel/user');
                }
            }
        }
    }



    public  function del($id)
    {

        $user = $this->User_m->get($id)->row();
        if ($user->foto != null) {
            $target_file = './uploads/user/' . $user->foto;
            unlink($target_file);
        }
        $this->User_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Data berhasil di hapus');
        }
        redirect('panel/user');
    }

    public function detail($id)
    {

        $data['row'] = $this->User_m->getAll($id);
        $this->template->load('template', 'user/user_detail', $data);
    }
}
