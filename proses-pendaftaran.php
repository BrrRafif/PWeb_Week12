<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("config.php");

if(isset($_POST['daftar'])){
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $path = "crud_upload/".$foto;
    
    $cek_nis = mysqli_query($db, "SELECT nis FROM siswa WHERE nis = '$nis'");
    if(mysqli_num_rows($cek_nis) > 0){
        echo "<script>alert('NIS $nis sudah terdaftar! Gunakan NIS lain.'); window.location.href='form-daftar.php';</script>";
        exit;
    }
        if(move_uploaded_file($tmp, $path)) {
        
        $sql = "INSERT INTO siswa (foto, nis, nama, jenis_kelamin, telp, alamat) 
                VALUES ('$foto', '$nis', '$nama', '$jk', '$telp', '$alamat')";
        
        $query = mysqli_query($db, $sql);

        if( $query ) header('Location: index.php?status=sukses');
        
        else (': index.php?status=gagal');
        

    } 
    
    else {
        echo "Maaf, Gambar gagal diupload.";
        echo "<br><a href='form-daftar.php'>Kembali Ke Form</a>";
    }

} 

else die("Akses dilarang...");

?>