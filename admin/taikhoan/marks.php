<?php 
	include('../../connect.php');

	$username = $_GET['username'];
	
	$sql = $conn->prepare("SELECT * FROM ketqua where username = '".$username."'");
	$sql->execute();
	$index = 1;
	$data='';
	while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {			    
	   	$data.= '<tr id='.$result['id'].'>';
	     	$data.=  '<th scope="row">'.($index++).'</th>';
	     	$data.= '<td class="text-primary">'.$result['exam_date'].'</td>';
	     	$data.= '<td class="text-primary">'.$result['mark'].'</td>';
	     	$data.= '<td class="text-right">';
	     	$data.=    '<input type="button" class="btn btn-xs btn-info" value="Xem" name="viewExamDetail">';
	     			     
	 		$data.= '</td>'	;		     
	  	$data.= '</tr>';
	}
	echo $data;
?>