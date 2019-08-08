function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n["name"]] = n["value"];
    });

    return indexed_array;
}

//ajax
$(document).ready(function () {
    $(document).ajaxStart(function () {
        $("#loadinger").show();
    });
    $(document).ajaxStop(function () {
        $("#loadinger").hide();
    });

    $("#form_penilaian").submit(function () {
        var mentah = $(this).serializeArray();
        var mateng = new Array();
        var id_k = $("#selkaryawan").val();

        $.map(mentah, function (n, i) {
            mateng.push(n["value"]);
        });

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: { id_k: id_k, data: mateng },
            dataType: "json",
            beforeSend: function () {
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            success: function (response) {
                $("#form_penilaian")[0].reset();
                alert(response.pesan);
            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });
        return false;
    });

    //input modal karyawan
    $("#forminputk").submit(function () {
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                $("#forminputk")[0].reset();
                $("#mdlinputk").modal("hide");

                alert(response.pesan);

                console.log(response);
            },
            error: function (xhr, status, error) {
                alert(error);
                console.log(xhr);
            }
        });
        return false;
    });

    $("#formimport").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                alert(data.pesan);
                $("#mdimport").modal("hide");
                $("#tb_datakyw")
                    .DataTable()
                    .ajax.reload();
            },
            error: function (xhr, exception) {
                console.log("xhr: " + xhr.responseText);
                console.log("ex: " + exception);
            }
        });
    });

    $(".custom-file input").change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this)
            .next(".custom-file-label")
            .html(files.join(", "));
    });

    $("#holder-calendar").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    // Delete
    $("#tb_datakyw tbody").on("click", ".delete", function () {
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];

        if (confirm("Hapus data?")) {
            //yes
            $.ajax({
                url: BASE_URL + "index.php/Karyawans/del",
                type: "POST",
                data: { idk: deleteid },
                dataType: "json",
                success: function (response) {
                    alert(response.pesan);
                    $("#tb_datakyw")
                        .DataTable()
                        .ajax.reload();
                },
                error: function (xhr) {
                    alert(xhr.responseText);
                }
            });
        } else {
            //no
        }
    });
});
