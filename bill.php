<?php
include ('connection.php');

$bill_no="";
$ammount="";
$gen_date="";
$gen_time="";
$patient_id = "";
$accountant_id="";

if(isset($_POST['Submit']))
{

	$bill_no= $_POST['bill_no'];
    $ammount= $_POST['amount'];
    $gen_date= $_POST['gen_date'];
    $gen_time= $_POST['gen_time'];
    $patient_id = $_POST['patient_id'];
    $accountant_id=  $_POST['Accountant_id'];


	$b_query = "INSERT INTO bill (Bill_no, Amount, Gen_date, Gen_time) VALUES ( '$bill_no', '$ammount','$gen_date', '$gen_time')";
    mysqli_query($conn, $b_query);

    $p_query = "INSERT INTO pays (Patient_id, Bill_no, Accountant_id) VALUES ('$patient_id','$bill_no','$accountant_id')";
    mysqli_query($conn, $p_query);

   
	header ('location: bill.html');
} 

?>