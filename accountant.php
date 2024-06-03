<?php
include ('connection.php');

$accountant_id="";
$accountant_name="";
$a_join="";
$a_leave="";


if(isset($_POST['Submit']))
{

	$accountant_id=$_POST['id'];
    $accountant_name= $_POST['a_name'];
    $a_join=$_POST['j_date'];
    $a_leave=$_POST['l_date'];


	$a_query = "INSERT INTO accountant (Accountant_id, A_name, Joined_date , Leave_date ) VALUES ('$accountant_id' ,'$accountant_name' , '$a_join' , '$a_leave')";
    mysqli_query($conn, $a_query);

	header ('location: accountant1.php');
} 

?>