 <?php

require_once('connectvars.php');
require_once('functions.php');

//checking if button is pressed, if true - add form to db
    if (isset($_POST['submit'])) {
        addApplicationToDB();
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
                    <a class="navbar-brand topnav" href="index.php">Главная страница</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <li>

                            <a href="#done"> <span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span>Завершенные объекты</a>

                        </li>

                        <li>
                        <a href="#development"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> Объекты в процессе строительства</a>
                        </li>
                        <li>
                            <a href="#inprocess"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> Объекты в процессе проектирования</a>
                        </li>
                        <li>
                            <a href="#contact"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> Контакты</a>
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
                        <h2 class="section-heading text-center">Объекты введенные в эксплуатацию</h2>
                        <p class="lead text-center">Завершенные объекты</p>
                    </div>
                    <!--Slider-->
                    <div class="col-md-6 col-xs-6">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                              <img src="img/test.png" alt="">
                              <div class="carousel-caption">
                                  <h3>Схема</h3>
                                  <p>Карта</p>
                              </div>
                          </div>
                          <div class="item">
                              <img src="img/test2.png" alt="">
                              <div class="carousel-caption">
                                  <h3>Схема</h3>
                                  <p>Карта</p>
                              </div>
                          </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!--end of slider-->
            <div class="col-md-6 col-xs-6">Объект в 7 микрорайоне
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
                        <h2>Заинтересованы?<br />
                            Заполните форму, оставьте свою заявку <br />
                            И мы с Вами свяжемся</h2>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" onSubmit="alert('Спасибо, Ваша заявка принята');">
                                <div class="form-group">
                                    <label for="nameinput">Имя</label>
                                    <input type="text" class="form-control" id="nameinput" placeholder="Ваше Имя" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="phoneinput">Контактный номер</label>
                                    <input type="text" class="form-control" id="phoneinput" placeholder="Телефон" name="phonenumber">
                                </div>
                                <button type="submit" class="btn btn-default" name="submit">Оставить заявку</button>
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
                        <a href="#">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>