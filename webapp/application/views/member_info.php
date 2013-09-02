<html>
<head>
	<title></title>
</head>
<body>
	<h2>Member Information</h2>
	<table>
			<tr>
			    <td>First Name</td>
			    <td><?php echo $member->first_name; ?></td>
			</tr>
			<tr>
			    <td>Last Name</td>
			    <td><?php echo $member->last_name; ?></td>
			</tr>
			<tr>
			    <td>Email</td>
			    <td><?php echo $member->email; ?></td>
			</tr>
			<tr>
			    <td>Contact Number</td>
			    <td><?php echo $member->contact_number; ?></td>
			</tr>
			<tr>
			    <td>Sex</td>
			    <td><?php echo $member->sex; ?></td>            
			</tr>
			<tr>
			    <td>Organization</td>
			    <td><?php echo $member->organization->name; ?></td>            
			</tr>
		</table>
	</table>	
</body>
</html>