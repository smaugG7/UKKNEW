<?php 
$koneksi = mysqli_connect("localhost","root","","pengaduan_masyarakat");

if ($koneksi) {
    echo "Tersambung";
} else{
 echo "Tidak Tersambung";   
}
?>