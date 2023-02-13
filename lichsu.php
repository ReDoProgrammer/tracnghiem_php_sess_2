<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Làm bài thi trắc nghiệm</title>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container-fluid">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/tracnghiem">Trắc nghiệm.php</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/tracnghiem">Home</a></li>
      <li><a href="/tracnghiem/lichsu.php" id="aHistory">Lịch sử thi</a></li>      
    </ul>
    <ul class="nav navbar-nav navbar-right" id="right-nav">
      <li><a href="#" id="aProfile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="#" id="aLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  </div>
  <div class="container">
    <div class="panel-group">

      <div class="panel panel-primary">
        <div class="panel-heading">Lịch sử làm bài thi của <span id="spFullname" class="font-weight-bold"></span></div>
        <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" width="40%">Ngày thi</th>
              <th scope="col" width="40%">Điểm</th>
            
              <th scope="col" class="text-right"></th>
            </tr>
          </thead>
          <tbody id="tbHistory">
            
          </tbody>
        </table>
        </div>
      </div>

    </div>
  </div>
</body>
</html>

<?php include('modalProfile.php')?>

<?php include('child-profile.php')?>
<?php include('modalChiTiet.php')?>




<script>
   var index = 1;
   var count = 0;
$(document).ready(function(){
    GetUser();
    GetHistory();
})
$(document).on('click',"input[name='view']",function() {
		index = 1;
    count = 0;
    var trid = $(this).closest('tr').attr('id'); // lấy id của dòng đc chọn trên table khi click vào
 
     $.ajax({
      url:'load-chitiet-baithi.php',
      type:'get',
      data:{id:trid},
      success:function(data){       
        let result = JSON.parse(data);
       let questions = JSON.parse(result.questions);

       $('#modalChiTiet').modal();
        questions.forEach(q=>{
          $('#mdBody').empty();
          GetQuestion(q)
        })
     
      }
     })

});
function GetQuestion(question){
  $.ajax({
    url:'get-question.php',
    type:'get',
    data:{id:question.id},
    success:function(data){
     
      q = jQuery.parseJSON( data);
     console.log(q.answer);
      
     
      
      let d = '';
 
        d+=   '<div class="row" style = "margin-left:10px;" id="question_'+q.id+'"> ';
        d+=   '<h5 style="font-weight:bold;" id="'+q.id+'"> <span class="text-danger">Câu '+index+': </span>'+q.question+'</h5>';

        d +=   '<fieldset>';
        d+=   '<div class="radio col-md-12 ">';
        if(question.choice == 'A'){
          d+=    '<label class = "A"><input type="radio" onclick="return false;" checked class="A" name = "'+q.id+'"><span class="text-danger">A: </span>'+q.option_a+'</label>';
        }else{
          d+=    '<label class = "A"><input type="radio" onclick="return false;"  class="A" name = "'+q.id+'"><span class="text-danger">A: </span>'+q.option_a+'</label>';
        }
        
        d+=   '</div>';

        d+=  ' <div class="radio col-md-12">';
        if(question.choice == 'B'){
          d+=    '<label class = "B"><input type="radio"  checked onclick="return false;" class="B" name = "'+q.id+'"><span class="text-danger">B: </span>'+q.option_b+'</label>';
        }else{
          d+=    '<label class = "B"><input type="radio"  onclick="return false;" class="B" name = "'+q.id+'"><span class="text-danger">B: </span>'+q.option_b+'</label>';
        } 
        d+=   '</div>';

        d+=   '<div class="radio  col-md-12">';
        if(question.choice == 'C'){
        d+=     '<label class = "C"><input type="radio" onclick="return false;" checked class="C" name = "'+q.id+'"><span class="text-danger">C: </span>'+q.option_c+'</label>';
        }else{
          d+=     '<label class = "C"><input type="radio" onclick="return false;" class="C" name = "'+q.id+'"><span class="text-danger">C: </span>'+q.option_c+'</label>';
        }
        d+=   '</div>';

        d+=   '<div class="radio col-md-12">';
        if(question.choice == 'D'){
        d+=     '<label class = "D"><input type="radio" onclick="return false;" checked class="D" name = "'+q.id+'"><span class="text-danger">D: </span>'+q.option_d+'</label>';
        }else{
          d+=     '<label class = "D"><input type="radio" onclick="return false;" class="D" name = "'+q.id+'"><span class="text-danger">D: </span>'+q.option_d+'</label>';
        }
        d+=   '</div>';
        d+=  '</fieldset>';
        d+= '</div>';
        index++;
     
      $('#mdBody').append(d);
      $('#question_'+question.id+' > fieldset > div > label.'+q.answer).css("background-color", "yellow");
    }
  });
}

function GetHistory(){
  $.ajax({
    url:'load-lich-su.php',
    type:'get',
    data:{username:sessionStorage.userLogin},
    success:function(data){    
     $('#tbHistory').empty();
     $('#tbHistory').append(data);
      
    }
  })
}


</script>