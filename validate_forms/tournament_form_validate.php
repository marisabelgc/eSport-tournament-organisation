<?php
require ('../connect.php');
global $connect;

if( 
	isset($_POST['name']) && 
	isset($_POST['address']) && 
	isset($_POST['game']) && 
	isset($_POST['start_date']) && 
	isset($_POST['schedule_hour1']) && 
	isset($_POST['schedule_hour2']) && 
	isset($_POST['schedule_min1']) && 
	isset($_POST['schedule_min2']) && 
	isset($_POST['prize1']) && 
	isset($_POST['prize2']) && 
	isset($_POST['prize3']) &&
	isset($_POST['form_type']))
{
	$date = explode('-',$_POST['start_date']);
	// Verificar si realmente date tiene dos guiones
	if( substr($_POST['start_date'], 4, 1) != "-" || substr($_POST['start_date'], 7, 1) != "-"){
		echo "Include dashes as date separator";

	}elseif($date[0] < 2010 || $date[0] > 2024  || $date[1] < 1 || $date[1] > 12 || $date[2] < 1 ||  $date[2] > 31){
		echo "Include a valid date";

	}elseif( ($_POST['schedule_hour1'] < 0 || $_POST['schedule_hour1'] > 23) ||
		($_POST['schedule_hour2'] < 0 || $_POST['schedule_hour2'] > 23) ){
		echo "Invalid schedule hour";

	}elseif( ($_POST['schedule_min1'] < 0 || $_POST['schedule_min1'] > 59) || 
		($_POST['schedule_min2'] < 0 || $_POST['schedule_min1'] > 59) ){
		echo "Invalid schedule minute";

	}else{
		// Convierte las horas y minutos a numeros de dos digitos
		$schedule = sprintf('%02d', $_POST['schedule_hour1']) . ":". sprintf('%02d', $_POST['schedule_min1'])." - ". sprintf('%02d', $_POST['schedule_hour2']).":". sprintf('%02d', $_POST['schedule_min2']);

		if( $_POST['form_type'] == "add"){

			$request = "INSERT INTO tournament (name, address, game, start_date, schedule, prize1, prize2, prize3) 
			VALUES ('$_POST[name]', '$_POST[address]', '$_POST[game]', '$_POST[start_date]', '$schedule', '$_POST[prize1]', '$_POST[prize2]', '$_POST[prize3]')";
			$result = mysqli_query($connect, $request);

		// Saber el ID de la tabla insertada
			if( isset($_POST['player']) || isset($_POST['sponsor']) ){
				$request = "SELECT id FROM tournament WHERE name = '$_POST[name]' & start_date = '$_POST[start_date]' & game = '$_POST[game]' ORDER BY creation_date DESC";
				$result = mysqli_query($connect, $request);
				$row = mysqli_fetch_assoc($result);

				if( isset($_POST['player'] )){
				// Unir players en una cadena de texto
					$SQLplayers = "";
					for( $i = 0; $i < count($_POST['player']); $i++){
						$SQLplayers .= "(".$row['id'].", ".$_POST['player'][$i]."),";
					}
					$SQLplayers = trim($SQLplayers, ",");

				// Insertar los players
					$request = "INSERT INTO tournament_player (tournament_id, player_id) VALUES $SQLplayers";
					$result = mysqli_query($connect, $request);
				}

				if( isset($_POST['sponsor'] )){
				// Unir sponsors en una cadena de texto
					$SQLsponsor = "";
					for( $i = 0; $i < count($_POST['sponsor']); $i++){
						$SQLsponsor .= "(".$row['id'].", ".$_POST['sponsor'][$i]."),";
					}
					$SQLsponsor = trim($SQLsponsor, ",");

				// Insertar los sponsors
					$request = "INSERT INTO tournament_sponsor (tournament_id, sponsor_id) VALUES $SQLsponsor";
					$result = mysqli_query($connect, $request);
				}
			}
			echo "success";

		}else{
			$request = "UPDATE tournament SET name = '$_POST[name]', address = '$_POST[address]', game ='$_POST[game]', start_date = '$_POST[start_date]', schedule = '$schedule', prize1 = '$_POST[prize1]', prize2 = '$_POST[prize2]', prize3 = '$_POST[prize3]' WHERE id = $_POST[id]";

			$result = mysqli_query($connect, $request);
			if( isset($_POST['player'] )){
				$request = "DELETE FROM tournament_player WHERE tournament_id = $_POST[id]";
				$result = mysqli_query($connect, $request);

				$SQLplayers = "";
				for( $i = 0; $i < count($_POST['player']); $i++){
					$SQLplayers .= "(".$_POST['id'].", ".$_POST['player'][$i]."),";
				}
				$SQLplayers = trim($SQLplayers, ",");

				// Insertar los players
				$request = "INSERT INTO tournament_player (tournament_id, player_id) VALUES $SQLplayers";
				$result = mysqli_query($connect, $request);
			}

			if( isset($_POST['sponsor'] )){
				$request = "DELETE FROM tournament_sponsor WHERE tournament_id = $_POST[id]";
				$result = mysqli_query($connect, $request);

				$SQLsponsor = "";
				for( $i = 0; $i < count($_POST['sponsor']); $i++){
					$SQLsponsor .= "(".$_POST['id'].", ".$_POST['sponsor'][$i]."),";
				}
				$SQLsponsor = trim($SQLsponsor, ",");

				// Insertar los sponsors
				$request = "INSERT INTO tournament_sponsor (tournament_id, sponsor_id) VALUES $SQLsponsor";
				$result = mysqli_query($connect, $request);
			}
			echo "success";
		}
	}
}
