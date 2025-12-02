<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
include("config.php");

if( isset($_GET['nis']) ){

    $nis = $_GET['nis'];

    $sql = "DELETE FROM siswa WHERE nis=$nis";
    $query = mysqli_query($db, $sql);

    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>