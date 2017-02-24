<?php

/**
 * main ONAF functions witch runs the system.
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage functions
 * @version 1.0.0
 */
////////////////////////////// view render /////////////////////////////////////
/**
 * 
 * @global type $view_folder
 * @param type $data
 * @param type $part
 */
function templ_render($data, $part) {
    foreach ($data as $key => $value)
        $$key = $value;

    global $view_folder;
    include $view_folder . 'includes/top.php';
    include $view_folder . 'includes/header.php';

    loadMainFiles();

    //include $view_folder . 'menubar.php';
    // echo '<section id="content" >';
    for ($i = 0; $i < count($part); $i++) {
        templ_section($data, $part[$i]['sidebar'], $part[$i]['subview'], $part[$i]['subside'], $part[$i]['end'], $part[$i]['cont_cols'], $part[$i]['side_cols']);
    }
    // echo '</section>';

    include $view_folder . 'includes/footer.php';
    include $view_folder . 'includes/tail.php';
    //include $view_folder . 'modals.php';
}

////////////////////////////// end view render //////////////////////////////////
/**
 * view function to create a page section
 * @global type $view_folder
 * @param type $data
 * @param type $sidebar
 * @param type $subview
 * @param type $subside
 * @param type $end
 * @param type $cont_cols
 * @param type $side_cols
 */
function templ_section($data, $sidebar = FALSE, $subview, $subside = '', $end = 'front_end', $cont_cols, $side_cols) {
    foreach ($data as $key => $value)
        $$key = $value;

    global $view_folder;

    for ($i = 0; $i < count($subview); $i++) {
        echo '<link rel="stylesheet" href="' . $view_folder . $end . '/assets/css/' . $subview[$i] . '.css">';
        echo '<script type="text/javascript" src="' . $view_folder . $end . '/assets/js/' . $subview[$i] . '.js"></script>';
    }

    if ($sidebar != False) {
        // echo '<section id="inner_content" class="col-lg-' . $cont_cols[0] . ' col-md-' . $cont_cols[1] . ' col-sm-' . $cont_cols[2] . ' col-xs-' . $cont_cols[3] . ' ">';
        for ($i = 0; $i < count($subview); $i++) {
            include $view_folder . '/' . $end . '/' . $subview[$i] . '.php';
        }
        // echo '</section>';
        // echo '<aside id="inner_aside" class="col-lg-' . $side_cols[0] . ' col-md-' . $side_cols[1] . ' col-sm-' . $side_cols[2] . ' col-xs-' . $side_cols[3] . ' ">';
        for ($i = 0; $i < count($subside); $i++) {
            include $view_folder . '/' . $end . '/' . $subside[$i] . '.php';
        }
        // echo '</aside>';
    } else {
        // echo '<section id="inner_content" class="col-xs-12">';
        for ($i = 0; $i < count($subview); $i++) {
            include $view_folder . '/' . $end . '/' . $subview[$i] . '.php';
        }
        // echo '</section>';
    }
}

/**
 * view function to create forms
 * @param type $type
 * @param type $id
 * @param type $label
 * @param type $placeholder
 * @param type $value
 * @param type $required
 * @param type $readonly
 * @param type $label_class
 * @param type $input_class
 */
function templ_forms($type, $id, $label, $placeholder, $value, $required = FALSE, $readonly = FALSE, $label_class = '4', $input_class = '8') {
    if ($required != FALSE) {
        $required = 'required';
    } else {
        $required = '';
    };
    if ($readonly != FALSE) {
        $readonly = 'readonly';
    } else {
        $readonly = '';
    };
    echo '
		<div class="form-group">
			<label class="control-label col-sm-' . $label_class . '" for="' . $id . '">' . $label . '</label>
			<div class="col-sm-' . $input_class . '">
				<input type="' . $type . '" class="form-control" id="' . $id . '" name="' . $id . '" placeholder="' . $placeholder . '" value="' . $value . '" ' . $required . ' ' . $readonly . '>
			</div>
		</div>
		';
}

/**
 *  view function to create checkboxes
 * @param type $type
 * @param type $id
 * @param type $label
 * @param type $value
 * @param type $required
 * @param type $readonly
 * @param type $label_class
 * @param type $input_class
 */
function templ_checks($type = 'checkbox', $id, $label, $value = 'yes', $required = FALSE, $readonly = FALSE, $label_class = '4', $input_class = '8') {
    if ($required != FALSE) {
        $required = 'required';
    } else {
        $required = '';
    };
    if ($readonly != FALSE) {
        $readonly = 'readonly';
    } else {
        $readonly = '';
    };
    echo '
		<div class="form-group">
			<div class="col-sm-' . $input_class . '">
				<label class="check">
					<input type="' . $type . '" id="' . $id . '" name="' . $id . '" value="' . $value . '" ' . $required . ' ' . $readonly . '> ' . $label . '
				</label>
			</div>
		</div>
		';
}

/**
 * view function to create submit buttons
 * @param type $type
 * @param type $id
 * @param type $class
 * @param type $label
 * @param type $label_class
 * @param type $input_class
 */
function templ_submit($type = 'button', $id, $class = 'default', $label = 'Submit', $label_class = '4', $input_class = '8') {
    echo '
		<div class="form-group">
			<div class="col-sm-offset-' . $label_class . ' col-sm-' . $input_class . '">
				<button type="' . $type . '" id="' . $id . '" name="' . $id . '" class="btn btn-' . $class . '">' . $label . '</button>
			</div>
		</div>
		';
}

////////////////////////////// Other Functions //////////////////////////////////
/**
 * 
 * @param type $array
 */
function menu($array) {
    foreach ($array as $title => $link) {
        echo '<li> <a href="' . $link . '">' . $title . '</a> </li>';
    }
}

/**
 * 
 */
function get_lang() {
//$_SESSION['lang'] = 'es';
    if (!isset($_POST['lang']) || $_POST['lang'] == '') {
        if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'en';
        }
    } else {
        $_SESSION['lang'] = $_POST['lang'];
    }

    $lang = 'settings/view/includes/lang/' . $_SESSION['lang'] . '.php';
    include $lang;
}

/**
 * 
 * @return type
 */
function getUserLanguage() {
    $idioma = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    return $idioma;
}

////////////////////////////// End Other Functions /////////////////////////////
////////////////////////////// Functions for UX ////////////////////////////////

/**
 * 
 * @param type $module
 * @param type $img
 * @param type $type
 * @param type $alt
 * @param type $style
 */
function images($module, $img, $type, $alt = NULL, $style = NULL) {
    echo' 
		<figure> 
			<img src= "settings/view/' . $module . '/assets/img/' . $img . '.' . $type . '" 
			     alt= "' . $alt . '" 
			     title= "' . $alt . '" 
			     class= "img-responsive" 
                             style" ' . $style . '" > 
		</figure>';
}

/**
 * Carga los archivos js en las vistas del sistema
 */
function loadBasicScripts() {
    $files = array(
        'settings/view/includes/assets/js/onaf.js',
        'APPS/formvalidation/dist/js/formValidation.min.js',
        'APPS/formvalidation/dist/js/framework/bootstrap.min.js',
        'APPS/formvalidation/dist/js/addons/mandatoryIcon/src/mandatoryIcon.js',
        'settings/view/includes/assets/plugins/back-to-top.js',
        'settings/view/includes/assets/plugins/backstretch/jquery.backstretch.min.js',
        'APPS/pace/js/pace.js',
        'APPS/datatables/jquery.dataTables.min.js',
        'APPS/datatables/dataTables.bootstrap.min.js',
        'APPS/push/push.min.js'
    );
    foreach ($files as $file) {
        ?>
        <script type="text/javascript" src=<?php echo $file ?>></script>
        <?php
    }
}

/**
 * Carga los archivos css en las vistas del sistema
 */
function loadBasicCss() {
    $files = array(
        //'settings/view/includes/assets/css/style.css',
        'settings/view/includes/assets/css/onaf.css',
        'APPS/formvalidation/dist/css/formValidation.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css',
        'APPS/pace/css/pace.css',
        'APPS/datatables/dataTables.bootstrap.css'
    );
    foreach ($files as $file) {
        ?>
        <link rel="stylesheet" type="text/css" href=<?php echo $file ?>>
        <?php
    }
}

/**
 * check login  
 * @return boolean
 */
function checkAccess() {
    if (isset($_SESSION['onafadmin'])) {
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * load main files to ONAF
 */
function loadMainFiles() {
    $files = array(
        'APPS/phpMobileDetect/Mobile_Detect.php',
    );
    foreach ($files as $file) {
        require_once $file;
    }
}

////////////////////////////// end Functions for UX /////////////////////////////
////////////////////////////// user funcions ///////////////////////////////////

/**
 *  function to create sessions
 * @param type $session_name
 * @param type $session_data
 */
function setSessionOnafAdmin($session_name, $session_data) {
    $_SESSION['onaf_admin_' . $session_name] = $session_data;
}

/**
 * 
 * @param type $email
 * @param type $pass
 * @return boolean
 */
function onafAccess($username, $pass) {
    $access = getuser($username);
    $encryted = md5(md5($pass));

    if ($access->pass === $encryted) {

        setSessionOnafAdmin("user_name", $access->user_name);
        return TRUE;
    } else {
        return FALSE;
    }
}

function support_email_notification($customer_id, $customer_email) {
    
    global $data;
    require_once '../../APPS/phpmailer/PHPMailerAutoload.php';
    require_once '../../APPS/phpmailer/class.phpmailer.php';

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
    $URL_support = GET_URL . 'index.php?support';

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
                                $pmi_info->app_tittle_pmi_info
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
}

/////////////////////////////// end user functions//////////////////////////////
/////////////////////////////// handle message functions////////////////////////
/**
 * 
 * @param type $core_folder
 */
function includeHandlerMessage($core_folder) {
    include_once $core_folder . 'handlerMessage.php';
}

/**
 *
 * @return array from Exception|PDOException
 */
function getError($key = null) {
    $answer = $_SESSION['onafError'];
    if ($key !== null) {
        $answer = $answer[$key];
        unset($_SESSION['onafError'][$key]);
    } else {
        unset($_SESSION['onafError']);
    }
    return $answer;
}

/**
 *
 * @return array
 */
function getInformation() {
    $answer = $_SESSION['onafInformation'];
    unset($_SESSION['onafInformation']);
    return $answer;
}

/**
 *
 * @return array
 */
function getSuccess() {
    $answer = $_SESSION['onafSuccess'];
    unset($_SESSION['onafSuccess']);
    return $answer;
}

/**
 *
 * @return array
 */
function getWarning() {
    $answer = $_SESSION['onafWarning'];
    unset($_SESSION['onafWarning']);
    return $answer;
}

/**
 *
 * @param Exception|PDOException $error
 */
function setError($error, $key = null) {
    if ($key !== null) {
        $_SESSION['onafError'][$key] = $error;
    } else {
        $_SESSION['onafError'][] = $error;
    }
}

/**
 *
 * @param string $information
 */
function setInformation($information) {
    $_SESSION['onafInformation'][] = $information;
}

/**
 *
 * @param string $success
 */
function setSuccess($success) {
    $_SESSION['onafSuccess'][] = $success;
}

/**
 *
 * @param string $warning
 */
function setWarning($warning) {
    $_SESSION['onafWarning'][] = $warning;
}

/**
 * 
 * @param type $key
 * @return type
 */
function hasError($key = null) {
    if ($key !== null) {
        $rsp = (isset($_SESSION['onafError'][$key])) ? true : false;
    } else {
        $rsp = (isset($_SESSION['onafError']) and count($_SESSION['onafError']) > 0) ? true : false;
    }
    return $rsp;
}

/**
 * 
 * @return type
 */
function hasInformation() {
    return (isset($_SESSION['onafInformation']) and count($_SESSION['onafInformation']) > 0) ? true : false;
}

/**
 * 
 * @return type
 */
function hasSuccess() {
    return (isset($_SESSION['onafSuccess']) and count($_SESSION['onafSuccess']) > 0) ? true : false;
}

/**
 * 
 * @return type
 */
function hasWarning() {
    return (isset($_SESSION['onafWarning']) and count($_SESSION['onafWarning']) > 0) ? true : false;
}

function deleteErrorStack() {
    unset($_SESSION['onafError']);
}

function deleteInformationStack() {
    unset($_SESSION['onafInformation']);
}

function deleteSuccessStack() {
    unset($_SESSION['onafSuccess']);
}

function deleteWarningStack() {
    unset($_SESSION['onafWarning']);
}

/////////////////////////////// end handle message functions////////////////////
function getpdfpath($pdf) {

    $pdf_path = GET_URL . $pdf;
    return $pdf_path;
}

/**
 * redirect quearys to the account table on works
 * @param type $account
 * @return string
 */
function accountDispatcher($account) {
    if ($account == 1) {
        $accountTable = "onaf_customer_individual";
    } elseif ($account == 2) {
        $accountTable = "onaf_customer_joint";
    } elseif ($account == 3) {
        $accountTable = "onaf_customer_corporate";
    } elseif ($account == 4) {
        $accountTable = "onaf_customer_sao";
    }
    return $accountTable;
}

/**
 * 
 * @param type $account
 * @return string
 */
function deleteAccountDispatcher($account) {
    if ($account == 1) {
        $accountTable = "onaf_customer_individual";
    } elseif ($account == 2) {
        $accountTable = "onaf_customer_joint";
    } elseif ($account == 3) {
        $accountTable = "onaf_customer_corporate";
    } elseif ($account == 4) {
        $accountTable = "onaf_customer_sao";
    }
    return $accountTable;
}

/**
 * 
 * @param type $host
 * @param type $user
 * @param type $pass
 * @param type $name
 * @param type $tables
 */
/**
 * 
 * @param type $host
 * @param type $user
 * @param type $pass
 * @param type $name
 * @param type $tables
 */
function backup_tables($host, $user, $pass, $name, $tables = '*') {

    $link = mysql_connect($host, $user, $pass);
    mysql_select_db($name, $link);

    //get all of the tables
    if ($tables == '*') {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while ($row = mysql_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    //cycle through
    foreach ($tables as $table) {
        $result = mysql_query('SELECT * FROM ' . $table);
        $num_fields = mysql_num_fields($result);

        $return.= 'DROP TABLE ' . $table . ';';
        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE ' . $table));
        $return.= "\n\n" . $row2[1] . ";\n\n";

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysql_fetch_row($result)) {
                $return.= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return.= '"' . $row[$j] . '"';
                    } else {
                        $return.= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return.= ',';
                    }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }
    $date = date("Y-m-d_H.i.s"); 
    $fileName = 'onaf_v3_' . $date . '.sql'; 
    //save file
    $handle = fopen('../../cust_files/backups/'.$fileName, 'w+');
    fwrite($handle, $return);
    fclose($handle);
    
    return $fileName;
}

/**
 * 
 * @param type $id_customer
 */
function customer_profile_notification($id_customer) {
// value 1 = finished application
// value 0 = unfinished application
    updateStatus(1, $id_customer);
// session already initialized.
// Unset all of the session variables.
    $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
        );
    }

// Finally, destroy the session.
    session_destroy();
}
