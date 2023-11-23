<?php
//memasukkan file config.php
include('koneksi.php');
?>
<!-- Font Awesome -->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Portfolio Perusahaan</font></center>
		<hr>
		<a href="index.php?page=tambah_port"><button class="btn btn-dark right">Tambah Data</button></a>

        <br>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action" border="10"; cellpadding="10"; cellspacing="5">
            <thead align="center">
                <tr>
                <th>NO.</th>
                <th>KODE PORTFOLIO</th>
                <th>NAMA PERUSAHAAN</th>
                <th>DESKRIPSI</th>
                <th>PORTFOLIO</th>
                <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>

            <?php $nomor=1; ?>
                <?php include 'koneksi.php';?>
                <?php $ambil=$koneksi->query("SELECT * FROM portfolio")?>
                <?php while($tmpl = $ambil->fetch_assoc()){ ?>
                <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $tmpl['kd_port']; ?></td>
                <td><?php echo $tmpl['nm_perusahaan']; ?></td>
                <td><?php echo $tmpl['deskripsi']; ?></td>
                <td>
                    <img src="assets/images/<?php echo $tmpl['port']; ?>" width="100">
                </td>
                <td>
                    <a href="index.php?page=edit_port&id=<?php echo $tmpl['id']; ?>" i class="fa fa-pencil-square-o fa-2x ml-4 mr-3" aria-hidden="true"></i></a>
                    <a href="hapus_port.php?page=tampil_port&id=<?php echo $tmpl['id']; ?>" i class="fa fa-trash-o fa-2x" aria-hidden="true" onclick="return confirm('Yakin ingin menghapus data ini?')"></a>
                </td>
                </tr>
            <?php $nomor++; ?>
            <?php } ?>
            
            </tbody>
        </table>
	</div>
	</div>
