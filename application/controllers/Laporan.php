<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
		$this->load->model('m_laporan');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['cuti'] = $this->m_cuti->get_all_cuti()->result_array();
			$this->load->view('admin/laporan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	

	public function cetak_laporan_cuti($idUser, $startDate, $endDate) {
		//load library dompdf
		$this->load->library('pdf');

		$laporan = $this->m_laporan->exportDataCuti($idUser, $startDate, $endDate);

		$this->printData['cuti'] = $laporan;

		$filename = "laporan-pengajuan-cuti-"."_".date("YmdHis");

		$paperSize = 'A4';
		$orientation = "portrait";

		$template = $this->load->view('admin/template/cetak-laporan-cuti', $this->printData, true); 

        // generate dompdf
		$this->pdf->generate($template, $filename, $paperSize, $orientation);
	}

	public function get_data_karyawan() {
		$karyawan = $this->m_user->get_all_karyawan()->result();
		echo json_encode($karyawan);
	}

	public function getData() {
		$laporan = $this->m_laporan;
		$list = $laporan->getData();
		$data = array();
		$num = 1;
		$no = $_POST['start'];
		foreach ($list as $ls) {
			$no++;
			$row = array();
			$row[] 	= $num++;
			$row[] 	= $ls->nama_lengkap;
			$row[] 	= $ls->tgl_diajukan;
			$row[] 	= $ls->mulai;
			$row[] 	= $ls->berakhir;
			$row[] 	= $ls->perihal_cuti;

			if($ls->id_status_cuti == 1) {
				$row[] 	= '<a href="" class="btn btn-info">Menunggu Konfirmasi</a>';
			} else if($ls->id_status_cuti == 2) {
				$row[] 	= '<a href="" class="btn btn-info">Izin Cuti Diterima</a>';
			} else if($ls->id_status_cuti == 3){
				$row[] 	= '<a href="" class="btn btn-info">Izin Cuti Ditolak</a>';
			}

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $laporan->count_all(),
			"recordsFiltered" => $laporan->count_filtered(),
			"data" => $data,
		);
		
		//output to json format
		echo json_encode($output);
	}

}