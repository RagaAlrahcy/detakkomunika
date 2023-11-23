<?php include('koneksi.php'); ?>

		<center><font size="6">Tambah Data Pegawai</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			
			$nip			= $_POST['nip'];
			$nama			= $_POST['nama'];
			$posisi			= $_POST['posisi'];
			$alamat			= $_POST['alamat'];
			$no_hp			= $_POST['no_hp'];

			$cek = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_peg='$id_peg'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pegawai(nip, nama, posisi, alamat, no_hp) VALUES('$nip', '$nama', '$posisi','$alamat', '$no_hp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_peg";</script>';
				}else{
					echo '<div class="alert alert-warning">Proses melakukan tambah data gagal.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID Pegawai sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_peg" method="post" enctype="multipart/form-data">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIP</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nip" class="form-control" size="4" autocomplete="off" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nama" class="form-control" size="4" autocomplete="off" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">POSISI</label>
				<div class="col-md-6 col-sm-6 ">
						<select name='posisi' class="col-form-label col-md-5 col-sm-5 label-align">
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
					<input type="text" name="alamat" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NO.HANDPHONE</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_hp" class="form-control" autocomplete="off" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
			</div>
		</form>
	</div>




   