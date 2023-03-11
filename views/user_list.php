<div id="content" class="row">
	<ul>
		<?php
		for($i = 0; $i < $rows; $i++) { 
			echo '<a class="col-12 med-col-6" href="index.php?id='.$Users[$i]->id.'"><li>'.$Users[$i]->user_fname.' '.$Users[$i]->user_lname.'</li></a>';
		}
		?>
	</ul>
</div>
<div id="content" class="row"><a href="http://localhost:8888/pdo_users/index.php?task=create"> create new User</a></div>