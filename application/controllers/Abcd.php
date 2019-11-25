<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abcd extends CI_Controller {

	public function index()
	{
		$data['judul_web'] = "Halaman ABCD";
		$this->db->order_by('nama','ASC');
		$data['v_data']		 = $this->db->get('tbl_tes');

		$this->load->view('web/header', $data);
		$this->load->view('web/abcd/tampil_abcd', $data);
		$this->load->view('web/footer', $data);
	}

	public function tambah()
	{
		$data['judul_web'] = "Halaman Tambah ABCD";
		$this->load->view('web/header', $data);
		$this->load->view('web/abcd/tambah_abcd', $data);
		$this->load->view('web/footer', $data);

		if (isset($_POST['btnsimpan'])) {
				$nama = $this->input->post('nama');
				$data = array('nama'=>$nama);
				$this->db->insert('tbl_tes',$data);

				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Sukses!</strong> Berhasil disimpan.
					</div>'
				);
				redirect('abcd/tambah');
		}

	}


	public function edit($id='')
	{
		if($id==''){redirect('404');}
		$data['judul_web'] = "Halaman Edit ABCD";
		$data['v_data']		 = $this->db->get_where('tbl_tes', array('id_tes'=>$id))->row();
		if ($data['v_data']->id_tes=='') {
			redirect('404');
		}

		$this->load->view('web/header', $data);
		$this->load->view('web/abcd/edit_abcd', $data);
		$this->load->view('web/footer', $data);

		if (isset($_POST['btnsimpan'])) {
				$nama = $this->input->post('nama');
				$data = array('nama'=>$nama);
				$this->db->update('tbl_tes',$data, array('id_tes'=>$id));

				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Sukses!</strong> Berhasil disimpan.
					</div>'
				);
				redirect('abcd');
		}

	}

	public function hapus($id='')
	{
		if($id==''){redirect('404');}
		$data['v_data']		 = $this->db->get_where('tbl_tes', array('id_tes'=>$id))->row();
		if ($data['v_data']->id_tes=='') {
			redirect('404');
		}
		$this->db->delete('tbl_tes', array('id_tes'=>$id));
		$this->session->set_flashdata('msg',
			'
			<div class="alert alert-success alert-dismissible" role="alert">
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
				 </button>
				 <strong>Sukses!</strong> Berhasil dihapus.
			</div>'
		);
		redirect('abcd');
	}


	public function cetak()
	{
		$data['judul_web'] = "Cetak ABCD";
		$this->db->order_by('nama','ASC');
		$data['v_data']		 = $this->db->get('tbl_tes');

		$this->load->view('web/abcd/cetak_abcd', $data);
	}
	
	public function oke($id='')
	{
		if ($id=='') {
			echo "tampilan oke bro";
		}else {
			echo "tampilan halaman oke $id ya?";
		}
	}

}
