$(document).ready(function () {
    $("body").on("click",".copyBtn",function () {
        var copyText = document.querySelector('.copyText');
        copyText.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);
        } catch (err) {
            console.log('Error: can not copy.');
        }

    });
    $("body").on("click","[value='Return to home']",function () {
        window.location.href = window.location.href.split('?')[0];
    });

    $("#menuBtn").click(function () {
        $("#menu").width("250px");
    });

    $("#closeBtn").click(function () {
        $("#menu").width("0");
    });

    $("[type='submit']").click(function () {
        postUrl();
    });

    $("#urlText").keypress(function (e) {
        if (e.which == 13){
            $("[type='submit']").click();
            return false;
        }
    });

    function postUrl() {
        $.ajax({
            url: "index.php",
            type: "POST",
            datatype: "html",
            data: {url: $("#urlText").val()},
            success: function (result) {
                $("#homeForm").html($(result).find("#homeForm"));
            }
        });
    }
});