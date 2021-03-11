$("document").ready(function () {
    // Fillter for course and faculty field
    // Data Fetch
    $.ajax({
        url: "../ajaxfile/fetchSubject.php",
        type: "post",
        data: { data_fetch: 1 },
        success: function (response) {
            var result = $.parseJSON(response);
            var i = z = x = y = 0;
            $.each(result.subject, function () {
                $("#skill").append($('<option>', {
                    value: result.subject[i].subname,
                    text: result.subject[i].subname,
                }));
                i++;
            });
            $.each(result.nation, function () {
                $("#nation").append($('<option>', {
                    value: result.nation[z].conname,
                    text: result.nation[z].conname,
                }));
                z++;
            });
            $.each(result.subject, function () {
                $("#myModalEdit #skill").append($('<option>', {
                    value: result.subject[x].subname,
                    text: result.subject[x].subname,
                }));
                x++;
            });
            $.each(result.nation, function () {
                $("#myModalEdit #nation").append($('<option>', {
                    value: result.nation[y].conname,
                    text: result.nation[y].conname,
                }));
                y++;
            });
        },
    });
})