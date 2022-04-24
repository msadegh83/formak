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
        <title>فرمک | ثبت نام</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
        <link rel="stylesheet" href="sustyle.css" />
    </head>
    <body>
      <div class="content">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" id="cadr" style="background: white; border-radius: 20px; mx-auto ">    
        <div>
            <div class="error">
            </div>
            <h2>ثبت نام در سایت</h2>
            </br>
            <form action="./suresult.php" method="post">
                <h5>نام کاربری :</h5>
                <p>(فقط حروف انگلیسی ، اعداد و "@" , "+" , "-" , "." و بین 5 تا 25 کاراکتر)</p>
                <input type="text" class="form-control text-center" name="username" placeholder="نام کاربری" pattern="[A-Za-z1-9@.\+-]{5,25}" required> 
                </br>
                <h5>نام نمایشی  :</h5>
                <p>(این نام در انتخاب جزء و جدول ختم قرآن نمایش داده می شود)</p>
                <input type="text" class="form-control text-center" name="name" placeholder="نام نمایشی" required>
                </br>
                <h5>رمز عبور :</h5>
                <p> (فقط حروف انگلیسی ، اعداد و "@" , "+" , "-" , "." و بین 8 تا 20 کاراکتر)</p>
                <input type="password" class="form-control text-center" name="password" placeholder="رمز عبور" pattern="[A-Za-z1-9@.\+-]{8,20}" required>
                </br>
                <h5>تکرار رمز عبور :</h5>
                <input type="password" class="form-control text-center" name="repassword" placeholder="تکرار رمز عبور" pattern="[A-Za-z1-9@.\+-]{8,25}" required>
                </br>
                <h5>ایمیل :</h5>
                <input type="email" class="form-control text-center" name="email" placeholder="ایمیل" required>
                </br>
                <input type="submit" class="btn btn-primary col-5 mx-auto" value="ثبت نام">
            </form>
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
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        </div>
        <div class="col-sm-3">
        <?php if($ln == 1):?>
          <div class="alert alert-success" role="alert">
            <a href="./index.php"><button class="btn btn-primary round" disabled>صفحه اصلی</button></a>
            <button class="btn btn-secondary round">خوش آمدید <?php echo $_SESSION['name']?> عزیز</button>
            <a href="./form-manage.php"><button class="btn btn-success round">لیست فرم ها</button></a>
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
                                location.replace("./form-manage.php");
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