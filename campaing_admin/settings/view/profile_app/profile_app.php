<?php ?> 
<?php
if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}

////////////////////////////// delete_app module //////////////////////////////////

if (isset($_SESSION['onaf_admin_profile_id_customer'])) {

    $profile_id_customer = $_SESSION['onaf_admin_profile_id_customer'];
    if (getProfileStatus($profile_id_customer) == 0) {

        global $data;
        require_once 'APPS/phpmailer/PHPMailerAutoload.php';
        require_once 'APPS/phpmailer/class.phpmailer.php';

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';

        $mail->From = 'no-reply@pmilimited.com';
        $mail->FromName = 'Precious Metals International, Ltd.';

        $mail->isHTML(true); //Set email format to HTML
        /**
         * variables to send
         */
        $idcustomer = $profile_id_customer;
        $customer = getCustomerInfo($idcustomer);
        $dealerAccron = getDealerAccron($customer->dealer_code_customer);
        $dealer = getDealerName($customer->dealer_code_customer);
        $dealerEmail = getDealerEmail($customer->dealer_code_customer);
        $prefix = getPrefixById($customer->id_prefix);
        $suffix = getSuffixById($customer->id_suffix);
        $customer_hash = getCustomerToken($idcustomer);

        //$mail->addAddress('desarrollo@eleventraining.com');
        $mail->addAddress($dealerEmail);
        $mail->addAddress(MAIN_EMAIL); //Send to... 
        $mail->addAddress(SUPPORT_EMAIL); //Send to...

        $mail->Subject = 'PMI Notification: ' . $dealerAccron . ' Customer Profile in the works online'; //Email Subject

        $date = date('Y');
        $pmi_info = getPMIInfo(APP_KEY);
        $phone1 = $data["company_phone_1"];
        $phone2 = $data['company_phone_2'];
        $phone3 = $data['company_phone_3'];
        $URL_profile = GET_URL.'profile/index.php?customer='.$customer_hash;
        $html = <<<STARTEMAIL


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>PMI Notification</title>
        <style type="text/css">
            body {margin: 0; padding: 0; min-width: 100%!important;}
            .table_main{width: 100%; max-width: 600px;}
            .table_body{width: 90%; max-width: 600px;}
            @media only screen and (max-width: 1199px) {   
            }
            @media only screen and (max-width: 991px) {     
            }
            @media only screen and (max-width: 767px) {          
            }
            @media only screen and (max-width: 480px){        
            }
        </style>
    </head>
    <body style="margin:0;">
        <table class="table_main" cellspacing="0" cellpadding="5" style="margin:auto; font-family: sans-serif; font-size:14px; line-height:18px;">
            <tr>
                <td>
                    <table class="table_body" cellpadding="5" cellspacing="0" style="margin:auto;">
                        <tr style="text-align: center;">
                            <td style="text-align: center; color:#741D58; font-size:26px; line-height:24px; font-weight:bold;">
                                $pmi_info->app_tittle_pmi_info
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td> Customer Profile <b>in the works</b> online </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                Dear,
                                <br>
                                <b style='color: rgb(116,29,90)'> $dealer </b>
                                <br><br>
                                Your customer, <b style='color: rgb(116,29,90)'>$prefix  $customer->first_name_onaf_customer  $customer->middle_name_customer  $customer->last_name_customer $suffix</b>  has finished an account opening application form.
                                <br/><br/>
                                <a href='$URL_profile' style='color: rgb(116,29,90); font-weight:bold;'>
                                Please click here to fill out the Customer Profile corresponding to this account.
                                </a>
                                <br/><br/>
                                Thank you,
                                <br>
                                <b style='color: rgb(116,29,90)'>New Accounts</b>
                            </td>
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2" style="color:#350132;"> <hr style="color:#350132; border:1px solid #350132"> </td>
                        </tr>                          
                    </table>
                </td>
            </tr>
            <tr style="color:#350132; text-align: center; font-family: sans-serif; font-size:12px; line-height:16px">
                <td colspan="2">
                    This email is © 2002, $date $pmi_info->app_tittle_pmi_info All Rights Reserved.<br> 
                    $pmi_info->address1_pmi_info | $pmi_info->address2_pmi_info<br>
                    $phone1 | $phone2 | $phone3
                </td>
            </tr>            
        </table>
    </body>
</html>

            
STARTEMAIL;
        $mail->Body = $html;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }
        $notification= getNotificationProfile($profile_id_customer);
        $date = date("Y-m-d h:i:sa");
        $profileNoti = findProfile($profile_id_customer);
        if ($profileNoti == FALSE) {
            $count_notifications = 1;
            setProfileNotification($profile_id_customer, $date, $count_notifications);
        } else {
            $count_notifications = intval($notification + 1);
            updateProfileNotification($profile_id_customer, $date, $count_notifications);
        }
        setSuccess("Customer Profile has been successfully sent.");
        header("Location: settings.php?p=app_forms");
    } else {
        ?>
        <div class="container">
            <div class="clearfix">&nbsp;</div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 well">
                    <div class="page-header pmititles text-center">
                        <i class="fa fa-th-list" aria-hidden="true"></i> <?php echo $GLOBALS['thanks_message1'] ?>
                    </div></br>
                    <p class="text-center">
                        The Customer Profile you are trying to enter has already been registered and marked as complete in our database, if you think this is an error, please contact <a href="http://www.pmilimited.com/welcome.php?page=Contact%20Us">our customer service department.</a> Thank you.
                    </p></br>
                    <footer>
                        <p class="text-center">
                            <a href="settings.php?p=dashboard" class="btn btnpmi">
                                go to dashboard <i class="fa fa-chevron-circle-right fa-fw"></i>
                            </a>
                            <a href="https://www.pmilimited.com/" class="btn btnpmi">
                                <?php echo $GLOBALS['thanks_message6'] ?> <i class="fa fa-chevron-circle-right fa-fw"></i>
                            </a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
        <?php
        $date = date("Y-m-d");
        $profile = findProfile($profile_id_customer);
        if ($profile == FALSE) {
            $count_notifiications = 1;
            setProfileNotification($profile_id_customer, $date, $count_notifiications);
        } else {
            $count_notifiications = intval($profileInfo->detail_profile_notifications) + 1;
            updateProfileNotification($profile_id_customer, $date, $count_notifiications);
        }
    }
} else {
    setError("Error, customer Account not found or already deleted, please reload the page, adn try again.");
    header("Location: settings.php?p=app_forms");
}

////////////////////////////// delete_app module //////////////////////////////////
?>