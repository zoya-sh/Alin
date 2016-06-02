
<?php session_start();

if(isset($_REQUEST["password"])) {
    $s5 = "update `cp_user` set password='" . $_REQUEST["password"] . "' where email='" . $_REQUEST["q"] . "'";


    include("db.php");
    mysqli_query($con1, $s5);

    header("location:recover.php?q=PASSORDET DITT ER ENDRET");


}
?>


<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header">LAG NYTT PASSORD</div>
    <form action="recover.php" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <?php
                if(isset($_REQUEST["q12"]))
                {
                    echo $_REQUEST["q12"];
                }

                ?>
                <input type="hidden" name="email" value="<?php echo $_REQUEST["q"]; ?>" class="form-control" placeholder="PASSWORD"/>
                <input type="text" name="pass" class="form-control" placeholder="SKRIV INN NYTT PASSORD"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="BEKREFT NYTT PASSORD"/>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember_me"/> HUSK MEG
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">Sign me in</button>

            <p><a href="#">I forgot my password</a></p>

        </div>
    </form>


</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>





