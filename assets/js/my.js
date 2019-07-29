function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

//ajax
$(document).ready(function () {
    $('#tb_datanilai').DataTable({
        "columnDefs": [
            {"width": "5%", "targets": 0},
            {"width": "13%", "targets": 1},
            {"width": "15%", "targets": 3},
            {"width": "7%", "targets": 4},
            {"width": "7%", "targets": 5},
            {"width": "7%", "targets": 6},
        ]
    });

    var prefix = "";

    $().ajaxStart(function () {
        $('#loadinger').show();
    }).ajaxStop(function () {
        $('#loadinger').hide();
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
        var formdata = new FormData(this);

        console.log(formdata);

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formdata,
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
