function updateRangetoText(value, id) {
    document.getElementById(id).value = value;
}

//ajax
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

    $('.custom-file input').change(function(e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });
});
