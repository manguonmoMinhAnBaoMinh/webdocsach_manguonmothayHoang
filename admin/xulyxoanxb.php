<?php
    require "../dbcon.php";
    $id=$_GET['id'];

    $qr= "delete from nxb where idnxb = '$id'"; 

    $result=mysqli_query($connect,$qr) or die("Error query string!");
    if($result){
        header("Location: ../admin/dmnxb.php");
    }
?>

