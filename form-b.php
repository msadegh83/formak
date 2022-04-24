<html lang="fa">
<?php require_once 'db.php';
session_start();
?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title>ساخت فرم جدید</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts.css" />
        <style>
            *{
                font-family: "B Yekan";
            }
            body{
                background: url("images/form-builder-bg.jpg");
                background-size: cover;
            }
            .f-n{
                text-align: center;
                align-items: center;
            }
            .f_f{
                visibility: hidden;
            }
            .f_n{
                visibility: hidden;
            }
        </style>
    </head>
    <body>
    <?php
    $f_n = $_POST['form_name'];
    $f_f = $_POST['form_filds'];
    ?>
      <div class="cotainer">
          <div class="row">
              <div class="col"></div>
              <div class="col-10" style="background: white; border-radius: 10px;text-align: center;align-items: center">
                  <h2 style="font-family: 'B Yekan'">ساخت فرم جدید</h2>
                  <table class="table" style="direction: rtl">
                      <thead>
                      <tr>
                        <th scope="col">ترتیب</th>
                        <th scope="col">نام فیلد</th>
                        <th scope="col">فرمت فیلد</th>
                        <th scope="col">اندازه (تعداد کاراکترها)</th>
                      </tr>
                      </thead>
                      <tbody>
                  <form action="form-manage.php" method="post">
                      <?php echo $_SESSION['ID'];?>
                    <input type="hidden" name="userid" value="<?php echo $_SESSION['ID']?>"/>
                      <p style="align-items: center;text-align: center;display: flex;direction: rtl">نام فرم:<input type="text" name="form_name" value="<?php echo $f_n?>" class="f-n form-control" placeholder="نام فرم" style="width: 150px;"></p>
                      <input class="f_f" type="text" name="f_f" value="<?php echo $f_f?>">
                      <input class="f_n" type="text" name="f_n" value="<?php echo $f_n?>">
                      <?php
                       $i = 1;
                       while ($i <= $f_f):?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><label>
                                    <input type="text" class="form-control" name="<?php echo "name$i"?>">
                                </label></td>
                            <td><select name="<?php echo "format$i"?>" class="form-control">
                                    <option value="email">ایمیل</option>
                                    <option value="number">عدد</option>
                                    <option value="text">کاراکتر</option>
                                    <option value="textarea">متن</option>
                                </select>
                            </td>
                            <td><input type="number" class="form-control" name="<?php echo "size$i"?>" placeholder="حداکثر تعداد کاراکتر به عدد"></td>
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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>