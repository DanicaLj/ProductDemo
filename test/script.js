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
                url:"add-comment.php",
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
    $(".approve").click(function(){
        var commentId = $(this).attr("data-comment-id");
        var approveDisapprove = 1;
        $.ajax({
            url:"approve-comment.php",
            type:"POST",
            cache: false,
            data: {commentId:commentId, approveDisapprove:approveDisapprove},
            success: function(){
                window.location.reload();
            }
        });
        
    });

    $(".disapprove").click(function(){
        var commentId = $(this).attr("data-comment-id");
        var approveDisapprove = 0;
        $.ajax({
            url:"approve-comment.php",
            type:"POST",
            data: {commentId:commentId,approveDisapprove:approveDisapprove},
            success:function(){
                window.location.reload();
            }
        });
    });

    $("#login").click(function(e){
        e.preventDefault();
        var username = $("[name='username']").val();
        var password = $("[name='password']").val();
        
        $.ajax({
            url:"login.php",
            type:"POST",
            data: {username:username, password:password},
            success: function(){
                window.location.reload();
            }
        }); 
    });

    $("#logout").click(function(){
        var logout = 1;
        $.ajax({
            url:"login.php",
            type:"POST",
            data: {logout:logout},
            success: function(){
                window.location.reload();
            }
        });
    });
});