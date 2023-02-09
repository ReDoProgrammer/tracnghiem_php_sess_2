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
      <a class="navbar-brand" href="#">WebSiteName</a>
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
          
        </div>
      </div>

    </div>
  </div>
</body>
</html>

<?php include('modalProfile.php')?>

<?php include('child-profile.php')?>
<script>

$(document).ready(function(){
    GetUser();
})


</script>