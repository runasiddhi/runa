<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
		<p>You have successfully logged in!!</p>

		 <table>
			<tr>
			    <td>First Name</td>
			    <td><?php echo $member_item->first_name; ?></td>
			</tr>
			<tr>
			    <td>Last Name</td>
			    <td><?php echo $member_item->last_name; ?></td>
			</tr>
			<tr>
			    <td>Email</td>
			    <td><?php echo $member_item->email; ?></td>
			</tr>
			<tr>
			    <td>Contact Number</td>
			    <td><?php echo $member_item->contact_number; ?></td>
			</tr>
			<tr>
			    <td>Sex</td>
			    <td><?php echo $member_item->sex; ?></td>            
			</tr>
			<tr>
			    <td>Organization</td>
			    <td><?php echo $member_item->organization->name; ?></td>            
			</tr>
		</table>

		<a href="issue_book"><h3>Issue Book</h3></a>
		<a href="view_booklist"><h3>View Books</h3></a>
		<a href="logout"><h3>Logout</h3></a>
	</body>
</html>