<html>
	<head>

		<title></title>
		<script type="text/javascript">
			function submitType(submitType) {
				if (submitType == 1) {
					document.frm.action = "view_all";
				} else if (submitType == 2)
					document.frm.action = "view_undeleted";
				else
					document.frm.action = "view_valid";
			}
		</script>

	</head>

	<body>

		<h2>Organization Member List</h2>

		<?php
			if(isset($message)){
				echo $message;
			}
		?>

		<form name="frm" method="post">
			<label for="organization" >organization</label>
			<select name='organization' >
		        <?php foreach($organization as $org_item){ ?>
		            <option value='<?php echo $org_item->id; ?>' ><?php echo $org_item->name; ?></option>
		        <?php } ?>
		    </select>
		    <input type="submit" value="Show all" onclick="submitType(1)">
		    <input type="submit" value="Show Undeleted" onclick="submitType(2)">    
		    <input type="submit" value="Show Valid" onclick="submitType(3)">
		</form>

		<?php
		if(isset($members)){ ?>	
			<table border="1" cellspacing="0">
				<tr>
					<th>First Name</th>	
					<th>Last Name</th>
					<th></th>
				</tr>	
				<?php foreach($members as $member){ ?>
				<tr>
					<td><?php echo $member->first_name; ?></td>
					<td><?php echo $member->last_name; ?></td>
					<td><a href="view_info/<?php echo $member->id; ?>">View</a></td>
				</tr>	
				<?php } ?>
			</table>
		<?php } ?>

	</body>
	
</html>