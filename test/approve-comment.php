<?php
    require 'connection.php';

    $commentId = $_POST['commentId'];
    $approveDisapprove = $_POST['approveDisapprove'];
    
    $sql="UPDATE comments SET isApproved='$approveDisapprove' WHERE idComment= '$commentId'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
?>