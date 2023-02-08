<?php
	try {
		include('../../connect.php');
		
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
      


        //kiểm tra tài khoản đã tồn tại trong hệ thống hay chưa
        $sql = "SELECT count(*) FROM  taikhoan WHERE username = '".$username."'"; 
        $result = $conn->query($sql);       
        $count =  $result->fetchColumn();
        if($count>0){
            echo "Tài khoản này đã tồn tại trong hệ thống!";
        }else{
             // tiến hành ghi mới tài khoản vào csdl
            $sql = "insert into taikhoan(username,password,fullname,phone,email,address) ";
            $sql = $sql."values('".$username."','".$password."','".$fullname."','".$phone."','".$email."','".$address."')";

            if ($conn->query($sql) == TRUE) {
            echo "Thêm mới tài khoản thành công!";
            } else {
            echo "Thêm mới tài khoản thất bại!";
            }
        }

       
	} catch (Exception $e) {
		echo "Lỗi: ".$e;
	}	

?>
