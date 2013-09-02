<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if(isset($message)){
		echo $message;
	}
	?>
	<h2>Order Books</h2>
	<?php echo form_open('orderbook'); ?>
	<table>
		<tr>
			<td>Organization Name</td>
			<td>
				<select name="org_id">
					<?php foreach ($organizations as $organization) { ?>
						<option value="<?php echo $organization->id; ?>" ><?php echo $organization->name; ?></option>						
					<?php } ?>					
				</select>
			</td>
		</tr>
		<tr>
			<td>Book Name</td>
			<td>
				<select name="book_id">
					<?php foreach ($books as $book) { ?>
						<option value="<?php echo $book->id; ?>" ><?php echo $book->book_name; ?></option>						
					<?php } ?>					
				</select>
			</td>
		</tr>
		<tr>
			<td>Quantity</td>
			<td><input type="text" name="quantity"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnsubmit" value="Order" /></td>
		</tr>
	</table>
</form>
</body>
</html>