<div class="container  text-center">
	<ul class="pagination">
		<?php 
		echo $current_page > 1 ? '<li><a href="#"> &#10094; &nbsp;&nbsp;<b>Previous</b></a></li>' : '';
		for($i = 1 ; $i <= $num_pages; $i++){
			if( $current_page == $i){
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			}else{				
				echo '<li><a href="'. $page_name .'_list.php?page='.$i.'">'.$i.'</a></li>';
			}			
		}
		echo $current_page < $num_pages ? '<li><a href="#"> <b>Next</b> &nbsp;&nbsp; &#10095; </a></li>' : '';
		?>		
	</ul>
</div>