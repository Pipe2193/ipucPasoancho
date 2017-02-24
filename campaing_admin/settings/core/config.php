<?php

/**
 * Main  ONAF config file 
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage config
 * @version 1.0.0
 * Versión actual de la línea base 
 */
////////////////////////////// initialize APP  //////////////////////////////////
define('ONAF_ADMIN_VERSION', '3.0.0');
define('APP_KEY', '2535b1d9d5335f51bd5994b86bb2c6ef');

session_name('ONAF_ADMIN');
session_start();
ob_start();
//////////////////////////////End initialize APP ////////////////////////////////
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);
////////////////////////////// Site & DATA Variables ////////////////////////////

$data = array('');
$data['app_name'] = 'PMI - Precious Metals International, Ltd.';
$data['app_description'] = 'Administration Panel';

////////////////////////////// enviroment switch //////////////////////////////////
$enviroment = 'testing';

if ($enviroment == 'production') {
    $config_setPath = '/Applications/XAMPP/htdocs/onafmvc/';
    $config_setUrl = 'https://onaf.pmilimited.com/';
    define('GET_URL', $config_setUrl);
    define('GET_PATH', $config_setPath);

//////////////////////////// setting pmi emails ////////////////////////////////
    define('MAIN_EMAIL', 'pmi@milimited.com');
    define('SUPPORT_EMAIL', 'bpo@pmilimited.com');
////////////////////////////End setting pmi emails /////////////////////////////
} elseif ($enviroment == 'testing') {
    $config_setPath = '/Applications/XAMPP/htdocs/onafmvc/';
    $config_setUrl = 'https://customers.pmilimited.com/ONAF3/';
    define('GET_URL', $config_setUrl);
    define('GET_PATH', $config_setPath);

//////////////////////////// setting pmi emails ////////////////////////////////
    define('MAIN_EMAIL', 'desarrollo@eleventraining.com');
    define('SUPPORT_EMAIL', 'desarrollo@eleventraining.com');
////////////////////////////End setting pmi emails /////////////////////////////
} elseif ($enviroment == 'local') {
    $config_setPath = '/Applications/XAMPP/htdocs/onafmvc/';
    $config_setUrl = 'http://localhost/customers.onaf3/';
    define('GET_URL', $config_setUrl);
    define('GET_PATH', $config_setPath);

//////////////////////////// setting pmi emails ////////////////////////////////
    define('MAIN_EMAIL', 'desarrollo@eleventraining.com');
    define('SUPPORT_EMAIL', 'desarrollo@eleventraining.com');
////////////////////////////End setting pmi emails /////////////////////////////
}
////////////////////////////// end enviroment switch ////////////////////////////

$all_path = 'settings/';
$assets_folder = $all_path . 'assets/';

$css_folder = $assets_folder . 'css/';
$data['css_folder'] = $css_folder;

$js_folder = $assets_folder . 'js/';
$data['js_folder'] = $js_folder;

$img_folder = $assets_folder . 'img/';
$data['img_folder'] = $img_folder;

$APPS_folder = $all_path . 'APPS/';
$data['APPS_folder'] = $APPS_folder;

$core_folder = $all_path . 'core/';
$data['core_folder'] = $core_folder;

$view_folder = $all_path . 'view/';
$data['view_folder'] = $view_folder;


$lang_folder = $all_path . 'lang/';
$en = $lang_folder . 'en.php';
$es = $lang_folder . 'es.php';
$data['en'] = $en;
$data['es'] = $es;


////////////////////////////End Site & DATA Variables ////////////////////////////
////////////////////////// Functions and Connections Includes ////////////////////

include $core_folder . 'functions.php';
include $core_folder . 'connect.php';
include $core_folder . 'queries.php';
//include $core_folder . 'handlerMessage.php';

$pmi_info = getPMIInfo(APP_KEY);

$company_phoneNumber_1 = $pmi_info->phone1_pmi_info;
$data['company_phoneNumber_1'] = $company_phoneNumber_1;

$company_phoneNumber_2 = $pmi_info->phone2_pmi_info;
$data['company_phoneNumber_2'] = $company_phoneNumber_2;

$company_phoneNumber_3 = $pmi_info->phone3_pmi_info;
$data['company_phoneNumber_3'] = $company_phoneNumber_3;


$data['company_phone_1'] = $company_phoneNumber_1 . ' toll-free';
$data['company_phone_2'] = $company_phoneNumber_2 . ' toll-free';
$data['company_phone_3'] = $company_phoneNumber_3 . ' local';

//getUserLanguage()
//get_lang();
//$user_language=getUserLanguage(); 
// Language Function Call
$_SESSION['lang'] = "en";
//De acuerdo al idioma hacemos una o varias redirecciones. 
if (isset($_SESSION['lang'])) {
    get_lang();
}
//else {
//	if($user_language=='en'){ 
//	    $_SESSION['lang'] = 'en';
//	    get_lang();
//	} elseif($user_language=='es'){ 
//	    $_SESSION['lang'] = 'es';
//	    get_lang();
//	} else { 
//	    $_SESSION['lang'] = 'en';
//	    get_lang();
//	}
//}
//
//////////////////////////End Functions and Connections Includes ////////////////
?>