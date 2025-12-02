<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
include("config.php");

if( !isset($_GET['nis']) ){
    header('Location: list-siswa.php');
    exit;
}

$nis = $_GET['nis'];

$sql = "SELECT * FROM siswa WHERE nis=$nis";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container"> 
        <header>
            <h1>Ubah Data Diri Siswa</h1> 
        </header>

        <form action="proses-edit.php" method="POST" enctype="multipart/form-data">

            <p>
                <label for="nis">Nomor Induk Siswa: </label>
                <input type="hidden" name="nis_lama" value="<?php echo $siswa['nis']; ?>">
                <input type="text" name="nis_baru" value="<?php echo $siswa['nis']; ?>" required />
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['nama'] ?>" />
            </p>
            <p>
                <label>Jenis Kelamin:</label>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php if($siswa['jenis_kelamin'] == 'laki-laki') echo 'checked'; ?> required> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php if($siswa['jenis_kelamin'] == 'perempuan') echo 'checked'; ?> required> Perempuan</label>
            </p>    
            <p>
                <label for="telepon">Nomor Telepon: </label>
                <input type="text" name="telp" placeholder="nomor telepon" value="<?php echo $siswa['telp'] ?>" />

            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
            </p>
            <p>
                <label for="foto">Foto: </label>
                <input type="file" name="foto" id="inputFoto" onchange="tampilkanPreview(this,'previewFoto')"/>
                <img src="crud_upload/image/<?php echo $siswa['foto'] ?>" class="image" id="previewFoto"/>
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" class="btn-primary"/>
            </p>

        </form>

        <script src="script.js" defer></script>

        <?php include 'footer.php'; ?>