function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

//ajax
$(document).ready(function () {

    var prefix = "";

    $().ajaxStart(function () {
        $('#loadinger').show();
    }).ajaxStop(function () {
        $('#loadinger').hide();
    });

    $("#formlogin").submit(function () {
        prefix = "login";

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize() + "&prefix=" + prefix,
            success: function (data) {
                if (data === "0") {
                    alert("Userid salah, silahkan coba dengan userid yang lain");
                } else {
                    window.location = "http://localhost/sipeka/views/admin/index.php";
                }
            }
        });
        return false;
    });

    $("#form_penilaian").submit(function () {
        prefix = "nilai";

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize() + "&prefix=" + prefix,
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
        prefix = "import";
        
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
