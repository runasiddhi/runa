<html>
<head>
	<title></title>
</head>
<body>
	<h2>Organization List</h2>

	<table border="1" cellspacing="0">
		<tr>
			<td>Organization</td>
			<td></td>
		</tr>
		<?php foreach ($organizations as $organization) { ?>
			<tr>
				<td><?php echo $organization->name; ?></td>
					<?php
						if(!$organization->is_active){
							echo '<td><a href="activate_org/'.$organization->id.'" >Activate</a></td>';
						}
						else{
							echo '<td><a href="deactivate_org/'.$organization->id.'">Deactivate</a></td>';
						}
					?>
			</tr>
		<?php } ?>
		
	</table>
</body>
</html>