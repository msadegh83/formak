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
<?php
require_once 'db.php';

$id = $_GET['id'];


$requestq = mysqli_query($db , "SELECT * FROM `form_element` WHERE `form link` = '$id' ");

$reqq = mysqli_fetch_array($requestq , MYSQLI_ASSOC);

$q = "SELECT * FROM answers WHERE `form id` = ".$id." ORDER BY ID";

$request = mysqli_query($db , $q);

$reqa = mysqli_fetch_all($request , MYSQLI_ASSOC);


?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
    <title>پاسخ های ثبت شده فرم <?php echo $reqq['form name']?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts.css" />
    <style>
        *{
            text-align: center;
            font-family: "B Yekan";
        }
        body{
            background: url("images/e-b-g-1.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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
<div class="alert alert-success" role="alert">
            <a href="./index.php"><button class="btn btn-primary round" >صفحه اصلی</button></a>
            <button class="btn btn-secondary round">خوش آمدید <?php echo $_SESSION['name']?> عزیز</button>
            <a href="./form-manage.php"><button class="btn btn-success round">لیست فرم ها</button></a>
            <a href="./form.php"><button class="btn btn-info round">ایجاد فرم جدید</button></a>
            <a href="./exit.php?exit=true"><button class="btn btn-danger round"> خروج از حساب کاربری</button></a>
          </div>
<div class="cotainer">
    <div class="row">
        <div class="col"></div>
        <div class="col-10" style="background: white; border-radius: 10px;text-align: center;align-items: center">
            <table class="table table-bordered" style="direction: rtl">
                <thead>
                <tr>
                    <?php if ($reqq['fild1'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild1'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild2'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild2'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild3'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild3'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild4'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild4'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild5'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild5'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild6'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild6'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild7'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild7'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild8'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild8'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild9'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild9'];?></th>
                    <?php endif;?>
                    <?php if ($reqq['fild10'] != ' '):?>
                        <th scope="col"><?php echo $reqq['fild10'];?></th>
                    <?php endif;?>
                </tr>
                </thead>
                <tbody>
                
                    <?php
                        foreach($reqa as $requ){
                            ?>
                            <tr>
                            <?php
                            $le = 1;
                            while ($le <= 10):?>
                                <?php if ($requ["fild$le"] != ' '){?>
                                <td><?php if (!is_null($requ["fild$le"])){echo $requ["fild$le"];}else{echo 'داده ای موجود نیست';}?></td>
                                <?php }else {
                                    break;
                                }
                                $le++;
                                endwhile;?>
                            </tr>
                        <?php }
                    ?>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>
</body>
</html>
