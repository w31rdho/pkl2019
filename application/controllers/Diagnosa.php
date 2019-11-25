<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

	public function index()
	{
		$data['judul_web'] 	  = $this->M_Web->judul_web();
		$data['status'] 	  	= 'Form Biodata Pengguna';
		$data['judul'] 	  		= $this->M_Web->judul_web();
		$this->load->view('web/header', $data);
		$this->load->view("web/diagnosa/form", $data);
		$this->load->view('web/footer');

									 $this->db->order_by('kode_gejala','ASC');
									 $this->db->limit(1);
		$kode_gejala = $this->db->get('tbl_gejala')->row()->kode_gejala;

		if ($this->session->userdata('level')=='user') {
			$id_userx = $this->session->userdata('id_user');
			redirect("diagnosa/p/$id_userx/$kode_gejala");
		}

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d H:i:s');

		if (isset($_POST['btnmulai'])) {
			$nama   = htmlentities(strip_tags($this->input->post('nama')));
			$email  = htmlentities(strip_tags($this->input->post('email')));
			$no_hp  = htmlentities(strip_tags($this->input->post('no_hp')));
			$alamat = htmlentities(strip_tags($this->input->post('alamat')));
			$username = htmlentities(strip_tags($this->input->post('username')));
			// $id_user = md5("'$nama' $tgl $no_hp");
			$cek_un = $this->db->get_where('tbl_pakar', array('username'=>$username));
			$simpan = 'y';
			$pesan  = 'n';
			if ($cek_un->num_rows()!=0) {
				$simpan = 'n';
				$pesan  = "Username '<b>$username</b>' sudah ada";
			}else {
				$cek_un2 = $this->db->get_where('tbl_user', array('username'=>$username));
				if ($cek_un2->num_rows()!=0) {
					$simpan = 'n';
					$pesan  = "Username '<b>$username</b>' sudah ada";
				}
			}

			if ($simpan=='y') {
				$data = array(
					'id_user' 	 => $id_user,
					'nama' 			 => $nama,
					'email' 		 => $email,
					'no_hp' 		 => $no_hp,
					'alamat' 		 => $alamat,
					'username'   => $username,
					'password' 	 => $username,
					'tgl_daftar' => $tgl
				);
				$this->db->insert('tbl_user',$data);

				$id_user = $this->db->insert_id();

				$this->session->set_userdata('username', "$username");
				$this->session->set_userdata('id_user', "$id_user");
				$this->session->set_userdata('nama', "$nama");
				$this->session->set_userdata('level', "user");

				redirect("diagnosa/p/$id_user/$kode_gejala");
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
				redirect('diagnosa');
			}

		}

	}

	public function p($id_user='',$kode_gejala='')
	{
		if ($id_user=='' or $kode_gejala=='') {
			redirect('404');
		}
		$data['judul_web'] 	= $this->M_Web->judul_web();
		$data['status'] 	  = 'Diagnosa';
		$data['judul'] 	    = 'Jawablah pertanyaan berikut sesuai dengan gejala yang Anda rasakan';
		$data['query'] 			= $this->db->get_where('tbl_gejala',"kode_gejala='$kode_gejala'")->row();
		if ($data['query']->kode_gejala=='') {
			redirect('404');
		}
		$data_diagnosa = $this->db->get_where('tbl_diagnosa', array('id_user'=>$id_user,'kode_gejala'=>$kode_gejala));
		$ke = $data_diagnosa->num_rows()+1;
		// if ($data_diagnosa->num_rows()!=0) {
		// 	redirect('404');
		// }
		$this->load->view('web/header', $data);
		$this->load->view("web/diagnosa/step", $data);
		$this->load->view('web/footer');

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d H:i:s');

			if (isset($_POST['btnstep'])) {
				$cek_diagnosa = $this->db->get_where('tbl_diagnosa', array('id_user'=>$id_user,'kode_gejala'=>$kode_gejala,'diagnosa_ke'=>$ke));
				if ($cek_diagnosa->num_rows()==0) {
					$jawab = htmlentities(strip_tags($this->input->post('status')));
					$data = array(
						'id_user' 	   => $id_user,
						'kode_gejala'  => $kode_gejala,
						'jawab'  			 => $jawab,
						'diagnosa_ke'	 => $ke,
						'tgl_diagnosa' => $tgl
					);
					$this->db->insert('tbl_diagnosa',$data);
				}

				$noUrut    = substr($kode_gejala, 1, 3);
				$noUrut++;
				$kode_new	 = "G".sprintf("%03s", $noUrut);
				$jml_gejala = $this->db->get('tbl_gejala')->num_rows();
				// $cek_kode = $this->db->get_where('tbl_gejala', array('kode_gejala'=>"$kode_new"));
				// if ($cek_kode->num_rows()==0) {
				// 	for ($i=$noUrut; $i <=$jml_gejala ; $i++) {
				// 		$kode_new	 = "G".sprintf("%03s", $i);
				// 		$cek_kode2 = $this->db->get_where('tbl_gejala', array('kode_gejala'=>"$kode_new"));
				// 		if ($cek_kode2->num_rows()!=0) {
				// 			break;
				// 		}
				// 	}
				// }

				$jml_diagnosa = $this->db->get_where('tbl_diagnosa', array('id_user'=>$id_user,'diagnosa_ke'=>"$ke"))->num_rows();
				if ($jml_gejala==$jml_diagnosa) {
					redirect("diagnosa/hasil/$id_user/0/$ke");
				}else {
					redirect("diagnosa/p/$id_user/$kode_new/$ke");
				}
			}

	}


	public function hasil($id_user='',$aksi='',$ke='')
	{
		if ($id_user=='') {
			redirect('404');
		}
		$data['judul_web'] 	= $this->M_Web->judul_web();
		$data['status'] 	  = 'Hasil Diagnosa';
		$data['judul'] 	  	= "HASIL ".$this->M_Web->judul_web(2)." ".$this->M_Web->judul_web(3);
													$this->db->join('tbl_diagnosa','tbl_diagnosa.id_user=tbl_user.id_user');
		$data['query'] 			= $this->db->get_where('tbl_user', array('tbl_user.id_user'=>$id_user,'diagnosa_ke'=>$ke))->row();
		if ($data['query']->id_user=='') {
			redirect('404');
		}
														$this->db->join('tbl_gejala',"tbl_gejala.kode_gejala=tbl_diagnosa.kode_gejala");
														$this->db->order_by('tbl_gejala.kode_gejala','ASC');
		$data['v_diagnosa'] 	= $this->db->get_where('tbl_diagnosa', array('id_user'=>$id_user,'diagnosa_ke'=>$ke));

		$data['diagnosa_ke']  = $ke;

		if ($aksi=='0') {
			$this->load->view('web/header', $data);
			$this->load->view("web/diagnosa/hasil", $data);
			$this->load->view('web/footer');
		}elseif ($aksi=='cetak') {
			$this->load->view("web/diagnosa/cetak", $data);
		}else {
			redirect('404');
		}
	}


	public function riwayat()
	{
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']   	 = $this->db->get_where('tbl_pakar',"username='$ceks'");
			$data['judul_web'] = "Riwayat Diagnosa";

										 $this->db->join('tbl_diagnosa','tbl_diagnosa.id_user=tbl_user.id_user');
							 		   $this->db->group_by('tbl_user.id_user, diagnosa_ke');
										 if ($level=='user') {
										 	$this->db->where('tbl_user.id_user',$id_user);
										 }
										 $this->db->order_by('tgl_daftar','DESC');
										 $this->db->order_by('diagnosa_ke','DESC');
			$data['sql'] = $this->db->get('tbl_user');

			$this->load->view('users/header', $data);
			$this->load->view('users/riwayat', $data);
			$this->load->view('users/footer');
		}
	}

	public function hapus($id='',$ke='')
	{
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if ($ke=='') {
			redirect('404');
		}
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']   	 = $this->db->get_where('tbl_pakar',"username='$ceks'");
			if ($level=='user') {
				$id = $id_user;
			}
								  $this->db->where('id_user',"$id");
			$cek_user = $this->db->get('tbl_user');
			if ($cek_user->num_rows()==0) {
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Gagal!</strong> ID tidak ditemukan, Silahkan coba lagi.
					</div>'
				);
			}else {
				$this->db->delete('tbl_diagnosa', array('id_user' => $id,'diagnosa_ke'=>$ke));
				if ($this->db->get_where('tbl_diagnosa', array('id_user'=>$id_user))->num_rows()==0) {
						$this->db->delete('tbl_user', array('id_user' => $id));
				}
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Sukses!</strong> Berhasil dihapus.
					</div>'
				);
			}
			redirect('diagnosa/riwayat');
		}
	}

}
