<?php 
	include('connect.php');
    $username = $_GET['username'];  
    $row = $conn->query( "select * from taikhoan where username = '".$username."'" )->fetch();
    echo $row["fullname"];
?>