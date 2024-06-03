<?php
include ('connection.php');

$patient_id = "";
$doctor_id = "";
$description = "";
$dia_date = "";
$d_query = "";

if(isset($_POST))
{
	
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['Doctor_id'];
    $description = $_POST['illness_name'];
    $dia_date = $_POST['dia_date'];
    
	$d_query = "INSERT INTO diagnosis (Patient_id,  Doctor_id, Description , Diagnosis_date) VALUES ('$patient_id','$doctor_id','$description' , '$dia_date' )";
    mysqli_query($conn, $d_query);
    if (! mysqli_query($conn, $d_query))
     {
        echo "Error: " . mysqli_error($conn);
    }

	header ('location: diagnosis.html');
} 

?>