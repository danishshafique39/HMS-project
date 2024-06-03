<?php
include ('connection.php');

$patient_id = "";
$p_name = "";
$p_telephone_no = "";
$p_dob = "";
$city = "";
$street = "";
$zip_code ="";
$Arrival_time =""; 
$reception_id="";

// Update Functionality
if(isset($_POST['Update'])) {
    $patient_id = $_POST['patient_id'];
    $p_name = $_POST['p_name'];
    $p_telephone_no = $_POST['p_telephone_no'];
    $p_dob = $_POST['p_dob'];
    
    $update_query = "UPDATE patientinfo SET P_name = '$p_name', P_telephone_no = '$p_telephone_no', P_DOB = '$p_dob' WHERE Patient_id = '$patient_id'";
    mysqli_query($conn, $update_query);

    header ('location: patient1.php');
}


if(isset($_POST['Submit']))
{
	$patient_id = $_POST['patient_id'];
	$p_name = $_POST['p_name'];
	$p_telephone_no = $_POST['p_telephone_no'];
	$p_dob = $_POST['p_dob'];

    $p_dob_formatted = date_create($p_dob)->format('Y-m-d');
	$city = $_POST['city'];
	$street = $_POST['street'];
	$zip_code = $_POST['zip_code'];
	$Arrival_time = $_POST['Arrival_time'];
	$reception_id= $_POST['reception_id'];

	$patientinfo_query = "INSERT INTO patientinfo (Patient_id, P_name, P_telephone_no, P_DOB) VALUES ('$patient_id', '$p_name', '$p_telephone_no', '$p_dob')";
	mysqli_query($conn, $patientinfo_query);

	$address_query = "INSERT INTO address (Patient_id, city, street, zip_code) VALUES ('$patient_id', '$city', '$street', '$zip_code')";
	mysqli_query($conn, $address_query);

	$p_query = "INSERT INTO patient (Patient_id, Reception_id, Arrival_time) VALUES ('$patient_id','$reception_id','$Arrival_time')";
    mysqli_query($conn, $p_query);

	header ('location: patient1.php');
} 

if(isset($_GET['del']))
{
    $P_id=$_GET['del'];
    mysqli_query($conn,"Delete from patient where patient_id='$P_id'" );
    header('location: patient1.php');

}
?>
!<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="form.css">
    <title>Patient</title>
    <link rel="stylesheet" href="Patient.css">
</head>
<body>
<?php 
    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];

        
        $edit_query = "SELECT * FROM patientinfo WHERE Patient_id = '$edit_id'";
        
        $edit_result = mysqli_query($conn, $edit_query);

        if ($edit_result) {
            $edit_data = mysqli_fetch_assoc($edit_result);

            // Assign fetched data to variables
        
            $patient_id = $edit_data['Patient_id'];
            $p_name = $edit_data['P_name'];
            $p_telephone_no = $edit_data['P_telephone_no'];
            $p_dob = $edit_data['P_DOB'];
            $city = "";
            $street = "";
            $zip_code = "";
            $Arrival_time = "";
            $reception_id = "";

            // Output the edit form
            echo "
            <form method='post' action='patient1.php' style='display:hidden;'>
                <input type='hidden' name='patient_id' value='$patient_id'>

                <label for='p_name'>Patient Name:</label><br>
                <input type='text' id='p_name' name='p_name' value='$p_name' required><br>

                <label for='p_telephone_no'>Patient Telephone Number:</label><br>
                <input type='tel' id='p_telephone_no' name='p_telephone_no' value='$p_telephone_no' required><br>

                <label for='p_dob'>Patient Date of Birth:</label><br>
                <input type='date' id='p_dob' name='p_dob' value='$p_dob' required><br>
                
                <input type='submit' name='Update' value='Update'>
            </form>
        ";
        }
    } else {
        // Output the regular form for adding new patients
        echo "
      
        ";
    }

?>

<body>
</html>