<html>
<head>
    <title></title>
</head>
<body>

<?php echo form_open('books'); ?>
    <h2>Add Books</h2>
    <?php
        if(isset($message)){
            echo $message;
        }
    ?>
    <table>
        <tr>
            <td><label for="book_name">Book Name</label></td>
            <td><input type="text" name="book_name"/></td>
        </tr>
        <tr>
            <td><label for="author">Author</label></td>
            <td><input type="text" name="author"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save"/></td>
        </tr>
    </table>
</form>
</body>
</html>