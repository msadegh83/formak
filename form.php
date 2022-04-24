<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['time'] < time()){
    unset($_SESSION['user']);
    unset($_SESSION['pass']);
    unset($_SESSION['time']);
    header("Location: ./login.php");
    $ln = 0;
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
        <title>فرمک</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
      <div class="content">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="background: white; border-radius: 20px; width: 300px; height: 250px">
            <div class="forma">
                <form action="form-b.php" method="post" style="width: 250px">
                    :نام فرم
                    <br>
                    <label>
                        <input type="text" name="form_name" class="form-control" placeholder="نام فرم" required>
                    </label>
                    <br>
                    <div class="form-filds" style="align-items: center;text-align: center">
                        :تعداد فیلد های فرم
                        <br>
                        <label>
                            <select name="form_filds" class="form-control" style="width: 100px;align-items: center">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </label>
                        <br>
                    </div>
                    <input type="submit" value="شروع" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="col-sm-3">
        <?php if($ln == 1):?>
            <div class="alert alert-success" role="alert">
            <a href="./index.php"><button class="btn btn-primary round">صفحه اصلی</button></a>
            <button class="btn btn-secondary round">خوش آمدید <?php echo $_SESSION['name']?> عزیز</button>
            <a href="./form-manage.php"><button class="btn btn-success round">لیست فرم ها</button></a>
            <button class="btn btn-info round" disabled>ایجاد فرم جدید</button>
            <a href="./exit.php?exit=true"><button class="btn btn-danger round"> خروج از حساب کاربری</button></a>
          </div>
        <?php else:?>
            <div class="alert alert-success" role="alert">
            <a href="./index.php"><button class="btn btn-primary round">صفحه اصلی</button></a>
            <button class="btn btn-secondary round">شما وارد حساب کاربری خود نشدید</button>
            <button class="btn btn-success round" disabled> ورود به حساب کاربری</button>
        </div>
        <?php endif;?>
        </div>
      </div>
    </body>
</html>
