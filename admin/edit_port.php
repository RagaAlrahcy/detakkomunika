<?php
//memasukkan file config.php
include('koneksi.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data Portfolio</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel pegawai berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM portfolio WHERE id='$id'") or die(mysqli_error($koneksi));

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
			$kd_port		= $_POST['kd_port'];
			$nm_perusahaan	= $_POST['nm_perusahaan'];
			$deskripsi		= $_POST['deskripsi'];
			$nama = $_FILES['port']['name'];
            $lokasi = $_FILES['port']['tmp_name'];
            move_uploaded_file($lokasi,"assets/images/".$nama);
			$sql = mysqli_query($koneksi, "UPDATE portfolio SET kd_port='$kd_port', nm_perusahaan='$nm_perusahaan', deskripsi='$deskripsi', port='$nama'  WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=tampil_port";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>


        <form action="index.php?page=edit_port&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">KODE PORTFOLIO</label>
				<div class="col-md-6 col-sm-6 ">
						<select name='kd_port' class="col-form-label col-md-5 col-sm-5 label-align" value="<?php echo $data['kd_port']; ?>" required>
							<option value='LG'>LOGO</option>
							<option value='CMP'>COMPANY PROFILE</option>
							<option value='AR'>ANNUAL REPORT</option>
                            <option value='CDR'>CALENDAR</option>
							<option value='MKT'>MARKETING TOOLS</option>
							<option value='PAD'>PRINT AD</option>
						</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA PERUSAHAAN</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nm_perusahaan" autocomplete="off" class="form-control" size="4" value="<?php echo $data['nm_perusahaan']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">DESKRIPSI</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="deskripsi" autocomplete="off" class="form-control" value="<?php echo $data['deskripsi']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">PORTFOLIO</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="port" value="<?php echo $data['port']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
					<a href="index.php?page=tampil_port" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>



