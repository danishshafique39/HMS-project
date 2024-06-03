<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="form.css">
	<style>
	  table {
           
            background-color: whitesmoke;
            
        }
	</style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.html">Home</a>
        <a href="patient1.php">Patient</a>
        <a href="bill.html">Bill</a>
        <a href="doctor.html">Doctor</a>
        <a href="nurse.html">Nurse</a>
        <a href="diagnosis.html">Diagnosis</a>
        <a href="reception.html"class="active">Reception</a>
        <a href="accountant1.php">Accountant</a>

        <div class="navbar-right">
          <a href="aboutfaculty.html">About Faculty</a>
        </div>
      </div>
      <h2>Reception Information Form</h2>

      <form method="post" action="reception.php">

            <label for="reception_id">id:</label><br>
            <input type="text" id="reception_id" name="reception_id" required><br>

            <label for="r_name">Name:</label><br>
            <input type="text" id="r_name" name="r_name" required><br>
            
            <label for="r_ph">Telephone no:</label><br>
            <input type="text" id="r_ph" name="r_ph" required><br>

            <input type="submit" name="Submit" value="Submit">
      </form> 
	  <h1 style="text-align:center">All Reception</h1>

<div style="display:flex;justify-content:center">
<?php  
include("connection.php");
// SQL query to retrieve doctor data
$sql = "SELECT * FROM reception";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {

    echo "<table border='1'>
            <tr>
                <th>Reception Id</th>
                <th>Name</th>
                <th>Reception Telephone</th>
                
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Reception_id']}</td>
                <td>{$row['R_name']}</td>
                <td>{$row['R_telephone_no']}</td>
            
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
