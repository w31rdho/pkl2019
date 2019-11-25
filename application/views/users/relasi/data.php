<div class="col-md-6">
  <table width="100%" border="0">
    <?php foreach ($v_gejala->result() as $key => $value): ?>
      <tr>
        <th width="2%" valign="top"><?php echo $value->kode_gejala; ?></th>
        <th width="1%" valign="top">&nbsp;:&nbsp;</th>
        <td><?php echo $value->nama_gejala; ?></th>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="col-md-6">
  <table width="100%" border="0">
    <?php foreach ($v_penyakit->result() as $key => $value): ?>
      <tr>
        <th width="2%" valign="top"><?php echo $value->kode_penyakit; ?></th>
        <th width="1%" valign="top">&nbsp;:&nbsp;</th>
        <td><?php echo $value->nama_penyakit; ?></th>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
