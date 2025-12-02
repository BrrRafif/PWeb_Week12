<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("config.php");

if(isset($_POST['simpan'])){

    $nis_lama = $_POST['nis_lama'];
    $nis_baru = $_POST['nis_baru'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if( isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "" ) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $path = "crud_upload/image/".$foto;
        move_uploaded_file($tmp, $path);
        $sql = "UPDATE siswa SET nis='$nis_baru', nama='$nama', alamat='$alamat', jenis_kelamin='$jk', telp='$telp', foto='$foto' WHERE nis='$nis_lama'";
    }

    else {
        $sql = "UPDATE siswa SET nis='$nis_baru', nama='$nama', alamat='$alamat', jenis_kelamin='$jk', telp='$telp' WHERE nis='$nis_lama'";
    }

    $query = mysqli_query($db, $sql);

    if( $query ) header('Location: list-siswa.php');
        
    else die("Gagal menyimpan perubahan...");
}

else die("Akses dilarang...");

?>