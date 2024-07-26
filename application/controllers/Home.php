<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    Parent::__construct();
    $this->load->model('admin/Dtw_model', 'dtw');
    $this->load->model('admin/Amenitas_model', 'amenitas');
    $this->load->model('admin/Kategori_model', 'kategori');
  }

  public function index(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('/layout/header');
    $this->load->view('/layout/nav', $data);
    $this->load->view('home/' . $page);
    $this->load->view('/layout/footer');
  }

  public function ajax_dtw()
  {

    $list = $this->dtw->get_datatables();
    $no = $_POST['start'] + 1;
    $data = array();
    foreach ($list as $dtw) {
      $row = array();
      $row[] = $no++;
      $row[] = $dtw->nama;
      $row[] = $dtw->deskripsi;
      $row[] = $dtw->lokasi;
      $row[] = $dtw->kategori;

      //add html for action
      $row[] = '
            <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_dtw(' . "'" . $dtw->id_dtw . "'" . ')"><i class="fa fa-edit fa-xs"></i> Edit</a>
        
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_dtw(' . "'" . $dtw->id_dtw . "'" . ')"><i class="fa fa-trash fa-xs"></i> Delete</a>';

      // check if soft_delete status is 0
      if ($dtw->soft_delete == 0) {
        $data[] = $row;
      }
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->dtw->count_all(),
      "recordsFiltered" => $this->dtw->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function amenitas(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('/layout/header');
    $this->load->view('/layout/nav', $data);
    $this->load->view('amenitas/' . $page);
    $this->load->view('/layout/footer');
  }

  public function pendukung(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('/layout/header');
    $this->load->view('/layout/nav', $data);
    $this->load->view('pendukung/' . $page);
    $this->load->view('/layout/footer');
  }

  public function dtw(string $page = 'home')
  {
    $data['active'] = 'active';

    $this->load->view('/layout/header');
    $this->load->view('/layout/nav', $data);
    $this->load->view('dtw/' . $page);
    $this->load->view('/layout/footer');
  }
}
