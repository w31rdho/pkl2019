<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyakit extends CI_Controller {

	function __construct() {
		parent::__construct();
		$level = $this->session->userdata('level');
		if ($level!='admin') {
			redirect('404');
		}
	}
	
	public function index()
	{
		redirect('penyakit/view');
	}

	public function view($aksi='', $id='')
	{
		$ceks 	 = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  = $this->db->get_where('tbl_pakar', "username='$ceks'");

			$this->db->order_by('kode_penyakit', 'ASC');
			$data['sql'] = $this->db->get("tbl_penyakit");

				if ($aksi == 't') {
					$p = "tambah";
					$data['judul_web'] 	  = "+ Penyakit";
				}elseif ($aksi == 'e') {
					$p = "edit";
					$data['judul_web'] 	  = "Edit Penyakit";
					$data['query'] = $this->db->get_where("tbl_penyakit", array('kode_penyakit' => "$id"))->row();
					if ($data['query']->kode_penyakit=='') {redirect('404');}
				}
				elseif ($aksi == 'h') {
					$cek_data = $this->db->get_where("tbl_penyakit", array('kode_penyakit' => "$id"));
					if ($cek_data->num_rows() != 0) {
							$this->db->delete('tbl_penyakit', array('kode_penyakit' => $id));
							$this->session->set_flashdata('msg',
								'
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil dihapus.
								</div>'
							);
							redirect('penyakit/view');
					}else {
						redirect('404_content');
					}
				}else{
					$p = "index";
					$data['judul_web'] 	  = "penyakit";
				}

					$this->load->view('users/header', $data);
					$this->load->view("users/penyakit/$p", $data);
					$this->load->view('users/footer');

					date_default_timezone_set('Asia/Jakarta');
					$tgl = date('Y-m-d H:i:s');

					if (isset($_POST['btnsimpan'])) {
						$kode_penyakit = htmlentities(strip_tags($this->input->post('kode_penyakit')));
						$nama_penyakit = htmlentities(strip_tags($this->input->post('nama_penyakit')));
						$keterangan 			 = htmlentities(strip_tags($this->input->post('keterangan')));
						//$solusi 				 = htmlentities(strip_tags($this->input->post('solusi')));

										$data = array(
											'kode_penyakit' => $kode_penyakit,
											'nama_penyakit' => $nama_penyakit,
											'keterangan' 				=> $keterangan,
											//'solusi' 					=> $solusi,
											'tgl_penyakit'  => $tgl
										);
										$this->db->insert('tbl_penyakit',$data);

										$this->session->set_flashdata('msg',
											'
											<div class="alert alert-success alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
												 </button>
												 <strong>Sukses!</strong> Berhasil disimpan.
											</div>'
										);

						 redirect('penyakit/view/t');
					}


					if (isset($_POST['btnupdate'])) {
						$kode_penyakit = htmlentities(strip_tags($this->input->post('kode_penyakit')));
						$nama_penyakit = htmlentities(strip_tags($this->input->post('nama_penyakit')));
						$keterangan 			 = htmlentities(strip_tags($this->input->post('keterangan')));
						//$solusi 				 = htmlentities(strip_tags($this->input->post('solusi')));

										$data = array(
											'kode_penyakit' => $kode_penyakit,
											'nama_penyakit' => $nama_penyakit,
											'keterangan' 				=> $keterangan,
											//'solusi' 					=> $solusi
										);
										$this->db->update('tbl_penyakit',$data, array('kode_penyakit' => $id));

										$this->session->set_flashdata('msg',
											'
											<div class="alert alert-success alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
												 </button>
												 <strong>Sukses!</strong> Berhasil disimpan.
											</div>'
										);
						 redirect('penyakit/view/e/'.$id);
					}
		}
	}

}
