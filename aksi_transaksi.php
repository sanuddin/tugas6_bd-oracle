<?php
include("koneksi.php");
$hari_ini = date("dmY");

$act=$_GET['act'];

if ($act=='input'){
echo	$id_pembeli = $_POST['id_pembeli'];
echo	$id_beras = $_POST['id_beras'];
echo	$berat = $_POST['berat'];

	$sql = "INSERT INTO transaksi VALUES ('','$id_pembeli','$id_beras', '$berat', '$hari_ini')";
	$prepare = ociparse($koneksi, $sql);
    ociexecute($prepare);
    oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";} 

}

?>
