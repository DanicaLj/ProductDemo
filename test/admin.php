<?php
    require 'connection.php';
    session_start();
    $sqlComment="SELECT * FROM comments";
    $stmtComment=$pdo->query($sqlComment);
    $comments=$stmtComment->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <?php if($_SESSION):?>
            <?php if($_SESSION['isAdmin']):?>
                <button class="btn btn-danger" id="logout">Logout</button>
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
            <?php endif;?>
        <?php else:?>
            <form class="login" method="POST">
                <label>Username:</label></br>
                <input type="text" name="username" placeholder="Username" class="form-control"></br>
                <label>Password:</label></br>
                <input type="password" name="password" placeholder="Password" class="form-control"></br>
                <input class="btn btn-success" type="submit" value="Submit!" id="login">
            </form>
            <p>You are not logged in as admin!</p>
        <?php endif;?>
    </body>
</html>
