<?php
	include('../../connect.php');
	try {
		$username = $_POST['username'];
		$sql = "delete from taikhoan where username ='".$username."' and is_admin = 0"; // chỉ được phép xóa các tài khoản không phải là admin
		if ($conn->query($sql) == TRUE) {
		  echo "Xóa tài khoản thành công!";
		} else {
		  echo "Xóa tài khoản thất bại!";
		}
	} catch (Exception $e) {
		echo "Lỗi xóa tài khoản: ".$e;
	}
?>