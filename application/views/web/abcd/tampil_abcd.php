<a href="abcd/tambah" class="btn btn-primary">Tambah Data</a>
<a href="abcd/cetak" class="btn btn-info" style="float:right;" target="_blank">Cetak</a>
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<table class="table table-striped table-bordered" width="100%">
  <thead>
    <tr>
      <th width="1">No.</th>
      <th>Nama</th>
      <th width="200">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
     foreach ($v_data->result() as $key => $value): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $value->nama; ?></td>
        <td class="text-center">
          <a href="abcd/edit/<?php echo $value->id_tes; ?>" class="btn btn-success">Edit</a>
          <a href="abcd/hapus/<?php echo $value->id_tes; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin?');">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
