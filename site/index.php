<?php

require_once('connectvars.php');
	require_once('functions.php');
		require_once('common.php');

    //checking if button is pressed, if true - add form to db
			if (isset($_POST['submit'])) {
				addApplicationToDB();
			}
			

			?>
			<!DOCTYPE html>
			<html lang="ru">

			<head>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">

				<title><?php echo $lang['PAGE_TITLE']?></title>

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
    				<a class="navbar-brand topnav" href="#"><?php echo $lang['MENU_HOME']?></a>
    			</div>
    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav navbar-right">

    					<li>

    						<a href="#done"> <span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span><?php echo $lang['MENU_DONE'] ?></a>

    					</li>

    					<li>
    						<a href="#development"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> <?php echo $lang['MENU_DEVELOPMENT'] ?></a>
    					</li>
    					<li>
    						<a href="#inprocess"><span style="margin-right: 5px"class="glyphicon glyphicon-collapse-down"></span> <?php echo $lang['MENU_INPROCESS'] ?></a>
    					</li>

    					<li>
    						<a href="about.php"><?php echo $lang['MENU_ABOUT_US'] ?></a>
    					</li>
    					<li class="dropdown">
    					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $lang['MENU_LANG']?><span class="caret"></span></a>
    						<ul class="dropdown-menu">
    							<li><a href="?lang=ru">Русский</a></li>
    							<li><a href="?lang=kk">Қазақ</a></li>
    							<li><a href="?lang=en">English</a></li>
    						</ul>
    					</li>
    					
    				</ul>
    			</div>
    			<!-- /.navbar-collapse -->
    		</div>
    		<!-- /.container -->
    	</nav>


    	<!-- Header -->
    	<a name="about"></a>
    	<div class="intro-header">
    		<div class="container">

    			<div class="row">
    				<div class="col-md-2">
    					<img class="img-responsive logo" src="img/logo.png">
    				</div>
    				<div class="col-md-10 col-xs-12">
    					<div class="intro-message">
    						<h1 class="text-right">
    							<?php echo $lang['HEADER_TITLE'] ?>
    						</h1>
    						<h3 class="text-right"><?php echo $lang['HEADER_TITLE2']?><br>
    							<?php echo $lang['HEADER_TITLE3'] ?>
    						</h3>

    					</div>

    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-12 col-xs-12">

    					<h3 class="text-center">
    						<span style="color: black">
    							<span style="background-color: rgb(255,241,0);">
    								<?php echo $lang['SLOGAN'] ?>
    							</span>
    						</span>
    					</h3>

    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<!-- /.intro-header -->

    	<!-- Page Content -->

    	<a  name="done"></a>
    	<div class="content-section-a">

    		<div class="container">
    			<div class="row">
    				<div class="col-lg-5 col-xs-12">
    					<hr class="section-heading-spacer">
    					<div class="clearfix"></div>
    					<h2 class="section-heading"><a href="doneobjects.php"><?php echo $lang['MENU_DONE'] ?></a></h2>
    					<p class="lead">
    						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel officiis mollitia earum, libero eum placeat corrupti nemo odio dicta, cupiditate impedit nulla natus aut ullam eveniet tenetur explicabo et iste!
    					</p>
    				</div>
    				<div class="col-lg-5 col-lg-offset-2 col-xs-12">
    					<a href="doneobjects.php"><img class="img-responsive img-rounded" src="img/doneobjectslogo.jpg" alt=""></a>
    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<!-- /.content-section-a -->
    	<a name="development"></a>
    	<div class="content-section-b">

    		<div class="container">

    			<div class="row">
    				<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
    					<hr class="section-heading-spacer">
    					<div class="clearfix"></div>
    					<h2 class="section-heading"><a href="development.php"><?php echo $lang['MENU_DEVELOPMENT'] ?></a></h2>
    					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam numquam totam eveniet harum quos ea labore explicabo quisquam, alias voluptatem perferendis atque quod nobis eum, dolor accusamus! Hic, modi, esse.</p>
    				</div>
    				<div class="col-lg-5 col-sm-pull-6  col-sm-6">
    					<a href="development.php"><img class="img-responsive img-rounded" src="img/developmentlogo.jpeg" alt=""></a>
    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<!-- /.content-section-b -->
    	<a name="inprocess"></a>
    	<div class="content-section-a">

    		<div class="container">

    			<div class="row">
    				<div class="col-lg-5 col-sm-6">
    					<hr class="section-heading-spacer">
    					<div class="clearfix"></div>
    					<h2 class="section-heading"><a href="inprocess.php"><?php echo $lang['MENU_INPROCESS'] ?></a></h2>
    					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, nihil temporibus eveniet harum rerum atque voluptate error? Nostrum nemo, veniam facere eius temporibus enim dolores, eum praesentium, explicabo quibusdam cupiditate.</p>
    				</div>
    				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
    					<a href="inprocess.php"> <img class="img-responsive img-rounded" src="img/inprocesslogo.jpg" alt=""></a>
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
    		<!-- /.banner -->
    		<a name="contact"></a>
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
    								<a href="#done"><?php echo $lang['MENU_DONE'] ?></a>
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
    			</div>
    		</footer>

    		<!-- jQuery -->
    		<script src="js/jquery.js"></script>

    		<!-- Bootstrap Core JavaScript -->
    		<script src="js/bootstrap.min.js"></script>

    	</body>

    	</html>
