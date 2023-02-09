<div class="container">
    <div class="row">
        <div class="col-md-12" mt-3>
            <p>Selamat Datang Namamasyarakat <?php echo $_SESSION['nama']?></p>
            <div class="card">
                <div class="card-header">
                    FORM PENGADUAN
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Judul Laporan</label>
                            <input type="text" class="form-control" name="judul_laporan" placeholder="Masukan Judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Laporan</label>
                            <textarea class="form-control" name="isi_laporan" placeholder="Masukan isi Laporan" required></textarea>
                            <!-- <input type="password" class="form-control" name="password" placeholder="Masukan Password" required> -->
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim" class="btn btn-primary">KIRIM</button>
                </div>
                </form>
            <?php 
           include '../config/koneksi.php';
           $tanggal = date("Y-m-d");
           if (isset($_POST['kirim'])) {
            $nik = $_SESSION['nik'];
            $judul_laporan = $_POST['judul_laporan'];
            $isi_laporan = $_POST['isi_laporan'];
            $status = 0;
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $lokasi = '../assets/img/';
            $nama_foto = rand(0,999).'-'.$foto;

            move_uploaded_file($tmp, $lokasi.$nama_foto);
            $query = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('','$tanggal','$nik','$isi_laporan','$nama_foto','$status')");

            echo " <script>
            alert('Data berhasil dikirim');
            Window.location='index.php';
            </script>
            ";

           } 
            
            
            
            ?>    


            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12" mt-3>
        <div class="card">
                <div class="card-header">
                    RIWAYAT PENGADUAN
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JUDUL</th>
                                <th>ISI</th>
                                <th>FOTO</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $nik = $_SESSION['nik'];
                            $query = mysqli_query($koneksi, "SELECT *FROM pengaduan WHERE $nik='$nik' ORDER BY id_pengaduan DESC");
                            while ($data = mysqli_fetch_assoc($query)) {  ?>
                            <tr>
                                <td><?php echo $no++;  ?></td>
                                <td><?php echo $data['judul_laporan'] ?></td>
                                <td><?php echo $data ['isi_laporan'] ?></td>
                                <td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
                                <td>
                                 <?php
                                 if ($data['status'] == 'proses') {
                                    echo "<span class ='badge bg-warning'>Proeses</span>";
                                 } elseif ($data['status'] == 'selesai') {
                                    echo "<span class ='badge bg-success'>Selesai</span>";
                                 } else {
                                    echo "<span class ='badge bg-danger'>Menunggu</span>";
                                 }
                                    {

                                 }
                                  ?>
                                </td>
                                <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>

                            <?php } ?>                            
                        
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>