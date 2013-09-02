<html>
<head>
	<title>Issue Book</title>
</head>
<body>
	<h2>Issue Book</h2>
	<a href="index">Back</a>
	<?php
	if(isset($message)){
		echo $message;
	}
	?>
	<?php echo form_open('dashboard/issue_book'); ?>

	<table>
		<tr>
			<td>Select a Book</td>
			<td>
				<select name="org_book">
					<option></option>
					<?php foreach($org_books as $org_book){ ?>
						<option value="<?php echo $org_book->id; ?>" ><?php echo $org_book->book->book_name; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Issue"></td>
		</tr>
	</table>
</form>
</body>
</html>