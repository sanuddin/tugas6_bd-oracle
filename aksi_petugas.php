<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_petugas=$_GET['id_petugas'];
	$sql="DELETE FROM petugas WHERE id_petugas = '$id_petugas'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:petugas.php');
}

elseif ($act=='input'){
    $id_petugas = $_POST["id_petugas"];
	$nama_petugas = $_POST["nama_petugas"];

   $sql="insert into petugas values ('$id_petugas','$nama_petugas') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:petugas.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_petugas = $_POST["id_petugas"];
	$nama_petugas = $_POST["nama_petugas"];
	

	$sql = "UPDATE PETUGAS SET NAMA_PETUGAS='$nama_petugas' WHERE ID_PETUGAS='$id_petugas'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:petugas.php');
	}
	else {echo "gagal";}
   



}
?>
