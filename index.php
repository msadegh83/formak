<?php
session_start();
if(isset($_SESSION['user']) && (isset($_SESSION['time']) && $_SESSION['time'] >= time())){
       $ln = 1;
}
else{
    $ln = 0;
}
?>
<html lang="fa">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title>فرمک</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
      <div class="content">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" id="cadr" style="background: white; border-radius: 20px; width: 300px; height: 250px">    
        <div>
            <h1>فرمک</h1>
            <h3>وب اپلیکیشن ساخت فرم های کوچک</h3>
                <div>
                    <a href="login.php"> 
                        <button type="button" class="btn btn-primary" >
                        ورود به فرم ساز
                        </button>
                    </a>
                </div>
                <p>نسخه 1.2</p>
            </div>
        </div>
        <div class="col-sm-3">
        <?php if($ln == 1):?>
            <div class="alert alert-success" role="alert">
            <button class="btn btn-primary round" disabled>صفحه اصلی</button>
            <button class="btn btn-secondary round">خوش آمدید <?php echo $_SESSION['name']?> عزیز</button>
            <a href="./form-manage.php"><button class="btn btn-success round">لیست فرم ها</button></a>
            <a href="./form.php"><button class="btn btn-info round">ایجاد فرم جدید</button></a>
            <a href="./exit.php?exit=true"><button class="btn btn-danger round"> خروج از حساب کاربری</button></a>
          </div>
        <?php else:?>
          <div class="alert alert-success" role="alert">
            <button class="btn btn-primary round" disabled>صفحه اصلی</button>
            <button class="btn btn-secondary round">شما وارد حساب کاربری خود نشدید</button>
            <a href="./login.php"><button class="btn btn-success round"> ورود به حساب کاربری</button></a>
          </div>
        <?php endif;?>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            timehandler();

            var time = setInterval(timehandler , 1000);

            function timehandler(){
                var d = new Date();
                $('#time').html(d.toLocaleTimeString());
            }
            $("#login").click(function(){
                var usern = $("#username").val();
                var pass = $("#password").val();
                $.ajax({
                        type: 'POST',
                        url: "confirm.php",
                        data: {username : usern , password: pass},
                        success: function(result){
                            if (result == 'خوش آمديد'){
                                location.replace("./profile");
                            }else {
                                $('.error').addClass("alert alert-danger");
                                $('.error').text(result);
                            }
                        }
                    }
                )
            })
            if(screen.width <= 500){
                $("#cadr").removeClass("col-5");
                $("#cadr").addClass("col-8");
            }
        })
    </script>
    </body>
</html>