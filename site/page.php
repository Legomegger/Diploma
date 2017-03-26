 <?php

 require_once('connectvars.php');
 require_once('functions.php');
 require_once('appvars.php');
 require_once('common.php');
 session_start();

//checking if button is pressed, if true - add form to db
 if (isset($_POST['submit'])) {
    addApplicationToDB();
}
function getCurrentLanguage()
{
    if(isset($_REQUEST['lang']))
    {
//Validate that $_REQUEST[‘lang’] is valid
        return $_SESSION['lang'] = $_REQUEST['lang'];
    }

    if(isset($_SESSION['lang']))
    {
        return $_SESSION['lang'];
    }

return 'ru'; //Default
}
getCurrentLanguage();


//Header
if (isset($_GET['development_show'])) {

    $getvardevelopment=$_GET['development_show'];
    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $query = "SELECT * FROM development_show WHERE id_k = '$getvardevelopment'";
    $data = mysqli_query($dbc, $query);
    while ($row = mysqli_fetch_array($data)) {
        $header=$row['header'];
    }
}
if (isset($_GET['done_show'])) {
 $getvardone = $_GET['done_show']; 
 $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
 $query = "SELECT * FROM done_show WHERE id_k = '$getvardone'";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {
    $header=$row['header'];
}
}
if (isset($_GET['inprocess_show'])) {
 $getvarinprocess=$_GET['inprocess_show'];
 $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
 $query = "SELECT * FROM inprocess_show WHERE id_k = '$getvarinprocess'";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {
    $header=$row['header'];
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Завершенные объекты</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
            <div class="container topnav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand topnav" href="index.php"><?php echo $lang['MENU_HOME']?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <li>

                            <a href="doneobjects.php"> <span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span><?php echo $lang['MENU_DONE'] ?></a>

                        </li>

                        <li>
                            <a href="development.php"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> <?php echo $lang['MENU_DEVELOPMENT'] ?></a>
                        </li>
                        <li>
                            <a href="inprocess.php"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> <?php echo $lang['MENU_INPROCESS'] ?></a>
                        </li>

                        <li>
                            <a href="about.php"><?php echo $lang['MENU_ABOUT_US'] ?></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>


        <!-- Page Content -->

        <a  name="services"></a>
        <div class="content-section-a">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix"></div>
                        <h2 class="section-heading text-center"><?php echo $lang['PAGEHEADER'].' '.$header?></h2>
                        
                        <?php
                        
                        if (isset($_GET['done_show'])) {
                         $getvardone = $_GET['done_show']; 
                         $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                         $query = "SELECT * FROM done_show WHERE id_k = '$getvardone'";
                         $data = mysqli_query($dbc, $query);
                         while ($row = mysqli_fetch_array($data)) {
                           $constructor = "<div class= container>"."<div class=row>"."<div class=col-md-6>".
                           '<img src="' . GW_UPLOADPATH ."/donefiles"."/". $row['imggp'] . '" alt="Score image" / class="img-rounded">'.'<hr>'.'<img src="' . GW_UPLOADPATH ."/donefiles"."/". $row['imgpro'] . '" alt="Score image" / class="img-rounded">'
                           ."</div>"."<div class=col-md-6>".$row['text']."</div>"."</div>"."</div>";
                           echo $constructor;
                       }
                   }

                   if (isset($_GET['inprocess_show'])) {
                     $getvarinprocess=$_GET['inprocess_show'];
                     $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                     $query = "SELECT * FROM inprocess_show WHERE id_k = '$getvarinprocess'";
                     $data = mysqli_query($dbc, $query);
                     while ($row = mysqli_fetch_array($data)) {
                       $constructor = "<div class= container>"."<div class=row>"."<div class=col-md-6>".
                       '<img src="' . GW_UPLOADPATH ."/inprocessfiles"."/". $row['imggp'] . '" alt="Score image" / class="img-rounded">'.'<hr>'.'<img src="' . GW_UPLOADPATH ."/inprocessfiles"."/". $row['imgpro'] . '" alt="Score image" / class="img-rounded">'
                       ."</div>"."<div class=col-md-6>".$row['text']."</div>"."</div>"."</div>";
                       echo $constructor;
                   }
               }

               if (isset($_GET['development_show'])) {

                $getvardevelopment=$_GET['development_show'];
                $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                $query = "SELECT * FROM development_show WHERE id_k = '$getvardevelopment'";
                $data = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($data)) {
                   $constructor = "<div class= container>"."<div class=row>"."<div class=col-md-6>".
                   '<img src="' . GW_UPLOADPATH ."/developmentfiles"."/". $row['imggp'] . '" alt="Score image" / class="img-rounded">'.'<hr>'.'<img src="' . GW_UPLOADPATH ."/developmentfiles"."/". $row['imgpro'] . '" alt="Score image" / class="img-rounded">'
                   ."</div>"."<div class=col-md-6>".$row['text']."</div>"."</div>"."</div>";
                   echo $constructor;
               }
           }

           ?>
       </div>

       <div class="col-md-6 col-xs-6">

       </div>

   </div>

</div>
<!-- /.container -->

</div>
<!-- /.content-section-a -->


<a  name="contact"></a>
<div class="banner">

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h2><?php echo $lang['MENU_CONTACT'] ?><br />
                    <?php echo $lang['MENU_CONTACT2'] ?> <br />
                    <?php echo $lang['MENU_CONTACT3'] ?><br>
                    <?php echo $lang['MENU_CONTACT4'] ?></h2>
                </div>
                <div class="col-md-6">
                    <form method="POST" onSubmit="alert('Спасибо, Ваша заявка принята');">
                        <div class="form-group">
                            <label for="nameinput"><?php echo $lang['MENU_NAME'] ?></label>
                            <input type="text" class="form-control" id="nameinput" required placeholder="<?php echo $lang['MENU_NAME'] ?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phoneinput"><?php echo $lang['MENU_QUEST'] ?></label>
                            <input type="text" class="form-control" id="themeinput" required placeholder="<?php echo $lang['MENU_QUEST'] ?>" name="theme">
                        </div>
                        <div class="form-group">
                            <label for="phoneinput"><?php echo $lang['MENU_PHONE'] ?></label>
                            <input type="text" class="form-control" id="phoneinput" required placeholder="<?php echo $lang['MENU_PHONE'] ?>" name="phonenumber">
                        </div>
                        <button type="submit" class="btn btn-default" name="submit"><?php echo $lang['MENU_BUTTON'] ?></button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="index.php"><?php echo $lang['MENU_HOME'] ?></a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="doneobjects.php"><?php echo $lang['MENU_DONE'] ?></a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="development.php"><?php echo $lang['MENU_DEVELOPMENT'] ?></a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="inprocess.php"><?php echo $lang['MENU_INPROCESS'] ?></a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="about.php"><?php echo $lang['MENU_ABOUT_US'] ?></a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">&copy; <?php echo $lang['FOOTER_TEXT'] ?></p>

                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
