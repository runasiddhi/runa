<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <title>Organization Signup Form</title>
	</head>
	<body>
		<?php
			if(isset($message))
			{
				echo $message;
			}
		?>

	<div id="org_form">
	 
	    <p class="heading"><h4>Add New Organization</h4></p>

	    <?php echo form_open('organizations'); ?>

		    <p>
		        <label for="org_name">Organization Name: </label>
		        <input type="text" name="name">
		    </p>
		 
		 	<p>
		        <label for="address">Address: </label>
		        <input type="text" name="address">
		    </p>

			<p>
		        <label for="telephone">Contact Number: </label>
		        <input type="text" name="contact_number">
		    </p>

		    <p>
		        <label for="email">E-mail: </label>
		        <input type="email" name="email">
		    </p>
		 
		    <p>
		    	<input type="submit" name="submit" value="Add Organization">
		    </p>
	 
	    </form>
	 
	</div>
	 
	</body>
	</html>