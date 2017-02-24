<?php

session_name('ONAF_ADMIN');
session_start();
/**
 * Makes AJAX requests for the system.
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage ajax
 * @version 1.0.0
 */
include 'functions.php';
include 'connect.php';
include 'queries.php';

if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}

////////////////////////////// export_client module //////////////////////////////////
if (isset($_SESSION['onaf_admin_export_id_customer'])) {

    $export_id = $_SESSION['onaf_admin_export_id_customer'];
    $customerinfo = getCustomerInfo($export_id);
    $accountinfo = getAccountInfo($export_id, getCustomerAccount($export_id));
    if ($customerinfo->id_account == 2) {
        $secaccountinfo = getAllInfoSecondaryCustomer($export_id);
    }

    $Name = $customerinfo->first_name_onaf_customer . '_' . $customerinfo->last_name_customer . '_' . date('U') . '.csv';
    $FileName = "./$Name";
    $Datos = 'Preffix, '
            . 'First Name, '
            . 'Middle Name, '
            . 'Last Name, '
            . 'Suffix, '
            . 'Phone Number, ';
    if (isset($customerinfo->id_type_secondary_phone_number) && $customerinfo->secondary_phone_number_customer != '') {
        $Datos .= 'Secondary Phone Number, ';
    }
    $Datos .= 'Email Address, '
            . 'PIN Number, '
            . 'Country of citizenship, '
            . 'Country of Recidency, ';

    if ($customerinfo->id_account == 3) {
        $Datos.= 'Date of Incorporation, '
                . 'Business Name, '
                . 'Type of Business, '
                . 'Coporate Country, '
                . 'Coporate City, '
                . 'Street Address 1, ';
        if ($accountinfo->street_address2_coporate_onaf != '') {
            $Datos .= 'Street Address 2, ';
        }
        $Datos .= 'Zip / Postal Code, ';
    }

    $Datos .= 'Date of Bith, '
            . 'Primary ID, '
            . 'Type of ID, '
            . 'ID Number, '
            . 'Expiry Date, ';
    if (isset($accountinfo->sanswer_question1_onaf_customer_account) && $accountinfo->sanswer_question1_onaf_customer_account != '') {
        $Datos .='1 Security Question, '
                . '1 Answer Security Question, ';
    }
    if (isset($accountinfo->sanswer_question2_onaf_customer_account) && $accountinfo->sanswer_question2_onaf_customer_account != '') {
        $Datos .= '2 Security Question, '
                . '2 Answer Security Question, ';
    }
    $Datos .= 'Country, '
            . 'Street Address, '
            . 'Street Address 1, '
            . 'City, '
            . 'State / Province, '
            . 'Zip / Postal Code, ';
    if (isset($customerinfo->secondary_home_address_customer) && $customerinfo->secondary_home_address_customer != '') {

        $Datos .= 'Mailing Country, '
                . 'Mailing Street Address, '
                . 'Mailing Street Address 2, '
                . 'Mailing City, '
                . 'Mailing State / Province, '
                . 'Mailing Zip / Postal Code, ';
    }
    $Datos .='Employment Status, ';

    if ($accountinfo->id_employment_onaf_customer_account == 1 || $accountinfo->id_employment_onaf_customer_account == 4) {
        $Datos .= 'Business / Employer Name, '
                . 'Business Country, '
                . 'Business Street Address 1, '
                . 'Business Street Address 2, '
                . 'Business City, '
                . 'Business State / Province, '
                . 'Business Zip / Postal Code, ';
    }
    $Datos .= 'Approximate Annual Income, '
            . 'Approximate Net Worth, '
            . 'Approximate Liquid Net Worth, '
            . 'Sources of Funds, ';
    if ($accountinfo->sourcefunds2_onaf_customer_account == 'other') {
        $Datos .= 'Other Sources of Funds, ';
    }

    if ($accountinfo->idinvestmentexperience_onaf_customer_account == 1) {
        $Datos .= 'Investment Experience 1, ';
    }
    if ($accountinfo->idinvestmentexperience2_onaf_customer_account == 2) {
        $Datos .= 'Investment Experience 2, ';
    }
    if ($accountinfo->idinvestmentexperience3_onaf_customer_account == 3) {
        $Datos .= 'Investment Experience 3, ';
    }
    if ($accountinfo->idinvestmentexperience4_onaf_customer_account == 4) {
        $Datos .= 'Investment Experience 4, ';
    }
    if ($accountinfo->idinvestmentexperience5_onaf_customer_account == 5) {
        $Datos .= 'Investment Experience 5, ';
    }
    if ($accountinfo->idinvestmentexperience6_onaf_customer_account == 6) {
        $Datos .= 'Investment Experience 6, ';
    }

    $Datos .= 'Personal Affiliation, ';
    if ($accountinfo->pa1_onaf_customer_account != 'no') {
        $Datos .= 'Business / Employer Name, '
                . 'Country, '
                . 'Street Address 1, ';
        if ($accountinfo->pa1businessAddress2_onaf_customer_account != '') {
            $Datos.= 'Street Address 2, ';
        }
        $Datos .= 'City, '
                . 'State / Province, '
                . 'Zip / Postal Code, ';
    }

    $Datos .= 'Personal Affiliation, ';
    if ($accountinfo->pa2_onaf_customer_account != 'no') {
        $Datos .='Senior Political Figure Name, '
                . 'Political Title, '
                . 'Country Where Title is Held, '
                . 'Relationship to Account Owner, ';
    }
    $Datos .= 'Personal Affiliation, ';
    if ($accountinfo->pa3_onaf_customer_account != 'no') {
        $Datos .='Company Ticker, '
                . 'Country, ';
    }

    $Datos .= 'Assigned Account Number, '
            . 'Account Owner, '
            . 'Date & NY Time · IP Address, ';

    if ($customerinfo->id_account == 2) {
        /**
         * 
         * Secondary Account Customer Information
         * 
         */
        $Datos .= 'Preffix, '
                . 'First Name, '
                . 'Middle Name, '
                . 'Last Name, '
                . 'Suffix, '
                . 'Phone Number, ';

        if (isset($secaccountinfo->id_type_secondary_phone_number) && $secaccountinfo->secondary_phone_number_customer != '') {
            $Datos .= 'Secondary Phone Number, ';
        }
        $Datos .= 'Country of citizenship, '
                . 'Country of Recidency, ';

        $Datos .= 'Date of Bith, '
                . 'Primary ID, '
                . 'Type of ID, '
                . 'ID Number, '
                . 'Expiry Date, ';
        if (isset($secaccountinfo->sanswer_question1_onaf_customer_account) && $secaccountinfo->sanswer_question1_onaf_customer_account != '') {
            $Datos .='1 Security Question, '
                    . '1 Answer Security Question, ';
        }
        if (isset($secaccountinfo->sanswer_question2_onaf_customer_account) && $secaccountinfo->sanswer_question2_onaf_customer_account != '') {
            $Datos .= '2 Security Question, '
                    . '2 Answer Security Question, ';
        }
        $Datos .= 'Country, '
                . 'Street Address, '
                . 'Street Address 1, '
                . 'City, '
                . 'State / Province, '
                . 'Zip / Postal Code, ';
        if (isset($secaccountinfo->secondary_home_address_customer) && $secaccountinfo->secondary_home_address_customer != '') {

            $Datos .= 'Mailing Country, '
                    . 'Mailing Street Address, '
                    . 'Mailing Street Address 2, '
                    . 'Mailing City, '
                    . 'Mailing State / Province, '
                    . 'Mailing Zip / Postal Code, ';
        }
        $Datos .='Employment Status, ';

        if ($secaccountinfo->id_employment_onaf_customer_account == 1 || $secaccountinfo->id_employment_onaf_customer_account == 4) {
            $Datos .= 'Business / Employer Name, '
                    . 'Business Country, '
                    . 'Business Street Address 1, '
                    . 'Business Street Address 2, '
                    . 'Business City, '
                    . 'Business State / Province, '
                    . 'Business Zip / Postal Code, ';
        }
        $Datos .='Approximate Annual Income, '
                . 'Approximate Net Worth, '
                . 'Approximate Liquid Net Worth, '
                . 'Sources of Funds, ';
        if ($secaccountinfo->sourcefunds2_onaf_customer_account == 'other') {
            $Datos .= 'Other Sources of Funds, ';
        }

        if ($secaccountinfo->idinvestmentexperience_onaf_customer_account == 1) {
            $Datos .= 'Investment Experience 1, ';
        }
        if ($secaccountinfo->idinvestmentexperience2_onaf_customer_account == 2) {
            $Datos .= 'Investment Experience 2, ';
        }
        if ($secaccountinfo->idinvestmentexperience3_onaf_customer_account == 3) {
            $Datos .= 'Investment Experience 3, ';
        }
        if ($secaccountinfo->idinvestmentexperience4_onaf_customer_account == 4) {
            $Datos .= 'Investment Experience 4, ';
        }
        if ($secaccountinfo->idinvestmentexperience5_onaf_customer_account == 5) {
            $Datos .= 'Investment Experience 5, ';
        }
        if ($secaccountinfo->idinvestmentexperience6_onaf_customer_account == 6) {
            $Datos .= 'Investment Experience 6, ';
        }

        $Datos .= 'Personal Affiliation, ';
        if ($secaccountinfo->pa1_onaf_customer_account != 'no') {
            $Datos .= 'Business / Employer Name, '
                    . 'Country, '
                    . 'Street Address 1, ';
            if ($secaccountinfo->pa1businessAddress2_onaf_customer_account != '') {
                $Datos.= 'Street Address 2, ';
            }
            $Datos .= 'City, '
                    . 'State / Province, '
                    . 'Zip / Postal Code, ';
        }

        $Datos .= 'Personal Affiliation, ';
        if ($secaccountinfo->pa2_onaf_customer_account != 'no') {
            $Datos .='Senior Political Figure Name, '
                    . 'Political Title, '
                    . 'Country Where Title is Held, '
                    . 'Relationship to Account Owner, ';
        }
        $Datos .= 'Personal Affiliation, ';
        if ($secaccountinfo->pa3_onaf_customer_account != 'no') {
            $Datos .='Company Ticker, '
                    . 'Country, ';
        }

        $Datos .= 'Assigned Account Number, '
                . 'Account Owner, '
                . 'Date & NY Time · IP Address, ';
    }

    $Datos .= "\r\n";


//Descarga el archivo desde el navegador
    header('Expires: 0');
    header('Cache-control: private');
    header('Content-Type: application/x-octet-stream'); // Archivo de Excel
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Description: File Transfer');
    header('Last-Modified: ' . date('D, d M Y H:i:s'));
    header('Content-Disposition: attachment; filename="' . $Name . '"');
    header("Content-Transfer-Encoding: binary");

    /**
     * Primary Account Customer Information
     */
    $Datos .= " " . getPrefixById($customerinfo->id_prefix) . ","
            . $customerinfo->first_name_onaf_customer . ","
            . $customerinfo->middle_name_customer . ","
            . $customerinfo->last_name_customer . ","
            . getSuffixById($customerinfo->id_suffix) . ","
            . getTypePhoneById($customerinfo->id_type_phone_number) . $customerinfo->phone_number_customer . $customerinfo->phone_number_customer_ext . ",";

    if (isset($customerinfo->id_type_secondary_phone_number) && $customerinfo->secondary_phone_number_customer != '') {
        $Datos .= getTypePhoneById($customerinfo->id_type_secondary_phone_number) . $customerinfo->secondary_phone_number_customer . $customerinfo->secondary_phone_number_customer_ext . ",";
    }

    $Datos .=$customerinfo->email_onaf_customer . ","
            . $customerinfo->pin_number_customer . ","
            . getCountryById($customerinfo->id_country) . ",";

    if ($customerinfo->id_country_recidency == NULL) {
        $Datos .= getCountryById($customerinfo->id_country) . ",";
    } else {
        $Datos .= getCountryById($customerinfo->id_country_recidency) . ",";
    }
    if ($customerinfo->id_account == 3) {
        $Datos .= $accountinfo->date_incorp_coporate_onaf . ","
                . $accountinfo->business_name_coporate_onaf . ","
                . $accountinfo->type_bussiness_coporate_onaf . ","
                . getCountryById($accountinfo->id_country_corporate_onaf) . ","
                . $accountinfo->city_corporate_onaf . ","
                . $accountinfo->street_address1_coporate_onaf . ",";
        if ($accountinfo->street_address2_coporate_onaf != '') {
            $Datos .= $accountinfo->street_address2_coporate_onaf . ",";
        }
        $Datos .= $accountinfo->zip_code_corporate_onaf . ",";
    }

    $Datos .= $accountinfo->datebirth_onaf_customer_account . ","
            . $accountinfo->primaryid_onaf_customer_account . ","
            . getTypeIDById($accountinfo->idtype_id_onaf_customer_account) . ","
            . $accountinfo->secondayid_onaf_customer_account . ","
            . $accountinfo->expirydate_secondaryid_onaf_customer_account . ",";

    if (isset($accountinfo->sanswer_question1_onaf_customer_account) && $accountinfo->sanswer_question1_onaf_customer_account != '') {
        $Datos .= getSecurityQuestionsById($accountinfo->idsecurity_question1_onaf_customer_account) . ","
                . $accountinfo->sanswer_question1_onaf_customer_account . ",";
    }

    if (isset($accountinfo->sanswer_question2_onaf_customer_account) && $accountinfo->sanswer_question2_onaf_customer_account != '') {
        $Datos .= getSecurityQuestionsById($accountinfo->idsecurity_question2_onaf_customer_account) . ","
                . $accountinfo->sanswer_question2_onaf_customer_account . ",";
    }

    $Datos .= getCountryById($customerinfo->id_country) . ","
            . $customerinfo->home_address_customer . ","
            . $customerinfo->home_address2_customer . ","
            . $customerinfo->city_onaf_customer . ","
            . getStateById($customerinfo->id_state) . ","
            . $customerinfo->zipcode_onaf_customer . ",";

    if (isset($customerinfo->secondary_home_address_customer) && $customerinfo->secondary_home_address_customer != '') {
        $Datos .= getCountryById($customerinfo->secondary_id_country) . ","
                . $customerinfo->secondary_home_address_customer . ","
                . $customerinfo->secondary_home_address2_customer . ","
                . $customerinfo->secondary_city_onaf_customer . ","
                . getStateById($customerinfo->secondary_id_state) . ","
                . $customerinfo->secondary_zipcode_onaf_customer . ",";
    }
    $Datos .= getEmploymentById($accountinfo->id_employment_onaf_customer_account) . ",";

    if ($accountinfo->id_employment_onaf_customer_account == 1 || $accountinfo->id_employment_onaf_customer_account == 4) {
        $Datos .= $accountinfo->businessemployer_onaf_customer_account . ","
                . getCountryById($accountinfo->businesscountryaddress_onaf_customer_account) . ","
                . $accountinfo->businessAddress1_onaf_customer_account . ","
                . $accountinfo->businessAddress2_onaf_customer_account . ","
                . $accountinfo->businesscityaddress_onaf_customer_account . ","
                . getStateById($accountinfo->businessstateaddress_onaf_customer_account) . ","
                . $accountinfo->businesszipcode_onaf_customer_account . ",";
    }
    $Datos .= str_replace(',', '.', getFinantialInfoById($accountinfo->income_onaf_customer_account)) . ","
            . str_replace(',', '.', getFinantialInfoById($accountinfo->networth_onaf_customer_account)) . ","
            . str_replace(',', '.', getFinantialInfoById($accountinfo->liquidnetworth_onaf_customer_account)) . ","
            . $accountinfo->sourcefunds1_onaf_customer_account . ",";

    if ($accountinfo->sourcefunds2_onaf_customer_account == 'other') {
        $Datos .= $accountinfo->describesourcefunds_onaf_customer_account . ",";
    }

    if ($accountinfo->idinvestmentexperience_onaf_customer_account == 1) {
        $Datos .= getInvestmentExpById($accountinfo->idinvestmentexperience_onaf_customer_account) . ",";
    }
    if ($accountinfo->idinvestmentexperience2_onaf_customer_account == 2) {
        $Datos .=getInvestmentExpById($accountinfo->idinvestmentexperience2_onaf_customer_account) . ",";
    }
    if ($accountinfo->idinvestmentexperience3_onaf_customer_account == 3) {
        $Datos .= getInvestmentExpById($accountinfo->idinvestmentexperience3_onaf_customer_account) . ",";
    }
    if ($accountinfo->idinvestmentexperience4_onaf_customer_account == 4) {
        $Datos .= getInvestmentExpById($accountinfo->idinvestmentexperience4_onaf_customer_account) . ",";
    }
    if ($accountinfo->idinvestmentexperience5_onaf_customer_account == 5) {
        $Datos .= getInvestmentExpById($accountinfo->idinvestmentexperience5_onaf_customer_account) . ",";
    }
    if ($accountinfo->idinvestmentexperience6_onaf_customer_account == 6) {
        $Datos .= getInvestmentExpById($accountinfo->idinvestmentexperience6_onaf_customer_account) . ",";
    }
    $Datos .= "1. Are you licensed or employed by a registered broker-dealer securities exchange or member of a securities exchange? " . $accountinfo->pa1_onaf_customer_account . ",";

    if ($accountinfo->pa1_onaf_customer_account != 'no') {
        $Datos.= $accountinfo->pa1businessEmployer_onaf_customer_account . ","
                . getCountryById($accountinfo->idpa1businesscountryaddress_onaf_customer_account) . ","
                . $accountinfo->pa1businessAddress1_onaf_customer_account . ",";
        if ($accountinfo->pa1businessAddress2_onaf_customer_account != '') {
            $Datos .= $accountinfo->pa1businessAddress2_onaf_customer_account . ",";
        }
        $Datos.= $accountinfo->pa1businessCityAddress_onaf_customer_account . ","
                . getStateById($accountinfo->idpa1businessstateaddress_onaf_customer_account) . ","
                . $accountinfo->pa1businesszipcode_onaf_customer_account . ",";
    }
    $Datos .= "2. Are you or any member of your immediate family or any of your personal or business associates a senior political figure? " . $accountinfo->pa2_onaf_customer_account . ",";

    if ($accountinfo->pa2_onaf_customer_account != 'no') {
        $Datos .= $accountinfo->pa2politicalfigure_onaf_customer_account . ","
                . $accountinfo->pa2politicaltittle_onaf_customer_account . ","
                . getCountryById($accountinfo->idpa2CountryAddress_onaf_customer_account) . ","
                . $accountinfo->pa2Relationship_onaf_customer_account . ",";
    }
    $Datos .= "3. Are you a director or 10% or more shareholder or policy-making officer or a publicly traded company? " . $accountinfo->pa3_onaf_customer_account . ",";

    if ($accountinfo->pa3_onaf_customer_account != 'no') {
        $Datos .= $accountinfo->pa3CompanyTicker_onaf_customer_account . ","
                . getCountryById($accountinfo->idpa3CountryAddress_onaf_customer_account) . ",";
    }

    $Datos .= $customerinfo->account_number_onaf_customer . ","
            . $accountinfo->reviewsign_officerbroker_onaf_customer_account . ","
            . $accountinfo->reviewsigntime_onaf_customer_account . ' · ' . $accountinfo->ip_onaf_customer_account . ",";


    if ($customerinfo->id_account == 2) {
        /**
         * 
         * Secondary Account Customer Information
         * 
         */
        $Datos .= getPrefixById($secaccountinfo->id_prefix) . ","
                . $secaccountinfo->first_name_onaf_customer . ","
                . $secaccountinfo->middle_name_customer . ","
                . $secaccountinfo->last_name_customer . ","
                . getSuffixById($secaccountinfo->id_suffix) . ","
                . getTypePhoneById($secaccountinfo->id_type_phone_number) . $secaccountinfo->phone_number_customer . $secaccountinfo->phone_number_customer_ext . ",";

        if (isset($secaccountinfo->id_type_secondary_phone_number) && $secaccountinfo->secondary_phone_number_customer != '') {
            $Datos .= getTypePhoneById($secaccountinfo->id_type_secondary_phone_number) . $secaccountinfo->secondary_phone_number_customer . $secaccountinfo->secondary_phone_number_customer_ext . ",";
        }

        $Datos .= getCountryById($secaccountinfo->id_country) . ",";

        if ($secaccountinfo->id_country_recidency == NULL) {
            $Datos .= getCountryById($secaccountinfo->id_country) . ",";
        } else {
            $Datos .= getCountryById($secaccountinfo->id_country_recidency) . ",";
        }

        $Datos .= $secaccountinfo->datebirth_onaf_customer_account . ","
                . $secaccountinfo->primaryid_onaf_customer_account . ","
                . getTypeIDById($secaccountinfo->idtype_id_onaf_customer_account) . ","
                . $secaccountinfo->secondayid_onaf_customer_account . ","
                . $secaccountinfo->expirydate_secondaryid_onaf_customer_account . ",";

        if (isset($secaccountinfo->sanswer_question1_onaf_customer_account) && $secaccountinfo->sanswer_question1_onaf_customer_account != '') {
            $Datos .= getSecurityQuestionsById($secaccountinfo->idsecurity_question1_onaf_customer_account) . ","
                    . $secaccountinfo->sanswer_question1_onaf_customer_account . ",";
        }

        if (isset($secaccountinfo->sanswer_question2_onaf_customer_account) && $secaccountinfo->sanswer_question2_onaf_customer_account != '') {
            $Datos .= getSecurityQuestionsById($secaccountinfo->idsecurity_question2_onaf_customer_account) . ","
                    . $secaccountinfo->sanswer_question2_onaf_customer_account . ",";
        }

        $Datos .= getCountryById($secaccountinfo->id_country) . ","
                . $secaccountinfo->home_address_customer . ","
                . $secaccountinfo->home_address2_customer . ","
                . $secaccountinfo->city_onaf_customer . ","
                . getStateById($secaccountinfo->id_state) . ","
                . $secaccountinfo->zipcode_onaf_customer . ",";

        if (isset($secaccountinfo->secondary_home_address_customer) && $secaccountinfo->secondary_home_address_customer != '') {
            $Datos .= getCountryById($secaccountinfo->secondary_id_country) . ","
                    . $secaccountinfo->secondary_home_address_customer . ","
                    . $secaccountinfo->secondary_home_address2_customer . ","
                    . $secaccountinfo->secondary_city_onaf_customer . ","
                    . getStateById($secaccountinfo->secondary_id_state) . ","
                    . $secaccountinfo->secondary_zipcode_onaf_customer . ",";
        }
        $Datos .= getEmploymentById($secaccountinfo->id_employment_onaf_customer_account) . ",";

        if ($secaccountinfo->id_employment_onaf_customer_account == 1 || $accountinfo->id_employment_onaf_customer_account == 4) {
            $Datos .= $secaccountinfo->businessemployer_onaf_customer_account . ","
                    . getCountryById($secaccountinfo->businesscountryaddress_onaf_customer_account) . ","
                    . $secaccountinfo->businessAddress1_onaf_customer_account . ","
                    . $secaccountinfo->businessAddress2_onaf_customer_account . ","
                    . $secaccountinfo->businesscityaddress_onaf_customer_account . ","
                    . getStateById($secaccountinfo->businessstateaddress_onaf_customer_account) . ","
                    . $secaccountinfo->businesszipcode_onaf_customer_account . ",";
        }
        $Datos .= str_replace(',', '.', getFinantialInfoById($secaccountinfo->income_onaf_customer_account)) . ","
                . str_replace(',', '.', getFinantialInfoById($secaccountinfo->networth_onaf_customer_account)) . ","
                . str_replace(',', '.', getFinantialInfoById($secaccountinfo->liquidnetworth_onaf_customer_account)) . ","
                . $secaccountinfo->sourcefunds1_onaf_customer_account . ",";

        if ($secaccountinfo->sourcefunds2_onaf_customer_account == 'other') {
            $Datos .= $secaccountinfo->describesourcefunds_onaf_customer_account . ",";
        }

        if ($secaccountinfo->idinvestmentexperience_onaf_customer_account == 1) {
            $Datos .= getInvestmentExpById($secaccountinfo->idinvestmentexperience_onaf_customer_account) . ",";
        }
        if ($secaccountinfo->idinvestmentexperience2_onaf_customer_account == 2) {
            $Datos .=getInvestmentExpById($secaccountinfo->idinvestmentexperience2_onaf_customer_account) . ",";
        }
        if ($secaccountinfo->idinvestmentexperience3_onaf_customer_account == 3) {
            $Datos .= getInvestmentExpById($secaccountinfo->idinvestmentexperience3_onaf_customer_account) . ",";
        }
        if ($secaccountinfo->idinvestmentexperience4_onaf_customer_account == 4) {
            $Datos .= getInvestmentExpById($secaccountinfo->idinvestmentexperience4_onaf_customer_account) . ",";
        }
        if ($secaccountinfo->idinvestmentexperience5_onaf_customer_account == 5) {
            $Datos .= getInvestmentExpById($secaccountinfo->idinvestmentexperience5_onaf_customer_account) . ",";
        }
        if ($secaccountinfo->idinvestmentexperience6_onaf_customer_account == 6) {
            $Datos .= getInvestmentExpById($secaccountinfo->idinvestmentexperience6_onaf_customer_account) . ",";
        }
        $Datos .= "1. Are you licensed or employed by a registered broker-dealer securities exchange or member of a securities exchange? " . $secaccountinfo->pa1_onaf_customer_account . ",";

        if ($secaccountinfo->pa1_onaf_customer_account != 'no') {
            $Datos.= $secaccountinfo->pa1businessEmployer_onaf_customer_account . ","
                    . getCountryById($secaccountinfo->idpa1businesscountryaddress_onaf_customer_account) . ","
                    . $secaccountinfo->pa1businessAddress1_onaf_customer_account . ",";
            if ($secaccountinfo->pa1businessAddress2_onaf_customer_account != '') {
                $Datos .= $secaccountinfo->pa1businessAddress2_onaf_customer_account . ",";
            }
            $Datos.= $secaccountinfo->pa1businessCityAddress_onaf_customer_account . ","
                    . getStateById($secaccountinfo->idpa1businessstateaddress_onaf_customer_account) . ","
                    . $secaccountinfo->pa1businesszipcode_onaf_customer_account . ",";
        }
        $Datos .= "2. Are you or any member of your immediate family or any of your personal or business associates a senior political figure? " . $secaccountinfo->pa2_onaf_customer_account . ",";

        if ($secaccountinfo->pa2_onaf_customer_account != 'no') {
            $Datos .= $secaccountinfo->pa2politicalfigure_onaf_customer_account . ","
                    . $secaccountinfo->pa2politicaltittle_onaf_customer_account . ","
                    . getCountryById($secaccountinfo->idpa2CountryAddress_onaf_customer_account) . ","
                    . $secaccountinfo->pa2Relationship_onaf_customer_account . ",";
        }
        $Datos .= "3. Are you a director or 10% or more shareholder or policy-making officer or a publicly traded company? " . $secaccountinfo->pa3_onaf_customer_account . ",";

        if ($secaccountinfo->pa3_onaf_customer_account != 'no') {
            $Datos .= $secaccountinfo->pa3CompanyTicker_onaf_customer_account . ","
                    . getCountryById($secaccountinfo->idpa3CountryAddress_onaf_customer_account) . ",";
        }

        $Datos .= $customerinfo->account_number_onaf_customer . ","
                . $secaccountinfo->reviewsign_officerbroker_onaf_customer_account . ","
                . $secaccountinfo->reviewsigntime_onaf_customer_account . ' · ' . $accountinfo->ip_onaf_customer_account . ",";
    }

    $Datos .= "\r\n";


    echo $Datos;
    //setSuccess("Customer Info has been exported sucessfully!.");
    //header("Location: ../../settings.php");
}

////////////////////////////// export_client module //////////////////////////////////




    