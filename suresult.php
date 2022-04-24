<?php
//error_reporting(E_ERROR | E_PARSE);
require_once 'config.php';
$usern = $_POST['username'];
$pass = strtoupper(hash('sha256' , $_POST['password']));

$db = mysqli_connect(Host_name , Username , Password , Database_name);

$q = "SELECT * FROM users WHERE username = '".$usern."';";
$p = mysqli_query($db , $q);
$resuser = mysqli_fetch_assoc($p);
$ex_time = time() + 900;
$z = 0;
session_start();
if($resuser == true){
    $mes = "این نام کاربری در سایت وجود دارد";
}else{
    if($_POST['password'] != $_POST['repassword']){
        $mes = "رمز عبور و تکرار رمز عبور با هم تطابق ندارند";
    }elseif(strlen($_POST['password']) < 5 || strlen($usern) > 16){
        $mes = "نام کاربری باید بین 5 تا 25 کاراکتر باشد";
    }else{
        $q = "INSERT INTO `users` (`id`, `username`, `password` , `name` ,`email` , `admin`) VALUES (NULL, '".$usern."', '".$pass."' , '".$_POST['name']."', '".$_POST['email']."', '".$z."');";
        $db->query($q);
        $q = "SELECT * FROM users WHERE username = '".$usern."' AND password = '".$pass."' ;";
        $p = mysqli_query($db , $q);
        $res = mysqli_fetch_assoc($p);
        $ex_time = time() + 900;
        session_start();
        if($res == true){
            $_SESSION['ID'] = $res['id'];
            $_SESSION['user'] = $usern;
            $_SESSION['pass'] = $_POST['password'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['time'] = $ex_time;
        }
        $mes = "ثبت نام شما با موفقیت انجام شد";
    }
}
?>
<?php
if(isset($_SESSION['user']) && (isset($_SESSION['time']) && $_SESSION['time'] >= time())){
       header("Location: ./form-manage.php");
}
else{
    ?>
    <html lang="fa">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="form.ico" type="image/ico" sizes="32x32">
        <title>نتیجه ثبت نام</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lalezar">
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href="fonts.css" />
    </head>
    <body class="text-center">
    <div class="alert alert-success" role="alert">
        <a href="./index.php"><button class="btn btn-primary round">صفحه اصلی سایت</button></a>
        <button class="btn btn-secondary round">شما وارد حساب کاربری خود نشدید</button>
        <a href="./login.php"><button class="btn btn-success round" disabled> ورود به حساب کاربری</button></a>
    </div>
    <div class="bg-light main-sec col-5 mx-auto">
        <div class="error alert alert-danger">
        <?php echo $mes;?>

        </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    </body>
    </html>
    <?php
}