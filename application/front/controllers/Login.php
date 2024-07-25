<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
  }

  public function index()
  {
    $session = $this->session->userdata('status');

    if ($session == '') {
      $this->load->view('login');
    } else {
      redirect('home');
    }
  }

  public function login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
    $this->form_validation->set_rules('password', 'Password', 'required');

    $this->session->set_userdata($newdata);
    if ($this->form_validation->run() == TRUE) {
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      $data = $this->Login_model->login($username, $password);

      if ($data == false) {
        $this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
        redirect('login');
      } else {
        $session = [
          'userdata' => $data,
          'status' => "Logged in"
        ];
        $this->session->set_userdata($session);
        redirect('home');
      }
    } else {
      $this->session->set_flashdata('error_msg', validation_errors());
      redirect('login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */