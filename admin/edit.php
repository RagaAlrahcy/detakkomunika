<?php include('koneksi.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data Pegawai</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_peg'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_peg = $_GET['id_peg'];

			//query ke database SELECT tabel pegawai berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_peg='$id_peg'") or die(mysqli_error($koneksi));

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
			$nip			= $_POST['nip'];
			$nama			= $_POST['nama'];
			$posisi			= $_POST['posisi'];
			$alamat			= $_POST['alamat'];
			$no_hp			= $_POST['no_hp'];

			$sql = mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip', nama='$nama', posisi='$posisi', alamat='$alamat', no_hp='$no_hp' WHERE id_peg='$id_peg'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_peg";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_peg&id_peg=<?php echo $id_peg; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nip" autocomplete="off" class="form-control" value="<?php echo $data['nip']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" autocomplete="off" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">POSISI</label>
				
				<div class="col-md-6 col-sm-6 ">
						<select name='posisi' class="form-control" value="<?php echo $data['posisi']; ?>" required>
							<option value=''>Pilih Posisi Anda</option>
							<option value='HRD'>HRD</option>
							<option value='Manager Keuangan'>MANAGER KEUANGAN</option>
							<option value='Designer Grafis'>DESIGNER GRAFIS</option>
							<option value='Staf Keuangan'>STAF KEUANGAN</option>
							<option value='Entry Naskah'>ENTRY NASKAH</option>
						</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ALAMAT</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" autocomplete="off" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NO. HANDPHONE</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_hp" autocomplete="off" class="form-control" value="<?php echo $data['no_hp']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
					<a href="index.php?page=tampil_peg" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
