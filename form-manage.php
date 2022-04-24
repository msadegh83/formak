<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['time'] < time()){
    unset($_SESSION['user']);
    unset($_SESSION['pass']);
    unset($_SESSION['time']);
    header("Location: ./login.php");
}
else{
    $_SESSION['time'] = time() + 900;
    $ln = 1;
}
?>
<html lang="fa">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title>فرم های من</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
        <style>
            *{
                text-align: center;
                font-family: "B Yekan";
            }
            body {
                background: url("images/table.jpg");
                background-size: cover;
                background-position: center;
            }
            .col-sm-6{
                text-align: center;
                display: flex;
                font-family: "B Yekan";
                align-items: center;
            }
            .content{
                text-align: center;
                display: flex;
                font-family: "B Yekan";
                align-items: center;
            }
            .round{
                border-radius: 100px;
            }
            .alert{
                direction: rtl;
                text-align: center;
            }
            table {
            table-layout: fixed;
            width: 100%;   
        }
        td {table-layout:fixed;
            width:20px;
            overflow:hidden;
            word-wrap:break-word;
        }
        </style>
    </head>
    <body>
    <?php
    require_once 'db.php';
    if(isset($_POST['form_name'])){
    $j = $_POST['f_f'];
    $f_n = $_POST['form_name'];
    $u_id = $_POST['userid'];
    $e = '';
    $fd[1] = ' ';
    $fd[2] = ' ';
    $fd[3] = ' ';
    $fd[4] = ' ';
    $fd[5] = ' ';
    $fd[6] = ' ';
    $fd[7] = ' ';
    $fd[8] = ' ';
    $fd[9] = ' ';
    $fd[10] = ' ';
    $ty[1] = ' ';
    $ty[2] = ' ';
    $ty[3] = ' ';
    $ty[4] = ' ';
    $ty[5] = ' ';
    $ty[6] = ' ';
    $ty[7] = ' ';
    $ty[8] = ' ';
    $ty[9] = ' ';
    $ty[10] = ' ';
    for ($i = 1 ; $i<=$j ; $i++){
        $type = $_POST["format$i"];
        // if ($type[$i] == 'متن'){
        //     $ty[$i] = 'textarea';
        // }elseif ($type[$i] == 'ایمیل'){
        //     $ty[$i] = 'email';
        // }elseif ($type[$i] == 'کاراکتر'){
        //     $ty[$i] = 'text';
        // }elseif ($type[$i] == 'عدد'){
        //     $ty[$i] = 'number';
        // }
        $size = $_POST["size$i"];

        $size = "($size)";
        $fd[$i] = $_POST["name$i"];

        $ty[$i] = $type;
        
    }

    $db->query("
        INSERT INTO `form_element` (`form name` , `form filds`, `userID` ,`fild1` , `fild2` , `fild3` , `fild4` , `fild5` , `fild6` , `fild7` , `fild8` , `fild9` , `fild10` , `fild1-type` , `fild2-type` , `fild3-type` , `fild4-type` , `fild5-type` , `fild6-type` , `fild7-type` , `fild8-type` , `fild9-type` , `fild10-type`) VALUES ('$f_n' , '$j', '$u_id' , '$fd[1]'
        , '$fd[2]' , '$fd[3]' , '$fd[4]' , '$fd[5]' , '$fd[6]' , '$fd[7]' , '$fd[8]' , '$fd[9]' , '$fd[10]' , '$ty[1]' , '$ty[2]' ,
        '$ty[3]' , '$ty[4]' ,'$ty[5]' , '$ty[6]' , '$ty[7]' , '$ty[8]' , '$ty[9]' , '$ty[10]' )
        ");
    }else{

    }
    $Qt = "SELECT `form name`,`form filds`,`form link` FROM `form_element` WHERE `userID` = ".$_SESSION['ID']." ORDER BY `form name`";
    $res = mysqli_query($db , $Qt);


    ?>
    <div class="alert alert-success" role="alert">
            <a href="./index.php"><button class="btn btn-primary round" >صفحه اصلی</button></a>
            <button class="btn btn-secondary round">خوش آمدید <?php echo $_SESSION['name']?> عزیز</button>
            <button class="btn btn-success round" disabled>لیست فرم ها</button>
            <a href="./form.php"><button class="btn btn-info round">ایجاد فرم جدید</button></a>
            <a href="./exit.php?exit=true"><button class="btn btn-danger round"> خروج از حساب کاربری</button></a>
          </div>
    <div class="content">
        <div class="col-3" id="cadr1" >
        </div>
        <div class="col-6" style="background: white; border-radius: 20px;" id="cadr2">
            <table class="table table-striped" style="direction: rtl">
                <thead>
                <tr>
                    <th scope="col">نام فرم</th>
                    <th scope="col">تعداد فیلد ها</th>
                    <th scope="col">لینک فرم</th>
                    <th scope="col">پاسخ های ثبت شده</th>
                    <th scope="col">آدرس اشتراک گذاری</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php while ($qu = mysqli_fetch_array($res , MYSQLI_ASSOC)):?>
                    <tr>
                        <td><?php echo $qu['form name'];?></td>
                        <td><?php echo $qu['form filds'];?></td>
                        <td><a href="forms.php?id=<?php echo $qu['form link']?>">مشاهده</a> </td>
                        <td><a href="answers.php?id=<?php echo $qu['form link']?>">مشاهده</a> </td>
                        <td><input class="form-control" id="myInput" type="url" value="https://m-s-m.ir/formak/forms.php?id=<?php echo $qu['form link']?>"/></td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile;?>
            </table>
            </div>
        </div>
        <div class="col-3" id="cadr3">
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
            if(screen.width <= 500){
                $("#cadr1").removeClass("col-3");
                $("#cadr2").removeClass("col-6");
                $("#cadr3").removeClass("col-3");
            }
        })
    </script>
    </div>
    </body>
</html>
