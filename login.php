<?php
session_start();
if(isset($_SESSION['user']) && (isset($_SESSION['time']) && $_SESSION['time'] >= time())){
       header("Location: ./form.php");
}
else{
}
?>
<html lang="fa">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title>فرمک | ورود</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lalezar">
        <link rel="stylesheet" href="fonts.css" />
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div class="content">
      <div class="bg-light main-sec col-5 mx-auto" id="cadr">
        <div class="error">
        </div>
        <h2>ورود به حساب کاربری</h2>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>:پنل کاربری دمو سایت</strong> 
        </br>
        نام کاربری : demo1234
        </br>
        رمز عبور : demo1234
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        </button>
        </div>
        <form>
            <input type="text" class="form-control text-center" id="username" placeholder="نام کاربری">
            <br/>
            <input type="password" class="form-control text-center" id="password" placeholder="رمز عبور">
            <br/>
            <input type="button" class="btn btn-primary col-5 mx-auto" value="ورود" id="login">
        </form>
        <h5>حساب کاربری ندارید؟ <a href="./signup.php">ثبت نام کنید</a></h5>
    </div>
    <div class="col-sm-3">
    <div class="alert alert-success" role="alert">
            <a href="./index.php"><button class="btn btn-primary round">صفحه اصلی</button></a>
            <button class="btn btn-secondary round">شما وارد حساب کاربری خود نشدید</button>
            <button class="btn btn-success round" disabled> ورود به حساب کاربری</button>
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
                                location.replace("./login.php");
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
      </div>
    </body>
</html>
