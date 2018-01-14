<?php 
require ('connect.php');

/* INDEX --------------------------------------*/
function count_table($table){
	global $connect;
	$request = "SELECT COUNT(id) FROM $table";
	$result = mysqli_query($connect, $request);
	$row = $result->fetch_row();
	return $row[0];
}

/* _lists ----------------------------------*/
function all_table($cols, $table, $start, $per_page){
	global $connect;	
	$request = "SELECT $cols FROM $table LIMIT $start, $per_page";
	$result = mysqli_query($connect, $request);
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>";
		echo $table == 'user'? $row['email'] : $row['name'];
		echo "</td><td>";
		echo $table == 'tournament'? $row['start_date'] : ($table == 'sponsor'? $row['url'] : ($table == 'player' || $table == 'user'? $row['email'] : '') );
		echo '<td class="text-right"><a href="' .$table. '.php?id='.$row['id'].'">View <span class="f0 md-f1">' .$table. ' »</span></a></td></tr>';
	}		
}

/* Tournament, sponsor, player----------------*/
function get_table($table, $id){
	global $connect;
	$request = "SELECT * FROM $table WHERE id=$id";
	$result = mysqli_query($connect, $request);
	return mysqli_fetch_assoc($result);
}

/* Count rows in relational tables -------------------*/
function rel_tables_count($rel_tables, $id){
	global $connect;
	if($rel_tables == 'tournament_sponsor'){
		$request = "SELECT COUNT(*) FROM tournament_sponsor JOIN sponsor ON tournament_sponsor.sponsor_id = sponsor.id WHERE tournament_sponsor.tournament_id = $id";
	}elseif ($rel_tables == 'tournament_player') {
		$request = "SELECT COUNT(*) FROM tournament_player JOIN player ON tournament_player.player_id = player.id WHERE tournament_player.tournament_id = $id";
	}	
	$result = mysqli_query($connect, $request);
	$row = $result->fetch_row();
	return $row[0];
}

function rel_tables_get($id, $page, $get_table){
	global $connect;
	if($page == 'tournament'){

		$cols = ($get_table == "sponsor"? 'sponsor.id, sponsor.name, sponsor.url' : 'player.id, player.name, player.last_name, player.email, player.username');

		$request = "SELECT " .$cols. " FROM ".$get_table." JOIN tournament_".$get_table." ON ".$get_table.".id = tournament_".$get_table.".".$get_table."_id WHERE tournament_".$get_table.".tournament_id = $id";
		$result = mysqli_query($connect, $request);
		$count = 1;
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>" .$count. "</td><td>" .$row['name'];
			echo $get_table == "player"? $row['last_name'] : '';
			echo "</td><td>";
			echo $get_table == "player"? $row['email'] : '<a href="'.$row['url'].'">'.$row['url'].'</a>';
			echo '</td><td class="text-right"><a href="'.$get_table.'.php?id='.$row['id'].'">View '.$get_table.' details »</a></td></tr>';
			$count++;
		}
		
	}elseif($page == 'tournament_add'){

		if($get_table == 'player'){
			$idLetter = 'p';
			$cols = 'id, username';
		}elseif($get_table == 'sponsor'){
			$idLetter = 's';
			$cols = 'id, name';
		}

		$request = "SELECT " .$cols. " FROM " .$get_table. " ORDER BY id ASC";
		$result = mysqli_query($connect, $request);
		while($row = mysqli_fetch_assoc($result)){
			echo '<input type="checkbox" name="' .$get_table. '" id="'. $idLetter. '' .$row['id'] .'" value="'. $row['id'] .'" class="f-light"> <label for="'. $idLetter. '' .$row['id'] .'" class="f-light">';
			echo $get_table == 'player'? $row['username'] : $row['name'];
			echo '</label><br>';				
		}
		
	}elseif($page == 'tournament_edit'){
		if($get_table == 'sponsor'){
			$sponsors = [];

			$request = "SELECT tournament_sponsor.sponsor_id FROM tournament_sponsor
			JOIN tournament ON tournament.id = tournament_sponsor.tournament_id
			WHERE tournament_sponsor.tournament_id = $id
			ORDER BY tournament_sponsor.sponsor_id";
			$result = mysqli_query($connect, $request);		
			while($row = mysqli_fetch_assoc($result)){
				array_push($sponsors, $row['sponsor_id']);
			}

			$request = "SELECT id, name FROM sponsor ORDER BY id";
			$result = mysqli_query($connect, $request);
			$row = "";
			$x = 0;

			while($row = mysqli_fetch_assoc($result)){
				if( $row['id'] == @$sponsors[$x] ){
					echo '<input type="checkbox" name="sponsor" id="s'. $row['id'] .'" value="'. $row['id'] .'" checked="checked"> <label for="s'. $row['id'] .'" class="f-light">'. $row['name'] .'</label><br>';
					$x++;
				}else{
					echo '<input type="checkbox" name="sponsor" id="s'. $row['id'] .'" value="'. $row['id'] .'"> <label for="s'. $row['id'] .'" class="f-light">'. $row['name'] .'</label><br>';
				}				
			}
		}elseif($get_table == 'player'){
			
			$players = [];

			$request = "SELECT tournament_player.player_id FROM tournament_player
			JOIN tournament ON tournament.id = tournament_player.tournament_id
			WHERE tournament_player.tournament_id = $id
			ORDER BY tournament_player.player_id";
			$result = mysqli_query($connect, $request);			
			while($row = mysqli_fetch_assoc($result)){
				array_push($players, $row['player_id']);
			}

			$request = "SELECT id, username FROM player ORDER BY id";
			$result = mysqli_query($connect, $request);
			$row = "";
			$x = 0;
			while($row = mysqli_fetch_assoc($result)){
				if( $row['id'] == @$players[$x] ){
					echo '<input type="checkbox" name="player" id="p'. $row['id'] .'" value="'. $row['id'] .'" checked=""> <label for="p'. $row['id'] .'" class="f-light">'. $row['username'] .'</label><br>';
					$x++;
				}else{
					echo '<input type="checkbox" name="player" id="p'. $row['id'] .'" value="'. $row['id'] .'"> <label for="p'. $row['id'] .'" class="f-light">'. $row['username'] .'</label><br>';
				}				
			}
		}
	}elseif($page == 'sponsor' || $page == 'player' ){
		$request = "SELECT tournament.id, tournament.name FROM tournament JOIN tournament_".$page." ON tournament.id = tournament_".$page.".tournament_id WHERE tournament_".$page.".".$page."_id = $id";
		$result = mysqli_query($connect, $request);
		echo "<ol>";
		while($row = mysqli_fetch_assoc($result)){
			printf('<li><a href="http://localhost/GamesRise-BackEndUI/tournament.php?id=%s">%s</a></li>', $row['id'],$row['name']);
		}
		echo "</ol>";

	}elseif($page == 'sponsor_add' || $page == 'player_add'){
		$request = "SELECT id, name FROM tournament ORDER BY id ASC";
		$result = mysqli_query($connect, $request);
		while($row = mysqli_fetch_assoc($result)){
			echo '<input type="checkbox" name="tournament" id="p'. $row['id'] .'" value="'. $row['id'] .'" class="checkbox-tournament"> <label for="p'. $row['id'] .'" class="f-light">'. $row['name'] .'</label><br>';				
		}
		
	}elseif($page == 'sponsor_edit' || $page == 'player_edit'){

		$page == 'sponsor_edit'? $page='sponsor' : $page = 'player';
		$tournaments = [];

		$request = "SELECT tournament_".$page.".tournament_id FROM tournament_".$page."
		JOIN tournament ON tournament.id = tournament_".$page.".tournament_id
		WHERE tournament_".$page.".".$page."_id = ".$id."
		ORDER BY tournament_".$page.".tournament_id";
		$result = mysqli_query($connect, $request);		
		while($row = mysqli_fetch_assoc($result)){
			array_push($tournaments, $row['tournament_id']);
		}

		$request = "SELECT id, name FROM tournament ORDER BY id";
		$result = mysqli_query($connect, $request);
		$row = "";
		$x = 0;

		while($row = mysqli_fetch_assoc($result)){
			if( $row['id'] == @$tournaments[$x] ){
				echo '<input type="checkbox" name="tournament" id="t'. $row['id'] .'" value="'. $row['id'] .'" checked="checked"> <label for="t'. $row['id'] .'" class="f-light">'. $row['name'] .'</label><br>';
				$x++;
			}else{
				echo '<input type="checkbox" name="tournament" id="t'. $row['id'] .'" value="'. $row['id'] .'"> <label for="t'. $row['id'] .'" class="f-light">'. $row['name'] .'</label><br>';
			}				
		}
	}	
}

?>