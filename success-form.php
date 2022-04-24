<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title>فرم ثبت شد</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php
        require_once 'db.php';

        $fild[1] = ' ';
        $fild[2] = ' ';
        $fild[3] = ' ';
        $fild[4] = ' ';
        $fild[5] = ' ';
        $fild[6] = ' ';
        $fild[7] = ' ';
        $fild[8] = ' ';
        $fild[9] = ' ';
        $fild[10] = ' ';
        $i = 1;
        while ($i <= 10){
            if (isset($_POST["name$i"])){
            $fild[$i] = $_POST["name$i"];
            $i++;
            } else {
                break;
            }
        }
        $id = $_POST['f_i'];

        $db->query("
    INSERT INTO answers (`form id` , `fild1` , `fild2` , `fild3` , `fild4`  , `fild5` , `fild6` , `fild7` , `fild8`  , `fild9`  , `fild10`) VALUES ('$id' , '$fild[1]'
     , '$fild[2]' , '$fild[3]' , '$fild[4]' , '$fild[5]' , '$fild[6]' , '$fild[7]' , '$fild[8]' , '$fild[9]'  , '$fild[10]' )
    ");
        ?>
    <div class="content">
        <div class="col-3">
        </div>
        <div class="col-6" id="cadr" style="background: white; border-radius: 20px; width: 300px; height: 250px">    
        <div>
        <div class="alert alert-success" role="alert" style="direction: rtl; text-align: right">
        <h4 class="alert-heading">فرم با موفقیت ثبت شد!</h4>
        <p>فرم مورد نظر شما و پاسخ هایتان با موفقیت ثبت شد</p>
        </div>
        <div>
            <a href="./"> 
                <button type="button" class="btn btn-primary" >
                صفحه اصلی
                </button>
            </a>
        </div>
        </div>
        <div class="col-3">
        </div>
      </div>
    </body>
</html>

