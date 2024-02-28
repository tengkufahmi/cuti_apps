<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Cuti extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	
	public function view_karyawan()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['karyawan_data'] = $this->m_user->get_karyawan_by_id($this->session->userdata('id_user'))->result_array();
			$data['karyawan'] = $this->m_user->get_karyawan_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('karyawan/form_pengajuan_cuti', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	public function proses_cuti()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$id_user = $this->input->post("id_user");
			$perihal_cuti = $this->input->post("perihal_cuti");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_cuti = md5($id_user.$mulai);
			$id_status_cuti = 1;
			$jenis_cuti = $this->input->post("jenis_cuti");


			if($jenis_cuti == 0) {
				$this->session->set_flashdata('null_data','null_data');
				
			} else {
				$startDate = new DateTime($mulai);
				$endDate = new DateTime($berakhir);

				$totalHariCuti = 0;

				/* Loop melalui setiap hari antara dua tanggal */
				while ($startDate <= $endDate) {
					/* Periksa apakah hari saat ini bukan Sabtu atau Minggu */
					if ($startDate->format("N") < 6) {
						$totalHariCuti++;
					}

					/* Tambah satu hari */
					$startDate->add(new DateInterval('P1D'));
				}

				/* validasi hari cuti yang diambil */
				$dataJenisCuti = $this->m_cuti->get_jenis_cuti_by_id($jenis_cuti);
				$batasanHariCuti = $dataJenisCuti->batasan_hari;

				/* jika hari cuti yang diambil lebih besar dari batasan hari cuti */
				if($totalHariCuti > $batasanHariCuti) {
					$this->session->set_flashdata('invalid_leave','invalid_leave');
				} else {

					$hasil = $this->m_cuti->insert_data_cuti('cuti-'.substr($id_cuti, 0, 5), $id_user, $mulai, $berakhir, $id_status_cuti, $perihal_cuti, $jenis_cuti);

					if($hasil==false){
						$this->session->set_flashdata('eror_input','eror_input');

					}else{
						$this->session->set_flashdata('input','input');
					}
				}
			}
			redirect('Form_Cuti/view_karyawan');
			

			

		} else {

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}

	public function get_data_jenis_cuti() {
		$karyawan = $this->m_cuti->get_all_jenis_cuti();
		echo json_encode($karyawan);
	}
}