<?php
 include("conn.php");
$id = $_REQUEST["id"];
 

$query_delete = mysqli_query($conn, "SELECT * FROM mytbl WHERE id = '$id' ");
 
    while($row_delete = mysqli_fetch_assoc($query_delete)) {
        $user_id = $row_delete["id"];
 
        $isbn = $row_delete["isbn"];
        $title = $row_delete["title"];
        $authors = $row_delete["authors"];
        $book_type = $row_delete["book_type"];
        $book_qty = $row_delete["book_qty"];
        $Date_Published = $row_delete["Date_Published"];
    }
 
    echo "<h1> Are you sure you want to delete $title ? <h1>";
 
?>
 
<form method="POST" action="Delete_Now.php">
 
<input type="hidden" name="user_id" value="<?php echo $id; ?>">
 
<Br>
<Br>
 
<input type="submit" value="Yes"> &nbsp; <a href='index.php'>No</a>
 
</form>
 