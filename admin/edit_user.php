<?php
//memasukkan file config.php
include('koneksi.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data User</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel pegawai berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$kontak		    = $_POST['kontak'];
			$pesan		    = $_POST['pesan'];
			

			$sql = mysqli_query($koneksi, "UPDATE user SET nama='$nama', kontak='$kontak', pesan='$pesan' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=tampil_user";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_user&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" autocomplete="off" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">EMAIL</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kontak" autocomplete="off" class="form-control" value="<?php echo $data['kontak']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">PESAN</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pesan" autocomplete="off" class="form-control" value="<?php echo $data['pesan']; ?>" required>
				</div>
			</div>
		
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
					<a href="index.php?page=tampil_user" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
