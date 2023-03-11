
	<section id="updateForm" class="row">
		<form method="POST" action="index.php?task=create" enctype="multipart/form-data">
			<label for="user_lname">Last Name:</label>
			<input type="text" name="user_lname" id="user_lname" required><br>

			<label for="user_fname">First Name:</label>
			<input type="text" name="user_fname" id="user_fname" required><br>

			<label for="user_username">Username:</label>
			<input type="text" name="user_username" id="user_username" required><br>

			<label for="user_password">Password:</label>
			<input type="password" name="user_password" id="user_password" required><br>

			<label for="user_role">Role:</label>
			<input type="text" name="user_role" id="user_role" required><br>

			<label for="user_photo">Photo:</label>
			<input type="text" name="user_photo" id="user_photo" required><br>

			<input type="submit" value="Create User">
		</form>
		</section>