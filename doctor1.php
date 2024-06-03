<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	  table {
           
            background-color: whitesmoke;
            
        }
	</style>
	
</head>
<body>
    <div class="navbar">
      <a href="homepage.html">Home</a>
      <a href="patient1.php" >Patient</a>
      <a href="bill.html">Bill</a>
      <a href="doctor1.php"class="active">Doctor</a>
      <a href="nurse.html">Nurse</a>
      <a href="diagnosis.html">Diagnosis</a>
      <a href="reception.html">Reception</a>
      <a href="accountant.html">Accountant</a>

        <div class="navbar-right">
          <a href="aboutfaculty.html">About Faculty</a>
        </div>
      </div>
<h2>Doctor Form</h2>

<form method="post" action= "doctor.php">
    <label for="Doctor_id">Doctor Id:</label>
  <input type="text" id="Doctor_id" name="Doctor_id" required>

  <label for="Designation">Designation:</label>
  <input type="text" id="Designation" name="Designation" required>

  <label for="D_name">Doctor Name:</label>
  <input type="text" id="D_name" name="D_name" required>
  
  <label for="D_Gender">Gender:</label>
  <select name="D_Gender" id="D_Gender">

    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>

  <input type= "submit" value= "submit" name= "Submit">
</form>
<h1 style="text-align:center; color: white;">All Doctors</h1>


<div style="display:flex;justify-content:center">
<?php  
include("connection.php");
// SQL query to retrieve doctor data
$sql = "SELECT * FROM doctor";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
   
    echo "<table border='1'>
            <tr>
                <th>Doctor Id</th>
                <th>Designation</th>
                <th>Doctor Name</th>
                <th>Gender</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Doctor_id']}</td>
                <td>{$row['Designation']}</td>
                <td>{$row['D_name']}</td>
                <td>{$row['D_Gender']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
// Close the database connection
$conn->close();
  ?>
</div>
</body>
</html>
