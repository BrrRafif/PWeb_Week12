<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?> <!DOCTYPE html>
<html>
<head>
    <title>Upload Foto Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Pengunggahan Data Siswa<br> SMKN 198 Batam</h1>
        </header>

        <nav class="menu">
            <ul>
                <li><a href="form-daftar.php">Daftar Baru</a></li>
                <li><a href="list-siswa.php">Pendaftar</a></li>
            </ul>
        </nav>

        <?php if(isset($_GET['status'])): ?>
            <p class="flash-message">
                <?php
                    if($_GET['status'] == 'sukses'){
                        echo "Pengunggahan data siswa berhasil!";
                    } else {
                        echo "Pengunggahan data siswa gagal!";
                    }
                ?>
            </T>
        <?php endif; ?>
        
    <?php include 'footer.php'; ?>
                    