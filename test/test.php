<?php
    require 'connection.php';

    $sql="SELECT * FROM product";
    $stmt=$pdo->query($sql);
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $sqlComment="SELECT * FROM comments WHERE isApproved = 1";
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
        <h2>Product Page</h2>
        <div class="row">
            <?php foreach($products as $product):?>
            <div class="product-wrapper col-lg-4 col-md-4 col-sm-4">
            <p>Title: <?= $product['Title']?></p>
            <p>Description: <?= $product['Description']?></p>
            <p>ShortDescription: <?= $product['ShortDescription']?></p>
            </div>
            <?php endforeach;?>
        </div>
        <div class="form-wrapper">
            <form class="comment-form">
                Name: <input type="text" name="name"></br>
                Email: <input type="text" name="email"></br>
                Comment: <input type="textarea" name="comment"></br>
                <input type="submit" value="Submit!" id="submit">
            </form>
            <p class="success">Comment added successfuly!</p>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Comment</td>
                    <td>Name</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($comments as $comment):?>
                    <tr>
                        <td><?= $comment['commentText']?></td>
                        <td><?= $comment['name']?></td>
                        <td><?= $comment['email']?></td>
                    </tr>
                <?php endforeach?>
            <tbody>
        </table>
    </body>
</html>