<?php
	include('../../connect.php');
	$search = $_GET['search'];

	$sql = $conn->prepare("SELECT * FROM ds_cau_hoi where username like '%".$search."%' or fullname like '%".$search."%' or phone like '%".$search."%' or email like '%".$search."%' ");
	$sql->execute();
	$count = $sql->rowCount();

	$pages = $count%30==0?$count/30:floor($count/30)+1;

	echo json_encode($pages,JSON_UNESCAPED_UNICODE);
?>