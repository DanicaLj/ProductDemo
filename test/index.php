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
                    <p>Title: <?= $product['title']?></p>
                    <p>Description: <?= $product['description']?></p>
                    <p>ShortDescription: <?= $product['shortDescription']?></p>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($product['image']); ?>" width="100" />
                </div>
            <?php endforeach;?>
        </div>

        <div class="comments">
            <?php foreach($comments as $comment):?> 
                <p class="comment-name">By: <?= $comment['name']?></p>
                <span><?= $comment['email']?></span>
                <p><?= $comment['commentText']?></p>
                <hr>
            <?php endforeach?>
        </div>

        <div class="form-wrapper">
            <h3>Add comment:</h3>
            <p class="success">Comment added successfuly!</p>
            <form id="comment-form">
                <label>Name:</label></br>
                <input type="text" name="name" placeholder="Name" class="form-control"></br>
                <label>Email:</label></br>
                <input type="email" name="email" placeholder="Email" class="form-control"></br>
                <label>Comment:</label></br>
                <textarea rows="3" name="comment" placeholder="Comment" class="form-control"></textarea></br>
                <input class="btn btn-success" type="submit" value="Submit!" id="submit">
            </form> 
        </div>
    </body>
</html>