/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {


    $('#app_dealers').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "iDisplayLength": 50
    });


    $('#DealerForm').formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        addOns: {
            mandatoryIcon: {
                icon: 'glyphicon glyphicon-asterisk'
            }
        },
        fields: {
            dealer_code: {
                validators: {
                    notEmpty: {
                        message: 'The  Dealer Code is required'
                    },
                    numeric: {
                        message: 'The Dealer Code is not a number'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The dealer code must be  4 characters long'
                    }
                }
            },
            dealer_name: {
                validators: {
                    notEmpty: {
                        message: 'The dealer name is required'
                    },
                    stringLength: {
                        max: 220,
                        message: 'The dealer name must be less than 220 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]/,
                        message: 'The dealer name can only consist of alphabetical,and space'
                    }
                }
            },
            dealer_accron: {
                validators: {
                    notEmpty: {
                        message: 'The dealer Accron is required'
                    }
                }
            },
            dealer_email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    },
                    stringLength: {
                        max: 220,
                        message: 'The email address must be less than 220 characters long'
                    }
                }
            }
        }
    });

    var btncreate_link = $(".btncreate_link");

    btncreate_link.click(function (e) {
        var id = $(this).data("dealer");
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('id_dealer_link=' + id),
            success: function (data) {
                $("#dealer_link_table").focus();
                $("#dealer_link_table").html(data);

            }

        });
    });



});
$(document).ready(function ()
{

    var td, campo, valor, id;
    $(document).on("click", "td.editable span", function (e)
    {
        e.preventDefault();
        $("td:not(.id)").removeClass("editable");
        td = $(this).closest("td");
        campo = $(this).closest("td").data("field");
        valor = $(this).text();
        id = $(this).closest("tr").find(".id").text();
        td.text("").html("<input type='text' name='" + campo + "' value='" + valor + "'><a class='btn btn-success guardar' href='#'><i class='fa fa-floppy-o' aria-hidden='true'></i></a> <a class='btn btn-danger cancelar' href='#'><i class='fa fa-times-circle' aria-hidden='true'></i></a>");
    });

    $(document).on("click", ".cancelar", function (e)
    {
        e.preventDefault();
        td.html("<span>" + valor + "</span>");
        $("td:not(.id)").addClass("editable");
    });

    $(document).on("click", ".guardar", function (e)
    {
        $(".mensaje").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>");
        e.preventDefault();
        nuevovalor = $(this).closest("td").find("input").val();
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ("dealer_email=" + nuevovalor + "&id_dealer=" + id)
        }).done(function (msg) {
            $(".mensaje").html(msg);
            td.html("<span>" + nuevovalor + "</span>");
            $("td:not(.id)").addClass("editable");
            setTimeout(function () {
                $('.ok,.ko').fadeOut('fast');
            }, 3000);
        });
    });

    function copySelectionText() {
        var copysuccess; // var to check whether execCommand successfully executed
        try {
            copysuccess = document.execCommand("copy"); // run command to copy selected text to clipboard
        } catch (e) {
            copysuccess = false;
        }
        return copysuccess;
    }

    function copyfieldvalue(e, id) {
        var field = document.getElementById(id);
        field.focus();
        field.setSelectionRange(0, field.value.length);
        var copysuccess = copySelectionText();
        if (copysuccess) {
            showtooltip(e);
        }
    }
});