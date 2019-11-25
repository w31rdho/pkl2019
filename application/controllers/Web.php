<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$data['judul_web'] = $this->M_Web->judul_web();
		$this->load->view('web/header', $data);
		$this->load->view('web/beranda');
		$this->load->view('web/footer');
	}

	public function data()
	{
		$data['judul_web'] = $this->M_Web->judul_web();

		$this->db->order_by('kode_penyakit', 'ASC');
		$data['v_penyakit'] = $this->db->get("tbl_penyakit");

		$this->db->order_by('kode_gejala','ASC');
		$data['v_gejala'] = $this->db->get('tbl_gejala');

		$this->load->view('web/header', $data);
		$this->load->view('web/data', $data);
		$this->load->view('web/footer');
	}

	public function login()
	{
		$ceks = $this->session->userdata('username');
		if(isset($ceks)) {
			redirect('dashboard');
		}else{
			$data['judul_web'] = 'Halaman Login';
			$this->load->view('web/header', $data);
			$this->load->view('web/login');
			$this->load->view('web/footer');

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags($_POST['password']));

						 $query  = $this->db->get_where('tbl_user',"username='$username'");
						 $jumlah = $query->num_rows();

						 $simpan = 'y';
			 			 $pesan  = 'n';
						 if ($jumlah==0) {
							 $query  = $this->db->get_where('tbl_pakar',"username='$username'");
							 $jumlah = $query->num_rows();
							 if ($jumlah==0) {
								 $simpan = 'n';
 								 $pesan  = "Username '<b>$username</b>' belum terdaftar";
							 }else {
							 		$level = 'admin';
							 }
						 }else {
							 	$level = 'user';
						 }

						 if ($simpan=='y') {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('web/login');
										 } else {

																$this->session->set_userdata('username', "$row->username");
																$this->session->set_userdata('id_user', "$row->id_user");
																$this->session->set_userdata('nama', "$row->nama");
																$this->session->set_userdata('level', "$level");

												 			 	redirect('users');
										 }
						 }else {
							 $this->session->set_flashdata('msg',
 								 '<div class="alert alert-warning alert-dismissible" role="alert">
 										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 											<span aria-hidden="true">&times;&nbsp;</span>
 										</button>
 										<strong>Gagal!</strong> '.$pesan.'.
 								 </div>'
 							 );
 							 redirect('web/login');
						 }
				}
		}
	}

	public function riwayat()
	{
			$data['judul_web'] = "Riwayat Diagnosa";

										 $this->db->join('tbl_diagnosa','tbl_diagnosa.id_user=tbl_user.id_user');
										 $this->db->group_by('tbl_user.id_user, diagnosa_ke');
										 $this->db->order_by('tgl_daftar','DESC');
										 $this->db->order_by('diagnosa_ke','DESC');
			$data['sql'] = $this->db->get('tbl_user');

			$this->load->view('web/header', $data);
			$this->load->view('web/riwayat', $data);
			$this->load->view('web/footer');
	}

	public function logout() {
     if ($this->session->has_userdata('username') and $this->session->has_userdata('id_user')) {
         $this->session->sess_destroy();
     }
		 redirect('web/login');
  }

	function error_not_found(){
		$this->load->view('404_content');
	}

}
