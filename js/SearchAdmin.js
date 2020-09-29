$(document).ready(function () {
    $("#productSearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#AdimnProducts form").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


$(document).ready(function () {
    $("#orderSearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#OrderedProducts form").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});