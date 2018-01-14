<ol class="breadcrumb">
	<li><a href="index.php">Dashboard</a></li>
	<li><a href="<?php echo $page_name;?>_list.php"><?php echo $page_name;?>s</a></li>
	<li class="active">
		<span>
			<?php 
			if($page_function == "Add a New" || $page_function == "Edit"){
				echo $page_function." ".$page_name;
			}else{
				echo $page_function;
			}			
			?>
		</span>
	</li>
</ol>
<div class="title-wmargin">
	<h3>
		<?php 
		if($page_function == "Add a New" || $page_function == "Edit"){
			echo $page_function." ".$page_name;
		}else{
			echo $page_function;
		}			
		?>
	</h3>
</div> 