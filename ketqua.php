<?php
	include('connect.php');

    //khai bao 2 bien de luu gia tri cua username va password duoc truyen tu view qua phuong thuc post
	$username = $_POST['username'];
	$exam_date = $_POST['exam_date'];
    $result = $_POST['result'];
    
     // tiến hành ghi mới tài khoản vào csdl
     $sql = "insert into ketqua(username,exam_date,questions) ";
     $sql = $sql."values('".$username."','".$exam_date."','".$result."')";

     if ($conn->query($sql) == TRUE) {
     echo "Lưu kết quả bài thi thành công!";
     } else {
     echo "Lưu kết quả bài thi thất bại!";
     }
	
?>