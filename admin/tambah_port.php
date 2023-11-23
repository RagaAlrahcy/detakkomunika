<?php
//memasukkan file config.php
include('koneksi.php');
?>
	
		<center><font size="6">Tambah Data Portfolio</font></center>
		<hr>
        <?php  
        if (isset($_POST['submit'])) 
        {
            $nama = $_FILES['port']['name'];
            $lokasi = $_FILES['port']['tmp_name'];
            move_uploaded_file($lokasi,"assets/images/".$nama);
            $koneksi->query("INSERT INTO portfolio
                (kd_port, nm_perusahaan, deskripsi ,port)
                VALUES('$_POST[kd_port]','$_POST[nm_perusahaan]','$_POST[deskripsi]','$nama')");

            echo "<div class='alert alert-info'>Data Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?page=tampil_port'>";
        }
        ?>
        

		<form action="index.php?page=tambah_port" method="post" enctype="multipart/form-data">
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">KODE PORTFOLIO</label>
				<div class="col-md-6 col-sm-6 ">
						<select name='kd_port' class="col-form-label col-md-5 col-sm-5 label-align">
							<option value=''>-KODE PORTFOLIO-</option>
							<option value='LG'>LOGO</option>
							<option value='CMP'>COMPANY PROFILE</option>
							<option value='AR'>ANNUAL REPORT</option>
                            <option value='CDR'>CALENDAR</option>
							<option value='MKT'>MARKETING TOOLS</option>
							<option value='PAD'>PRINT AD</option>
							<option value='SVR'>SOUVENIR</option>
						</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA PERUSAHAAN</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nm_perusahaan" class="form-control" size="4" autocomplete="off" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">DESKRIPSI</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="deskripsi" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">PORTFOLIO</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="port" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
			</div>
		</form>
	</div>
	
	
