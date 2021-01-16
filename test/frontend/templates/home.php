
<html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- <script src="script.js"></script>
        <link rel="stylesheet" href="style.css"> -->
    </head>

    <body>
        <h2>Product Page</h2>
        <div class="row">
            <?php foreach ($this->products as $product) : ?>
                <div class="product-wrapper col-lg-4 col-md-4 col-sm-4">
                    <p>Title: <?= $product['title'] ?></p>
                    <p>Description: <?= $product['description'] ?></p>
                    <p>Short Description: <?= $product['shortDescription'] ?></p>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($product['image']); ?>" width="100" />
                </div>
            <?php endforeach; ?>
        </div>

        <div class="comments">
            <h3>Comments:</h3>
            <?php foreach ($this->approvedComments as $comment) : ?>
                <p class="comment-name">By: <?= $comment['name'] ?></p>
                <span><?= $comment['email'] ?></span>
                <p><?= $comment['commentText'] ?></p>
                <hr>
            <?php endforeach ?>
        </div>

        <div class="form-wrapper">
            <h3>Add comment:</h3>
            <p class="success">Comment added successfuly!</p>
            <form id="comment-form">
                <label>Name:</label></br>
                <input type="text" name="name" placeholder="Name" class="form-control"><span class="name-validation">This field is required!</span></br>
                <label>Email:</label></br>
                <input type="email" name="email" placeholder="Email" class="form-control"><span class="email-validation">This field is required!</span></br>
                <label>Comment:</label></br>
                <textarea rows="3" name="comment" placeholder="Comment" class="form-control"></textarea><span class="comment-validation">This field is required!</span></br>
                <input class="btn btn-success" type="submit" value="Submit!" id="submit">
            </form>
        </div>
    </body>

    <script>
    $(document).ready(function(){
        $("#submit").click(function(e){
            e.preventDefault();
            var name = $("[name='name']").val();
            var email = $("[name='email']").val();
            var comment = $("[name='comment']").val();
            if(name == ""){
                $(".name-validation").css("display", "block");
            }
            else{
                $(".name-validation").css("display", "none");
            }
            if(email == ""){
                $(".email-validation").css("display", "block");
            }
            else{
                $(".email-validation").css("display", "none");
            }
            if(comment == ""){
                $(".comment-validation").css("display", "block");
            }
            else{
                $(".comment-validation").css("display", "none");
            }

            if(name != "" && email != "" && comment != ""){
                $.ajax({
                    // url:'action/addComment/',
                    type:"POST",
                    data: {name:name, email:email, comment:comment},
                    success: function(){
                        $(".success").css("display", "block");
                        $("[name='name']").val("");
                        $("[name='email']").val("");
                        $("[name='comment']").val("");
                    }
                });
            }  
        });
    });   
    </script>
    <style>
        body{
            padding: 0 50px;
        }
        .product-wrapper{
            border: 1px solid blue;
            border-radius: 10px;
        }
        .success{
            display: none;
            color:green;
            background: lightgreen;
            padding: 10px;
        }
        .form-wrapper{
            width: 50%;
        }
        .comments .comment-name{
            font-size: 20px;
            margin: 0;
            color: lightblue;
        }
        .comments span{
            color: gray;
        }
        .name-validation,.email-validation,.comment-validation{
            display: none;
            color:red;
        }
    </style>

</html>