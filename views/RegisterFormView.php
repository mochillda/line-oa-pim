<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $this->lang->line("แบบฟอร์มลงทะเบียน");?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <?php $this->load->view('css'); ?>
</head>
<body>
  <div class="container">
      <div style="padding: 25px; text-align: center;">
        <h2><?php echo $this->lang->line("แบบฟอร์มลงทะเบียน");?></h2>
      </div>
      <form id="registerLine" class="form-horizontal" name="registerLine"  method="post"  action="<?php echo site_url($URL."/saveRegister") ;?>"  >
        <div class="box-body" style="padding: 25px;">
        <div class="form-group row">
          <label for="codeStu" class="col-sm-2 col-form-label"><a><?php echo $this->lang->line("รหัสนักศึกษา : ");?></a></label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="codeStu" placeholder="กรอกรหัสนักศึกษา" name="codeStu">
          </div>
        </div>
        <div class="form-group row">
          <label for="emailStu" class="col-sm-2 col-form-label"><?php echo $this->lang->line("E-mail : ");?></label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="emailStu" name="emailStu" placeholder="กรอก email">
          </div>
        </div>
        <div style="text-align: center;">
          <button type="button" class="btn btn-success"><?php echo $this->lang->line("ลงทะเบียน");?></button>
        </div>
       </div>
      </form>
  </div>

</body>
</html>

<?php $this->load->view('script'); ?>
<script type="text/javascript">

  function checkEmail(str){
    var emailFilter=/^.+@.+\..{2,3}$/;
    if (!(emailFilter.test(str))) { 
      show_alert("<?php echo $this->lang->line('ท่านใส่อีเมล์ไม่ถูกต้อง');?>");
          $(this).prop("disabled",false);
      return false;
    }
    return true;
  }

  $(".btn-success").click(function(){
    var email  = $.trim($("#email").val());
    var isError  = $("#registerLine").valid();

    var cEmail =  checkEmail(email);
    console.log(email);
    if(cEmail == false){
        $(this).prop("disabled",false);
    }else{
       if (isError){
            var url = $('#registerLine').attr("action");
            var posturl = url;
            $('#registerLine').attr('action', posturl);
            $('#registerLine').submit();
            $(this).prop("disabled",false);
          } else {
            $("html, body").stop().animate({ scrollTop: $('label.error:not(:hidden):first').offset().top - 100 }, 500);
            $(this).prop("disabled",false);
          }
    }
  });

</script>
