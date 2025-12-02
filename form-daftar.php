<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?> <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Formulir Pengunggahan Data Siswa <br>SMKN 198 Batam</h1>
        </header>
 
        <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
            <label for="nis">Nomor Induk Siswa: </label>
            <input type="text" name="nis" placeholder="NIS" required/>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" placeholder="nama lengkap" required />

            <label>Jenis Kelamin:</label>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan" required> Perempuan</label>
            <br>

            <label for="telepon">Nomor Telepon: </label>
            <input type="text" name="telp" placeholder="nomor telepon" required />
        
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" required></textarea>

            <label for="foto">Foto: </label>
            <input type="file" name="foto" placeholder="unggah foto" id="inputFoto" onchange="tampilkanPreview(this, 'previewFoto')" required /><br><br>
            <img src="" class="image" id="previewFoto" style="display:none;"/>

            <button type="submit" name="daftar" class="btn-primary">Daftar</button>
            

        </form>
        <br><br>
        <div class="back-button-container">
            <a href="index.php" class="back-button">Kembali ke Halaman Awal</a>
        </div>
        
        <script src="script.js" defer></script>
    
    <?php include("footer.php"); ?>