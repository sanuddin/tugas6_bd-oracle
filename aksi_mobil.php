<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_mobil=$_GET['id_mobil'];
	$sql="DELETE FROM mobil WHERE id_mobil = '$id_mobil'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:mobil.php');
}

elseif ($act=='input'){
    $id_mobil = $_POST["id_mobil"];
	$plat_nomor = $_POST["plat_nomor"];
	$merk = $_POST ["merk"];
 	$harga = $_POST["harga"];

   $sql="insert into mobil values ('$id_mobil','$plat_nomor','$merk','$harga') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:mobil.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_mobil = $_POST["id_mobil"];
	$plat_nomor = $_POST["plat_nomor"];
	$merk = $_POST ["merk"];
 	$harga = $_POST["harga"];
	

	$sql = "UPDATE MOBIL SET PLAT_NOMOR='$plat_nomor', MERK='$merk', HARGA='$harga' WHERE ID_MOBIL='$id_mobil'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:mobil.php');
	}
	else {echo "gagal";}
   



}
?>
