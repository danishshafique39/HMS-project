<?php
include ('connection.php');

$id="";
$name="";
$designation="";
$gender="";
$d_query="";

if(isset($_POST))
{
    $id= $_POST['Doctor_id'];
	$name= $_POST['Designation'];
    $designation= $_POST['D_name'];
    $gender= $_POST['D_Gender'];


	$d_query = "INSERT INTO doctor (Doctor_id, Designation,  D_name, D_Gender ) VALUES (' $id','$name',' $designation' ,  '$gender')";
    mysqli_query($conn, $d_query);

	header ('location: doctor1.php');
}

 

?>