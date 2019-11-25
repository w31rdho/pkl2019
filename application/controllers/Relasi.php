<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$level = $this->session->userdata('level');
		if ($level!='admin') {
			redirect('404');
		}
	}
	
	public function index()
	{
		redirect('relasi/view');
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
			$data['v_penyakit'] = $this->db->get("tbl_penyakit");

			$this->db->order_by('kode_gejala','ASC');
			$data['v_gejala'] = $this->db->get('tbl_gejala');

				if ($aksi == 'e') {
					$p = "edit";
					$data['judul_web'] 	  = "Edit Relasi";
					$data['query'] = $this->db->get_where("tbl_penyakit", array('kode_penyakit' => "$id"));
					if ($data['query']->row()->kode_penyakit=='') {redirect('404');}
				}else{
					$p = "index";
					$data['judul_web'] 	  = "Relasi";
				}

					$this->load->view('users/header', $data);
					$this->load->view("users/relasi/$p", $data);
					$this->load->view('users/footer');

					date_default_timezone_set('Asia/Jakarta');
					$tgl = date('Y-m-d H:i:s');

					if (isset($_POST['btnsimpan'])) {

							foreach ($data['v_gejala']->result() as $key => $value) {
								$cek_data = $this->db->get_where('tbl_relasi', array('kode_penyakit'=>$id,'kode_gejala'=>$value->kode_gejala));
								$data = array(
									'kode_penyakit' => $id,
									'kode_gejala'  		=> $value->kode_gejala,
									'ket' 			 			=> htmlentities(strip_tags($this->input->post('ket_'.$value->kode_gejala))),
									'tgl_relasi'   		=> $tgl
								);
								if ($cek_data->num_rows()==0) {
									$this->db->insert('tbl_relasi',$data);
								}else {
									$this->db->update('tbl_relasi',$data, array('kode_penyakit'=>$id,'kode_gejala'=>$value->kode_gejala));
								}
							}
										$this->session->set_flashdata('msg',
											'
											<div class="alert alert-success alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
												 </button>
												 <strong>Sukses!</strong> Berhasil disimpan.
											</div>'
										);

						 redirect('relasi/view/e/'.$id);
					}

		}
	}

}
