<?php

$user_id = $_REQUEST["id"];

$user_id;

include("conn.php");

$get_record = mysqli_query ($conn, "SELECT * FROM mytbl WHERE id='$user_id'");

while($row_edit = mysqli_fetch_assoc($get_record)) {

    $isbn = $row_edit["isbn"];
    $title = $row_edit["title"];
    $authors = $row_edit["authors"];
    $book_type = $row_edit["book_type"];
    $book_qty = $row_edit["book_qty"];
    $Date_Published = $row_edit["Date_Published"];

}

?>

<form method="POST" action="update.php">

<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

<input type="text" name="new_isbn" value="<?php echo $isbn; ?>">
<Br>

<input type="text" name="new_title" value="<?php echo $title; ?>">
<Br>

<input type="text" name="new_authors" value="<?php echo $authors; ?>">
<Br>

<input type="text" name="new_book_type" value="<?php echo $book_type; ?>">
<Br>

<input type="text" name="new_book_qty" value="<?php echo $book_qty; ?>">
<Br>

<input type="text" name="new_Date_Published" value="<?php echo $Date_Published; ?>">
<Br>

<input type="submit" value="Update">

</form>