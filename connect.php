<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="form";

$conn = mysqli_connect($servername , $username , $password , $dbname);

if($conn)
{
    //echo "succesfully";
}else
{
    echo "connection faild".mysqli_connect_error();
}
?>