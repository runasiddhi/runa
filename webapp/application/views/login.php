<h2>Login</h2>
<?php
if(isset($message)){
	echo $message;
}

if($this->session->flashdata('error'))
{
	echo $this->session->flashdata('error');
}
?>
<?php echo form_open('login'); ?>
<table>
<tr>
	<td>User Name</td>
	<td><input type="text" name="user_name"></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="pass_word"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="login" value="Log In" /></td>
</tr>
</table>
<a href="signup">Sign Up</a>