<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Amenitas extends AUTH_Controller
{
  public function __construct()
  {
    Parent::__construct();
    $this->load->model('admin/Amenitas_model', 'amenitas');


    // if (($this->userdata->id_role != 1) && ($this->userdata->id_role != 2)) { // check for admin session and methos is login
    //   echo "<script>alert('Anda bukan Admin! Anda tidak berhak mengakses halaman ini!');
    //   window.location.href='home';
    //   </script>";
    // }
  }

  public function index()
  {
    $pagedata['page']             = "amenitas";
    $pagedata['judul']            = "Data Amenitas";
    $pagedata['deskripsi']        = "Manage Data Amenitas";
    $pagedata['title']            = "amenitas";

    $this->admintemplate->views('amenitas/home', $pagedata);
  }

  public function ajax_list()
  {
    $list = $this->amenitas->get_datatables();
    $no = $_POST['start'] + 1;
    $data = array();
    foreach ($list as $amenitas) {
      $row = array();
      $row[] = $no++;
      $row[] = $amenitas->nama;
      $row[] = $amenitas->lokasi;
      $row[] = $amenitas->kategori;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_amenitas(' . "'" . $amenitas->id_amn . "'" .
        ')"><i class="fa fa-edit fa-xs"></i> Edit</a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_amenitas(' . "'" . $amenitas->id_amn . "'" . ')"><i class="fa fa-trash fa-xs"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->amenitas->count_all(),
      "recordsFiltered" => $this->amenitas->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id)
  {
    $data = $this->amenitas->get_by_id($id);
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
      'nama' => $this->input->post('nama'),
      'lokasi' => $this->input->post('lokasi'),
      'kategori' => $this->input->post('kategori'),
    );
    $insert = $this->amenitas->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $data = array(
      'nama' => $this->input->post('nama'),
      'lokasi' => $this->input->post('lokasi'),
      'kategori' => $this->input->post('kategori'),
    );
    $this->amenitas->update(array('id_amn' => $this->input->post('id_amn')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id)
  {
    $this->amenitas->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('nama') == '') {
      $data['inputerror'][] = 'nama';
      $data['error_string'][] = 'nama is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('lokasi') == '') {
      $data['inputerror'][] = 'lokasi';
      $data['error_string'][] = 'lokasi is required';
      $data['status'] = FALSE;
    }

    if ($this->input->post('kategori') == '') {
      $data['inputerror'][] = 'kategori';
      $data['error_string'][] = 'kategori is required';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }

  public function excel()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Lokasi');
    $sheet->setCellValue('D1', 'Kategori');

    $spreadsheet->getActiveSheet()->getStyle('E')
      ->getNumberFormat()
      ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

    $styleArrayFirstRow = [
      'font' => [
        'bold' => true,
      ]
    ];

    $highestColumn = $sheet->getHighestColumn();
    //set first row bold
    $sheet->getStyle('A1:' . $highestColumn . '1')->applyFromArray($styleArrayFirstRow);

    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);

    $mhs = $this->amenitas->getAll();
    $no = 1;
    $x = 2;
    foreach ($mhs as $row) {
      $sheet->setCellValue('A' . $x, $no++);
      $sheet->setCellValue('B' . $x, $row->nim);
      $sheet->setCellValue('C' . $x, $row->nama);
      $sheet->setCellValue('D' . $x, $row->tempat);
      $sheet->setCellValue('E' . $x, $row->tanggal);
      $x++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'data_amenitas-' . date('Y-m-d');;

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
