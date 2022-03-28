<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->library(['form_validation', 'recaptcha']);
      }
      public function login()
      {
            check_already_login();
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                  $data = array(
                        'judul' => 'Masuk ke Panel',
                        'widget' => $this->recaptcha->getWidget(),
                        'script' => $this->recaptcha->getScriptTag(),
                  );

                  $this->load->view('login/login', $data);
            } else {
                  cek_csrf();
                  $this->_login();
            }
      }
      private function _login()
      {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            $recaptcha = $this->input->post('g-recaptcha-response');
            if (!empty($recaptcha)) {
                  $response = $this->recaptcha->verifyResponse($recaptcha);
                  if (isset($response['success']) and $response['success'] === true) {
                        if ($user) { //jika user ada
                              // cek password 
                              if ($user['blokir'] == 1) {
                                    $this->session->set_flashdata('error', 'User anda Terblokir !!, Harap hubungi administrator!');
                                    redirect('panel/admin');
                                    return false;
                              } else {
                                    if ($user['status'] == 1) { // jika usernya aktif
                                          // cek password 
                                          if (password_verify($password, $user['password'])) {
                                                $data = [
                                                      'user_id' => $user['user_id'],
                                                      'role_id' => $user['role_id'],
                                                      'email' => $user['email'],

                                                ];
                                                $this->session->set_userdata($data);
                                                $this->db->set('salah_password', '0', false)->where('email', $user['email'])->update('user');
                                                $this->session->set_flashdata('message', 'Selamat Datang ' . $this->fungsi->user_login()->nama . '');

                                                redirect('panel/dashboard');
                                          } else {
                                                if ($user['salah_password'] == 2) {
                                                      $this->db->where('email', $user['email'])->update('user', ['blokir' => '1']);
                                                }
                                                $this->db->set('salah_password', 'salah_password + 1', false)->where('email', $user['email'])->update('user');
                                                $sisa_kesempatan = 2 - $user['salah_password'];

                                                if ($user['salah_password'] == 2) {
                                                      $this->session->set_flashdata('error', 'User anda Terblokir !!, Harap hubungi administrator!');
                                                } else {

                                                      $this->session->set_flashdata('error', 'Password Salah, sisa ' . $sisa_kesempatan . ' kesempatan, Silahkan coba lagi!');
                                                }
                                                redirect('panel/admin');
                                          }
                                    } else {
                                          $this->session->set_flashdata('error', 'Akun Anda Belum Aktif! Silahkan Hubungi Admin');
                                          redirect('panel/admin');
                                    }
                              }
                        } else {
                              $this->session->set_flashdata('error', 'Email Tidak Terdaftar');
                              redirect('panel/admin');
                        }
                  }
            } else {
                  $this->session->set_flashdata('error', 'Harap Centang Captcha');
                  redirect('panel/admin');
            }
      }



      public function logout()
      {
            $params = array('user_id', 'jabatan', 'email');
            $this->session->unset_userdata($params);
            $this->session->set_flashdata('message', 'Semoga hari anda menyenangkan!');
            redirect('panel/admin');
      }
}
