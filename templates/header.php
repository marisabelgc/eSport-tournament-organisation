<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Organization Name | Dashboard</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootflat.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">		

</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Organization Name</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="tournament_list.php">Tournaments</a></li> 
					<li><a href="sponsor_list.php">Sponsors</a></li> 
					<li><a href="player_list.php">Players</a></li>                      
				</ul>				
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>	

	<?php require('functions.php'); ?>