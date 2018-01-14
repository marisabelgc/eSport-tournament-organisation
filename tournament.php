<?php include('templates/header.php');
$tournament = get_table('tournament', $_GET['id']);
$num_players = rel_tables_count('tournament_player',$_GET['id']);
$num_sponsors = rel_tables_count('tournament_sponsor',$_GET['id']);
?>

<div class="container">
	<?php 
	$page_name = "Tournament";
	$page_function = $tournament['name'];
	require('templates/breadcrumb_third_level.php'); 
	?>    		

	<div class="well">
		<h4>Details</h4>
		<dl class="dl-horizontal">
			<dt>Event Date</dt>
			<dd><?php echo $tournament['start_date'];?></dd>
			<hr>
			<dt>Creation Date</dt>
			<dd><?php echo $tournament['creation_date'];?></dd>
			<hr>
			<dt>Players</dt>
			<dd><?php echo $num_players;?></dd>
			<hr>
			<dt>Sponsors</dt>
			<dd><?php echo $num_sponsors;?></dd>
			<hr>
			<dt>Address</dt>
			<dd><?php echo $tournament['address'];?></dd>
			<hr>
			<dt>Schedule</dt>
			<dd><?php echo $tournament['schedule'];?></dd>
			<hr>
			<dt>Game</dt>
			<dd><?php echo $tournament['game'];?></dd>
			<hr>
			<dt>First Prize</dt>
			<dd><?php echo $tournament['prize1'];?></dd>
			<hr>
			<dt>Second Prize</dt>
			<dd><?php echo $tournament['prize2'];?></dd>
			<hr>
			<dt>Third Prize</dt>
			<dd><?php echo $tournament['prize3'];?></dd>
		</dl>					
		<div class="clear mr2">
			<div class="floatr">
				<a href="tournament_edit.php?id=<?php echo $_GET['id'];?>" class="btn">Edit</a>
				<a href="validate_forms/delete_validate.php?table=tournament&id=<?php echo $_GET['id'];?>" class="btn btn-danger" role="button">Delete</a>
			</div>
			<br><br><br>
		</div>
	</div>

	<div class="well">
		<h4>Sponsors</h4>
		<?php if($num_sponsors == 0){ 
			?>
			<table class="table table-hover">
				<tr>
					<th>This tournament have not sponsors yet.</th>
				</tr>
			</table>
			<?php
		}else{
			?>
			<table class="table table-hover">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>URL</th>
					<th></th>
				</tr>
				<?php rel_tables_get($tournament['id'], 'tournament', 'sponsor'); ?>	
			</table>
			<?php
		}?>	
	</div>

	<div class="well">
		<h4>Players</h4>
		<?php if($num_players == 0){ 
			?>
			<table class="table table-hover">
				<tr>
					<th>This tournament have not players yet.</th>
				</tr>
			</table>
			<?php
		}else{
			?>
			<table class="table table-hover">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
				</tr>
				<?php rel_tables_get($tournament['id'], 'tournament', 'player'); ?>						
			</table>
			<?php
		}?>			
	</div>
</div>
<?php include('templates/footer.php');?>