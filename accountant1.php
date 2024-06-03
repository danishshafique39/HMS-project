<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="form.css">
	<style>
        .container {
            text-align: center;
            margin-top: 20px;
        }

        table {
            background-color: whitesmoke;
            margin-top: 20px;
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 5px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.html">Home</a>
        <a href="patient1.php" >Patient</a>
        <a href="bill.html">Bill</a>
        <a href="doctor1.php">Doctor</a>
        <a href="nurse.html">Nurse</a>
        <a href="diagnosis.html">Diagnosis</a>
        <a href="reception1.php">Reception</a>
        <a href="accountant1.php" class="active">Accountant</a>

        <div class="navbar-right">
          <a href="aboutfaculty.html">About Faculty</a>
        </div>
      </div>
      <h2>Accountant Information Form</h2>
      <form method="post" action="accountant.php">

            <label for="id">id:</label><br>
            <input type="text" id="id" name="id" required><br>

            <label for="a_name">Name:</label><br>
            <input type="text" id="a_name" name="a_name" required><br>
            
            <label for="j_date">Joined Date:</label><br>
            <input type="date" id="j_date" name="j_date" required><br>

            <label for="l_date">Leave Date:</label><br>
            <input type="date" id="l_date" name="l_date" required><br>

            <input type="submit" name="Submit" value="Submit">
      </form> 
	  
	 <br>
	 <br>
	 <br>


<div class="container">
<?php  
	include('connection.php');
// SQL query to retrieve doctor data
$sql = "SELECT * FROM accountant";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h2>Accountant Data</h2>";
    echo "<table border='1'>
            <tr>
                <th>Accountant Id</th>
                <th>Name</th>
                <th>Joined Date</th>
                <th>Leave Date</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Accountant_id']}</td>
                <td>{$row['A_name']}</td>
                <td>{$row['Joined_date']}</td>
                <td>{$row['Leave_date']}</td>
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
