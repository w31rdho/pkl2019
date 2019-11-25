<?php $this->load->view('web/diagnosa/atas'); ?>

<style>
  #jarak{
      padding-left:0px;padding-right:0px;vertical-align:top;
  }
  #v_top{
    vertical-align:top;
  }
</style>


<table class="table" width="100%">
  <tr>
    <th width="16%" id="v_top">NAMA LENGKAP</th>
    <th width="1%" id="jarak">:</th>
    <td width="87%" id="jarak"><?php echo ucwords($query->nama); ?></td>
  </tr>
  <tr>
    <th id="v_top">E-MAIL</th>
    <th id="jarak">:</th>
    <td id="jarak"><?php echo $query->email; ?></td>
  </tr>
  <tr>
    <th id="v_top">NO. HP</th>
    <th id="jarak">:</th>
    <td id="jarak"><?php echo $query->no_hp; ?></td>
  </tr>
  <tr>
    <th id="v_top">ALAMAT</th>
    <th id="jarak">:</th>
    <td id="jarak"><?php echo $query->alamat; ?></td>
  </tr>
  <tr>
    <th id="v_top">JAWABAN PENGGUNA</th>
    <th id="jarak">:</th>
    <td id="jarak">
      <ul>
        <?php foreach ($v_diagnosa->result() as $key => $value):?>
          <li><?php echo $value->kode_gejala; ?> - <?php echo ucwords($value->nama_gejala); ?> <b>(<?php echo strtoupper($value->jawab); ?>)</b></li>
        <?php endforeach; ?>
      </ul>
    </td>
  </tr>
  <tr>
    <th id="v_top">HASIL <br> <div style="font-size:10px;">Forward Chaining</div> </th>
    <th id="jarak">:</th>
    <td id="jarak">
      <?php echo $this->M_Web->hasil_diagnosa($query->id_user,'hasil',$diagnosa_ke); ?>
    </td>
  </tr>
  <tr>
    <th id="v_top">KETERANGAN</th>
    <th id="jarak">:</th>
    <td id="jarak">
      <?php echo $this->M_Web->hasil_diagnosa($query->id_user,'keterangan',$diagnosa_ke); ?>
    </td>
  </tr>
 
  <tr>
    <td colspan="3"><center><a href="diagnosa/hasil/<?php echo $query->id_user; ?>/cetak/<?php echo $query->diagnosa_ke; ?>" target="_blank" class="btn btn-success"><i class="icon-printer2"></i> CETAK HASIL KONSULTASI</a></td>
  </tr>
</table>


<?php $this->load->view('web/diagnosa/bawah'); ?>
