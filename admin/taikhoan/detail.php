<?php
	include('../../connect.php');
	$username = $_GET['username'];
	$sql = "select * from taikhoan where username = '".$username."'";
	$rs = $conn->prepare($sql);
	$rs->execute();	
	$result = $rs->fetch();

	
	echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>