
$(function(){
    // Clique sur le bouton OK
    $("#buttonSubmit").click(function(event){
        event.preventDefault();
        let data = {
            message : $("#message").val()
        }
        $.ajax({
            type: "post",
            url: "../server/translation.php",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#messageTranslated").append(response.value);
            },
            error: function(error){
                console.log(error);
            }
        });
    })
});