<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends AUTH_Controller
{
  public function __construct()
  {
    Parent::__construct();
    $this->load->model('user_model', 'user');

    if (($this->userdata->id_role != 1) && ($this->userdata->id_role != 2)) { // check for admin session and methos is login
      echo "<script>alert('Anda bukan Admin! Anda tidak berhak mengakses halaman ini!');
      window.location.href='home';
      </script>";
    }
  }

  public function index()
  {
    $pagedata['page']             = "user";
    $pagedata['judul']            = "Data user";
    $pagedata['deskripsi']        = "Manage Data user";
    $pagedata['title']            = "user";

    $pagedata['role'] = $this->user->add_record();

    $this->admintemplate->views('user/home', $pagedata);
  }

  public function ajax_list()
  {
    $list = $this->user->view_record();
    $no = $_POST['start'] + 1;
    $data = array();
    foreach ($list as $user) {
      $row = array();
      $row[] = $no++;;
      $row[] = $user->username;
      $row[] = $user->password;
      $row[] = $user->nama_role;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user(' . "'" . $user->id_user . "'" .
        ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
        <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Detail" onclick="detail_user(' . "'" . $user->id_user . "'" .
        ')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user(' . "'" . $user->id_user . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->user->count_all(),
      "recordsFiltered" => $this->user->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id_user)
  {
    $data = $this->user->get_by_id($id_user);
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'id_role' => $this->input->post('id_role'),
    );
    $insert = $this->user->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'id_role' => $this->input->post('id_role'),
    );

    $this->user->update(array('id_user' => $this->input->post('id_user')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id_user)
  {
    $this->user->delete_by_id($id_user);
    echo json_encode(array("status" => TRUE));
  }

  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('username') == '') {
      $data['inputerror'][] = 'username';
      $data['error_string'][] = 'username user is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('password') == '') {
      $data['inputerror'][] = 'password';
      $data['error_string'][] = 'password user is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('id_role') == '') {
      $data['inputerror'][] = 'id_role';
      $data['error_string'][] = 'id_role user is required';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }
}
