<div id="content" class="row">
<?php

echo 
			'<div class="col-12 med-col-2"><img id="userImage" alt="User Photo" src="images/'.$Users[0]->user_photo.'"></div>
			<div id="userDetails" class="col-12 med-col-10"> <span class="centerDetails"><span class="label">Name:</span> '.$Users[0]->user_lname.', '.$Users[0]->user_fname.'<br>
			<span class="label">User ID:</span> '.$Users[0]->id.'<br>
			<span class="label">Position:</span> '.$Users[0]->user_role.'<br></span></div>'
		;
?>
<br><br>
<div id="content" class="row">
<?php	
echo '<a href="http://localhost:8888/pdo_users/index.php?task=delete&id='.$Users[0]->id.'">delete User</a><br>';
echo '<a href="http://localhost:8888/pdo_users/index.php?task=update&id='.$Users[0]->id.'">update User</a>';
?>
</div>