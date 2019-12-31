<?php
    require "../dbcon.php";
    $id=$_GET['id'];

    $qr= "delete from theloai where idtl = '$id'"; 

    $result=mysqli_query($connect,$qr) or die("Error query string!");
    if($result){
        header("Location: ../admin/dmtheloai.php");
    }
?>

