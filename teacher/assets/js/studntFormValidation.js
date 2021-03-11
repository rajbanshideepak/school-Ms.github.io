$("document").ready(function () {
    // Fillter for course and faculty field
    // Data Fetch
    $.ajax({
        url: "../ajaxfile/fetchFacultyCourse.php",
        type: "post",
        data: { data_fetch: 1 },
        success: function (response) {
            var result = $.parseJSON(response);
            var i = z = x = y = 0;
            // console.log(result)
            $.each(result.faculty, function () {
                $("#faculty").append($('<option>', {
                    value: result.faculty[i].fname,
                    text: result.faculty[i].fname,
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
            $.each(result.faculty, function () {
                $("#myModalEdit #faculty").append($('<option>', {
                    value: result.faculty[x].fname,
                    text: result.faculty[x].fname,
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

    $("#faculty").on("change", function () {
        var select_val = $(this).val();
        $.ajax({
            url: "../ajaxfile/fetchFacultyCourse.php",
            type: "post",
            data: { select_val: select_val },
            success: function (response) {
                $("#course option:not(:first)").remove();
                var result = $.parseJSON(response);
                var i = 0;
                // console.log(course)
                $.each(result.course, function () {
                    $("#course").append($('<option>', {
                        value: result.course[i].cname,
                        text: result.course[i].cname
                    }));
                    i++;
                });
            },
        });
    });
    $("#myModalEdit #faculty").on("change", function () {
        var select_val = $(this).val();
        // console.log(select_val)
        $.ajax({
            url: "../ajaxfile/fetchFacultyCourse.php",
            type: "post",
            data: { select_val: select_val },
            success: function (response) {
                $("#myModalEdit #course option:not(:first)").remove();
                var result = $.parseJSON(response);
                var i = 0;
                // console.log(result)
                $.each(result.course, function () {
                    $("#myModalEdit #course").append($('<option>', {
                        value: result.course[i].cname,
                        text: result.course[i].cname
                    }));
                    i++;
                });
            },
        });
    });
})