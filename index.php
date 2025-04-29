<?php
include("conn.php");

$isbn = $title = $authors = $book_type = $book_qty = $Date_Published = "";
$isbnErr = $titleErr = $authorsErr = $book_typeErr = $book_qtyErr = $Date_PublishedErr = "";

if ($_SERVER ["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["isbn"])) {
        $isbnErr = "ISBN is required";
    }else{
        $isbn = $_POST["isbn"];
    }

    // if(empty($_POST["isbn"])) {
    //     $isbnErr = "ISBN is required";
    // }else{
    //     $isbn = $_POST["isbn"];
    // }
    
    if(empty($_POST["title"])) {
        $titleErr = "Title is required";
    }else{
        $title = $_POST["title"];
    }
    
    if(empty($_POST["authors"])) {
        $authorsErr = "Author's Name is required";
    }else{
        $authors = $_POST["authors"];
    }
    
    if(empty($_POST["book_type"])) {
        $book_typeErr = "Book Type  is required";
    }else{
        $book_type = $_POST["book_type"];
    }
    
    if(empty($_POST["book_qty"])) {
        $book_qtyErr = "Book Quantity  is required";
    }else{
        $book_qty = $_POST["book_qty"];
    }
    
    if(empty($_POST["Date_Published"])) {
        $Date_PublishedErr = "Date Published  is required";
    }else{
        $Date_Published = $_POST["Date_Published"];
    }
    
}
if($isbn && $title && $authors && $book_type && $book_qty && $Date_Published){

    // $check_email = mysqli_query($conn,"SELECT * FROM mytbl WHERE email='$email'");
    // $check_email_row = mysqli_num_rows($check_email);

    // if($check_email_row > 0){
    //     $emailErr = "Email is already registered";

    // }else{

        $query = mysqli_query($conn,"INSERT INTO mytbl(isbn,title,authors,book_type,book_qty,Date_Published)

        VALUES('$isbn','$title','$authors','$book_type','$book_qty','$Date_Published')");

        echo"<script language='javascript'>alert('New Record has been inserted!')</script>";
        echo"<script>window.location.href='index.php';</script>";

    // }    
}
?>
 
<style>
.error{
    color:red;
}
</style>

<br>

<?php include("nav.php"); ?>

<br>
<br>
 
<form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<label>BOOK ISBN: <input type="text" name="isbn" value="<?php echo $isbn; ?>"> <br>
<span class="error"><?php echo $isbnErr; ?></span> <br></label>
 
<label>BOOK TITLE: <input type="text" name="title" value="<?php echo $title; ?>"> <br>
<span class="error"><?php echo $titleErr; ?></span> <br></label>

<label>BOOK AUTHORS: <input type="text" name="authors" value="<?php echo $authors; ?>"> <br>
<span class="error"><?php echo $authorsErr; ?></span> <br></label>
 
<label>BOOK TYPE: <input type="text" name="book_type" value="<?php echo $book_type; ?>"> <br>
<span class="error"><?php echo $book_typeErr; ?></span> <br></label>
 
<label> BOOK QTY: <input type="text" name="book_qty" value="<?php echo $book_qty; ?>"> <br>
<span class="error"><?php echo $book_qtyErr; ?></span> <br></label>
 
<label>DATE  PUBLISHED #: <input type="tel" name="Date_Published" value="<?php echo $Date_Published; ?>"> <br>
<span class="error"><?php echo $Date_PublishedErr; ?></span> <br></label>

<!-- <label>Password: <input type="password" name="password" value="<?php echo $password; ?>"> <br>
<span class="error"><?php echo $passwordErr; ?></span> <br></label>

<label>Confirm Password: <input type="password" name="cpassword" value="<?php echo $cpassword; ?>"> <br>
<span class="error"><?php echo $cpasswordErr; ?></span> <br></label> -->
 
<input type="submit" value="Submit">
 
</form>
 
<hr>
 
<?php
 


        #$query = mysqli_query($conn, "INSERT INTO mytable(name, address, email, section, contact) VALUES('$name', '$add','$email', '$sect', '$contact') ");
 
        #echo"<script language='javascript'>alert('New Record has been inserted!')</script>";
        #echo"<script>window.location.href='index.php';</script>";

        echo "<table border='1' width='50%'>";
        echo "<tr>
                <td>ISBN</td>
                <td>TITLE</td>
                <td>AUTHORS</td>
                <td>GENRE</td>
                <td>Qty</td>
                <td>Date_Published</td>
                <td>Option</td>
             </tr>";    

    $view_query = mysqli_query($conn,"SELECT * FROM mytbl");
 
    while($row = mysqli_fetch_array($view_query)){
        $id = $row["id"];
        $isbn = $row["isbn"];
        $title = $row["title"];
        $authors = $row["authors"];
        $book_type = $row["book_type"];
        $book_qty = $row["book_qty"];
        $Date_Published = $row["Date_Published"];
      

        echo "<tr>
            <td>$isbn</td>
            <td>$title</td>
            <td>$authors</td>
            <td>$book_type</td>
            <td>$book_qty</td>
            <td>$Date_Published</td>
 
            <td>
            <a href='Edit.php?id=$id'>Update</a>
            &nbsp;
            <a href='Delete.php?id=$id'>Delete</a>
            </td>
         </tr>";
 
       
    }
    echo "</table>";
?>

<?php
 
$Paul = "Paul";
$Mika = "Mika";
$Kaye = "Kaye";
 
$names = array("$Paul","$Mika","$Kaye");
 
foreach($names as $display_name){
    echo $display_name."<br>";
}

?>
