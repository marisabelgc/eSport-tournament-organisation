<?php
require ('../connect.php');
global $connect;

if( isset( $_GET['id'] ) && isset( $_GET['table'] ) ){
	$request = "DELETE FROM $_GET[table] WHERE id='$_GET[id]'";
	$result = mysqli_query($connect, $request);

	if($result){
		if( $_GET['table'] == 'tournament'){
			header("Location: http://localhost/GamesRise-BackEndUI/tournament_list.php");

		}elseif( $_GET['table'] == 'sponsor'){
			header("Location: http://localhost/GamesRise-BackEndUI/sponsor_list.php");

		}elseif( $_GET['table'] == 'player'){
			header("Location: http://localhost/GamesRise-BackEndUI/player_list.php");

		}elseif( $_GET['table'] == 'user'){
			header("Location: http://localhost/GamesRise-BackEndUI/user_list.php");
		}
	}
}
