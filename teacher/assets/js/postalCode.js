$(document).ready(function () {
    $("#zipbtn").click(function () {
        var code = $("#zip").val();
        $("#zipbtn").val("please wait a second")
        if (code.length == 7 && code != "") {
            $.ajax({
                url: "../ajaxfile/postalcode.php?",
                type: "POST",
                data: { code: code },
                success: function (data) {
                    $("#address1").val(data);
                    $("#zipbtn").val("search address")
                }
            });
        }
        else {
            $("#zipbtn").val("search address")
            $(".msg").html("Zip code is empty or lenght must be 7 digits");
            $("#zip").on("input", () => {
                $(".msg").html("");
            });
        }

    });
});