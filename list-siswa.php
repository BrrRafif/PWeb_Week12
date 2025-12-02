<?php include("config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Siswa SMKN 198 Batam</h1>
            <h2>Tahun Ajaran 2025/2026</h2>
        </header>

        <br>

        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM siswa";
                $query = mysqli_query($db, $sql);

                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td><img src='crud_upload/image/".$siswa['foto']."' class='image-table'/></td>";
                    echo "<td class='column-name'>".$siswa['nis']."</td>";
                    echo "<td class='column-name'>".$siswa['nama']."</td>";
                    echo "<td class='column-name'>".$siswa['jenis_kelamin']."</td>";
                    echo "<td class='column-name'>".$siswa['telp']."</td>";
                    echo "<td class='column-name'>".$siswa['alamat']."</td>";
                    echo "<td class='action-links'>";
                    echo "<a href='form-edit.php?nis=".$siswa['nis']."'><span class='glyphicon glyphicon-edit' title='Edit Data'></span></a>| ";    
                    echo "<a href='hapus.php?nis=".$siswa['nis']."'><span class='glyphicon glyphicon-trash' title='Hapus Data' onclick=\"return confirm('Apakah Anda Yakin?')\"></span></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <p class="total">Total: <?php echo mysqli_num_rows($query) ?></p>

        <div class="back-button-container">
            <a href="index.php" class="back-button">Kembali ke Halaman Awal</a>
        </div>
        
    <?php include("footer.php"); ?>



