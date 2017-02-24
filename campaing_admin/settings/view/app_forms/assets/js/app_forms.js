/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $('#app_forms').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "order": [[0, "desc"]]
    });



    setInterval(function (e) {
        var count = $("#countcustomers").val();
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajaxnotification,
            data: ('countCust=' + count),
            success: function (data) {
                $("#modalnotification").html(data);
            }
        });
    }, 60000);

    var switchlive = $(".switchlive");
    switchlive.click(function (index, el) {

        var id = $(this).data("id");
        var idCustomer = $(this).data("idcustomer");
        $.ajax({
            async: false,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('livereport_swich=' + id + '&idCustomer=' + idCustomer),
            success: function (data) {
                if (data == 'on') {
                    $("#btnliveon").hide();
                    $("#btnliveoff").show();
                } else if (data == 'off') {
                    $("#btnliveon").show();
                    $("#btnliveoff").hide();
                }
                window.location.reload();
            }
        });
    });

});
