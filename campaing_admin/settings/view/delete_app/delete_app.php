<?php

if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}
////////////////////////////// delete_app module //////////////////////////////////
if (isset($_SESSION['onaf_admin_delete_id_customer'])) {
    $del_id_customer = $_SESSION['onaf_admin_delete_id_customer'];
    $id_account = getCustomerAccount($del_id_customer);
    deleteCustomerAccount($del_id_customer, $id_account);
    setSuccess("Customer Account deleted sucessfully!.");
    header("Location: settings.php?p=app_forms");
} else {
    setError("Error, customer Account not found or already deleted, please reload the page, adn try again.");
    header("Location: settings.php?p=app_forms");
}

////////////////////////////// delete_app module //////////////////////////////////
?>