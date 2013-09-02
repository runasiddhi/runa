<html>
<head>
	<title></title>
</head>
<body>
	<h2>Book List</h2>
	<?php
		if(isset($message)){
			echo $message;
		}
	?>
	<a href="index">Back</a>
	<table border="1" cellspacing="0">
		<tr>
			<th>Book Name</th>	
			<th></th>
		</tr>	
		<?php foreach($member_books as $member_book){ ?>
		<tr>
			<td><?php echo $member_book->organization_book->book->book_name; ?></td>
			<td><a href="../dashboard/revoke_book/<?php echo $member_book->id; ?>">Return</a></td>
		</tr>	
		<?php } ?>
	</table>
</body>
</html>