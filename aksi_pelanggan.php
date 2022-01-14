<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_pelanggan=$_GET['id_pelanggan'];
	$sql="DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:pelanggan.php');
}

elseif ($act=='input'){
    $id_pelanggan = $_POST["id_pelanggan"];
	$nama_pelanggan = $_POST["nama_pelanggan"];
	$alamat = $_POST ["alamat"];
 	$telepon = $_POST["telepon"];

   $sql="insert into pelanggan values ('$id_pelanggan','$nama_pelanggan','$alamat','$telepon') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:pelanggan.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_pelanggan = $_POST["id_pelanggan"];
	$nama_pelanggan = $_POST["nama_pelanggan"];
	$alamat = $_POST ["alamat"];
 	$telepon = $_POST["telepon"];
	

	$sql = "UPDATE PELANGGAN SET NAMA_PELANGGAN='$nama_pelanggan', ALAMAT='$alamat', TELEPON='$telepon' WHERE ID_PELANGGAN='$id_pelanggan'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:pelanggan.php');
	}
	else {echo "gagal";}
   



}
?>
