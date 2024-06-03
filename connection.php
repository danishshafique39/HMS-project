<?php
$server_name="localhost";
$u_name="root";
$d_name="hms";
$pass="";

$conn=mysqli_connect($server_name,$u_name,$pass,$d_name);

if(!$conn)
{
    die("Connection Error".mysqli_connect_error());
}

?>