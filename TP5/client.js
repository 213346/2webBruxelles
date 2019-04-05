$(function () {
    //$("#btnreset").fadeOut();
    $("#btnsubmit").click(function (e) {
        e.preventDefault();
        let formdata = {
            "message":$("#message").val()
        }

            //new FormData();
        //formdata.append("message",$("#message").val());
        $.ajax({
            type : "post",
            //dataType : "json",
            url : "server.php",
            data : formdata,
            success : function (response) {
                let content = "<div class='alert alert-info'>"+response+"</div>"
                $("#content").append(content);
                $("#btnreset").trigger("click");

                //$("#message").val("");

            },
            error : function (error) {
                console.log(error);
            },
            // complete : function (reponse) {
            //     console.log(reponse);
            // }
        });
        $("#message").keyup(function (e) {
            if(e.code === 13){
                $("#btnsubmit").trigger("click");
            }
        })
    });
});