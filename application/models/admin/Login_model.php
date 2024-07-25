<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
  public function login($username, $password)
  {
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('username', $username);
    $this->db->where('password', $password);

    $data = $this->db->get();

    if ($data->num_rows() == 1) {
      return $data->row();
    } else {
      return false;
    }
  }
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */