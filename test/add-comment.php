<?php
    require 'connection.php';
    
    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql="INSERT INTO comments (commentText, name, email) VALUES ('$comment','$name', '$email')";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
?>