<?php
include ('connection.php');

$id="";
$name="";
$gender="";
$n_query="";

if(isset($_POST['submit']))
{
	
    $id= $_POST['nurse_id'];
    $name= $_POST['n_name'];
	$gender= $_POST['n_gender'];
    

	$n_query = "INSERT INTO nurse (Nurse_id, N_name,N_gender,Doctor_id) VALUES ('$id','$name','$gender')";
    mysqli_query($conn, $n_query);
    
    header ('location: nurse.html');
   
} 

?>