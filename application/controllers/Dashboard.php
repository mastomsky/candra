<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['Dashboard_m', 'User_m', 'Vehicles_m']);
	}
	function index()
	{
		$judul = "Dashboard";
		// $vehicle = $this->Vehicles_m->count_all_vehicles();
		// $user = $this->User_m->count_all();
		// $inbox = $this->Inbox_m->count_all_inbox();
		// $promo = $this->Dashboard_m->get_promo()->result();
		$data = [
			'judul' => $judul,
			// 'vehicle' => $vehicle,
			// 'user' => $user,
			// 'inbox' => $inbox,
			// 'blog' => $blog,
		];

		$this->template->load('template', 'dashboard/dashboard', $data);
	}

	public function banner_add()
	{

		$ban = new stdClass();
		$ban->ban_id = null;
		$ban->foto = null;
		$ban->status = null;
		$data = array(
			'page' => 'add',
			'judul' => 'Banner Add',
			'row' => $ban
		);
		$this->template->load('template', 'dashboard/form_banner', $data);
	}
	public function banner_edit($id)
	{
		$query = $this->Dashboard_m->get_banner($id);
		if ($query->num_rows() > 0) {
			$banner = $query->row();
			$data = array(
				'judul' => 'Banner Carousel Edit',
				'page' => 'edit',
				'row' => $banner
			);
			$this->template->load('template', 'dashboard/form_banner', $data);
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='" . site_url('panel/dashboard') . "';</script>";
		}
	}
	public function banner_process()
	{
		cek_csrf();
		$config['upload_path']          = './uploads/banner';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1048;
		$config['file_name']             = 'banner-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if (@$_FILES['foto']['name'] != null) {
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
					$this->Dashboard_m->banner_add($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', 'Banner berhasil di tambahkan');
					}
				} else {
					$erorr = $this->upload->display_errors();
					$this->session->set_flashdata('error');
					redirect('panel/banner/add');
				}
			} else {
				$post['foto'] = null;
				$this->Dashboard_m->banner_add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', 'Banner berhasil di tambahkan');
				}
			}
			redirect('panel/dashboard');
		} else if (isset($_POST['edit'])) {
			if (@$_FILES['foto']['name'] != null) {
				if ($this->upload->do_upload('foto')) {
					$banner = $this->Dashboard_m->get_banner($post['banner_id'])->row();
					if ($banner->foto != null) {
						$target_file = './uploads/banner/' . $banner->foto;
						unlink($target_file);
					}
					$post['foto'] = $this->upload->data('file_name');

					$this->Dashboard_m->banner_edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', 'Banner berhasil di edit');
					}
					redirect('panel/dashboard');
				} else {
					$erorr = $this->upload->display_errors();
					$this->session->set_flashdata('erorr', $erorr);
					redirect('panel/banner/edit');
				}
			} else {
				$post['foto'] = null;
				$this->Dashboard_m->banner_edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', 'Banner berhasil di edit');
				}
				redirect('panel/dashboard');
			}
		}
	}
	public function promo_add()
	{

		$ban = new stdClass();
		$ban->promo_id = null;
		$ban->foto = null;
		$ban->keterangan = null;
		$ban->status = null;
		$data = array(
			'page' => 'add',
			'judul' => 'Promo Add',
			'row' => $ban
		);
		$this->template->load('template', 'dashboard/form_promo', $data);
	}
	public function promo_edit($id)
	{
		$query = $this->Dashboard_m->get_promo($id);
		if ($query->num_rows() > 0) {
			$promo = $query->row();
			$data = array(
				'judul' => 'Promo Carousel Edit',
				'page' => 'edit',
				'row' => $promo
			);
			$this->template->load('template', 'dashboard/form_promo', $data);
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='" . site_url('panel/dashboard') . "';</script>";
		}
	}
	public function promo_process()
	{
		cek_csrf();
		$config['upload_path']          = './uploads/promo';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1048;
		$config['file_name']             = 'promo-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if (@$_FILES['foto']['name'] != null) {
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
					$this->Dashboard_m->promo_add($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', 'promo berhasil di tambahkan');
					}
				} else {
					$erorr = $this->upload->display_errors();
					$this->session->set_flashdata('error');
					redirect('panel/promo/add');
				}
			} else {
				$post['foto'] = null;
				$this->Dashboard_m->promo_add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', 'promo berhasil di tambahkan');
				}
			}
			redirect('panel/dashboard');
		} else if (isset($_POST['edit'])) {
			if (@$_FILES['foto']['name'] != null) {
				if ($this->upload->do_upload('foto')) {
					$promo = $this->Dashboard_m->get_promo($post['promo_id'])->row();
					if ($promo->foto != null) {
						$target_file = './uploads/promo/' . $promo->foto;
						unlink($target_file);
					}
					$post['foto'] = $this->upload->data('file_name');

					$this->Dashboard_m->promo_edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', 'promo berhasil di edit');
					}
					redirect('panel/dashboard');
				} else {
					$erorr = $this->upload->display_errors();
					$this->session->set_flashdata('erorr', $erorr);
					redirect('panel/promo/edit');
				}
			} else {
				$post['foto'] = null;
				$this->Dashboard_m->promo_edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', 'promo berhasil di edit');
				}
				redirect('panel/dashboard');
			}
		}
	}
	// public function setting()
	// {
	// 	$query = $this->Kelengkapan_m->get_profilweb();
	// 	if ($query->num_rows() > 0) {
	// 		$halaman = $query->row();

	// 		$data = array(
	// 			'judul' => 'Our halaman Edit',
	// 			'page' => 'edit',
	// 			'row' => $halaman
	// 		);
	// 		$this->template->load('template', 'panel/setting/form_setting', $data);
	// 	} else {
	// 		echo "<script>alert('Data Not Found');</script>";
	// 		echo "<script>window.location='" . site_url('panel/halaman') . "';</script>";
	// 	}
	// }
	// public function process()
	// {
	// 	$post = $this->input->post(null, TRUE);

	// 	if (isset($_POST['edit'])) {
	// 		$this->Kelengkapan_m->edit_web($post);
	// 	}

	// 	if ($this->db->affected_rows() > 0) {
	// 		$this->session->set_flashdata('message', 'Data Berhasil di ubah');
	// 	}
	// 	redirect('panel/halaman');
	// }

	public function profile_data()
	{
		$this->load->library('form_validation');
		$data['judul'] = "Profile user";
		$data['user'] = $this->db->get_where('user', ['email' => $this->fungsi->user_login()->email])->row_array();

		$this->form_validation->set_rules('passlama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('passnew', 'Password Baru', 'required|trim|min_length[5]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|trim|min_length[5]|matches[passnew]');
		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'panel/setting/profile_data', $data);
		} else {
			$passwordlama = $this->input->post('passlama');
			$passnew = $this->input->post('passnew');
			if (!password_verify($passwordlama, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!
	        </div>');
				redirect('panel/profile');
			} else {
				if ($passwordlama == $passnew) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Salah Dengan Yang Lama!
	                </div>');

					redirect('panel/profile');
				} else {
					$password_hash = password_hash($passnew, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', 'Paswword Berhasil Di Ubah!
	                ');
					$this->_logout();
				}
			}
		}
	}
	private function _logout()
	{
		$params = array('user_id', 'jabatan', 'email');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', 'Password Berhasil Di Ubah , Silahkan Login Kembali!');
		redirect('panel/login');
	}
}
