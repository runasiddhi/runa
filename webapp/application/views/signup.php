<h3>Sign Up</h3>
<?php echo validation_errors(); ?>

<?php
    if(isset($message))
    {
        echo $message;
    }

?>

<?php echo form_open('signup'); ?>
    <table>
        <tr>
            <td><label for="fname">First Name</label></td>
            <td><input type="text" name="fname"/></td>
        </tr>
        <tr>
            <td><label for="lname">Last Name</label></td>
            <td><input type="text" name="lname"/></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" name="email"/></td>
        </tr>
        <tr>
            <td><label for="contactno">Contact Number</label></td>
            <td><input type="text" name="contactno"/></td>
        </tr>
        <tr>
            <td><label for="sex">Sex</label></td>
            <td>
                <select name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </td>            
        </tr>
        <tr>
            <td><label for="address">Username</label></td>
            <td><input type="text" name="username"/></td>
        </tr>
        <tr>
            <td><label for="address">Password</label></td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td><label for="confirm_password">Confirm Password</label></td>
            <td><input type="password" name="confirm_password"></td>
        </tr>
        <tr>
            <td>Organization</td>
            <td>
                <select name='organization' >
                    <?php foreach($organization as $org_item){ ?>
                        <option value='<?php echo $org_item->id; ?>' ><?php echo $org_item->name; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Sign Up"/></td>
        </tr>
    </table>
</form>
</body>
</html>
