<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="bankingSystem";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Unable to connect to the database  due to the following error --> ".mysqli_connect_error());
}
?>