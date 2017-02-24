<?php
if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}
include_once 'settings/view/app_forms/modals.php';
?> 

<section class="admin_content">

    <h3 class="pmititles">
        <i class="fa fa-list" aria-hidden="true"></i>  
        Application Forms
    </h3>

    <?php $countCustomers = countAllCustomers(); ?>

    <div id="desktop_tablet" class="hidden-xs">
        <input type="hidden" name="countcustomers" id="countcustomers" value="<?php echo $countCustomers; ?>">

        <table id="app_forms" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="date">Registration Date</th>
                    <th class="name">Full Name</th>
                    <th class="mail">Email Address</th>
                    <th class="phon hidden-sm">Phone Number</th>
                    <th class="acct">Acc Type</th>
                    <th class="deal">Dealer</th>
                    <th class="reps">Report</th>
                    <th class="prof">Profile</th>
                    <th class="supp">Support</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $customers = getAllCustomers();

                foreach ($customers as $customer) {
                    ?>
                    <tr>
                        <td class="date">
                            <?php echo $customer->date; ?> 
                        </td>

                        <td class="name"> 
                            <?php echo $customer->name . ' ' . $customer->middle . ' ' . $customer->last_name ?>
                        </td>

                        <td class="mail">
                            <a href="mailto:<?php echo $customer->email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a> <?php echo $customer->email; ?>
                        </td>

                        <td class="phon hidden-sm">
                            <a href="tel:<?php echo $customer->phone; ?>">
                                <?php
                                if ($customer->id_type_phone_number == 1) {
                                    echo '<i class="fa fa-mobile" aria-hidden="true"></i> ';
                                } elseif ($customer->id_type_phone_number == 2) {
                                    echo '<i class="fa fa-phone" aria-hidden="true"></i> ';
                                } elseif ($customer->id_type_phone_number == 3) {
                                    echo '<i class="fa fa-briefcase" aria-hidden="true"></i> ';
                                } elseif ($customer->id_type_phone_number == 4) {
                                    echo '<i class="fa fa-plus-circle" aria-hidden="true"></i> ';
                                }
                                ?>
                            </a>

                            <?php
                            echo $customer->phone;
                            if ($customer->ext != '') {
                                echo " <b>E:</b> " . $customer->ext;
                            }
                            ?>
                        </td>
                        <td class="acct">
                            <?php echo getAccountById($customer->account) ?>
                        </td>
                        <td class="deal">
                            <b><?php echo getDealerAccron($customer->dealer) ?></b>
                        </td>
                        <td class="reps">
                            <input type="hidden" name="pdflink" id="pdflink" value="<?php echo $customer->pdf ?>">
                            <?php if ($customer->status == '0') { ?>
                                <?php
                                if ($customer->followup === '1') {
                                    ?>
                                    <i class="fa fa-cog fa-spin fa-fw"></i>
                                    <?php
                                } else {
                                    ?>
                                    <i class="fa fa-pause" aria-hidden="true"></i>
                                    <?php
                                }
                                if (empty($customer->account)) {
                                    echo 'Initializing';
                                } else {
                                    if ($customer->followup === '1') {
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
                                        <span class="process"data-id="<?php echo $customer->id ?>">
                                            <div class="processdiv"></div>
                                        </span>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <?php if (!empty($customer->pdf)) { ?>
                                <a href="<?php echo getpdfpath($customer->pdf) ?>" target="_blank">
                                    <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                        </td>

                        <td class="prof">
                            <?php if (getProfileStatus($customer->id) == 0) { ?>
                                <a href="?p=app_single&id_customer_profile=<?php echo $customer->id ?>"  class="btn btn-primary profile" target="_blank" >
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </a>
                                <span class="prof_email_number"><?php echo getNotificationProfile($customer->id) ?></span>
                            <?php } else { ?>
                                <?php
                                $profileInfo = getProfileInfo($customer->id);
                                ?>
                                <a href="<?php echo getpdfpath($profileInfo->pdf_path_profile_onaf) ?>" class="btn btn-success profile" target="_blank">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                        </td>

                        <td class="supp">
                            <a  href="?p=app_single&id_customer=<?php echo $customer->id ?>"  class="btn btn-warning more" target="_blank" >
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
                    <th class="date">Registration Date</th>
                    <th class="name">Full Name</th>
                    <th class="mail">Email Address</th>
                    <th class="phon hidden-sm">Phone Number</th>
                    <th class="acct">Acc Type</th>
                    <th class="deal">Dealer</th>
                    <th class="reps">Report</th>
                    <th class="prof">Profile</th>
                    <th class="supp">Support</th>
                </tr>
            </tfoot>
        </table>

    </div>
    <div id="tablet_mobile" class="hidden-lg hidden-md hidden-sm">

        <table class="table table-bordered table-striped">

            <?php
            $customers = getAllCustomers();

            foreach ($customers as $customer) {
                ?>
                <tr>
                    <td class="mobile_registration">
                        <?php echo getAccountById($customer->account) ?>
                        <br>
                        <b><?php echo getDealerAccron($customer->dealer) ?></b>
                        <br>
                        <?php echo $customer->date; ?>
                        <br><br>

                        <b><?php echo $customer->name . ' ' . $customer->middle . ' ' . $customer->last_name ?> </b>
                        <br>
                        <i><?php echo $customer->email; ?> </i> 
                        <br>
                        <?php
                        echo $customer->phone;
                        if ($customer->ext != '') {
                            echo " <b>E:</b> " . $customer->ext;
                        }
                        ?>
                        <br><br>

                        <input type="hidden" name="pdflink" id="pdflink" value="<?php echo $customer->pdf ?>">
                        <?php if ($customer->status == '0') { ?>
                            <?php
                            if ($customer->followup === 1) {
                                ?>
                                <i class="fa fa-cog fa-spin fa-fw"></i>
                                <?php
                            } else {
                                ?>
                                <i class="fa fa-pause" aria-hidden="true"></i>
                                <?php
                            }
                            if (empty($customer->account)) {
                                echo 'Initializing';
                            } else {
                                if ($customer->followup === 1) {
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
                                    <span class="process"data-id="<?php echo $customer->id ?>">
                                        <div class="processdiv"></div>
                                    </span>
                                    <?php
                                }
                            }
                        }
                        ?>
                        <?php if (!empty($customer->pdf)) { ?>
                            <a href="<?php echo getpdfpath($customer->pdf) ?>" target="_blank">
                                <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                            </a>
                        <?php } ?>


                        <?php if (getProfileStatus($customer->id) == 0) { ?>
                            <a href="?p=app_single&id_customer_profile=<?php echo $customer->id ?>"  class="btn btn-primary profile" target="_blank" >
                                <i class="fa fa-envelope-o" aria-hidden="true"><?php echo getNotificationProfile($customer->id) ?></i>
                            </a>
                        <?php } else { ?>
                            <a href="?p=app_single&id_customer_profile=<?php echo $customer->id ?>"  class="btn btn-success profile" target="_blank" >
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            </a>
                        <?php } ?>


                        <a  href="?p=app_single&id_customer=<?php echo $customer->id ?>"  class="btn btn-warning more" target="_blank" >
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
