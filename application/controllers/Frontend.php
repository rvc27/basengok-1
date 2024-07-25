<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

  public function index(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('frontend/layout/header');
    $this->load->view('frontend/layout/nav', $data);
    $this->load->view('frontend/dtw/' . $page);
    $this->load->view('frontend/layout/footer');
  }

  public function amenitas(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('frontend/layout/header');
    $this->load->view('frontend/layout/nav', $data);
    $this->load->view('frontend/amenitas/' . $page);
    $this->load->view('frontend/layout/footer');
  }

  public function pendukung(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('frontend/layout/header');
    $this->load->view('frontend/layout/nav', $data);
    $this->load->view('frontend/pendukung/' . $page);
    $this->load->view('frontend/layout/footer');
  }
}
