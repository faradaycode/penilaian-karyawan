function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

//ajax
$(document).ready(function () {

    $(document).ajaxStart(function () {
        $('#loadinger').show();
    });
    $(document).ajaxStop(function () {
        $('#loadinger').hide();
    });

    $("#form_penilaian").submit(function () {
        var mentah = $(this).serializeArray();
        var mateng = new Array();
        var id_k = $("#selkaryawan").val();

        $.map(mentah, function (n, i) {
            mateng.push(n['value']);
        });

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: { "id_k": id_k, "data": mateng },
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
                $('#mdlinputk').modal("hide");

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

    $("#holder-calendar").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
    });

});
