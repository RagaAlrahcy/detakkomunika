<?php 
include('koneksi.php');
?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Pesan User</font></center>
		<hr>
        <a href="index.php?page=tambah_pengguna"><button class="btn btn-dark right">Tambah Data</button></a>
		
		<form action="" method="post">
			<input type="text" name="cari" size="20" autofocus placeholder="Masukkan Nama..." autocomplete="off">
			<button type="submit" name="submit" class="btn btn-primary">Cari</button>
		</form>
		<br>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action" border="10"; cellpadding="10"; cellspacing="5">
            <thead align="center">
                <tr>
                <th>NO.</th>
                <th>NAMA PENGUNJUNG</th>
                <th>ALAMAT EMAIL</th>
                <th>PESAN</th>
                <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>

                <?php
				//query ke database SELECT tabel user urut berdasarkan id yang paling kecil
				$sql = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id ASC") or die(mysqli_error($koneksi));
				//cek dulu tombol submit
				if(isset($_POST['submit'])){
					$cari = $_POST['cari'];
					$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE nama LIKE '%$cari%'");

				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM user");
				}
					//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
					if(mysqli_num_rows($sql) > 0){
						//membuat variabel $no untuk menyimpan nomor urut
						$no = 1;
						//melakukan perulangan while dengan dari dari query $sql
						while($data = mysqli_fetch_assoc($sql)){
							//menampilkan data perulangan
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$data['nama'].'</td>
								<td>'.$data['kontak'].'</td>
								<td>'.$data['pesan'].'</td>
								
								<td>
									<a href="index.php?page=edit_user&id='.$data['id'].'" i class="fa fa-pencil-square-o fa-2x ml-4 mr-3" aria-hidden="true"></i></a>
									<a href="hapus_user.php?id='.$data['id'].'" i class="fa fa-trash-o fa-2x" aria-hidden="true" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"></a>
								</td>
							</tr>
							';
							$no++;
						}
					//jika query menghasilkan nilai 0
					}else{
						echo '
						<tr>
							<td colspan="5">Tidak ada data.</td>
						</tr>s
						';
					}
				?>
            </tbody>
        </table>
	</div>
	</div>
