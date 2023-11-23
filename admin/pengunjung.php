<?php
//memasukkan file config.php
include('koneksi.php');
?>


<div class="container" style="margin-top:20px">
		<center><font size="6">Data Jumlah Pengunjung</font></center>
		<hr>
        <div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action" border="10"; cellpadding="10"; cellspacing="5">
            <thead>
                <tr>
                <th>JUMLAH PENGUNJUNG</th>
                </tr>
            </thead>        
            <tbody>
            <?php
            $cari= mysqli_query($koneksi, "SELECT * FROM pengunjung");
            while($row = mysqli_fetch_assoc($cari)){
            $hitung = $row['jumlah'];
            $baru = $hitung + 1;
            $terbaru = mysqli_query($koneksi, "UPDATE pengunjung SET jumlah = '".$baru."'");
                    echo '
						<tr>
							<td>'.$baru.'</td>
                        </tr>
                        ';
            }   
            ?>
            </tbody>
        </table>		   
</div>
</div>
