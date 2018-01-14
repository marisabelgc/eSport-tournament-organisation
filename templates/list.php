<div class="container">
	<?php 
	require('templates/breadcrumb_second_level.php');
	$per_page = 10;
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1 ;	
	$num_pages = ceil( count_table( $page_name ) / $per_page);
	$next_page = $current_page++;
	$prev_page = $current_page--;
	$start = ($current_page * $per_page) - $per_page;
	
	if(count_table($page_name) > 0){ ?>
	<table class="table table-hover  well">
		<tr class="active">
			<?php echo $page_name != "user" ? "<th>Name</th>" : "";?>			
			<th><?php echo isset($th_title)? $th_title : $second_col; ?></th>
			<th></th>
		</tr>
		<?php
		$cols = $page_name == "user" ? "id, " : "id, name, ";
		all_table($cols.$second_col, $page_name, $start, $per_page);
		?>
		</table>
		<?php
	}else{
		echo '<div class="well">There are not '.$page.'s yet</div>';
	}?>  
</div>