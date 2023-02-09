<div id="modalMyProfile" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" id="mdlTitle">Modal Header</h4>
  </div>
  <div class="modal-body">
   <div class="form-group">
    <label for="">Tài khoản</label>
    <input type="text" placeholder="Tài khoản đăng nhập" id="txtUsernameLogin" class="form-control">
   </div>
   <div class="form-group col-md-6">
    <label for="">Mật khẩu</label>
    <input type="password" placeholder="Mật khẩu" id="txtPasswordLogin" class="form-control">
   </div>
   <div class="form-group col-md-6">
    <label for="">Xác nhận mật khẩu</label>
    <input type="password" placeholder="Xác nhận mật khẩu" id="txtConfirmPassword" class="form-control">
   </div>
   <div class="form-group">
    <label for="">Họ và tên</label>
    <input type="text" placeholder="Họ và tên" id="txtFullname" class="form-control">
   </div>
   <div class="form-group">
    <label for="">Điện thoại</label>
    <input type="text" placeholder="Điện thoại" id="txtPhone" class="form-control">
   </div>
   <div class="form-group">
    <label for="">Email</label>
    <input type="text" placeholder="Email" id="txtEmail" class="form-control">
   </div>
   <div class="form-group">
    <label for="">Địa chỉ</label>
    <input type="text" placeholder="Địa chỉ" id="txtAddress" class="form-control">
   </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success" id="btnSubmitProfile">
        Xác nhận
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>

<script>
  $('#btnSubmitProfile').click(function(){
    let username = $('#txtUsernameLogin').val();
        let password = $('#txtPasswordLogin').val();
        let confirm_password = $('#txtConfirmPassword').val();
        let fullname = $('#txtFullname').val();
        let phone = $('#txtPhone').val();
        let email = $('#txtEmail').val();
        let address = $('#txtAddress').val();


        if(username.trim().length == 0){
           alert('Vui long nhap ten tai khoan!');
           return;//neu chua nhap username thi dung chuong trinh ngang day, k chay tiep cac cau lenh phia duoi
        }
        
        if(password.trim().length == 0 || confirm_password.trim().length == 0){
            alert('Vui lòng nhập mật khẩu cho tài khoản!');
            return;
        }

        if(password!=confirm_password){
            alert('2 lần nhập mật khẩu không giống nhau!');
            return;
        }

        $.ajax({
                          url:'update-profile.php',
                          type:'post',
                          data:{
                              username,
                              password,
                              fullname,
                              phone,
                              email,
                              address
                          },
                          success:function(data){
                              alert(data)
                              $('#modalMyProfile').modal('hide');
                              GetUser();
                              
                          }
                      })
  })
</script>