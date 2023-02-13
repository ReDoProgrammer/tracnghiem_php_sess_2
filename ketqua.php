<?php
	include('connect.php');

    //khai bao 2 bien de luu gia tri cua username va password duoc truyen tu view qua phuong thuc post
	$username = $_POST['username'];	
    $result = $_POST['result'];
    $mark = $_POST['mark'];
    
     // tiến hành ghi mới tài khoản vào csdl
     $sql = "insert into ketqua(username,questions,mark) ";
     $sql = $sql."values('".$username."','".$result."','".$mark."')";

     if ($conn->query($sql) == TRUE) {
     echo "Lưu kết quả bài thi thành công!";
     } else {
     echo "Lưu kết quả bài thi thất bại!";
     }
	
?>