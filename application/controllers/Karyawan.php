<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
    
	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
			
			$data['karyawan'] = $this->m_user->get_all_karyawan()->result_array();
			$data['jenis_kelamin_p'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('admin/karyawan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function tambah_karyawan()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$username = $this->input->post("username");
        $password = $this->input->post("password");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_user_level = 2;
        $id = md5($username.$password);

        
            $hasil = $this->m_user->insert_karyawan($id, $username, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);

            if($hasil==false){
                $this->session->set_flashdata('eror','eror');
                redirect('Karyawan/view_admin');
			}else{
				$this->session->set_flashdata('input','input');
				redirect('Karyawan/view_admin');
            }

     	}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}

	public function edit_karyawan()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$username = $this->input->post("username");
        $password = $this->input->post("password");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_user_level = 2;
        $id = $this->input->post("id_user");

        
            $hasil = $this->m_user->update_karyawan($id, $username, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Karyawan/view_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Karyawan/view_admin');
			}
			
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
     
	}

	public function hapus_karyawan()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
		
        	$id = $this->input->post("id_user");

            $hasil = $this->m_user->delete_karyawan($id);

            if($hasil==false){
                $this->session->set_flashdata('eror_hapus','eror_hapus');
                redirect('Karyawan/view_admin');
			}else{
				$this->session->set_flashdata('hapus','hapus');
				redirect('Karyawan/view_admin');
			}
			
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
	
		}
	}	
    
}