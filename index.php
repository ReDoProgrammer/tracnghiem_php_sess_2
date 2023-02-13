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
        <div class="panel-heading"><span id="spFullname" class = "font-weight-bold "></span>Làm bài thi</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-12 text-right">
              <button type="button" name="button" class="btn btn-success" id="btnStart">Bắt đầu</button>
            </div>
          </div>
          <div id="questions"> </div>
          <div class="row">
            <div class="col-sm-12 text-center">
              <button type="button" class="btn btn-warning" id="btnFinish">Kết thúc bài thi</button>
              <button class="btn btn-primary" id="btnSave">Lưu bài thi</button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center">
              <h4 id='mark' class = "text-info"></h4>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>

<?php include('modal.php')?>
<?php include('modalProfile.php')?>
<?php include('child-profile.php')?>

<script type="text/javascript">
$(document).ready(function(){
  $('#right-nav').hide();
  $('#btnFinish').hide();
  $('#aHistory').hide();
  GetUser();
  $('#btnSave').hide();
});




$('#btnSave').click(function(){
  $.ajax({
    url:'ketqua.php',
    type:'post',
    data:{
      username:sessionStorage.userLogin,     
      result:JSON.stringify(result),
      mark
    },
    success:function(data){
      alert(data);
      location.reload();
    }
  })
})







var questions;//biến toàn cục để lưu danh sách câu hỏi
var result =[]; // biến để lưu kết quả thi
var mark = 0;
$('#btnStart').click(function(){
  if(!sessionStorage.userLogin){
		$('#modalLogin').modal();
		}else{
      GetQuestions();
      mark = 0;
      $('#btnFinish').show();
      $(this).hide();
      result = []; //thiết lập mảng kết quả về mặc định là 1 mảng trống
    }
 
});

$('#btnFinish').click(function(){
  $(this).hide();
  $('#btnStart').show();
  $('#btnSave').show();
  CheckResult();
 
});

function CheckResult(){
 
  $('#questions div.row').each(function(k,v){
    //bước 1: lấy đáp án đúng của câu hỏi
    let id = $(v).find('h5').attr('id');
    let question = questions.find(x=>x.id == id);//tìm câu hỏi trong mảng questions dựa vào id đã có ở trên
    let answer = question['answer'];//lấy đáp án đúng của câu hỏi


    //bước 2: lấy đáp án của người dùng ~ thằng radio được check
    let choice = $(v).find('fieldset input[type="radio"]:checked').attr('class');

    if(choice == answer){
      mark +=2;//mỗi câu đúng được cộng 2 điểm
    }else{
        console.log('Câu có id: '+id+' sai');
    }

    result.push({id,choice,answer});// luu ket qua thi vao mang
   
    //bước 3: đánh dấu đáp án đúng để người dùng đối chiếu

    $('#question_'+id+' > fieldset > div > label.'+answer).css("background-color", "yellow");

  });

  $('#mark').text('Điểm của bạn là: '+mark);

}

function GetQuestions(){
  $.ajax({
    url:'questions.php',
    type:'get',
    success:function(data){
      questions = jQuery.parseJSON( data);
      let index = 1;
      let d = '';
      $.each(questions,function(k,v){
        d+=   '<div class="row" style = "margin-left:10px;" id="question_'+v['id']+'"> ';
        d+=   '<h5 style="font-weight:bold;" id="'+v['id']+'"> <span class="text-danger">Câu '+index+': </span>'+v['question']+'</h5>';

        d +=   '<fieldset>';
        d+=   '<div class="radio col-md-12 ">';
        d+=    '<label class = "A"><input type="radio" class="A" name = "'+v['id']+'"><span class="text-danger">A: </span>'+v['option_a']+'</label>';
        d+=   '</div>';

        d+=  ' <div class="radio col-md-12">';
        d+=     '<label class = "B"><input type="radio" class="B" name = "'+v['id']+'"><span class="text-danger">B: </span>'+v['option_b']+'</label>';
        d+=   '</div>';

        d+=   '<div class="radio  col-md-12">';
        d+=     '<label class = "C"><input type="radio"  class="C" name = "'+v['id']+'"><span class="text-danger">C: </span>'+v['option_c']+'</label>';
        d+=   '</div>';

        d+=   '<div class="radio col-md-12">';
        d+=     '<label class = "D"><input type="radio" class="D" name = "'+v['id']+'"><span class="text-danger">D: </span>'+v['option_d']+'</label>';
        d+=   '</div>';
        d+=  '</fieldset>';
        d+= '</div>';
        index++;
      });
      $('#questions').html(d);
    }
  });
}
</script>
