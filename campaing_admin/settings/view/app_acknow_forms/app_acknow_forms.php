<?php
if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}
include_once 'settings/view/app_acknow_forms/modals.php';
?> 

<section class="admin_content">

    <h3 class="pmititles">
        <i class="fa fa-file-text-o" aria-hidden="true"></i>
        Customer Acknowlegements Forms
    </h3>

    <?php $countacknowlegements = countAllAcknowlegements(); ?>

    <div id="desktop_tablet" class="hidden-xs">
        <input type="hidden" name="countacknowlegements" id="countacknowlegements" value="<?php echo $countacknowlegements; ?>">

        <table id="app_forms" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="date">Registration Date Time</th>
                    <th class="name">Full Name</th>
                    <th class="mail">Email Address</th>
                    <th class="phon hidden-sm">Home Phone Number</th>
<!--                    <th class="phon hidden-sm">Mobile Phone Number</th>
                    <th class="acct">Country</th>
                    <th class="deal">State / Province</th>
                    <th class="deal">City</th>
                    <th class="prof">Zip / Postal Code</th>-->
<!--                    <th class="reps">Report</th>-->
                    <th class="supp">Support</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $acknowlegements = getAllAcknowlegements();

                foreach ($acknowlegements as $customer) {
                    ?>
                    <tr>
                        <td class="date">
                            <?php echo $customer->signtime; ?> 
                        </td>

                        <td class="name"> 
                            <?php echo $customer->name . ' ' . $customer->middle_name . ' ' . $customer->last_name ?>
                        </td>

                        <td class="mail">
                            <a href="mailto:<?php echo $customer->email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a> <?php echo $customer->email; ?>
                        </td>

                        <td class="phon hidden-sm">
                            <a href="tel:<?php echo $customer->home_phone; ?>">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <?php echo $customer->home_phone; ?>
                            </a>
                        </td>
<!--                        <td class="phon hidden-sm">
                            <a href="tel:<?php echo $customer->mobile_phone; ?>">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                <?php echo $customer->mobile_phone; ?>
                            </a>
                        </td>
                        <td class="acct">
                            <?php echo getCountryById($customer->country) ?>
                        </td>
                        <td class="deal">
                            <b><?php echo getStateById($customer->state) ?></b>
                        </td>
                        <td class="deal">
                            <b><?php echo $customer->city ?></b>
                        </td>
                        <td class="prof">
                            <b><?php echo $customer->zip_code ?></b>
                        </td>-->
<!--                        <td class="reps">
                            <input type="hidden" name="pdflink" id="pdflink" value="<?php // echo $customer->pdf ?>">
                            <?php // if ($customer->status == '0') { ?>
                                <?php
//                                if ($customer->followup === '1') {
                                    ?>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                    <?php
//                                } else {
                                    ?>
                                    <i class="fa fa-pause" aria-hidden="true"></i>
                                    <?php
//                                }
//                                if (empty($customer->email)) {
//                                    echo 'Initializing';
//                                } else {
//                                    if ($customer->followup === '1') {
                                        ?>
                                        <script>
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
                                            }, 5000);
                                        </script>
                                        <span class="process"data-id="<?php // echo $customer->id ?>">
                                            <div class="processdiv"></div>
                                        </span>
                                        <?php
//                                    }
//                                }
//                            }
                            ?>
                            <?php // if (!empty($customer->email)) { ?>
                                <a href="<?php // echo getpdfpath($customer->pdf) ?>" target="_blank">
                                    <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                                </a>
                            <?php // } ?>
                        </td>-->

                        <td class="supp">
                            <a  href="?p=app_single&id_acknow=<?php echo $customer->id ?>"  class="btn btn-warning more" target="_blank" >
                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                            </a>
                            <?php if ($customer->status == '0') { ?>
                                <?php if ($customer->followup == 0) { ?>
                                    <button type="button" id="btnliveoff" class="btn btnpmi switchlive"  data-id="off" data-idcustomer="<?php echo $customer->id; ?>"> <i class="fa fa-toggle-off" aria-hidden="true"></i> </button>
                                <?php } elseif ($customer->followup == 1) { ?>
                                    <button type="button" id="btnliveon" class="btn btnpmi switchlive" data-id="on" data-idcustomer="<?php echo $customer->id; ?>"> <i class="fa fa-toggle-on" aria-hidden="true"></i>  </button>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr> 
                <?php } ?>
            </tbody> 
            <tfoot>
                <tr>
                    <th class="date">Registration Date Time</th>
                    <th class="name">Full Name</th>
                    <th class="mail">Email Address</th>
                    <th class="phon hidden-sm">Home Phone Number</th>
<!--                    <th class="phon hidden-sm">Mobile Phone Number</th>
                    <th class="acct">Country</th>
                    <th class="deal">State / Province</th>
                    <th class="deal">City</th>
                    <th class="prof">Zip / Postal Code</th>-->
<!--                    <th class="reps">Report</th>-->
                    <th class="supp">Support</th>
                </tr>
            </tfoot>
        </table>

    </div>
    <div id="tablet_mobile" class="hidden-lg hidden-md hidden-sm">

        <table class="table table-bordered table-striped">

            <?php
            $acknowlegements = getAllAcknowlegements();

            foreach ($acknowlegements as $customer) {
                ?>
                <tr>
                    <td class="mobile_registration">
                        <?php echo $customer->signtime; ?>
                        <br><br>

                        <b><?php echo $customer->name . ' ' . $customer->middle_name . ' ' . $customer->last_name ?> </b>
                        <br>
                        <i><?php echo $customer->email; ?> </i> 
                        <br>
                        <?php
                        echo $customer->home_phone;
                        ?>
                        <br><br>

<!--                        <input type="hidden" name="pdflink" id="pdflink" value="<?php // echo $customer->pdf ?>">-->
             <!--           <?php // if ($customer->status == '0') { ?>
                            <?php
//                            if ($customer->followup === 1) {
                                ?>
                                <i class="fa fa-cog fa-spin fa-fw"></i>
                                <?php
//                            } else {
                                ?>
                                <i class="fa fa-pause" aria-hidden="true"></i>
                                <?php
//                            }
//                            if (empty($customer->account)) {
//                                echo 'Initializing';
//                            } else {
//                                if ($customer->followup === 1) {
                                    ?>
                                    <script>
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
                                        }, 5000);
                                    </script>
                                    <span class="process"data-id="<?php // echo $customer->id ?>">
                                        <div class="processdiv"></div>
                                    </span>
                                    <?php
//                                }
//                            }
//                        }
                        ?> -->
                       <a  href="?p=app_single&id_acknow=<?php echo $customer->id ?>"  class="btn btn-warning more" target="_blank" >
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </a>
                        <?php if ($customer->followup == 0) { ?>
                            <button type="button" id="btnliveoff" class="btn btnpmi switchlive"  data-id="off" data-idcustomer="<?php echo $customer->id; ?>"> <i class="fa fa-toggle-off" aria-hidden="true"></i></button>
                        <?php } elseif ($customer->followup == 1) { ?>
                            <button type="button" id="btnliveon" class="btn btnpmi switchlive" data-id="on" data-idcustomer="<?php echo $customer->id; ?>"> <i class="fa fa-toggle-on" aria-hidden="true"></i> </button>
                        <?php } ?>
                    </td>
                </tr> 
            <?php } ?>

        </table>

    </div>

</section>

<div id="modaldetails"></div>
<div id="modalnotification"></div>
