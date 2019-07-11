function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

//ajax
$(document).ready(function () {

    $().ajaxStart(function () {
        $('#loadinger').show();
    }).ajaxStop(function () {
        $('#loadinger').hide();
    });

    $("#form_penilaian").submit(function () {
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function () {
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            success: function (data) {
                console.log(data);
            }
        });
        return false;
    });

    $("#formimport").submit(function () {
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: new FormData(this),
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, exception) {
                console.log("xhr: " + xhr);
                console.log("ex: " + exception);
            }
        });
        return false;
    });

    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });
});
