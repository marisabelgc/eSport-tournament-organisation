<?php include('templates/header.php');
$sponsor = get_table('sponsor', $_GET['id']);
?>

<div class="container">
	<?php 
	$page_name = "Sponsor";
	$page_function = $sponsor['name'];
	require('templates/breadcrumb_third_level.php'); 
	?>   		

	<div class="well">
		<dl class="dl-horizontal patrocinador">
			<dt>URL</dt>
			<dd><?php echo '<a href="'.$sponsor['url'].'">'.$sponsor['url'].'</a>';?></dd>
			<!-- <hr>
			<dt>Logo</dt>
			<dd><img src="img/logo.png"></dd> -->
			<hr>
			<dt>Description</dt>
			<dd><?php echo $sponsor['description'];?></dd>
			<hr>
			<dt>Tournaments Sponsored</dt>
			<dd><?php rel_tables_get($_GET['id'], 'sponsor', 'tournament'); ?></dd>
			
		</dl>
		<div class="clear">
			<div class="floatr">
				<!-- <a href="editar_img_patrocinador.php" class="btn btn-normal">Cambiar logo</a> -->
				<a href="sponsor_edit.php?id=<?php echo $_GET['id'];?>" class="btn btn-normal">Edit</a>
				<a href="validate_forms/delete_validate.php?table=sponsor&id=<?php echo $_GET['id'];?>" class="btn btn-danger" role="button">Delete</a>
			</div>
			<br><br><br>
		</div>
		
		
	</div>
</div>

<?php include('templates/footer.php');?>