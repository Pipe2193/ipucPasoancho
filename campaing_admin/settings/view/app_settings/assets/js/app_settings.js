$(document).ready(function () {

    $('#app_pmi').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true
    });

    var btnupdate0 = $("#update0");
    var app_key0 = $("#app_key0");
    var app_tittle0 = $("#app_tittle0");
    var app_subtittle0 = $("#app_subtittle0");

    btnupdate0.click(function (e) {
        var app_key0val = app_key0.val();
        var app_tittle0val = app_tittle0.val();
        var app_subtittle0val = app_subtittle0.val();
        $.ajax({
            async: false,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlsettings,
            data: ('app_tittle=' + app_tittle0val + "&app_subtittle=" + app_subtittle0val + "&app_key=" + app_key0val),
            success: function (data) {
                window.location.reload();
                alert("app Information Updated");
            }
        });
    });

    var btnupdate1 = $("#update1");
    var app_key1 = $("#app_key1");
    var app_tittle1 = $("#app_tittle1");
    var app_subtittle1 = $("#app_subtittle1");

    btnupdate1.click(function (e) {
        var app_key1val = app_key1.val();
        var app_tittle1val = app_tittle1.val();
        var app_subtittle1val = app_subtittle1.val();
        $.ajax({
            async: false,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlsettings,
            data: ('app_tittle=' + app_tittle1val + "&app_subtittle=" + app_subtittle1val + "&app_key=" + app_key1val),
            success: function (data) {
                window.location.reload();
                alert("app Information Updated");
            }
        });
    });

    var btnupdate2 = $("#update2");
    var app_key2 = $("#app_key2");
    var app_tittle2 = $("#app_tittle2");
    var app_subtittle2 = $("#app_subtittle2");

    btnupdate2.click(function (e) {
        var app_key0val = app_key2.val();
        var app_tittle2val = app_tittle2.val();
        var app_subtittle2val = app_subtittle2.val();
        $.ajax({
            async: false,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlsettings,
            data: ('app_tittle=' + app_tittle2val + "&app_subtittle=" + app_subtittle2val + "&app_key=" + app_key2val),
            success: function (data) {
                window.location.reload();
                alert("app Information Updated");
            }
        });
    });

    var btnupdate3 = $("#update3");
    var app_key3 = $("#app_key3");
    var app_tittle3 = $("#app_tittle3");
    var app_subtittle3 = $("#app_subtittle3");

    btnupdate3.click(function (e) {
        var app_key3val = app_key3.val();
        var app_tittle3val = app_tittle3.val();
        var app_subtittle3val = app_subtittle3.val();
        $.ajax({
            async: false,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlsettings,
            data: ('app_tittle=' + app_tittle3val + "&app_subtittle=" + app_subtittle3val + "&app_key=" + app_key3val),
            success: function (data) {
                window.location.reload();
                alert("app Information Updated");
            }
        });
    });





});
//$(document).ready(function ()
//{
//
//    var td, campo, valor, id;
//    $(document).on("click", "td.editable span", function (e)
//    {
//        e.preventDefault();
//        $("td:not(.id)").removeClass("editable");
//        td = $(this).closest("td");
//        campo = $(this).closest("td").data("field");
//        valor = $(this).text();
//        id = $(this).closest("tr").find(".id").text();
//        td.text("").html("<input type='text' name='" + campo + "' value='" + valor + "'><a class='btn btn-success guardar' href='#'><i class='fa fa-floppy-o' aria-hidden='true'></i></a> <a class='btn btn-danger cancelar' href='#'><i class='fa fa-times-circle' aria-hidden='true'></i></a>");
//    });
//
//    $(document).on("click", ".cancelar", function (e)
//    {
//        e.preventDefault();
//        td.html("<span>" + valor + "</span>");
//        $("td:not(.id)").addClass("editable");
//    });
//
//    $(document).on("click", ".guardar", function (e)
//    {
//        $(".mensaje").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>");
//        e.preventDefault();
//        var nuevovalor = $(this).closest("td").find("input").val();
//        $.ajax({
//            async: true,
//            type: "POST",
//            dataType: "html",
//            contentType: "application/x-www-form-urlencoded",
//            url: urlajax,
//            data: ("campo=" + campo + "&valor=" + nuevovalor + "&idpmi_info=" + id)
//        }).done(function (msg) {
//            $(".mensaje").html(msg);
//            td.html("<span>" + nuevovalor + "</span>");
//            $("td:not(.id)").addClass("editable");
//            setTimeout(function () {
//                $('.ok,.ko').fadeOut('fast');
//            }, 3000);
//        });
//    });
//});

