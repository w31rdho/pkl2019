<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
  </head>
  <body onload="window.print();">
    <h1 align="center"><?php echo $judul_web; ?></h1>

    <table border="1" width="100%">
      <thead>
        <tr>
          <th width="1">No.</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
         foreach ($v_data->result() as $key => $value): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $value->nama; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
