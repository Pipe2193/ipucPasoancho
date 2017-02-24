<?php
if (isset($_GET['id_customer'])) {

    $customer = getCustomerInfo($_GET['id_customer']);
    if (!empty($customer->id_account)) {
        $account = getAccountInfo($_GET['id_customer'], $customer->id_account);
    }
    if ($customer->id_account == 2) {
        $saoaccount = getSaoCustomerInfo($_GET['id_customer']);
    }
    if ($customer->id_account == 3) {
        $corp_resolution = getCorporateResolutionInfo($_GET['id_customer']);
    }

    include_once 'settings/view/app_single/modals.php';
    ?>
    <section id="app_single" class="container">

        <div class="page-header">
            <h2 class="page-tittle">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                Customer Details:
                <span class="customer_name">
                    <?php
                    if (!empty($customer->first_name_onaf_customer)) {
                        echo getPrefixById($customer->id_prefix) . ' ' . $customer->first_name_onaf_customer . ' ' . $customer->middle_name_customer . ' ' . $customer->last_name_customer . ' ' . getSuffixById($customer->id_suffix);
                    }
                    ?>
                </span>
                <button type="button" class="btn btn-danger" onclick="window.close();"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Close Window </button> 
            </h2>
        </div>

        <div class="cust_main_info">
            <div class="col-md-3">
                <b>Registration Date:</b> <br>
                <span class="cust_date"><?php echo $customer->create_at ?></span>
            </div>
            <div class="col-md-3">
                <b>Account type:</b> <br>
                <span class="cust_acct"><?php echo getAccountById($customer->id_account) ?></span>
            </div>
            <div class="col-md-3">  
                <b>Dealer:</b> <br>
                <span class="cust_dealer"><?php echo getDealerName($customer->dealer_code_customer) ?> (<?php echo getDealerAccron($customer->dealer_code_customer) ?>)</span>
            </div>
            <div class="col-md-3">
                <b>Process:</b> <br>
                <span class="cust_process"><i class="fa fa-bell" aria-hidden="true"></i> <?php echo getCustomerStatus($customer->idstatus_onaf_customer); ?></span> - 
                <span class="process" data-id="<?php echo $_GET['id_customer'] ?>">
                    <div class="processdiv"></div>
                </span>         
            </div>
            <div class="clearfix"></div>  
        </div>

        <ul class="nav nav-tabs">
            <?php if ($customer->idstatus_onaf_customer != 1) { ?>
                <li class="active"><a data-toggle="tab" href="#livereport" class="pmifontcolor"><i class="fa fa-flag-o" aria-hidden="true"></i> Live </a></li>
            <?php } ?>

            <li <?php
            if ($customer->idstatus_onaf_customer == 1) {
                echo 'class="active"';
            }
            ?> >
                <a data-toggle="tab" href="#account" class="pmifontcolor"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Details</a>
            </li>
        </ul>

        <div class="tab-content">

            <?php if ($customer->idstatus_onaf_customer != 1) { ?>
                <div id="livereport" class="tab-pane fade in active">
                    <div id="live_report"></div>
                    <?php if (getFollowupStatus($_GET['id_customer']) == 1) { ?>
                        <script>

                            setInterval(function (e) {

                                var id = <?php echo $_GET['id_customer'] ?>;
                                $.ajax({
                                    async: false,
                                    type: "GET",
                                    dataType: "html",
                                    contentType: "application/x-www-form-urlencoded",
                                    url: urlajaxlive,
                                    data: ('id_customer=' + id),
                                    beforeSend: function () {
                                        $("#live_report").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
                                    },
                                    success: function (data) {
                                        $("#live_report").html(data);
                                    }
                                });
                            }, 3000);

                        </script>
                    <?php } ?>

                    <?php if ($customer->idstatus_onaf_customer == 0) { ?>
                        <?php if (empty($_GET['id_customer'])) { ?>
                            <div class="alert alertpmi fade in">
                                <h4 class="pmisubtitles"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error! </h4>
                                <p> User ID can NOT be empty. </p>
                            </div>
                            <?php
                        } else {
                            if ($customer == FALSE) {
                                ?>
                                <div class="alert alertpmi fade in">
                                    <h4 class="pmisubtitles"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error! </h4>
                                    <p> This user ID is NOT registered, please verify. </p>
                                </div>
                                <?php
                            } else {
                                setSessionOnafAdmin("customer", $_GET['id_customer'])
                                ?>
                                <footer class="well">
                                    <fieldset class="text-center">
                                        <button type="button" class="btn btnpmi" data-toggle="modal" data-target=".bs-example-modal-sm"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Support Email</button>
                                        <?php if (getFollowupStatus($_GET['id_customer']) == 0) { ?>
                                            <button type="button" id="btnliveoff" class="btn btnpmi switchlive"  data-id="off" data-idcustomer="<?php echo $_GET['id_customer']; ?>"> <i class="fa fa-toggle-off" aria-hidden="true"></i>  Follow up client </button>
                                        <?php } elseif (getFollowupStatus($_GET['id_customer']) == 1) { ?>
                                            <button type="button" id="btnliveon" class="btn btnpmi switchlive" data-id="on" data-idcustomer="<?php echo $_GET['id_customer']; ?>"> <i class="fa fa-toggle-on" aria-hidden="true"></i> UnFollow client</button>
                                        <?php } ?>


                                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header pmi_modal_header">
                                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell" aria-hidden="true"></i> Are you sure? </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Sending support email to: <br><b><?php echo $customer->email_onaf_customer ?></b></p>
                                                        <a href="?p=emailCreator&customer_id=<?php echo $_GET['id_customer'] ?>&customer_email=<?php echo $customer->email_onaf_customer ?>"  id="btnsupport" class="btn btn-success" >
                                                            <i class="fa fa-paper-plane" aria-hidden="true"></i> YES
                                                        </a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                        

                                    </fieldset>
                                </footer>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                </div>
            <?php } ?>

            <div id="account" class="tab-pane fade <?php
            if ($customer->idstatus_onaf_customer == 1) {
                echo ' in active';
            }
            ?>" >

                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Account Owner Information </td>
                    </tr>
                    <tr>
                        <td width="50%"> <i class="fa fa-key"></i> Account Security Key:</td>
                        <td width="50%">  <?php echo getCustomerHash($_GET['id_customer']) ?></td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-envelope-o"></i> E-mail:</td>
                        <td> <a href="mailto:<?php echo $customer->email_onaf_customer ?>"><?php echo $customer->email_onaf_customer ?></a></td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-phone"></i> Phone number:</td>
                        <td>  <?php echo '<b>' . getTypePhoneById($customer->id_type_phone_number) . '</b>  ' . $customer->phone_number_customer . '<b> ' . $customer->phone_number_customer_ext . '</b>' ?></td>
                    </tr>

                    <?php if (isset($customer->secondary_phone_number_customer)) { ?>
                        <tr>
                            <td> <i class="fa fa-phone"></i> Phone number:</td>
                            <td>  <?php echo '<b>' . getTypePhoneById($customer->id_type_secondary_phone_number) . '</b>  ' . $customer->secondary_phone_number_customer . '<b> ' . $customer->secondary_phone_number_customer_ext . '</b>' ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (!empty($customer->id_account)) { ?>
                        <tr>
                            <td> <i class="fa fa-globe" aria-hidden="true"></i> Recidency: </td>
                            <td>  <?php
                                if (empty($customer->id_country_recidency)) {
                                    echo getCountryById($customer->id_country);
                                } else {
                                    echo getCountryById($customer->id_country_recidency);
                                }
                                ?>
                            </td>
                        </tr>

                        <?php if (!empty($account->photoidpath_secondaryid_onaf_customer_account)) { ?>
                            <tr>
                                <td> <i class="fa fa-file-image-o" aria-hidden="true"></i> Government-Issued Photo ID: </td>
                                <td> <a href = "<?php echo getpdfpath($account->photoidpath_secondaryid_onaf_customer_account) ?>" class = "btn btn-warning" target = "_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i> Open Photo ID </a> </td>
                            </tr>
                        <?php } ?>
                        <?php
                        if ($customer->id_account == 3) {
                            ?>
                            <?php if (!empty($corp_resolution->corp_pdfpath_onaf)) { ?>
                                <tr>
                                    <td> <i class="fa fa-file-text" aria-hidden="true"></i> Corporate Resolution Form: </td>
                                    <td> <a href="<?php echo $GLOBALS['GET_URL'] ?>pdf.php?corp_file=<?php echo getCustomerHash($_GET['id_customer']); ?>" class = "btn btn-info" target = "_blank"><i class="fa fa-file-text" aria-hidden="true"></i> Open Corporate Resolution </a> </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($customer->id_account == 2) { ?>
                        <tr>
                            <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Secondary Account Owner Information </td>
                        </tr>
                        <tr>
                            <td> <i class="fa fa-user"></i> Secondary Account Owner:</td>
                            <td> <?php echo getPrefixById($saoaccount->id_prefix) . ' ' . $saoaccount->first_name_onaf_customer . ' ' . $saoaccount->middle_name_customer . ' ' . $saoaccount->last_name_customer . ' ' . getSuffixById($saoaccount->id_suffix); ?></td>
                        </tr>
                        <tr>
                            <td> <i class="fa fa-phone"></i> Phone number:</td>
                            <td>  <?php echo '<b>' . getTypePhoneById($saoaccount->id_type_phone_number) . '</b>  ' . $saoaccount->phone_number_customer . '<b> ' . $customer->phone_number_customer_ext . '</b>' ?></td>
                        </tr>

                        <?php if (isset($saoaccount->secondary_phone_number_customer)) { ?>
                            <tr>
                                <td> <i class="fa fa-phone"></i> Phone number:</td>
                                <td>  <?php echo '<b>' . getTypePhoneById($saoaccount->id_type_secondary_phone_number) . '</b>  ' . $saoaccount->secondary_phone_number_customer . '<b> ' . $customer->secondary_phone_number_customer_ext . '</b>' ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                    <?php if (!empty($customer->id_account)) { ?>
                        <?php if ($customer->id_account == 2) { ?>
                            <tr>
                                <td> <i class="fa fa-globe" aria-hidden="true"></i> Recidency: </td>
                                <td>  <?php
                                    if (empty($saoaccount->id_country_recidency)) {
                                        echo getCountryById($saoaccount->id_country);
                                    } else {
                                        echo getCountryById($saoaccount->id_country_recidency);
                                    }
                                    ?></td>
                            </tr>

                            <?php if (!empty($saoaccount->photoidpath_secondaryid_onaf_customer_account)) { ?>
                                <tr>
                                    <td> <i class="fa fa-file-image-o" aria-hidden="true"></i> Government-Issued Photo ID: </td>
                                    <td> <a href = "<?php echo getpdfpath($saoaccount->photoidpath_secondaryid_onaf_customer_account) ?>" class = "btn btn-warning" target = "_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i> Open Photo ID </a> </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>  

                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Retail Dealer Information </td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-key"></i> Dealer Security Key: </td>
                        <td> <?php echo getDealerHash($customer->dealer_code_customer) ?>  </td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-building-o"></i> Dealer Name: </td>
                        <td> <?php echo getDealerName($customer->dealer_code_customer) . ' (' . getDealerAccron($customer->dealer_code_customer) . ')' ?> </td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-slack" aria-hidden="true"></i> Dealer Code: </td>
                        <td>  <?php echo $customer->dealer_code_customer ?></td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-envelope" aria-hidden="true"></i> Dealer Email Address: </td>
                        <td>  <?php echo getDealerEmail($customer->dealer_code_customer) ?></td>
                    </tr>

                    <?php
                    if (isset($_GET['id_customer'])) {
                        $customer = getCustomerInfo($_GET['id_customer']);
                        $profile = getProfileInfo($_GET['id_customer']);
                        ?>

                        <tr>
                            <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Customer Profile </td>
                        </tr>

                        <?php
                        $status = getProfileStatus($_GET['id_customer']);
                        if ($status == 0) {
                            if ($customer->idstatus_onaf_customer == 1) {
                                ?>

                                <tr>
                                    <td colspan="2" style="text-align:center;"> 
                                        <a href="settings.php?profile_id_customer=<?php echo $_GET['id_customer'] ?>" class="btn btn-success"><?php ?><i class="fa fa-trash" aria-hidden="true"></i> Send Customer Profile Form</a>
                                    </td>
                                </tr>

                            <?php } else { ?>
                                <tr>
                                    <td colspan="2" style="text-align:center;"> The <b>Customer Profile</b> Process is not yet activated for this customer - Account Application Form Unfinished. </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>

                            <tr>
                                <th width="50%">Sales Representative:</th>
                                <td width="50%"><?php echo $profile->sales_rep_profile_onaf; ?></td>
                            </tr>
                            <tr>
                                <td><b>Commission Charges:</b> Purchases <b><?php echo $profile->comm_purchases_profile_onaf; ?>%</b></td>
                                <td><b>Commission Charges:</b> Sales <b><?php echo $profile->comm_sales_profile_onaf; ?>%</b></td>
                            </tr>
                            <tr>
                                <th>Spetials Instructions:</th>
                                <td><?php echo $profile->spetials_inst_profile_onaf; ?></td>
                            </tr>
                            <tr>
                                <th>Date &amp; NY Time · IP Address</th>
                                <td><?php echo $profile->sign_time_profile_onaf . ' · ' . $profile->ip_profile_onaf; ?></td>
                            </tr>

                            <tr>
                                <th> Customer Profile Document </th>
                                <td> <a href="<?php echo getpdfpath($profile->pdf_path_profile_onaf) ?>" class="btn btn-info" target="_blank"><?php ?><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Open PDF </a> </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Internet Connection Data </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;"> <?php echo $customer->user_agent_customer_onaf ?> </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-hdd-o" aria-hidden="true"></i> Operating System:</td>
                        <td> <?php
                            if ($customer->os_customer_onaf == 'WIN') {
                                echo '<i class="fa fa-windows" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            } elseif ($customer->os_customer_onaf == 'MAC') {
                                echo '<i class="fa fa-apple" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            } elseif ($customer->os_customer_onaf == 'LINUX') {
                                echo '<i class="fa fa-linux" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            } else {
                                echo '<i class="fa fa-laptop" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-google" aria-hidden="true"></i> Web Browser: </td>
                        <td> <?php
                            if ($customer->browser_customer_onaf == 'IE') {
                                echo '<i class="fa fa-internet-explorer" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'FIREFOX') {
                                echo '<i class="fa fa-firefox" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'SAFARI') {
                                echo '<i class="fa fa-safari" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'CHROME') {
                                echo '<i class="fa fa-chrome" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'OTHER') {
                                echo '<i class="fa fa-google" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } else {
                                echo '<i class="fa fa-google" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            }
                            ?> </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-code-fork" aria-hidden="true"></i> Browser Version: </td>
                        <td>  <?php echo $customer->browser_version_customer_onaf ?></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Welcome Message </td>
                    </tr>

                    <?php
                    $status = getWelcomeStatus($_GET['id_customer']);
                    if ($status == 1) {
                        $welcomeInfo = getWelcomeInfo($_GET['id_customer']);
                        ?>
                        <tr>
                            <td> <i class="fa fa-slack" aria-hidden="true"></i> Account Number: </td>
                            <td>  <?php echo $welcomeInfo->accountnumber_welcome_onaf ?></td>
                        </tr>
                        <tr>
                            <td> <i class="fa fa-envelope-o" aria-hidden="true"></i> Welcome Message sent to: </td>
                            <td>  <?php echo $welcomeInfo->client_welcome_onaf ?></td>
                        </tr>
                        <tr>
                            <td> <i class="fa fa-envelope" aria-hidden="true"></i> Dealer Email:</td>
                            <td> <?php echo $welcomeInfo->dealeremail_welcome_onaf ?></td>
                        </tr>
                        <tr>
                            <td> <i class="fa fa-envelope" aria-hidden="true"></i> PMI Email:</td>
                            <td> <?php echo $welcomeInfo->pmiemail_welcome_onaf ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td colspan="2" style="text-align:center;"> The <b>Welcome Message</b> Process is not yet activated for this customer - Account Application Form Unfinished. </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="footer"> 

            <?php if (!empty($customer->pdf_path_customer)) { ?>
                <a target="pdf" href="<?php echo GET_URL ?>pdf.php?pdf_file=<?php echo getCustomerHash($_GET['id_customer']); ?>" class="btn btn-warning" target = "_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Open PDF </a>
            <?php } ?> 

            <?php
            if ($_SESSION['onafpermission'] == 1) {
                setSessionOnafAdmin("user_id", $_GET['id_customer'])
                ?>
                <a href="index.php?p=session&id=<?php echo $_GET['id_customer'] ?>" class="btn btnpmi" name="retreive" id="retreive" target="_blank" ><i class="fa fa-rotate-left" aria-hidden="true"></i> Retrieve Session </a>
            <?php } ?>

            <?php
            $status = getWelcomeStatus($_GET['id_customer']);
            if ($status == 0) {
                if ($customer->idstatus_onaf_customer == 1) {
                    ?>
                    <a href="welcome/index.php?hash=<?php echo getCustomerToken($_GET['id_customer']); ?>" class="btn btn-info" target="_blank"><?php ?><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Welcome Message</a>
                <?php } ?>
            <?php } else { ?>
                <a href="welcome/index.php?hash=<?php echo getCustomerToken($_GET['id_customer']); ?>" class="btn btn-success" target="_blank"><?php ?><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Welcome Message again? </a>
            <?php } ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exportModal"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to CSV </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteApp"> <i class="fa fa-trash" aria-hidden="true"></i> Remove Application </button>
        </div>

    </section>
    <?php
}



if (isset($_GET['id_customer_profile'])) {
    $customer = getCustomerInfo($_GET['id_customer_profile']);
    $profile = getProfileInfo($_GET['id_customer_profile']);
    ?>

    <section id="app_single_profile" class="container">
        <div class="page-header">
            <h2 class="page-tittle">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                Customer Profile Process:
                <span class="customer_name">
                    <?php
                    if (!empty($customer->first_name_onaf_customer)) {
                        echo getPrefixById($customer->id_prefix) . ' ' . $customer->first_name_onaf_customer . ' ' . $customer->middle_name_customer . ' ' . $customer->last_name_customer . ' ' . getSuffixById($customer->id_suffix);
                    }
                    ?>
                </span>
                <button type="button" class="btn btn-danger" onclick="window.close();"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Close Window </button> 
            </h2>
        </div>

        <div class="profile_process_buttons"> 
            <?php
            $status = getProfileStatus($_GET['id_customer_profile']);
            if ($status == 0) {
                if ($customer->idstatus_onaf_customer == 1) {
                    ?>

                    <a href="settings.php?profile_id_customer=<?php echo $_GET['id_customer_profile'] ?>" class="btn btn-success"><?php ?><i class="fa fa-trash" aria-hidden="true"></i> Send Customer Profile Form</a>
                <?php } else { ?>

                    The <b>Customer Profile</b> Process is not yet activated for this customer - Account Application Form Unfinished.

                <?php } ?>
            <?php } else { ?>
                <a target="pdf" href="<?php echo GET_URL ?>pdf.php?profile_pdf_file=<?php echo getCustomerHash($_GET['id_customer_profile']); ?>" class="btn btn-info" target="_blank"><?php ?><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Open PDF </a>     
            <?php } ?> 
        </div>
    </section>   
<?php } ?>


<?php
if (isset($_GET['id_acknow'])) {

    $id_cust_acknow = $_GET['id_acknow'];

    $customer = getAcknowlegementsInfo($id_cust_acknow);

    include_once 'settings/view/app_single/modals.php';
    ?>
    <section id="app_single" class="container">

        <div class="page-header">
            <h2 class="page-tittle">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                Customer Details:
                <span class="customer_name">
                    <?php
                    if (!empty($customer->first_name_cust_acknow)) {
                        echo getPrefixById($customer->id_prefix_cust_acknow) . ' ' . $customer->first_name_cust_acknow . ' ' . $customer->middle_name_cust_acknow . ' ' . $customer->last_name_cust_acknow;
                    }
                    ?>
                </span>
                <button type="button" class="btn btn-danger" onclick="window.close();"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Close Window </button> 
            </h2>
        </div>

        <div class="cust_main_info">
            <div class="col-md-6">
                <b>Registration Date:</b> <br>
                <span class="cust_date"><?php echo $customer->customer_signtime_cust_acknow ?></span>
            </div>
            <div class="col-md-3">
                <b>Country:</b> <br>
                <span class="cust_acct"><?php echo getCountryById($customer->id_country_cust_acknow) ?></span>
            </div>
            <div class="col-md-3">  
                <b>Dealer:</b> <br>
                <span class="cust_dealer"><?php echo getDealerName(getDealerIdByHash($customer->hash_dealer_cust_acknow)) ?> (<?php echo getDealerAccron(getDealerIdByHash($customer->hash_dealer_cust_acknow)) ?>)</span>
            </div>
            
            <div class="clearfix"></div>  
        </div>

        <ul class="nav nav-tabs">
            <?php if ($customer->idstatus_onaf_customer != 1) { ?>
                <li class="active"><a data-toggle="tab" href="#livereport" class="pmifontcolor"><i class="fa fa-flag-o" aria-hidden="true"></i> Live </a></li>
            <?php } ?>

            <li <?php
            if ($customer->idstatus_onaf_customer == 1) {
                echo 'class="active"';
            }
            ?> >
                <a data-toggle="tab" href="#acknow" class="pmifontcolor"><i class="fa fa-folder-open-o" aria-hidden="true"></i> Details</a>
            </li>
        </ul>

        <div class="tab-content">

            <?php if ($customer->idstatus_onaf_customer != 1) { ?>
                <div id="livereport" class="tab-pane fade in active">
                    <div id="live_report"></div>
                    <?php if (getFollowupAcknowStatus($_GET['id_acknow']) == 1) { ?>
                        <script>

                            setInterval(function (e) {

                                var id = <?php echo $_GET['id_acknow'] ?>;
                                $.ajax({
                                    async: false,
                                    type: "GET",
                                    dataType: "html",
                                    contentType: "application/x-www-form-urlencoded",
                                    url: urlajaxlive,
                                    data: ('id_acknow=' + id),
                                    beforeSend: function () {
                                        $("#live_report").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
                                    },
                                    success: function (data) {
                                        $("#live_report").html(data);
                                    }
                                });
                            }, 3000);

                        </script>
                    <?php } ?>

                    <?php if ($customer->idstatus_cust_acknow == 0) { ?>
                        <?php if (empty($_GET['id_acknow'])) { ?>
                            <div class="alert alertpmi fade in">
                                <h4 class="pmisubtitles"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error! </h4>
                                <p> User ID can NOT be empty. </p>
                            </div>
                            <?php
                        } else {
                            if ($customer == FALSE) {
                                ?>
                                <div class="alert alertpmi fade in">
                                    <h4 class="pmisubtitles"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error! </h4>
                                    <p> This user ID is NOT registered, please verify. </p>
                                </div>
                                <?php
                            } else {
                                setSessionOnafAdmin("acknow", $_GET['id_acknow'])
                                ?>
                                <footer class="well">
                                    <fieldset class="text-center">
                                        <button type="button" class="btn btnpmi" data-toggle="modal" data-target=".bs-example-modal-sm"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Support Email</button>
                                        <?php if (getFollowupAcknowStatus($_GET['id_acknow']) == 0) { ?>
                                            <button type="button" id="btnliveoff" class="btn btnpmi switchlive"  data-id="off" data-idcustomer="<?php echo $_GET['id_acknow']; ?>"> <i class="fa fa-toggle-off" aria-hidden="true"></i>  Follow up client </button>
                                        <?php } elseif (getFollowupAcknowStatus($_GET['id_acknow']) == 1) { ?>
                                            <button type="button" id="btnliveon" class="btn btnpmi switchlive" data-id="on" data-idcustomer="<?php echo $_GET['id_acknow']; ?>"> <i class="fa fa-toggle-on" aria-hidden="true"></i> UnFollow client</button>
                                        <?php } ?>


                                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header pmi_modal_header">
                                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell" aria-hidden="true"></i> Are you sure? </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Sending support email to: <br><b><?php echo $customer->email_cust_acknow ?></b></p>
                                                        <a href="?p=emailCreator&customer_id=<?php echo $_GET['id_customer'] ?>&customer_email=<?php echo $customer->email_cust_acknow?>"  id="btnsupport" class="btn btn-success" >
                                                            <i class="fa fa-paper-plane" aria-hidden="true"></i> YES
                                                        </a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                        

                                    </fieldset>
                                </footer>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                </div>
            <?php } ?>

            <div id="acknow" class="tab-pane fade <?php
            if ($customer->idstatus_onaf_customer == 1) {
                echo ' in active';
            }
            ?>" >

                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Customer Acknowlegement Information </td>
                    </tr>
                    <tr>
                        <td width="50%"> <i class="fa fa-key"></i> Customer Acknowlegement Security Key:</td>
                        <td width="50%">  <?php echo $customer->hash_cust_acknow ?></td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-envelope-o"></i> E-mail:</td>
                        <td> <a href="mailto:<?php echo $customer->email_cust_acknow ?>"><?php echo $customer->email_cust_acknow ?></a></td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-phone" aria-hidden="true"></i> Home Phone number:</td>
                        <td>  <?php echo '<b>Home</b>  ' . $customer->home_phone_cust_acknow; ?></td>
                    </tr>

                    <?php if (isset($customer->mobile_phone_cust_acknow)) { ?>
                        <tr>
                            <td> <i class="fa fa-mobile" aria-hidden="true"></i> Mobile Phone number:</td>
                            <td>  <?php echo '<b>Mobile </b>  ' . $customer->mobile_phone_cust_acknow; ?></td>
                        </tr>
                    <?php } ?>
                        
                    <?php if (isset($customer->business_phone_cust_acknow)) { ?>
                        <tr>
                            <td><i class="fa fa-briefcase" aria-hidden="true"></i> Business Phone number:</td>
                            <td>  <?php echo '<b> Work </b>  ' . $customer->business_phone_cust_acknow; ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (!empty($customer->id_country_cust_acknow)) { ?>
                        <tr>
                            <td> <i class="fa fa-globe" aria-hidden="true"></i> Country : </td>
                            <td>  <?php echo getCountryById($customer->id_country_cust_acknow); ?>
                            </td>
                        </tr>

                        <?php if (!empty($account->photoidpath_secondaryid_onaf_customer_account)) { ?>
                            <tr>
                                <td> <i class="fa fa-file-image-o" aria-hidden="true"></i> Customer Acknowlegement PDF: </td>
                                <td> <a href = "<?php echo getpdfpath($account->photoidpath_secondaryid_onaf_customer_account) ?>" class = "btn btn-warning" target = "_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i> Open PDF </a> </td>
                            </tr>
                        <?php } ?>
                        
                    <?php } ?>

                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Retail Dealer Information </td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-key"></i> Dealer Security Key: </td>
                        <td> <?php echo getDealerHash(getDealerIdByHash($customer->hash_dealer_cust_acknow)) ?>  </td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-building-o"></i> Dealer Name: </td>
                        <td> <?php echo getDealerName(getDealerIdByHash($customer->hash_dealer_cust_acknow)) . ' (' . getDealerAccron(getDealerIdByHash($customer->hash_dealer_cust_acknow)) . ')' ?> </td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-slack" aria-hidden="true"></i> Dealer Code: </td>
                        <td>  <?php echo getDealerIdByHash($customer->hash_dealer_cust_acknow); ?></td>
                    </tr>
                    <tr>
                        <td> <i class="fa fa-envelope" aria-hidden="true"></i> Dealer Email Address: </td>
                        <td>  <?php echo getDealerEmail(getDealerIdByHash($customer->hash_dealer_cust_acknow)) ?></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="table_title"> <i class="fa fa-key"></i> Internet Connection Data </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;"> <?php echo $customer->user_agent_customer_onaf ?> </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-hdd-o" aria-hidden="true"></i> Operating System:</td>
                        <td> <?php
                            if ($customer->os_customer_onaf == 'WIN') {
                                echo '<i class="fa fa-windows" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            } elseif ($customer->os_customer_onaf == 'MAC') {
                                echo '<i class="fa fa-apple" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            } elseif ($customer->os_customer_onaf == 'LINUX') {
                                echo '<i class="fa fa-linux" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            } else {
                                echo '<i class="fa fa-laptop" aria-hidden="true"></i> ' . $customer->os_customer_onaf;
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-google" aria-hidden="true"></i> Web Browser: </td>
                        <td> <?php
                            if ($customer->browser_customer_onaf == 'IE') {
                                echo '<i class="fa fa-internet-explorer" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'FIREFOX') {
                                echo '<i class="fa fa-firefox" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'SAFARI') {
                                echo '<i class="fa fa-safari" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'CHROME') {
                                echo '<i class="fa fa-chrome" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } elseif ($customer->browser_customer_onaf == 'OTHER') {
                                echo '<i class="fa fa-google" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            } else {
                                echo '<i class="fa fa-google" aria-hidden="true"></i> ' . $customer->browser_customer_onaf;
                            }
                            ?> </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-code-fork" aria-hidden="true"></i> Browser Version: </td>
                        <td>  <?php echo $customer->browser_version_customer_onaf ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer"> 

            <?php if (!empty($customer->pdf_path_customer)) { ?>
                <a target="pdf" href="<?php echo GET_URL ?>pdf.php?pdf_file=<?php echo getCustomerHash($_GET['id_acknow']); ?>" class="btn btn-warning" target = "_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Open PDF </a>
            <?php } ?> 


            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exportModal"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to CSV </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteApp"> <i class="fa fa-trash" aria-hidden="true"></i> Remove Acknowlegement </button>
        </div>

    </section>
    <?php
}