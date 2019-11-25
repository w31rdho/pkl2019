<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			if ($level=='user') {
				$data['user']   	 = $this->db->get_where('tbl_user',"username='$ceks'");
			}else {
				$data['user']   	 = $this->db->get_where('tbl_pakar',"username='$ceks'");
			}
			$data['judul_web'] = "Beranda";

			$this->load->view('users/header', $data);
			$this->load->view('users/beranda', $data);
			$this->load->view('users/footer');
		}
	}

	public function profile()
	{
		$ceks = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			if ($level=='user') {
				$data['user']   	 = $this->db->get_where('tbl_user',"username='$ceks'");
			}else {
				$data['user']   	 = $this->db->get_where('tbl_pakar',"username='$ceks'");
			}
			$data['judul_web'] 		= "Profile";

					$this->load->view('users/header', $data);
					$this->load->view('users/profile', $data);
					$this->load->view('users/footer');

					if (isset($_POST['btnupdate'])) {
						$username	= htmlentities(strip_tags($this->input->post('username')));
						$nama			= htmlentities(strip_tags($this->input->post('nama')));

						$pesan = '';
						if ($ceks == $username) {
							$update = 'yes';
						}else{
							$cek_un = $this->db->get_where('tbl_pakar',"username='$username'")->num_rows();
							if ($cek_un == 0) {
									$update = 'yes';
							}else{
									$update = 'no';
									$pesan  = 'Username "<b>'.$username.'</b>" sudah ada';
							}
						}

						if ($update == 'yes') {
									$data = array(
										'username'	=> $username,
										'nama'			=> $nama
									);
									if ($level=='user') {
										$this->db->update('tbl_user', $data,array('username' => $ceks));
									}else {
										$this->db->update('tbl_pakar', $data,array('username' => $ceks));
									}
									
									$this->session->has_userdata('username');
									$this->session->set_userdata('username', "$username");
									$this->session->has_userdata('nama');
									$this->session->set_userdata('nama', "$nama");

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Profile berhasil disimpan.
										</div>'
									);
									redirect('users/profile');
						}else {
							$this->session->set_flashdata('msg',
								'
								<div class="alert alert-warning alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Gagal!</strong> '.$pesan.'.
								</div>'
							);
							redirect('users/profile');
						}
					}

		}
	}

	public function ubah_pass()
	{
		$ceks = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			if ($level=='user') {
				$data['user']   	 = $this->db->get_where('tbl_user',"username='$ceks'");
			}else {
				$data['user']   	 = $this->db->get_where('tbl_pakar',"username='$ceks'");
			}
			$data['judul_web'] 		= "Ubah Password";

					$this->load->view('users/header', $data);
					$this->load->view('users/ubah_pass', $data);
					$this->load->view('users/footer');

					if (isset($_POST['btnupdate2'])) {
						$password0 	= htmlentities(strip_tags($this->input->post('password0')));
						$password 	= htmlentities(strip_tags($this->input->post('password')));
						$password2 	= htmlentities(strip_tags($this->input->post('password2')));

						if ($password0 != $data['user']->row()->password) {
								$this->session->set_flashdata('msg2',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Password lama salah.
									</div>'
								);
								redirect('users/ubah_pass');
						}

						if ($password != $password2) {
								$this->session->set_flashdata('msg2',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Password tidak cocok.
									</div>'
								);
						}else{
									$data = array(
										'password'	=> $password
									);
									if ($level=='user') {
										$this->db->update('tbl_user', $data,array('username' => $ceks));
									}else {
										$this->db->update('tbl_pakar', $data,array('username' => $ceks));
									}

									$this->session->set_flashdata('msg2',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Password berhasil disimpan.
										</div>'
									);
						}
									redirect('users/ubah_pass');
					}


		}
	}


}
