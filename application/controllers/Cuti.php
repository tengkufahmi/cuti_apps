<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['cuti'] = $this->m_cuti->get_all_cuti_v2()->result_array();
			$this->load->view('admin/cuti', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	public function view_karyawan($id_user)
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['cuti'] = $this->m_cuti->get_all_cuti_by_id_user_v2($id_user)->result_array();
			$data['karyawan'] = $this->m_user->get_karyawan_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['karyawan_data'] = $this->m_user->get_karyawan_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('karyawan/cuti', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	public function hapus_cuti()
	{

		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');

		$id_cuti = $this->input->post("id_cuti");
		$id_user = $this->input->post("id_user");

		$data = array(
			'deleted' => 1,
			'tgl_dihapus' => $date
		);

		$updated = $this->m_cuti->soft_delete_cuti(array('id_cuti' => $id_cuti), $data);

		// $hasil = $this->m_cuti->delete_cuti($id_cuti);
		
		if(empty($updated)){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Cuti/view_karyawan/'.$id_user);
	}

	public function acc_cuti_admin($id_status_cuti)
	{

		$id_cuti = $this->input->post("id_cuti");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_cuti->confirm_cuti($id_cuti, $id_status_cuti, $alasan_verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('Cuti/view_admin/'.$id_user);
	}


	public function acc_cuti_admin_v2()
	{

		$jsonData = file_get_contents("php://input");

		$data = json_decode($jsonData, true);

		$response = array();

		if ($data !== null) {

			$id_cuti = $data['id_cuti'];

			$array_data = array(
				'id_status_cuti' => 2
			);

			$hasil = $this->m_cuti->updateCuti(array('id_cuti' => $id_cuti), $array_data);

			if(empty($hasil)){
				$response = array(
					'status' => 'error', 
					'message' => 'Gagal melakukan approval cuti'
				);
			} else {

				$response = array(
					'status' => 'success', 
					'message' => 'Cuti berhasil disetujui!'
				);
			}

		} else {
			http_response_code(400); 
			$response = array(
				'status' => 'error', 
				'message' => 'Terjadi kesalahan. Gagal melakukan approval cuti.'
			);
		}

		echo json_encode($response);
	}

	public function cetak_pengajuan_cuti($idUser) {
		//load library dompdf
		$this->load->library('pdf');

		$cuti = $this->m_cuti->get_all_cuti_by_id_user($idUser)->result_array();
		$dataKaryawan = $this->m_user->get_karyawan_by_id($idUser)->row_array();

		$this->printData['nama_lengkap'] = $dataKaryawan['nama_lengkap'];
		$this->printData['cuti'] = $cuti;

		$filename = "pengajuan-cuti-".$dataKaryawan['nama_lengkap']."_".date("YmdHis");

		$paperSize = 'A4';
		$orientation = "portrait";

		$template = $this->load->view('karyawan/template/cetak-pengajuan-cuti', $this->printData, true); 

        // generate dompdf
		$this->pdf->generate($template, $filename, $paperSize, $orientation);
	}

	

}