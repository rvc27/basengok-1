<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dtw extends CI_Controller
{

	public function index(string $page = 'home')
	{
		$data['active'] = 'active';

		$this->load->view('/layout/header');
		$this->load->view('/layout/nav', $data);
		$this->load->view('dtw/' . $page);
		$this->load->view('/layout/footer');
	}
}
