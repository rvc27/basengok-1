<?php
defined('BASEPATH') or exit('No direct script access allowed');

class role extends AUTH_Controller
{
  public function __construct()
  {
    Parent::__construct();
    $this->load->model('admin/role_model', 'role');

    if (($this->userdata->id_role != 1) && ($this->userdata->id_role != 2)) { // check for admin session and methos is login
      echo "<script>alert('Anda bukan Admin! Anda tidak berhak mengakses halaman ini!');
      window.location.href='home';
      </script>";
    }
  }

  public function index()
  {
    $pagedata['page']             = "role";
    $pagedata['judul']            = "Data role";
    $pagedata['deskripsi']        = "Manage Data role";
    $pagedata['title']            = "role";

    $this->admintemplate->views('role/home', $pagedata);
  }

  public function ajax_list()
  {
    $list = $this->role->get_datatables();
    $no = $_POST['start'] + 1;
    $data = array();
    foreach ($list as $role) {
      $row = array();
      $row[] = $no++;;
      $row[] = $role->id_role;
      $row[] = $role->nama_role;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_role(' . "'" . $role->id_role . "'" .
        ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
        <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Detail" onclick="detail_role(' . "'" . $role->id_role . "'" .
        ')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_role(' . "'" . $role->id_role . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->role->count_all(),
      "recordsFiltered" => $this->role->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id)
  {
    $data = $this->role->get_by_id($id);
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
      'nama_role' => $this->input->post('nama_role'),
    );
    $insert = $this->role->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $data = array(
      'nama_role' => $this->input->post('nama_role'),
    );
    $this->role->update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id)
  {
    $this->role->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('nama_role') == '') {
      $data['inputerror'][] = 'nama_role';
      $data['error_string'][] = 'nama_role role is required';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }
}
