<?php include('koneksi.php'); ?>

        <center><font size="6">Tambah Data User</font></center>
        <hr>
        <?php
        if(isset($_POST['submit'])){
          
            $nama		= $_POST['nama'];
            $kontak	    = $_POST['kontak'];
            $pesan  	= $_POST['pesan'];
            

            $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($cek) == 0){
              $sql = mysqli_query($koneksi, "INSERT INTO user(nama, kontak, pesan) VALUES('$nama', '$kontak','$pesan')") or die(mysqli_error($koneksi));

              if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_user";</script>';
              }else{
                echo '<div class="alert alert-warning">Proses melakukan tambah data gagal.</div>';
              }
            }else{
              echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
            }
        }
        ?>

        <form action="index.php?page=tambah_pengguna" method="post" enctype="multipart/form-data">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="nama" class="form-control" size="4" autocomplete="off" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">EMAIL</label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="kontak" class="form-control" size="4" autocomplete="off" required>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">PESAN</label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="pesan" class="form-control" autocomplete="off" required>
            </div>
          </div>
          
          <div class="item form-group">
            <div  class="col-md-6 col-sm-6 offset-md-3">
              <input type="submit" name="submit" class="btn btn-success" value="Simpan">
          </div>
        </form>
      </div>
