<?php
include ('connection.php');

$reception_name="";
$reception_ph="";
$reception_id="";


if(isset($_POST['Submit']))
{
	
    $reception_name= $_POST['r_name'];
    $reception_ph= $_POST['r_ph'];
	$reception_id= $_POST['reception_id'];


	$r_query = "INSERT INTO reception (Reception_id, R_name,  R_telephone_no) VALUES ('$reception_id','$reception_name','$reception_ph')";
    mysqli_query($conn, $r_query);

	header ('location: reception.html');
} 

?>