<?php
	include "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Blog Home - Start Bootstrap Template</title>
		<link href="<?php echo SERVERURL; ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo SERVERURL; ?>css/blog-home.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo SERVERURL; ?>inicio/">Start Bootstrap</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo SERVERURL; ?>pagina1/var1/var2/">Pagina 1</a></li>
						<li><a href="<?php echo SERVERURL; ?>pagina2/">Pagina 2</a></li>
						<li><a href="<?php echo SERVERURL; ?>pagina3/">Pagina 3</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- <h1 class="page-header">Page Index<small>Secondary Text</small></h1> -->
					<?php
						if(isset($_GET['view'])){
							$views = explode("/", $_GET['view']);
							if(is_file('views/'.$views[0].'-view.php')){
								include 'views/'.$views[0].'-view.php';
							}else{
								include 'views/inicio-view.php';
							}
						}else{
							include 'views/inicio-view.php';
						}
					?>
				</div>
			</div>
		</div>
		<script src="<?php echo SERVERURL; ?>js/jquery.min.js"></script>
		<script src="<?php echo SERVERURL; ?>js/bootstrap.min.js"></script>
	</body>
</html>
