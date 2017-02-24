<?php

if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['customer_id'])) {


        $customer_email = $_GET['customer_email'];
        $customer_id = $_GET['customer_id'];

        global $data;
        require_once 'APPS/phpmailer/PHPMailerAutoload.php';
        require_once 'APPS/phpmailer/class.phpmailer.php';

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';

        $mail->From = 'no-reply@pmilimited.com';
        $mail->FromName = 'Precious Metals International, Ltd.';

        $mail->addAddress(MAIN_EMAIL);
        $mail->addAddress(SUPPORT_EMAIL);
        $mail->addAddress($customer_email);

        $mail->isHTML(true); //Set email format to HTML

        $mail->Subject = 'PMI Notification: Client Support Services'; //Email Subject
        /**
         * variables to send
         */
        $id_customer = $customer_id;
        $customerinfo = getCustomerInfo($id_customer);
        $account = getAccountById($customerinfo->id_account);
        $prefix = getPrefixById($customerinfo->id_prefix);
        $suffix = getSuffixById($customerinfo->id_suffix);
        $customer_token = getCustomerToken($id_customer); //customer token
        $date = date('Y');
        $phone1 = $data["company_phone_1"];
        $phone2 = $data['company_phone_2'];
        $phone3 = $data['company_phone_3'];
        $currentTime = date('H:i:s');
        $pmi_info = getPMIInfo(APP_KEY);
        $URL_support = GET_URL . 'index.php?support&email='.$customer_email;

        if ($currentTime >= '00:00:01' || $currentTime <= '12:00:00') {
            $greeting = 'Morning';
        } elseif ($currentTime >= '12:00:01' || $currentTime <= '17:30:00') {
            $greeting = 'Afternoon';
        } elseif ($currentTime >= '17:30:01' || $currentTime <= '00:00:00') {
            $greeting = 'Evening';
        }
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
                                Precious Metals International, Ltd.
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td> <b>Support Services</b> </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                Good $greeting 
                                <br>
                                <b style='color: rgb(116,29,90)'> 
                                    $prefix  $customerinfo->first_name_onaf_customer  $customerinfo->middle_name_customer  $customerinfo->last_name_customer $suffix
                                </b>
                                <br><br>
                                Following the next link, you will be able to complete your Customer Account Application Form.
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>
                                <a href="$URL_support" style="padding:10px 20px; background:#741D58; color:#ffffff; text-decoration:none;" target="_blank" align="center">
                                    CONTINUE 
                                </a>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br/><br/>
                                Thank you,
                                <br>
                                <b style='color: rgb(116,29,90)'>Client Support Services</b>
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
        setSuccess("Customer Support Email has been successfully sent.");
        header("Location: settings.php?p=app_single&id_customer=".$customer_id);
    }
}