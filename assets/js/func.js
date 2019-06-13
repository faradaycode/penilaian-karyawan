function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

$(document).ready(function () {
    $("#form_penilaian").submit(function () {
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
            }
        });
        return false;
    });
});
