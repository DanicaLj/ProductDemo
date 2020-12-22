$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault();
        var name = $("[name='name']").val();
        var email = $("[name='email']").val();
        var comment = $("[name='comment']").val();

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
});