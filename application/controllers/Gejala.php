<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	function __construct() {
		parent::__construct();
		$level = $this->session->userdata('level');
		if ($level!='admin') {
			redirect('404');
		}
	}
	
	public function index()
	{
		redirect('gejala/view');
	}

	public function view($aksi='', $id='')
	{
		$ceks 	 = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  = $this->db->get_where('tbl_pakar', "username='$ceks'");

			$this->db->order_by('kode_gejala', 'ASC');
			$data['sql'] = $this->db->get("tbl_gejala");

				if ($aksi == 't') {
					$p = "tambah";
					$data['judul_web'] 	  = "+ Gejala";
				}elseif ($aksi == 'e') {
					$p = "edit";
					$data['judul_web'] 	  = "Edit Gejala";
					$data['query'] = $this->db->get_where("tbl_gejala", array('kode_gejala' => "$id"))->row();
					if ($data['query']->kode_gejala=='') {redirect('404');}
				}
				elseif ($aksi == 'h') {
					$cek_data = $this->db->get_where("tbl_gejala", array('kode_gejala' => "$id"));
					if ($cek_data->num_rows() != 0) {
							$this->db->delete('tbl_gejala', array('kode_gejala' => $id));
							$this->session->set_flashdata('msg',
								'
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil dihapus.
								</div>'
							);
							redirect('gejala/view');
					}else {
						redirect('404_content');
					}
				}else{
					$p = "index";
					$data['judul_web'] 	  = "Gejala";
				}

					$this->load->view('users/header', $data);
					$this->load->view("users/gejala/$p", $data);
					$this->load->view('users/footer');

					date_default_timezone_set('Asia/Jakarta');
					$tgl = date('Y-m-d H:i:s');

					if (isset($_POST['btnsimpan'])) {
						$kode_gejala = htmlentities(strip_tags($this->input->post('kode_gejala')));
						$nama_gejala = htmlentities(strip_tags($this->input->post('nama_gejala')));

										$data = array(
											'kode_gejala' => $kode_gejala,
											'nama_gejala' => $nama_gejala,
											'tgl_gejala'  => $tgl
										);
										$this->db->insert('tbl_gejala',$data);

										$this->session->set_flashdata('msg',
											'
											<div class="alert alert-success alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
												 </button>
												 <strong>Sukses!</strong> Berhasil disimpan.
											</div>'
										);

						 redirect('gejala/view/t');
					}


					if (isset($_POST['btnupdate'])) {
						$nama_gejala = htmlentities(strip_tags($this->input->post('nama_gejala')));

										$data = array(
											'nama_gejala' => $nama_gejala
										);
										$this->db->update('tbl_gejala',$data, array('kode_gejala' => $id));

										$this->session->set_flashdata('msg',
											'
											<div class="alert alert-success alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
												 </button>
												 <strong>Sukses!</strong> Berhasil disimpan.
											</div>'
										);
						 redirect('gejala/view/e/'.$id);
					}
		}
	}

}
