<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Web extends CI_Model {

 public static function tgl_id($date, $bln='')
 {
		 $str = explode('-', $date);
		 $bulan = array(
			 '01' => 'Januari',
			 '02' => 'Februari',
			 '03' => 'Maret',
			 '04' => 'April',
			 '05' => 'Mei',
			 '06' => 'Juni',
			 '07' => 'Juli',
			 '08' => 'Agustus',
			 '09' => 'September',
			 '10' => 'Oktober',
			 '11' => 'November',
			 '12' => 'Desember',
		 );
		 if ($bln == '') {
			 $hasil = $str['0'] . " " . $bulan[$str[1]] . " " .$str[2];
		 }else {
			 $hasil = $bulan[$str[1]];
		 }
		 return $hasil;
 }

	public function hari_id($tanggal)
	{
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => "Jum'at",
			'Sat' => 'Sabtu'
		);
		return $dayList[$day];
	}

	function judul_web($id='')
	{
		$nama_web = 'SISTEM PAKAR';
		$ket_web  = 'DIAGNOSA KANKER MULUT';
		$ket_web2 = 'METODE FORWARD CHAINING';
		if ($id==1) {
			$data = "$nama_web";
		}elseif ($id==2) {
			$data = "$ket_web";
		}elseif ($id==3) {
			$data = "$ket_web2";
		}else {
			$data = "$nama_web $ket_web $ket_web2";
		}
		return $data;
	}

  function pertanyaan($data)
	{
			return "Apakah $data ?";
	}

  function ket_hasil($nama,$jp='')
  {
      return "Berdasarkan gejala yang <b>$nama</b> alami, kami tidak menemukan <b>Masalah Kanken Mulut</b>.";
  }

  function hasil_diagnosa($id_user,$aksi='',$ke='')
  {
  	$jml_diagnosa 	= $this->db->get_where('tbl_diagnosa', array('id_user'=>$id_user,'jawab'=>'Ya','diagnosa_ke'=>$ke))->num_rows();

  					  $this->db->join('tbl_penyakit','tbl_penyakit.kode_penyakit=tbl_relasi.kode_penyakit');
  					  $this->db->join('tbl_diagnosa','tbl_diagnosa.kode_gejala=tbl_relasi.kode_gejala');
              $this->db->group_by('tbl_diagnosa.kode_gejala');
              $this->db->order_by('tbl_penyakit.kode_penyakit','DESC');
  	$hasil_diagnosa = $this->db->get_where('tbl_relasi', array('id_user'=>"$id_user",'jawab'=>'Ya','ket'=>'Ya','diagnosa_ke'=>$ke));

  	$nama			 = $this->db->get_where('tbl_user',"id_user='$id_user'")->row()->nama;

  	$hasil    = $this->M_Web->ket_hasil(ucwords($nama));
      $keterangan = '-';
      //$solusi   = '-';

  	if ($hasil_diagnosa->num_rows()!=0) {
  	      $kode_penyakit = $hasil_diagnosa->row()->kode_penyakit;
                        $this->db->join('tbl_diagnosa','tbl_diagnosa.kode_gejala=tbl_relasi.kode_gejala');
                        $this->db->group_by('tbl_diagnosa.kode_gejala');
          $jml_relasi = $this->db->get_where('tbl_relasi', array('kode_penyakit'=>$kode_penyakit,'jawab'=>'Ya','ket'=>'Ya','diagnosa_ke'=>$ke))->num_rows();

          $jml_relasi2 = $this->db->get_where('tbl_relasi', array('kode_penyakit'=>$kode_penyakit,'ket'=>'Ya'))->num_rows();
          if ($jml_diagnosa==$jml_relasi) {
            if ($jml_diagnosa==$jml_relasi2) {
              $hasil    = "<b>".$kode_penyakit."</b> - ".ucwords($hasil_diagnosa->row()->nama_penyakit);
              $keterangan = $hasil_diagnosa->row()->keterangan;
              //$solusi   = $hasil_diagnosa->row()->solusi;
            }
          }
      }

  	if ($aksi=='keterangan'){
  		$data = $keterangan;
  	//}elseif ($aksi=='solusi'){
  		//$data = $solusi;
  	}else{
  		$data = $hasil;
  	}
    return '<p style="white-space: pre-wrap;">'.$data.'</p>';
  }

	function footer()
	{
			return "Copyright &copy; 2019 | PKL 2019";
	}

}
