<?php

include("conn.php");

$user_id = $_POST["user_id"];

$new_isbn = $_POST["new_isbn"];
$new_title = $_POST["new_title"];
$new_authors = $_POST["new_authors"];
$new_book_type = $_POST["new_book_type"];
$new_book_qty = $_POST["new_book_qty"];
$new_Date_Published = $_POST["new_Date_Published"];

mysqli_query ($conn, "UPDATE mytbl SET 
isbn='$new_isbn', 
title='$new_title', 
authors='$new_authors', 
book_type='$new_book_type', 
book_qty='$new_book_qty',
Date_Published='$new_Date_Published' 
WHERE id='$user_id' ");

echo "<script language='javascript'>alert('Record has been upated.')</script>";
echo "<script>window.location.href='index.php';</script>";

?>