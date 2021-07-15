<?php
session_start();

$conn = mysqli_connect("localhost","root","","alatlaboran");

if(isset($_POST['addnewalat'])){
    $nama_alat = $_POST['nama_alat'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];

    $addtotable = mysqli_query($conn,"insert into alat (nama_alat, deskripsi, stok) velues('$nama_alat','$deskripsi','$stok';)");
    if($addtotable){
        header('location:index.php');
    }else{
        echo 'Gagal';
        header('location:index.php');
    }
};



?>