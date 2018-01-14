<div class="container">
	<?php require('templates/breadcrumb_third_level.php'); ?>     		
	<div class="well">
		<form class="ajax" method="post" action="validate_forms/<?php echo $page_name;?>_form_validate.php">
			<input type="hidden" name="form_type" value="<?php echo $page_function == 'Edit'? 'edit' : 'add';?>">
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			<?php
			if($page_function == 'Edit'){
				$row = get_table($page_name, $_GET['id']);
			}
			require('templates/'.$page_name.'_form.php'); 
			?>          
			<br><br>
			<div class="text-right">
				<button type="submit" class="btn btn-primary"><?php echo $page_function. " " .$page_name;?></button>
			</div>

		</form>

	</div>
</div>
<script src="js/<?php echo $page_name;?>_validate.js"></script>