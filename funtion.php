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

if(isset($_POST['alatmasuk'])){
    $alatnya = $_POST['alatnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstoksekarang = mysqli_query($conn,"select * from stock where id_alat='$alatnya'");
    $ambildatanya = mysqli_fatch_array($cekstokalatsekarang);

    $stoksekarang = $ambildatanya['stok'];
    $tambahstoksekarangdenganqty = $stoksekarang+$qty

    $addtomasuk = mysqli_query($conn,"insert into masuk (id_alat, keterangan, qty) velues('$alatnya','$penerima','$qty')");
    $updatestokmasuk = mysqli_query($conn,"update stok set stok='$tambahstoksekarangdenganqty' where id_alat='$alatnya'");
    if($addtomasuk&&$updatestokmasuk){
        header('location:masuk.php');
    }else{
        echo 'Gagal';
        header('location:masuk.php');
    }
}

?>
