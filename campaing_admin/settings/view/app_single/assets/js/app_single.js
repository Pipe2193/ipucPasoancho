/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {


    setInterval(function (e) {
        $('.process').each(function (index, el) {

            var id = $(el).data("id");
            $.ajax({
                async: false,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url: urlajax,
                data: ('id_customer_process=' + id),
                success: function (data) {
                    $(el).html(data);
                }
            });
        });
    }, 3000);

    var switchlive = $(".switchlive");
    switchlive.click(function (index, el) {
        var id = switchlive.data("id");
        var idCustomer = switchlive.data("idcustomer");
        $.ajax({
            async: false,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('livereport_swich=' + id + '&idCustomer=' + idCustomer),
            success: function (data) {
                if(data == 'on'){
                    $("#btnliveon").hide();
                    $("#btnliveoff").show();
                }else {
                     $("#btnliveon").show();
                    $("#btnliveoff").hide();
                }
                window.location.reload();
            }
        });
    });
});