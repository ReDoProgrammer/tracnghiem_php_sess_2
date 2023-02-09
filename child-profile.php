<script>
    
$('#aProfile').click(function(e){
    e.preventDefault();
    $('#modalMyProfile').modal();
    $.ajax({
        url:'myprofile.php',
        type:'get',
        data:{username:sessionStorage.userLogin},
        success:function(data){
            var q = jQuery.parseJSON( data);//ép dữ liệu trả về qua json
            $('#txtUsername').prop('readonly', true);
            $('#txtUsername').val(q.username);
            $('#txtPassword').val(q.password);
            $('#txtConfirmPassword').val(q.password);
            $('#txtFullname').val(q.fullname);
            $('#txtPhone').val(q.phone);
            $('#txtEmail').val(q.email);
            $('#txtAddress').val(q.address);
        }
    })
})

$('#aLogout').click(function(e){
  e.preventDefault();
  sessionStorage.removeItem("userLogin");
  alert('Đăng xuất tài khoản thành công!');
  var base_url = window.location.origin;// lấy đường dẫn gốc                       
    window.location.href = `${base_url}/tracnghiem/`;// trả về trang chủ 
})




function GetUser(){
  if(sessionStorage.userLogin){
    $.ajax({
    url:'profile.php',
    type:'get',
    data:{username:sessionStorage.userLogin},
    success:function(data){
      $('#right-nav').show();
      $('#aHistory').show();
      $('#spFullname').text(`${data} - `)
    }
  })
  }
 
}

</script>