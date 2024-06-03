
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
          border: 2px solid black;
          padding: 8px;
      }
  </style>
</head>
<body>
    <div class="navbar">
      <a href="homepage.html">Home</a>
      <a href="patient1.php" class="active">Patient</a>
      <a href="bill.html">Bill</a>
      <a href="doctor.html">Doctor</a>
      <a href="nurse.html">Nurse</a>
      <a href="diagnosis.html">Diagnosis</a>
      <a href="reception.html">Reception</a>
      <a href="accountant1.php">Accountant</a>

        <div class="navbar-right">
          <a href="aboutfaculty.html">About Faculty</a>
        </div>
      </div>
      <h2>Patient Information Form</h2>

      <form method="post" action="patient.php">
        <label for="patient_id">Patient ID:</label><br>
        <input type="text" id="patient_id" name="patient_id" required><br>
        <label for="p_name">Patient Name:</label><br>
        <input type="text" id="p_name" name="p_name" required><br>
        <label for="p_telephone_no">Patient Telephone Number:</label><br>
        <input type="tel" id="p_telephone_no" name="p_telephone_no" required><br>
        <label for="p_dob">Patient Date of Birth:</label><br>
        <input type="date" id="p_dob" name="p_dob" required><br>
            <label for="city">City:</label><br>
            <input type="text" id="city" name="city"><br>
            <label for="street">Street:</label><br>
            <input type="number" id="street" name="street"><br>
            <label for="zip_code">ZIP Code:</label><br>
            <input type="number" id="zip_code" name="zip_code"><br>
           
            <label for="Arrival_time">Arrival Time:</label><br>
            <input type="time" id="Arrival_time" name="Arrival_time" required><br>
            
            <label for="reception_id">Reception id:</label><br>
            <input type="text" id="reception_id" name="reception_id" required><br>

            <input type="submit" name="Submit" value="Submit">
      </form> 

      
      <?php
      include('connection.php');
      
      $query = "SELECT P.patient_id, P.reception_id, P1.p_name, P1.P_telephone_no, P1.P_dob as 'DOB', A.city, A.street, A.Zip_code FROM patient P, Patientinfo P1, address A WHERE P.patient_id = P1.patient_id AND P.patient_id = A.patient_id";
      $results = mysqli_query($conn, $query);
      
      ?>
      <br><br>
      <table>
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Reception ID</th>
                <th>Patient Name</th>
                <th>Telephone No.</th>
                <th>DOB</th>
                <th>City</th>
                <th>Street</th>
                <th>Zip Code</th>
                <th>Delete</th>
				<th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <tr>
                <td><?php echo $row['patient_id']; ?></td>
            <td><?php echo $row['reception_id']; ?></td>
            <td><?php echo $row['p_name']; ?></td>
            <td><?php echo $row['P_telephone_no']; ?></td>
            <td><?php echo $row['DOB']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['street']; ?></td>
            <td><?php echo $row['Zip_code']; ?></td>
            <td>
            <a href="patient.php?del=<?php echo $row['patient_id']; ?>" class="del_btn">Delete</a>
            </td>
			
			<td>
			<a href='Patient.php?edit_id={$row['patient_id']}'>Edit</a>
			</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


</body>
</html>
