<?php
    require 'connection.php';

    $sqlComment="SELECT * FROM comments";
    $stmtComment=$pdo->query($sqlComment);
    $comments=$stmtComment->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Comment</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>isApproved</th>
                    <th>Approve/Disapprove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($comments as $comment):?>
                    <tr>
                        <td><?= $comment['commentText']?></td>
                        <td><?= $comment['name']?></td>
                        <td><?= $comment['email']?></td>
                        <td><?= $comment['isApproved']?></td>
                        <td>
                            <button class="approve btn btn-success" data-comment-id="<?=$comment['idComment']?>">Approve</button>
                            <button class="disapprove btn btn-dark" data-comment-id="<?=$comment['idComment']?>">Disapprove</button>
                        </td>
                    </tr>
                <?php endforeach?>
            <tbody>
        </table>
    </body>
</html>
