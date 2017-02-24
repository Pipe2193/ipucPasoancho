<?php

/**
 * main request dispatcher
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage dispatcher
 * @version 1.0.0
 */
//////////////////////////////////// views sections ////////////////////////////
//////////////////////////////////// exceptions view ///////////////////////////
$error_404 = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('error_404'),
        'subside' => array(''),
        'end' => 'exception',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);
$error_500 = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('error_500'),
        'subside' => array(''),
        'end' => 'exception',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$error_dealer = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('error_dealer'),
        'subside' => array(''),
        'end' => 'exception',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);
$error_account = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('error_account'),
        'subside' => array(''),
        'end' => 'exception',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);
$error_dbconnection = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('error_dbconnection'),
        'subside' => array(''),
        'end' => 'exception',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

////////////////////////////////////end  exceptions view ////////////////////////

$login = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('login'),
        'subside' => array(''),
        'end' => 'login',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$sign_out = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('sign_out'),
        'subside' => array(''),
        'end' => 'login',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$dashboard = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('dashboard'),
        'subside' => array(),
        'end' => 'dashboard',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$app_forms = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('app_forms'),
        'subside' => array(),
        'end' => 'app_forms',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$app_single = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('app_single'),
        'subside' => array(),
        'end' => 'app_single',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$app_settings = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('app_settings'),
        'subside' => array(),
        'end' => 'app_settings',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$delete_app = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('delete_app'),
        'subside' => array(),
        'end' => 'delete_app',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$profile_app = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('profile_app'),
        'subside' => array(),
        'end' => 'profile_app',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);


$retreived_sessions = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('retreived_sessions'),
        'subside' => array(),
        'end' => 'retreived_sessions',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$customer_help = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('customer_help'),
        'subside' => array(),
        'end' => 'customer_help',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$app_dealers = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('app_dealers'),
        'subside' => array(),
        'end' => 'app_dealers',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$emailCreator = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('emailCreator'),
        'subside' => array(),
        'end' => 'emailCreator',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);

$app_acknow_forms = array(
    array(
        'sidebar' => FALSE,
        'subview' => array('app_acknow_forms'),
        'subside' => array(),
        'end' => 'app_acknow_forms',
        'cont_cols' => array(0),
        'side_cols' => array(0)
    )
);


///////////////////////////////// End views sections// //////////////////////////////
////////////////////////////////// DISPACHER ///////////////////////////////////
if (isset($_GET['p'])) {
    if (isset($$_GET['p'])) {
//        if (checklogin() == TRUE) {
//            header("Location: index.php?p=".$_GET['p']);
//        }
    } else {
        header("Location: settings.php?p=error_404");
    }
} else {

    if (isset($_GET['export_id_customer'])) {
        $id_customer = $_GET['export_id_customer'];
        setSessionOnafAdmin("export_id_customer", $id_customer);
        header("Location: settings/core/export_client.php");
    } elseif (isset($_GET['delete_id_customer'])) {
        $id_customer = $_GET['delete_id_customer'];
        setSessionOnafAdmin("delete_id_customer", $id_customer);
        header("Location: settings.php?p=delete_app");
    } elseif (isset($_GET['profile_id_customer'])) {
        $id_customer = $_GET['profile_id_customer'];
        setSessionOnafAdmin("profile_id_customer", $id_customer);
        header("Location: settings.php?p=profile_app");
    } elseif (checkAccess() == TRUE) {
        header("Location: settings.php?p=app_forms");
    } else {
        header("Location: settings.php?p=login");
    }
}

//////////////////////////////// End DISPACHER //////////////////////////////////

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['app_tittle'])) {
        updatepmiInfotittle($_POST['app_key'], $_POST['app_tittle']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['app_subtittle'])) {
        updatepmiInfosubtittle($_POST['app_key'], $_POST['app_subtittle']);
    }
}
