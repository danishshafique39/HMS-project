<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>Your Library - Bookshelf</title>
    <link rel="stylesheet" href="bookshelf.css">
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
<table id="books-table">
      <thead>
        <tr>
          <th>Book Name</th>
          <th>Book Author</th>
          <th>Book ISBN</th>
          <th>Book Publisher</th>
          <th>Book Edition</th>
          <th>Book Category</th>
          <th>Publication Year</th>
        </tr>
      </thead>
<?php
include ('connection.php');
$sql = "SELECT book_name, book_author, book_isbn, book_publisher, book_edition, book_category, publication_year FROM bookshelf";

$results = mysqli_query($conn, $sql);



    while($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        echo "<td>" . $row["book_name"] . "</td>";
        echo "<td>" . $row["book_author"] . "</td>";
        echo "<td>" . $row["book_isbn"] . "</td>";
        echo "<td>" . $row["book_publisher"] . "</td>";
        echo "<td>" . $row["book_edition"] . "</td>";
        echo "<td>" . $row["book_category"] . "</td>";
        echo "<td>" . $row["publication_year"] . "</td>";
        echo "</tr>";
    }

?>

</body>