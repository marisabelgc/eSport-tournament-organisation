<?php include('templates/header.php');
$player = get_table('player', $_GET['id']);
?>

<div class="container">
	<?php 
	$page_name = "Player";
	$page_function = $player['name'];
	require('templates/breadcrumb_third_level.php'); 
	?> 		

	<div class="well">
		<dl class="dl-horizontal patrocinador">
			<dt>Name</dt>
			<dd><?php echo $player['name']." ".$player['last_name'];?></dd>
			<hr>
			<dt>Email</dt>
			<dd><?php echo '<a href="'.$player['email'].'">'.$player['email'].'</a>';?></dd>
			<hr>
			<dt>Tournaments</dt>
			<dd>
				<ol>
					<?php rel_tables_get($_GET['id'], 'player', 'tournament'); ?>
				</ol>
			</dd>			
		</dl>
		<div class="clear">
			<div class="floatr">
				<a href="player_edit.php?id=<?php echo $_GET['id'];?>" class="btn btn-normal">Edit</a>
				<a href="validate_forms/delete_validate.php?table=player&id=<?php echo $_GET['id'];?>" class="btn btn-danger" role="button">Delete</a>
			</div>
			<br><br><br>
		</div>
		
		
	</div>
</div>

<?php include('templates/footer.php');?>