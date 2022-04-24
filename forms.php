<html lang="fa">
        <?php
        require_once 'db.php';

        $f_l = $_GET['id'];

        $req = mysqli_query($db , "SELECT * FROM `form_element` WHERE `form link` = '$f_l'");

        $row = mysqli_fetch_array($req , MYSQLI_ASSOC);

        $i = 1;
        while ($i <= 10){
            if ($row["fild$i"] != ' '){
                $fild[$i] = $row["fild$i"];
                $type[$i] = $row["fild$i-type"];
            } else {
                break;
            }
            $i++;
        }
        while ($i <= 10){

            $i++;
        }
        $ran = array(
            1 => 'images/e-b-g-1.jpg' ,
            2 => 'images/e-b-g-2.jpg' ,
            3 => 'images/main-background.jpg' ,
            4 => 'images/form-builder-bg.jpg'
        );
        $qs = rand(1 , 4);

        $ranc = $ran[$qs];
        ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title><?php echo $row['form name']?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
    </head>
        <style>
            *{
                font-family: "B Yekan";
            }
            body{
                background: url("<?php echo $ranc ?>");
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            .form-i{
                visibility: hidden;
            }
        </style>
    <body>
    <div class="cotainer">
        <div class="row">
            <div class="col"></div>
            <div class="col-10" style="background: white; border-radius: 10px;text-align: center;align-items: center">
                <table class="table" style="direction: rtl">
                    <thead>
                    <tr>
                        <h3>فرم</h3>
                        <h1 style="font-family: 'B Yekan'"><?php echo $row['form name']?></h1>
                    </tr>
                    </thead>
                    <tbody>
                    <form action="success-form.php" method="post">
                        <input class="form-i" type="text" name="f_i" value="<?php echo $row['form link']?>">
                        <?php
                        $i = 1;
                        while ($i <= count($fild)):?>
                            <tr>
                                <td><?php echo $fild[$i].':'?></td>
                                <?php if($type[$i] == "textarea"){?>
                                    <td><label>
                                    <textarea class="form-control" name="<?php echo "name$i"?>"></textarea>
                                    </label></td>
                                <?php }else{?>
                                    <td><label>
                                        <input type="<?php echo $type[$i]?>" class="form-control" name="<?php echo "name$i"?>" placeholder="<?php $fild[$i]?>">
                                    </label></td>
                                <?php }?>
                            </tr>
                            <?php $i++;?>
                        <?php endwhile;?>
                    </tbody>
                </table>
                <input type="submit" value="ذخیره" class="btn btn-success">
                </form>
                <br>
                <br>
            </div>
            <div class="col"></div>
        </div>
    </div>
    </body>
</html>